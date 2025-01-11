<?php
// resources/logic/table_agency_add_submit.php

include('../../logic/db_connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name = $_POST['name_add'];
$description = $_POST['description_add'];

// Basic validation (you can enhance this)
if (empty($name) || empty($description)) {
    echo "All fields are required!";
    exit();
}

// SQL insert query
$sql = "INSERT INTO category (name, description) 
        VALUES ('$name', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "The category has been added successfully!";
} else {
    echo "Error adding category: " . $conn->error;
}

$conn->close();
?>
