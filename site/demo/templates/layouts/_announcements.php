<?php
	# add-banner.php live
?>

<style>
	.modal-body, .modal-title { color: rgba(0, 0, 0, 0.7); } .modal-body { text-align: left; }
	.btn-group-vertical a {
		background: transparent; border: none; font-size: 2.5vh; display: block;
	}
</style>
<div class="top-banner">

<?php

// use this instead of manually creating "<p></p>" tags to display hard coded messages in ad-banner

	$hard_coded_messages = [
		// diplicate this array for every hard coded message to display
		[
			/*
			'link' => 'http://www.metoffice.gov.tt/sites/default/files/OfficialStatement_7_ALpresuure.pdf',
			'title' => 'TROPICAL DEPRESSION #13 HAS STRENGTHENED TO TROPICAL STORM LAURA' */
		]


	];

	$forecast = false;

	// set up array to fetch data from api
	$request_urls = [
//		['active' => true, 'is_modal' => false, 'modal_target' => 'cap', 'type' => 'Forecast', 'title' => 'Latest Forecast', 'data' => [], 'link' => 'https://metproducts.gov.tt/api/forecast', 'action_url' => 'https://metproducts.gov.tt/api/forecast'],
//		['active' => true, 'is_modal' => false, 'modal_target' => 'cap', 'type' => 'Public Warning', 'title' => 'Public Warning', 'data' => [], 'link' => 'https://metproducts.gov.tt/ttms/public/api/cap/ticker', 'action_url' => 'https://www.metoffice.gov.tt/early_warning'],
		['active' => true, 'is_modal' => true, 'modal_target' => 'ofModal', 'type' => 'Official Statement', 'title' => 'Official Statement', 'data' => [], 'link' => 'https://metproducts.gov.tt/ttms/public/api/communications?type=announcement', 'action_url' => null]
	];

	$messages = [];

	// fetch all data
	foreach($request_urls as $idx => $val) {

		if($val['active']) {
//			$temp = '';
			$request_urls[$idx]['data'] = json_decode(file_get_contents($val['link']), true);
//                        var_dump($request_urls[$idx]["data"]["items"]); 
//			$temp_items = [];
			if($request_urls[$idx]['data'] !=null) {
				foreach($request_urls[$idx]['data'] as $idxx => $item) {
					$temp_items = [
//						// set visible titles for elements in ad-banner
						'title' => $item['headline'].($item != end($request_urls[$idx]['data']) ? '  | ' : ''),
//						// set the href tag for each title
						'action_url' => $val['modal_target'] == 'cap' ? $val['action_url'] : $item['url'],
//						// set if the element opens a modal or not
						'is_modal' => $val['is_modal'],
//						// if element opens a modal, set the modal target
						'modal_target' => $val['modal_target'] == 'cap' ? null : $val['modal_target'].'-'.$idxx,
//						// set the element type, can be used for identify each data type
						'type' => $val['modal_target'] == 'cap' ? 'cap' : 'communications',
//						// set if the element htef tag will open a new page
						'new_page' => $val['modal_target'] == 'cap' ? true : false,
//						// store all data from api
						'data' => $item
					];
					array_push($messages, $temp_items);
				}
			}
                    
		}
	}

	// set latest forecast if no alerts were found
     if(empty($messages)) {
		$forecast = true;
		$messages = [$request_urls[0]];
		$fd = $messages[0]['data']['items'][0]; // push forecast data
	}

?>

<!--	<div class="met-callout met-callout-info" >
		<?php //foreach($messages as $idx => $val): ?>
		<a  <?php echo $val['new_page'] ? 'href="'.$val['action_url'].'" target="_blank"' : '' ;?>  data-href="<?php echo $val['action_url'];?>" id="info_b" ><?php echo $val['title']; ?></a>
		<?php //endforeach; ?>
	</div>-->
<?php  if(count($hard_coded_messages[0]) >0): ?>	
<div class="met-callout met-callout-warning" >
	<?php foreach($hard_coded_messages as $hcm): ?>
	<p style="font-size: 18px; "><a href="<?php echo $hcm['link']; ?>" ><?php echo $hcm['title']; ?></a></p>
	<?php endforeach; ?>
        </div>
<?php endif; ?>
</div>
<!-- end ad-banner -->

<!-- public forecast modal -->
<?php if($forecast): ?>
<?php include SERVER_ROOT."templates/layouts/_modal_forecast.php"; ?>
<?php endif; ?>

<!-- communications modal -->
<?php if(!empty($messages)): ?>
<?php include SERVER_ROOT.'templates/layouts/_modal_comm.php'; ?>
<?php endif; ?>
