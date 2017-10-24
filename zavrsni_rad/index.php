<?php
	require_once("inc/config.php");
	$pageTitle = "APPet";
	$section = "appet";
?>

	<!-- HEADER -->

<?php

// check for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit('Sorry, this script does not run on a PHP version smaller than 5.3.7 !');
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once(ROOT_PATH . 'inc/phplogin/libraries/password_compatibility_library.php');
}
// include the config
require_once(ROOT_PATH .'inc/config.php');

// include the to-be-used language, english by default. feel free to translate your project and include something else
require_once(ROOT_PATH . 'inc/phplogin/translations/en.php');

// include the PHPMailer library
require_once(ROOT_PATH . 'inc/phplogin/libraries/PHPMailer.php');

// load the login class
require_once(ROOT_PATH . 'inc/phplogin/classes/Login.php');

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process.
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    include(ROOT_PATH . "inc/header_in.php");

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    include(ROOT_PATH . "inc/header_out.php");
}
?>
	
	<!-- END HEADER -->
	
	<!-- BANNER -->
	
	<div class="headline">
		<div class="row">
			<div class="text-center">
					<h1><?php echo "Dobrodošli u APPet zajednicu!"; ?></h1>
			</div>
		</div>
		
		<div class="row">
			<div class="text-center">
				<img src="<?php echo BASE_URL;?>img/pets.jpg" id="main-img"/>
			</div>
		</div>
		
		<div class="row">
			<div class="text-center">
				<ul class="button-group radius">
					<li><a href="<?php echo BASE_URL;?>signup/" class="button text-center">Registracija</a></li>
					<li><a href="<?php echo BASE_URL;?>login/" class="button no2 text-center">Prijavi me</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<!-- END BANNER -->
	
	<!-- FOOTER -->
	
	<?php include(ROOT_PATH . 'inc/footer.php'); ?>
	  
	<!-- END FOOTER -->

</body>