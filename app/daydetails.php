<?php define('IN_APP',1); include('includes/is_logged_in.php');?>

<?php include('header.php');?>

<?php if(isset($_GET) && isset($_GET['dt'])){
	$urlDate = $_GET['dt'];
}else{
	$urlDate = date('Ymd');
}
$nextDate = date('Ymd', strtotime($urlDate .' +1 day'));
$prevDate = date('Ymd', strtotime($urlDate .' -1 day'));


$dayDetails = file_get_contents("http://data.cube.blue/v1/api.php?apikey=".get_user_token()."&history&day_detail=".date('Y-m-d',strtotime($urlDate)));


if(http_response_code() !=200){ // error while proceesing with API
	header('Location: /pagenotfound.php');
}
	
$dayDetails = json_decode($dayDetails); ?>
<section class="middleCnt">
  <div class="container full">
    <div class="row">
      <div class=" col-lg-12">
        <div class="sldr">
          <div class="carousel slide" data-ride="carousel" >
            <div class="carousel-inner">
             
				<div class="item active">
					<div class="sldrmain text-center">
					  <p><?php echo date('D, M d',strtotime($urlDate));?></p>
					    <div class="sldrnumbertxt">
							<?php foreach($dayDetails->day_detail as $key=>$value){?>
								<?php $total = $value[1];?>
							<?php } ?>
							<?php echo number_format($total,1);//(int)(($total*100))/100;?>
						</div>
					  <div class="gallonsused">Gallons Used</div>
					</div>
				</div>
            </div>
            
            <a data-slide="prev" href="/daydetails.php?dt=<?php echo $prevDate;?>" class="left carousel-control"><img src="/images/BackArrowButton-white@2x.png" height="44"></a>
			
			<?php if($urlDate!=date('Ymd')){?>
				<a data-slide="next" href="/daydetails.php?dt=<?php echo $nextDate;?>" class="right carousel-control"><img src="/images/NextArrowButton-white@2x.png" height="44"></a>
			<?php } ?>
			
		   </div>
        </div>
        <div class="cumulative">
          <div class="cumulativehead">
          	<ul>
          		<li>
          		<div class="cumulativecntrhead">Gal. / hr</div>
          		<div class="cumulativeRthead">Cumulative</div>
          		</li>
          	</ul>
          </div>
          <div class="cumulativemain">
            <ul>
				<?php foreach($dayDetails->day_detail as $key=>$value){?>
				<li>
					<div class="cumulativetime"><?php echo $key;?></div>
					<div class="cumulativecntr"><?php if (is_numeric($value[0])){echo round($value[0],2);}else{echo '-';}//(int)$value[0];?></div>
					<div class="cumulativeRt"><?php echo number_format($value[1],1);//(int)$value[1];?></div>
				</li>
				<?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('footer.php');?>