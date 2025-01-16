<!--<style>
	.modal-body a { color: #357cce }
</style>-->
<?php foreach($messages as $message): ?>
<?php if($message['type'] == 'communications'): ?>
<div class="row">
		        <div class="col-md-12 text-justify">
					<h2 class="text-center" ><strong><u><?php echo $message['data']['title']; ?></u></strong></h2>
					<?php if($message['data']['headline']): ?>
					<h3 class="text-center" style="font-size: 18px; ">
						<strong><?php echo $message['data']['headline']; ?></strong>
					</h3>
					<?php endif; ?>
					<?php echo $message['data']['content']; ?>
				</div>

				<div class="col-md-12">
					<br>
					<p class="strong">
						<?php echo $message['data']['author']; ?><br>
						<?php echo $message['data']['role']; ?>
					</p>
				</div>
				<div class="clearfix"></div>
      	
</div>
<?php endif; ?>
<?php endforeach; ?>
