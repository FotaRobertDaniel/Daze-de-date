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

$sqlRol = "SELECT ID_Rol, CONCAT(Denumire) AS Denumire FROM rol";
$resultRol = $conn->query($sqlRol);

$options = "";
while ($Rol = $resultRol->fetch_assoc()) {
    $options .= "<option value='" . $Rol['ID_Rol'] . "'>" . $Rol['Denumire'] . "</option>";
}

$conn->close();

echo $options;
?>