<?php define('IN_APP',1); include('includes/is_logged_in.php');?>

<?php 
$history = file_get_contents("http://data.cube.blue/v1/api.php?apikey=".get_user_token()."&history&rollup");

if(http_response_code() !=200){ // error while proceesing with API
	header('Location: /pagenotfound.php');
}

$history = json_decode($history);

/**** Daily average ***/
foreach($history->day_history as $historyKey=>$historyValue){
	foreach($historyValue as $key1=>$val1){
		$dailyaverage[] = round($val1);//(int)$val1;
	}
}

$countDailyaverage = count($dailyaverage);
$dailyAverage = array_sum($dailyaverage);
$dailyAvg = $dailyAverage/$countDailyaverage;


/**** Monthly average **/


foreach($history->month_history as $historyKey=>$historyValue){
	foreach($historyValue as $key1=>$val1){
		$monthlyaverage[]  = round($val1);//(int)$val1;
	}
}
$countmonthlyaverage = count($monthlyaverage);
$monthlyAverage = array_sum($monthlyaverage);
$monthlyAvg = $monthlyAverage/$countmonthlyaverage;
?>
<div class="header-no-border"><?php include('header.php');?></div>

<section class="middleCnt">
<div class="waterusehist">
  <div class="container full">
  <div class="row">
    <div class="col-lg-12">
      <div class="waterusehistmain usewtrhist">
        <div class="waterusehistbox">
          <div class="usewtrhistheadbg">
            <div class="daymonthbtn">
              <ul>
                <li class="daybtn active"><a href="#day" data-toggle="tab">Day</a> </li>
                <li class="monthbtn"><a href="#month"  data-toggle="tab">Month</a> </li>
              </ul>
            </div>
            <div class="history-gallons">
              <div class="history-gallons-label">Gallons</div>
            </div>
          </div>
          <div class="tab-content">
            <div class="tab-pane active" id="day">
              <div class="mymonthlyrow">
                <div class="mymonthlyrowlft">My Daily Average</div>
                <div class="mymonthlyrowRt"><?php echo round($dailyAvg);//(int)$dailyAvg;?></div>
              </div>
              <div class="dropyear">
                <div class="panel-group" id="accordion">
				
				
				<?php 
				$a=0;
				foreach($history->day_history as $historyKey=>$historyValue){?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title collapsed" data-toggle="collapse" href="#collapse<?php echo $a;?>"> <a href="javascript:void(0);"><?php echo $historyKey;?> </a><span class="iconarrow"><i class="fa fa-angle-down" aria-hidden="true"></i></span> </h4>
                    </div>
                    <div id="collapse<?php echo $a;?>" class="panel-collapse collapse" >
                      <div class="panel-body">
                        <div class="history daily">
                          <ul>
							<?php foreach($historyValue as $key1=>$val1){?>
								<li class="active">
								  <div class="history-left"><?php echo $key1;?></div>
								  <div class="history-right"><?php echo round($val1);//(int)$val1;?></div>
								</li>
							<?php }?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
				<?php  $a++; } ?>
                 
				
				
				
                </div>
              </div>
            </div>
            <div class="tab-pane" id="month">
              <div class="mymonthlyrow">
                <div class="mymonthlyrowlft">My Monthly Average</div>
                <div class="mymonthlyrowRt"><?php echo round($monthlyAvg);//(int)$monthlyAvg;?></div>
              </div>
              <div class="dropyear">
                <div class="panel-group" id="accordion">
                 
				<?php 
				foreach($history->month_history as $historyKey=>$historyValue){?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title collapsed" data-toggle="collapse"  href="#collapse<?php echo $a;?>"> <a href="javascript:void(0);"><?php echo $historyKey;?> </a><span class="iconarrow"><i class="fa fa-angle-down" aria-hidden="true"></i></span> </h4>
                    </div>
                    <div id="collapse<?php echo $a;?>" class="panel-collapse collapse" >
                      <div class="panel-body">
                        <div class="history monthly">
                          <ul>
							<?php foreach($historyValue as $key1=>$val1){?>
								<li class="active">
								  <div class="history-left"><?php echo $key1;?></div>
								  <div class="history-right"><?php echo round($val1);//(int)$val1;?></div>
								</li>
							<?php }?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
				<?php  $a++; } ?>
                 
				 
				 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
</section>
<?php include('footer.php');?>