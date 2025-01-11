<?php
// Include the database connection
include('../db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data
    $agency_id = $_POST['agency_id'];
    $agency_name = $_POST['agency_name'];
    $agency_address = $_POST['agency_address'];
    $agency_phone = $_POST['agency_phone'];
    $agency_email = $_POST['agency_email'];

    // Prepare the SQL query to update the agency
    $sql = "UPDATE agency SET 
                name = '$agency_name', 
                address = '$agency_address', 
                phone = '$agency_phone', 
                email = '$agency_email' 
            WHERE id = '$agency_id'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Agency updated successfully";
    } else {
        echo "Error updating agency: " . mysqli_error($conn);
    }
}
?>
