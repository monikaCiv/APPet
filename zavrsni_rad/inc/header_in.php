<!-- IZGLED ZAGLAVLJA za korisnike koji su prijavljeni -->

<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo $pageTitle;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!-- CROATIAN -->
    <link href="<?php echo BASE_URL;?>css/normalize.css" rel="stylesheet" media="screen">
    <link href="<?php echo BASE_URL;?>css/foundation.css" rel="stylesheet" media="screen">
    <link href="<?php echo BASE_URL;?>css/foundation-icons.css"  rel="stylesheet" media="screen">
    <link href="<?php echo BASE_URL;?>css/my-styles.css" rel="stylesheet" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'> <!-- CROATIAN -->
	
</head>
<body>


	<!-- TOP BAR -->
	
	<div class="contain-to-grid fixed">    
		<nav class="top-bar">
			<ul class="title-area">
			  <li class="name">
				<h1>
				  <a href="<?php echo BASE_URL; ?>pets/">APPet</a>
				</h1>
			  </li>
			  <li class="toggle-topbar menu-icon">
				<a href="#">
					<span></span>
				</a>
			  </li>
			</ul>
			<section class="top-bar-section">
			  <ul class="right">
				<li <?php if( $section=="profile" ) { echo 'class="active"'; } ?>><a href="<?php echo BASE_URL; ?>profile/"><?php echo $_SESSION['user_name'] . "<br />";?></a></li>
				<li><a href="<?php echo BASE_URL; ?>login/index.php?logout">Odjava</a></li>
			  </ul>
			</section>
		</nav>
	</div>
	
	<!-- END TOP BAR -->
