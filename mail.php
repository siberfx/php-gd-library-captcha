<?php
if ( !$_POST) { echo 'direct access is forbidden'; } else {

session_start();

if ($_POST["sbxcaptcha"] != $_SESSION['captcha_string']) { echo 'Error.. the code you entered is not matched'; } else {

date_default_timezone_set('Europe/Istanbul');

// Your mailing code going to be here.



}

}
