<?php
// Include the database connection
include('../db_connection.php');

// Get the category ID from the request
$category_id = $_GET['category_id'];

// Prepare the SQL query to fetch the category
$sql = "SELECT * FROM category WHERE id LIKE '$category_id'";
$result = mysqli_query($conn, $sql);

// Check if a category was found
if (mysqli_num_rows($result) > 0) {
    $category = mysqli_fetch_assoc($result);
    echo json_encode(['success' => true, 'category' => $category]);
} else {
    echo json_encode(['success' => false]);
}
?>
