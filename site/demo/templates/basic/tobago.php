<?php
//$tell = $www_root;

date_default_timezone_set('America/port_of_spain');

//	$is_home = true;
$file = "https://metproducts.gov.tt/api/forecast";
$data = file_get_contents($file);
$result = json_decode($data, true);

$metar=file_get_contents("https://metproducts.gov.tt/api/metar");
$metar_result = json_decode($metar, true);
$now =[];
$metar_items = [
    "Temperature:","Dewpoint:","Pressure (altimeter):","Winds:","Conditions at:",
    ];
     $codes = ["TTCP","TTPP"];
                $station=[];
                foreach($codes as $code){
                foreach($metar_result['items'] as $m_result){
                	foreach($metar_items as $item){
                	   
                	if($m_result['station'] == $code and $m_result['label'] == $item){
                	    if($m_result['label']=="Conditions at:"){
                	        $date = new DateTime($m_result['value'], new DateTimeZone('UTC'));
                           
                            
                            $date->setTimezone(new DateTimeZone('America/Port_of_Spain'));
                          //  echo $date->format('Y-m-d H:i:sP') . "\n";
                	        $m_result['value']= $date->format('D M j G:i:s T Y');
                	    }
                		$station[$m_result['station']][$m_result['label']] = $m_result['value']; 
                
                	}
                	}
                }
}


$agro=file_get_contents("https://metproducts.gov.tt/ttms/public/api/agromet");
$agro_result = json_decode($agro, true);

$eln=file_get_contents("https://metproducts.gov.tt/ttms/public/api/elNino");
$eln_result = json_decode($eln, true);

$rto=file_get_contents("https://metproducts.gov.tt/ttms/public/api/rainTempOutlook");
$rto_result = json_decode($rto, true);

$dws= file_get_contents("https://metproducts.gov.tt/ttms/public/api/dryWetSpells");
$dws_result = json_decode($dws, true);


$forecast = $result['items'][0];
$days =[];
$day[0]['piarco']['max'] = $forecast["forecastTime"] == "04:00PM"  ? null : $forecast["PiarcoFcstMxTemp"];
$day[0]['piarco']['min'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["PiarcoMnTemp"] : $forecast["TmPiarcoMnTemp"];
$day[0]['tobago']['max'] = $forecast["forecastTime"] == "04:00PM"  ? null : $forecast["CrownFcstMxTemp"];
$day[0]['tobago']['min'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["CrownMnTemp"] : $forecast["TmCrownMnTemp"];
$day[0]['trini_icon']= $forecast['imageTrin'];
$day[0]['tbg_icon']= $forecast['imagebago'];

$day[1]['piarco']['max'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["TmPiarcoMxTemp"] : $forecast["maxTrin24look"];
$day[1]['piarco']['min'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["TmPiarcoMnTemp"] : $forecast["minTrin24look"];
$day[1]['tobago']['max'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["TmCrownMxTemp"] : $forecast["maxTob24look"];
$day[1]['tobago']['min'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["TmCrownMnTemp"] : $forecast["minTob24look"];
$day[1]['trini_icon']= $forecast['wx24'];
$day[1]['tbg_icon']= $forecast['wx24cp'];

$day[2]['piarco']['max'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["maxTrin24look"] : $forecast["maxTrin48look"];
$day[2]['piarco']['min'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["minTrin24look"] : $forecast["minTrin48look"];
$day[2]['tobago']['max'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["maxTob24look"] : $forecast["maxTob48look"];
$day[2]['tobago']['min'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["minTob24lookv"] : $forecast["minTob48look"];
$day[2]['trini_icon']= $forecast['wx48'];
$day[2]['tbg_icon']= $forecast['wx48cp'];

if(isset($forecast["maxTrin72look"])){
$day[3]['piarco']['max'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["maxTrin48look"] : $forecast["maxTrin72look"];
$day[3]['piarco']['min'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["minTrin48look"] : $forecast["minTrin72look"];
$day[3]['tobago']['max'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["maxTob48look"] : $forecast["maxTob72look"];
$day[3]['tobago']['min'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["minTob48lookv"] : $forecast["minTob72ook"];
$day[3]['trini_icon']= $forecast['wx72'];
$day[3]['tbg_icon']= $forecast['wx72cp'];
}
if(isset($forecast["maxTrin96look"])){
$day[4]['piarco']['max'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["maxTrin72look"] : $forecast["maxTrin96look"];
$day[4]['piarco']['min'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["minTrin72look"] : $forecast["minTrin96look"];
$day[4]['tobago']['max'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["maxTob72look"] : $forecast["maxTob96look"];
$day[4]['tobago']['min'] = $forecast["forecastTime"] == "04:00PM"  ? $forecast["minTob72lookv"] : $forecast["minTob96ook"];
$day[4]['trini_icon']= $forecast['wx96'];
$day[4]['tbg_icon']= $forecast['wx96cp'];
}
$active = 0;
$count=0;

$tt_search = "trinidad";
$tb_search = "tobago";
$has_tt_conditions = false;
$has_tb_conditions = false;
$tb_conditions = "tb";
$tt_conditions = "tt";

if(stripos($forecast['forecastArea1'],$tt_search)!==false):
    $has_tt_conditions = true;
     $tt_conditions = $forecast['textArea1'];
elseif(stripos($forecast['forecastArea2'],$tt_search)!==false):
    $has_tt_conditions = true;
    $tt_conditions = $forecast['textArea2'];
elseif(stripos($forecast['forecastArea3'],$tt_search)!==false):
    $has_tt_conditions = true;
    $tt_conditions = $forecast['textArea3'];
    else:
        $tt_conditions = "";
        endif;
$has_tb_conditions = false;
if(stripos($forecast['forecastArea1'],$tb_search)!==false):
    $has_tb_conditions = true;
    $tb_conditions = $forecast['textArea1'];
elseif(stripos($forecast['forecastArea2'],$tb_search)!==false):
    $has_tb_conditions = true;
    $tb_conditions = $forecast['textArea2'];
elseif(stripos($forecast['forecastArea3'],$tb_search)!==false):
    $has_tb_conditions = true;
    $tb_conditions = $forecast['textArea3'];
    else:
        $tb_conditions = "";
        endif;
//$tr_icon = $www_root."images/category/weather_icons/".strtolower(( $day[0]['trini_icon'])).".png";
//$tb_icon = $www_root."images/category/weather_icons/".strtolower(( $day[0]['tbg_icon'])).".png";

function get_icon($icon =""){
    $tell = $_SERVER["SCRIPT_URI"];
    $t_icon = $tell."images/category/weather_icons/".$icon.".png";
    
 
    $headers=get_headers($t_icon);

if(stripos($headers[0],"200 OK")){
   
}else{
    $t_icon = $tell."images/category/weather_icons/isolated showers.png";
}
return $t_icon;
}


//var_dump( $tb_conditions);
//var_dump(stripos($forecast['forecastArea1'],$tt_search));
//die;

	?>
	
  <div class="item">
        <article class = "post-minimal">
          <img class="post-minimal-image img-responsive" src="bg-image" alt="">
          <div class="post-minimal-image img-responsive">
            
          </div>
        </article> 
  </div>


<section class="section section-lg bg-default novi-background bg-image">
    <div class="container">
      <div class="row justify-content-center spacing-40">
        <div class="col-sm-10 col-md-12">
          <h3> <span class="heading-3">Forecast</span></h3>
        </div>
        <div class="col-sm-10 col-md-12">
           
        </div>


<div class="item">
  <article class = "post-minimal">
    <img class="post-minimal-image img-responsive" src="images/site-img8-2.jpg" alt="">
    <div class="post-minimal-image img-responsive">
      
    </div>
  </article> 
</div>
          
        </div>
        <div class="col-sm-10 col-md-12">
           <div class="tabs-custom tabs-horizontal tabs-line tabs-left" id="tabs-1">
            <ul class="nav nav-tabs">
              <li class="nav-item"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab" aria-expanded="true">Trinidad</a></li>
              <li class="nav-item"><a class="nav-link" href="#tabs-1-2" data-toggle="tab" aria-expanded="false">Tobago</a></li>
              <!--<li class="nav-item"><a class="nav-link" href="#tabs-1-3" data-toggle="tab" aria-expanded="false">OUR VISION</a></li>-->
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade in active show" id="tabs-1-1" aria-expanded="true">
                   <div class="row justify-content-center spacing-40">
              <div class="col-sm-3 col-md-4">
         <div id="qlook" class="bk-focus__qlook"><div class="h1">Now</div>
             <div class="mtt" data-mtt="<?=$forecast["imageTrin"]?>"> 
            
                 <img id="cur-weather" class="" title="" src="<?=get_icon($day[0]['trini_icon'])?>" width="80" height="80"></div>
                  <p><?=$forecast["imageTrin"]?></p>
             <div class="h3"><?=$station["TTPP"]["Temperature:"]?></div> 
           
             
             
             <?php
             $code = "TTPP";
                foreach($station[$code] as $label=>$value){
                		if($label !="Temperature:"){
                		?>
                		<p class="clear"><strong><?=$label?></strong> <?=$value?></p> 
                		
                		<?php
                   }
                	
                }
             ?>
         </div>
              </div>
              <div class="col-sm-9 col-md-8">
         <div class="bk-focus__info">
             
             <table class="table table--left table--inner-borders-rows">
                 <tbody>
                     <tr><th>Location: </th><td>Trinidad</td></tr>
                     <tr><th>Issuance Time: </th>
                         <td id="wtct"><?= $forecast["IssuedAt"]?></td></tr>
                     <tr><th>Latest Report: </th><td><?=$forecast["forecastTime"]?></td></tr>
                     <tr><th>Visibility: </th><td>8&nbsp;km</td></tr>
                     <tr><th>Seas: </th><td><?=$forecast["seas"]?></td></tr>
                     <?php if($has_tt_conditions==true): ?><tr><th>Conditions: </th><td><?=$tt_conditions?></td></tr><?php endif; ?>
                     <tr><th>Waves: </th><td><?=$forecast["waves1"]." and ".$forecast["waves2"]?></td></tr>
                     <?php if(($forecast["addMarine"]!=null)): ?><tr><th>Marine: </th><td><?=$forecast["addMarine"]?></td></tr><?php endif; ?>
                 </tbody></table>
         </div>
         </div>
         </div>
                         <div class="owl-carousel pricing-carousel" data-items="1" data-md-items="<?=count($day)?>" data-stage-padding="0" data-loop="false" data-margin="0" data-mouse-drag="false" data-dots="true">
               <?php  foreach($day as $d):
            ?>
            <div class="pricing-box-1 <?=$count == $active ? "active " : "" ?>">
              <div class="pricing-title"><?= date("D",strtotime("+".$count." day"))?></div>
              <div > <img src="<?=(get_icon( $d['trini_icon']))?>" alt="" width="150" height="150"> </div>
              <ul class="pricing-list">
                <li> <span>Max Temperature </span><?= $d["piarco"]["max"] == null ? "--" : $d["piarco"]["max"]  ?></li> 
             <li> <span>Min Temperature</span> <?=$d["piarco"]["min"] == null ? "--" : $d["piarco"]["min"]  ?></li>
              
           
              </ul>
              <hr class="pricing-divider">
             <!-- <div class="price-wrap"> <span class="price">45</span> <span>per month</span> </div>
              <a class="btn btn-gray-5" href="#">get started</a> 
              -->
              </div>
              
          <?php $count++;
              endforeach;
              $count =0;?>
           
              
          </div>
              </div>
              <div class="tab-pane fade" id="tabs-1-2" aria-expanded="false">
                    <div class="row justify-content-center spacing-40">
              <div class="col-sm-3 col-md-4">
         <div id="qlook" class="bk-focus__qlook"><div class="h1">Now</div>
             <div class="mtt" data-mtt="<?=$forecast["imagebago"]?>">
                 <img id="cur-weather" class="" title="" src="<?=get_icon($day[0]['tbg_icon'])?>" width="80" height="80"></div>
             <p><?=$forecast["imagebago"]?></p>
             <div class="h3"><?=$station["TTCP"]["Temperature:"]?></div> 
            
             <?php
             $code = "TTCP";
               foreach($station[$code] as $label=>$value){
                   if($label !="Temperature:"){
                		?>
                		<p class="clear"><strong><?=$label?></strong> <?=$value?></p> 
                		
                		<?php
                   }
                }
             ?>
         </div>
              </div>
               <div class="col-sm-9 col-md-8">
              <div class="bk-focus__info">
             
             <table class="table table--left table--inner-borders-rows">
                 <tbody><tr><th>Location: </th><td>Tobago</td></tr>
                     <tr><th>Issuance Time: </th>
                         <td id="wtct"><?= $forecast["IssuedAt"]?></td></tr>
                     <tr><th>Latest Report: </th><td><?=$forecast["forecastTime"]?></td></tr>
                     <tr><th>Visibility: </th><td>8&nbsp;km</td></tr>
                     <tr><th>Seas: </th><td><?=$forecast["seas"]?></td></tr>
                     <?php if($has_tb_conditions==true): ?><tr><th>Conditions: </th><td><?=$tb_conditions?></td></tr><?php endif; ?>
                     <tr><th>Waves: </th><td><?=$forecast["waves1"]." and ".$forecast["waves2"]?></td></tr>
                      <?php if(($forecast["addMarine"]!=null)): ?><tr><th>Marine: </th><td><?=$forecast["addMarine"]?></td></tr><?php endif; ?>
                 </tbody></table>
         </div>
               </div>
          </div>
                       <div class="owl-carousel pricing-carousel" data-items="1" data-md-items="<?=count($day)?>" data-stage-padding="0" data-loop="false" data-margin="0" data-mouse-drag="false" data-dots="true">
               <?php  foreach($day as $d):
            ?>
            <div class="pricing-box-1 <?=$count == $active ? "active " : "" ?>">
              <div class="pricing-title"><?= date("D",strtotime("+".$count." day"))?></div>
              <div > <img src="<?=get_icon($d['tbg_icon'])?>" alt="" width="150" height="150"> </div>
              <ul class="pricing-list">
                <li> <span>Max Temperature </span><?= $d["tobago"]["max"] == null ? "--" : $d["tobago"]["max"]  ?></li> 
             <li> <span>Min Temperature</span> <?=$d["tobago"]["min"] == null ? "--" : $d["tobago"]["min"]  ?></li>
              
           
              </ul>
              <hr class="pricing-divider">
             <!-- <div class="price-wrap"> <span class="price">45</span> <span>per month</span> </div>
              <a class="btn btn-gray-5" href="#">get started</a> 
              -->
              </div>
              
          <?php $count++;
              endforeach; 
              $count =0;
              ?>
           
              
          </div>
              </div>
<!--              <div class="tab-pane fade" id="tabs-1-3" aria-expanded="false">
                <p>Our vision is let's make lorem ipsum is simply text the printing and typesetting ornare nulla, id facilisis ut venenatis and molestie ipsum volutpat quis facilisis ut venenatis hendrerit cras standard industry your complete                     solution partner..</p>
              </div>-->
            </div>
          </div>   
        </div>
      </div>
    </div>
  </section>
 
  
<section class="section section-lg bg-default novi-background bg-image" style="background-color: rgb(245, 245, 245);">
    <div class="container">
      <div class="row justify-content-center spacing-30">
           <div class="col-sm-10 col-md-12">
          <h3> <span class="heading-3">Services</span></h3>
        </div>
        <div class="col-sm-10 col-lg-4 col-xl-4"><a href="<?=$www_root?>our-services/agro-met-bulletin-and-assessment-update" class="banner-box banner-box-variant-4">
          <figure class="wow fadeInUpSmall" style="visibility: visible; animation-name: fadeInUpSmall;"><img src="<?=$www_root?>images/category/fwservice_icons/agriculture.png" alt="" class="img-responsive"></figure>
          <div class=" wow fxRotateInLeft" style="visibility: visible; animation-name: rotateInLeft;">
            
            <!--<h6><?php $agro_result['headline']?></h6>-->
            
          </div>
          </a></div>
        <div class="col-sm-10 col-lg-4 col-xl-4"><a href="<?=$www_root?>our-services/dryness-drought-indicator-monitor-and-outlook" class="banner-box banner-box-variant-4">
          <figure class="wow fadeInUpSmall" style="visibility: visible; animation-name: fadeInUpSmall;"><img src="<?=$www_root?>images/category/fwservice_icons/dryness.png" alt="" class="img-responsive"></figure>
          <div class=" wow fxRotateInLeft" style="visibility: visible; animation-name: rotateInLeft;">
           
            <!--<h6><?php $dws_result['headline']?></h6>-->
            
          </div>
          </a></div>
            <div class="col-sm-10 col-lg-4 col-xl-4"><a href="<?=$www_root?>our-services/rainfall-and-temperature-outlook-update" class="banner-box banner-box-variant-4">
          <figure class="wow fadeInUpSmall" style="visibility: visible; animation-name: fadeInUpSmall;"><img src="<?=$www_root?>images/category/fwservice_icons/rainfall and temp.png" alt="" class="img-responsive"></figure>
          <div class="wow fxRotateInLeft" style="visibility: visible; animation-name: rotateInLeft;">
            
            <h6><?php //$rto_result['headline']?></h6>
            
          </div>
          </a></div>
        <div class="col-sm-10 col-lg-4 col-xl-4"><a href="<?=$www_root?>our-services/enso-monitor-update" class="banner-box banner-box-variant-4">
          <figure class="wow fadeInUpSmall" style="visibility: visible; animation-name: fadeInUpSmall;"><img src="<?=$www_root?>images/category/fwservice_icons/enso.png" alt="" class="img-responsive"></figure>
          <div class="wow fxRotateInLeft" style="visibility: visible; animation-name: rotateInLeft;">
            
            <h6><?php //$eln_result['elnino']['headline']?></h6>
            
          </div>
          </a></div>
            <div class="col-sm-10 col-lg-4 col-xl-4"><a href="<?=$www_root?>our-services/climate-data" class="banner-box banner-box-variant-4">
          <figure class="wow fadeInUpSmall" style="visibility: visible; animation-name: fadeInUpSmall;"><img src="<?=$www_root?>images/category/fwservice_icons/climate data.png" alt="" class="img-responsive"></figure>
          <div class=" wow fxRotateInLeft" style="visibility: visible; animation-name: rotateInLeft;">
            
              <!--<h6>Climate Data</h6>-->
          </div>
          </a></div>
        <div class="col-sm-10 col-lg-4 col-xl-4"><a href="<?=$www_root?>our-services/tourism" class="banner-box banner-box-variant-4">
          <figure class="wow fadeInUpSmall" style="visibility: visible; animation-name: fadeInUpSmall;"><img src="<?=$www_root?>images/category/fwservice_icons/tourism.png" alt="" class="img-responsive"></figure>
          <div class="wow fxRotateInLeft" style="visibility: visible; animation-name: rotateInLeft;">
            
<!--            <h6>Tourism</h6>-->
            
          </div>
          </a></div>
      </div>
    </div>
  </section>