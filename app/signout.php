<?php

/*
 *   This file is called when a user tries to log off. It should start the session normally, then destroy it.
 *   After it is destroyed, we need to bounce the user back to the home page.
 *   -QC'ed by GP on 20161216
 */


session_start();
$_SESSION = array();   // this is the correct way to do this. :)
session_destroy();     // for extra measure

header('Location: /'); // and bounce back to the home page