<?php
define('IN_APP',1);

include('includes/is_logged_in.php');
$local_user_token = get_user_token();

//if the user hasn't set their transmitter, set it here for them!
$transmitter = file_get_contents("http://data.cube.blue/v1/api.php?apikey=" . $local_user_token . "&more");
$transmitter = json_decode($transmitter);
$transmitter_id = $transmitter->more[0]->more_transmitter;
if (!(is_numeric($transmitter_id) && ($transmitter_id > 20000))){
    header('Location: /transmitteredit.php');
}


$dashboard = file_get_contents("http://data.cube.blue/v1/api.php?apikey=".$local_user_token."&dashboard");
if(http_response_code() !=200){ // error while proceesing with API
  header('Location: /pagenotfound.php');
}



//back to the regular page load
$dashboard = json_decode($dashboard);


// Some settings
if(strtolower($dashboard->now->water)=='off'){
  $waterNowClass = 'nowdetialOff';
}else{
  $waterNowClass = 'nowdetialOn';
}

$waterSince = date('g:i a, D, M d',strtotime($dashboard->now->since));
foreach($dashboard->detail_day  as $daykey=>$daval){
  $daydetail = (int)(($daval*100))/100; 
  $daydetailKey = $daykey;
}?>
<?php include('header.php');?>
<section class="middleCnt">
    <div class="nowdetialsec">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="<?php echo $waterNowClass;?>">
              <div class="lc-1">
                <div class="lc-1-left">
                  <img src="/images/DayDetailButtonYellow@2x.png" height="44" width="0">
                </div>

                <div class="lc-1-right">
                Now
                </div>
              </div>

              <div class="lc-2">
                <div class="lc-2-left">
                  <?php if(strtolower($dashboard->now->water)=='off'){
                      echo '<img src="/images/Raindrop-gray@2x.png" height="40">';
                  }else{
                      echo '<img src="/images/Raindrop-blue@2x.png" height="40">';
                  } ?>
                </div>

                <div class="lc-2-right">
                  <?php if(strtolower($dashboard->now->water)=='off'){
                      echo '<span class="dashboard-off">OFF</span>';
                  }else{
                      echo '<span class="dashboard-on">ON</span>';
                  } ?>
                </div>
              </div>

                <div class="lc-3">
                  <p>Water <?php echo $dashboard->now->water;?> since</p>
                  <p><?php echo $waterSince;?></p>
                </div>
              
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="right-container">
              <div class="rc-1" style="overflow: hidden;">
                <div class="rc-1-left">
                  <a href="daydetails.php" style="text-decoration: none;"><img src="/images/DayDetailButtonYellow@2x.png" height="44"></a>
                </div>
                <div class="rc-1-right">
                  Day Detail
                </div>
              </div>

              <div class="rc-2">
                <?php echo number_format($daydetail,1);?>
              </div>

              <div class="rc-3">
                <p>Gallons used</p>
                <p>Today <?php echo $daydetailKey;?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="lastUpdate">
        <div class="container">
          <div class="row">
            <div class="dashboard-updated">
              <div class="dashboard-updated-left">
                Last Updated  <img src="/images/RefreshButton@2x.png" width="0" height="44">
              </div>
              <div class="dashboard-updated-right">
                <?php echo date('g:i a, D, M d');?> <img src="/images/RefreshButton@2x.png" width="44" height="44" onclick="reloadpage();" style="cursor:pointer;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="waterusehist">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="waterusehistmain">
              <h2><img src="/images/HistoryButtonYellow@2x.png" height="44">Water Use History</h2>
              <div class="waterusehistbox">
                <div class="daymonthbtn">
                  <ul>
                    <li class="daybtn active"><a href="#day" data-toggle="tab">Day</a> </li>
                    <li class="monthbtn"><a href="#month"  data-toggle="tab">Month</a> </li>
                  </ul>
                </div>
                <div class="dashboard-gallons">
                  <div class="dashboard-gallons-label">Gallons</div>
                </div>
                <div class="dashboard tab-content">
                  
          <ul class="tab-pane active" id="day">
                    <li class="active">
                      <div class="dashboard-left">My Daily Average</div>
                      <div class="dashboard-right-avg"><?php echo (int)$dashboard->history_day->average;?></div>
                    </li>
          <?php 
          $historyLoop = 0;
          foreach($dashboard->history_day as $historydayKey=>$historydayVal){?>
            <?php if($historydayKey!='average'){?>
              <li>
                <div class="dashboard-left"><?php if($historyLoop==0){?><span>Yesterday</span><?php } ?> <?php echo $historydayKey;?></div>
                <div class="dashboard-right"><?php echo (int) $historydayVal;?></div>
              </li> 
            <?php $historyLoop++; } ?>
            
          <?php }?>
                  </ul>
          
                  <ul class="tab-pane" id="month">
                    <li class="active">
                      <div class="dashboard-left">My Monthly Average </div>
                      <div class="dashboard-right"><?php echo (int)$dashboard->history_month->average;?></div>
                    </li>
                  
            <?php 
          $historyLoop = 0;
          foreach($dashboard->history_month as $historydayKey=>$historydayVal){?>
            <?php if($historydayKey!='average'){?>
              <li>
                <div class="dashboard-left"><?php if($historyLoop==0){?><span>Current</span><?php } ?> <?php echo $historydayKey;?></div>
                <div class="dashboard-right"><?php echo (int) $historydayVal;?></div>
              </li> 
            <?php $historyLoop++; } ?>
          <?php }?>
          
          
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<script>
function reloadpage(){
    location.reload();
}
</script>
<?php include('footer.php');?>