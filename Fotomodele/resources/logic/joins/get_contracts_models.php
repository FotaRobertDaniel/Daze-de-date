<?php
include('../db_connection.php');

$sql = "SELECT 
            contract.id AS contract_id, 
            contract.details AS contract_details, 
            model.id AS model_id, 
            model.name AS model_name, 
            model.surname AS model_surname 
        FROM con_mod 
        JOIN model ON con_mod.id_mod = model.id 
        JOIN contract ON con_mod.id_con = contract.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $contracts = [];
    while ($row = $result->fetch_assoc()) {
        $contracts[] = $row;
    }
    echo json_encode(['success' => true, 'contracts' => $contracts]);
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
