<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Blue Water</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/customBlue.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="custLoader" style="display:none;">
    <img src="images/load.gif"/>
</div>

<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <div class="headerBtnLft"><a href="/"><i class="fa fa-angle-left hdrLftIcon"
                                                                              aria-hidden="true"></i></a></div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <h1>Create Account</h1>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <div class="headerBtnRt">&nbsp;</div>
            </div>
        </div>
    </div>
</header>

<form name="action" method="post">
    <section class="middleCnt" id="step1">
        <div class="pageBlue">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custBlueLog">
                            <h3 class="custBlueH3">What is your name?</h3>
                            <div class="custBlueInrFrm">
                                <span class="error" id="step1val"></span>
                                <input type="text" placeholder="First name" value="" name="firstname" id="firstname"/>
                                <input type="text" placeholder="Last name" value="" name="lastname" id="lastname"/>
                                <input type="button" value="Continue" name="" onclick="return slidenext12();"/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="middleCnt" id="step2" style="display:none;">
        <div class="pageBlue">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custBlueLog">
                            <h3 class="custBlueH3">What is your address?</h3>
                            <div class="custBlueInrFrm">
                                <span class="error" id="step2val"></span>

                                <p>Please provide the physical address where you are plugging in your BluCube.</p>
                                <input type="text" placeholder="Street number" value="" name="streetnumber"
                                       id="streetnumber"/>
                                <p>For the street number, only include numbers - do not include any letters or unit
                                    numbers.</p>
                                <input type="text" placeholder="Street name" value="" name="streetname"
                                       id="streetname"/>
                                <input type="text" placeholder="City" value="" name="city" id="city"/>
                                <select name="state" id="state">
                                    <option value="">Select</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DC">District of Columbia</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="IA">Iowa</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MD">Maryland</option>
                                    <option value="ME">Maine</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MT">Montana</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NY">New York</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VA">Virginia</option>
                                    <option value="VT">Vermont</option>
                                    <option value="WA">Washington</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                                <input type="text" placeholder="Zip" value="" id="zip" name="zip"/>
                                <p>&nbsp;</p>
                                <input type="button" value="Continue" name="" onclick="return slidenext23();"/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="middleCnt" id="step3" style="display:none;">
        <div class="pageBlue">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custBlueLog">
                            <h3 class="custBlueH3">What is your email address?</h3>
                            <div class="custBlueInrFrm">
                                <span class="error" id="step3val"></span>

                                <input type="text" placeholder="Enter your email address" value="" name="emailid"
                                       id="emailid"/>
                                <p>You'll use this email when you log in and if you ever need to reset your
                                    password.</p>
                                <p>&nbsp;</p>
                                <input type="button" value="Continue" name="" onclick="return slidenext34()"/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="middleCnt" id="step4" style="display:none;">
        <div class="pageBlue">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custBlueLog">
                            <h3 class="custBlueH3">Create a password</h3>
                            <div class="custBlueInrFrm">
                                <span class="error" id="step4val"></span>

                                <input type="text" placeholder="Enter password" value="" name="password"
                                       id="password"/>
                                <input type="text" placeholder="Re-enter password" value="" name="repassword"
                                       id="repassword"/>
                                <p>Enter a combination of at least six letters, numbers and punctuation marks (such as ? and $). </p>
                                <p>&nbsp;</p>
                                <p>
                                <div class="checkbox checkbox-circle entrPass">
                                    <input id="checkbox2" class="styled" required type="checkbox"><label
                                            for="checkbox2"><span class="entrPassTxt">I agree to <a
                                                    href="/termsandconditions.php">BluWater terms</a></span></label>
                                </div>
                                </p>
                                <input type="submit" value="Continue" name="" onclick="return createuser();"/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


</form>


<script>
    $(document).ready(function () {
        $("#zip").keypress(function (e) {
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });

    function slidenext12() {
        $('#step1val').html('');
        if ($('#firstname').val() == '') {
            $('#step1val').html('First name required');
        } else if ($('#lastname').val() == '') {
            $('#step1val').html('Last name required');
        } else {
            $('#step1').hide();
            $('#step2').show();
        }
        return false;
    }

    function slidenext23() {
        $('#step2').hide();
        $('#step3').show();
        return false;
    }

    function slidenext34() {
        $('#step3val').html('');
        var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;

        if ($('#emailid').val() == '') {
            $('#step3val').html('Email required');
        } else if (!filter.test($('#emailid').val())) {
            $('#step3val').html('Please enter valid email ');
        } else {
            $('#step3').hide();
            $('#step4').show();
        }
        return false;
    }

    function createuser() {
        $('.custLoader').show();

        $('#step4val').html('');

        if ($('#password').val() == '') {
            $('#step4val').html('Password required');
            $('.custLoader').hide();
            return false;
        } else if ($('#repassword').val() == '') {
            $('#step4val').html('Re-Enter Password');
            $('.custLoader').hide();
            return false;
        }

        if ($('#password').val() != '' && $('#repassword').val() != '') {
            if ($('#password').val() != $('#repassword').val()) {
                $('#step4val').html("The passwords don't match");
                $('.custLoader').hide();

                return false;
            }
        }

        if ($("#checkbox2").prop('checked') == true) {

        } else {
            $('#step4val').html("To create an account, you must agree with the terms");
            $('.custLoader').hide();
            return false;
        }


        if ($("#checkbox222").prop('checked') == true) { // default transmitter
            var trans = 11;
        } else {
            var trans = 10;
        }

        var emailid = $('#emailid').val();
        var password = $('#password').val();

        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();

        var city = $('#city').val();
        var streetname = $('#streetname').val();
        var streetnumber = $('#streetnumber').val();
        var zip = $('#zip').val();


        $.get("/process.php?pro=<?php echo md5('createuser');?>&emailid=" + emailid + "&pwd=" + password + "&firstname=" + firstname + "&lastname=" + lastname + "&streetname=" + streetname + "&streetnumber=" + streetnumber + "&zip=" + zip + "&city=" + city + "&trans=" + trans, function (data) {
            if (data == 500) {
                $('#step4val').html('Error while processing. Please try again later');
                $('.custLoader').hide();
            } else if (data == 403) {
                $('#step4val').html('Account already exists. Please try again with another Email address');
                $('.custLoader').hide();
            } else if (data == 200) {
                window.location.href = "/dashboard.php";
            }
        });

        window.location.href = "/dashboard.php";
        return false;
    }</script>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ftrBlue"><a href="/">Already have an account?</a></div>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>