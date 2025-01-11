<?php
// Include the database connection
include('../db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $category_description = $_POST['category_description'];

    // Sanitize the input data to prevent SQL injection
    $category_name = mysqli_real_escape_string($conn, $category_name);
    $category_description = mysqli_real_escape_string($conn, $category_description);

    // Prepare the SQL query to update the category
    $sql = "UPDATE category SET 
                name = '$category_name', 
                description = '$category_description' 
            WHERE id = '$category_id'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Category updated successfully";
    } else {
        echo "Error updating category: " . mysqli_error($conn);
    }
}
?>
