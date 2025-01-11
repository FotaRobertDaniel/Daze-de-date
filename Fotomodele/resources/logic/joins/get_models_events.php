<?php
include('../db_connection.php');

$sql = "SELECT 
            model.id AS model_id, 
            model.name AS model_name, 
            model.surname AS model_surname,
            event.id AS event_id, 
            event.name AS event_name
        FROM model
        JOIN con_mod ON model.id = con_mod.id_mod
        JOIN contract ON con_mod.id_con = contract.id
        JOIN event ON contract.id_event = event.id";

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
