<?php
// resources/logic/table_agency_add_submit.php

include('../../logic/db_connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name = $_POST['name_add'];
$address = $_POST['address_add'];
$phone = $_POST['phone_add'];
$email = $_POST['email_add'];

// Basic validation (you can enhance this)
if (empty($name) || empty($address) || empty($phone) || empty($email)) {
    echo "All fields are required!";
    exit();
}

// SQL insert query
$sql = "INSERT INTO agency (name, address, phone, email) 
        VALUES ('$name', '$address', '$phone', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "The agency has been added successfully!";
} else {
    echo "Error adding agency: " . $conn->error;
}

$conn->close();
?>
