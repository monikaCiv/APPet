<?php
	
require_once ("../inc/config.php");
require_once (ROOT_PATH . "inc/data.php");
	
if (isset($_GET["id"])) {
	$pet_id = intval($_GET["id"]); //sanitazing input
	$pet  = get_pet_single($pet_id);
} 
if (empty($pet)) {
	header("Location: " . BASE_URL . "pets/");
	exit();
} 

$pageTitle = $pet["pet_name"];
$section = "pet";

?>


	<!-- HEADER -->
	
<?php include (ROOT_PATH . 'inc/check_log.php'); 

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
	
	<!-- BANNER -->
	
	<div class="row headline pets">
		<nav class="breadcrumbs breadcrumbs2">
			<a href="<?php echo BASE_URL;?>pets/">ljubimci</a>
			<a class="current" href="#"><?php echo htmlspecialchars($pet['pet_name']); ?></a>
			<!-- <a class="current" href="">Recomandation</a> -->
		</nav>
	</div>
	
	<div class="row">
		<div class="large-6 columns">
			<img id="add_pet" src="<?php echo BASE_URL; ?>img/cdb1.jpg">
		</div>
		
		<div class="large-6 columns">
			<form class="custom">
				<fieldset>
					<legend class="field1">Podaci o ljubimcu</legend>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="label2" class="left inline">Ime</label>
						</div>
						<div class="large-8 columns">
							<p class="pet-details"><?php echo htmlspecialchars($pet["pet_name"]); ?></p>
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="label2" class="left inline">Spol</label>
						</div>
						<div class="large-8 columns">
							<p class="pet-details"><?php if ($pet["pet_gender"]=="F") echo "Ž"; else echo "M"; ?></p>
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="label2" class="left inline">Vrsta</label>
						</div>
						<div class="large-8 columns">
							<p class="pet-details"><?php if ($pet["pet_species"] == 1) echo "Pas"; else if ($pet["pet_species"] == 2) echo "Mačka"; else echo "Glodavac"; ?></p>
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="label2" class="left inline">Dob</label>
						</div>
						<div class="large-8 columns">
							<p class="pet-details"><?php echo $pet["pet_age"]; ?></p>
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="label2" class="left inline">Masa</label>
						</div>
						<div class="large-8 columns">
							<p class="pet-details"><?php echo $pet["pet_weight"]; ?></p>
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="label2" class="left inline">Bilješke</label>
						</div>
						<div class="large-8 columns">
							<p class="pet-details"><?php echo htmlspecialchars($pet["pet_note"]); ?></p> <!-- TO DO http://www.mediacollege.com/internet/javascript/form/limit-characters.html limit input -->
						</div>
					</div>
				</fieldset>
				
				
				<div class="row">
					
						<ul class="button-group pet-det radius right">
							<li><a href="<?php echo BASE_URL . 'pets/recommend/' . $pet_id . '/'; ?>" class="button">Preporuke</a></li>
							<li><a href="<?php echo BASE_URL . 'edit_pet/?id=' . $pet_id . '/';?>" class="button no10"><i class="fi-pencil"></i>Izmjena</a></li>
						</ul>
					
				</div>
			</form>
		</div>
	</div>
	
	<!-- END BANNER -->
	
<script>
//funkcija za postavljanje kolačića
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*12*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}
//funkcija za dobivanje kolačića
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
//funkcija za provjeru kolačića
function checkCookie() {
    var user = getCookie("username");
    if (user != "") {
   
    } else {
        var user = '<?php echo $pet['pet_name']; ?>'
        if (user != "" && user != null) {
            setCookie("username", user, 1);
			alert ("Ne zaboravite danas nahraniti " + user + " prema APPet preporukama!");
        }
    }
}
window.onload = function() {return checkCookie();}
</script>	
	
	<!-- FOOTER -->
	
<?php } ?>
<?php include(ROOT_PATH . 'inc/footer.php'); ?>
	<!-- END FOOTER -->

</body>