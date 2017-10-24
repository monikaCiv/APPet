<?php
	
require_once("../inc/config.php");
	
$pageTitle = "Registracija";
$section = "signup";

	
    include(ROOT_PATH . "inc/check_log.php");
	if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    
	include (ROOT_PATH . "pets/pets.php");
	
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
	include(ROOT_PATH . "inc/header_out.php");



	// check for minimum PHP version
	if (version_compare(PHP_VERSION, '5.3.7', '<')) {
		exit('Sorry, this script does not run on a PHP version smaller than 5.3.7 !');
	} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
		// if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
		// (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
		require_once(ROOT_PATH . 'inc/phplogin/libraries/password_compatibility_library.php');
	}

	// include the to-be-used language, english by default. feel free to translate your project and include something else
	require_once(ROOT_PATH . 'inc/phplogin/translations/en.php');

	// include the PHPMailer library
	require_once(ROOT_PATH . 'inc/phplogin/libraries/PHPMailer.php');

	// load the registration class
	require_once(ROOT_PATH . 'inc/phplogin/classes/Registration.php');

	// create the registration object. when this object is created, it will do all registration stuff automatically
	// so this single line handles the entire registration process.
	$registration = new Registration();

	if (isset($registration)) {
		if ($registration->errors) {
			foreach ($registration->errors as $error) {
				$error_msg =  $error;
			}
		}
		if ($registration->messages) {
			foreach ($registration->messages as $message) {
				$msg = $message;
			}
		}
	}	
	?>
	
	
	<!-- SIGN UP FORM -->
	
	<?php if (!$registration->registration_successful && !$registration->verification_successful) { ?>
	
	<div class="row headline">
		<h2 class="left submit1">Postanite APPet član već danas!</h2>
	</div>
	
	<div class="row">
	
		<div class="large-6 small-10 columns push-1">
		
			<form method="post" action="<?php echo BASE_URL; ?>signup/" name="registerform">
				<fieldset class="large-10 columns">
						<?php
						if(!isset($error_msg) AND !isset($msg)) {
							echo '<legend class="field1">Podaci za registraciju</legend>';
						} elseif (isset($msg)) {
								echo '<legend class="field1">' . $msg . '</legend>';
						}else {
							echo '<legend class="field2">' . $error_msg . '</legend>';
						}
						?>
					
					<div class="row">
						<div class="large-4 columns">
						  <label for="user_name" class="left inline">APPet ime *</label>
						</div>
						<div class="large-8 columns">
						 <input id="user_name" type="text" name="user_name" />
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
						  <label for="user_email" class="left inline">E-mail *</label>
						</div>
						<div class="large-8 columns">
						  <input id="user_email" type="text" name="user_email"/>
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
						  <label for="user_password_new" class="left inline">Lozinka *</label>
						</div>
						<div class="large-8 columns">
						<input id="user_password_new" type="password" name="user_password_new" autocomplete="off" />
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
						  <label for="user_password_repeat" class="left inline">Potvrda *</label>
						</div>
						<div class="large-8 columns">
						 <input id="user_password_repeat" type="password" name="user_password_repeat" autocomplete="off" />
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
						  <label>Prepiši tekst *</label>
						</div>
						<div class="large-8 columns">
						 <input type="text" name="captcha"/>
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns push-5">
							<img src="<?php echo BASE_URL; ?>inc/phplogin/tools/showCaptcha.php" alt="captcha" />
						</div>
					</div>
					
				</fieldset>	
				<div class="row">
					<div class="large-12 columns">
						<input type="submit" name="register" value="Registriraj me" class="button no3 radius right">
					</div>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<label>* Napomena: Korisničko ime može sadržavati brojeve i znakove engleske abecede bez ikakvih posebnih znakova i ne smije biti duže od 20 znakova. Isto vrijedi i za lozinku koja mora imati 6 ili više znakova. Sva polja su obavezna.</label>
					</div>
				</div>
			</form>		
		
		</div>
		
		<div class="large-6 columns hide-for-small">
			<img class="submit1 push-2" src="<?php echo BASE_URL; ?>img/cat1.jpg">
		</div>
	
	</div>
	
	<?php }  else if ($registration->registration_successful && !$registration->verification_successful){ ?>
	
	<div class="row headline">
		<div class="text-center">
				<h2 class="submit1">Hvala što ste ispunili prijavnicu!</h2>
				<h3>Uskoro ćete primiti aktivacijski E-mail.</h3>
			</div>
	</div>
	
	<div class="row">
		<div class="text-center">
			<img class="submit1" src="<?php echo BASE_URL; ?>img/dc3.jpg"/>	
		</div>
	</div>
	
	<div class="row">
		<div class="text-center">
			<a href="<?php echo BASE_URL;?>" class="button no4 radius">Početna</a>
		</div>
	</div>
	
	<?php } else { ?>
	
		<div class="row headline">
		<div class="text-center">
				<h2 class="submit1">Uspješno ste se registrirali na APPet!</h2>
				<h3>Sada se možete ulogirati i dodati svoje ljubimce.</h3>
			</div>
	</div>
	
	<div class="row">
		<div class="text-center">
			<img class="submit1" src="<?php echo BASE_URL; ?>img/dc3.jpg"/>	
		</div>
	</div>
	
	<div class="row">
		<div class="text-center">
			<a href="<?php echo BASE_URL;?>login/" class="button no5 radius">Prijavi me</a>
		</div>
	</div>
	
	<?php } ?>
	
	<!-- END SIGN UP FORM -->
	
	<!-- FOOTER -->

<?php } ?>
<?php include(ROOT_PATH . 'inc/footer.php'); ?>
	  
	<!-- END FOOTER -->
