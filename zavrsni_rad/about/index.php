<?php

require_once("../inc/config.php");
	
$pageTitle = "O nama";
$section = "about";
	
include(ROOT_PATH . "inc/check_log.php");

	// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
	
include(ROOT_PATH . "inc/header_in.php");

} else {

	include(ROOT_PATH . "inc/header_out.php");
}
?>
	
<div class="headline text-center">
	<div class="row">
		<h3 class="ab">Što je APPet?</h3>
		<p class="about">Alat koji će Vam pomoći pratiti razvoj Vašeg ljubimca.</p>
		<p class="about">Usrećite ljubimce uz APPet.</p>
	</div>
</div>
	
<div class="row">
	<hr class="ab2"></hr>
</div>
	
<div class="row">
	<div class="large-4 push-1 columns ab2">
		<img class="ab" src=<?php echo BASE_URL . "img/a3.jpg"; ?>>
	</div>
	<div class="large-5 pull-1 columns ab2">
		<h4>Dodajte što više ljubimaca</h4>
		<p class="about">Osnovni princip na koji APPet funkcionira je dodavanje svih ljubimaca koje imate. Bilo
		to pet, deset ili svega jedan ljubimac. Mi u APPetu ponudit ćemo rješenja za najbolju brigu svakoga od njih.</p>
	</div>
</div>
	
<div class="row">
	<div class="large-3 push-1 columns ab2">
		<img class="ab" src=<?php echo BASE_URL . "img/a1.jpg"; ?>>
	</div>
	<div class="large-5 pull-1 columns ab2">
		<h4>Optimalna prehrana</h4>
		<p class="about">Na temelju vrste, dobi i mase Vašega ljubimca ponudit ćemo najbolji mogući plan prehrane i 
		osigurati da Vaš ljubimac dobije najbolje namirnice potrebne za njegov zdravi rast i razvoj.</p>
	</div>
</div>
	
<div class="row">
	<div class="large-3 push-1 columns ab2">
		<img class="ab" src=<?php echo BASE_URL . "img/a2.jpg"; ?>>
	</div>
	<div class="large-5 pull-1 columns ab2">
		<h4>Optimalne aktivnosti</h4>
		<p class="about">Na isti način izradit ćemo i tablicu aktivnosti koja će najbolje odgovarati Vašem ljubimcu.
		Na taj način će svaki mali životinjski prijatelj kojeg tako volite biti puno sretniji i zadovoljniji, a samim time i Vi.</p>
	</div>
</div>

<?php include(ROOT_PATH . "inc/footer.php"); ?>
