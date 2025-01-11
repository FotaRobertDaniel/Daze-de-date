<?php
include('../db_connection.php');

$sql = "SELECT 
            event.id AS event_id, 
            event.name AS event_name, 
            category.id AS category_id, 
            category.name AS category_name, 
            category.description AS category_description 
        FROM event 
        JOIN category ON event.id_category = category.id";

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
