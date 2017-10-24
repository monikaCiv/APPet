<?php

require_once ("../inc/config.php");
require_once (ROOT_PATH . "inc/data.php");

// check for minimum PHP version

$pageTitle = "Izmjena korisničkih podataka"; 
$section = "profile";

include (ROOT_PATH . 'inc/check_log.php'); 

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == false) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
	include(ROOT_PATH . "inc/header_out.php");
	include(ROOT_PATH . "inc/phplogin/views/forbidden.php");	
	
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
	include(ROOT_PATH . "inc/header_in.php");
	

?>

<?php 

//Originalne funkcije za promjenu e-maila i lozinke nalaze se u folderu phplogin/classes/Login, međutim, nisu korištene one
// direktno, već su zbog potreba aplikacije modificirane u kod ispod 

//Promjena korisničke e-mail adrese

if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['email_submit'])) {           
	$email = substr(trim($_POST['edit_email']), 0, 64);
	if($email == "") {
		$error_msg = "Niste ispunili potrebno polje.";
	}
	if(!isset($error_msg) AND $email == $_SESSION['user_email']) {
		$error_msg = "E-mail ne može biti isti kao postojeći!";
	}	
	if (!isset($error_msg) AND (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))) {
		$error_msg = "Unijeli ste nevažeći E-mail!";
	}
	if(!isset($error_msg)) {
	
		require(ROOT_PATH . "inc/database.php");

		$query_user = $db->prepare('SELECT * FROM users WHERE user_email = :user_email COLLATE utf8_bin');
		$query_user->bindValue(':user_email', $email, PDO::PARAM_STR);
        $query_user->execute();
        // get result row (as an object)
        $result_row = $query_user->fetchObject();

        // if this email exists
        if (isset($result_row->user_id)) {
            $error_msg = "Ovaj E-mail je zauzet.";
        } 
	}
	if (!isset($error_msg)) {
		
		require(ROOT_PATH . "inc/database.php");

		$query_edit_email = $db->prepare('UPDATE users SET user_email = :user_email WHERE user_id = :user_id');
		$query_edit_email->bindValue(':user_email', $email, PDO::PARAM_STR);
		$query_edit_email->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
		$query_edit_email->execute();

		if ($query_edit_email->rowCount()) {
			$_SESSION['user_email'] = $email;
			$msg = "Uspješna promjena E-mail adrese u: " . $email;
		} else {
			$error_msg = "Promjena nije uspjela!";
		}
	}
}

//Funkcija za dobivanje podataka o korisniku iz baze, korištena za dobivanje kodirane lozinke 
  
function getData($user_name)
{
	require(ROOT_PATH . "inc/database.php");
    
	$query_pass = $db->prepare('SELECT * FROM users WHERE user_name = :user_name COLLATE utf8_bin');
	$query_pass->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    $query_pass->execute();
    
	return $query_pass->fetchObject();
}


//Promjena korisničke lozinke

if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['pass_submit'])) {           
	$old = $_POST['pass_old'];
	$new = $_POST['pass_new'];
	$repeat = $_POST['pass_repeat'];
	if($old=="" OR $new=="" OR $repeat=="") {
		$error_msg = "Potrebno je popuniti sva polja!";
	}elseif ($new !== $repeat) {
		$error_msg = "Potvrda nove lozinke nije valjana!";
	}elseif (strlen($new)<6) {
		$error_msg = "Lozinka mora sadržavati 6 ili više znakova.";
	} 
	if(!isset($error_msg)) {
		$result = getData($_SESSION['user_name']);
		if(isset($result->user_password_hash)) {
			if (!password_verify($old, $result->user_password_hash)) {
				$error_msg = "Pogrešno ste upisali staru lozinku.";
			} else {
				
				$hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);  
				$user_password_hash = password_hash($new, PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));
				
				require(ROOT_PATH . "inc/database.php");
				
				$query_update = $db->prepare('UPDATE users SET user_password_hash = :user_password_hash WHERE user_id = :user_id');
				$query_update->bindValue(':user_password_hash', $user_password_hash, PDO::PARAM_STR);
                $query_update->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
				$query_update->execute();
				
				if ($query_update->rowCount()) {
                    $msg = "Uspješno ste promijenili staru lozinku. Sljedeći put se prijavite s novom.";
                } else {
                    $error_msg = "Neuspjela promjena lozinke.";
                }
			}
		}
	}
	
}
?>



<div class="row added">
	<h2>Ovdje možete izmijeniti svoje podatke.</h2>
</div>

<div class="row">
	<fieldset>
	<legend class="field1">
	<?php						
		if(!isset($error_msg) AND !isset($msg)) {
			echo '<legend class="field1">Podaci o ' . $_SESSION['user_name'] . '</legend>';
		} elseif (isset($msg)) {
			echo '<legend class="field1">' . $msg . '</legend>';
		}else {
			echo '<legend class="field2">' . $error_msg . '</legend>';
		}
	?>
	</legend>
		
		<div class="large-6 columns">
		<!-- edit form for user email / this form uses HTML5 attributes, like "required" and type="email" -->
			<form method="post" action="<?php echo BASE_URL . "profile/edit.php";?>">
				<div class="large-3 columns"> 
					<label for="email">E-mail</label>
				</div>
				<div class="large-9 columns">
					<input id="email" type="email" name="edit_email" placeholder="<?php echo $_SESSION['user_email']; ?>"/> 
				</div>
				<div class="row">
					<input type="submit" name="email_submit" value="Promijeni" class="button small radius no5 push-9" />
				</div>
			</form>	
		</div>

		<div class="large-6 columns">
			<form method="post" action="edit.php">
				<div class="large-4 columns"> 
					<label for="old">Trenutna lozinka</label>
				</div>
				<div class="large-8 columns">
					<input id="old" type="password" name="pass_old" autocomplete="off" />
				</div>
				<div class="large-4 columns">
					<label for="new">Nova lozinka</label>
				</div>
				<div class="large-8 columns">	
					<input id="new" type="password" name="pass_new" autocomplete="off" />
				</div>
				<div class="large-4 columns">
					<label for="repeat">Potvrdi lozinku</label>
				</div>	
				<div class="large-8 columns">
					<input id="repeat" type="password" name="pass_repeat" autocomplete="off" />
				</div>
				<div class="row">
					<input type="submit"  name="pass_submit" value="Promijeni" class="button small radius no5 push-9" />
				</div>
			</form>
		</div>
	
	</fieldset>
</div>

<?php } ?>
<?php include(ROOT_PATH . 'inc/footer.php'); ?>

