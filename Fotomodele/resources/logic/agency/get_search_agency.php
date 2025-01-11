<?php
// Include the database connection
include('../db_connection.php');

// Get the agency name from the request
$agency_name = $_GET['agency_name'];

// Prepare the SQL query to fetch the agency
$sql = "SELECT * FROM agency WHERE name LIKE '%$agency_name%'";
$result = mysqli_query($conn, $sql);

// Check if an agency was found
if (mysqli_num_rows($result) > 0) {
    $agency = mysqli_fetch_assoc($result);
    echo json_encode(['success' => true, 'agency' => $agency]);
} else {
    echo json_encode(['success' => false]);
}
?>
