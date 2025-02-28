<?php

error_reporting(E_ALL); // Report all PHP errors
ini_set('display_errors', 1); // Display errors to the browser
ini_set('display_startup_errors', 1); // Display startup errors

session_start();
$host = "localhost";
$user = "root";
$password = "root";
$dbname = "employee_management";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

