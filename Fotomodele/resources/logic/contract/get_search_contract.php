<?php
// Include the database connection
include('../db_connection.php');

// Get the agency name from the request
$contract_id = $_GET['contract_id'];

// Prepare the SQL query to fetch the agency
$sql = "SELECT * FROM contract WHERE id LIKE '$contract_id'";
$result = mysqli_query($conn, $sql);

// Check if an agency was found
if (mysqli_num_rows($result) > 0) {
    $contract = mysqli_fetch_assoc($result);
    echo json_encode(['success' => true, 'contract' => $contract]);
} else {
    echo json_encode(['success' => false]);
}
?>
