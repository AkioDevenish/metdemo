<?php
	/**
	 * @global BigTreeAdmin $admin
	 * @global array $bigtree
	 */
	
	if (end($bigtree["path"]) != "password" && !empty($bigtree["path"][2]) && $bigtree["path"][2] != "profile") {
		$admin->requireLevel(1);
	}

	$policy = array_filter((array)$bigtree["security-policy"]["password"]) ? $bigtree["security-policy"]["password"] : false;
	$policy_text = "";
	
	if (!empty($policy["length"]) || !empty($policy["mixedcase"]) || !empty($policy["numbers"]) || !empty($policy["nonalphanumeric"]))  {
		$policy_text = "<p>Requirements</p><ul>";
		
		if ($policy["length"]) {
			$policy_text .= "<li>Minimum length &mdash; ".$policy["length"]." characters</li>";
		}
		
		if ($policy["mixedcase"]) {
			$policy_text .= "<li>Both upper and lowercase letters</li>";
		}
		
		if ($policy["numbers"]) {
			$policy_text .= "<li>At least one number</li>";
		}
		
		if ($policy["nonalphanumeric"]) {
			$policy_text .= "<li>At least one special character (i.e. $%*)</li>";
		}
		
		$policy_text .= "</ul>";
	}
