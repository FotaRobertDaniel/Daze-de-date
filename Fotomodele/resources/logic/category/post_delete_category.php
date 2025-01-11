<?php
// Include the database connection file
include('../../logic/db_connection.php');

// Check if the category_id parameter is set
if (isset($_POST['category_id'])) {
    $category_id = intval($_POST['category_id']); // Sanitize the input (ensure it's an integer)

    // SQL query to delete the category by ID
    $sql = "DELETE FROM category WHERE id = '$category_id'";

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
    // If category_id is not set
    echo json_encode(['success' => false, 'message' => 'No category ID provided']);
}
?>
