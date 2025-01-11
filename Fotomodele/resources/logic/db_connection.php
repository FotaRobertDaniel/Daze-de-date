<?php
// db_connection.php

$servername = "localhost";
$username = "root";
$password = "";
$database = "fotica";
// $conn = new mysqli($servername, $username, $password, $database);

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check for any connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
