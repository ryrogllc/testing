<?php
    define('IN_APP',1);
    include('includes/is_logged_in.php');

    if(http_response_code() !=200){ // error while processing with API
        header('Location: /pagenotfound.php');
    }

    $utility = file_get_contents("http://data.cube.blue/v1/api.php?apikey=".get_user_token()."&more");

    if(http_response_code() !=200){ // error while processing with API
        header('Location: /pagenotfound.php');
    }

    $utility = json_decode($utility);
?>

<?php include('header.php');?>
<section class="middleCnt">

<div class="myHome">
    <div class="container full" style="padding-right:0px;padding-left:0px;">
      <div class="row">
        <div class="col-lg-12">
        <p>&nbsp;</p>
        <div class="myHomeBox">
            <ul>
                <li>
                    <a href="/profile.php">
                    <div class="more-left">Profile</div><div class="more-right"><span class="myHmBxOutTxt">
                    <i class="fa fa-angle-right" aria-hidden="true"></i></span></div>
                    </a>
                </li>

                <li>
                    <a href="/waterutility.php">
                    <div class="more-left">Water Utility</div><div class="more-right"><span class="myHmBxOutTxt">
                    <?php if($utility->more[0]->more_utility_id!=''){

                        foreach($utility->utility_list as $util){

                                    if($utility->more[0]->more_utility_id==$util->utility_id){
                                        echo $util->utility_nickname;
                                    }

                    }
                    }?>
                    <i class="fa fa-angle-right" aria-hidden="true"></i></span></div>
                    </a>
                </li>
            	<li>
				<a href="/blucube.php">
                    <div class="more-left">BluCube</div><div class="more-right"><span class="myHmBxOutTxt"><?php if (($utility->blucube[0]->blucube_reads) > 0){echo '<span class="activated">Activated</span>'; }else{echo '<span class="not-activated">Not Activated</span>';}?> <i class="fa fa-angle-right" aria-hidden="true"></i></span></div>
				</a>
                </li>
            	<li><a href="/transmitter.php">

				<div class="more-left">Transmitter ID</div><div class="more-right"><span class="myHmBxOutTxt"><?php echo $utility->more[0]->more_transmitter;?><i class="fa fa-angle-right" aria-hidden="true"></i></span></div>
				</a>
				</li>
            </ul>
        </div>


        <div class="myHomeBox">
            <ul>
            	<li><a href="/changepassword.php" style="color:#2196f3;">
				<div class="more-left">Change Password</div><div class="more-right"><span class="myHmBxOutTxt">&nbsp;</span></div>
				</a></li>
            </ul>
        </div>


        <div class="myHomeBox">
            <ul>
            	<li>
				<a href="/legacyandprivacy.php">
					<div class="more-left">Legal and privacy</div><div class="more-right"><span class="myHmBxOutTxt"><i class="fa fa-angle-right" aria-hidden="true"></i></span></div>
				</a>
				</li>
            	<li><div class="more-left">App Version</div><div class="more-right"><span class="myHmBxOutTxt">2.5.1</span></div></a></li>
            </ul>
        </div>
        
        <div class="myHomeBox">
            <ul>
            	<li><div class="myHomeBoxSignOut"><a href="/signout.php">Sign Out</a></div></li>
            </ul>
        </div>
        
        
        
		
                
        </div>
      </div>
    </div>    
</div>
</section>

<?php include('footer.php');?>