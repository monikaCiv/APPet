<?php 
//učitavanje konfiguracijskog dokumenta
require_once("../inc/config.php");

//provjera je li forma predana, je li zatražen POST, ako je obrađeni su podaci iz forme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if ($name == "" OR $email == "" OR $message == "") {
        $error_message = "Potrebno je ispuniti sva polja!";
    }

    if (!isset($error_message)) {
        foreach( $_POST as $value ){
            if( stripos($value,'Content-Type:') !== FALSE ){
                $error_message = "Došlo je do problema s informacijama koje ste unijeli.";
            }
        }
    }

    if (!isset($error_message) && $_POST["address"] != "") {
        $error_message = "Došlo je do pogreške.";
    }
	
	if (!isset($error_message)) {
	require_once(ROOT_PATH . "inc/phpmailer/class.phpmailer.php");
	$mail = new Mailer();
	}

    if (!isset($error_message) && !$mail->ValidateAddress($email)){
        $error_message = "Molimo unesite važeću e-mail adresu.";
    }

    if (!isset($error_message)) {
        $email_body = "";
        $email_body = $email_body . "Name: " . $name . "<br>";
        $email_body = $email_body . "Email: " . $email . "<br>";
        $email_body = $email_body . "Message: " . $message;

        $mail->SetFrom($email, $name);
        $address = "monika.civic@hotmail.com";  
        $mail->AddAddress($address, "APPet");
        $mail->Subject    = "APPet upit korisnika | " . $name;
        $mail->MsgHTML($email_body); 

        if($mail->Send()) {
            header("Location: " . BASE_URL . "contact/?status=thanks");
            exit;
        } else {
          $error_message = "Problem prilikom slanja: " . $mail->ErrorInfo;
        }

    }
}
		
		//header je dio http protokola - služi da submission ne bude
		//dio povijesti u browseru, preusmjerava na novu stranicu, da
		//kad idemo na back preskoči process, već ode samo natrag i da
		//ne bi 2 puta slao mejlove ili naplatio nešto npr.


?>

<?php
$pageTitle = "Kontakt!";
$section = "contact";
?>

<?php

//provjera je li korisnik prijavljen u sustav
include(ROOT_PATH . 'inc/check_log.php'); 

if ($login->isUserLoggedIn() == false) {   
	include(ROOT_PATH . "inc/header_out.php");
	//ako korisnik nije prijavljen otvara se header za neprijavljene korisnike

} else {
	include(ROOT_PATH . "inc/header_in.php");
	//ako je korisnik prijavljen otvara se header za prijavljene korisnike
}

?>
	
<div class="headline">
	<div class="row">
		<div class="text-center">
			<img id="contact" src="<?php echo BASE_URL;?>img/contact.jpg"/>	
		</div>
	</div>
</div>
	
<?php if (isset($_GET["status"]) AND  $_GET["status"]== "thanks") { //provjerava postoji GET i je li ''thanks''?> 
		<div class="row headline text-center">
			<h4>Poruka je poslana. Hvala!</h4>
		</div>
<?php } else { ?>

		<div class="row">
			
			<div class="large-6 small-10 columns push-3">
				<form method="post" action= "<?php echo BASE_URL; ?>contact/">
					<fieldset>
						<?php
							if(!isset($error_message)) {
								echo '<legend class="field1">Slobodno nam se javite!</legend>';
							} else {
								echo '<legend class="field2">' . $error_message . '</legend>';
							}
						?>
						<div class="row">
							<div class="large-3 columns">
									<label for="name" class="left-inline">Ime</label>
							</div>
							<div class="large-9 columns">
								<input type="text" id="name" name="name" value="<?php if(isset($name)){ echo htmlspecialchars($name); } ?>"/>	
							</div>
						</div>
						
						<div class="row">
							<div class="large-3 columns">
									<label for="email" class="left-inline">E-mail</label>
							</div>
							<div class="large-9 columns">
								<input type="text" id="email" name="email" value = "<?php if(isset($email)){ echo htmlspecialchars($email); } ?>"/>	
							</div>
						</div>
						
						<div class="row">
							<div class="large-3 columns">
								<label for="message" class="left-inline">Poruka</label>
							</div>
							<div class="large-9 columns">
									<textarea id="message" name="message"> <?php if (isset($message)) {echo htmlspecialchars($message);} ?></textarea>	
							</div>
						</div>
						
						<!-- ZAŠTITA OD ROBOTA nevidljivim poljem i za svaki slučaj ostavljena poruka--> 
						<div class="row hide">
							<div class="large-3 columns">
								<label for="address" class="left-inline">Address</label>
							</div>
							<div class="large-9 columns">
									<textarea placeholder="Ostaviti prazno!" id="address" name="address"></textarea>	
							</div>
						</div>
						<!-- KRAJ ZAŠTITE-->
						
					</fieldset>
					<div class="row">
						<div class="text-center">
							<!-- <a href="#" class="button no5 radius">Send</a> -->
							<input type="submit" value="Pošalji" class="button no5 radius">
						</div>
					</div>	
				</form>
			</div>
		</div>
<?php } //o ovom if bloku ovisi hoće li biti prikazana normalna forma ili zahvala?> 		
<?php include(ROOT_PATH . 'inc/footer.php'); ?>
