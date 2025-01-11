<?php
include('../db_connection.php');

$sql = "SELECT 
model.id AS model_id, 
model.name AS model_name, 
model.surname AS model_surname, 
contract.id AS contract_id, 
contract.details AS contract_details, 
contract.money AS contract_value, 
agency.id AS agency_id, 
agency.name AS agency_name, 
category.id AS category_id, 
category.name AS category_name
FROM model
JOIN con_mod ON model.id = con_mod.id_mod
JOIN contract ON con_mod.id_con = contract.id
JOIN agency ON model.agency = agency.id
JOIN contract_category ON contract.id = contract_category.contract_id
JOIN category ON contract_category.category_id = category.id;";



$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $records = [];
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
    echo json_encode(['success' => true, 'records' => $records]);
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
