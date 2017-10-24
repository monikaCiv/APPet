<?php

require_once("../inc/config.php");
	
$pageTitle = "Pomoć i zahvala";
$section = "help";
	
include(ROOT_PATH . "inc/check_log.php");


if ($login->isUserLoggedIn() == true) {

	include(ROOT_PATH . "inc/header_in.php");

} else {

	include(ROOT_PATH . "inc/header_out.php");
}
?>

<div class="row added">
	<div class="text-center">
		<h2>Velika pomoć pri izradi aplikacije:</h2>
	</div>
</div>


<div class="row headline text-center">
	<div class="row"><h4>Treehouse:<a href="http://teamtreehouse.com">http://teamtreehouse.com</a></h4></div>
	<div class="row"><h4>W3Schools:<a href="http://www.w3schools.com/">http://www.w3schools.com/</a></h4></div>
	<div class="row"><h4>GitHub:<a href="https://github.com/">https://github.com/</a></h4></div>
	<div class="row"><h4>Foundation:<a href="http://foundation.zurb.com/">http://foundation.zurb.com/</a></h4></div>
	<div class="row"><h4>Stack Overflow:<a href="http://stackoverflow.com/">http://stackoverflow.com/</a></h4></div>
	<div class="row"><h4>Dreamstime:<a href="http://www.dreamstime.com/">http://www.dreamstime.com/</a></h4></div>
	<div class="row"><h4>Google Fonts:<a href="https://www.google.com/fonts">https://www.google.com/fonts</a></h4></div>	
</div>

<?php include(ROOT_PATH . 'inc/footer.php'); ?>