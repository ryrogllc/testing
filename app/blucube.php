<?php
/*
  *   ARGH. I will never put a project out on UpWork that does not specify MVC.
  *     GP
 *
 *  TODO - fix the bullshit slider/hider below. It is crap.
 *  TODO - get this working for real (show if the device is on or off)
 *
 *  also, I changed the slideToggle to fadeToggle, because I like it better
  */

define('IN_APP', 1);
include('includes/is_logged_in.php');
include('header.php');

//TO get the activation status
$utility = file_get_contents("http://data.cube.blue/v1/api.php?apikey=".get_user_token()."&more");
if(http_response_code() !=200){ // error while proceesing with API
    header('Location: /pagenotfound.php');
}
$utility = json_decode($utility);

?>


    <section class="middleCnt">
        <div class="myHome">
            <div class="container full">
                <div class="row">
                    <div class="col-lg-12">
                        <p>&nbsp;</p>
                        <div class="myHomeBox blucube">
                            <h5>Device Information</h5>
                            <ul>
                                <li>
                                    <div class="blucube-left">Activation Status</div><div class="blucube-right"><span class="myHmBxOutTxt notAct"><?php if (($utility->blucube[0]->blucube_reads) > 0){echo '<span class="activated">Activated</span>'; }else{echo '<span class="not-activated">Not Activated</span>';}?></span></div>
                                </li>
                            </ul>
                        </div>
                        <div class="myHomeBox">
                            <div class="custActPg">
                                <p>Activating your BluCube takes about 2 minutes.<br/>Here's what you do:</p>
                                <ol type="1">
                                    <li>Go to your phone's Settings app.</li>
                                    <li>Select Wi-Fi.</li>
                                    <li>Select the Wi-Fi network that begins with the words "BluCube". A temporary
                                        screen titled "BluCube Set up" will appear.
                                    </li>
                                    <li>Select the button, "Configure".</li>
                                    <li>Select your home's Wi-Fi network from the list that appears, then enter your
                                        Wi-Fi password in the Password box.
                                    </li>
                                    <li>Select the Save button.</li>
                                </ol>
                                <p id="spann19" style="display:none;">This will initiate the process where your BluCube
                                    connects to your network. After about a minute, the temporary screen will disappear and
                                    your phone wil automatically re-connected to your home Wi-Fi. At that point, your
                                    BluCube should be activated. Com back to screen to make sure. </p>
                                <p><a onclick="man_toggle('19')" id="aaa19" class="myHomeBoxShow">Show More ></a></p>
                            </div>
                        </div>

                        <script>
                            function man_toggle(id) {
                                $('#spann' + id).fadeToggle('slide');
                                var the_id = $('#aaa' + id);
                                if (the_id.text() == 'Show More >') {
                                    the_id.text('< Show Less');
                                } else {
                                    the_id.text('Show More >');
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include('footer.php'); ?>