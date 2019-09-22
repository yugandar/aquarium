<?php
// Error Reporting Turn On
ini_set('error_reporting', E_ALL);

// Setting up the time zone
date_default_timezone_set('Asia/Kolkata');

// Host Name
$dbhost = 'localhost';

// Database Name
$dbname = 'aqcr_master';

// Database Username
$dbuser = 'root';

// Database Password
$dbpass = 'adminlawre';

// Defining base url
define("BASE_URL", "https://aquariumcraze.com/");

// Getting Admin url
define("ADMIN_URL", BASE_URL . "admin" . "/");

try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
	echo "Connection error :" . $exception->getMessage();
}
