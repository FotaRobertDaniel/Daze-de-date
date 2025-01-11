<?php
// Include the database connection file
include('../db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data
    $contract_id = $_POST['contract_id'];
    $event_id = $_POST['event_id'];
    $role_id = $_POST['role_id'];
    $details = $_POST['details'];
    $money = $_POST['money'];

    // Prepare the SQL query to update the contract
    $sql = "UPDATE contract SET 
                id_event = '$event_id', 
                id_role = '$role_id', 
                details = '$details', 
                money = '$money' 
            WHERE id = '$contract_id'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Contract updated successfully";
    } else {
        echo "Error updating contract: " . mysqli_error($conn);
    }
}
?>
