<?php
	
require_once ("../inc/config.php");
require_once (ROOT_PATH . "inc/data.php");
$pageTitle = "Izmjena";
$section = "edit";

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
	
	if (isset($_GET["id"])) {
		$pet_id = intval($_GET["id"]); //sanitazing input
		$pet  = get_pet_single($pet_id);
		$species = $pet['pet_species'];
		$ages=get_ages($species);
		$weights = get_weights($species);
		
	} 
	if (empty($pet)) {
		header("Location: " . BASE_URL . "pets/index.php");
		exit();
	} 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	   //HTMLPECIAL CHARS //////////////////////////////////////////// TO DO
		$pet_age = $_POST['age'];
		$pet_weight = $_POST['weight'];
		$pet_note = trim($_POST['pet_note']);
		
		if($pet_note=="" OR $pet_age=="" OR $pet_weight=="") {
			$error_msg = "Potrebno je popuniti sva polja!";
		} elseif (strlen($pet_note) > 255) {
			$error_msg= "Bilješka preduga!";
		}
		
		if (!isset($error_msg)) {
			foreach( $_POST as $value ){
				if( stripos($value,'Content-Type:') !== FALSE ){
					$error_msg = "Nažalost, došlo je do problema.";
				}
			}
		}	
		
		if (!isset($error_msg)) {
			$con = mysql_connect(DB_HOST,DB_USER,DB_PASS);
			if (!$con)
			{
			die('Could not connect: ' . mysql_error());
			}
			mysql_select_db(DB_NAME, $con);
			mysql_query("SET NAMES 'utf8'");

			// sending query
			mysql_query("UPDATE pets_all 
			SET pet_age = '$pet_age',pet_weight ='$pet_weight',pet_note='$pet_note' 
			WHERE pet_id='$pet_id'")
			or die(mysql_error());  
			
			header("Location: " . BASE_URL . "pets/" . $pet_id . "/");
		
		}
	}

	
?>


	<div class="row headline pets">
		<nav class="breadcrumbs breadcrumbs2">
			<a href="<?php echo BASE_URL; ?>pets/">Ljubimci</a>
			<a href="<?php echo BASE_URL . "pets/" . $pet_id . "/"; ?>" ><?php echo $pet["pet_name"]; ?></a>
			<a href="#" class="current">Izmjena</a>
		</nav>
	</div>
	
	<div class="row">
		<div class="large-6 columns">
			<img id="add_pet" class="added" src="<?php echo BASE_URL; ?>img/cdb1.jpg">
		</div>
			

		
		<div class="large-6 columns">
			<form name="f3" class="custom" action="<?php echo BASE_URL . "edit_pet/?id=" . $pet_id . "/";?>" method="post">
				<fieldset>
						<?php
							if(!isset($error_msg)) {
								echo '<legend class="field1">Podaci o ljubimcu</legend>';
							} else {
								echo '<legend class="field2">' . $error_msg . '</legend>';
							}
						?>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="label2" class="left inline">Ime</label>
						</div>
						<div class="large-8 columns">
							<p class="pet-details"><?php echo $pet["pet_name"]; ?></p>
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
							<label for="pet_age" class="left inline">Dob</label>
						</div>
						<div class="large-8 columns">
							<select name="age" id="pet_age" class="medium">
								<option value="">Odaberi dob</option>
								<?php 
								foreach($ages as $age) {
									echo '<option value="' . $age['age'] . '">' . $age['age'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>


					<div class="row">
						<div class="large-4 columns">
							<label for="pet_weight" class="left inline">Masa</label>
						</div>
						<div class="large-8 columns">
							<select name="weight" id="pet_weight" class="medium">
								<option>Odaberi skupinu</option>
								<?php 
								foreach($weights as $weight) {
									echo '<option value="' . $weight['weight'] . '">' . $weight['weight'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="notes" class="left inline">Bilješke</label>
						</div>
						<div class="large-8 columns">
							<textarea id="notes" name="pet_note" placeholder="<?php echo $pet['pet_note']; ?>"></textarea>
						</div>
					</div>
				</fieldset>
				
				<div class="row">
					<div class="large-12 columns">
						<input type="submit" name="f3" value="Spremi" class="button no10 radius right">
					</div>
				</div>
			</form>
		</div>
	</div>

<?php } ?>
<?php include(ROOT_PATH . 'inc/footer.php'); ?>
	