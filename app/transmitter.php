<?php

define('IN_APP', 1);
include('includes/is_logged_in.php');

$local_user_token = get_user_token();
$transmitter = file_get_contents("http://data.cube.blue/v1/api.php?apikey=" . $local_user_token . "&more");


if (http_response_code() != 200) { // error while processing with API
    header('Location: /pagenotfound.php');
}

$transmitter = json_decode($transmitter);

include('header.php');
?>
    <section class="middleCnt">

        <div class="myHome">
            <div class="container full">
                <div class="row">
                    <div class="col-lg-12">
                        <p>&nbsp;</p>
                        <div class="myHomeBox">
                            <ul>
                                <li>
                                    <div class="transmitter-left">Transmitter ID</div><div class="transmitter-right"><span class="myHmBxOutTxt"><?php echo $transmitter->more[0]->more_transmitter; ?></span></div>
                                </li>
                            </ul>
                        </div>

                        <div class="myHomeBox">

                            <p>Please enter the transmitter ID number that was emailed to you upon setup of your BluBand from info@pecanstreet.org. This is the number that links your BluWater account to your water meter. <span id="spann19" style="display:none;"><br/>In the event you do need to change the Transmitter ID number, you can find it on the gray transmitter case that is attached to your BluBand. The BluBand and transmitter case are installed at your water meter.</span>
                            <a onclick="mantog('19')" id="aaa19" class="myHomeBoxShow">Show More ></a></p>


                        </div>


                        <script>

                            function mantog(id) {
                                $('#spann' + id).slideToggle('slide');
                                if ($('#aaa' + id).text() == 'Show More >') {
                                    $('#aaa' + id).text('< Show Less');
                                } else {
                                    $('#aaa' + id).text('Show More >');
                                }
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include('footer.php'); ?>