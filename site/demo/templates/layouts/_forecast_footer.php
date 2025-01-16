<?php
$navigation_options = [
    "type"    => "reveal",
    "gravity" => "right"
];
?>
<footer class="page-footer">
    <section class="section pre-footer-minimal bg-style-1 novi-background bg-image">
        <div class="pre-footer-minimal-inner">
            <div class="container text-center text-sm-left">
                <div class="row justify-content-sm-center spacing-55">
                    <!-- Navigation Column -->
                    <div class="col-sm-4 col-lg-3">
                        <div class="footer-links">
                            <h6>NAVIGATION</h6>
                            <ul>
                                <li><a href="<?=$www_root?>">Home</a></li>
                                <li><a href="<?=$www_root?>about">About Us</a></li>
                                <li><a href="<?=$www_root?>services">Services</a></li>
                                <li><a href="<?=$www_root?>contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Services Column -->
                    <div class="col-sm-4 col-lg-3">
                        <div class="footer-links">
                            <h6>SERVICES</h6>
                            <ul>
                                <li><a href="<?=$www_root?>forecast">Forecast</a></li>
                                <li><a href="<?=$www_root?>warnings">Warnings</a></li>
                                <li><a href="<?=$www_root?>climate">Climate</a></li>
                                <li><a href="<?=$www_root?>observations">Observations</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Us Column -->
                    <div class="col-sm-12 col-lg-6">
                        <div class="footer-links">
                            <h6>Contact Us</h6>
                            <ul class="addresss-info">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <p>Rawinsonde Building Golden Grove Road<br>Piarco Arouca 350470<br>Trinidad and Tobago</p>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:+18686695465">+1 (868) 669-5465</a>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:+18686693964">+1 (868) 669-3964</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <a href="mailto:DirMetTT@metoffice.gov.tt">DirMetTT@metoffice.gov.tt</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <hr class="gray">
        </div>
    </section>
    <section class="page-footer-default bg-style-1 copyright novi-background bg-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-xl-left">
                    <p class="rights">© 2024 Trinidad and Tobago Meteorological Service - All rights reserved.</p>
                </div>
                <div class="col-lg-6 text-xl-right">
                    <ul class="inline-list-xxs">
                        <li>
                            <a class="icon novi-icon icon-xxs icon-circle icon-trout-outline icon-effect-1 fa fa-instagram" href="#"></a>
                        </li>
                        <li>
                            <a class="icon novi-icon icon-xxs icon-circle icon-trout-outline icon-effect-1 fa fa-facebook" href="#"></a>
                        </li>
                        <li>
                            <a class="icon novi-icon icon-xxs icon-circle icon-trout-outline icon-effect-1 fa fa-twitter" href="#"></a>
                        </li>
                        <li>
                            <a class="icon novi-icon icon-xxs icon-circle icon-trout-outline icon-effect-1 fa fa-google-plus" href="#"></a>
                        </li>
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