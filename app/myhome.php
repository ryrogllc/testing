<?php define('IN_APP',1); include('includes/is_logged_in.php');?>

<?php 
$myhome = file_get_contents("http://data.cube.blue/v1/api.php?apikey=".get_user_token()."&myhome");

if(http_response_code() !=200){ // error while proceesing with API
	header('Location: /pagenotfound.php');
}

$myhome = json_decode($myhome);
$details = $myhome->myhome[0];
?>
<?php include('header.php');?>
<section class="middleCnt">

<div class="myHome">
    <div class="container full">
      <div class="row">
        <div class="col-lg-12 lftrtCustwidth">
        
        <div class="myHomeBox ">
        	<h5>Outdoor</h5>
            <ul>
            	<li><div class="myhome-left long">Automatic sprinkler system</div><div class="myhome-right long"><span class="myHmBxOutTxt"><?php if($details->outdoor_automatic_irrigation_present=='t')
				{
					echo 'Yes';
				}else{
					echo 'No';
				};?></span></div></li>
                <ul>
                    <li><div class="myhome-left long">Number of zones</div><div class="myhome-right long"><span class="myHmBxOutTxt"><?php echo $details->outdoor_automatic_irrigation_count;?></span></div></li>
                </ul>
            	<li><div class="myhome-left">Swimming pool</div><div class="myhome-right"><span class="myHmBxOutTxt"><?php echo ($details->outdoor_swimming=='t'?'Yes':'No');?></span></div></li>
            	<li><div class="myhome-left">Hot tub</div><div class="myhome-right"><span class="myHmBxOutTxt"><?php 
				if($details->outdoor_hot_tub=='t'){
					echo 'Yes';
				}else{ 
					echo 'No';
				}?></span></div></li>
            </ul>
        </div>
        
        
        <div class="myHomeBox">
        	<h5>Indoor</h5>
            <ul>
            	<li><div class="myhome-left long">Clothes washing machine</div><div class="myhome-right long"><span class="myHmBxOutTxt"><?php echo ($details->indoor_clothes_washing_present=='t'?'Yes':'No');?></span></div></li>
                <ul>
                    <li><div class="myhome-left long">Machine is front loading</div><div class="myhome-right long"><span class="myHmBxOutTxt"><?php echo ($details->indoor_clothes_washing_front_loading=='t'?'Yes':'No');?></span></div></li>
                </ul>
            	<li><div class="myhome-left">Toilets</div><div class="myhome-right"><span class="myHmBxOutTxt"><?php echo $details->indoor_toilets_count;?></span></div></li>
            	<li><div class="myhome-left">Bathtubs/showers</div><div class="myhome-right"><span class="myHmBxOutTxt"><?php echo $details->indoor_baths_count;?></span></div></li>
            	<li><div class="myhome-left">Dishwasher</div><div class="myhome-right"><span class="myHmBxOutTxt"><?php echo ($details->indoor_dishwasher_present=='t'?'Yes':'No');?></span></div></li>
            	<li><div class="myhome-left long">Water softener system</div><div class="myhome-right long"><span class="myHmBxOutTxt"><?php echo ($details->indoor_water_softener_present=='t'?'Yes':'No');?></span></div></li>
            	<li><div class="myhome-left long">Water heater is tankless</div><div class="myhome-right long"><span class="myHmBxOutTxt"><?php echo ($details->indoor_water_heater_tankless_present=='t'?'Yes':'No');?></span></div></li>
            </ul>
        </div>


		<div class="myHomeBox">
        	<h5>Home</h5>
            <ul>
            	<li><div class="myhome-left">Home Type</div><div class="myhome-right"><span class="myHmBxOutTxt">
				<?php if($details->home_type_id==''){
					echo '';
				}else{
					foreach($myhome->home_type_list as $homeKey=>$homeVal){ 
					
						if($details->home_type_id==$homeVal->home_type_id){
							echo $homeVal->short_text;	
						}
						
					}
				}?>
				</span></div></li>
                <li><div class="myhome-left long">Home size (sq ft)</div><div class="myhome-right long"><span class="myHmBxOutTxt"><?php echo $details->home_size;?></span></div></li>
            	<li><div class="myhome-left long">Number of levels</div><div class="myhome-right long"><span class="myHmBxOutTxt"><?php echo $details->home_number_levels;?></span></div></li>
            	<li><div class="myhome-left long">Construction decade</div><div class="myhome-right long"><span class="myHmBxOutTxt"><?php echo $details->home_construction_decade;?></span></div></li>
            </ul>
        </div>
        
		<div class="myHomeBox">
        	<h5>Residents</h5>
            <ul>
                <li><div class="myhome-left">Adults</div><div class="myhome-right"><span class="myHmBxOutTxt"><?php echo $details->residents_adults;?></span></div></li>
            	<li><div class="myhome-left long">Children ages 10 to 17</div><div class="myhome-right long"><span class="myHmBxOutTxt"><?php echo $details->residents_children_10_17;?></span></div></li>
				<li><div class="myhome-left long">Children ages 3 to 9</div><div class="myhome-right long"><span class="myHmBxOutTxt"><?php echo $details->residents_children_3_9;?></span></div></li>
				<li><div class="myhome-left long">Children ages 0 to 2</div><div class="myhome-right long"><span class="myHmBxOutTxt"><?php echo $details->residents_children_0_2;?></span></div></li>
			</ul>
        </div>
		
		<div class="myHomeBox">
        	<h5>Home Address</h5>
            <ul>
                <li><div class="myhome-left">Street Number</div><div class="myhome-right"><span class="myHmBxOutTxt"><?php echo $details->address_street_number;?></span></div></li>
                <li><div class="myhome-left">Street Name</div><div class="myhome-right"><span class="myHmBxOutTxt"><?php echo $details->address_street_name;?></span></div></li>
                <li><div class="myhome-left">ZIP</div><div class="myhome-right"><span class="myHmBxOutTxt"><?php echo $details->address_zip;?></span></div></li>
			</ul>
        </div>
		
                
        </div>
      </div>
    </div>    
</div>
</section>

<?php include('footer.php');?>