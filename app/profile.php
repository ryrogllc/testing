<?php

define('IN_APP', 1);
include('includes/is_logged_in.php');

$more = file_get_contents("http://data.cube.blue/v1/api.php?apikey=" . get_user_token() . "&more");

if (http_response_code() != 200) { // error while proceesing with API
    header('Location: /pagenotfound.php');
}

$more = json_decode($more);
$details = $more->more[0];
include('header.php');
?>
    <section class="middleCnt">

        <div class="myHome">
            <div class="container full">
                <div class="row">
                    <div class="col-lg-12 editlftrtCustwidth">
                        <p>&nbsp;</p>
                        <div class="myHomeBox profile">
                            <ul>
                                <li>
                                    <div class="profile-left">Name</div><div class="profile-right"><span class="myHmBxOutTxt"><?php echo $details->more_first_name; ?>&nbsp;<?php echo $details->more_last_name; ?></span></div>
                                </li>
                                <li>
                                    <div class="profile-left">Email</div><div class="profile-right"><span class="myHmBxOutTxt"><?php echo $details->username; ?></span></div>
                                </li>

                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>