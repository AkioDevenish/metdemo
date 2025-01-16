<?php
$primary_nav = $cms->getNavByParent(0,2);
	$secondary_nav = $cms->getSetting("navigation-secondary");
	$social_nav = $cms->getSetting("navigation-social");

	$navigation_options = [
		"type"    => "reveal",
		"gravity" => "right"
	];
?>

<footer class="page-footer">
	<section class="section pre-footer-minimal bg-style-1 novi-background bg-image">
		<div class="container text-center text-sm-left">
			<div class="row justify-content-sm-center spacing-55">
				<div class="col-sm-4 col-lg-2">
					<div class="footer-links">
						<h6>NAVIGATION</h6>
						<ul>
							<li><a href="#">Our Services</a></li>
							<li><a href="#">Forecast</a></li>
							<li><a href="#">Warnings</a></li>
							<li><a href="#">Climate</a></li>
							<li><a href="#">Observations</a></li>
						</ul>
					</div>
				</div>

				<div class="col-sm-4 col-lg-2">
					<div class="footer-links">
						<h6>MEDIA</h6>
						<ul>
							<li><a href="#">Alert</a></li>
							<li><a href="#">Media Release</a></li>
							<li><a href="#">Communications</a></li>
						</ul>
					</div>
				</div>

				<div class="col-sm-12 col-lg-4">
					<div class="footer-links">
						<h6>Contact Us</h6>
						<ul class="addresss-info">
							<li>
								<i class="fa fa-map-marker"></i>
								<p class="bg-style-1 text-white-50">Rawinsonde Building Golden Grove Road Piarco Arouca 350470 Trinidad and Tobago</p>
							</li>
							<li>
								<i class="fa fa-phone"></i>
								<a href="callto:#+1 (868) 669 5465">+1 868-669-5465</a>
							</li>
							<li>
								<i class="fa fa-phone"></i>
								<a href="callto:#+1 (868) 669 3964">+1 868-669-3964</a>
							</li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<a href="mailto:#info@yourdomain.com">DirMetTT@metoffice.gov.tt</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-sm-12 col-lg-4">
					<div class="footer-links">
						<h6>Newsletter</h6>
						<p class="bg-style-1 text-white-50 mb-4">Enter your e-mail to get the latest news and latest updates from Us.</p>
						<form class="mailform form-bordered form-centered" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php" novalidate="novalidate">
							<div class="form-group">
								<label class="form-label rd-input-label" for="footer-subscribe-email">Your e-mail address</label>
								<input class="form-control form-control-has-validation form-control-last-child" id="footer-subscribe-email" type="email" name="email" data-constraints="@Email @Required">
								<span class="form-validation"></span>
							</div>
							<button  class="btn btn-primary w-100 py-2 btn-effect-ujarak" type="submit">
								Subscribe
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
    <div class="container">
      <hr class="gray">
    </div>
	</section>

	<section class="page-footer-default bg-style-1 copyright novi-background bg-image" style="margin-bottom: -25px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 text-xl-left">
					<p class="rights bg-style-1 text-white-50">© 2024 Trinidad and Tobago Meteorological Service - All rights reserved.</p>
				</div>
				<div class="col-lg-6 text-xl-right">
					<ul class="inline-list-xxs">
						<li><a class="icon novi-icon icon-xxs icon-circle icon-trout-outline icon-effect-1 fa fa-instagram" href="#"></a></li>
						<li><a class="icon novi-icon icon-xxs icon-circle icon-trout-outline icon-effect-1 fa fa-facebook" href="https://www.facebook.com/pages/Trinidad-and-Tobago-Meteorological-Service/270032093113015"></a></li>
						<li><a class="icon novi-icon icon-xxs icon-circle icon-trout-outline icon-effect-1 fa fa-twitter" href="https://twitter.com/TTMetOffice"></a></li>
						<li><a class="icon novi-icon icon-xxs icon-circle icon-trout-outline icon-effect-1 fa fa-youtube" href="https://www.youtube.com/channel/UC34kXnLqDnA7srLzN9MUMDw"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
</footer>

<div class="snackbars" id="form-output-global"></div>
<script async src="https://www.youtube.com/iframe_api"></script>
<script src="<?=$www_root?>js/core.min.js"></script>
<script src="<?=$www_root?>js/script.js"></script>
<script src="<?=$www_root?>js/carousel.js"></script>

<!-- Scroll to top button -->
<a class="scroll-to-top" href="#"></a>

</body>
</html>