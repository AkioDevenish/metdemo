<?php
	/**
	 * @global BigTreeAdmin $admin
	 * @global BigTreeCMS $cms
	 */
	
	$admin->verifyCSRFToken();
	
	// If there's a preprocess function for this module, let's get'r'done.
	$bigtree["preprocessed"] = [];
	
	if (!empty($bigtree["form"]["hooks"]["pre"])) {
		$bigtree["preprocessed"] = call_user_func($bigtree["form"]["hooks"]["pre"], $_POST);
		
		// Update the $_POST
		if (is_array($bigtree["preprocessed"])) {
			foreach ($bigtree["preprocessed"] as $key => $val) {
				$_POST[$key] = $val;
			}
		}
	}
	
	// Find out what kind of permissions we're allowed on this item.  We need to check the EXISTING copy of the data AND what it's turning into and find the lowest of the two permissions.
	$bigtree["access_level"] = $admin->getAccessLevel($bigtree["module"], $_POST, $bigtree["form"]["table"]);
	
	if (!empty($_POST["id"]) && !empty($bigtree["access_level"]) && $bigtree["access_level"] != "n") {
		$original_item = BigTreeAutoModule::getItem($bigtree["form"]["table"], $_POST["id"]);
		$existing_item = BigTreeAutoModule::getPendingItem($bigtree["form"]["table"], $_POST["id"]);
		$previous_permission = $admin->getAccessLevel($bigtree["module"], $existing_item["item"], $bigtree["form"]["table"]);
		$original_permission = $admin->getAccessLevel($bigtree["module"], $original_item["item"], $bigtree["form"]["table"]);
		
		// If the current permission is e or p, drop it down to e if the old one was e.
		if ($previous_permission != "p") {
			$bigtree["access_level"] = $previous_permission;
		}
		
		// Check the original. If we're not already at "you're not allowed" then apply the original permission.
		if ($bigtree["access_level"] != "n" && $original_permission != "p") {
			$bigtree["access_level"] = $original_permission;
		}
		
		$bigtree["existing_data"] = $original_item;
	}
	
	// If permission check fails, stop and throw the denied page.
	if (empty($bigtree["access_level"]) || $bigtree["access_level"] == "n") {
		$admin->stop(file_get_contents(BigTree::path("admin/auto-modules/forms/_denied.php")));
	}
	
	$bigtree["crops"] = [];
	$bigtree["many-to-many"] = [];
	$bigtree["errors"] = [];
	$bigtree["entry"] = [];
	
	$bigtree["post_data"] = $_POST;
	$bigtree["file_data"] = BigTree::parsedFilesArray();
	
	$bigtree["form"]["fields"] = $admin->runHooks("fields", "form", $bigtree["form"]["fields"], [
		"form" => $bigtree["form"],
		"step" => "process",
		"post_data" => $bigtree["post_data"],
		"file_data" => $bigtree["file_data"]
	]);
	
	foreach ($bigtree["form"]["fields"] as $resource) {
		$field = [
			"type" => $resource["type"],
			"title" => $resource["title"],
			"key" => $resource["column"],
			"settings" => $resource["settings"] ?? $resource["options"] ?? [],
			"ignore" => false,
			"input" => $bigtree["post_data"][$resource["column"]] ?? null,
			"file_input" => $bigtree["file_data"][$resource["column"]] ?? null,
		];
		
		$output = BigTreeAdmin::processField($field);
		
		if (!is_null($output)) {
			$bigtree["entry"][$field["key"]] = $output;
		}
	}
	
	// See if we added anything in pre-processing that wasn't a field in the form.
	if (!empty($bigtree["preprocessed"]) && is_array($bigtree["preprocessed"])) {
		foreach ($bigtree["preprocessed"] as $key => $val) {
			if (!isset($bigtree["entry"][$key])) {
				$bigtree["entry"][$key] = $val;
			}
		}
	}
	
	// Sanitize the form data so it fits properly in the database (convert dates to MySQL-friendly format and such)
	$bigtree["entry"] = BigTreeAutoModule::sanitizeData($bigtree["form"]["table"], $bigtree["entry"]);
	
	// Make some easier to write out vars for below.
	$tags = $_POST["_tags"] ?? [];
	$edit_id = $_POST["id"] ?? false;
	$change_allocation_id = false;
	$new_id = false;
	$table = $bigtree["form"]["table"];
	$item = $bigtree["entry"];
	$many_to_many = $bigtree["many-to-many"];
	
	// Check to see if this is a positioned element
	// If it is and the form is setup to create new items at the top and this is a new record, update the position column.
	$table_description = BigTree::describeTable($table);
	
	if (isset($table_description["columns"]["position"]) &&
		!empty($bigtree["form"]["default_position"]) &&
		$bigtree["form"]["default_position"] == "Top" &&
		!$_POST["id"]
	) {
		$max = sqlrows(sqlquery("SELECT id FROM `$table`")) + sqlrows(sqlquery("SELECT id FROM `bigtree_pending_changes` WHERE `table` = '".sqlescape($table)."'"));
		$item["position"] = $max;
	}
	
	// Let's stick it in the database or whatever!
	$data_action = (!empty($_POST["save_and_publish"]) || !empty($_POST["save_and_publish_x"]) || !empty($_POST["save_and_publish_y"])) ? "publish" : "save";
	$did_publish = false;
	
	// We're an editor or "Save" was chosen
	if ($bigtree["access_level"] == "e" || $data_action == "save") {
		$open_graph = $admin->handleOpenGraph($table, null, $_POST["_open_graph_"] ?? [], true);
		
		// We have an existing module entry we're saving a change to.
		if ($edit_id) {
			$change_allocation_id = BigTreeAutoModule::submitChange($bigtree["module"]["id"], $table, $edit_id, $item, $many_to_many, $tags, $bigtree["form"]["hooks"]["publish"], $open_graph);
			$admin->growl($bigtree["module"]["name"], "Saved ".$bigtree["form"]["title"]." Draft");
			$admin->allocateResources($table, "p".$change_allocation_id);
			// It's a new entry, so we create a pending item.
		} else {
			$edit_id = "p".BigTreeAutoModule::createPendingItem($bigtree["module"]["id"], $table, $item, $many_to_many, $tags, $bigtree["form"]["hooks"]["publish"], false, $open_graph);
			$admin->allocateResources($table, $edit_id);
			$admin->growl($bigtree["module"]["name"], "Created ".$bigtree["form"]["title"]." Draft");
		}
		// We're a publisher and we want to publish
	} elseif ($bigtree["access_level"] == "p") {
		// If we have an edit_id we're modifying something that exists.
		if ($edit_id) {
			// If the edit id starts with a "p" it's a pending entry we're publishing.
			if (substr($edit_id, 0, 1) == "p") {
				$edit_id = BigTreeAutoModule::publishPendingItem($table, substr($edit_id, 1), $item, $many_to_many, $tags, $_POST["_open_graph_"] ?? []);
				$admin->updateResourceAllocation($table, $edit_id, substr($_POST["id"], 1));
				$admin->growl($bigtree["module"]["name"], "Updated & Published ".$bigtree["form"]["title"]);
				$did_publish = true;
				// Otherwise we're updating something that is already published
			} else {
				$pending_change_id = SQL::fetchSingle("SELECT id FROM bigtree_pending_changes WHERE `table` = ? AND `item_id` = ?", $table, $edit_id);
				
				if ($pending_change_id) {
					$admin->deallocateResources($table, "p".$pending_change_id);
				}
				
				BigTreeAutoModule::updateItem($table, $edit_id, $item, $many_to_many, $tags, $_POST["_open_graph_"] ?? []);
				$admin->allocateResources($table, $edit_id);
				$admin->growl($bigtree["module"]["name"], "Updated ".$bigtree["form"]["title"]);
				$did_publish = true;
			}
			// We're creating a new published entry.
		} else {
			$edit_id = BigTreeAutoModule::createItem($table, $item, $many_to_many, $tags, null, $_POST["_open_graph_"] ?? []);
			$admin->allocateResources($table, $edit_id);
			$admin->growl($bigtree["module"]["name"], "Created ".$bigtree["form"]["title"]);
			$did_publish = true;
		}
	}
	
	// Catch errors
	if ($edit_id === false && $did_publish) {
		$bigtree["errors"][] = [
			"field" => "SQL Query",
			"error" => $bigtree["sql"]["errors"][count($bigtree["sql"]["errors"]) - 1]
		];
	}
	
	// Kill off any applicable locks to the entry
	if ($edit_id) {
		$admin->unlock($table, $edit_id);
	}
	
	// Figure out if we should return to a view with search results / page / sorting preset.
	if (isset($_POST["_bigtree_return_view_data"])) {
		$return_view_data = json_decode(base64_decode($_POST["_bigtree_return_view_data"]), true);
		
		if (empty($bigtree["form"]["return_view"]) || $bigtree["form"]["return_view"] == $return_view_data["view"]) {
			$redirect_append = [];
			unset($return_view_data["view"]); // We don't need the view passed back.
			
			foreach ($return_view_data as $key => $val) {
				$redirect_append[] = "$key=".urlencode($val);
			}
			
			$redirect_append = "?".implode("&", $redirect_append);
		}
	} else {
		$redirect_append = "";
	}
	
	// Get the redirect location.
	$view = BigTreeAutoModule::getRelatedViewForForm($bigtree["form"]);
	
	// Specified in the URL
	if (!empty($_POST["_bigtree_return_link"])) {
		$redirect_url = $_POST["_bigtree_return_link"];
		// If we specify a specific return view, get that information
	} elseif ($bigtree["form"]["return_view"]) {
		$view = BigTreeAutoModule::getView($bigtree["form"]["return_view"]);
		$action = $admin->getModuleActionForView($bigtree["form"]["return_view"]);
		
		if ($action["route"]) {
			$redirect_url = ADMIN_ROOT.$bigtree["module"]["route"]."/".$action["route"]."/".$redirect_append;
		} else {
			$redirect_url = ADMIN_ROOT.$bigtree["module"]["route"]."/".$redirect_append;
		}
		// If we specify a specific return URL...
	} elseif ($bigtree["form"]["return_url"]) {
		$redirect_url = $bigtree["form"]["return_url"].$redirect_append;
		// Otherwise just go back to the main module landing.
	} else {
		$redirect_url = ADMIN_ROOT.$bigtree["module"]["route"]."/".$redirect_append;
	}
	
	// If we've specified a preview URL in our module and the user clicked Save & Preview, return to preview page.
	if (!empty($_POST["_bigtree_preview"])) {
		$admin->ungrowl();
		$redirect_url = rtrim($view["preview_url"], "/")."/".$edit_id."/?bigtree_preview_return=".urlencode($bigtree["form_root"].$edit_id."/");
	}
	
	// If there's a callback function for this module, let's get'r'done.
	if (!empty($bigtree["form"]["hooks"]["post"])) {
		call_user_func($bigtree["form"]["hooks"]["post"], $edit_id, $item, $did_publish);
	}
	
	// Custom callback for only publishes
	if ($did_publish && !empty($bigtree["form"]["hooks"]["publish"])) {
		call_user_func($bigtree["form"]["hooks"]["publish"], $table, $edit_id, $item, $many_to_many, $tags);
	}
	
	// Put together saved form information for the error or crop page in case we need it.
	$edit_action = BigTreeAutoModule::getEditAction($bigtree["module"]["id"], $bigtree["form"]["id"]);
	$_SESSION["bigtree_admin"]["form_data"] = [
		"view" => $view,
		"id" => $edit_id,
		"return_link" => $redirect_url,
		"edit_link" => ADMIN_ROOT.$bigtree["module"]["route"]."/".$edit_action["route"]."/$edit_id/",
		"errors" => $bigtree["errors"]
	];
	
	if (count($bigtree["crops"])) {
		$_SESSION["bigtree_admin"]["form_data"]["crop_key"] = $cms->cacheUnique("org.bigtreecms.crops", $bigtree["crops"]);
		BigTree::redirect($bigtree["form_root"]."crop/");
	} elseif (count($bigtree["errors"])) {
		BigTree::redirect($bigtree["form_root"]."error/");
	} else {
		BigTree::redirect($redirect_url);
	}
