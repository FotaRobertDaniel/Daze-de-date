<?php
include('../../logic/db_connection.php');

$model_id = $_GET['model_id'];

$sql = "SELECT * FROM model WHERE id = '$model_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $model = $result->fetch_assoc();
    echo json_encode(['success' => true, 'model' => $model]);
} else {
    echo json_encode(['success' => false]);
}
$conn->close();
?>
