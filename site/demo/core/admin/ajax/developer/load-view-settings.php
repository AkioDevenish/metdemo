<?php
	// Prevent path manipulation shenanigans
	$type = BigTree::cleanFile($_POST["type"]);
	$table = $_POST["table"];
	$settings = json_decode(str_replace(array("\r","\n"),array('\r','\n'),$_POST["data"]),true);
	$filter = isset($settings["filter"]) ? $settings["filter"] : "";
?>
<div style="width: 450px;">
	<fieldset>
		<label>Filter Function <small>(function name only, <a href="https://www.bigtreecms.org/docs/dev-guide/modules/advanced-techniques/view-filters/" target="_blank">learn more</a>)</small></label>
		<input type="text" name="filter" value="<?=htmlspecialchars($filter)?>" />
	</fieldset>
	<?php
		$path = BigTree::path("admin/ajax/developer/view-settings/$type.php");
		
		if (file_exists($path)) {
			include $path;
		}
	?>
</div>

<script>
	BigTree.localTable = false;
	
	$(".table_select").change(function() {
		var x = 0;
		BigTree.localTable = $(this).val();
		
		$(this).parents("fieldset").nextAll("fieldset").each(function() {
			var div = $(this).find("div");
			if (div.length && div.attr("data-name")) {
				if (div.hasClass("sort_by")) {
					div.load("<?=ADMIN_ROOT?>ajax/developer/load-table-columns/?sort=true&table=" + BigTree.localTable + "&field=" + div.attr("data-name"), BigTreeCustomControls);
				} else {
					div.load("<?=ADMIN_ROOT?>ajax/developer/load-table-columns/?table=" + BigTree.localTable + "&field=" + div.attr("data-name"), BigTreeCustomControls);
				}
			}
		});
	});
</script>