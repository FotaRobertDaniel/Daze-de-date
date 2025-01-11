<?php
include('../../logic/db_connection.php');

$model_id = $_GET['model_id'];

$sql = "SELECT c.* 
        FROM contract c 
        INNER JOIN con_mod cm ON c.id = cm.id_con 
        WHERE cm.id_mod = '$model_id'";
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
