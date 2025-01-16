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
        <div class="pre-footer-minimal-inner">
            <div class="container text-center text-sm-left">
                <div class="row justify-content-sm-center spacing-55">
                    <div class="col-sm-4 col-lg-2">
                        <div class="footer-links">
                            <h6>Navigation</h6>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Brand and Copyright Section -->
                    <div class="container">
                        <div class="row copyright style-1">
                            <div class="col-lg-6 text-xl-left">
                                <div class="brand-sm">
                                    <a href="<?=$www_root?>">
                                        <img src="<?=$www_root?>images/Met_Logo-85_0.png" alt="">
                                    </a>
                                </div>
                                <?php foreach ($primary_nav as $item) { ?>
                                    <div class="main_nav_item">
                                        <a href="<?=$item["link"]?>" 
                                           class="main_nav_link<?php if (strpos($current_url, $item["link"]) !== false) { ?> active<?php } ?>"
                                           <?php if ($item["new_window"]) { ?> target="_blank"<?php } ?>>
                                            <?=$item["title"]?>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-lg-6 text-xl-right">
                                <p class="rights">Copyright &copy; <?=date("Y")?></p>
                            </div>
                        </div>
                    </div>
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
</body>
</html>