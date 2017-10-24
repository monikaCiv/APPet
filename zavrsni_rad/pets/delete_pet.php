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
$section = "logged";
$subsection = "pet";

$con = mysql_connect(DB_HOST,DB_USER,DB_PASS);
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db(DB_NAME, $con);

// sending query
mysql_query("DELETE FROM pets_all WHERE pet_id = '$pet_id'")
or die(mysql_error());      
	
include (ROOT_PATH . 'inc/check_log.php'); 

if ($login->isUserLoggedIn() == false) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    
	include (ROOT_PATH . "index.php");
	
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
	include(ROOT_PATH . "inc/header_in.php");
	

	
?>

<div class="row headline recommend">
	<nav class="breadcrumbs breadcrumbs2">
		<a href="<?php echo BASE_URL;?>pets/">Pets</a>
		<a href="#" class="current">Deleted</a>
	</nav>
</div>
		
<div class="row">
	<div class="large-6 columns">
		<img id="add_pet" src="<?php echo BASE_URL; ?>img/sad.jpg">
	</div>
		
	<div class="large-6 columns">
		<h4 class="added">Vaš ljubimac je uspješno uklonjen s popia. Za provjeru otiđite na stranicu<a href="<?php echo BASE_URL; ?>pets/"><?php echo (" "); ?>Moji ljubimci.</a></h4>
	</div>
</div>

<?php include(ROOT_PATH . 'inc/footer.php'); ?>
<?php } ?>