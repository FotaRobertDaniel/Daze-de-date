<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "fotomodele";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

$sqlEvenimente = "SELECT ID_Eveniment, CONCAT(Nume_eveniment) AS Nume_Eveniment FROM evenimente";
$resultEvenimente = $conn->query($sqlEvenimente);

$options = "";
while ($Evenimente = $resultEvenimente->fetch_assoc()) {
    $options .= "<option value='" . $Evenimente['ID_Eveniment'] . "'>" . $Evenimente['Nume_Eveniment'] . "</option>";
}

$conn->close();

echo $options;
?>