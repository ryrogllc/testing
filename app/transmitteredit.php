<?php

define('IN_APP', 1);
include('includes/is_logged_in.php');

if (isset($_POST) && !empty($_POST['subtrans'])) {
    $array = array(
        'apikey' => get_user_token(),
        'more' => '{"more_transmitter":"' . $_POST['trans'] . '"}'
    );
    $url = "http://data.cube.blue/v1/api.php?more=&utility&";
    $content = $array;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

    $json_response = curl_exec($curl);

    header('Location: /transmitter.php');
}
include('header.php');

$transmitter = file_get_contents("http://data.cube.blue/v1/api.php?apikey=" . get_user_token() . "&more");

if (http_response_code() != 200) { // error while proceesing with API
    header('Location: /pagenotfound.php');
}

$transmitter = json_decode($transmitter); ?>

    <form name="" action="" method="POST">
        <section class="middleCnt">

            <div class="myHome">
                <div class="container full">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>&nbsp;</p>
                            <div class="myHomeBox">
                                <ul>
                                    <li>
                                        <div class="transmitter-edit-left">Transmitter ID</div>
                                        <div class="transmitter-edit-right">
                                            <input type="text" name="trans" id="trans" placeholder=""
                                                   value="<?php echo $transmitter->more[0]->more_transmitter; ?>"/>
                                            <div class="closeIcon"><i onclick="return test();"
                                                                      class="fa fa-times-circle" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <input type="submit" name="subtrans" id="subtrans" value="submit"
                                   style="visibility: hidden;"/>
                            <div class="myHomeBox">
                                <p>Please enter the transmitter ID number that was emailed to you upon setup of your BluBand from info@pecanstreet.org. This is the number that links your BluWater account to your water meter.<span id="spann19" style="display:none;"><br/>In the event you do need to change the Transmitter ID number, you can find it on the gray transmitter case that is attached to your BluBand. The BluBand and transmitter case are installed at your water meter.</span>
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
                                function test() {
                                    $('#trans').val('');
                                }

                                function saveeditform() {
                                    $('#subtrans').click();
                                    return false;
                                }
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

<?php include('footer.php'); ?>