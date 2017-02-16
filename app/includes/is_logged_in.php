<?php
/*
  *    This page should not be called directly
  *      Also, it is meant to start the session, and then set the variable "$usertoken" from the data stored in
  *      the $_SESSION slot 'usertoken'. If there is no 'usertoken' set, it bounces them to the main page to login.
  *     Tweaked and approved by GP on 20161216
 *
 *      TODO - Make pages call get_user_token instead of using the $usertoken variable
  */

defined('IN_APP') or die();   // this is to make sure that we aren't calling this page directly.
                              // we need to set the IN_APP variable at all pages calling this one: define('IN_APP',1);


//TODO, fix this in a future release, please.....
$currentFileName = basename($_SERVER["SCRIPT_FILENAME"], '.php');  //anmoldeep used this in the header and footer to grey/select icons

session_start();

if(!isset($_SESSION['usertoken']) or  empty($_SESSION['usertoken'])){
	header('Location: /');  //route back to default url
}


//TODO: this should be tied to a config variable in the app
date_default_timezone_set('America/Chicago');  //set the timezone to us, for now

function get_user_token(){
    if (isset($_SESSION['usertoken'])){
        return $_SESSION['usertoken'];
    } else{
        exit();
    }
}
