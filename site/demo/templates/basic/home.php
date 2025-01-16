<?php
//$tell = $www_root;
// set expires header
//header('Expires: Thu, 1 Jan 1970 00:00:00 GMT');
//
//// set cache-control header
//header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
//header('Cache-Control: post-check=0, pre-check=0',false);
//
//// set pragma header
//header('Pragma: no-cache');

$total_data=null;

$is_old = true;
date_default_timezone_set('America/port_of_spain');
$dir = getcwd(). DIRECTORY_SEPARATOR."files". DIRECTORY_SEPARATOR."data". DIRECTORY_SEPARATOR;
$t_file = $dir.time(); 
$result =null;
$metar_result=null;
$agro_result = null;
$eln_result = null;
$rto_result = null;
$dws_result = null;
$warnings_results = null;

$mydir = opendir($dir);
    while(false !== ($file = readdir($mydir))) {
        if($file != "." && $file != "..") {
            chmod($dir.$file, 0775);
            if(is_dir($dir.$file)) {
              
            }
            else{
                if((time()-(int)$file) >3600){
                    unlink($dir.$file);
                
                }else{
                    $total_data = json_decode(file_get_contents($dir.$file), true);
                    $result =$total_data["forecast"];
                    $metar_result =$total_data["metar"];
                    $warnings_results = $total_data["ticker"];
               
                    $is_old = false;
                }
                
            }
        }
    }
    closedir($mydir);
    if($is_old === true){
        //	$is_home = true;
$file = "https://metproducts.gov.tt/api/forecast";
$data = file_get_contents($file);
$total_data["forecast"]=$result = json_decode($data, true);

$metar=file_get_contents("https://metproducts.gov.tt/api/metar");
$total_data["metar"]=$metar_result = json_decode($metar, true);


//$agro=file_get_contents("https://metproducts.gov.tt/ttms/public/api/agromet");
//$total_data["agromet"]=$agro_result = json_decode($agro, true);
//
//$eln=file_get_contents("https://metproducts.gov.tt/ttms/public/api/elNino");
//$total_data["elNino"]=$eln_result = json_decode($eln, true);
//
//$rto=file_get_contents("https://metproducts.gov.tt/ttms/public/api/rainTempOutlook");
//$total_data["rainTempOutlook"]=$rto_result = json_decode($rto, true);
//
//$dws= file_get_contents("https://metproducts.gov.tt/ttms/public/api/dryWetSpells");
//$total_data["dryWetSpells"]=$dws_result = json_decode($dws, true);
//
$warnings = file_get_contents("https://metproducts.gov.tt/ttms/public/api/cap/ticker");
$total_data["ticker"]=$warnings_results = json_decode($warnings, true);

$jsonData = json_encode($total_data);

$fp = fopen($t_file, 'w');
fwrite($fp, $jsonData);
fclose($fp);

    }




$now =[];
$metar_items = [
    "Temperature:","Dewpoint:","Pressure (altimeter):","Winds:","Conditions at:","Visibility:",
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
                	        $m_result['value']= $date->format('D M j G:i:s T');
                	    }
                		$station[$m_result['station']][$m_result['label']] = $m_result['value']; 
                
                	}
                	}
                }
}

$home_forecast = $result['items'][0];

$days =[];
$day[0]['piarco']['max'] = $home_forecast["forecastTime"] == "04:00PM"  ? null : $home_forecast["PiarcoFcstMxTemp"];
$day[0]['piarco']['min'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["PiarcoMnTemp"] : $home_forecast["PiarcoMnTemp"];
$day[0]['tobago']['max'] = $home_forecast["forecastTime"] == "04:00PM"  ? null : $home_forecast["CrownFcstMxTemp"];
$day[0]['tobago']['min'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["CrownMnTemp"] : $home_forecast["CrownMnTemp"];
$day[0]['trini_icon']= $home_forecast['imageTrin'];
$day[0]['tbg_icon']= $home_forecast['imagebago'];

$day[1]['piarco']['max'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["TmPiarcoMxTemp"] : $home_forecast["maxTrin24look"];
$day[1]['piarco']['min'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["TmPiarcoMnTemp"] : $home_forecast["minTrin24look"];
$day[1]['tobago']['max'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["TmCrownMxTemp"] : $home_forecast["maxTob24look"];
$day[1]['tobago']['min'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["TmCrownMnTemp"] : $home_forecast["minTob24look"];
$day[1]['trini_icon']= $home_forecast['wx24'];
$day[1]['tbg_icon']= $home_forecast['wx24cp'];

$day[2]['piarco']['max'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["maxTrin24look"] : $home_forecast["maxTrin48look"];
$day[2]['piarco']['min'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["minTrin24look"] : $home_forecast["minTrin48look"];
$day[2]['tobago']['max'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["maxTob24look"] : $home_forecast["maxTob48look"];
$day[2]['tobago']['min'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["minTob24lookv"] : $home_forecast["minTob48look"];
$day[2]['trini_icon']= $home_forecast['wx48'];
$day[2]['tbg_icon']= $home_forecast['wx48cp'];

if(isset($home_forecast["maxTrin72look"])){
$day[3]['piarco']['max'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["maxTrin48look"] : $home_forecast["maxTrin72look"];
$day[3]['piarco']['min'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["minTrin48look"] : $home_forecast["minTrin72look"];
$day[3]['tobago']['max'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["maxTob48look"] : $home_forecast["maxTob72look"];
$day[3]['tobago']['min'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["minTob48lookv"] : $home_forecast["minTob72ook"];
$day[3]['trini_icon']= $home_forecast['wx72'];
$day[3]['tbg_icon']= $home_forecast['wx72cp'];
}
if(isset($home_forecast["maxTrin96look"])){
$day[4]['piarco']['max'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["maxTrin72look"] : $home_forecast["maxTrin96look"];
$day[4]['piarco']['min'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["minTrin72look"] : $home_forecast["minTrin96look"];
$day[4]['tobago']['max'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["maxTob72look"] : $home_forecast["maxTob96look"];
$day[4]['tobago']['min'] = $home_forecast["forecastTime"] == "04:00PM"  ? $home_forecast["minTob72lookv"] : $home_forecast["minTob96ook"];
$day[4]['trini_icon']= $home_forecast['wx96'];
$day[4]['tbg_icon']= $home_forecast['wx96cp'];
}
$active = 0;
$count=0;

$tt_search = "trinidad";
$tb_search = "tobago";
$has_tt_conditions = false;
$has_tb_conditions = false;
$tb_conditions = "tb";
$tt_conditions = "tt";

if(stripos($home_forecast['forecastArea1'],$tt_search)!==false):
    $has_tt_conditions = true;
     $tt_conditions = $home_forecast['textArea1'];
elseif(stripos($home_forecast['forecastArea2'],$tt_search)!==false):
    $has_tt_conditions = true;
    $tt_conditions = $home_forecast['textArea2'];
elseif(stripos($home_forecast['forecastArea3'],$tt_search)!==false):
    $has_tt_conditions = true;
    $tt_conditions = $home_forecast['textArea3'];
    else:
        $tt_conditions = "";
        endif;
$has_tb_conditions = false;
if(stripos($home_forecast['forecastArea1'],$tb_search)!==false):
    $has_tb_conditions = true;
    $tb_conditions = $home_forecast['textArea1'];
elseif(stripos($home_forecast['forecastArea2'],$tb_search)!==false):
    $has_tb_conditions = true;
    $tb_conditions = $home_forecast['textArea2'];
elseif(stripos($home_forecast['forecastArea3'],$tb_search)!==false):
    $has_tb_conditions = true;
    $tb_conditions = $home_forecast['textArea3'];
    else:
        $tb_conditions = "";
        endif;

       
function get_icon($icon ="", $home_forecast = null){
    $icon = strtolower($icon);
    $t_icon="";
    
    // Use $www_root instead of $_SERVER["SCRIPT_URI"]
    global $www_root;
    
    if($home_forecast["forecastTime"]=="05:30PM" or (date("H")>"17")){
        $t_icon = $www_root."images/category/weather_icons/".$icon." night.png";
    }else{
        $t_icon = $www_root."images/category/weather_icons/".$icon.".png";
    }
 
    $headers=get_headers($t_icon);

    if(stripos($headers[0],"200 OK")){
   
    }else{
        if($home_forecast["forecastTime"]=="05:30PM" or (date("H")>"17")){
            $t_icon = $www_root."images/category/weather_icons/night partly cloudy with a few showers.png";
        }else{
            $t_icon = $www_root."images/category/weather_icons/isolated showers.png";
        }
    }
    return $t_icon;
}

function get_icon_day($icon =""){
    $icon = strtolower($icon);
    $tell = $_SERVER["SCRIPT_URI"];
    $t_icon="";
   
        $t_icon = $tell."images/category/weather_icons/".$icon.".png";
   
    $headers=get_headers($t_icon);

if(stripos($headers[0],"200 OK")){
   
}else{
    
    $t_icon = $tell."images/category/weather_icons/isolated showers.png";
  
}
return $t_icon;
}

	?>
	

    <section class="section section-lg bg-default novi-background bg-image">
    <div class="container">
        <div class="row justify-content-center spacing-40">
            <div class="col-sm-10 col-md-12">
                <div class="tabs-custom tabs-horizontal tabs-line tabs-left" id="tabs-1">
                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab" aria-expanded="true">Trinidad</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tabs-1-2" data-toggle="tab" aria-expanded="false">Tobago</a></li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- Trinidad Tab -->
                        <div class="tab-pane fade in active show" id="tabs-1-1" aria-expanded="true">
                            <!-- NOW Section -->
                            <section class="weather-now-section">
                                <div class="row justify-content-center spacing-40">
                                    <div class="col-sm-3 col-md-4">
                                        <div id="qlook" class="bk-focus__qlook">
                                            <div class="h1">Now</div>
                                            <div class="mtt" data-mtt="<?=$home_forecast["imageTrin"]?>">
                                                <img id="cur-weather" src="<?=get_icon($day[0]['trini_icon'], $home_forecast)?>" width="100" height="100">
                                            </div>
                                            <p><?=$home_forecast["imageTrin"]?></p>
                                            <p><?=$station["TTPP"]["Temperature:"]?></p>
                                            <?php
                                            $code = "TTPP";
                                            if(isset($station[$code])){
                                                foreach($station[$code] as $label=>$value){
                                                    if($label !="Temperature:" || $label !="Visibility:" ){
                                                        echo "<p class='clear'><strong>$label</strong> $value</p>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <!-- FORECAST Section -->
                                    <div class="col-sm-9 col-md-8">
                                        <div class="bk-focus__info">
                                            <h1>Forecast</h1>
                                            <table class="table table--left table--inner-borders-rows">
                                                <tbody>
                                                    <tr><th>Location: </th><td>Trinidad</td></tr>
                                                    <tr><th>Issuance Time: </th><td id="wtct"><?= $home_forecast["IssuedAt"]?></td></tr>
                                                    <tr><th>Latest Report: </th><td><?=$home_forecast["forecastTime"]?></td></tr>
                                                    <tr><th>Visibility: </th><td><?= $station[$code]['Visibility:']; ?></td></tr>
                                                    <tr><th>Seas: </th><td><?=$home_forecast["seas"]?></td></tr>
                                                    <?php if($has_tt_conditions==true): ?>
                                                        <tr><th>Conditions: </th><td><?=$tt_conditions?></td></tr>
                                                    <?php endif; ?>
                                                    <tr><th>Waves: </th><td><?=$home_forecast["waves1"]." and ".$home_forecast["waves2"]?></td></tr>
                                                    <?php if(($home_forecast["addMarine"]!=null)): ?>
                                                        <tr><th>Marine: </th><td><?=$home_forecast["addMarine"]?></td></tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- CAROUSEL Section -->
                            <section class="weather-carousel-section">
                                <div class="owl-carousel pricing-carousel" data-items="1" data-md-items="<?=count($day)?>" data-stage-padding="0" data-loop="false" data-margin="0" data-mouse-drag="false" data-dots="true">
                                    <?php foreach($day as $d): ?>
                                        <div class="pricing-box-1 <?=$count == $active ? "active " : "" ?>">
                                            <div class="pricing-title"><?= date("D",strtotime("+".$count." day"))?></div>
                                            <div>
                                                <img src="<?=get_icon($d['trini_icon'], $home_forecast)?>" alt="" width="150" height="150">
                                            </div>
                                            <ul class="pricing-list">
                                                <li><span>Max Temperature </span><?= $d["piarco"]["max"] == null ? "--" : $d["piarco"]["max"] ?></li>
                                                <li><span>Min Temperature</span> <?=$d["piarco"]["min"] == null ? "--" : $d["piarco"]["min"] ?></li>
                                            </ul>
                                            <hr class="pricing-divider">
                                        </div>
                                    <?php 
                                        $count++;
                                        endforeach;
                                        $count = 0;
                                    ?>
                                </div>
                            </section>
                        </div>

                        <!-- Tobago Tab -->
                        <div class="tab-pane fade" id="tabs-1-2" aria-expanded="false">
                            <!-- NOW Section -->
                            <section class="weather-now-section">
                                <div class="row justify-content-center spacing-40">
                                    <div class="col-sm-3 col-md-4">
                                        <div id="qlook" class="bk-focus__qlook">
                                            <div class="h1">Now</div>
                                            <div class="mtt" data-mtt="<?=$home_forecast["imagebago"]?>">
                                                <img id="cur-weather" src="<?=get_icon($day[0]['tbg_icon'], $home_forecast)?>" width="100" height="100">
                                            </div>
                                            <p><?=$home_forecast["imagebago"]?></p>
                                            <p><?=$station["TTCP"]["Temperature:"]?></p>
                                            <?php
                                            $code = "TTCP";
                                            if(isset($station[$code])){
                                                foreach($station[$code] as $label=>$value){
                                                    if($label !="Temperature:" || $label !="Visibility:" ){
                                                        echo "<p class='clear'><strong>$label</strong> $value</p>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <!-- FORECAST Section -->
                                    <div class="col-sm-9 col-md-8">
                                        <div class="bk-focus__info">
                                            <h1>Forecast</h1>
                                            <table class="table table--left table--inner-borders-rows">
                                                <tbody>
                                                    <tr><th>Location: </th><td>Tobago</td></tr>
                                                    <tr><th>Issuance Time: </th><td id="wtct"><?= $home_forecast["IssuedAt"]?></td></tr>
                                                    <tr><th>Latest Report: </th><td><?=$home_forecast["forecastTime"]?></td></tr>
                                                    <tr><th>Visibility: </th><td><?= $station[$code]['Visibility:']; ?></td></tr>
                                                    <tr><th>Seas: </th><td><?=$home_forecast["seas"]?></td></tr>
                                                    <?php if($has_tb_conditions==true): ?>
                                                        <tr><th>Conditions: </th><td><?=$tb_conditions?></td></tr>
                                                    <?php endif; ?>
                                                    <tr><th>Waves: </th><td><?=$home_forecast["waves1"]." and ".$home_forecast["waves2"]?></td></tr>
                                                    <?php if(($home_forecast["addMarine"]!=null)): ?>
                                                        <tr><th>Marine: </th><td><?=$home_forecast["addMarine"]?></td></tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- CAROUSEL Section -->
                            <section class="weather-carousel-section">
                                <div class="owl-carousel pricing-carousel" data-items="1" data-md-items="<?=count($day)?>" data-stage-padding="0" data-loop="false" data-margin="0" data-mouse-drag="false" data-dots="true">
                                    <?php foreach($day as $d): ?>
                                        <div class="pricing-box-1 <?=$count == $active ? "active " : "" ?>">
                                            <div class="pricing-title"><?= date("D",strtotime("+".$count." day"))?></div>
                                            <div>
                                                <img src="<?=get_icon($d['tbg_icon'], $home_forecast)?>" alt="" width="150" height="150">
                                            </div>
                                            <ul class="pricing-list">
                                                <li><span>Max Temperature </span><?= $d["tobago"]["max"] == null ? "--" : $d["tobago"]["max"] ?></li>
                                                <li><span>Min Temperature</span> <?=$d["tobago"]["min"] == null ? "--" : $d["tobago"]["min"] ?></li>
                                            </ul>
                                            <hr class="pricing-divider">
                                        </div>
                                    <?php 
                                        $count++;
                                        endforeach;
                                        $count = 0;
                                    ?>
                                </div>
                            </section>
                        </div>
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
              <h3><span class="heading-3">Services</span></h3>
           </div>
           
           <!-- Agriculture Service -->
           <div class="col-sm-10 col-lg-4 col-xl-4">
               <div class="thumbnail-modern" style="display: flex; flex-direction: column;">
                   <div style="flex: 1; position: relative; background: #2f3a42;">
                       <img class="thumbnail-modern-image" src="<?=$www_root?>images/category/fwservice_icons/agriculture.png" alt="Agriculture Service" style="width: 100%; height: 100%; object-fit: contain;">
                   </div>
                   <div class="thumbnail-modern-caption" style="margin-top: -1px;">
                       <div class="thumbnail-modern-caption-body">
                           <div class="thumbnail-modern-title-left">Agriculture Service</div>
                       </div>
                       <div class="thumbnail-modern-caption-aside">
                           <a class="thumbnail-modern-control" href="<?=$www_root?>our-services/agro-met-bulletin-and-assessment-update">see more</a>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Dryness & Drought -->
           <div class="col-sm-10 col-lg-4 col-xl-4">
               <div class="thumbnail-modern" style="display: flex; flex-direction: column;">
                   <div style="flex: 1; position: relative; background: #2f3a42;">
                       <img class="thumbnail-modern-image" src="<?=$www_root?>images/category/fwservice_icons/dryness.png" alt="Dryness Monitor" style="width: 100%; height: 100%; object-fit: contain;">
                   </div>
                   <div class="thumbnail-modern-caption" style="margin-top: -1px;">
                       <div class="thumbnail-modern-caption-body">
                           <div class="thumbnail-modern-title-left">Dryness Monitor</div>
                       </div>
                       <div class="thumbnail-modern-caption-aside">
                           <a class="thumbnail-modern-control" href="<?=$www_root?>our-services/dryness-drought-indicator-monitor-and-outlook">see more</a>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Rainfall & Temperature -->
           <div class="col-sm-10 col-lg-4 col-xl-4">
               <div class="thumbnail-modern" style="display: flex; flex-direction: column;">
                   <div style="flex: 1; position: relative; background: #2f3a42;">
                       <img class="thumbnail-modern-image" src="<?=$www_root?>images/category/fwservice_icons/rainfall and temp.png" alt="Rainfall & Temperature" style="width: 100%; height: 100%; object-fit: contain;">
                   </div>
                   <div class="thumbnail-modern-caption" style="margin-top: -1px;">
                       <div class="thumbnail-modern-caption-body">
                           <div class="thumbnail-modern-title-left">Rainfall & Temperature</div>
                       </div>
                       <div class="thumbnail-modern-caption-aside">
                           <a class="thumbnail-modern-control" href="<?=$www_root?>our-services/rainfall-and-temperature-outlook-update">see more</a>
                       </div>
                   </div>
               </div>
           </div>

           <!-- ENSO -->
           <div class="col-sm-10 col-lg-4 col-xl-4">
               <div class="thumbnail-modern" style="display: flex; flex-direction: column;">
                   <div style="flex: 1; position: relative; background: #2f3a42;">
                       <img class="thumbnail-modern-image" src="<?=$www_root?>images/category/fwservice_icons/enso.png" alt="ENSO Monitor" style="width: 100%; height: 100%; object-fit: contain;">
                   </div>
                   <div class="thumbnail-modern-caption" style="margin-top: -1px;">
                       <div class="thumbnail-modern-caption-body">
                           <div class="thumbnail-modern-title-left">ENSO Monitor</div>
                       </div>
                       <div class="thumbnail-modern-caption-aside">
                           <a class="thumbnail-modern-control" href="<?=$www_root?>our-services/enso-monitor-update">see more</a>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Climate Data -->
           <div class="col-sm-10 col-lg-4 col-xl-4">
               <div class="thumbnail-modern" style="display: flex; flex-direction: column;">
                   <div style="flex: 1; position: relative; background: #2f3a42;">
                       <img class="thumbnail-modern-image" src="<?=$www_root?>images/category/fwservice_icons/climate data.png" alt="Climate Data" style="width: 100%; height: 100%; object-fit: contain;">
                   </div>
                   <div class="thumbnail-modern-caption" style="margin-top: -1px;">
                       <div class="thumbnail-modern-caption-body">
                           <div class="thumbnail-modern-title-left">Climate Data</div>
                       </div>
                       <div class="thumbnail-modern-caption-aside">
                           <a class="thumbnail-modern-control" href="<?=$www_root?>our-services/climate-data">see more</a>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Tourism -->
           <div class="col-sm-10 col-lg-4 col-xl-4">
               <div class="thumbnail-modern" style="display: flex; flex-direction: column;">
                   <div style="flex: 1; position: relative; background: #2f3a42;">
                       <img class="thumbnail-modern-image" src="<?=$www_root?>images/category/fwservice_icons/tourism.png" alt="Tourism" style="width: 100%; height: 100%; object-fit: contain;">
                   </div>
                   <div class="thumbnail-modern-caption" style="margin-top: -1px;">
                       <div class="thumbnail-modern-caption-body">
                           <div class="thumbnail-modern-title-left">Tourism</div>
                       </div>
                       <div class="thumbnail-modern-caption-aside">
                           <a class="thumbnail-modern-control" href="<?=$www_root?>our-services/tourism">see more</a>
                       </div>
                   </div>
               </div>
           </div>
      </div>
    </div>
</section>


