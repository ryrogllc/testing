<?php

define('IN_APP', 1);
include('includes/is_logged_in.php');

//this if if we are trying to SET the name (profile info)
if (isset($_POST) && !empty($_POST['subpro'])) {
    $array = array(
        'apikey' => get_user_token(),
        'more' => '{"more_first_name":"' . $_POST['firstname'] . '","more_last_name":"' . $_POST['lastname'] . '"}'
    );
    $url = "http://data.cube.blue/v1/api.php?more=&utility&";
    $content = $array;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    header('Location: /profile.php');

}
include('header.php');

$more = file_get_contents("http://data.cube.blue/v1/api.php?apikey=" . get_user_token() . "&more");

if (http_response_code() != 200) { // error while proceesing with API
    header('Location: /pagenotfound.php');
}

$more = json_decode($more);


$details = $more->more[0];
?>
    <section class="middleCnt">
        <form action="" method="POST">
            <div class="myHome">
                <div class="container full">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>&nbsp;</p>
                            <div class="myHomeBox profile-edit">
                                <h5>Name</h5>
                                <ul>
                                    <li>
                                        <input type="text" value="<?php echo $details->more_first_name; ?>"
                                               name="firstname" placeholder="First Name"/>
                                    </li>
                                    <li><input type="text" value="<?php echo $details->more_last_name; ?>"
                                               name="lastname" placeholder="Last Name"/></li>
                                </ul>
                            </div>

                            <div class="myHomeBox profile-edit">
                                <h5>Email Address</h5>
                                <ul>
                                    <li>
                                        <div class="profile-left"><span class="myHmBxOutTxt"><?php echo $details->username; ?></span></div>
                                    </li>
                                </ul>
                            </div>

                            <input type="submit" name="subpro" value="Submit" id="subpro" style="visibility: hidden;"/>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>
    <script>
        function saveeditform(){
            $('#subpro').click();
            return false;
        }
    </script>

<?php include('footer.php'); ?>