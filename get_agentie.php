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

$sqlAgentie = "SELECT ID_Agentie, CONCAT(Nume_Agentie) AS agentie_cautare FROM agentie";
$resultAgentie = $conn->query($sqlAgentie);

$options = "";
while ($agentie = $resultAgentie->fetch_assoc()) {
    $options .= "<option value='" . $agentie['ID_Agentie'] . "'>" . $agentie['agentie_cautare'] . "</option>";
}

$conn->close();

echo $options;
?>