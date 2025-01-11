<?php
include('../../logic/db_connection.php');

$model_id = $_POST['model_id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$dob = $_POST['dob'];
$agency = $_POST['agency'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "UPDATE model SET 
        name = '$name', 
        surname = '$surname', 
        date_of_birth = '$dob', 
        agency = '$agency', 
        address = '$address', 
        email = '$email', 
        phone = '$phone' 
        WHERE id = '$model_id'";

if ($conn->query($sql) === TRUE) {
    echo "Model updated successfully!";
} else {
    echo "Error updating model: " . $conn->error;
}
$conn->close();
?>
