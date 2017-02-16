<?php
/*
 *   Holy shit, I threw up a little in my mouth while reading this.... WTF doesn't go far enough.
 *
 *  So, I tried to refactor this the best way in the shortest amount of time. It looks a lot better, but still.... UGH.
 *  -GP
 */


header("Cache-Control: max-age=86400"); //1 day

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Blue Water</title>


    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="custLoader" style="display:none;">
    <img src="images/load.gif"/>
</div>


<header>

    <div class="container">
        <div class="row">


            <?php
            $col_edit = '';
            $extra = '&nbsp;';

            switch ($currentFileName) {
                case 'dashboard':
                    $title = 'Dashboard';
                    $template = '1col';
                    break;
                case 'history':
                    $title = 'My Water Use History';
                    $template = '1col';
                    break;
                case 'daydetails':
                    $title = 'Day Detail';
                    $template = '1col';
                    break;

                case 'more':
                    $title = 'More';
                    $template = '3col_reg';
                    break;


                case 'myhome':
                    $title = 'My Home';
                    $template = '3col_edit';
                    $col_edit = 'myhomeedit.php';
                    break;
                case 'profile':
                    $title = 'Profile';
                    $template = '3col_edit';
                    $col_edit = 'profileedit.php';
                    break;
                case 'transmitter':
                    $title = 'Transmitter ID';
                    $template = '3col_edit';
                    $col_edit = 'transmitteredit.php';
                    break;

                case 'setupins':
                    $title = 'Setup Instructions';
                    $template = '3col_full';
                    break;
                case 'legacyandprivacy':
                    $title = 'Legal and Privacy';
                    $template = '3col_full';
                    break;
                case 'waterutility':
                    $title = 'My Water Utility';
                    $template = '3col_full';
                    break;
                case 'blucube':
                    $title = 'BluCube';
                    $template = '3col_full';
                    $extra = '<a href="" class="clrGry">Refresh</a>';
                    break;

                case 'myhomeedit':
                    $title = 'My Home';
                    $template = '3col_save';
                    $col_edit = 'myhome.php';
                    break;
                case 'profileedit':
                    $title = 'Profile';
                    $template = '3col_save';
                    $col_edit = 'profile.php';
                    break;
                case 'transmitteredit':
                    $title = 'Transmitter ID';
                    $template = '3col_save';
                    $col_edit = 'transmitter.php';
                    break;
                case 'changepassword':
                    $title = 'Change Password';
                    $template = '3col_save';
                    $col_edit = 'more.php';
                    break;

                default:
                    $template = '1col';
                    $title = 'BluWater';
                    break;

            }

            switch ($template) {
                case '3col_reg':
                    echo '<div class="col-lg-2 col-ms-3 col-sm-3 col-xs-3"><div class="headerBtnLft">&nbsp;</div></div>';
                    echo '<div class="col-lg-8 col-lg-8 col-ms-6 col-sm-6 col-xs-6"><h1>'.$title.'</h1></div>';
                    echo '<div class="col-lg-2 col-ms-3 col-sm-3 col-xs-3"><div class="headerBtnRt">&nbsp;</div></div>';
                    break;
                case '3col_edit':
                    echo '<div class="col-lg-2 col-ms-3 col-sm-3 col-xs-3"><div class="headerBtnLft">&nbsp;</div></div>';
                    echo '<div class="col-lg-8 col-ms-6 col-sm-6 col-xs-6"><h1>'.$title.'</h1></div>';
                    echo '<div class="col-lg-2 col-ms-3 col-sm-3 col-xs-3"> <div class="headerBtnRt"><a href="/' . $col_edit . '">Edit</a></div></div>';
                    break;
                case '3col_save':
                    echo '<div class="col-lg-2 col-ms-3 col-sm-3 col-xs-3"><div class="headerBtnLft"><a href="/' . $col_edit . '">Cancel</a></div></div>';
                    echo '<div class="col-lg-8 col-ms-6 col-sm-6 col-xs-6"><h1>'.$title.'</h1></div>';
                    echo '<div class="col-lg-2 col-ms-3 col-sm-3 col-xs-3"><div class="headerBtnRt"><a href="" onclick="return saveeditform();">Save</a></div></div>';
                    break;
                case '3col_full':
                    echo '<div class="col-lg-2 col-ms-2 col-sm-2 col-xs-2"><div class="headerBtnLft"><a href="/more.php"><i class="fa fa-angle-left hdrLftIcon" aria-hidden="true"></i></a></div></div>';
                    echo '<div class="col-lg-8 col-ms-8 col-sm-8 col-xs-8"><h1>'.$title.'</h1></div>';
                    echo '<div class="col-lg-2 col-ms-2 col-sm-2 col-xs-2"><div class="headerBtnRt">'.$extra.'</div></div>';
                    break;

                default :   // '1col':
                    if (isset($title)){
                        echo '<div class="col-lg-12"><h1>'.$title.'</h1></div>';
                    }else{
                        echo '<div class="col-lg-12"><h1>BluWater</h1></div>';

                    }
            }

            ?>


        </div>
</header>