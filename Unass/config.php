<?php
try {
	$host = "localhost" ;
	$dbname = "unass" ;
	$user = "root";
	$pass = "";
	$bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} 
catch (Exception $e) {
	die($e->getMessage());
}
?>