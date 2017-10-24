<?php 

if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            $error_msg =  $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            $msg = $message;
        }
    }
}

?>

<?php if ($login->passwordResetLinkIsValid() == true) { ?>

<div class="row added">
	<h3>Zaboravili ste lozinku? Nema problema!</h3>
</div>

<div class="row">
	<div class="large-6 columns">
		<form method="post" action="<?php echo BASE_URL; ?>password_reset/" name="new_password_form">
			<fieldset>
				<?php
				if(!isset($error_msg) AND !isset($msg)) {
					echo '<legend class="field1">Zahtjev</legend>';
				} elseif (isset($msg)) {
					echo '<legend class="field1">' . $msg . '</legend>';
				} else {
					echo '<legend class="field2">' . $error_msg . '</legend>';
				}
				?>
				<input type='hidden' name='user_name' value='<?php echo $_GET['user_name']; ?>' />
				<input type='hidden' name='user_password_reset_hash' value='<?php echo $_GET['verification_code']; ?>' />

				<label for="user_password_new"><?php echo "Nova lozinka" ?></label>
				<input id="user_password_new" type="password" name="user_password_new" autocomplete="off" />

				<label for="user_password_repeat"><?php echo  "Potvrdi lozinku"; ?></label>
				<input id="user_password_repeat" type="password" name="user_password_repeat" autocomplete="off" />
				<input type="submit" name="submit_new_password" class="button no5 radius" value="<?php echo "Spremi lozinku"; ?>" />
			</fieldset>
		</form>
	</div>
	
	<div class="large-5 columns">
		<img src="<?php echo BASE_URL; ?>img/k1.jpg">
	</div>
</div>
	<!-- no data from a password-reset-mail has been provided, so we simply show the request-a-password-reset form -->
	<?php } else { ?>
	
<div class="row added">
	<h3>Zaboravili ste lozinku? Nema problema!</h3>
</div>
	
<div class="row">
	<div class="large-7 columns headline">
	<form method="post" action="<?php echo BASE_URL; ?>password_reset/" name="password_reset_form">
		<fieldset>
				<?php
				if(!isset($error_msg) AND !isset($msg)) {
					echo '<legend class="field1">Zahtjev</legend>';
				} elseif (isset($msg)) {
					echo '<legend class="field1">' . $msg . '</legend>';
				} else {
					echo '<legend class="field2">' . $error_msg . '</legend>';
				}
				?>
			<label for="user_name"><?php echo "Unesite korisničko ime i mi ćemo vam na e-mail adresu poslati kod za resetiranje lozinke."; ?></label>
			<input id="user_name" type="text" name="user_name" />
			<input type="submit" name="request_password_reset" class="button no5 radius" value="<?php echo "Pošalji zahtjev"; ?>" />
		</fieldset>
	</form>
	</div>
	
	<div class="large-5 columns">
		<img src="<?php echo BASE_URL; ?>img/k1.jpg">
	</div>
	
</div>
	<?php } ?>



<?php include(ROOT_PATH . 'inc/footer.php'); ?>
