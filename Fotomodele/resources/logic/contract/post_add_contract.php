<?php
// resources/logic/table_agency_add_submit.php

include('../../logic/db_connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$id_event = $_POST['id_event_add'];
$id_role = $_POST['id_role_add'];
$details = $_POST['details_add'];
$money = $_POST['money_add'];

// Basic validation (you can enhance this)
if (empty($id_event) || empty($id_role) || empty($details) || empty($money)) {
    echo "All fields are required!";
    exit();
}

// SQL insert query
$sql = "INSERT INTO contract (id_event, id_role, details, money) 
        VALUES ('$id_event', '$id_role', '$details', '$money')";

if ($conn->query($sql) === TRUE) {
    echo "The contract has been added successfully!";
} else {
    echo "Error adding contract: " . $conn->error;
}

$conn->close();
?>
