<?php
$servername = "localhost";
$username = 'deb43619_milan';
$password = 'MlG199713';
$db = 'deb43619_milan';

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
} 

?>

