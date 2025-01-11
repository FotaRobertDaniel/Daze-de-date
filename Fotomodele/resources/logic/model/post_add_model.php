<?php
// resources/logic/table_agency_add_submit.php

include('../../logic/db_connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name = $_POST['name_add'];
$surname = $_POST['surname_add'];
$agency = $_POST['agency_add'];
$dob = $_POST['dob_add'];
$address = $_POST['address_add'];
$email = $_POST['email_add'];
$phone = $_POST['phone_add'];


// Basic validation (you can enhance this)
if (empty($name) || empty($surname) || empty($agency) || empty($dob) || empty($address) || empty($email) || empty($phone)) {
    echo "All fields are required!";
    exit();
}

// SQL insert query
$sql = "INSERT INTO model (name, surname, agency, date_of_birth, address, email, phone) 
        VALUES ('$name', '$surname', '$agency', '$dob', '$address', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "The model has been added successfully!";
} else {
    echo "Error adding model: " . $conn->error;
}

$conn->close();
?>
