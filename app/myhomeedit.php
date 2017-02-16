<?php define('IN_APP',1); include('includes/is_logged_in.php');?>

<?php 

if(isset($_POST) && !empty($_POST['subedit'])){
	
	if(isset($_POST['automaticsprinklersystem'])){
		$post['automaticsprinklersystem']='"t"';
	}else{
		$post['automaticsprinklersystem']='NULL';
	}
	
	if(isset($_POST['swimmingpool'])){
		$post['swimmingpool']='"t"';
	}else{
		$post['swimmingpool']='NULL';
	}
	
	if(isset($_POST['hotub'])){
		$post['hotub']='"t"';
	}else{
		$post['hotub']='NULL';
	}
	
	if(isset($_POST['clotheswashingmachine'])){
		$post['clotheswashingmachine']='"t"';
	}else{
		$post['clotheswashingmachine']='NULL';
	}
	
	if(isset($_POST['machineisfrontloading'])){
		$post['machineisfrontloading']='"t"';
	}else{
		$post['machineisfrontloading']='NULL';
	}
	
	if(isset($_POST['dishwasher'])){
		$post['dishwasher']='"t"';
	}else{
		$post['dishwasher']='NULL';
	}
	
	if(isset($_POST['watersoftnersystem'])){
		$post['watersoftnersystem']='"t"';
	}else{
		$post['watersoftnersystem']='NULL';
	}
	
	if(isset($_POST['waterheateristankless'])){
		$post['waterheateristankless']='"t"';
	}else{
		$post['waterheateristankless']='NULL';
	}

	if(isset($_POST['hometype'])){
		$post['hometype']='"'.$_POST['hometype'].'"';	
	}else{
		$post['hometype']='NULL';
	}
	


	if($_POST['numberofzones']==''){
		$post['numberofzones']='NULL';
	}else{
		$post['numberofzones']='"'.$_POST['numberofzones'].'"';	
	}
	
	if($_POST['toilets']==''){
		$post['toilets']='NULL';	
	}else{
		$post['toilets']='"'.$_POST['toilets'].'"';	
	}
	
	if($_POST['bathtub']==''){
		$post['bathtub']='NULL';
	}else{
		$post['bathtub']='"'.$_POST['bathtub'].'"';	
	}

	if($_POST['homesize']==''){
		$post['homesize']='NULL';	
	}else{
		$post['homesize']='"'.$_POST['homesize'].'"';	
	}
	
	if($_POST['numberoflevels']==''){
		$post['numberoflevels']='NULL';	
	}else{
		$post['numberoflevels']='"'.$_POST['numberoflevels'].'"';	
	}
	
	if($_POST['construction']==''){
		$post['construction']='NULL';	
	}else{
		$post['construction']='"'.$_POST['construction'].'"';	
	}
	
	if($_POST['adults']==''){
		$post['adults']='NULL';	
	}else{
		$post['adults']='"'.$_POST['adults'].'"';	
	}
	
	if($_POST['child1017']==''){
		$post['child1017']='NULL';	
	}else{
		$post['child1017']='"'.$_POST['child1017'].'"';	
	}
	
	if($_POST['child39']==''){
		$post['child39']='NULL';	
	}else{
		$post['child39']='"'.$_POST['child39'].'"';	
	}
	
	if($_POST['child02']==''){
		$post['child02']='NULL';
	}else{
		$post['child02']='"'.$_POST['child02'].'"';	
	}
	
	if($_POST['streetnumber']==''){
		$post['streetnumber']='NULL';
	}else{
		$post['streetnumber']='"'.$_POST['streetnumber'].'"';	
	}
	
	if($_POST['streetname']==''){
		$post['streetname']='NULL';
	}else{
		$post['streetname']='"'.$_POST['streetname'].'"';
	}
	
	if($_POST['zip']==''){
		$post['zip']= 'NULL';	
	}else{
		$post['zip']='"'.$_POST['zip'].'"';	
	}
	
	
		
		
	$array = array(
		'apikey' => get_user_token(),
		'myhome' => '{"outdoor_automatic_irrigation_present":'.$post['automaticsprinklersystem'].',"outdoor_automatic_irrigation_count":'.$post['numberofzones'].',"outdoor_swimming":'.$post['swimmingpool'].',"outdoor_hot_tub":'.$post['hotub'].', "indoor_clothes_washing_present":'.$post['clotheswashingmachine'].',"indoor_clothes_washing_front_loading":'.$post['machineisfrontloading'].',"indoor_toilets_count":'.$post['toilets'].',"indoor_baths_count":'.$post['bathtub'].',"indoor_dishwasher_present":'.$post['dishwasher'].',"indoor_water_softener_present":'.$post['watersoftnersystem'].',"indoor_water_heater_tankless_present":'.$post['waterheateristankless'].',"home_type_id":'.$post['hometype'].',"home_size":'.$post['homesize'].',"home_number_levels":'.$post['numberoflevels'].',"home_construction_decade":'.$post['construction'].',"residents_adults":'.$post['adults'].',"residents_children_10_17":'.$post['child1017'].',"residents_children_3_9":'.$post['child39'].',"residents_children_0_2":'.$post['child02'].',"address_street_number":'.$post['streetnumber'].',"address_street_name":'.$post['streetname'].',"address_zip":'.$post['zip'].'}'); 
  

	$url = "http://data.cube.blue/v1/api.php?myhome=";    
	$content = $array;

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

	$json_response = curl_exec($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	if($status!=200){
		header('Location: /myhome.php');
	}
	header('Location: /myhome.php');

} 

$myhome = file_get_contents("http://data.cube.blue/v1/api.php?apikey=".get_user_token()."&myhome");

$responseCode = http_response_code();
if($responseCode!=200){ // error while proceesing with API
	header('Location: /pagenotfound.php');
}

$myhome = json_decode($myhome);
$details = $myhome->myhome[0];
?>
<?php include('header.php');?>
<form id="myform" method="POST" action="">
<section class="middleCnt">
<div class="myHome">
    <div class="container full">
      <div class="row">
        <div class="col-lg-12">
        
        <div class="myHomeBox cusrespomyhome ">
        	<h5>Outdoor</h5>
            <ul>
            	<li><div class="myhome-left long">Automatic sprinkler system</div><div class="myhome-right long">
                <div class="checkbox checkbox-circle">
                    <input id="checkbox1" class="styled" type="checkbox" name="automaticsprinklersystem" id="automaticsprinklersystem" value="t" <?php echo ($details->outdoor_automatic_irrigation_present=='t'?'checked=""':'') ;?> >
                    <label for="checkbox1"></label>
                </div></div></li>
                <ul>
                    <li><div class="myhome-left">Number of zones</div><div class="myhome-right">
                    <div class="plusminus">
                        <input type="text" name="numberofzones" id="numberofzones" value="<?php echo ($details->outdoor_automatic_irrigation_count==''?2:$details->outdoor_automatic_irrigation_count) ;?>" class="qty" />
                        <div class="input-group-btn">
                        	<input type="button" value="-" class="qtyminus0 btn btn-default" field="numberofzones" />
                            <input type="button" value="+" class="qtyplus0 btn btn-default" field="numberofzones" />
                        </div>

                    </div></div></li>
                </ul>
            	<li><div class="myhome-left">Swimming pool</div><div class="myhome-right">
                	<div class="checkbox checkbox-circle">
                    <input id="swimmingpool" class="styled" type="checkbox" name="swimmingpool"  value="t" <?php echo ($details->outdoor_swimming=='t'?'checked=""':'') ;?> >
                    <label for="swimmingpool"></label>
                </div>
                </div></li>
            	<li><div class="myhome-left">Hot tub</div><div class="myhome-right">
                	<div class="checkbox checkbox-circle">
                    <input id="hotub" name="hotub" class="styled" type="checkbox"  value="t" <?php echo ($details->outdoor_hot_tub=='t'?'checked=""':'') ;?> >
                    <label for="hotub"></label>
                </div>
                </div></li>
            </ul>
        </div>


        <div class="myHomeBox">
        	<h5>Indoor</h5>
            <ul>
            	<li><div class="myhome-left long">Clothes washing machine</div><div class="myhome-right long">
                	<div class="checkbox checkbox-circle">
                    <input id="clotheswashingmachine" name="clotheswashingmachine" class="styled" type="checkbox"  value="t" <?php echo ($details->indoor_clothes_washing_present=='t'?'checked=""':'') ;?>>
                    <label for="clotheswashingmachine"></label>
                </div>
                </div></li>
                <ul>
                    <li><div class="myhome-left long">Machine is front loading</div><div class="myhome-right long">
                    	<div class="checkbox checkbox-circle">
                    <input id="machineisfrontloading" name="machineisfrontloading" class="styled" type="checkbox" value="t" <?php echo ($details->indoor_clothes_washing_front_loading=='t'?'checked=""':'') ;?>>
                    <label for="machineisfrontloading"></label>
                </div>
                    </div></li>
                </ul>
            	<li><div class="myhome-left">Toilets</div><div class="myhome-right"><div class="plusminus">
                        <input type="text" name="toilets" id="toilets" value="<?php echo ($details->indoor_toilets_count==''?2:$details->indoor_toilets_count) ;?>" class="qty" min="1"  max="10"/>
                        <div class="input-group-btn">
                        	<input type="button" value="-" class="qtyminus0 btn btn-default" field="toilets" />
                            <input type="button" value="+" class="qtyplus0 btn btn-default" field="toilets" />
                        </div>
                    </div></div></li>
            	<li><div class="myhome-left">Bathtubs/showers</div><div class="myhome-right">
                <div class="plusminus">
                        <input type="text" name="bathtub" id="bathtub" value="<?php echo ($details->indoor_baths_count==''?2:$details->indoor_baths_count) ;?>" class="qty" />
                        <div class="input-group-btn">
                        	<input type="button" value="-" class="qtyminus0 btn btn-default" field="bathtub" />
                            <input type="button" value="+" class="qtyplus0 btn btn-default" field="bathtub" />
                        </div>
                    </div></div></li>
            	<li><div class="myhome-left">Dishwasher</div><div class="myhome-right"><div class="checkbox checkbox-circle">
                    <input id="dishwasher" name="dishwasher" class="styled" type="checkbox" value="t" <?php echo ($details->indoor_dishwasher_present=='t'?'checked=""':'') ;?>>
                    <label for="dishwasher"></label>
                </div></div></li>
            	<li><div class="myhome-left long">Water softener system</div><div class="myhome-right long"><div class="checkbox checkbox-circle">
                    <input id="watersoftnersystem" name="watersoftnersystem" class="styled" type="checkbox" value="t" <?php echo ($details->indoor_water_softener_present=='t'?'checked=""':'') ;?> >
                    <label for="watersoftnersystem"></label>
                </div></div></li>
            	<li><div class="myhome-left long">Water heater is tankless</div><div class="myhome-right long"><div class="checkbox checkbox-circle">
                    <input id="waterheateristankless" name="waterheateristankless" class="styled" type="checkbox" value="t" <?php echo ($details->indoor_water_heater_tankless_present=='t'?'checked=""':'') ;?> >
                    <label for="waterheateristankless"></label>
                </div></div></li>
            </ul>
        </div>


		<div class="myHomeBox">
        	<h5>Home</h5>
            <ul>
            	<li><div class="myhome-left">Home Type</div><div class="myhome-right"><h4 class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class="iconarrow"><i class="fa fa-angle-down" aria-hidden="true"></i></span> <a href="javascript:void(0);">
				<?php if($details->home_type_id==''){
					echo 'Select';
				}else{
					foreach($myhome->home_type_list as $homeKey=>$homeVal){

						if($details->home_type_id==$homeVal->home_type_id){
							echo $homeVal->short_text;
						}

					}
				}?>

				</a> </h4></div>
              <div class="panel-group myHomeBoxAcrdn" id="accordion">
                  <div class="">

                    <div id="collapse1" class="panel-collapse collapse">
                      <div class="panel-body">
                        <div class="">
                          <ul>
						  <?php if(!empty($myhome->home_type_list)){
							 foreach($myhome->home_type_list as $homeKey=>$homeVal){ ?>

							<li>
								<input <?php echo ($details->home_type_id==$homeVal->home_type_id?'checked="checked"':'') ;?>  id="hometype<?php echo $homeVal->home_type_id;?>" name="hometype" type="radio" value="<?php echo $homeVal->home_type_id;?>">
								<div class="myHmBxAcrdnTxt"><?php echo $homeVal->short_text;?></div>
                            </li>
							 <?php }
						  }?>

                          </ul>
                        </div>
                      </div>

                    </div>

                  </div>
                </div>

                </li>

            </ul>
        </div>

        <div class="myHomeBox">
        	 <p>Select the structure type that best describes your home.</p>
        </div>

        <div class="myHomeBox">
            <ul>
                <li><div class="myhome-left long">Home size (sq ft)</div><div class="myhome-right long"><input type="text" name="homesize" id="homesize" value="<?php echo ($details->home_size==''?'':$details->home_size) ;?>" placeholder="00" /></div></li>
            </ul>
        </div>

        <div class="myHomeBox">
        	 <p>Enter the square feet of your home (or the approximate square feet if you aren't sure).</p>
        </div>

         <div class="myHomeBox">
            <ul>
            	<li><div class="myhome-left">Number of levels</div><div class="myhome-right">

                <div class="plusminus">
                        <input type="text" name="numberoflevels" id="numberoflevels" value="<?php echo ($details->home_number_levels==''?1:$details->home_number_levels) ;?>" class="qty" readonly />
                        <div class="input-group-btn">
                        	<input type="button" value="-" class="qtyminus0 btn btn-default" field="numberoflevels" />
                            <input type="button" value="+" class="qtyplus0 btn btn-default" field="numberoflevels" />
                        </div>
                    </div>
                </div></li>
            	<li><div class="myhome-left">Construction decade</div><div class="myhome-right">

                <div class="plusminus">
                        <input type="text" name="construction" id="construction" value="<?php echo ($details->home_construction_decade==''?1:$details->home_construction_decade) ;?>" class="qty" readonly />
                        <div class="input-group-btn">
                        	<input type="button" value="-" class="qtyminus10 btn btn-default" field="construction" />
                            <input type="button" value="+" class="qtyplus10 btn btn-default" field="construction" />
                        </div>
                    </div>

                </div></li>
            </ul>
        </div>

		<div class="myHomeBox">
        	<h5>Residents</h5>
            <ul>
                <li><div class="myhome-left">Adults</div><div class="myhome-right">

                <div class="plusminus">
                        <input type="text" name="adults" id="adults" value="<?php echo ($details->residents_adults==''?1:$details->residents_adults) ;?>" class="qty"  readonly/>
                        <div class="input-group-btn">
                        	<input type="button" value="-" class="qtyminus0 btn btn-default" field="adults" />
                            <input type="button" value="+" class="qtyplus0 btn btn-default" field="adults" />
                        </div>
                    </div>
                </div></li>
            	<li><div class="myhome-left">Children ages 10 to 17</div><div class="myhome-right">

                	<div class="plusminus">
                        <input type="text" name="child1017" id="child1017" value="<?php echo ($details->residents_children_10_17==''?0:$details->residents_children_10_17) ;?>" class="qty" readonly />
                        <div class="input-group-btn">
                        	<input type="button" value="-" class="qtyminus0 btn btn-default" field="child1017" />
                            <input type="button" value="+" class="qtyplus0 btn btn-default" field="child1017" />
                        </div>
                    </div>
                </div></li>
				<li><div class="myhome-left">Children ages 3 to 9</div><div class="myhome-right">

                	<div class="plusminus">
                        <input type="text" name="child39" id="child39" value="<?php echo ($details->residents_children_3_9==''?0:$details->residents_children_3_9) ;?>" class="qty" readonly />
                        <div class="input-group-btn">
                        	<input type="button" value="-" class="qtyminus0 btn btn-default" field="child39" />
                            <input type="button" value="+" class="qtyplus0 btn btn-default" field="child39" />
                        </div>
                    </div>
                </div></li>
				<li><div class="myhome-left">Children ages 0 to 2</div><div class="myhome-right">


                	<div class="plusminus">
                        <input type="text" name="child02" id="child02" value="<?php echo ($details->residents_children_0_2==''?0:$details->residents_children_0_2) ;?>" class="qty" readonly />
                        <div class="input-group-btn">
                        	<input type="button" value="-" class="qtyminus0 btn btn-default" field="child02" />
                            <input type="button" value="+" class="qtyplus0 btn btn-default" field="child02" />
                        </div>
                    </div>
                </div></li>
			</ul>
        </div>

		<div class="myHomeBox">

		<p>Why BluWater asks for number of residents and age categories <span  id="spann17" style="display:none;"> <br/>Indoor water use can vary significantly based on the number of residents and in some cases by occupant's age ranges(particuarly in the ccase of children). By providing this information, you improve BluWater's abilty to provide you with relevant information and alerts.<br/><br/>BluWater rigorously protects the privacy of your identity and your water use. To learn more, go to the Legal and Privacy screen(accessed through the More tab).</span> <a onclick="mantog('17')"  id="aaa17" class="myHomeBoxShow">Show More ></a></p>



        </div>

		<div class="myHomeBox">
        	<h5>Home Address</h5>
            <ul>
                <li><input type="text" value="<?php echo ($details->address_street_number==''?'':$details->address_street_number) ;?>" placeholder="Street Number" id="streetnumber" name="streetnumber" /></li>
                <li><input type="text" value="<?php echo ($details->address_street_name==''?'':$details->address_street_name) ;?>" placeholder="Street Name" id="streetname" name="streetname" /></li>
			</ul>
        </div>

		<div class="myHomeBox">
		<p>For the street number, only include numbers - do not include any letters or unit numbers.<span  id="spann18" style="display:none;"><br/>For example, if the home address is 1201-B Elm St. #4, enter only 1201 in the Street Number field, and enter Elm St. in the Street field.</span> <a onclick="mantog('18')"  id="aaa18" class="myHomeBoxShow">Show More ></a></p>
        </div>

		<div class="myHomeBox">
            <ul>
                <li><input type="text"  value="<?php echo ($details->address_zip==''?'':$details->address_zip) ;?>" name="zip" id="zip" placeholder="ZIP"  /></li>
			</ul>
        </div>
		<div class="myHomeBox">
        	<p>BluWater only uses your adderess to provide you with relevant, localized information about recent rainfall, permitted watering times and rebates that would be usefull to you and for which you would be eligible.<span  id="spann19" style="display:none;"><br/>BluWater rigorously protects the privacy of your identity and your water use. To learn more, go to the Legal and Privacy screen (accessed through the More tab).</span> <a onclick="mantog('19')"  id="aaa19" class="myHomeBoxShow">Show More ></a></p>
        </div>
               
			<input type="submit" id="subedit" name="subedit" value="Save" style="visibility: hidden;" />
					
        </div>
      </div>
    </div>    
</div>
</section>
</form>


<script>



 function mantog(id){
		$('#spann'+id).slideToggle('slide');
			if($('#aaa'+id).text() == 'Show More >'){
				$('#aaa'+id).text('< Show Less');
			} else {
				$('#aaa'+id).text('Show More >');
			}
	  }
	  
	  
	  
function saveeditform(){
	
	
	$('#subedit').click();/*
	alert('test');
var automaticsprinklersystem = $('#automaticsprinklersystem').attr("checked") ? 't' : '';
var numberofzones = $('#numberofzones').val();
var swimmingpool = $('#swimmingpool').attr("checked") ? 't' : '';
var hotub = $('#hotub').attr("checked") ? 't' : '';
var clotheswashingmachine = $('#clotheswashingmachine').attr("checked") ? 't' : '';
var machineisfrontloading = $('#machineisfrontloading').attr("checked") ? 't' : '';
var toilets = $('#toilets').val();
var bathtub = $('#bathtub').val();
var dishwasher = $('#dishwasher').attr("checked") ? 't' : '';
var watersoftnersystem = $('#watersoftnersystem').attr("checked") ? 't' : '';
var waterheateristankless = $('#waterheateristankless').attr("checked") ? 't' : '';

var hometype = $('input[name=hometype]:checked', '#myform').val();
if(hometype!=undefined){
	hometype=hometype;
}else{
	hometype='';
}

var homesize = $('#homesize').val();
var numberoflevels = $('#numberoflevels').val();
var construction = $('#construction').val();
var adults = $('#adults').val();
var child1017 = $('#child1017').val();
var child39 = $('#child39').val();
var child02 = $('#child02').val();
var streetnumber = $('#streetnumber').val();
var streetname = $('#streetname').val();
var zip = $('#zip').val();



$array = array(
	'apikey' => $userToken,
	'more' => '{"more_utility_id":5,"more_first_name":"Grant","more_last_name":"Fisher","more_transmitter":"20013"}'
 ); 
  
//echo 'jsonencode'.$jsonencode =  json_encode($array);

$url = "http://data.cube.blue/v1/api.php?more=&utility&";    
$content = $array;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

echo $json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

print_r($status);



	*/
	return false;
}

</script>

<?php include('footer.php');?>