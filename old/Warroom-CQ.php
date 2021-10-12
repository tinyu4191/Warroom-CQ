<!doctype html>
<html lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" href="images/QM.ico" type="image/ico">
	<title>Innolux CQE | </title>
    <!-- Bootstrap -->
    <link href="http://tnvqis03/Dashboard_Template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome 
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" /> -->
    <!--這個會影響icon元件無法引用-->
    <link href=" http://tnvqis03/Dashboard_Template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
	<!-- NProgress -->
    <link href="http://tnvqis03/Dashboard_Template/vendors/nprogress/nprogress.css" rel="stylesheet" />
	<!-- iCheck -->
    <link href="http://tnvqis03/Dashboard_Template/vendors/iCheck/skins/flat/green.css" rel="stylesheet" />
    <!-- bootstrap-progressbar -->
    <link href="http://tnvqis03/Dashboard_Template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"/>
	<!-- JQVMap -->
    <link href="http://tnvqis03/Dashboard_Template/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
	<!-- bootstrap-daterangepicker -->
    <link href="http://tnvqis03/Dashboard_Template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <!-- Custom Theme Style -->
    <link href="http://tnvqis03/Dashboard_Template/build/css/custom.min.css" rel="stylesheet" />
    <link href="http://tnvqis03/Dashboard_Template/build/css/custom_MIS.css" rel="stylesheet" />
    <style>
    .imgFilter{
      filter:blur(10px);
    }
    .customerMask{
      position:absolute;
      width:35%;
      height:130%;
      left:1%;
      top:36px;
      z-index:2;
      /* background-color:rgba(255,255,255,.5); */
      -webkit-filter:blur(10px);
    }
    .customerMosaic{
      position:absolute;
      width:8.7%;
      height:130%;
      left:90%;//92.5%;
      top:20%;
      z-index:2;
      background-color:#c0deff;
    }
    .remarkNew{
            font-size: 18px;
            font-weight: bold;
            color: red;
            animation: blink 2s linear infinite;
            -webkit-animation: blink 2s linear infinite;
            -moz-animation: blink 2s linear infinite;
            -ms-animation: blink 2s linear infinite;
            -o-animation: blink 2s linear infinite;
        }

        @keyframes blink {
            0% {
                color: red;
            }

            50% {
                color: transparent;
            }

            100% {
                color: red;
            }
        } 
 </style>
    <!-- 引入 echarts.js 
  <script src="vendors/echarts.min.js"></script> -->
  <head>	<h3 style="color:White;"><i>品質戰情圖 <span id='switchMask'><small>銷(CQ)</small></span></i></h3></head>
    
	<body>
        <ul class="nav nav nav-tabs bar_tabs nav-pills" id="myTab" role="tablist" >
          <li class="nav-item">
             <a class="nav-link active" id="TV-tab" data-toggle="tab" href="#TV" role="tab" aria-controls="TV" aria-selected="true">TV</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" id="CE-tab" data-toggle="tab" href="#CE" role="tab" aria-controls="CE" aria-selected="false">CE</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" id="IAVM-tab" data-toggle="tab" href="#IAVM" role="tab" aria-controls="IAVM" aria-selected="false">IAVM</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" id="MONITOR-tab" data-toggle="tab" href="#MONITOR" role="tab" aria-controls="MONITOR" aria-selected="false">MONITOR</a>
          </li> 
          <li class="nav-item">
             <a class="nav-link" id="MP-tab" data-toggle="tab" href="#MP" role="tab" aria-controls="MP" aria-selected="false">MP</a>
          </li> 
          <li class="nav-item">
             <a class="nav-link" id="NB-tab" data-toggle="tab" href="#NB" role="tab" aria-controls="NB" aria-selected="false">NB</a>
          </li> 
          <li class="nav-item">
             <a class="nav-link" id="TABLET-tab" data-toggle="tab" href="#TABLET" role="tab" aria-controls="TABLET" aria-selected="false">TABLET</a>
          </li> 
          <li class="nav-item">
             <a class="nav-link" id="AA-tab" data-toggle="tab" href="#AA" role="tab" aria-controls="AA" aria-selected="false">AA</a>
          </li>  
      </ul>
<!-- TV-html -->
      <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="TV" role="tabpanel" aria-labelledby="TV-tab">
             	<div class="row">
								<div class="col-md-5 col-sm-4 ">
									<div class="x_panel tile fixed_height_320" style="overflow-y:scroll">
										<div class="x_title">
											<h3 style= "background:#FFFACD;color:black;text-align:center;"><b><font face="微軟正黑體">客戶排名</font></b></h3>
												<div class="clearfix"></div>
										</div>
										<div class="x_content">
                      <div class="customerMask"></div>
												<table class="" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="35%" height="40px" ><font face="微軟正黑體" size="5", color="black"><b>客戶</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="25%" colspan="2"><font face="微軟正黑體" size="5" , color="black"><b>Past</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%" colspan="2"><font face="微軟正黑體" size="5", color="black"><b>Current</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%"><font face="微軟正黑體" size="5", color="black"><b>&nbsp</b></font></th>                
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
<?php
        include_once('db.php');
        
        $sql="SELECT MAX(Year) maxYear FROM `cqekpi`;";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }
        $getData=$result->fetch_assoc();  
        $maxYear=$getData['maxYear'];
        $sql="SELECT MAX(Month) maxMonth FROM `cqekpi` where year=".$maxYear.";";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }
        $getData=$result->fetch_assoc();  
        $maxMonth=$getData['maxMonth'];
             
        $sql="SELECT * FROM customer_ranking where BU='TV'";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }
        
        while($getData=$result->fetch_assoc()){
          $greenLamp = array("1/2","1/3","1/4", "1/5","1/6","1/7","1/8","2/4","2/5","2/6","2/7","2/8","3/7","3/8","A",'G',"1/9","2/9","3/9");
          $yellowLamp = array("2/3","3/4","3/5","3/6","3/10","4/6","4/7","4/8","5/8","B",'Y',"4/9","5/9","6/9");
          $redLamp = array("3/3","4/4","4/5","5/5",'5/6','5/7',"6/6","6/7","6/8","7/7","7/8","8/8","C",'R',"7/9","8/9","9/9");
          if($getData['UpdateData']=='New'){
            $sRemark='<td class="remarkNew text-center">New';
          }else{
            $sRemark='<td class=" text-center">&nbsp;';
          }
          if(in_array($getData['Past'],$greeLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$yellowLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$redLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
              $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          if(in_array($getData['Current'],$greeLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$yellowLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$redLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          $pastTxt=$getData['Past'];
          $currentTxt=$getData['Current'];
          if(in_array($pastTxt,['R','G','Y','A','B','C'])){
            $pastTxt=' ';
            }          
            if(in_array($currentTxt,['R','G','Y','A','B','C'])){
            $currentTxt=' ';
            }
          
          echo '<tr align="center" ><th  scope="row"  height="35px" align="center"><img class="imgCustomer" src="images/'. $getData['CustomerName']. '.png"  width="160px" height="35px"></img></th><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'. $pastTxt.'</b></font></td><td>'. $sPast. '</td><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'.$currentTxt.'</b></font></td><td>'. $sCurrent. '</td>'.$sRemark.'</td></tr>'; 

        }
       $result->free();
       
    
?>                                  
                                 
                                  
                                  </tbody>
											</table>
										</div>
									</div>
								</div>	
														
								<div class="col-md-7 col-sm-4 ">
									<div class="x_panel tile fixed_height_320">
										<div class="x_title">
											<h3 style= "background:#E0FFFF;color:black;text-align:center;"><b><font face="微軟正黑體">年度CQE指標</font></b></h3>
											<ul class="nav navbar-right panel_toolbox"></ul>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<table width="820px">
												<tr>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>OBA Sorting Cost (NTD)</b></font></td>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>CAERB case</b></font></td>
												</tr>
												<tr>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Actual</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Open/Close</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
                                                </tr>
                                                

<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='TV' and Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        if($OBA_Annual_Cost>=$OBA_Annual_Target){
            $OBA_Color='red';
        }else{
            $OBA_Color='blue';
        }
        $CAERB_Open=$getData['CAERB_Open'];
        $CAERB_Close=$getData['CAERB_close'];
        $CAERB_target=$getData['CAERB_target'];            
        if(($CAERB_Open+$CAERB_Close)>=$CAERB_target){
            $CAERB_Color='red';
        }else{
            $CAERB_Color='blue';
        }
$result->free();
 
?>  






												<tr>
													<td style="height:30px;" width="205px" align="center" class='<?php echo $OBA_Color; ?>'><font size="5"><?php echo floor(floatval($getData['OBA_Annual_Cost'])/1000000*100)/100; ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo floor(floatval($getData['OBA_Annual_Target'])/1000000*100)/100 ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5" , color="<?php echo $CAERB_Color; ?>"><?php echo $CAERB_Open.'/'.$CAERB_Close; ?></font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo $CAERB_target; ?></font></td>
												</tr>
												<tr>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBACost" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBAEvent" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
												</tr>
											</table>
									</div>
								</div>
         				</div>
         			</div>
         			
         			<div class="row">
								<div class="col-md-12 col-sm-4 ">
									<div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class='customerMosaic'></div>
											<table width="100%">
													  <tr>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">KPI</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Actual</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Target</span></b></font></td>
    													<td align="center" style="height:50px" width="5%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">燈號</span></b></font></td>
    													<td align="center" style="height:50px" width="30%" colspan="2"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Trend</span></b></font></td>
    													<td align="center" style="height:50px" width="30%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Share</span></b></font></td>
 	 													</tr>
  													<tr style="background-color:#c0deff">
														<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>OBA Sorting<br>Rate</font>
																</td>
                                                                <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM cqekpi where BU='TV' and Year=".$maxYear." and Month=".$maxMonth.";";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }           

        $getData=$result->fetch_assoc();
        $OBA_Rate=floatval($getData['OBA_Rate'])*100;
        $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
        $Rate_Performance=$getData['Rate_Performance'];
        $Rate_Improve=$getData['Rate_Improve'];
        echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate.'%</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate_Target.'%</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Rate_Performance . $Rate_Improve .'.png" ></td>';
         
    
?>  
                                                        
                                                        
                                                        
                                                                
    													<td rowspan>
    														<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBARate" class="" style="width: 150px height: 150px;"></canvas>
                                                                    
																</div>
    													</td>
                                                        <td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"><b></b></font>
                                                        </td>
    													<td align="center" style="height:85px" rowspan="3">
    														<div class="sidebar-widget">
																	<canvas width="350%" height="250%" id="OBATrend" class="" style="width: 100% height: 100%;"></canvas>
                                                                    
                                                                </div>
    													</td>
  													</tr>
														<tr style="background-color:#deffc0">
                                                            <td align="center" style="height:85px";width="20px"><font size="4" face="微軟正黑體" , color="black"><b>當月預估<br>OBA Sorting Cost</b></font></td>
                                                            

<?php

$OBA_Estimate=floor(floatval($getData['OBA_Estimate'])/1000000*100)/100;
$OBA_Cost_Target=floor(floatval($getData['OBA_Cost_Target'])/1000000*100)/100;
$OBA_Cost_M_Performance=$getData['OBA_Cost_M_Performance'];
$OBA_Cost_M_Improve=$getData['OBA_Cost_M_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Estimate.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Cost_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $OBA_Cost_M_Performance . $OBA_Cost_M_Improve .'.png" ></td>';

?>
    													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBACostTrend" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
                                                        <td align="center" style="height:85px";width="20px"><font size="2" face="微軟正黑體" , color="black"></font>
                                                        </td>

</tr>


															
														<tr style="background-color:#c0deff ">
                                                        <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>Customer Claim<br>(NTD)</b></font></td>
                                                        
                                                        <?php

$Customer_Claim=floor(floatval($getData['Customer_Claim'])/1000000*100)/100;
$Customer_Claim_Target=floor(floatval($getData['Customer_Claim_Target'])/1000000*100)/100;
$Customer_Claim_Performance=$getData['Customer_Claim_Performance'];
$Customer_Claim_Improve=$getData['Customer_Claim_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Customer_Claim_Performance . $Customer_Claim_Improve .'.png" ></td>';


$result->free();  
?>
    													<td >
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="customerClaim" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
                                                        <td align="center" style="height:85px";width="20px"><font size="2" face="微軟正黑體" , color="black"></font>
                                                        </td>
</tr>




													
											</table>　
									</div>
								</div>
							</div>
					</div>
<!-- CE-html					 -->
			<div class="tab-pane fade" id="CE" role="tabpanel" aria-labelledby="CE-tab">
             	<div class="row">
								<div class="col-md-5 col-sm-4 ">
									<div class="x_panel tile fixed_height_320" style="overflow-y:scroll">
										<div class="x_title">
											<h3 style= "background:#FFFACD;color:black;text-align:center;"><b><font face="微軟正黑體">客戶排名</font></b></h3>
												<div class="clearfix"></div>
										</div>
										<div class="x_content">
                    <div class="customerMask"></div>
												<table class="" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="35%" height="40px" ><font face="微軟正黑體" size="5", color="black"><b>客戶</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="25%" colspan="2"><font face="微軟正黑體" size="5" , color="black"><b>Past</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%" colspan="2"><font face="微軟正黑體" size="5", color="black"><b>Current</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%"><font face="微軟正黑體" size="5", color="black"><b></b></font></th>                
                                    </tr>
                                  </thead>
                                  <tbody>

                                  <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM customer_ranking where BU='CE'";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }
        
        while($getData=$result->fetch_assoc()){
          $greenLamp = array("1/2","1/3","1/4", "1/5","1/6","1/7","1/8","2/4","2/5","2/6","2/7","2/8","3/7","3/8","A",'G',"1/9","2/9","3/9");
          $yellowLamp = array("2/3","3/4","3/5","3/6","4/6","4/7","4/8","5/8","B",'Y',"4/9","5/9","6/9");
          $redLamp = array("3/3","4/4","4/5","5/5",'5/6','5/7',"6/6","6/7","6/8","7/7","7/8","8/8","C",'R',"7/9","8/9","9/9");
          if($getData['UpdateData']=='New'){
            $sRemark='<td class="remarkNew text-center">New';
          }else{
            $sRemark='<td class=" text-center">&nbsp;';
          }
          if(in_array($getData['Past'],$greeLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$yellowLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$redLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
              $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          if(in_array($getData['Current'],$greeLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$yellowLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$redLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          $pastTxt=$getData['Past'];
          $currentTxt=$getData['Current'];
          if(in_array($pastTxt,['R','G','Y','A','B','C'])){
            $pastTxt=' ';
            }          
            if(in_array($currentTxt,['R','G','Y','A','B','C'])){
            $currentTxt=' ';
            }
          
          echo '<tr align="center"><th scope="row"  height="35px" align="center"><img  class="imgCustomer" src="images/'. $getData['CustomerName']. '.png"  width="160px" height="35px"></img></th><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'. $pastTxt.'</b></font></td><td>'. $sPast. '</td><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'.$currentTxt.'</b></font></td><td>'. $sCurrent. '</td>'.$sRemark.'</td></tr>'; 
        }
       $result->free();
       
    
?>  
       </tbody>
                                           
											</table>
										</div>
									</div>
								</div>	
														
								<div class="col-md-7 col-sm-4 ">
									<div class="x_panel tile fixed_height_320">
										<div class="x_title">
											<h3 style= "background:#E0FFFF;color:black;text-align:center;"><b><font face="微軟正黑體">年度CQE指標</font></b></h3>
											<ul class="nav navbar-right panel_toolbox"></ul>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<table width="820px">
												<tr>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>OBA Sorting Cost (NTD)</b></font></td>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>CAERB case</b></font></td>
												</tr>
												<tr>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Actual</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Open/Close</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
                                                </tr>
                                                

<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='CE' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        if($OBA_Annual_Cost>=$OBA_Annual_Target){
            $OBA_Color='red';
        }else{
            $OBA_Color='blue';
        }
        $CAERB_Open=$getData['CAERB_Open'];
        $CAERB_Close=$getData['CAERB_close'];
        $CAERB_target=$getData['CAERB_target'];            
        if(($CAERB_Open+$CAERB_Close)>=$CAERB_target){
            $CAERB_Color='red';
        }else{
            $CAERB_Color='blue';
        }
$result->free();
 
?>  






												<tr>
													<td style="height:30px;" width="205px" align="center" class='<?php echo $OBA_Color; ?>'><font size="5"><?php echo floor(floatval($getData['OBA_Annual_Cost'])/1000000*100)/100; ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo floor(floatval($getData['OBA_Annual_Target'])/1000000*100)/100 ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5" , color="<?php echo $CAERB_Color; ?>"><?php echo $CAERB_Open.'/'.$CAERB_Close; ?></font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo $CAERB_target; ?></font></td>
												</tr>
												<tr>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBACost-CE" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBAEvent-CE" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
												</tr>
											</table>
									</div>
								</div>
         				</div>
         			</div>
         			
         			<div class="row">
								<div class="col-md-12 col-sm-4 ">
									<div class="x_panel tile fixed_height_320 overflow_hidden">
                  <div class='customerMosaic'></div>
											<table width="100%">
													  <tr>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">KPI</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Actual</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Target</span></b></font></td>
    													<td align="center" style="height:50px" width="5%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">燈號</span></b></font></td>
    													<td align="center" style="height:50px" width="30%" colspan="2"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Trend</span></b></font></td>
    													<td align="center" style="height:50px" width="30%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Share</span></b></font></td>
 	 													</tr>
  													<tr style="background-color:#c0deff">
														<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>OBA Sorting<br>Rate</font>
																</td>
                                                                <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM cqekpi where BU='CE' and Year=".$maxYear." and Month=".$maxMonth.";";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }           

        $getData=$result->fetch_assoc();
        $OBA_Rate=floatval($getData['OBA_Rate'])*100;
        $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
        $Rate_Performance=$getData['Rate_Performance'];
        $Rate_Improve=$getData['Rate_Improve'];
        echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate.'%</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate_Target.'%</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Rate_Performance . $Rate_Improve .'.png" ></td>';
         
    
?>  
                                                        
                                                        
                                                        
                                                                
    													<td>
    														<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBARate-CE" class="" style="width: 150px height: 150px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    													<td align="center" rowspan="3">
    														<div class="x_content w-100 h-100">
																	<canvas width="350%" height="250%" id="OBATrend-CE" class="" style="width: 100% height: 100%;"></canvas>
                                                                    
                                                                </div>
    													</td>
  													</tr>
														<tr style="background-color:#deffc0">
                                                            <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>當月預估<br>OBA Sorting Cost</b></font></td>
                                                            

<?php

$OBA_Estimate=floor(floatval($getData['OBA_Estimate'])/1000000*100)/100;
$OBA_Cost_Target=floor(floatval($getData['OBA_Cost_Target'])/1000000*100)/100;
$OBA_Cost_M_Performance=$getData['OBA_Cost_M_Performance'];
$OBA_Cost_M_Improve=$getData['OBA_Cost_M_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Estimate.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Cost_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $OBA_Cost_M_Performance . $OBA_Cost_M_Improve .'.png" ></td>';

?>

    													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBACostTrend-CE" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    												<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    												</tr>


															
														<tr style="background-color:#c0deff ">
                                                        <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>Customer Claim<br>(NTD)</b></font></td>
                                                        
                                                        <?php

$Customer_Claim=floor(floatval($getData['Customer_Claim'])/1000000*100)/100;
$Customer_Claim_Target=floor(floatval($getData['Customer_Claim_Target'])/1000000*100)/100;
$Customer_Claim_Performance=$getData['Customer_Claim_Performance'];
$Customer_Claim_Improve=$getData['Customer_Claim_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Customer_Claim_Performance . $Customer_Claim_Improve .'.png" ></td>';


$result->free();  
?>
    													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="customerClaim-CE" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
														</tr>



													
											</table>　
									</div>
								</div>
							</div>
					</div>
<!-- IAVM-html          -->
         	<div class="tab-pane fade" id="IAVM" role="tabpanel" aria-labelledby="IAVM-tab">
             	<div class="row">
								<div class="col-md-5 col-sm-4 ">
									<div class="x_panel tile fixed_height_320" style="overflow-y:scroll">
										<div class="x_title">
											<h3 style= "background:#FFFACD;color:black;text-align:center;"><b><font face="微軟正黑體">客戶排名</font></b></h3>
												<div class="clearfix"></div>
										</div>
                      <div class="x_content">
                        <div class="customerMask"></div>
												<table class="" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="35%" height="40px" ><font face="微軟正黑體" size="5", color="black"><b>客戶</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="25%" colspan="2"><font face="微軟正黑體" size="5" , color="black"><b>Past</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%" colspan="2"><font face="微軟正黑體" size="5", color="black"><b>Current</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%"><font face="微軟正黑體" size="5", color="black"><b></b></font></th>                
                                    </tr>
                                  </thead>
                                  <tbody>

                                  <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM customer_ranking where BU='IAVM'";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }
        
        while($getData=$result->fetch_assoc()){
          $greenLamp = array("1/2","1/3","1/4", "1/5","1/6","1/7","1/8","2/4","2/5","2/6","2/7","2/8","3/7","3/8","A",'G',"1/9","2/9","3/9");
          $yellowLamp = array("2/3","3/4","3/5","3/6","4/6","4/7","4/8","5/8","B",'Y',"4/9","5/9","6/9");
          $redLamp = array("3/3","4/4","4/5","5/5",'5/6','5/7',"6/6","6/7","6/8","7/7","7/8","8/8","C",'R',"7/9","8/9","9/9");
          if($getData['UpdateData']=='New'){
            $sRemark='<td class="remarkNew text-center">New';
          }else{
            $sRemark='<td class=" text-center">&nbsp;';
          }
          if(in_array($getData['Past'],$greeLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$yellowLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$redLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
              $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          if(in_array($getData['Current'],$greeLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$yellowLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$redLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          
          $pastTxt=$getData['Past'];
          $currentTxt=$getData['Current'];
          if(in_array($pastTxt,['R','G','Y','A','B','C'])){
            $pastTxt=' ';
            }          
            if(in_array($currentTxt,['R','G','Y','A','B','C'])){
            $currentTxt=' ';
            }
          
          echo '<tr align="center"><th scope="row"  height="35px" align="center"><img class="imgCustomer" src="images/'. $getData['CustomerName']. '.png"  width="160px" height="35px"></img></th><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'. $pastTxt.'</b></font></td><td>'. $sPast. '</td><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'.$currentTxt.'</b></font></td><td>'. $sCurrent. '</td>'.$sRemark.'</td></tr>'; 
        }
       $result->free();
       
    
?>  
       </tbody>
											</table>
										</div>
									</div>
								</div>	
														
								<div class="col-md-7 col-sm-4 ">
									<div class="x_panel tile fixed_height_320">
										<div class="x_title">
											<h3 style= "background:#E0FFFF;color:black;text-align:center;"><b><font face="微軟正黑體">年度CQE指標</font></b></h3>
											<ul class="nav navbar-right panel_toolbox"></ul>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<table width="820px">
												<tr>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>OBA Sorting Cost (NTD)</b></font></td>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>CAERB case</b></font></td>
												</tr>
												<tr>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Actual</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Open/Close</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
                                                </tr>
                                                

<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='IAVM' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        if($OBA_Annual_Cost>=$OBA_Annual_Target){
            $OBA_Color='red';
        }else{
            $OBA_Color='blue';
        }
        $CAERB_Open=$getData['CAERB_Open'];
        $CAERB_Close=$getData['CAERB_close'];
        $CAERB_target=$getData['CAERB_target'];            
        if(($CAERB_Open+$CAERB_Close)>=$CAERB_target){
            $CAERB_Color='red';
        }else{
            $CAERB_Color='blue';
        }
$result->free();
 
?>  






												<tr>
													<td style="height:30px;" width="205px" align="center" class='<?php echo $OBA_Color; ?>'><font size="5"><?php echo floor(floatval($getData['OBA_Annual_Cost'])/1000000*100)/100; ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo floor(floatval($getData['OBA_Annual_Target'])/1000000*100)/100 ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5" , color="<?php echo $CAERB_Color; ?>"><?php echo $CAERB_Open.'/'.$CAERB_Close; ?></font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo $CAERB_target; ?></font></td>
												</tr>
												<tr>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBACost-IAVM" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBAEvent-IAVM" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
												</tr>
											</table>
									</div>
								</div>
         				</div>
         			</div>
         			
         			<div class="row">
								<div class="col-md-12 col-sm-4 ">
									<div class="x_panel tile fixed_height_320 overflow_hidden">
                  <div class='customerMosaic'></div>
											<table width="100%">
													  <tr>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">KPI</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Actual</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Target</span></b></font></td>
    													<td align="center" style="height:50px" width="5%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">燈號</span></b></font></td>
    													<td align="center" style="height:50px" width="30%" colspan="2"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Trend</span></b></font></td>
    													<td align="center" style="height:50px" width="30%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Share</span></b></font></td>
 	 													</tr>
  													<tr style="background-color:#c0deff">
														<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>OBA Sorting<br>Rate</font>
																</td>
                                                                <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM cqekpi where BU='IAVM' and Year=".$maxYear." and Month=".$maxMonth.";";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }           

        $getData=$result->fetch_assoc();
        $OBA_Rate=floatval($getData['OBA_Rate'])*100;
        $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
        $Rate_Performance=$getData['Rate_Performance'];
        $Rate_Improve=$getData['Rate_Improve'];
        echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate.'%</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate_Target.'%</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Rate_Performance . $Rate_Improve .'.png" ></td>';
         
    
?>  
                                                        
                                                        
                                                        
                                                                
    													<td>
    														<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBARate-IAVM" class="" style="width: 150px height: 150px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    													<td align="center" style="height:85px" rowspan="3">
    														<div class="sidebar-widget">
                                                            <canvas width="350%" height="250%" id="OBATrend-IAVM" class="" style="width: 100% height: 100%;"></canvas>
																</div>
    													</td>
  													</tr>
														<tr style="background-color:#deffc0">
                                                            <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>當月預估<br>OBA Sorting Cost</b></font></td>
                                                            

<?php

$OBA_Estimate=floor(floatval($getData['OBA_Estimate'])/1000000*100)/100;
$OBA_Cost_Target=floor(floatval($getData['OBA_Cost_Target'])/1000000*100)/100;
$OBA_Cost_M_Performance=$getData['OBA_Cost_M_Performance'];
$OBA_Cost_M_Improve=$getData['OBA_Cost_M_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Estimate.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Cost_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $OBA_Cost_M_Performance . $OBA_Cost_M_Improve .'.png" ></td>';

?>
    													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBACostTrend-IAVM" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    												</tr>



															
														<tr style="background-color:#c0deff ">
                                                        <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>Customer Claim<br>(NTD)</b></font></td>
                                                        
                                                        <?php

$Customer_Claim=floor(floatval($getData['Customer_Claim'])/1000000*100)/100;
$Customer_Claim_Target=floor(floatval($getData['Customer_Claim_Target'])/1000000*100)/100;
$Customer_Claim_Performance=$getData['Customer_Claim_Performance'];
$Customer_Claim_Improve=$getData['Customer_Claim_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Customer_Claim_Performance . $Customer_Claim_Improve .'.png" ></td>';


$result->free();  
?>
    													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="customerClaim-IAVM" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
														</tr>



													
											</table>　
									</div>
								</div>
							</div>
					</div>
<!-- MONITOR html -->
         	<div class="tab-pane fade" id="MONITOR" role="tabpanel" aria-labelledby="MONITOR-tab">
             	<div class="row">
								<div class="col-md-5 col-sm-4 ">
									<div class="x_panel tile fixed_height_320"  style="overflow-y:scroll">
										<div class="x_title">
											<h3 style= "background:#FFFACD;color:black;text-align:center;"><b><font face="微軟正黑體">客戶排名</font></b></h3>
												<div class="clearfix"></div>
										</div>
										<div class="x_content">
                    <div class="customerMask"></div>
												<table class="" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="35%" height="40px" ><font face="微軟正黑體" size="5", color="black"><b>客戶</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="25%" colspan="2"><font face="微軟正黑體" size="5" , color="black"><b>Past</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%" colspan="2"><font face="微軟正黑體" size="5", color="black"><b>Current</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%"><font face="微軟正黑體" size="5", color="black"><b></b></font></th>                
                                    </tr>
                                  </thead>
                                  <tbody>

<?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM customer_ranking where BU='Monitor'";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }
        
        while($getData=$result->fetch_assoc()){
          $greenLamp = array("1/2","1/3","1/4", "1/5","1/6","1/7","1/8","2/4","2/5","2/6","2/7","2/8","3/7","3/8","A",'G',"1/9","2/9","3/9");
          $yellowLamp = array("2/3","3/4","3/5","3/6","4/6","4/7","4/8","5/8","B",'Y',"4/9","5/9","6/9");
          $redLamp = array("3/3","4/4","4/5","5/5",'5/6','5/7',"6/6","6/7","6/8","7/7","7/8","8/8","C",'R',"7/9","8/9","9/9");
          if($getData['UpdateData']=='New'){
            $sRemark='<td class="remarkNew text-center">New';
          }else{
            $sRemark='<td class=" text-center">&nbsp;';
          }
          if(in_array($getData['Past'],$greeLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$yellowLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$redLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
              $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          if(in_array($getData['Current'],$greeLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$yellowLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$redLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          
          $pastTxt=$getData['Past'];
          $currentTxt=$getData['Current'];
          if(in_array($pastTxt,['R','G','Y','A','B','C'])){
            $pastTxt=' ';
            }          
            if(in_array($currentTxt,['R','G','Y','A','B','C'])){
            $currentTxt=' ';
            }
          
          echo '<tr align="center"><th scope="row"  height="35px" align="center"><img class="imgCustomer" src="images/'. $getData['CustomerName']. '.png"  width="160px" height="35px"></img></th><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'. $pastTxt.'</b></font></td><td>'. $sPast. '</td><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'.$currentTxt.'</b></font></td><td>'. $sCurrent. '</td>'.$sRemark.'</td></tr>'; 
        }
       $result->free();
       
    
?>  
       </tbody>





                                           
											</table>
										</div>
									</div>
								</div>	
														
								<div class="col-md-7 col-sm-4 ">
									<div class="x_panel tile fixed_height_320">
										<div class="x_title">
											<h3 style= "background:#E0FFFF;color:black;text-align:center;"><b><font face="微軟正黑體">年度CQE指標</font></b></h3>
											<ul class="nav navbar-right panel_toolbox"></ul>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<table width="820px">
												<tr>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>OBA Sorting Cost (NTD)</b></font></td>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>CAERB case</b></font></td>
												</tr>
												<tr>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Actual</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Open/Close</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
                                                </tr>
                                                

<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='Monitor' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        if($OBA_Annual_Cost>=$OBA_Annual_Target){
            $OBA_Color='red';
        }else{
            $OBA_Color='blue';
        }
        $CAERB_Open=$getData['CAERB_Open'];
        $CAERB_Close=$getData['CAERB_close'];
        $CAERB_target=$getData['CAERB_target'];            
        if(($CAERB_Open+$CAERB_Close)>=$CAERB_target){
            $CAERB_Color='red';
        }else{
            $CAERB_Color='blue';
        }
$result->free();
 
?>  






												<tr>
													<td style="height:30px;" width="205px" align="center" class='<?php echo $OBA_Color; ?>'><font size="5"><?php echo floor(floatval($getData['OBA_Annual_Cost'])/1000000*100)/100; ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo floor(floatval($getData['OBA_Annual_Target'])/1000000*100)/100 ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5" , color="<?php echo $CAERB_Color; ?>"><?php echo $CAERB_Open.'/'.$CAERB_Close; ?></font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo $CAERB_target; ?></font></td>
												</tr>
												<tr>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBACost-MONITOR" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBAEvent-MONITOR" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
												</tr>
											</table>
									</div>
								</div>
         				</div>
         			</div>
         			
         			<div class="row">
								<div class="col-md-12 col-sm-4 ">
									<div class="x_panel tile fixed_height_320 overflow_hidden">
                  <div class='customerMosaic'></div>
											<table width="100%">
													  <tr>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">KPI</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Actual</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Target</span></b></font></td>
    													<td align="center" style="height:50px" width="5%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">燈號</span></b></font></td>
    													<td align="center" style="height:50px" width="30%" colspan="2"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Trend</span></b></font></td>
    													<td align="center" style="height:50px" width="30%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Share</span></b></font></td>
 	 													</tr>
  													<tr style="background-color:#c0deff">
														<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>OBA Sorting<br>Rate</font>
																</td>
                                                                <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM cqekpi where BU='Monitor' and Year=".$maxYear." and Month=".$maxMonth.";";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }           

        $getData=$result->fetch_assoc();
        $OBA_Rate=floatval($getData['OBA_Rate'])*100;
        $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
        $Rate_Performance=$getData['Rate_Performance'];
        $Rate_Improve=$getData['Rate_Improve'];
        echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate.'%</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate_Target.'%</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Rate_Performance . $Rate_Improve .'.png" ></td>';
         
    
?>  
                                                        
                                                        
                                                        
                                                                
    													<td>
    														<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBARate-MONITOR" class="" style="width: 150px height: 150px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    													<td align="center" style="height:85px" rowspan="3">
    														<div class="sidebar-widget">
                                                            <canvas width="350%" height="250%" id="OBATrend-MONITOR" class="" style="width: 100% height: 100%;"></canvas>
																</div>
    													</td>
  													</tr>
														<tr style="background-color:#deffc0">
                                                            <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>當月預估<br>OBA Sorting Cost</b></font></td>
                                                            

<?php

$OBA_Estimate=floor(floatval($getData['OBA_Estimate'])/1000000*100)/100;
$OBA_Cost_Target=floor(floatval($getData['OBA_Cost_Target'])/1000000*100)/100;
$OBA_Cost_M_Performance=$getData['OBA_Cost_M_Performance'];
$OBA_Cost_M_Improve=$getData['OBA_Cost_M_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Estimate.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Cost_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $OBA_Cost_M_Performance . $OBA_Cost_M_Improve .'.png" ></td>';

?>
	    													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBACostTrend-MONITOR" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    												</tr>



															
														<tr style="background-color:#c0deff ">
                                                        <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>Customer Claim<br>(NTD)</b></font></td>
                                                        
                                                        <?php

$Customer_Claim=floor(floatval($getData['Customer_Claim'])/1000000*100)/100;
$Customer_Claim_Target=floor(floatval($getData['Customer_Claim_Target'])/1000000*100)/100;
$Customer_Claim_Performance=$getData['Customer_Claim_Performance'];
$Customer_Claim_Improve=$getData['Customer_Claim_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Customer_Claim_Performance . $Customer_Claim_Improve .'.png" ></td>';


$result->free();  
?>
    													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="customerClaim-MONITOR" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    												</tr>




													
											</table>　
									</div>
								</div>
							</div>
					</div>
					
<!-- MP html					 -->
         	<div class="tab-pane fade" id="MP" role="tabpanel" aria-labelledby="MP-tab">
             	<div class="row">
								<div class="col-md-5 col-sm-4 ">
									<div class="x_panel tile fixed_height_320" style="overflow-y:scroll">
										<div class="x_title">
											<h3 style= "background:#FFFACD;color:black;text-align:center;"><b><font face="微軟正黑體">客戶排名</font></b></h3>
												<div class="clearfix"></div>
										</div>
										<div class="x_content">
                    <div class="customerMask"></div>
												<table class="" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="35%" height="40px" ><font face="微軟正黑體" size="5", color="black"><b>客戶</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="25%" colspan="2"><font face="微軟正黑體" size="5" , color="black"><b>Past</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%" colspan="2"><font face="微軟正黑體" size="5", color="black"><b>Current</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%"><font face="微軟正黑體" size="5", color="black"><b></b></font></th>                
                                    </tr>
                                  </thead>
                                  <tbody>

   <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM customer_ranking where BU='MP'";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }
        
        while($getData=$result->fetch_assoc()){
          $greenLamp = array("1/2","1/3","1/4", "1/5","1/6","1/7","1/8","2/4","2/5","2/6","2/7","2/8","3/7","3/8","A",'G',"1/9","2/9","3/9");
          $yellowLamp = array("2/3","3/4","3/5","3/6","4/6","4/7","4/8","5/8","B",'Y',"4/9","5/9","6/9");
          $redLamp = array("3/3","4/4","4/5","5/5",'5/6','5/7',"6/6","6/7","6/8","7/7","7/8","8/8","C",'R',"7/9","8/9","9/9");
          if($getData['UpdateData']=='New'){
            $sRemark='<td class="remarkNew text-center">New';
          }else{
            $sRemark='<td class=" text-center">&nbsp;';
          }
          if(in_array($getData['Past'],$greeLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$yellowLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$redLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
              $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          if(in_array($getData['Current'],$greeLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$yellowLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$redLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          
          $pastTxt=$getData['Past'];
          $currentTxt=$getData['Current'];
          if(in_array($pastTxt,['R','G','Y','A','B','C'])){
            $pastTxt=' ';
            }          
            if(in_array($currentTxt,['R','G','Y','A','B','C'])){
            $currentTxt=' ';
            }
          
          echo '<tr align="center"><th scope="row"  height="35px" align="center"><img class="imgCustomer" src="images/'. $getData['CustomerName']. '.png"  width="160px" height="35px"></img></th><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'. $pastTxt.'</b></font></td><td>'. $sPast. '</td><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'.$currentTxt.'</b></font></td><td>'. $sCurrent. '</td>'.$sRemark.'</td></tr>'; 
        }
       $result->free();
       
    
?>  
       </tbody>

        
											</table>
										</div>
									</div>
								</div>	
														
								<div class="col-md-7 col-sm-4 ">
									<div class="x_panel tile fixed_height_320">
										<div class="x_title">
											<h3 style= "background:#E0FFFF;color:black;text-align:center;"><b><font face="微軟正黑體">年度CQE指標</font></b></h3>
											<ul class="nav navbar-right panel_toolbox"></ul>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<table width="820px">
												<tr>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>OBA Sorting Cost (NTD)</b></font></td>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>CAERB case</b></font></td>
												</tr>
												<tr>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Actual</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Open/Close</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
                                                </tr>
                                                

<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='MP' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        if($OBA_Annual_Cost>=$OBA_Annual_Target){
            $OBA_Color='red';
        }else{
            $OBA_Color='blue';
        }
        $CAERB_Open=$getData['CAERB_Open'];
        $CAERB_Close=$getData['CAERB_close'];
        $CAERB_target=$getData['CAERB_target'];            
        if(($CAERB_Open+$CAERB_Close)>=$CAERB_target){
            $CAERB_Color='red';
        }else{
            $CAERB_Color='blue';
        }
$result->free();
 
?>  






												<tr>
													<td style="height:30px;" width="205px" align="center" class='<?php echo $OBA_Color; ?>'><font size="5"><?php echo floor(floatval($getData['OBA_Annual_Cost'])/1000000*100)/100; ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo floor(floatval($getData['OBA_Annual_Target'])/1000000*100)/100 ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5" , color="<?php echo $CAERB_Color; ?>"><?php echo $CAERB_Open.'/'.$CAERB_Close; ?></font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo $CAERB_target; ?></font></td>
												</tr>
												<tr>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBACost-MP" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBAEvent-MP" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
												</tr>
											</table>
									</div>
								</div>
         				</div>
         			</div>
         			
         			<div class="row">
								<div class="col-md-12 col-sm-4 ">
									<div class="x_panel tile fixed_height_320 overflow_hidden">
                  <div class='customerMosaic'></div>
											<table width="100%">
													  <tr>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">KPI</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Actual</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Target</span></b></font></td>
    													<td align="center" style="height:50px" width="5%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">燈號</span></b></font></td>
    													<td align="center" style="height:50px" width="30%" colspan="2"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Trend</span></b></font></td>
    													<td align="center" style="height:50px" width="30%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Share</span></b></font></td>
 	 													</tr>
  													<tr style="background-color:#c0deff">
														<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>OBA Sorting<br>Rate</font>
																</td>
                                                                <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM cqekpi where BU='MP' and Year=".$maxYear." and Month=".$maxMonth.";";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }           

        $getData=$result->fetch_assoc();
        $OBA_Rate=floatval($getData['OBA_Rate'])*100;
        $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
        $Rate_Performance=$getData['Rate_Performance'];
        $Rate_Improve=$getData['Rate_Improve'];
        echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate.'%</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate_Target.'%</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Rate_Performance . $Rate_Improve .'.png" ></td>';
         
    
?>  
                                                   
                                                        
                                                        
                                                                
    													<td>
    														<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBARate-MP" class="" style="width: 150px height: 150px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    													<td align="center" style="height:85px" rowspan="3">
    														<div class="sidebar-widget">
                                                            <canvas width="350%" height="250%" id="OBATrend-MP" class="" style="width: 100% height: 100%;"></canvas>
																</div>
    													</td>
  													</tr>
														<tr style="background-color:#deffc0">
                                                            <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>當月預估<br>OBA Sorting Cost</b></font></td>
                                                            

<?php

$OBA_Estimate=floor(floatval($getData['OBA_Estimate'])/1000000*100)/100;
$OBA_Cost_Target=floor(floatval($getData['OBA_Cost_Target'])/1000000*100)/100;
$OBA_Cost_M_Performance=$getData['OBA_Cost_M_Performance'];
$OBA_Cost_M_Improve=$getData['OBA_Cost_M_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Estimate.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Cost_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $OBA_Cost_M_Performance . $OBA_Cost_M_Improve .'.png" ></td>';

?>
   													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBACostTrend-MP" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    												</tr>



															
														<tr style="background-color:#c0deff ">
                                                        <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>Customer Claim<br>(NTD)</b></font></td>
                                                        
                                                        <?php

$Customer_Claim=floor(floatval($getData['Customer_Claim'])/1000000*100)/100;
$Customer_Claim_Target=floor(floatval($getData['Customer_Claim_Target'])/1000000*100)/100;
$Customer_Claim_Performance=$getData['Customer_Claim_Performance'];
$Customer_Claim_Improve=$getData['Customer_Claim_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Customer_Claim_Performance . $Customer_Claim_Improve .'.png" ></td>';


$result->free();  
?>
   													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="customerClaim-MP" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    												</tr>
    													

													
											</table>　
									</div>
								</div>
							</div>
					</div>       		
<!-- NB-html -->
         	<div class="tab-pane fade" id="NB" role="tabpanel" aria-labelledby="NB-tab">
             	<div class="row">
								<div class="col-md-5 col-sm-4 ">
									<div class="x_panel tile fixed_height_320"  style="overflow-y:scroll">
										<div class="x_title">
											<h3 style= "background:#FFFACD;color:black;text-align:center;"><b><font face="微軟正黑體">客戶排名</font></b></h3>
												<div class="clearfix"></div>
										</div>
										<div class="x_content">
                    <div class="customerMask"></div>
												<table class="" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="35%" height="40px" ><font face="微軟正黑體" size="5", color="black"><b>客戶</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="25%" colspan="2"><font face="微軟正黑體" size="5" , color="black"><b>Past</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%" colspan="2"><font face="微軟正黑體" size="5", color="black"><b>Current</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%"><font face="微軟正黑體" size="5", color="black"><b></b></font></th>                
                                    </tr>
                                  </thead>
                                  <tbody>

                                  <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM customer_ranking where BU='NB'";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }
        
        while($getData=$result->fetch_assoc()){
          $greenLamp = array("1/2","1/3","1/4", "1/5","1/6","1/7","1/8","2/4","2/5","2/6","2/7","2/8","3/7","3/8","A",'G',"1/9","2/9","3/9");
          $yellowLamp = array("2/3","3/4","3/5","3/6","4/6","4/7","4/8","5/8","B",'Y',"4/9","5/9","6/9");
          $redLamp = array("3/3","4/4","4/5","5/5",'5/6','5/7',"6/6","6/7","6/8","7/7","7/8","8/8","C",'R',"7/9","8/9","9/9");
          if($getData['UpdateData']=='New'){
            $sRemark='<td class="remarkNew text-center">New';
          }else{
            $sRemark='<td class=" text-center">&nbsp;';
          }
          if(in_array($getData['Past'],$greeLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$yellowLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$redLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
              $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          if(in_array($getData['Current'],$greeLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$yellowLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$redLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          
          $pastTxt=$getData['Past'];
          $currentTxt=$getData['Current'];
          if(in_array($pastTxt,['R','G','Y','A','B','C'])){
            $pastTxt=' ';
            }          
            if(in_array($currentTxt,['R','G','Y','A','B','C'])){
            $currentTxt=' ';
            }
          
          echo '<tr align="center"><th scope="row"  height="35px" align="center"><img class="imgCustomer" src="images/'. $getData['CustomerName']. '.png"  width="160px" height="35px"></img></th><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'. $pastTxt.'</b></font></td><td>'. $sPast. '</td><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'.$currentTxt.'</b></font></td><td>'. $sCurrent. '</td>'.$sRemark.'</td></tr>'; 
        }
       $result->free();
       
    
?>  
       </tbody>


         
											</table>
										</div>
									</div>
								</div>	
														
								<div class="col-md-7 col-sm-4 ">
									<div class="x_panel tile fixed_height_320">
										<div class="x_title">
											<h3 style= "background:#E0FFFF;color:black;text-align:center;"><b><font face="微軟正黑體">年度CQE指標</font></b></h3>
											<ul class="nav navbar-right panel_toolbox"></ul>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<table width="820px">
												<tr>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>OBA Sorting Cost (NTD)</b></font></td>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>CAERB case</b></font></td>
												</tr>
												<tr>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Actual</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Open/Close</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
                                                </tr>
                                                

<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='NB' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        if($OBA_Annual_Cost>=$OBA_Annual_Target){
            $OBA_Color='red';
        }else{
            $OBA_Color='blue';
        }
        $CAERB_Open=$getData['CAERB_Open'];
        $CAERB_Close=$getData['CAERB_close'];
        $CAERB_target=$getData['CAERB_target'];            
        if(($CAERB_Open+$CAERB_Close)>=$CAERB_target){
            $CAERB_Color='red';
        }else{
            $CAERB_Color='blue';
        }
$result->free();
 
?>  






												<tr>
													<td style="height:30px;" width="205px" align="center" class='<?php echo $OBA_Color; ?>'><font size="5"><?php echo floor(floatval($getData['OBA_Annual_Cost'])/1000000*100)/100; ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo floor(floatval($getData['OBA_Annual_Target'])/1000000*100)/100 ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5" , color="<?php echo $CAERB_Color; ?>"><?php echo $CAERB_Open.'/'.$CAERB_Close; ?></font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo $CAERB_target; ?></font></td>
												</tr>
												<tr>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBACost-NB" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBAEvent-NB" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
												</tr>
											</table>
									</div>
								</div>
         				</div>
         			</div>
         			
         			<div class="row">
								<div class="col-md-12 col-sm-4 ">
									<div class="x_panel tile fixed_height_320 overflow_hidden">
                  <div class='customerMosaic'></div>
											<table width="100%">
													  <tr>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">KPI</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Actual</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Target</span></b></font></td>
    													<td align="center" style="height:50px" width="5%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">燈號</span></b></font></td>
    													<td align="center" style="height:50px" width="30%" colspan="2"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Trend</span></b></font></td>
    													<td align="center" style="height:50px" width="30%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Share</span></b></font></td>
 	 													</tr>
  													<tr style="background-color:#c0deff">
														<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>OBA Sorting<br>Rate</font>
																</td>
                                                                <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM cqekpi where BU='NB' and Year=".$maxYear." and Month=".$maxMonth.";";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }           

        $getData=$result->fetch_assoc();
        $OBA_Rate=floatval($getData['OBA_Rate'])*100;
        $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
        $Rate_Performance=$getData['Rate_Performance'];
        $Rate_Improve=$getData['Rate_Improve'];
        echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate.'%</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate_Target.'%</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Rate_Performance . $Rate_Improve .'.png" ></td>';
         
    
?>  
                                                        
                                                        
                                                        
                                                                
    													<td>
    														<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBARate-NB" class="" style="width: 150px height: 150px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    													<td align="center" style="height:85px" rowspan="3">
    														<div class="sidebar-widget">
                                                            <canvas width="350%" height="250%" id="OBATrend-NB" class="" style="width: 100% height: 100%;"></canvas>
																</div>
    													</td>
  													</tr>
														<tr style="background-color:#deffc0">
                                                            <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>當月預估<br>OBA Sorting Cost</b></font></td>
                                                            

<?php

$OBA_Estimate=floor(floatval($getData['OBA_Estimate'])/1000000*100)/100;
$OBA_Cost_Target=floor(floatval($getData['OBA_Cost_Target'])/1000000*100)/100;
$OBA_Cost_M_Performance=$getData['OBA_Cost_M_Performance'];
$OBA_Cost_M_Improve=$getData['OBA_Cost_M_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Estimate.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Cost_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $OBA_Cost_M_Performance . $OBA_Cost_M_Improve .'.png" ></td>';

?>

    													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBACostTrend-NB" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    												</tr>


															
														<tr style="background-color:#c0deff ">
                                                        <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>Customer Claim<br>(NTD)</b></font></td>
                                                        
                                                        <?php

$Customer_Claim=floor(floatval($getData['Customer_Claim'])/1000000*100)/100;
$Customer_Claim_Target=floor(floatval($getData['Customer_Claim_Target'])/1000000*100)/100;
$Customer_Claim_Performance=$getData['Customer_Claim_Performance'];
$Customer_Claim_Improve=$getData['Customer_Claim_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Customer_Claim_Performance . $Customer_Claim_Improve .'.png" ></td>';


$result->free();  
?>
    													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="customerClaim-NB" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    												</tr>




													
											</table>　
									</div>
								</div>
							</div>
					</div>
<!-- TABLET html					 -->
         	<div class="tab-pane fade" id="TABLET" role="tabpanel" aria-labelledby="TABLET-tab">
             	<div class="row">
								<div class="col-md-5 col-sm-4 ">
									<div class="x_panel tile fixed_height_320"  style="overflow-y:scroll">
										<div class="x_title">
											<h3 style= "background:#FFFACD;color:black;text-align:center;"><b><font face="微軟正黑體">客戶排名</font></b></h3>
												<div class="clearfix"></div>
										</div>
										<div class="x_content">
                    <div class="customerMask"></div>
												<table class="" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="35%" height="40px" ><font face="微軟正黑體" size="5", color="black"><b>客戶</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="25%" colspan="2"><font face="微軟正黑體" size="5" , color="black"><b>Past</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%" colspan="2"><font face="微軟正黑體" size="5", color="black"><b>Current</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%"><font face="微軟正黑體" size="5", color="black"><b></b></font></th>                
                                    </tr>
                                  </thead>
                                  <tbody>

                                  <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM customer_ranking where BU='Tablet'";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }
        
        while($getData=$result->fetch_assoc()){
          $greenLamp = array("1/2","1/3","1/4", "1/5","1/6","1/7","1/8","2/4","2/5","2/6","2/7","2/8","3/7","3/8",'A','G',"1/9","2/9","3/9");
          $yellowLamp = array("2/3","3/4","3/5","3/6","4/6","4/7","4/8","5/8","B",'Y',"4/9","5/9","6/9");
          $redLamp = array("3/3","4/4","4/5","5/5",'5/6','5/7',"6/6","6/7","6/8","7/7","7/8","8/8","C",'R',"7/9","8/9","9/9");
          if($getData['UpdateData']=='New'){
            $sRemark='<td class="remarkNew text-center">New';
          }else{
            $sRemark='<td class=" text-center">&nbsp;';
          }
          if(in_array($getData['Past'],$greeLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$yellowLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$redLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{     
              // if($getData['CustomerName']=="AMAZON"){
              //     if(floatVal($getData['Past'])>85){
              //       $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  ';
              //     }elseif(floatVal($getData['Past'])>60){
              //       $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  ';
              //     }
              //     else{
              //       $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  ';
              //     }
              // }else{
                $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
              // }      
              
          }
          if(in_array($getData['Current'],$greeLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$yellowLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$redLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
            // if($getData['CustomerName']=="AMAZON"){
            //     if(floatVal($getData['Current'])>85){
            //       $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  ';
            //     }elseif(floatVal($getData['Current'])>60){
            //       $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  ';
            //     }
            //     else{
            //       $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  ';
            //     }
            // }else{
              $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
            // }      
          }
          $pastTxt=$getData['Past'];
          $currentTxt=$getData['Current'];
          if(in_array($pastTxt,['R','G','Y','A','B','C'])){
            $pastTxt=' ';
            }          
            if(in_array($currentTxt,['R','G','Y','A','B','C'])){
            $currentTxt=' ';
            }
          
          echo '<tr align="center"><th scope="row"  height="35px" align="center"><img class="imgCustomer" src="images/'. $getData['CustomerName']. '.png"  width="160px" height="35px"></img></th><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'. $pastTxt.'</b></font></td><td>'. $sPast. '</td><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'.$currentTxt.'</b></font></td><td>'. $sCurrent. '</td>'.$sRemark.'</td></tr>'; 
        }
       $result->free();
       
    
?>  
       </tbody>



          
											</table>
										</div>
									</div>
								</div>	
														
								<div class="col-md-7 col-sm-4 ">
									<div class="x_panel tile fixed_height_320">
										<div class="x_title">
											<h3 style= "background:#E0FFFF;color:black;text-align:center;"><b><font face="微軟正黑體">年度CQE指標</font></b></h3>
											<ul class="nav navbar-right panel_toolbox"></ul>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<table width="820px">
												<tr>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>OBA Sorting Cost (NTD)</b></font></td>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>CAERB case</b></font></td>
												</tr>
												<tr>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Actual</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Open/Close</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
                                                </tr>
                                                

<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='Tablet' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        if($OBA_Annual_Cost>=$OBA_Annual_Target){
            $OBA_Color='red';
        }else{
            $OBA_Color='blue';
        }
        $CAERB_Open=$getData['CAERB_Open'];
        $CAERB_Close=$getData['CAERB_close'];
        $CAERB_target=$getData['CAERB_target'];            
        if(($CAERB_Open+$CAERB_Close)>=$CAERB_target){
            $CAERB_Color='red';
        }else{
            $CAERB_Color='blue';
        }
$result->free();
 
?>  






												<tr>
													<td style="height:30px;" width="205px" align="center" class='<?php echo $OBA_Color; ?>'><font size="5"><?php echo floor(floatval($getData['OBA_Annual_Cost'])/1000000*100)/100; ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo floor(floatval($getData['OBA_Annual_Target'])/1000000*100)/100 ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5" , color="<?php echo $CAERB_Color; ?>"><?php echo $CAERB_Open.'/'.$CAERB_Close; ?></font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo $CAERB_target; ?></font></td>
												</tr>
												<tr>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBACost-Tablet" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBAEvent-Tablet" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
												</tr>
											</table>
									</div>
								</div>
         				</div>
         			</div>
         			
         			<div class="row">
								<div class="col-md-12 col-sm-4 ">
									<div class="x_panel tile fixed_height_320 overflow_hidden">
                  <div class='customerMosaic'></div>
											<table width="100%">
													  <tr>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">KPI</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Actual</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Target</span></b></font></td>
    													<td align="center" style="height:50px" width="5%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">燈號</span></b></font></td>
    													<td align="center" style="height:50px" width="30%" colspan="2"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Trend</span></b></font></td>
    													<td align="center" style="height:50px" width="30%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Share</span></b></font></td>
 	 													</tr>
  													<tr style="background-color:#c0deff">
														<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>OBA Sorting<br>Rate</font>
																</td>
                                                                <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM cqekpi where BU='Tablet' and Year=".$maxYear." and Month=".$maxMonth.";";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }           

        $getData=$result->fetch_assoc();
        $OBA_Rate=floatval($getData['OBA_Rate'])*100;
        $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
        $Rate_Performance=$getData['Rate_Performance'];
        $Rate_Improve=$getData['Rate_Improve'];
        echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate.'%</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate_Target.'%</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Rate_Performance . $Rate_Improve .'.png" ></td>';
         
    
?>  
                                                        
                                                        
                                                        
                                                                
    													<td>
    														<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBARate-Tablet" class="" style="width: 150px height: 150px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    													<td align="center" style="height:85px" rowspan="3">
    														<div class="sidebar-widget">
                                                            <canvas width="350%" height="250%" id="OBATrend-Tablet" class="" style="width: 100% height: 100%;"></canvas>
																</div>
    													</td>
  													</tr>
														<tr style="background-color:#deffc0">
                                                            <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>當月預估<br>OBA Sorting Cost</b></font></td>
                                                            

<?php

$OBA_Estimate=floor(floatval($getData['OBA_Estimate'])/1000000*100)/100;
$OBA_Cost_Target=floor(floatval($getData['OBA_Cost_Target'])/1000000*100)/100;
$OBA_Cost_M_Performance=$getData['OBA_Cost_M_Performance'];
$OBA_Cost_M_Improve=$getData['OBA_Cost_M_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Estimate.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Cost_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $OBA_Cost_M_Performance . $OBA_Cost_M_Improve .'.png" ></td>';

?>
   													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBACostTrend-Tablet" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    												</tr>



															
														<tr style="background-color:#c0deff ">
                                                        <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>Customer Claim<br>(NTD)</b></font></td>
                                                        
                                                        <?php

$Customer_Claim=floor(floatval($getData['Customer_Claim'])/1000000*100)/100;
$Customer_Claim_Target=floor(floatval($getData['Customer_Claim_Target'])/1000000*100)/100;
$Customer_Claim_Performance=$getData['Customer_Claim_Performance'];
$Customer_Claim_Improve=$getData['Customer_Claim_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Customer_Claim_Performance . $Customer_Claim_Improve .'.png" ></td>';


$result->free();  
?>
   													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="customerClaim-Tablet" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    												</tr>




													
											</table>　
									</div>
								</div>
							</div>
					</div>      					
<!-- AA html				 -->
					<div class="tab-pane fade" id="AA" role="tabpanel" aria-labelledby="AA-tab">
             	<div class="row">
								<div class="col-md-5 col-sm-4 ">
									<div class="x_panel tile fixed_height_320" style="overflow-y:scroll">
										<div class="x_title">
											<h3 style= "background:#FFFACD;color:black;text-align:center;"><a href='AA.html' target="_blank"><b><font face="微軟正黑體">客戶排名</font></b></a></h3>
												<div class="clearfix"></div>
										</div>
										<div class="x_content">
                    <div class="customerMask"></div>
												<table class="mt=0" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="35%" height="20px" ><font face="微軟正黑體" size="5", color="black"><b>客戶</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="25%" colspan="2"><font face="微軟正黑體" size="5" , color="black"><b>Past</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%" colspan="2"><font face="微軟正黑體" size="5", color="black"><b>Current</b></font></th>
                                      <th scope="col" class=" text-center" align="center" valign="center" width="20%"><font face="微軟正黑體" size="5", color="black"><b></b></font></th>                
                                    </tr>
                                  </thead>
                                  <tbody>

                                  <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM customer_ranking where BU='AA'";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }
        
        while($getData=$result->fetch_assoc()){
          $greenLamp = array("1/2","1/3","1/4", "1/5","1/6","1/7","1/8","2/4","2/5","2/6","2/7","2/8","3/7","3/8","A",'G',"1/9","2/9","3/9");
          $yellowLamp = array("2/3","3/4","3/5","3/6","4/6","4/7","4/8","5/8","B",'Y',"4/9","5/9","6/9");
          $redLamp = array("3/3","4/4","4/5","5/5",'5/6','5/7',"6/6","6/7","6/8","7/7","7/8","8/8","C",'R',"7/9","8/9","9/9");
          if($getData['UpdateData']=='New'){
            $sRemark='<td class="remarkNew text-center">New';
          }else{
            $sRemark='<td class=" text-center">&nbsp;';
          }
          if(in_array($getData['Past'],$greeLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$yellowLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Past'],$redLamp)){
            $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
              $sPast='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          if(in_array($getData['Current'],$greeLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$yellowLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-warning align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }elseif(in_array($getData['Current'],$redLamp)){
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-danger align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }else{            
            $sCurrent='<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-circle-fill text-success align-middle text-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8"/></svg>  '; 
          }
          $pastTxt=$getData['Past'];
          $currentTxt=$getData['Current'];
          if(in_array($pastTxt,['R','G','Y','A','B','C'])){
            $pastTxt=' ';
            }          
            if(in_array($currentTxt,['R','G','Y','A','B','C'])){
            $currentTxt=' ';
            }
          
          echo '<tr align="center"><th scope="row"  height="35px" align="center"><img class="imgCustomer" src="images/'. $getData['CustomerName']. '.png"  width="160px" height="35px"></img></th><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'. $pastTxt.'</b></font></td><td>'. $sPast. '</td><td class=" text-right">' .'<font size="4" face="微軟正黑體" , color="black"><b>'.$currentTxt.'</b></font></td><td>'. $sCurrent. '</td>'.$sRemark.'</td></tr>'; 
        }
       $result->free();
       
    
?>  
       </tbody>


        
											</table>
										</div>
									</div>
								</div>	
														
								<div class="col-md-7 col-sm-4 ">
									<div class="x_panel tile fixed_height_320">
										<div class="x_title">
											<h3 style= "background:#E0FFFF;color:black;text-align:center;"><b><font face="微軟正黑體">年度CQE指標</font></b></h3>
											<ul class="nav navbar-right panel_toolbox"></ul>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<table width="820px">
												<tr>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>OBA Sorting Cost (NTD)</b></font></td>
													<td colspan="2" style="height:20px;" width="410px" align="center"><font size="5" face="微軟正黑體" , color="black"><b>CAERB case</b></font></td>
												</tr>
												<tr>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Actual</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Open/Close</b></font></td>
													<td style="height:20px;" width="205px" align="center"><font size="4" face="微軟正黑體" , color="black"><b>Target</b></font></td>
                                                </tr>
                                                

<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='AA' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        if($OBA_Annual_Cost>=$OBA_Annual_Target){
            $OBA_Color='red';
        }else{
            $OBA_Color='blue';
        }
        $CAERB_Open=$getData['CAERB_Open'];
        $CAERB_Close=$getData['CAERB_close'];
        $CAERB_target=$getData['CAERB_target'];            
        if(($CAERB_Open+$CAERB_Close)>=$CAERB_target){
            $CAERB_Color='red';
        }else{
            $CAERB_Color='blue';
        }
$result->free();
 
?>  






												<tr>
													<td style="height:30px;" width="205px" align="center" class='<?php echo $OBA_Color; ?>'><font size="5"><?php echo floor(floatval($getData['OBA_Annual_Cost'])/1000000*100)/100; ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo floor(floatval($getData['OBA_Annual_Target'])/1000000*100)/100 ?>M</font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5" , color="<?php echo $CAERB_Color; ?>"><?php echo $CAERB_Open.'/'.$CAERB_Close; ?></font></td>
													<td style="height:30px;" width="205px" align="center"><font size="5", color="black"><?php echo $CAERB_target; ?></font></td>
												</tr>
												<tr>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBACost-AA" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
													<td colspan="2" style="height:150px;" width="410px" align="center" valign="center">
														<div class="sidebar-widget">
															<canvas width="300" height="200" id="OBAEvent-AA" class="" style="width: 150px height: 150px;"></canvas>
														</div>
													</td>
												</tr>
											</table>
									</div>
								</div>
         				</div>
         			</div>
         			
         			<div class="row">
								<div class="col-md-12 col-sm-4 ">
									<div class="x_panel tile fixed_height_320 overflow_hidden">
                  <div class='customerMosaic'></div>
											<table width="100%">
													  <tr>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">KPI</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Actual</span></b></font></td>
    													<td align="center" style="height:50px" width="10%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Target</span></b></font></td>
    													<td align="center" style="height:50px" width="5%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">燈號</span></b></font></td>
    													<td align="center" style="height:50px" width="30%" colspan="2"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Trend</span></b></font></td>
    													<td align="center" style="height:50px" width="30%"><font size="4" face="微軟正黑體" , color="black"><b><span style="text-decoration:underline;">Share</span></b></font></td>
 	 													</tr>
  													<tr style="background-color:#c0deff">
														<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>OBA Sorting<br>Rate</font>
																</td>
                                                                <?php
        include_once('db.php');
        
             
        $sql="SELECT * FROM cqekpi where BU='AA' and Year=".$maxYear." and Month=".$maxMonth.";";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }           

        $getData=$result->fetch_assoc();
        $OBA_Rate=floatval($getData['OBA_Rate'])*100;
        $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
        $Rate_Performance=$getData['Rate_Performance'];
        $Rate_Improve=$getData['Rate_Improve'];
        echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate.'%</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Rate_Target.'%</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Rate_Performance . $Rate_Improve .'.png" ></td>';
         
    
?>  
                                                        
                                                        
                                                        
                                                                
    													<td>
    														<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBARate-AA" class="" style="width: 150px height: 150px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    													<td align="center" style="height:85px" rowspan="3">
    														<div class="sidebar-widget">
                                                            <canvas width="350%" height="250%" id="OBATrend-AA" class="" style="width: 100% height: 100%;"></canvas>
																</div>
    													</td>
  													</tr>
														<tr style="background-color:#deffc0">
                                                            <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>當月預估<br>OBA Sorting Cost</b></font></td>
                                                            

<?php

$OBA_Estimate=floor(floatval($getData['OBA_Estimate'])/1000000*100)/100;
$OBA_Cost_Target=floor(floatval($getData['OBA_Cost_Target'])/1000000*100)/100;
$OBA_Cost_M_Performance=$getData['OBA_Cost_M_Performance'];
$OBA_Cost_M_Improve=$getData['OBA_Cost_M_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Estimate.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$OBA_Cost_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $OBA_Cost_M_Performance . $OBA_Cost_M_Improve .'.png" ></td>';

?>
    													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="OBACostTrend-AA" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    												</tr>



															
														<tr style="background-color:#c0deff ">
                                                        <td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>Customer Claim<br>(NTD)</b></font></td>
                                                        
                                                        <?php

$Customer_Claim=floor(floatval($getData['Customer_Claim'])/1000000*100)/100;
$Customer_Claim_Target=floor(floatval($getData['Customer_Claim_Target'])/1000000*100)/100;
$Customer_Claim_Performance=$getData['Customer_Claim_Performance'];
$Customer_Claim_Improve=$getData['Customer_Claim_Improve'];
echo '<td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim.'M</b>/月</td><td align="center" style="height:85px"><font size="4" face="微軟正黑體" , color="black"><b>'.$Customer_Claim_Target.'M</b>/月</td><td class="text-center"><img class=" w-75" src="images/'. $Customer_Claim_Performance . $Customer_Claim_Improve .'.png" ></td>';


$result->free();  
?>
    													<td>
																<div class="sidebar-widget">
																	<canvas width="500" height="80" id="customerClaim-AA" class="" style="width: 500px; height: 80px;"></canvas>
																</div>
    													</td>
    													<td align="left" style="height:85px"><font size="2" face="微軟正黑體" , color="black"></font>
                              </td>
    												</tr>




													
											</table>　
									</div>
								</div>
							</div>
					</div>
	
	
	
	<!-- jQuery -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/jquery/dist/jquery.min.js"></script>
	<script src="http://tnvqis03/Dashboard_Template/build/js/jquery.url.js"></script>
	<!-- Bootstrap -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/nprogress/nprogress.js"></script>
	<!-- Chart.js -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/Chart.js/dist/Chart.min.js"></script>
	<!-- gauge.js -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/gauge.js/dist/gauge.min.js"></script>
	<!-- gauge.js -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/gauge.js/dist/gauge.min.js"></script>
	<!-- bootstrap-progressbar -->
    <script src="http://tnvqis03/Dashboard_Template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/iCheck/icheck.min.js"></script>
	<!-- Skycons -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/skycons/skycons.js"></script>
	<!-- Flot -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/Flot/jquery.flot.js"></script>
	<script src="http://tnvqis03/Dashboard_Template/vendors/Flot/jquery.flot.pie.js"></script>
	<script src="http://tnvqis03/Dashboard_Template/vendors/Flot/jquery.flot.time.js"></script>
	<script src="http://tnvqis03/Dashboard_Template/vendors/Flot/jquery.flot.stack.js"></script>
	<script src="http://tnvqis03/Dashboard_Template/vendors/Flot/jquery.flot.resize.js"></script>
	<!-- Flot plugins -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
	<script src="http://tnvqis03/Dashboard_Template/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
	<script src="http://tnvqis03/Dashboard_Template/vendors/flot.curvedlines/curvedLines.js"></script>
	<!-- DateJS -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/DateJS/build/date.js"></script>
	<!-- JQVMap -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/jqvmap/dist/jquery.vmap.js"></script>
	<script src="http://tnvqis03/Dashboard_Template/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
	<script src="http://tnvqis03/Dashboard_Template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="http://tnvqis03/Dashboard_Template/vendors/moment/min/moment.min.js"></script>
	<script src="http://tnvqis03/Dashboard_Template/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

	<!--<script src="vendors/custom.min.js"></script>-->
	
	<!-- ECharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.9.0-rc.1/echarts.min.js"></script>
 
<!--TV Chart-->>
<script type="text/javascript">
  (function(){
    'use strict';

    $('.customerMask').hide();
    $('.customerMosaic').hide();

    var bImgFilter=false;

    $('#switchMask').click(function(){
      // $('.customerMask').toggle();
      if(!bImgFilter){
        $('.imgCustomer').addClass('imgFilter');
      }
      else{
        $('imgCustomer').removeClass('imgFilter');
      }
      bImgFilter=!bImgFilter;
      $('.customerMosaic').toggle();
    });
    
    var OBACostChart = echarts.init(document.getElementById('OBACost'));
    var option1 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Cost',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},

 <?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='TV' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();                
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];        
        $OBA_Cost_LastYear=$getData['OBA_Cost_LastYear'];
        $OBA_Cost_Max=$OBA_Cost_LastYear/80*100;
        $Percent=floatval(intval($OBA_Annual_Cost/$OBA_Annual_Target*10000))/100.;
        echo "data: [{value: ". intval($OBA_Annual_Cost/$OBA_Cost_Max*100.) . ", name: '$Percent%'}],";   
$result->free();
 
?>  
            axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },




      
                axisLine: { // 座標軸線 	
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($OBA_Annual_Target/$OBA_Cost_Max) .", '#00AE75'],"
                          ?> 
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              center: ['50%', '60%'],
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    OBACostChart.setOption(option1, true);


    var OBAEventChart = echarts.init(document.getElementById('OBAEvent'));
    var option2 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Event',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},
              
<?php
include_once('db.php');   
$startMonth=0;
$startYear=0;
$monthIndex="[";
if($maxMonth>6){
  $startYear=$maxYear;
  $startMonth=$maxMonth-5;
  for($i=$startMonth;$i<=$maxMonth;$i++){
    if($i==$maxMonth){
      $monthIndex=$monthIndex.$i;
    }
    else{
      $monthIndex=$monthIndex.$i.',';
    }
  }
}     
else{
  $startYear=$maxYear-1;
  $startMonth=12-(6-$maxMonth)+1;
  for($i=$startMonth;$i<=12;$i++){
    $monthIndex=$monthIndex.$i.',';
  }
  for($i=1;$i<=$maxMonth;$i++){
    if($i==$maxMonth){
      $monthIndex=$monthIndex.$i;
    }
    else{
      $monthIndex=$monthIndex.$i.',';
    }
  }
}     
$monthIndex=$monthIndex."]";
             
$sql="SELECT * FROM cqekpi where BU='TV' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $CAERB_total=$getData['CAERB_total'];
        $CAERB_target=$getData['CAERB_target'];

        $CAERB_Event_LastYear=$getData['CAERB_LastYear'];
        $CAERB_Event_Max=$CAERB_Event_LastYear/80*100;
        $Percent=floatval(intval($CAERB_total/$CAERB_target*10000))/100.;
        echo "data: [{value: ". intval($CAERB_total/$CAERB_Event_Max*100) . ", name: '$Percent%'}],"; 
   
$result->free();
 
?>  



              center: ['50%', '60%'],
              axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },
              axisLine: { // 座標軸線
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                            
                          <?php
                          echo "[" . floatval($CAERB_target/$CAERB_Event_Max) .", '#00AE75'],"
                          ?>
                             
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    OBAEventChart.setOption(option2, true);

    var OBARateChart = echarts.init(document.getElementById('OBARate'));
    var option3 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: true
            }
        },       
       
        <?php
        include_once('db.php');       

      //  echo console.log($startYear,$startMonth);
        //$sql="SELECT * FROM cqekpi where BU='TV' and ((Year=".$startYear." and Month>=".$startMonth.") or (Year=".$maxYear." and Month<=".$maxMonth.")) order by Year,Month";

        $sql="SELECT * FROM cqekpi where BU='TV' and ((Year=".$startYear." and Month>=".$startMonth.") and (Year=".$maxYear." and Month<=".$maxMonth.")) order by Year,Month";

        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }   
        
        $OBA_Rate_Max=0.;
        $OBA_Rate_Data='';
        $OBA_Cost_Max=0.;
        $OBA_Cost_Data=''; 
        $Customer_Claim_Max=0.;
        $Customer_Claim_Data='';       
        $count=0;
        while($getData=$result->fetch_assoc()){
          $OBA_Rate=floatval($getData['OBA_Rate'])*100;          
          $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
          $OBA_Cost=$getData['OBA_Cost'];
          $OBA_Cost_Target=$getData['OBA_Cost_Target'];
          $Customer_Claim=$getData['Customer_Claim'];
          $Customer_Claim_Target=$getData['Customer_Claim_Target'];
          if($OBA_Rate_Max<$OBA_Rate_Target*1.5){
            $OBA_Rate_Max=$OBA_Rate_Target*1.5;
          }
          if($OBA_Rate_Max<$OBA_Rate){
            $OBA_Rate_Max=$OBA_Rate*1.05;
          }
          if($OBA_Cost_Max<$OBA_Cost_Target*1.5){
            $OBA_Cost_Max=$OBA_Cost_Target*1.5;
          }
          if($OBA_Cost_Max<$OBA_Cost){
            $OBA_Cost_Max=$OBA_Cost*1.05;
          }
          if($Customer_Claim_Max<$Customer_Claim_Target*1.5){
            $Customer_Claim_Max=$Customer_Claim_Target*1.5;
          }
          if($Customer_Claim_Max<$Customer_Claim){
            $Customer_Claim_Max=$Customer_Claim*1.05;
          }
          $count++;
          if($count==6){
            $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate;
          }else{
            $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate .',';
          }
          if($count==6){
            $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($getData['OBA_Estimate']/10000))/100;
          }else{
            $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($OBA_Cost/10000))/100 .',';
          }
          if($count==6){
            $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100;
          }else{
            $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100 .',';
          }
          
        }        
        $result->free();
?>


        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -0.01,
                lte: <?php echo $OBA_Rate_Target; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Rate_Target; ?>,
                lte: <?php echo $OBA_Rate_Max; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Rate',
            label:{
                show: true,
                formatter: '{c}%'
            },
            type: 'line',
            data: [<?php echo $OBA_Rate_Data; ?>],
            lineStyle: {                
                width: 6
            },           

        }
    };
    OBARateChart.setOption(option3, true);



    var OBACostTrendChart = echarts.init(document.getElementById('OBACostTrend'));
    var option4 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $OBA_Cost_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Cost_Target/1000000; ?>,
                lte: <?php echo $OBA_Cost_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            label:{
                show: true,
                formatter: '{c}M'
            },
            type: 'line',
            data: [<?php echo $OBA_Cost_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    OBACostTrendChart.setOption(option4, true);

    
    var customerClaimChart = echarts.init(document.getElementById('customerClaim'));
    var option5 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $Customer_Claim_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $Customer_Claim_Target/1000000; ?>,
                lte: <?php echo $Customer_Claim_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            label:{
                show: true,
                formatter: '{c}M'
            },
            type: 'line',
            data: [<?php echo $Customer_Claim_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    customerClaimChart.setOption(option5, true);


<?php
include_once('db.php');        
             
$sql="SELECT * FROM sankey WHERE BU='TV' AND SHARE<>0 ORDER BY KPI DESC ;";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
} 
$leftItem=array();
$customerList=array(); 
$leftItemColor='';
$customerColor='';
$rightValue='';

while($getData=$result->fetch_assoc()){
    $item=$getData['KPI'];
    
    // if (! in_array($item, $leftItem)){
    //     array_push($leftItem,$item);
       
    // }

    $customer=$getData['CustomerName'];
    if (! in_array($customer, $customerList)){
        array_push($customerList,$customer);
        
    }
	if(! in_array($item, $leftItem,)){
		  array_push($leftItem,$item);
	  }
    $rightValue=$rightValue.'{source: "'.trim($item).'", target: "'.$customer.'", value:'.$getData['Share'].'},';
}
foreach ($leftItem as $value) {
   
    if($value=="OBA Sorting Rate"){
        $leftItemColor=$leftItemColor."'OBA Sorting Rate':'#66CCCC',";
    }elseif(trim($value)=="OBA Sorting Cost"){
        $leftItemColor=$leftItemColor."'OBA Sorting Cost':'#CCFF66',";
    }else{
        $leftItemColor=$leftItemColor."'Customer Claim':'#FF99CC',";
    }
}
foreach ($customerList as $value) {
        
    $customerColor=$customerColor."'".$value."':'rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",1)',";
    
}


?>   



    var OBATrendChart = echarts.init(document.getElementById('OBATrend'));
    var left={
      <?php echo $leftItemColor.$customerColor; ?>
    }
    var rightValue=[
      <?php echo $rightValue; ?>
       ];
    var data=[];
    var leftlist=[];
    for(var key in left){
        leftlist.push(
            {name: key,itemStyle: {color:left[key]}}
        )
    }
    for(var i=0;i<rightValue.length;i++){
        var color=new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                offset: 0,
                color: left[rightValue[i].source]
            },{
                offset: 1,
                color: left[rightValue[i].target]
            }]
        )
        data.push(
            {source: rightValue[i].source,
            target: rightValue[i].target,
            value: rightValue[i].value,
                lineStyle: {
                color:color
                }
            }
        )
    }
    var option6 = {
        
        series: [
            {
                type: 'sankey',
                data: leftlist,
                links: data,
                focusNodeAdjacency: 'allEdges',
                itemStyle: {
                    borderWidth: 1,
                    color:'#1b6199',
                    borderColor: '#fff'
                },
                lineStyle: {
                    curveness: 0.5,
                    opacity:0.5
                },
                layoutIterations: 0
            }
        ]
    }
<?php
  if($result->num_rows>0){
    echo "OBATrendChart.setOption(option6);";    
  } 
  $result->free();  
?>

//--CE Chart--


var CEOBACostChart = echarts.init(document.getElementById('OBACost-CE'));
    var option21 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Cost',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},

 <?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='CE' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        $OBA_Cost_LastYear=$getData['OBA_Cost_LastYear'];
        $OBA_Cost_Max=$OBA_Cost_LastYear/80*100;
        $Percent=floatval(intval($OBA_Annual_Cost/$OBA_Annual_Target*10000))/100.;
        echo "data: [{value: ". intval($OBA_Annual_Cost/$OBA_Cost_Max*100) . ", name: '$Percent%'}],";   
$result->free();
 
?>  
            axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },




      
                axisLine: { // 座標軸線 	
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                            
                          <?php
                          echo "[" . floatval($OBA_Annual_Target/$OBA_Cost_Max) .", '#00AE75'],"
                          ?>

                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              center: ['50%', '60%'],
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    CEOBACostChart.setOption(option21, true);

    var CEOBAEventChart = echarts.init(document.getElementById('OBAEvent-CE'));
    var option22 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Event',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},
              
<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='CE' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $CAERB_total=$getData['CAERB_total'];
        $CAERB_target=$getData['CAERB_target'];

        //$CAERB_Event_Max=$CAERB_target/80*100;
        //echo "data: [{value: ". intval($CAERB_total/$CAERB_Event_Max*100) . ", name: ''}],";   
        $CAERB_Event_LastYear=$getData['CAERB_LastYear'];
        $CAERB_Event_Max=$CAERB_Event_LastYear/80*100;
        $Percent=floatval(intval($CAERB_total/$CAERB_target*10000))/100.;
        echo "data: [{value: ". intval($CAERB_total/$CAERB_Event_Max*100) . ", name: '$Percent%'}],"; 


$result->free();


 
?>  



              center: ['50%', '60%'],
              axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },
              axisLine: { // 座標軸線
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($CAERB_target/$CAERB_Event_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    CEOBAEventChart.setOption(option22, true);

    var CEOBARateChart = echarts.init(document.getElementById('OBARate-CE'));
    var option23 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        <?php
        include_once('db.php');       
             
        $sql="SELECT * FROM cqekpi where BU='CE' and((Year=".$startYear." and Month>=".$startMonth.") and (Year=".$maxYear." and Month<=".$maxMonth."))order by Year,Month";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }   
        
        $OBA_Rate_Max=0.;
        $OBA_Rate_Data='';
        $OBA_Cost_Max=0.;
        $OBA_Cost_Data=''; 
        $Customer_Claim_Max=0.;
        $Customer_Claim_Data='';       
        $count=0;
        while($getData=$result->fetch_assoc()){
            $OBA_Rate=floatval($getData['OBA_Rate'])*100;          
            $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
            $OBA_Cost=$getData['OBA_Cost'];
            $OBA_Cost_Target=$getData['OBA_Cost_Target'];
            $Customer_Claim=$getData['Customer_Claim'];
            $Customer_Claim_Target=$getData['Customer_Claim_Target'];
            if($OBA_Rate_Max<$OBA_Rate_Target*1.5){
              $OBA_Rate_Max=$OBA_Rate_Target*1.5;
            }
            if($OBA_Rate_Max<$OBA_Rate){
              $OBA_Rate_Max=$OBA_Rate*1.05;
            }
            if($OBA_Cost_Max<$OBA_Cost_Target*1.5){
              $OBA_Cost_Max=$OBA_Cost_Target*1.5;
            }
            if($OBA_Cost_Max<$OBA_Cost){
              $OBA_Cost_Max=$OBA_Cost*1.1;
            }
            if($Customer_Claim_Max<$Customer_Claim_Target*1.5){
              $Customer_Claim_Max=$Customer_Claim_Target*1.5;
            }
            if($Customer_Claim_Max<$Customer_Claim){
              $Customer_Claim_Max=$Customer_Claim*1.05;
            }
            $count++;
            if($count==6){
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate;
            }else{
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate .',';
            }
            if($count==6){
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($getData['OBA_Estimate']/10000))/100;
            }else{
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($OBA_Cost/10000))/100 .',';
            }
            if($count==6){
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100;
            }else{
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100 .',';
            }
          
        }        
        $result->free();
?>


        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -0.01,
                lte: <?php echo $OBA_Rate_Target; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Rate_Target; ?>,
                lte: <?php echo $OBA_Rate_Max; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Rate',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}%'
            },
            data: [<?php echo $OBA_Rate_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    CEOBARateChart.setOption(option23, true);

    var CEOBACostTrendChart = echarts.init(document.getElementById('OBACostTrend-CE'));
    var option24 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $OBA_Cost_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Cost_Target/1000000; ?>,
                lte: <?php echo $OBA_Cost_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $OBA_Cost_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    CEOBACostTrendChart.setOption(option24, true);

    var CEcustomerClaimChart = echarts.init(document.getElementById('customerClaim-CE'));
    var option25 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $Customer_Claim_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $Customer_Claim_Target/1000000; ?>,
                lte: <?php echo $Customer_Claim_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $Customer_Claim_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    CEcustomerClaimChart.setOption(option25, true);

    <?php
include_once('db.php');        
             
$sql="SELECT * FROM sankey WHERE BU='CE' AND SHARE<>0 ORDER BY KPI DESC;";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
 

}
else{ 
  $leftItem=array();
  $customerList=array(); 
  $leftItemColor='';
  $customerColor='';
  $rightValue='';

  while($getData=$result->fetch_assoc()){
      $item=$getData['KPI'];
      
      // if (! in_array($item, $leftItem)){
      //     array_push($leftItem,$item);
        
      // }

      $customer=$getData['CustomerName'];
      if (! in_array($customer, $customerList)){
          array_push($customerList,$customer);
          
      }
	  if(! in_array($item, $leftItem,)){
		  array_push($leftItem,$item);
	  }
      $rightValue=$rightValue.'{source: "'.trim($item).'", target: "'.$customer.'", value:'.$getData['Share'].'},';
  }
  foreach ($leftItem as $value) {
    
      if($value=="OBA Sorting Rate"){
          $leftItemColor=$leftItemColor."'OBA Sorting Rate':'#66CCCC',";
      }elseif(trim($value)=="OBA Sorting Cost"){
          $leftItemColor=$leftItemColor."'OBA Sorting Cost':'#CCFF66',";
      }else{
          $leftItemColor=$leftItemColor."'Customer Claim':'#FF99CC',";
      }

  }
  foreach ($customerList as $value) {
          
      $customerColor=$customerColor."'".$value."':'rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",1)',";
      
  }

}
 
?>   



    var CEOBATrendChart = echarts.init(document.getElementById('OBATrend-CE'));
    var left={
      <?php echo $leftItemColor.$customerColor; ?>
    }
    var rightValue=[
      <?php echo $rightValue; ?>
       ];
    var data=[];
    var leftlist=[];
    for(var key in left){
        leftlist.push(
            {name: key,itemStyle: {color:left[key]}}
        )
    }
    for(var i=0;i<rightValue.length;i++){
        var color=new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                offset: 0,
                color: left[rightValue[i].source]
            },{
                offset: 1,
                color: left[rightValue[i].target]
            }]
        )
        data.push(
            {source: rightValue[i].source,
            target: rightValue[i].target,
            value: rightValue[i].value,
                lineStyle: {
                color:color
                }
            }
        )
    }
    var option26 = {
        
        series: [
            {
                type: 'sankey',
                data: leftlist,
                links: data,
                focusNodeAdjacency: 'allEdges',
                itemStyle: {
                    borderWidth: 1,
                    color:'#1b6199',
                    borderColor: '#fff'
                },
                lineStyle: {
                    curveness: 0.5,
                    opacity:0.5
                },
                layoutIterations: 0
            }
        ]
    }
    <?php
  if($result->num_rows>0){
    echo "CEOBATrendChart.setOption(option26);";    
  } 
  $result->free();
  
?>
    
//--IAVM Chart--


var IAVMOBACostChart = echarts.init(document.getElementById('OBACost-IAVM'));
    var option31 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Cost',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},

 <?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='IAVM' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        $OBA_Cost_LastYear=$getData['OBA_Cost_LastYear'];
        $OBA_Cost_Max=$OBA_Cost_LastYear/80*100;
        $Percent=floatval(intval($OBA_Annual_Cost/$OBA_Annual_Target*10000))/100.;
        echo "data: [{value: ". intval($OBA_Annual_Cost/$OBA_Cost_Max*100) . ", name: '$Percent%'}],";   
$result->free();
 
?>  
            axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },




      
                axisLine: { // 座標軸線 	
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($OBA_Annual_Target/$OBA_Cost_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              center: ['50%', '60%'],
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    IAVMOBACostChart.setOption(option31, true);

    var IAVMOBAEventChart = echarts.init(document.getElementById('OBAEvent-IAVM'));
    var option32 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Event',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},
              
<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='IAVM' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $CAERB_total=$getData['CAERB_total'];
        $CAERB_target=$getData['CAERB_target'];

        $CAERB_Event_LastYear=$getData['CAERB_LastYear'];
        $CAERB_Event_Max=$CAERB_Event_LastYear/80*100;
        $Percent=floatval(intval($CAERB_total/$CAERB_target*10000))/100.;
        echo "data: [{value: ". intval($CAERB_total/$CAERB_Event_Max*100) . ", name: '$Percent%'}],"; 

$result->free();
 
?>  



              center: ['50%', '60%'],
              axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },
              axisLine: { // 座標軸線
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($CAERB_target/$CAERB_Event_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    IAVMOBAEventChart.setOption(option32, true);

    var IAVMOBARateChart = echarts.init(document.getElementById('OBARate-IAVM'));
    var option33 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        <?php
        include_once('db.php');       
             
        $sql="SELECT * FROM cqekpi where BU='IAVM' and((Year=".$startYear." and Month>=".$startMonth.") and (Year=".$maxYear." and Month<=".$maxMonth."))order by Year,Month";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }   
        
        $OBA_Rate_Max=0.;
        $OBA_Rate_Data='';
        $OBA_Cost_Max=0.;
        $OBA_Cost_Data=''; 
        $Customer_Claim_Max=0.;
        $Customer_Claim_Data='';       
        $count=0;
        while($getData=$result->fetch_assoc()){
            $OBA_Rate=floatval($getData['OBA_Rate'])*100;          
            $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
            $OBA_Cost=$getData['OBA_Cost'];
            $OBA_Cost_Target=$getData['OBA_Cost_Target'];
            $Customer_Claim=$getData['Customer_Claim'];
            $Customer_Claim_Target=$getData['Customer_Claim_Target'];
            if($OBA_Rate_Max<$OBA_Rate_Target*1.5){
              $OBA_Rate_Max=$OBA_Rate_Target*1.5;
            }
            if($OBA_Rate_Max<$OBA_Rate){
              $OBA_Rate_Max=$OBA_Rate*1.05;
            }
            if($OBA_Cost_Max<$OBA_Cost_Target*1.5){
              $OBA_Cost_Max=$OBA_Cost_Target*1.5;
            }
            if($OBA_Cost_Max<$OBA_Cost){
              $OBA_Cost_Max=$OBA_Cost*1.05;
            }
            if($Customer_Claim_Max<$Customer_Claim_Target*1.5){
              $Customer_Claim_Max=$Customer_Claim_Target*1.5;
            }
            if($Customer_Claim_Max<$Customer_Claim){
              $Customer_Claim_Max=$Customer_Claim*1.05;
            }
            $count++;
            if($count==6){
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate;
            }else{
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate .',';
            }
            if($count==6){
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($getData['OBA_Estimate']/10000))/100;
            }else{
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($OBA_Cost/10000))/100 .',';
            }
            if($count==6){
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100;
            }else{
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100 .',';
            }
          
        }        
        $result->free();
?>


        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -0.01,
                lte: <?php echo $OBA_Rate_Target; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Rate_Target; ?>,
                lte: <?php echo $OBA_Rate_Max; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Rate',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}%'
            },
            data: [<?php echo $OBA_Rate_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    IAVMOBARateChart.setOption(option33, true);

    var IAVMOBACostTrendChart = echarts.init(document.getElementById('OBACostTrend-IAVM'));
    var option34 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $OBA_Cost_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Cost_Target/1000000; ?>,
                lte: <?php echo $OBA_Cost_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $OBA_Cost_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    IAVMOBACostTrendChart.setOption(option34, true);

    var IAVMcustomerClaimChart = echarts.init(document.getElementById('customerClaim-IAVM'));
    var option35 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $Customer_Claim_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $Customer_Claim_Target/1000000; ?>,
                lte: <?php echo $Customer_Claim_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $Customer_Claim_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    IAVMcustomerClaimChart.setOption(option35, true);

    <?php
include_once('db.php');        
             
$sql="SELECT * FROM sankey WHERE BU='IAVM' AND SHARE<>0 ORDER BY KPI DESC;";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
} 
$leftItem=array();
$customerList=array(); 
$leftItemColor='';
$customerColor='';
$rightValue='';

while($getData=$result->fetch_assoc()){
    $item=$getData['KPI'];
    
    // if (! in_array($item, $leftItem)){
    //     array_push($leftItem,$item);
       
    // }

    $customer=$getData['CustomerName'];
    if (! in_array($customer, $customerList)){
        array_push($customerList,$customer);
        
    }
	if(! in_array($item, $leftItem,)){
		  array_push($leftItem,$item);
	  }
    $rightValue=$rightValue.'{source: "'.trim($item).'", target: "'.$customer.'", value:'.$getData['Share'].'},';
}
foreach ($leftItem as $value) {
   
    if($value=="OBA Sorting Rate"){
        $leftItemColor=$leftItemColor."'OBA Sorting Rate':'#66CCCC',";
    }elseif(trim($value)=="OBA Sorting Cost"){
        $leftItemColor=$leftItemColor."'OBA Sorting Cost':'#CCFF66',";
    }else{
        $leftItemColor=$leftItemColor."'Customer Claim':'#FF99CC',";
    }
}
foreach ($customerList as $value) {
        
    $customerColor=$customerColor."'".$value."':'rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",1)',";
    
}


 
?>   



    var IAVMOBATrendChart = echarts.init(document.getElementById('OBATrend-IAVM'));
    var left={
      <?php echo $leftItemColor.$customerColor; ?>
    }
    var rightValue=[
      <?php echo $rightValue; ?>
       ];
    var data=[];
    var leftlist=[];
    for(var key in left){
        leftlist.push(
            {name: key,itemStyle: {color:left[key]}}
        )
    }
    for(var i=0;i<rightValue.length;i++){
        var color=new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                offset: 0,
                color: left[rightValue[i].source]
            },{
                offset: 1,
                color: left[rightValue[i].target]
            }]
        )
        data.push(
            {source: rightValue[i].source,
            target: rightValue[i].target,
            value: rightValue[i].value,
                lineStyle: {
                color:color
                }
            }
        )
    }
    var option36 = {
        
        series: [
            {
                type: 'sankey',
                data: leftlist,
                links: data,
                focusNodeAdjacency: 'allEdges',
                itemStyle: {
                    borderWidth: 1,
                    color:'#1b6199',
                    borderColor: '#fff'
                },
                lineStyle: {
                    curveness: 0.5,
                    opacity:0.5
                },
                layoutIterations: 0
            }
        ]
    }
    <?php
  if($result->num_rows>0){
    echo "IAVMOBATrendChart.setOption(option36);";    
  } 
  $result->free();  
?>


//--MONITOR Chart--


var MONITOROBACostChart = echarts.init(document.getElementById('OBACost-MONITOR'));
    var option41 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Cost',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},

 <?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='Monitor' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        $OBA_Cost_LastYear=$getData['OBA_Cost_LastYear'];
        $OBA_Cost_Max=$OBA_Cost_LastYear/80*100;
        $Percent=floatval(intval($OBA_Annual_Cost/$OBA_Annual_Target*10000))/100.;
        echo "data: [{value: ". intval($OBA_Annual_Cost/$OBA_Cost_Max*100) . ", name: '$Percent%'}],";   
$result->free();
 
?>  
            axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },




      
                axisLine: { // 座標軸線 	
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($OBA_Annual_Target/$OBA_Cost_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              center: ['50%', '60%'],
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    MONITOROBACostChart.setOption(option41, true);

    var MONITOROBAEventChart = echarts.init(document.getElementById('OBAEvent-MONITOR'));
    var option42 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Event',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},
              
<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='Monitor' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $CAERB_total=$getData['CAERB_total'];
        $CAERB_target=$getData['CAERB_target'];

        $CAERB_Event_LastYear=$getData['CAERB_LastYear'];
        $CAERB_Event_Max=$CAERB_Event_LastYear/80*100;
        $Percent=floatval(intval($CAERB_total/$CAERB_target*10000))/100.;
        echo "data: [{value: ". intval($CAERB_total/$CAERB_Event_Max*100) . ", name: '$Percent%'}],"; 
$result->free();
 
?>  



              center: ['50%', '60%'],
              axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },
              axisLine: { // 座標軸線
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($CAERB_target/$CAERB_Event_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    MONITOROBAEventChart.setOption(option42, true);

    var MONITOROBARateChart = echarts.init(document.getElementById('OBARate-MONITOR'));
    var option43 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        <?php
        include_once('db.php');       
             
        $sql="SELECT * FROM cqekpi where BU='Monitor' and((Year=".$startYear." and Month>=".$startMonth.") and (Year=".$maxYear." and Month<=".$maxMonth."))order by Year,Month";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }   
        
        $OBA_Rate_Max=0.;
        $OBA_Rate_Data='';
        $OBA_Cost_Max=0.;
        $OBA_Cost_Data=''; 
        $Customer_Claim_Max=0.;
        $Customer_Claim_Data='';       
        $count=0;
        while($getData=$result->fetch_assoc()){
            $OBA_Rate=floatval($getData['OBA_Rate'])*100;          
            $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
            $OBA_Cost=$getData['OBA_Cost'];
            $OBA_Cost_Target=$getData['OBA_Cost_Target'];
            $Customer_Claim=$getData['Customer_Claim'];
            $Customer_Claim_Target=$getData['Customer_Claim_Target'];
            if($OBA_Rate_Max<$OBA_Rate_Target*1.5){
              $OBA_Rate_Max=$OBA_Rate_Target*1.5;
            }
            if($OBA_Rate_Max<$OBA_Rate){
              $OBA_Rate_Max=$OBA_Rate*1.05;
            }
            if($OBA_Cost_Max<$OBA_Cost_Target*1.5){
              $OBA_Cost_Max=$OBA_Cost_Target*1.5;
            }
            if($OBA_Cost_Max<$OBA_Cost){
              $OBA_Cost_Max=$OBA_Cost*1.05;
            }
            if($Customer_Claim_Max<$Customer_Claim_Target*1.5){
              $Customer_Claim_Max=$Customer_Claim_Target*1.5;
            }
            if($Customer_Claim_Max<$Customer_Claim){
              $Customer_Claim_Max=$Customer_Claim*1.05;
            }
            $count++;
            if($count==6){
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate;
            }else{
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate .',';
            }
            if($count==6){
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($getData['OBA_Estimate']/10000))/100;
            }else{
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($OBA_Cost/10000))/100 .',';
            }
            if($count==6){
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100;
            }else{
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100 .',';
            }
          
        }        
        $result->free();
?>


        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -0.01,
                lte: <?php echo $OBA_Rate_Target; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Rate_Target; ?>,
                lte: <?php echo $OBA_Rate_Max; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Rate',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}%'
            },
            data: [<?php echo $OBA_Rate_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    MONITOROBARateChart.setOption(option43, true);

    var MONITOROBACostTrendChart = echarts.init(document.getElementById('OBACostTrend-MONITOR'));
    var option44 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $OBA_Cost_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Cost_Target/1000000; ?>,
                lte: <?php echo $OBA_Cost_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $OBA_Cost_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    MONITOROBACostTrendChart.setOption(option44, true);

    var MONITORcustomerClaimChart = echarts.init(document.getElementById('customerClaim-MONITOR'));
    var option45 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $Customer_Claim_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $Customer_Claim_Target/1000000; ?>,
                lte: <?php echo $Customer_Claim_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $Customer_Claim_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    MONITORcustomerClaimChart.setOption(option45, true);

    <?php
include_once('db.php');        
             
$sql="SELECT * FROM sankey WHERE BU='Monitor' AND SHARE<>0 ORDER BY KPI DESC ;";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
} 
$leftItem=array();
$customerList=array(); 
$leftItemColor='';
$customerColor='';
$rightValue='';

while($getData=$result->fetch_assoc()){
    $item=$getData['KPI'];
    
    // if (! in_array($item, $leftItem)){
    //     array_push($leftItem,$item);
       
    // }

    $customer=$getData['CustomerName'];
    if (! in_array($customer, $customerList)){
        array_push($customerList,$customer);
        
    }
	if(! in_array($item, $leftItem,)){
		  array_push($leftItem,$item);
	  }
    $rightValue=$rightValue.'{source: "'.trim($item).'", target: "'.$customer.'", value:'.$getData['Share'].'},';
}
foreach ($leftItem as $value) {
   
    if($value=="OBA Sorting Rate"){
        $leftItemColor=$leftItemColor."'OBA Sorting Rate':'#66CCCC',";
    }elseif(trim($value)=="OBA Sorting Cost"){
        $leftItemColor=$leftItemColor."'OBA Sorting Cost':'#CCFF66',";
    }else{
        $leftItemColor=$leftItemColor."'Customer Claim':'#FF99CC',";
    }
}
foreach ($customerList as $value) {
        
    $customerColor=$customerColor."'".$value."':'rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",1)',";
    
}


 
?>   



    var MONITOROBATrendChart = echarts.init(document.getElementById('OBATrend-MONITOR'));
    var left={
      <?php echo $leftItemColor.$customerColor; ?>
    }
    var rightValue=[
      <?php echo $rightValue; ?>
       ];
    var data=[];
    var leftlist=[];
    for(var key in left){
        leftlist.push(
            {name: key,itemStyle: {color:left[key]}}
        )
    }
    for(var i=0;i<rightValue.length;i++){
        var color=new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                offset: 0,
                color: left[rightValue[i].source]
            },{
                offset: 1,
                color: left[rightValue[i].target]
            }]
        )
        data.push(
            {source: rightValue[i].source,
            target: rightValue[i].target,
            value: rightValue[i].value,
                lineStyle: {
                color:color
                }
            }
        )
    }
    var option46 = {
        
        series: [
            {
                type: 'sankey',
                data: leftlist,
                links: data,
                focusNodeAdjacency: 'allEdges',
                itemStyle: {
                    borderWidth: 1,
                    color:'#1b6199',
                    borderColor: '#fff'
                },
                lineStyle: {
                    curveness: 0.5,
                    opacity:0.5
                },
                layoutIterations: 0
            }
        ]
    }
    <?php
  if($result->num_rows>0){
    echo "MONITOROBATrendChart.setOption(option46);";    
  } 
  $result->free();  
?>


//--MP Chart--


var MPOBACostChart = echarts.init(document.getElementById('OBACost-MP'));
    var option51 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Cost',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},

 <?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='MP' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        $OBA_Cost_LastYear=$getData['OBA_Cost_LastYear'];
        $OBA_Cost_Max=$OBA_Cost_LastYear/80*100;
        $Percent=floatval(intval($OBA_Annual_Cost/$OBA_Annual_Target*10000))/100.;
        echo "data: [{value: ". intval($OBA_Annual_Cost/$OBA_Cost_Max*100) . ", name: '$Percent%'}],"; 
$result->free();
 
?>  
            axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },




      
                axisLine: { // 座標軸線 	
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($OBA_Annual_Target/$OBA_Cost_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              center: ['50%', '60%'],
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    MPOBACostChart.setOption(option51, true);

    var MPOBAEventChart = echarts.init(document.getElementById('OBAEvent-MP'));
    var option52 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Event',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},
              
<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='MP' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $CAERB_total=$getData['CAERB_total'];
        $CAERB_target=$getData['CAERB_target'];

        $CAERB_Event_LastYear=$getData['CAERB_LastYear'];
        $CAERB_Event_Max=$CAERB_Event_LastYear/80*100;
        $Percent=floatval(intval($CAERB_total/$CAERB_target*10000))/100.;
        echo "data: [{value: ". intval($CAERB_total/$CAERB_Event_Max*100) . ", name: '$Percent%'}],"; 
$result->free();
 
?>  



              center: ['50%', '60%'],
              axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },
              axisLine: { // 座標軸線
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($CAERB_target/$CAERB_Event_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    MPOBAEventChart.setOption(option52, true);

    var MPOBARateChart = echarts.init(document.getElementById('OBARate-MP'));
    var option53 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        <?php
        include_once('db.php');       
             
        $sql="SELECT * FROM cqekpi where BU='MP' and((Year=".$startYear." and Month>=".$startMonth.") and (Year=".$maxYear." and Month<=".$maxMonth."))order by Year,Month";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }   
        
        $OBA_Rate_Max=0.;
        $OBA_Rate_Data='';
        $OBA_Cost_Max=0.;
        $OBA_Cost_Data=''; 
        $Customer_Claim_Max=0.;
        $Customer_Claim_Data='';       
        $count=0;
        while($getData=$result->fetch_assoc()){
            $OBA_Rate=floatval($getData['OBA_Rate'])*100;          
            $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
            $OBA_Cost=$getData['OBA_Cost'];
            $OBA_Cost_Target=$getData['OBA_Cost_Target'];
            $Customer_Claim=$getData['Customer_Claim'];
            $Customer_Claim_Target=$getData['Customer_Claim_Target'];
            if($OBA_Rate_Max<$OBA_Rate_Target*1.5){
              $OBA_Rate_Max=$OBA_Rate_Target*1.5;
            }
            if($OBA_Rate_Max<$OBA_Rate){
              $OBA_Rate_Max=$OBA_Rate*1.05;
            }
            if($OBA_Cost_Max<$OBA_Cost_Target*1.5){
              $OBA_Cost_Max=$OBA_Cost_Target*1.5;
            }
            if($OBA_Cost_Max<$OBA_Cost){
              $OBA_Cost_Max=$OBA_Cost*1.05;
            }
            if($Customer_Claim_Max<$Customer_Claim_Target*1.5){
              $Customer_Claim_Max=$Customer_Claim_Target*1.5;
            }
            if($Customer_Claim_Max<$Customer_Claim){
              $Customer_Claim_Max=$Customer_Claim*1.05;
            }
            $count++;
            if($count==6){
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate;
            }else{
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate .',';
            }
            if($count==6){
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($getData['OBA_Estimate']/10000))/100;
            }else{
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($OBA_Cost/10000))/100 .',';
            }
            if($count==6){
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100;
            }else{
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100 .',';
            }
          
        }        
        $result->free();
?>


        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -0.01,
                lte: <?php echo $OBA_Rate_Target; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Rate_Target; ?>,
                lte: <?php echo $OBA_Rate_Max; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Rate',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}%'
            },
            data: [<?php echo $OBA_Rate_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    MPOBARateChart.setOption(option53, true);

    var MPOBACostTrendChart = echarts.init(document.getElementById('OBACostTrend-MP'));
    var option54 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $OBA_Cost_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Cost_Target/1000000; ?>,
                lte: <?php echo $OBA_Cost_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $OBA_Cost_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    MPOBACostTrendChart.setOption(option54, true);

    var MPcustomerClaimChart = echarts.init(document.getElementById('customerClaim-MP'));
    var option55 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $Customer_Claim_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $Customer_Claim_Target/1000000; ?>,
                lte: <?php echo $Customer_Claim_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $Customer_Claim_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    MPcustomerClaimChart.setOption(option55, true);

    <?php
include_once('db.php');        
             
$sql="SELECT * FROM sankey WHERE BU='MP' AND SHARE<>0 ORDER BY KPI DESC;";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
} 
$leftItem=array();
$customerList=array(); 
$leftItemColor='';
$customerColor='';
$rightValue='';

while($getData=$result->fetch_assoc()){
    $item=$getData['KPI'];
    
    // if (! in_array($item, $leftItem)){
    //     array_push($leftItem,$item);
       
    // }

    $customer=$getData['CustomerName'];
    if (! in_array($customer, $customerList)){
        array_push($customerList,$customer);
        
    }
	if(! in_array($item, $leftItem,)){
		  array_push($leftItem,$item);
	  }
    $rightValue=$rightValue.'{source: "'.trim($item).'", target: "'.$customer.'", value:'.$getData['Share'].'},';
}
foreach ($leftItem as $value) {
   
    if($value=="OBA Sorting Rate"){
        $leftItemColor=$leftItemColor."'OBA Sorting Rate':'#66CCCC',";
    }elseif(trim($value)=="OBA Sorting Cost"){
        $leftItemColor=$leftItemColor."'OBA Sorting Cost':'#CCFF66',";
    }else{
        $leftItemColor=$leftItemColor."'Customer Claim':'#FF99CC',";
    }
}
foreach ($customerList as $value) {
        
    $customerColor=$customerColor."'".$value."':'rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",1)',";
    
}


 
?>   



    var MPOBATrendChart = echarts.init(document.getElementById('OBATrend-MP'));
    var left={
      <?php echo $leftItemColor.$customerColor; ?>
    }
    var rightValue=[
      <?php echo $rightValue; ?>
       ];
    var data=[];
    var leftlist=[];
    for(var key in left){
        leftlist.push(
            {name: key,itemStyle: {color:left[key]}}
        )
    }
    for(var i=0;i<rightValue.length;i++){
        var color=new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                offset: 0,
                color: left[rightValue[i].source]
            },{
                offset: 1,
                color: left[rightValue[i].target]
            }]
        )
        data.push(
            {source: rightValue[i].source,
            target: rightValue[i].target,
            value: rightValue[i].value,
                lineStyle: {
                color:color
                }
            }
        )
    }
    
    var option56 = {
        
        series: [
            {
                type: 'sankey',
                data: leftlist,
                links: data,
                focusNodeAdjacency: 'allEdges',
                itemStyle: {
                    borderWidth: 1,
                    color:'#1b6199',
                    borderColor: '#fff'
                },
                lineStyle: {
                    curveness: 0.5,
                    opacity:0.5
                },
                layoutIterations: 0
            }
        ]
    }
    <?php
  if($result->num_rows>0){
    echo "MPOBATrendChart.setOption(option56)";    
  } 
  $result->free();  
?>


//--NB Chart--


var NBOBACostChart = echarts.init(document.getElementById('OBACost-NB'));
    var option61 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Cost',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},

 <?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='NB' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        $OBA_Cost_LastYear=$getData['OBA_Cost_LastYear'];
        if($OBA_Annual_Target>$OBA_Cost_LastYear){
            $OBA_Cost_LastYear=$OBA_Annual_Target;
        }
        $OBA_Cost_Max=$OBA_Cost_LastYear/80*100;
        $Percent=floatval(intval($OBA_Annual_Cost/$OBA_Annual_Target*10000))/100.;
        echo "data: [{value: ". intval($OBA_Annual_Cost/$OBA_Cost_Max*100) . ", name: '$Percent%'}],"; 
$result->free();
 
?>  
            axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },




      
                axisLine: { // 座標軸線 	
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($OBA_Annual_Target/$OBA_Cost_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              center: ['50%', '60%'],
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    NBOBACostChart.setOption(option61, true);

    var NBOBAEventChart = echarts.init(document.getElementById('OBAEvent-NB'));
    var option62 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Event',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},
              
<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='NB' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $CAERB_total=$getData['CAERB_total'];
        $CAERB_target=$getData['CAERB_target'];

        $CAERB_Event_LastYear=$getData['CAERB_LastYear'];
        $CAERB_Event_Max=$CAERB_Event_LastYear/80*100;
        $Percent=floatval(intval($CAERB_total/$CAERB_target*10000))/100.;
        echo "data: [{value: ". intval($CAERB_total/$CAERB_Event_Max*100) . ", name: '$Percent%'}],"; 
$result->free();
 
?>  



              center: ['50%', '60%'],
              axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },
              axisLine: { // 座標軸線
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($CAERB_target/$CAERB_Event_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    NBOBAEventChart.setOption(option62, true);

    var NBOBARateChart = echarts.init(document.getElementById('OBARate-NB'));
    var option63 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        <?php
        include_once('db.php');       
             
        $sql="SELECT * FROM cqekpi where BU='NB' and((Year=".$startYear." and Month>=".$startMonth.") and (Year=".$maxYear." and Month<=".$maxMonth."))order by Year,Month";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }   
        
        $OBA_Rate_Max=0.;
        $OBA_Rate_Data='';
        $OBA_Cost_Max=0.;
        $OBA_Cost_Data=''; 
        $Customer_Claim_Max=0.;
        $Customer_Claim_Data='';       
        $count=0;
        while($getData=$result->fetch_assoc()){
            $OBA_Rate=floatval($getData['OBA_Rate'])*100;          
            $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
            $OBA_Cost=$getData['OBA_Cost'];
            $OBA_Cost_Target=$getData['OBA_Cost_Target'];
            $Customer_Claim=$getData['Customer_Claim'];
            $Customer_Claim_Target=$getData['Customer_Claim_Target'];
            if($OBA_Rate_Max<$OBA_Rate_Target*1.5){
              $OBA_Rate_Max=$OBA_Rate_Target*1.5;
            }
            if($OBA_Rate_Max<$OBA_Rate){
              $OBA_Rate_Max=$OBA_Rate*1.05;
            }
            if($OBA_Cost_Max<$OBA_Cost_Target*1.5){
              $OBA_Cost_Max=$OBA_Cost_Target*1.5;
            }
            if($OBA_Cost_Max<$OBA_Cost){
              $OBA_Cost_Max=$OBA_Cost*1.05;
            }
            if($Customer_Claim_Max<$Customer_Claim_Target*1.5){
              $Customer_Claim_Max=$Customer_Claim_Target*1.5;
            }
            if($Customer_Claim_Max<$Customer_Claim){
              $Customer_Claim_Max=$Customer_Claim*1.05;
            }
            $count++;
            if($count==6){
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate;
            }else{
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate .',';
            }
            if($count==6){
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($getData['OBA_Estimate']/10000))/100;
            }else{
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($OBA_Cost/10000))/100 .',';
            }
            if($count==6){
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100;
            }else{
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100 .',';
            }
          
        }        
        $result->free();
?>


        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -0.01,
                lte: <?php echo $OBA_Rate_Target; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Rate_Target; ?>,
                lte: <?php echo $OBA_Rate_Max; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Rate',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}%'
            },
            data: [<?php echo $OBA_Rate_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    NBOBARateChart.setOption(option63, true);

    var NBOBACostTrendChart = echarts.init(document.getElementById('OBACostTrend-NB'));
    var option64 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $OBA_Cost_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Cost_Target/1000000; ?>,
                lte: <?php echo $OBA_Cost_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $OBA_Cost_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    NBOBACostTrendChart.setOption(option64, true);

    var NBcustomerClaimChart = echarts.init(document.getElementById('customerClaim-NB'));
    var option65 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $Customer_Claim_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $Customer_Claim_Target/1000000; ?>,
                lte: <?php echo $Customer_Claim_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $Customer_Claim_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    NBcustomerClaimChart.setOption(option65, true);

    <?php
include_once('db.php');        
             
$sql="SELECT * FROM sankey WHERE BU='NB' AND SHARE<>0 ORDER BY KPI DESC;";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
} 
$leftItem=array();
$customerList=array(); 
$leftItemColor='';
$customerColor='';
$rightValue='';

while($getData=$result->fetch_assoc()){
    $item=$getData['KPI'];
    
    // if (! in_array($item, $leftItem)){
    //     array_push($leftItem,$item);
       
    // }

    $customer=$getData['CustomerName'];
    if (! in_array($customer, $customerList)){
        array_push($customerList,$customer);
        
    }
	if(! in_array($item, $leftItem,)){
		  array_push($leftItem,$item);
	  }
    $rightValue=$rightValue.'{source: "'.trim($item).'", target: "'.$customer.'", value:'.$getData['Share'].'},';
}
foreach ($leftItem as $value) {
   
    if($value=="OBA Sorting Rate"){
        $leftItemColor=$leftItemColor."'OBA Sorting Rate':'#66CCCC',";
    }elseif(trim($value)=="OBA Sorting Cost"){
        $leftItemColor=$leftItemColor."'OBA Sorting Cost':'#CCFF66',";
    }else{
        $leftItemColor=$leftItemColor."'Customer Claim':'#FF99CC',";
    }
}
foreach ($customerList as $value) {
        
    $customerColor=$customerColor."'".$value."':'rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",1)',";
    
}


 
?>   



    var NBOBATrendChart = echarts.init(document.getElementById('OBATrend-NB'));
    var left={
      <?php echo $leftItemColor.$customerColor; ?>
    }
    var rightValue=[
      <?php echo $rightValue; ?>
       ];
    var data=[];
    var leftlist=[];
    for(var key in left){
        leftlist.push(
            {name: key,itemStyle: {color:left[key]}}
        )
    }
    for(var i=0;i<rightValue.length;i++){
        var color=new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                offset: 0,
                color: left[rightValue[i].source]
            },{
                offset: 1,
                color: left[rightValue[i].target]
            }]
        )
        data.push(
            {source: rightValue[i].source,
            target: rightValue[i].target,
            value: rightValue[i].value,
                lineStyle: {
                color:color
                }
            }
        )
    }
    var option66 = {
        
        series: [
            {
                type: 'sankey',
                data: leftlist,
                links: data,
                focusNodeAdjacency: 'allEdges',
                itemStyle: {
                    borderWidth: 1,
                    color:'#1b6199',
                    borderColor: '#fff'
                },
                lineStyle: {
                    curveness: 0.5,
                    opacity:0.5
                },
                layoutIterations: 0
            }
        ]
    }
    <?php
  if($result->num_rows>0){
    echo "NBOBATrendChart.setOption(option66);";    
  } 
  $result->free();  
?>

//--Tablet Chart--


var TabletOBACostChart = echarts.init(document.getElementById('OBACost-Tablet'));
    var option71 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Cost',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},

 <?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='Tablet' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        $OBA_Cost_LastYear=$getData['OBA_Cost_LastYear'];
        $OBA_Cost_Max=$OBA_Cost_LastYear/80*100;
        $Percent=floatval(intval($OBA_Annual_Cost/$OBA_Annual_Target*10000))/100.;
        echo "data: [{value: ". intval($OBA_Annual_Cost/$OBA_Cost_Max*100) . ", name: '$Percent%'}],"; 
$result->free();
 
?>  
            axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },




      
                axisLine: { // 座標軸線 	
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($OBA_Annual_Target/$OBA_Cost_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              center: ['50%', '60%'],
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    TabletOBACostChart.setOption(option71, true);

    var TabletOBAEventChart = echarts.init(document.getElementById('OBAEvent-Tablet'));
    var option72 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Event',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},
              
<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='Tablet' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $CAERB_total=$getData['CAERB_total'];
        $CAERB_target=$getData['CAERB_target'];

        $CAERB_Event_LastYear=$getData['CAERB_LastYear'];
        $CAERB_Event_Max=$CAERB_Event_LastYear/80*100;
        $Percent=floatval(intval($CAERB_total/$CAERB_target*10000))/100.;
        echo "data: [{value: ". intval($CAERB_total/$CAERB_Event_Max*100) . ", name: '$Percent%'}],"; 
$result->free();
 
?>  



              center: ['50%', '60%'],
              axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },
              axisLine: { // 座標軸線
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($CAERB_target/$CAERB_Event_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    TabletOBAEventChart.setOption(option72, true);

    var TabletOBARateChart = echarts.init(document.getElementById('OBARate-Tablet'));
    var option73 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        <?php
        include_once('db.php');       
             
        $sql="SELECT * FROM cqekpi where BU='Tablet' and((Year=".$startYear." and Month>=".$startMonth.") and (Year=".$maxYear." and Month<=".$maxMonth."))order by Year,Month";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }   
        
        $OBA_Rate_Max=0.;
        $OBA_Rate_Data='';
        $OBA_Cost_Max=0.;
        $OBA_Cost_Data=''; 
        $Customer_Claim_Max=0.;
        $Customer_Claim_Data='';       
        $count=0;
        while($getData=$result->fetch_assoc()){
            $OBA_Rate=floatval($getData['OBA_Rate'])*100;          
            $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
            $OBA_Cost=$getData['OBA_Cost'];
            $OBA_Cost_Target=$getData['OBA_Cost_Target'];
            $Customer_Claim=$getData['Customer_Claim'];
            $Customer_Claim_Target=$getData['Customer_Claim_Target'];
            if($OBA_Rate_Max<$OBA_Rate_Target*1.5){
              $OBA_Rate_Max=$OBA_Rate_Target*1.5;
            }
            if($OBA_Rate_Max<$OBA_Rate){
              $OBA_Rate_Max=$OBA_Rate*1.05;
            }
            if($OBA_Cost_Max<$OBA_Cost_Target*1.5){
              $OBA_Cost_Max=$OBA_Cost_Target*1.5;
            }
            if($OBA_Cost_Max<$OBA_Cost){
              $OBA_Cost_Max=$OBA_Cost*1.05;
            }
            if($Customer_Claim_Max<$Customer_Claim_Target*1.5){
              $Customer_Claim_Max=$Customer_Claim_Target*1.5;
            }
            if($Customer_Claim_Max<$Customer_Claim){
              $Customer_Claim_Max=$Customer_Claim*1.05;
            }
            $count++;
            if($count==6){
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate;
            }else{
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate .',';
            }
            if($count==6){
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($getData['OBA_Estimate']/10000))/100;
            }else{
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($OBA_Cost/10000))/100 .',';
            }
            if($count==6){
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100;
            }else{
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100 .',';
            }
          
        }        
        $result->free();
?>


        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -0.01,
                lte: <?php echo $OBA_Rate_Target; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Rate_Target; ?>,
                lte: <?php echo $OBA_Rate_Max; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Rate',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}%'
            },
            data: [<?php echo $OBA_Rate_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    TabletOBARateChart.setOption(option73, true);

    var TabletOBACostTrendChart = echarts.init(document.getElementById('OBACostTrend-Tablet'));
    var option74 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $OBA_Cost_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Cost_Target/1000000; ?>,
                lte: <?php echo $OBA_Cost_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $OBA_Cost_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    TabletOBACostTrendChart.setOption(option74, true);

    var TabletcustomerClaimChart = echarts.init(document.getElementById('customerClaim-Tablet'));
    var option75 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -5,
                lte: <?php echo $Customer_Claim_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $Customer_Claim_Target/1000000; ?>,
                lte: <?php echo $Customer_Claim_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $Customer_Claim_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    TabletcustomerClaimChart.setOption(option75, true);

    <?php
include_once('db.php');        
             
$sql="SELECT * FROM sankey WHERE BU='Tablet' AND SHARE<>0 ORDER BY KPI DESC;";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){

} 
$leftItem=array();
$customerList=array(); 
$leftItemColor='';
$customerColor='';
$rightValue='';

while($getData=$result->fetch_assoc()){
    $item=$getData['KPI'];
    
    // if (! in_array($item, $leftItem)){
    //     array_push($leftItem,$item);
       
    // }

    $customer=$getData['CustomerName'];
    if (! in_array($customer, $customerList)){
        array_push($customerList,$customer);
        
    }
	if(! in_array($item, $leftItem,)){
		  array_push($leftItem,$item);
	  }
    $rightValue=$rightValue.'{source: "'.trim($item).'", target: "'.$customer.'", value:'.$getData['Share'].'},';
}
foreach ($leftItem as $value) {
   
    if($value=="OBA Sorting Rate"){
        $leftItemColor=$leftItemColor."'OBA Sorting Rate':'#66CCCC',";
    }elseif(trim($value)=="OBA Sorting Cost"){
        $leftItemColor=$leftItemColor."'OBA Sorting Cost':'#CCFF66',";
    }else{
        $leftItemColor=$leftItemColor."'Customer Claim':'#FF99CC',";
    }
}
foreach ($customerList as $value) {
        
    $customerColor=$customerColor."'".$value."':'rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",1)',";
    
}


 
?>   



    var TabletOBATrendChart = echarts.init(document.getElementById('OBATrend-Tablet'));
    var left={
      <?php echo $leftItemColor.$customerColor; ?>
    }
    var rightValue=[
      <?php echo $rightValue; ?>
       ];
    var data=[];
    var leftlist=[];
    for(var key in left){
        leftlist.push(
            {name: key,itemStyle: {color:left[key]}}
        )
    }
    for(var i=0;i<rightValue.length;i++){
        var color=new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                offset: 0,
                color: left[rightValue[i].source]
            },{
                offset: 1,
                color: left[rightValue[i].target]
            }]
        )
        data.push(
            {source: rightValue[i].source,
            target: rightValue[i].target,
            value: rightValue[i].value,
                lineStyle: {
                color:color
                }
            }
        )
    }
    var option76 = {
        
        series: [
            {
                type: 'sankey',
                data: leftlist,
                links: data,
                focusNodeAdjacency: 'allEdges',
                itemStyle: {
                    borderWidth: 1,
                    color:'#1b6199',
                    borderColor: '#fff'
                },
                lineStyle: {
                    curveness: 0.5,
                    opacity:0.5
                },
                layoutIterations: 0
            }
        ]
    }
    <?php
  if($result->num_rows>0){
    echo "TabletOBATrendChart.setOption(option76);";    
  } 
  $result->free();  
?>

//--AA Chart--


var AAOBACostChart = echarts.init(document.getElementById('OBACost-AA'));
    var option81 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Cost',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},

 <?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='AA' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $OBA_Annual_Cost=$getData['OBA_Annual_Cost'];
        $OBA_Annual_Target=$getData['OBA_Annual_Target'];
        $OBA_Cost_LastYear=$getData['OBA_Cost_LastYear'];
        $OBA_Cost_Max=$OBA_Cost_LastYear/80*100;
        $Percent=floatval(intval($OBA_Annual_Cost/$OBA_Annual_Target*10000))/100.;
        echo "data: [{value: ". intval($OBA_Annual_Cost/$OBA_Cost_Max*100) . ", name: '$Percent%'}],"; 
$result->free();
 
?>  
            axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },




      
                axisLine: { // 座標軸線 	
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($OBA_Annual_Target/$OBA_Cost_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              center: ['50%', '60%'],
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    AAOBACostChart.setOption(option81, true);

    var AAOBAEventChart = echarts.init(document.getElementById('OBAEvent-AA'));
    var option82 = {
      tooltip: {
          formatter: '{a} <br/>{b} : {c}%'
      },
      
      toolbox: {
          feature: {
              //restore: {},
              //saveAsImage: {}
          }
      },
      series: [
          {
              name: 'OBA Event',
              type: 'gauge',
              //detail: {formatter: '{value}'},
              detail: {  show: false,},
              
<?php
include_once('db.php');        
             
$sql="SELECT * FROM cqekpi where BU='AA' and  Year=".$maxYear." and Month=".$maxMonth.";";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
}  
$getData=$result->fetch_assoc();        
        $CAERB_total=$getData['CAERB_total'];
        $CAERB_target=$getData['CAERB_target'];

        $CAERB_Event_LastYear=$getData['CAERB_LastYear'];
        $CAERB_Event_Max=$CAERB_Event_LastYear/80*100;
        $Percent=floatval(intval($CAERB_total/$CAERB_target*10000))/100.;
        echo "data: [{value: ". intval($CAERB_total/$CAERB_Event_Max*100) . ", name: '$Percent%'}],"; 
$result->free();
 
?>  



              center: ['50%', '60%'],
              axisLabel: {			
	            	show: false,	
	            },
              detail: {			
	            	show: false,
	            },
              axisLine: { // 座標軸線
                 lineStyle: { // 屬性lineStyle控制線條樣式
                         color: [ //儀表盤的軸線可以被分成不同顏色的多段。每段的  結束位置(範圍是[0,1]) 和  顏色  可以通過一個數組來表示。預設取值：[[0.2, '#91c7ae'], [0.8, '#63869e'], [1, '#c23531']]
                          <?php
                          echo "[" . floatval($CAERB_target/$CAERB_Event_Max) .", '#00AE75'],"
                          ?>
                             [0.8, '#FFEC4C'],
                             [1, '#E54733']
                         ],
                 width: 40, //軸線寬度,預設 30。
                         shadowColor: '#fff', //預設透明
                         shadowBlur: 10
                 }
                 },
              radius: '120%',
              startAngle: 180,
              endAngle: 0,

          }
      ]
    };
    AAOBAEventChart.setOption(option82, true);

    var AAOBARateChart = echarts.init(document.getElementById('OBARate-AA'));
    var option83 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        <?php
        include_once('db.php');       
             
        $sql="SELECT * FROM cqekpi where BU='AA'  and((Year=".$startYear." and Month>=".$startMonth.") and (Year=".$maxYear." and Month<=".$maxMonth."))order by Year,Month";
        if (!$result=$mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems.";
            echo "Error: The query failed to execute and here is why: \n";
            echo "Query: " . $sql . "\n";
            echo "Error: " . $mysqli->errno . "\n";
            echo "Error: " .$mysqli->error . "\n";
            exit;
        }
        if($result->num_rows===0){
            echo "Could not find data!";
            exit;
        }   
        
        $OBA_Rate_Max=0.;
        $OBA_Rate_Data='';
        $OBA_Cost_Max=0.;
        $OBA_Cost_Data=''; 
        $Customer_Claim_Max=0.;
        $Customer_Claim_Data='';       
        $count=0;
        while($getData=$result->fetch_assoc()){
            $OBA_Rate=floatval($getData['OBA_Rate'])*100;          
            $OBA_Rate_Target=floatval($getData['OBA_Rate_Target'])*100;
            $OBA_Cost=$getData['OBA_Cost'];
            $OBA_Cost_Target=$getData['OBA_Cost_Target'];
            $Customer_Claim=$getData['Customer_Claim'];
            $Customer_Claim_Target=$getData['Customer_Claim_Target'];
            if($OBA_Rate_Max<$OBA_Rate_Target*1.5){
              $OBA_Rate_Max=$OBA_Rate_Target*1.5;
            }
            if($OBA_Rate_Max<$OBA_Rate){
              $OBA_Rate_Max=$OBA_Rate*1.05;
            }
            if($OBA_Cost_Max<$OBA_Cost_Target*1.5){
              $OBA_Cost_Max=$OBA_Cost_Target*1.5;
            }
            if($OBA_Cost_Max<$OBA_Cost){
              $OBA_Cost_Max=$OBA_Cost*1.1;
            }
            if($Customer_Claim_Max<$Customer_Claim_Target*1.5){
              $Customer_Claim_Max=$Customer_Claim_Target*1.5;
            }
            if($Customer_Claim_Max<$Customer_Claim){
              $Customer_Claim_Max=$Customer_Claim*1.1;
            }
            $count++;
            if($count==6){
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate;
            }else{
              $OBA_Rate_Data=$OBA_Rate_Data . $OBA_Rate .',';
            }
            if($count==6){
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($getData['OBA_Estimate']/10000))/100;
            }else{
              $OBA_Cost_Data=$OBA_Cost_Data . floatval(intval($OBA_Cost/10000))/100 .',';
            }
            if($count==6){
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100;
            }else{
              $Customer_Claim_Data=$Customer_Claim_Data . floatval(intval($Customer_Claim/10000))/100 .',';
            }
          
        }        
        $result->free();
?>


        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -0.01,
                lte: <?php echo $OBA_Rate_Target; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Rate_Target; ?>,
                lte: <?php echo $OBA_Rate_Max; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Rate',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}%'
            },
            data: [<?php echo $OBA_Rate_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    AAOBARateChart.setOption(option83, true);

    var AAOBACostTrendChart = echarts.init(document.getElementById('OBACostTrend-AA'));
    var option84 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $OBA_Cost_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $OBA_Cost_Target/1000000; ?>,
                lte: <?php echo $OBA_Cost_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $OBA_Cost_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    AAOBACostTrendChart.setOption(option84, true);

    var AAcustomerClaimChart = echarts.init(document.getElementById('customerClaim-AA'));
    var option85 = {
        
        tooltip: {
            trigger: 'axis'
        },
        grid: {
            right:'0%'
        },
        xAxis: {
            data: <?php echo $monthIndex; ?>,
            axisLabel:{
              formatter: '{value}月',
            }
        },
        yAxis: {
            show:false,
            splitLine: {
                show: false
            }
        },       
       
        visualMap: {
            top: -100,
            right: -100,
            pieces: [{
                gt: -1,
                lte: <?php echo $Customer_Claim_Target/1000000; ?>,
                color: '#008000'
            }, {
                gt: <?php echo $Customer_Claim_Target/1000000; ?>,
                lte: <?php echo $Customer_Claim_Max/1000000; ?>,
                color: '#e60000'
            }],
            
        },
        series: {
            name: 'OBA Cost Tend',
            type: 'line',
            label:{
                show: true,
                formatter: '{c}M'
            },
            data: [<?php echo $Customer_Claim_Data; ?>],
            lineStyle: {                
                width: 6
            },
            
        }
    };
    AAcustomerClaimChart.setOption(option85, true);

    <?php
include_once('db.php');        
             
$sql="SELECT * FROM sankey WHERE BU='AA' AND SHARE<>0 ORDER BY KPI DESC;";
if (!$result=$mysqli->query($sql)){
  echo "Sorry, the website is experiencing problems.";
  echo "Error: The query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Error: " . $mysqli->errno . "\n";
  echo "Error: " .$mysqli->error . "\n";
  exit;
}
if($result->num_rows===0){
  echo "Could not find data!";
  exit;
} 
$leftItem=array();
$customerList=array(); 
$leftItemColor='';
$customerColor='';
$rightValue='';

while($getData=$result->fetch_assoc()){
    $item=$getData['KPI'];
    
    // if (! in_array($item, $leftItem)){
    //     array_push($leftItem,$item);
       
    // }

    $customer=$getData['CustomerName'];
    if (! in_array($customer, $customerList)){
        array_push($customerList,$customer);
        
    }
	if(! in_array($item, $leftItem,)){
		  array_push($leftItem,$item);
	  }
    $rightValue=$rightValue.'{source: "'.trim($item).'", target: "'.$customer.'", value:'.$getData['Share'].'},';
}
foreach ($leftItem as $value) {
   
    if($value=="OBA Sorting Rate"){
        $leftItemColor=$leftItemColor."'OBA Sorting Rate':'#66CCCC',";
    }elseif(trim($value)=="OBA Sorting Cost"){
        $leftItemColor=$leftItemColor."'OBA Sorting Cost':'#CCFF66',";
    }else{
        $leftItemColor=$leftItemColor."'Customer Claim':'#FF99CC',";
    }
}
foreach ($customerList as $value) {
        
    $customerColor=$customerColor."'".$value."':'rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",1)',";
    
}

 
?>   



    var AAOBATrendChart = echarts.init(document.getElementById('OBATrend-AA'));
    var left={
      <?php echo $leftItemColor.$customerColor; ?>
    }
    var rightValue=[
      <?php echo $rightValue; ?>
       ];
    var data=[];
    var leftlist=[];
    for(var key in left){
        leftlist.push(
            {name: key,itemStyle: {color:left[key]}}
        )
    }
    for(var i=0;i<rightValue.length;i++){
        var color=new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
                offset: 0,
                color: left[rightValue[i].source]
            },{
                offset: 1,
                color: left[rightValue[i].target]
            }]
        )
        data.push(
            {source: rightValue[i].source,
            target: rightValue[i].target,
            value: rightValue[i].value,
                lineStyle: {
                color:color
                }
            }
        )
    }
    var option86 = {
        
        series: [
            {
                type: 'sankey',
                data: leftlist,
                links: data,
                focusNodeAdjacency: 'allEdges',
                itemStyle: {
                    borderWidth: 1,
                    color:'#1b6199',
                    borderColor: '#fff'
                },
                lineStyle: {
                    curveness: 0.5,
                    opacity:0.5
                },
                layoutIterations: 0
            }
        ]
    }
    <?php
  if($result->num_rows>0){
    echo "AAOBATrendChart.setOption(option86)";    
  } 
  $result->free();  
?>



  })();
   
</script>
	
	</body>
</html>