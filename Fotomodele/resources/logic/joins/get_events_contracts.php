<?php
include('../db_connection.php');

$sql = "SELECT 
            event.id AS event_id,
            event.name AS event_name,
            contract.id AS contract_id,
            contract.details AS contract_details,
            contract.money AS contract_value
        FROM event
        JOIN contract ON event.id = contract.id_event";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
    echo json_encode(['success' => true, 'events' => $events]);
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
