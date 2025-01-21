<?php
//var_dump($cms->getNavByParent(0,2)); 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$img = isset($_GET['item']) ? $_GET['item'] : '150ppi';
$url = "http://metproducts.gov.tt/api/forecast";
$data = file_get_contents($url);
$data = json_decode($data,true)['items'][0];



/* This page displays data from a JSON object.
*  It accepts the JSON object from the forecastModel.php and decodes it.
*/

	if(!empty($data))//If the object is not empty
	{
	//	$data = $data->result_array(); //create an array
		$json; //variable

		
		$data = json_encode($data);
		$json = json_decode($data);
		//Below is how we display the data
		$forecastTime = $json->forecastTime;
		$issuedAt = $json->IssuedAt;
		$forecaster = $json->forecaster;
		$forecastPeriod = $json->forecastPeriod;
		$AmendedFsct = $json->amended;
		$forecastArea1 = $json->forecastArea1;
		$textArea1 = $json->textArea1;
		$forecastArea2 = $json->forecastArea2;
		$textArea2 = $json->textArea2;
		$forecastArea3 = $json->forecastArea3;
		$textArea3 = $json->textArea3;
		$addMarine = $json->addMarine;
	/*	$gustyWinds = $json->gustywinds;*/
		$gustyWinds2 = $json->gustywinds2;
		$seas = $json->seas;
		$waves1 = $json->waves1;
		$waves2 = $json->waves2;
		$newtext1 = $textArea1 ;
		$newtext2 = $textArea2 ;
		$newtext3 = $textArea3 ;
		$PiarcoMnTemp = $json->PiarcoMnTemp;
		$CrownMnTemp = $json->CrownMnTemp;
		$PiarcoFcstMxTemp = $json->PiarcoFcstMxTemp;
		$CrownFcstMxTemp = $json->CrownFcstMxTemp;
		$PiarcoActMxTemp = $json->PiarcoActMxTemp;
	   $CrownActMxTemp = $json->CrownActMxTemp;
	   $PiarcoFcstMnTemp = $json->PiarcoFcstMnTemp;
	   $CrownFcstMnTemp = $json->CrownFcstMnTemp;
	   $PiarcoRainfall = $json->PiarcoRainfall;
	   $CrownPointRinfall = $json->CrownPointRinfall;
	   $cumlativeRain = $json->cumlativeRain;
	    $cumlativeCpRain = $json->cumlativeCpRain;
	   $PiarcoheatIndex = $json->PiarcoheatIndex;
	   $CPointheatIndex = $json->CPointheatIndex;
	   $sunrise = $json->sunrise;
	   $sunset = $json->sunset;
		/*$tideDate= $json->tideDate; */
		$tideTime= $json->tideTime;
		$tideTime2=$json->tideTime2;
		$trinAmHigh= $json->trinAmHigh;
		$trinPmHigh= $json->trinPmHigh;
		$trinAmLow= $json->trinAmLow;
		$trinPmLow= $json->trinPmLow;
		$tobAmHigh= $json->tobAmHigh;
		$tobPmHigh= $json->tobPmHigh;
		$tobAmLow= $json->tobAmLow;
		$tobPmLow= $json->tobPmLow;
		$probrainfall = $json->probrainfall;
		$uvrate = $json->uvrate;
		$precipitation = $json->precipitation;
		$timePeriod = $json->timePeriod;

		date_default_timezone_set('America/Port_of_Spain');
//		$pagedateTime = date('h:i A');

		
?>

<main >
    <div class="container">

        
        
		 <div class="row">   
                     <h1>Forecast</h1>
                     <div class="row">
                         
  <div class="col-sm-12 mb-8 mb-sm-0">
  
      <div class="met-callout met-callout-info text-left">
          <ul>
              <li>
<strong>Issued at:</strong> <?= date("F j, Y, g:i a", strtotime($issuedAt))?>
              </li>
              <li>
<strong>Meteorologist:</strong> <?= $forecaster?>
              </li>
          </ul>
</div>
  </div>
                     </div>
			<div class="row">
<!--  <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
          <h5 class="card-title">Current Temperature &deg;C</h5>
                <p class="card-text"><div class="fs-4 mb-3">
            
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-thermometer-half" viewBox="0 0 16 16">
  <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415"/>
  <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1"/>
</svg> <?=$PiarcoActMxTemp?></div></p>
        
      </div>
    </div>
  </div>-->

  <div class="col-sm-6 mb-20 mb-sm-0">
    <div class="card">
      <div class="card-body ">
<!--        <h5 class="card-title"> Seas</h5>-->
                   <dl class="row text-left">
  <dt class="col-sm-3 ">Seas</dt>
  <dd class="col-sm-9" ><?=$seas?> s</dd>
            <dt class="col-sm-3" >Waves</dt>
  <dd class="col-sm-9" style=" line-height:1.5;">
              <?=$waves1?> in open waters. 
              <?=$waves2?> in sheltered areas.</dd> 
            </dl>
        
        
      </div>
    </div>
  </div>
</div>
                     <?php if(strcmp($textArea1,"")!=0){?>
                     <div class="row">
  <div class="col-sm-12 mb-8 mb-sm-0">
      <div class="card">
          <div class="card-body">
        <h5 class="card-title"><?=$forecastArea1?></h5>
        <p class="card-text text-left"><?=$newtext1?></p>
        
      </div>
  </div>
      </div>
                     </div>
                     <?php    }?>
                               <?php if(strcmp($textArea2,"")!=0){?>
                     <div class="row">
  <div class="col-sm-12 mb-8 mb-sm-0">
      <div class="card">
          <div class="card-body">
        <h5 class="card-title"><?=$forecastArea2?></h5>
        <p class="card-text text-left"><?=$newtext2?></p>
        
      </div>
  </div>
      </div>
                     </div>
                    <?php    }?>
                             <?php if(strcmp($textArea3,"")!=0){?>
                     <div class="row">
  <div class="col-sm-12 mb-8 mb-sm-0">
      <div class="card">
          <div class="card-body">
        <h5 class="card-title"><?=$forecastArea3?></h5>
        <p class="card-text text-left"><?=$newtext3?></p>
        
      </div>
  </div>
      </div>
                     </div>
                 <?php    }
                        

if(strcmp($addMarine,"")!=0 and ($gustyWinds2!=""))
			{?>
                     <div class="row">
  <div class="col-sm-12 mb-8 mb-sm-0">
<!--      <div class="card">
          <div class="card-body text-danger">
        <h5 class="card-title">Additional Marine Information</h5>
        <p class="card-text   "><?=$addMarine?></p>
        
      </div>
  </div>-->
      <p class="fs-3">Additional Marine Information</p>
      <div class="met-callout met-callout-danger text-left">
          <?=$addMarine?>
</div>
      
      </div>
                     </div>
			<?php			
			}
			else if(strcmp($addMarine,"")!=0 and is_null($gustyWinds2))
			{
?>
                     <div class="row">
  <div class="col-sm-12 mb-8 mb-sm-0">
<!--      <div class="card">
          <div class="card-body text-danger">
        <h5 class="card-title">Additional Marine Information</h5>
        <p class="card-text   "><?=$addMarine?></p>
        
      </div>
  </div>-->
 <p class="fs-3">Additional Marine Information</p>
      <div class="met-callout met-callout-danger text-left">
          <?=$addMarine?>
</div>
      </div>
                     </div>
                     <?php
			}



?>	
                     <div class="row">
  <div class="col-sm-6 mb-4 mb-sm-0">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-thermometer-half" viewBox="0 0 16 16">
  <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415"/>
  <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1"/>
</svg>Temperature &deg;C</h5>
        <p class="card-text   ">   
            <div class="table-responsive">

            <table class="table ">
        <thead>
          <tr>
              <th data-field="id"></th>
              <th data-field="name">Piarco</th>
              <th data-field="price">Crown Point</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>LAST NIGHT MIN. TEMP.</td>
            <td><?=$PiarcoMnTemp?></td>
            <td><?=$CrownMnTemp?></td>
          </tr>

          <tr>
            <td>FORECAST MAX. TEMP.</td>
            <td><?=$PiarcoFcstMxTemp?></td>
            <td><?=$CrownFcstMxTemp?></td>
          </tr>
            <?php
            if($forecastTime == "05:30PM"){?>
            <tr>
            <td>TODAY'S MAX TEMP.</td>
            <td><?=$PiarcoActMxTemp?></td>
            <td><?=$CrownActMxTemp?></td>
          </tr>

          <tr>
            <td>Tomorrow MAX. TEMP.</td>
            <td><?=$PiarcoFcstMxTemp?></td>
            <td><?=$CrownFcstMxTemp?></td>
          </tr>
            <tr>
            <td>Tomorrow MIN. TEMP.</td>
            <td><?=$PiarcoFcstMnTemp?></td>
            <td><?=$CrownFcstMnTemp?></td>
          </tr>

          <tr>
            <td>Heat Index:</td>
            <td><?=$PiarcoheatIndex?></td>
            <td><?=$CPointheatIndex?></td>
          </tr>
         <?php }?>
        </tbody>
            </table></div></p>
              
              
              
              
        
      </div>
  </div>
      </div>


                         
                         <div class="col-sm-6 mb-4 mb-sm-0">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title">24-Hours Rainfall(mm) ending <span style="color:blue"> 2pm <?=$tideTime?> </span> </h5>
      <div class="table-responsive">

               <table class="table text-left">
        <thead>
          <tr>
              <th data-field="id"></th>
              <th data-field="name">Piarco</th>
              <th data-field="price">Crown Point</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Rainfall</td>
            <td><?=$PiarcoRainfall?></td>
            <td><?=$CrownPointRinfall?></td>
          </tr>

          <tr>
            <td>Monthly Cumulative</td>
            <td><?=$cumlativeRain?></td>
            <td><?=$cumlativeCpRain?></td>
          </tr>
        </tbody>
               </table>
      </div>
  </div>
      </div>
                     </div>
 
                     <div class="row">
  <div class="col-sm-12 mb-8 mb-sm-0">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title">Tides ISSUED at 5:30pm on <?=$tideTime?> and valid for <?=$tideTime2?></h5>
       <div class="row">
  <div class="col-sm-6 mb-4 mb-sm-0">
            <table class="table">
        <thead>
          <tr>

              <th data-field="name" colspan="3">Port of Spain</th>

          </tr>
        </thead>

        <tbody>
          <tr>
            <td>HIGH</td>
            <td><?=$trinAmHigh?></td>
            <td><?=$trinPmHigh?></td>


          </tr>
          <tr>
            <td>LOW</td>
            <td><?=$trinAmLow?></td>
            <td><?=$trinPmLow?></td>

          </tr>

        </tbody>
      </table>
  </div>
  </div>
 <div class="col-sm-6 mb-4 mb-sm-0">
     <div class="table-responsive">

	  <table class="table">
        <thead>
          <tr>


              <th data-field="price" colspan="3">Scarborough</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>HIGH</td>

           <td><?=$tobAmHigh?></td>
            <td><?=$tobPmHigh?></td>
          </tr>
          <tr>

            <td>LOW</td>
            <td><?=$tobAmLow?></td>
            <td><?=$tobPmLow?></td>
          </tr>

        </tbody>
          </table> </div>
			</div>
       </div>

      </div><!--END OF TIDES CARD-->

      <div class="card">
      <div class="card-body">
        <h5 class="card-title">Sunrise and Sunset</h5>
        <p class="card-text"><div class="fs-4 mb-0" style="line-height:0">
              <!--Code for dimensions of image-->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-sunrise" viewBox="0 0 16 16"> 
  <path d="M7.646 1.146a.5.5 0 0 1 .708 0l1.5 1.5a.5.5 0 0 1-.708.708L8.5 2.707V4.5a.5.5 0 0 1-1 0V2.707l-.646.647a.5.5 0 1 1-.708-.708zM2.343 4.343a.5.5 0 0 1 .707 0l1.414 1.414a.5.5 0 0 1-.707.707L2.343 5.05a.5.5 0 0 1 0-.707m11.314 0a.5.5 0 0 1 0 .707l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0M8 7a3 3 0 0 1 2.599 4.5H5.4A3 3 0 0 1 8 7m3.71 4.5a4 4 0 1 0-7.418 0H.499a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1h-3.79zM0 10a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 10m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"></path>
</svg>
             <?=$sunrise?> <!--this is the sunrise info pulled from the api-->
            </div>  </p>

        <p class="card-text">
          <div class="fs-4 mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-sunset" viewBox="0 0 16 16">    
  <path d="M7.646 4.854a.5.5 0 0 0 .708 0l1.5-1.5a.5.5 0 0 0-.708-.708l-.646.647V1.5a.5.5 0 0 0-1 0v1.793l-.646-.647a.5.5 0 1 0-.708.708zm-5.303-.51a.5.5 0 0 1 .707 0l1.414 1.413a.5.5 0 0 1-.707.707L2.343 5.05a.5.5 0 0 1 0-.707zm11.314 0a.5.5 0 0 1 0 .706l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zM8 7a3 3 0 0 1 2.599 4.5H5.4A3 3 0 0 1 8 7m3.71 4.5a4 4 0 1 0-7.418 0H.499a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1h-3.79zM0 10a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 10m13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                </svg> <?=$sunset?> </div></p>
        
      </div>
    </div> <!--END OF SUNSET & SUNRISE CARD-->

  </div> 
        
  
      </div>
                     </div>
			
		
	</div>
	
    
        <?php } ?>
    </div>
</main>