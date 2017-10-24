<?php
require_once("../inc/config.php");
$pageTitle = "Uvjeti i upozorenja";
$section = "terms";
?>

	<!-- HEADER -->

<?php 
include(ROOT_PATH . 'inc/check_log.php');
if ($login->isUserLoggedIn() == false) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    
	include(ROOT_PATH . "inc/header_out.php");

	
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
	include(ROOT_PATH . "inc/header_in.php");
}
 ?>

	<!-- END HEADER -->

<div class="row headline text-center">
	<h3 class="term">APPet aplikacija je napravljena kao završni rad na fakultetu i nije namijenjena za korištenje u druge svrhe!</h3>
	<a href="http://www.etfos.unios.hr/"><img class="term2" src="<?php echo BASE_URL; ?>img/etfos.png"/></a>
</div>

	<!-- FOOTER -->

<?php include(ROOT_PATH . 'inc/footer.php'); ?>

	<!-- END FOOTER -->