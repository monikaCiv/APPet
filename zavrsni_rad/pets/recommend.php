<?php
	
	require_once ("../inc/config.php");
	require_once (ROOT_PATH . "inc/data.php");
	
	if (isset($_GET["id"])) {
		$pet_id = intval($_GET["id"]);
		$pet  = get_pet_single($pet_id);
	} 
	if (empty($pet)) {
		header("Location: " . BASE_URL . "pets/");
		exit();
	} 
	$pageTitle = "Recommendation for " . $pet["pet_name"];
	$section = "logged";
	$subsection = "recomend";
?>
	<!-- HEADER -->
	
<?php 

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
	include(ROOT_PATH . "pets/get_recommend.php");
	


?>

<script>

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
    }
    return "";
}

function checkCookie() {
    var user = getCookie("med");
    if (user != "") {
   
    } else {
        var user = '<?php echo $pet['pet_name']; ?>_med';
        if (user != "" && user != null) {
            setCookie("med", user, 365);
			alert ("Ne zaboravite da je psa potrebno cijepiti jednom godišnje!");
        }
    }
}
	var species = '<?php echo $pet['pet_species']; ?>';
	if (species === "1") {
	window.onload = function() {return checkCookie();}
}
</script>
	
	<!-- END HEADER -->
	
	<!-- MAIN PART -->
	
	<!--
	<div class="row headline text-center">
		<h3>Take a look at what's best for your pet!</h3>
	</div>
	-->
	
<div class="row headline recommend">
	<nav class="breadcrumbs breadcrumbs2">
		<a href="<?php echo BASE_URL;?>pets/">Ljubimci</a>
		<a href="<?php echo BASE_URL . 'pets/' . $pet_id . '/'; ?>"><?php echo $pet["pet_name"]; ?></a>
		<a href="<?php echo BASE_URL . 'pets/recommend/' . $pet_id . '/'; ?>" class="current">preporuka</a>
	</nav>
</div>
		
	<div class="row">
			<div class="large-6 columns">
				<div class="text-center">
					<img src="<?php echo BASE_URL;?>img/activity.jpg"/>	
				</div>
				<fieldset>
					<legend class="field1">Aktivnosti</legend>
						
						<div class="row">
							<div class="large-4 columns">
								<label for="label2" class="left inline">Igra</label>
							</div>
							<div class="large-8 columns">
								<p class="pet-details"><?php echo $game; ?></p>
							</div>
						</div>
						
						<div class="row">
							<div class="large-4 columns">
								<label for="label2" class="left inline">Vani</label>
							</div>
							<div class="large-8 columns">
								<p class="pet-details"><?php echo $outside; ?></p>
							</div>
						</div>	
					</fieldset>
			</div>
			<div class="large-6 columns">
				<div class="text-center">
					<img src="<?php echo BASE_URL;?>img/food.jpg"/>	
				</div>
				<fieldset>
					<legend class="field1">Prehrana</legend>
						<div class="row">
							<div class="large-4 columns">
								<label for="label2" class="left inline">Dnevno</label>
							</div>
							<div class="large-8 columns">
									<p class="pet-details"><?php echo $daily;?></p>
							</div>
						</div>
						
						<div class="row">
							<div class="large-4 columns">
								<label for="label2" class="left inline">Namirnice</label>
							</div>
							<div class="large-8 columns">
								<p class="pet-details"><?php echo $food;?></p>
							</div>
						</div>
						
						<div class="row">
							<div class="large-4 columns">
								<label for="label2" class="left inline">Savjeti</label>
							</div>
							<div class="large-8 columns">
								<p class="pet-details"><?php echo $tip;?></p>
							</div>
						</div>

						
					</fieldset>
			</div>
	</div>

	<!-- END MAIN PART -->
	
	<!-- FOOTER -->
	

	<?php } ?>
	<?php include(ROOT_PATH . 'inc/footer.php'); ?>
	  
	<!-- END FOOTER -->