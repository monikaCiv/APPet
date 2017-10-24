
<!-- HEADER -->

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

<?php include(ROOT_PATH . 'inc/header_out.php'); ?>

<!-- END HEADER -->

<div class="headline row text-center">	
		<img src="<?php echo BASE_URL; ?>img/dc5.jpg" id="login"/>		
	</div>
	
	<div class="row">
		<div class="large-6 columns push-3">
			<form method="post" action="<?php echo BASE_URL; ?>login/" name="loginform">
				<fieldset>
					<?php
						if(!isset($error_msg) AND !isset($msg)) {
							echo '<legend class="field1">Prijava na APPet</legend>';
						} elseif (isset($msg)) {
							echo '<legend class="field1">' . $msg . '</legend>';
						}else {
							echo '<legend class="field2">' . $error_msg . '</legend>';
						}
					?>
					<div class="row">
						<div class="large-3 columns">
							<label for="user_name" class="left-inline">APPet ime</label>
						</div>
						<div class="large-9 columns">
							<input id="user_name" type="text" name="user_name"/>
						</div>
					</div>
					
					<div class="row">
						<div class="large-3 columns">
							<label for="user_password" class="left-inline">Lozinka</label>
						</div>
						<div class="large-9 columns">
							<input id="user_password" type="password" name="user_password" autocomplete="off"/>	
						</div>
					</div>
					
					<div class="row hide">
						<input type="checkbox" id="user_rememberme" name="user_rememberme" value="1" />
						<label for="user_rememberme"><?php echo WORDING_REMEMBER_ME; ?></label>
					</div>
				</fieldset>
				
				<div class="row pull-3">	
					<a href="<?php echo BASE_URL; ?>password_reset/" class="pass">Zaboravili ste lozinku?</a>	
				</div>
				
				<div class="row">
					<div class="text-center">
						<input type="submit" name="login" value="Prijava" class="button no5 radius">
					</div>
				</div>
			</form>
		</div>
	</div>
	
<?php include(ROOT_PATH . 'inc/footer.php'); ?>
