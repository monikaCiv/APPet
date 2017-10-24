<?php
	
require_once("../inc/config.php");
require_once (ROOT_PATH . "inc/data.php");

$pageTitle = "Korisnički profil";
$section = "profile";

?>

<?php include(ROOT_PATH . 'inc/check_log.php'); 
if ($login->isUserLoggedIn() == false) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    
	include(ROOT_PATH . "inc/header_out.php");
	include (ROOT_PATH . "inc/phplogin/views/forbidden.php");
	
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
	include(ROOT_PATH . "inc/header_in.php");
	

?>

	<div class="headline profile">
		<div class="row">
			<h2>Korisnički profil</h2>
		</div>
	</div>

	<div class="row">
		<div class="large-6 columns">
			<form class="custom">
				<fieldset>
					<legend class="field1">Podaci</legend>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="label2" class="left inline">APPet ime</label>
						</div>
						<div class="large-8 columns">
							<p class="pet-details"><?php echo $_SESSION['user_name']; ?></p>
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="label2" class="left inline">E-mail</label>
						</div>
						<div class="large-8 columns">
							<p class="pet-details"><?php echo $_SESSION['user_email']; ?></p>
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="label2" class="left inline">Broj ljubimaca</label>
						</div>
						<div class="large-8 columns">
							<p class="pet-details"><?php get_pets_count(); ?></p>
						</div>
					</div>
				</fieldset>
				
				
				<div class="row">
					<div class="large-6 push-4 columns">
						<a href="<?php echo BASE_URL; ?>profile/edit.php" class="button no12 radius"><i class="fi-pencil"></i>Izmjena</a>		
					</div>
				</div>
				
			
			
			</form>
		</div>
		<div class="large-4 pull-1 columns">
			<img src="<?php echo BASE_URL; ?>img/gh.jpg">
		</div>
	</div>
<!-- END MAIN CONTENT -->

<!-- FOOTER -->
<?php } ?>
<?php include(ROOT_PATH . "inc/footer.php"); ?>

<!-- END FOOTER -->