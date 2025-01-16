<?php
$file = "https://metproducts.gov.tt/ttms/public/api/cap/alerts";
$data = file_get_contents($file);
$alert = json_decode($data, true);
//var_dump($alert['alerts'][0]['headline']);
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
<title>Met Office - Trinidad and Tobago</title>
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="<?=$www_root?>images/Met_Logo-85_0.png">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:100,300,400,700,900">
<!--<link rel=preload href="https://c.tadst.com/com/common/global_25.css" as=style>-->


<link rel="stylesheet" href="<?=$www_root?>css/bootstrap.css">
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="<?=$www_root?>css/style.css">
<link rel="stylesheet" href="<?=$www_root?>css/custom.css">
<link rel="stylesheet" href="<?=$www_root?>css/novi.css">

<!--[if lt IE 10]><div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="<?=$www_root?>images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div><script src="<?=$www_root?>js/html5shiv.min.js"></script><![endif]-->
</head>
<body>
    <script src="<?=$www_root?>js/d3.v7.min.js"></script>
<!--<div class="page-loader">
  <div class="brand-name"><img src="<?=$www_root?>images/Met_Logo-85_0.png" alt="" width="100" height="50"></div>
  <div class="page-loader-body">
    <div class="cssload-jumping"><span></span><span></span><span></span><span></span><span></span></div>
  </div>
</div>-->
<div class="page text-center">
  <section class="section">
    <header class="page-header">
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-transparent" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-lg-layout="rd-navbar-static" data-body-class="rd-navbar-absolute-linked" data-stick-up-clone="false" data-md-stick-up-offset="72px" data-lg-stick-up-offset="72px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true">
          <div class="rd-navbar-top-panel novi-background">
            <div class="rd-navbar-top-panel-toggle" data-rd-navbar-toggle=".rd-navbar-top-panel"><span></span></div>
            <div class="rd-navbar-top-panel-content">
              <div class="rd-navbar-top-panel-content-inner">
                <ul class="inline-list-xs">
                  <li><a class="icon novi-icon icon-xs icon-white fa fa-facebook" href="https://www.facebook.com/pages/Trinidad-and-Tobago-Meteorological-Service/270032093113015"></a></li>
                  <li><a class="icon novi-icon icon-xs icon-white fa fa-twitter" href="https://twitter.com/TTMetOffice"></a></li>
             
                  <li><a class="icon novi-icon icon-xs icon-white fa fa-youtube" href="https://www.youtube.com/channel/UC34kXnLqDnA7srLzN9MUMDw"></a></li>
                </ul>
                <address class="contact-info">
                Piarco Trinidad
                </address>
              </div>
              <div class="object-inline"><span class="icon novi-icon icon-sm icon-gray material-icons-phone"></span><a class="link link-sm link-white" href="callto:#">+1 (868)-669-5465</a></div>
            </div>
          </div>
          <?php if(isset($alert['alerts'])):
     foreach ($alert['alerts'] as $a_m):
          ?>
            <div class="fade show" role="alert" style=" background-color:<?=$a_m['assessment_color_hex']?>;"><a href="https://<?=$www_root?>/metdemo/site/demo/alert" class="text-white" role="alert"><strong><?=$a_m['headline'];?></strong></a>
        
      </div>
            <?php endforeach;?>
<!--                      <div class="rd-navbar-top-panel novi-background ">
            <div class="rd-navbar-top-panel-toggle" data-rd-navbar-toggle=".rd-navbar-top-panel"><span></span></div>
            <div class="rd-navbar-top-panel-content">
              <div class="rd-navbar-top-panel-content-inner">
                <ul class="inline-list-xs">
                  <li><a class="icon novi-icon icon-xs icon-white fa fa-facebook" href="#"></a></li>
                  <li><a class="icon novi-icon icon-xs icon-white fa fa-twitter" href="#"></a></li>
                  <li><a class="icon novi-icon icon-xs icon-white fa fa-google-plus" href="#"></a></li>
                  <li><a class="icon novi-icon icon-xs icon-white fa fa-pinterest-p" href="#"></a></li>
                </ul>
                <address class="contact-info">
                Piarco Trinidad
                </address>
              </div>
              <div class="object-inline"><span class="icon novi-icon icon-sm icon-gray material-icons-phone"></span><a class="link link-sm link-white" href="callto:#">+1 (868)-669-5465</a></div>
            </div>
          </div>-->
            
            <?php endif; ?>
          <div class="rd-navbar-inner">
            <div class="rd-navbar-panel">
              <div class="rd-navbar-panel-background">
                <div class="rd-navbar-panel-background-inner novi-background"></div>
              </div>
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <div class="rd-navbar-brand"><a class="brand-name" href="<?=$www_root?>"><img src="<?=$www_root?>images/Met_Logo-85_0.png" alt="" width="100" height="28"></a></div>
            </div>
            <div class="rd-navbar-nav-wrap">
              <div class="rd-navbar-nav-wrap-bg">
                <div class="rd-navbar-nav-wrap-bg-inner novi-background"></div>
              </div>
              <ul class="rd-navbar-nav">
                   <li class="rd-navbar--has-dropdown rd-navbar-submenu"><a href="#">Observations</a></a>
                  <ul class="rd-navbar-dropdown">
                   
                    <li><a class="fa fa-angle-right" href="<?=$www_root?>observations/satellite-imagery"> Satellite Imagery</a></li>
                    <li><a class="fa fa-angle-right" href="<?=$www_root?>observations/feels-like-index"> Feels Like Index</a></li>
                    <li><a class="fa fa-angle-right" href="<?=$www_root?>observations/automatic-weather-stations"> Automatic Weather Station</a></li>
                    
                  </ul>
                </li>
                <li class="rd-navbar-items-list"><a href="<?=$www_root?>forecast">Forecast</a>         </li>
                <li class="rd-navbar-items-list"><a href="<?=$www_root?>warnings">Warnings</a>         </li>
                <li class="rd-navbar-items-list"><a href="<?=$www_root?>climate">Climate</a>         </li>
                
          
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
  <!--  <section>
      <div class="swiper-bg-wrap swiper-style-1">
        <div class="swiper-container swiper-slider swiper-bg swiper-height-1" data-autoplay="5000" data-slide-effect="fade">
          <div class="swiper-wrapper">
            <div class="swiper-slide" data-slide-bg="images/slide-1-2-4.jpg">
              <div class="swiper-slide-caption" data-speed="0.5" data-fade="true">
                <div class="jumbotron-custom jumbotron-custom-variant-1 context-dark">
                  <hr class="divider-sm divider-success" data-caption-animate="fxRotateInLeft" data-caption-delay="50">
                  <h1 data-caption-animate="fxRotateInRight" data-caption-delay="150">MultiPurpose Templates</h1>
                  <p class="subtitle-variant-3" data-caption-animate="fxRotateInLeft" data-caption-delay="350">We Provide Mobile Applications</p>
                  <a class="btn btn-white-outline btn-lg btn-aqil btn-aqil--mod-1" href="#" data-caption-animate="fxRotateInRight" data-caption-delay="550"><span>Buy this template</span></a></div>
              </div>
            </div>
            <div class="swiper-slide" data-slide-bg="images/slide-6-1-15.jpg">
              <div class="swiper-slide-caption" data-speed="0.5" data-fade="true">
                <div class="jumbotron-custom jumbotron-custom-variant-1 context-dark">
                  <hr class="divider-sm divider-success" data-caption-animate="fxRotateInLeft" data-caption-delay="50">
                  <h1 data-caption-animate="fxRotateInRight" data-caption-delay="150">New Stunning Layouts</h1>
                  <p class="subtitle-variant-3" data-caption-animate="fxRotateInLeft" data-caption-delay="350">beautiful websites with a clean and stunning look</p>
                  <a class="btn btn-white-outline btn-lg btn-aqil btn-aqil--mod-1" href="#" data-caption-animate="fxRotateInRight" data-caption-delay="550"><span>Buy this template</span></a></div>
              </div>
            </div>
            <div class="swiper-slide" data-slide-bg="images/slide-13-1-5.jpg">
              <div class="swiper-slide-caption" data-speed="0.5" data-fade="true">
                <div class="jumbotron-custom jumbotron-custom-variant-1 context-dark">
                  <hr class="divider-sm divider-success" data-caption-animate="fxRotateInLeft" data-caption-delay="50">
                  <h1 data-caption-animate="fxRotateInRight" data-caption-delay="150">Fully Responsive Template</h1>
                  <p class="subtitle-variant-3" data-caption-animate="fxRotateInLeft" data-caption-delay="350">We Provide Mobile Applications</p>
                  <a class="btn btn-white-outline btn-lg btn-aqil btn-aqil--mod-1" href="#" data-caption-animate="fxRotateInRight" data-caption-delay="550"><span>Buy this template</span></a></div>
              </div>
            </div>
          </div>
          <div class="swiper-button-prev"><span>Prev</span></div>
          <div class="swiper-button-next"><span>Next</span></div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section> -->
    <section>
      <div class="bg-image novi-background page-title page-title-custom" style="background-image: url(<?=$www_root?>/images/slide-28-1-1918x591.jpg);">
        <div class="page-title-text"></div>
      </div>
      
    </section>
  </section>