<?php
	$breadcrumb = $cms->getBreadcrumb(true);
?>
<div class="container mt-2">
<nav aria-label="breadcrumb">
	<!--<h2 class="nav_heading">Breadcrumb Navigation</h2>-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?=$item["link"]?>" ><a href="<?=WWW_ROOT?>" class="breadcrumb_nav_link home">Home</a>
	</li>
	<?php
		$i = 0;
		$count = count($breadcrumb);
		
		foreach ($breadcrumb as $item) {
			$i++;
	?>
	
		<?php
			if ($i == $count) {
		?>
		<li class="breadcrumb-item active" aria-current="page"><?=$item["title"]?></li>
		<?php
			} else {
		?>
                <li class="breadcrumb-item"><a href="<?=$item["link"]?>" ><?=$item["title"]?></a></li>
		<?php
			}
		?>
	
	<?php
		}
	?>
        </ol>
</nav>
</div>