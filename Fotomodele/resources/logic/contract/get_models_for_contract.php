<?php
// Include the database connection file
include('../db_connection.php');

// Check if the contract ID is provided
if (isset($_GET['contract_id'])) {
    $contract_id = intval($_GET['contract_id']);  // Sanitize the contract ID (ensure it's an integer)

    // Prepare the SQL query to fetch the models for the contract
    $sql = "
        SELECT model.name, model.surname 
        FROM contract
        JOIN con_mod ON contract.id = con_mod.id_con
        JOIN model ON con_mod.id_mod = model.id
        WHERE contract.id = '$contract_id';
    ";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $models = [];
        
        // Fetch all the results
        while ($row = mysqli_fetch_assoc($result)) {
            $models[] = $row;  // Add each model to the array
        }

        // Check if any models were found
        if (count($models) > 0) {
            echo json_encode(['success' => true, 'models' => $models]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No models found for this contract.']);
        }
    } else {
        // Handle query error
        echo json_encode(['success' => false, 'message' => 'Error executing query: ' . mysqli_error($conn)]);
    }
} else {
    // If no contract ID is provided
    echo json_encode(['success' => false, 'message' => 'Contract ID not provided']);
}

// Close the database connection
mysqli_close($conn);
?>
