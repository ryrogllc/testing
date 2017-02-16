<?php

define('IN_APP', 1);
include('includes/is_logged_in.php');

$local_user_token = get_user_token();  //from is_logged_in

include('header.php');

$more = file_get_contents("http://data.cube.blue/v1/api.php?apikey=" . $local_user_token . "&more");

if (http_response_code() != 200) { // error while processing with API
    header('Location: /pagenotfound.php');
}

$more = json_decode($more);
$details = $more->more[0];

$status = 0;
if (isset($_POST) && !empty($_POST['chanpass'])) {
    $array = array(
        'user' => $details->username,
        'pass_old' => $_POST['oldpass'],
        'pass_new' => $_POST['newpass']
    );


    $url = "http://data.cube.blue/v1/api.php?change_pass=";
    $content = $array;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    header('Location: /more.php');

} ?>
    <form name="" action="" method="POST">
        <section class="middleCnt">
            <div class="myHome">
                <div class="container full">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>&nbsp;</p>
                            <?php if ($status == 403) {
                                echo '<p class="error">Old Password mismatch</p>';
                            } ?>

                            <?php if ($status == 200) {
                                echo '<p class="error success">Password has been successfully changed.</p>';
                            } ?>

                            <p id="passtep" class="error"></p>

                            <div class="myHomeBox change-password">
                                <h5>Current Password</h5>
                                <ul>
                                    <li><input type="password" value="" name="oldpass" id="oldpass"
                                               placeholder="Enter current password"/></li>
                                </ul>
                            </div>

                            <div class="myHomeBox">
                                <h5>New Password</h5>
                                <ul>
                                    <li><input type="text" value="" name="newpass" id="newpass"
                                               placeholder="Enter new password"/></li>
                                    <li><input type="text" value="" name="newpassre" id="newpassre"
                                               placeholder="Re-enter new password"/></li>
                                </ul>
                            </div>
                            <div class="myHomeBox hide-password">
                                <div class="hidpaswd checkbox checkbox-circle">
                                    <input id="checkbox1" class="styled" type="checkbox" onclick="changpass();">
                                    <label for="checkbox1">Hide password digits</label>
                                </div>
                                <p>&nbsp;</p>
                            </div>

                            <!-- <div class="myHomeBox">
                                <ul>
                                    <li>
                                        <div class="myHomeBoxSignOut"><a href="#" onclick="return saveeditform();">Update
                                                Password</a></div>
                                    </li>
                                </ul>
                            </div>

                            <input type="submit" name="chanpass" id="chanpass" value="Update"
                                   onclick="return checkpass();" style="visibility: hidden;"/> -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <script type="text/javascript">


        function saveeditform() {
            $('#chanpass').click();
            return false;
        }


        function checkpass() {

            $('#passtep').html('');
            if ($('#newpass').val() == '') {
                $('#passtep').html('New Password required');
                return false;
            } else if ($('#newpassre').val() == '') {
                $('#passtep').html('New Re-Enter Password required');
                return false;
            } else if ($('#oldpass').val() == '') {
                $('#passtep').html('Old Password required');
                return false;
            }

            if ($('#newpass').val() != '' && $('#newpassre').val() != '') {
                if ($('#newpass').val() != $('#newpassre').val()) {
                    $('#passtep').html("Both new password doesn't match");
                    return false;
                }
            }

        }

        function changpass() {
            if ($('#checkbox1').prop('checked')) {
                document.getElementById('newpass').type = 'password';
                document.getElementById('newpassre').type = 'password';
            } else {
                document.getElementById('newpass').type = 'text';
                document.getElementById('newpassre').type = 'text';
            }
        }
    </script>
<?php include('footer.php'); ?>