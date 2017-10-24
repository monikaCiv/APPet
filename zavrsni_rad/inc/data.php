<?php

// check for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit('Sorry, this script does not run on a PHP version smaller than 5.3.7 !');
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once(ROOT_PATH . 'inc/phplogin/libraries/password_compatibility_library.php');
}
// include the config
require_once(ROOT_PATH .'inc/config.php');

// include the to-be-used language, english by default. feel free to translate your project and include something else
require_once(ROOT_PATH . 'inc/phplogin/translations/en.php');

// include the PHPMailer library
require_once(ROOT_PATH . 'inc/phplogin/libraries/PHPMailer.php');

// load the login class
require_once(ROOT_PATH . 'inc/phplogin/classes/Login.php');

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process.
$login = new Login();

?>

<?php

//funkcija koja daje sve ljubimce pojedinog korisnika
function get_pets() {

	require_once(ROOT_PATH . "inc/database.php");

	//tries to run a query
	try {
		$results = $db->query('SELECT * FROM pets_all WHERE pet_owner="' . $_SESSION['user_id'] . '" COLLATE utf8_bin');
	} catch (Exception $e) {
		echo "Pogreška!";
		exit;
	}
	$all_pets = $results ->fetchAll(PDO::FETCH_ASSOC);
	return $all_pets;
}

//daje informacije o pojedinom proizvodu
function get_pet_single($pet_id) {
	
	require(ROOT_PATH . "inc/database.php");
	
	try {
		$results = $db->prepare("SELECT pet_name, pet_age, pet_species, pet_gender, pet_id, pet_weight, pet_note FROM pets_all WHERE pet_id = ?");
		$results->bindParam(1,$pet_id);
        $results->execute();
	} catch (Exception $e) {
		echo "Fail!";
		exit;
	}
	$pet = $results->fetch(PDO::FETCH_ASSOC);
	
	if($pet === false) {
		return $pet;
	}
	
	return $pet;
}

function get_pets_count() {

	require(ROOT_PATH . "inc/database.php");

	try {
		$results = $db->query('SELECT COUNT(*) FROM pets_all WHERE pet_owner="' . $_SESSION['user_id'] . '" COLLATE utf8_bin');
	} catch (Exception $e) {
		echo "Fail!";
		exit;
	}
	$number = $results->fetchColumn(0); //želimo uzeti samo jedan row (nulti) s podatkom COUNT koji sadrži broj ljubimaca
	echo $number;
}

function get_ages($species) {

	require(ROOT_PATH . "inc/database.php");

	try {
		$results = $db->query('SELECT species_id, age FROM age WHERE species_id=' . $species);
	} catch (Exception $e) {
		echo "Fail!";
		exit;
	}
	$age = $results->fetchAll(PDO::FETCH_ASSOC); //želimo uzeti samo jedan row (nulti) s podatkom COUNT koji sadrži broj ljubimaca
	return $age;
}

function get_weights($species) {

	require(ROOT_PATH . "inc/database.php");

	try {
		$results = $db->query('SELECT species_id, weight FROM weight WHERE species_id=' . $species);
	} catch (Exception $e) {
		echo "Fail!";
		exit;
	}
	$weight = $results->fetchAll(PDO::FETCH_ASSOC); //želimo uzeti samo jedan row (nulti) s podatkom COUNT koji sadrži broj ljubimaca
	return $weight;
}





	


?>