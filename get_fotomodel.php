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

$sqlFotomodele = "SELECT ID_Fotomodele, CONCAT(Nume, ' ', Prenume) AS Nume_Fotomodel FROM fotomodele";
$resultFotomodele = $conn->query($sqlFotomodele);

$options = "";
while ($Fotomodele = $resultFotomodele->fetch_assoc()) {
    $options .= "<option value='" . $Fotomodele['ID_Fotomodele'] . "'>" . $Fotomodele['Nume_Fotomodel'] . "</option>";
}

$conn->close();

echo $options;
?>