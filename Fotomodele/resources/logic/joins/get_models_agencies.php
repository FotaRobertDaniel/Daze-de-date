<?php
include('../db_connection.php');

$sql = "SELECT 
            model.id AS model_id, 
            model.name AS model_name, 
            model.surname AS model_surname, 
            agency.name AS agency_name, 
            agency.address AS agency_address 
        FROM model 
        JOIN agency ON model.agency = agency.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $models = [];
    while ($row = $result->fetch_assoc()) {
        $models[] = $row;
    }
    echo json_encode(['success' => true, 'models' => $models]);
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
