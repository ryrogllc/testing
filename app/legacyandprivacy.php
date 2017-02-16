<?php
/*
 *   Yeah, really, I don't know where this in the app (more.php calls it), but it looks really harmless. Whatever.
 *   -GP
 *
 */
define('IN_APP', 1);                    //to stop page-jacking
include('includes/is_logged_in.php');     //check for logged in
include('header.php');                  // because, fuck MVC, right? :)

//todo - enable the send by email bullshit below...
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
                                    <div class="mydailyavrglft fullwidth"><a href="#" style="color:#2196f3;">Send agreement by email</a></div>
                                </li>
                            </ul>
                        </div>
                        <p>&nbsp;</p>
                        <div class="myHomeBox">
                            <div class="custPrvcyPolcy">
                                <h6>Pecan Street BluWater Mobile App</h6>
                                <h4>End User License Agreement</h4>
                                <h5>Terms and conditions</h5>
                                <p>This End User License Agreement ("Agreement") is between Pecan Street Inc., a Texas
                                    non-profit corporation located at 3924 Berkman Drive, Austin, TX 78749 ("Licensor")
                                    and you ("you" or "User"). Intending to be legally bound, you and Licensor agree to
                                    the terms and conditions stated in this Agreement.</p>
                                <p style="text-transform:uppercase">By Clicking the "Submit" button or otherwise using
                                    this Pecan Street BluWater mobile app (The "Program"), you accept and agree to be bound
                                    by the <a href="termsandconditions.php">terms and conditions</a> of this agreement. </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include('footer.php');   //because fuck MVC, right?    ?>