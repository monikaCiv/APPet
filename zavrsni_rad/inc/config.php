<?php

//bez zatvaranja da ne stvara white space
//najbolje za nešto stalno definirati konstantu

define("BASE_URL","/zavrsni_rad/");
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/zavrsni_rad/" );
	

	
define("DB_HOST", "localhost");
define("DB_NAME","login");
define("DB_PORT","3306");
define("DB_USER", "root"); 
define("DB_PASS", "turbodeva06"); 



define("COOKIE_RUNTIME", 1209600);
define("COOKIE_DOMAIN", ".127.0.0.1");
define("COOKIE_SECRET_KEY", "1gp@TRPS{+$19oppMJFe-82s");


define("EMAIL_USE_SMTP", false);
define("EMAIL_SMTP_HOST", "yourhost");
define("EMAIL_SMTP_AUTH", true);
define("EMAIL_SMTP_USERNAME", "yourusername");
define("EMAIL_SMTP_PASSWORD", "yourpassword");
define("EMAIL_SMTP_PORT", 465);
define("EMAIL_SMTP_ENCRYPTION", "ssl");


define("EMAIL_PASSWORDRESET_URL", "http://127.0.0.1/zavrsni_rad/password_reset/");
define("EMAIL_PASSWORDRESET_FROM", "no-reply@example.com");
define("EMAIL_PASSWORDRESET_FROM_NAME", "APPet");
define("EMAIL_PASSWORDRESET_SUBJECT", "Promjena lozinke");
define("EMAIL_PASSWORDRESET_CONTENT", "Kliknite na link za promjenu lozinke:");


define("EMAIL_VERIFICATION_URL", "http://127.0.0.1/zavrsni_rad/signup/index.php");
define("EMAIL_VERIFICATION_FROM", "no-reply@example.com");
define("EMAIL_VERIFICATION_FROM_NAME", "APPet");
define("EMAIL_VERIFICATION_SUBJECT", "Aktivacija prijave");
define("EMAIL_VERIFICATION_CONTENT", "Kliknite na link za aktivaciju:");


define("HASH_COST_FACTOR", "10");
