<?php
// resources/logic/table_agency_add_submit.php

include('../../logic/db_connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$id_category = $_POST['id_category_add'];
$name = $_POST['name_add'];
$date = $_POST['date_add'];
$address = $_POST['address_add'];
$description = $_POST['description_add'];

// Basic validation (you can enhance this)
if (empty($id_category) || empty($name) || empty($date) || empty($address) || empty($description)) {
    echo "All fields are required!";
    exit();
}

// SQL insert query
$sql = "INSERT INTO event (id_category, name, date, address, description) 
        VALUES ('$id_category', '$name', '$date', '$address', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "The event has been added successfully!";
} else {
    echo "Error adding event: " . $conn->error;
}

$conn->close();
?>
