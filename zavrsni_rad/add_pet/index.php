<?php 
//TO DO -- OGRANIČITI UNOS za zabilješke i ime!!!
require_once("../inc/config.php");
$pageTitle = "Vaš ljubimac Pet";
$section = "add";

include(ROOT_PATH . 'inc/check_log.php');

if ($login->isUserLoggedIn() == false) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    
	include(ROOT_PATH . "inc/header_out.php");
	include (ROOT_PATH . "index.php");
	
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
	include(ROOT_PATH . "inc/header_in.php");
 

$con = mysql_connect('localhost', 'root', 'turbodeva06'); 
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('login');
$query="SELECT * FROM species";
$result=mysql_query($query);
?>


<script language="javascript" type="text/javascript">
function getXMLHTTP() { 
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getAge(speciesId) {		
		
		var strURL="add_pet.php?species="+speciesId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('pet_age').innerHTML=req.responseText;
					
					} else {
						alert("Problem sa XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	
	function getWeight(speciesId) {		
		
		var strURL="add_pet2.php?species="+speciesId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('pet_weight').innerHTML=req.responseText;
					
					} else {
						alert("Problem sa XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	

</script>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$pet_name = trim($_POST['pet_name']);
	$pet_gender = $_POST['pet_gender'];
	$pet_species = $_POST['species'];   
	$pet_age = $_POST['age'];
	$pet_weight = $_POST['weight'];
	$pet_note = trim($_POST['pet_note']);
	$pet_owner = $_SESSION['user_id'];
	
	if($pet_name == "" OR $pet_note=="" OR $pet_gender=="" OR $pet_species=="" OR $pet_age=="" OR $pet_weight=="") {
		$error_msg = "Potrebno je popuniti sva polja!";
	} elseif (strlen($pet_name) > 50) {
		$error_msg = "Predugo ime (max 50 znakova).";
	} elseif (strlen($pet_note) > 255) {
		$error_msg = "Preduga bilješka (max 255 znakova).";
	}
	
	//ograniči duljinu imena ljubimca i bilješki!!
	
	if (!isset($error_msg)) {
        foreach( $_POST as $value ){
            if( stripos($value,'Content-Type:') !== FALSE ){
                $error_msg = "Nažalost, došlo je do pogreške.";
            }
        }
    }	
	
	if (!isset($error_msg)) {
		try {
			mysql_connect(DB_HOST,DB_USER,DB_PASS); 
			mysql_select_db(DB_NAME);
			mysql_query("SET NAMES 'utf8'");
		} 	catch (Exception $e) {
			echo "Fail!";
			exit;
		}
		$order = "INSERT INTO pets_all 
		(pet_name,pet_gender,pet_species,pet_age,pet_weight,pet_note,pet_owner) 
		values ('$pet_name', '$pet_gender', '$pet_species','$pet_age', '$pet_weight', '$pet_note', '$pet_owner')"; 
		$result = mysql_query($order);
		
		header("Location: " . BASE_URL . "add_pet/?status=added");
	}
}
	
?>

	<!-- BANNER -->
	
	<div class="row headline pets">
		<nav class="breadcrumbs breadcrumbs2">
			<a href="<?php echo BASE_URL; ?>pets/">Ljubimci</a>
			<a class="current" href="#">Dodaj ljubimca</a>
		</nav>
	</div>
	
	<div class="row">
		<div class="large-6 columns">
			<img id="add_pet" class="added" src="<?php echo BASE_URL; ?>img/cdb1.jpg">
		</div>
		
		<?php if (isset($_GET["status"]) AND  $_GET["status"]== "added") { ?> <!-- provjeri prvo postoji li gett, a onda je li added-->
		<div class="large-6 columns">
			<h4 class="added">Novi ljubimac je uspješno dodan! Otiđite na stranicu <a href="<?php echo BASE_URL; ?>pets/">Moji ljubimci</a> za provjeru. </h4>
		</div>
		<?php } else { ?>
		
		<div class="large-6 columns">
			<form name="f1" class="custom" action="<?php echo BASE_URL; ?>add_pet/index.php" method="post">
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
							<label for="name" class="left inline">Ime</label>
						</div>
						<div class="large-8 columns">
							<input type="text" id="name" name="pet_name" />
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
							<label class="radio2">Spol</label>
						</div>
						<div class="large-2 columns">
							<label for="female">M</label>
						</div>
						<div class="large-2 columns pull-1">
							<input name="pet_gender" type="radio" id="female" value="M" checked="checked">
						</div>
						<div class="large-2 columns">
							<label for="male">Ž</label>
						</div>
						<div class="large-2 columns pull-1">
							<input name="pet_gender" type="radio" id="male" value="F">
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="pet_species" class="left inline">Vrsta</label>
						</div>
						<div class="large-8 columns">
							<select name="species" onChange="getAge(this.value);getWeight(this.value);" id="pet_species" class="medium">
								<option value="">Odaberi vrstu</option>
								<?php while ($row=mysql_fetch_array($result)) { ?>
								<option value=<?php echo $row['species_id']?>><?php echo $row['species']?></option>
								<?php } ?>
								</select>
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="pet_age" class="left inline">Dob</label>
						</div>
						<div class="large-8 columns">
							<select name="age" id="pet_age" class="medium">
								<option>Odaberi dob</option>
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
							</select>
						</div>
					</div>
					
					<div class="row">
						<div class="large-4 columns">
							<label for="notes" class="left inline">Bilješke</label>
						</div>
						<div class="large-8 columns">
							<textarea id="notes" name="pet_note" placeholder="Dodatni podaci o ljubimcu."></textarea>
						</div>
					</div>
				</fieldset>
				
				<div class="row">
					<div class="large-12 columns">
						<input type="submit" name="add_pet" value="Dodaj" class="button no10 radius right">
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php } ?>
	
	<!-- END BANNER -->
	

	<!-- FOOTER -->
	
<?php include(ROOT_PATH . 'inc/footer.php'); ?>
<?php } ?>
	  
	<!-- END FOOTER -->

</body>