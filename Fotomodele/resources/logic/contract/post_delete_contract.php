<?php
// Include the database connection file
include('../../logic/db_connection.php');

// Check if the agency_id parameter is set
if (isset($_POST['contract_id'])) {
    $contract_id = intval($_POST['contract_id']); // Sanitize the input (ensure it's an integer)

    // SQL query to delete the agency by ID
    $sql = "DELETE FROM contract WHERE id = '$contract_id'";

    if (mysqli_query($conn, $sql)) {
        // If deletion is successful
        echo json_encode(['success' => true]);
    } else {
        // If there's an error executing the query
        echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conn)]);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If agency_id is not set
    echo json_encode(['success' => false, 'message' => 'No contract ID provided']);
}
?>
