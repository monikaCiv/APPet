<?php
	
require_once("../inc/config.php");

$pageTitle = "Vaši ljubimci";
$section = "home";

include (ROOT_PATH . 'inc/check_log.php'); 

if ($login->isUserLoggedIn() == false) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    
include(ROOT_PATH . "inc/header_out.php");
include (ROOT_PATH . "inc/phplogin/views/forbidden.php");
	
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
include(ROOT_PATH . "inc/header_in.php");
require_once(ROOT_PATH . 'inc/data.php');
$pets = get_pets();

?>

	<!-- END HEADER -->
	
	<!-- BANNER -->
	
	<div  class="row headline pets">
		<h2 class="lead">Moji ljubimci</h2>
	</div>
		
	<div class="row">
		<div class="large-6 columns">
			
			<ul class="pet-list">
				<?php 
					foreach ($pets as $pet) {
						include(ROOT_PATH . 'inc/pet_list.php');
					}
				?>
				
				<li>
					<a href="<?php echo BASE_URL; ?>add_pet/" class="button no11 radius" id="add">Dodaj ljubimca</a>
				</li>
			</ul>	
		</div>
		
		<div class="large-6 columns hide-for-small">
			<img id="choose2" src="<?php echo BASE_URL; ?>img/dcr2.jpg"/>
		</div>	
	</div>
	
	
	
	<!-- END BANNER -->
	
	
	<!-- FOOTER -->
	
	<?php } ?>
	<?php include(ROOT_PATH . 'inc/footer.php'); ?>
	
	<!-- END FOOTER -->

</body>