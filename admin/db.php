<?php
if (!defined('db-auth')) {
	header("HTTP/1.0 404 Not Found");
}

$servername = "localhost";
$username = "codelear_main";
$password = "4Dyr92ieAO;X]5";
$dbname = "codelear_main";
$options = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
];
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);
}catch(PDOException $e) {echo $e->getMessage();}
?>