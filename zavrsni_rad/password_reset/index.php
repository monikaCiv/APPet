<?php

require_once("../inc/config.php");
$pageTitle = "Zaboravljena lozinka";
$section = "reset";	

// check for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit('Sorry, this script does not run on a PHP version smaller than 5.3.7 !');
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once(ROOT_PATH . 'inc/phplogin/libraries/password_compatibility_library.php');
}
// include the config


// include the to-be-used language, english by default. feel free to translate your project and include something else
require_once(ROOT_PATH . 'inc/phplogin/translations/en.php');

// include the PHPMailer library
require_once(ROOT_PATH . 'inc/phplogin/libraries/PHPMailer.php');

// load the login class
require_once(ROOT_PATH . 'inc/phplogin/classes/Login.php');

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process.
$login = new Login();

// the user has just successfully entered a new password
// so we show the index page = the login page
if ($login->passwordResetWasSuccessful() == true && $login->passwordResetLinkIsValid() != true) {
	include(ROOT_PATH . "inc/header_out.php");
    include(ROOT_PATH . "inc/phplogin/views/not_logged_in.php");

} else {
    // show the request-a-password-reset or type-your-new-password form
	include(ROOT_PATH . "inc/header_out.php");
    include(ROOT_PATH . "inc/phplogin/views/password_reset.php");
}

?>
