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
		<nav class="top-bar data-topbar">
			<ul class="title-area">
				<li class="name">
					<h1>
						<a href="<?php echo BASE_URL; ?>">APPet</a>	
					</h1>
				</li>
			</ul>
				
			<section class="top-bar-section">
				<ul class="right">
					<li <?php if($section=="about") { echo 'class="active"'; } ?>><a href="<?php echo BASE_URL; ?>about/">O nama</a></li>
					<li <?php if($section=="contact") { echo 'class="active"';} ?>><a href="<?php echo BASE_URL; ?>contact/">Kontakt</a></li>
				</ul>
			</section>
		</nav>
	</div>
	
	<!-- END TOP BAR -->
	
