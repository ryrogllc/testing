<?php

define('IN_APP', 1);
include('includes/is_logged_in.php');
include('header.php');

$local_user_token = get_user_token();
$utility = file_get_contents("http://data.cube.blue/v1/api.php?apikey=" . $local_user_token . "&more");

if (http_response_code() != 200) { // error while processing with API
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

                        <span class="error" id="step1val"></span>


                        <div class="myHomeBox">
                            <ul>
                                <li>
                                    <div class="mydailyavrglft">My Water Utility</div>
                                    <div class="myHomeBoxAcrdn">
                                        <div class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <ul>

                                                    <?php foreach ($utility->utility_list as $util) { ?>

                                                        <li>
                                                            <div class="myHmBxAcrdnCheck">
                                                                <input <?php if ($utility->more[0]->more_utility_id == $util->utility_id) { ?> checked="checked" <?php } ?>
                                                                        type="radio" name="utility_id"
                                                                        value="<?php echo $util->utility_id; ?>"/></div>
                                                            <div class="water-utility-text"><?php echo $util->utility_name; ?></div>
                                                        </li>

                                                    <?php } ?>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class="myHomeBox">
                            <p>Select your water provider from the list above. If you do not see your water utility or
                                do not know the name of it, select "Other". <span id="spann17" style="display:none;"> <br/>BluWater only uses the information about your water utility to relevant, localized information about recent rainfall, permittied watering times and rebates that would be useful to you and for which you would be eligible.<br/><br/>BluWater rigorously protects the privacy of your identity and your water use. To learn more, go to the Legal and Privacy screen (accessed through the More tab).</span>
                                <a onclick="mantog('17')" id="aaa17" class="myHomeBoxShow">Show More ></a></p>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>
        function mantog(id) {
            $('#spann' + id).slideToggle('slide');
            if ($('#aaa' + id).text() == 'Show More >') {
                $('#aaa' + id).text('< Show Less');
            } else {
                $('#aaa' + id).text('Show More >');
            }
        };

        $(document).ready(
            function () {
                $('input:radio').click(
                    function () {
                        $('.custLoader').show();

                        var checkboxval = this.value;

                        $.get("/process.php?pro=<?php echo md5('waterutility');?>&val=" + checkboxval + "&tok=<?php echo get_user_token();?>", function (data) {
                            if (data == 200) {
                                //  location.reload();
                                window.location.href = "/more.php";

                            } else {
                                $('#step1val').html('Error while processing');
                                $('.custLoader').hide();

                            }
                        });
                    }
                );
            }
        );



    </script>

<?php include('footer.php'); ?>