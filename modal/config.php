<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set("display_errors", 1);
$host = "localhost";
$user = "root";
$password = "";
$dbname = "php_project";
$dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
$pdo = new PDO($dsn, $user, $password);

?>