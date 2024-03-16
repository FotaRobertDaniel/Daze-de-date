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

$sqlCategoriiEvenimente = "SELECT ID_CategorieEveniment, CONCAT(Nume_Categorie) AS categorie_eveniment_cautare FROM categoriievenimente";
$resultCategoriiEvenimente = $conn->query($sqlCategoriiEvenimente);

$options = "";
while ($categoriievenimente = $resultCategoriiEvenimente->fetch_assoc()) {
    $options .= "<option value='" . $categoriievenimente['ID_CategorieEveniment'] . "'>" . $categoriievenimente['categorie_eveniment_cautare'] . "</option>";
}

$conn->close();

echo $options;
?>