<?php
// File: config/database.php

$host = "localhost";
$user = "root";
$password = "12345";
$database = "electricalshopdb";
$port = 3308;

// Create Connection
$conn = mysqli_connect($host, $user, $password, $database, $port);

// Check Connection
If (!$conn) {
    Die("Database Connection Failed: " . mysqli_connect_error());
}
?>
