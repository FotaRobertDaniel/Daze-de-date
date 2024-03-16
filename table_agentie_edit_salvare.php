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

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $ID_Agentie = $_GET['id'];

    $Nume_agentie = isset($_POST['nume_adaugare']) ? $_POST['nume_adaugare'] : "";
    $Adresa_sediu = isset($_POST['adresa_adaugare']) ? $_POST['adresa_adaugare'] : "";
    $Telefon = isset($_POST['telefon_adaugare']) ? $_POST['telefon_adaugare'] : "";
    $Email = isset($_POST['email_adaugare']) ? $_POST['email_adaugare'] : "";
   

    $sql = "UPDATE agentie 
            SET Nume_agentie='$Nume_agentie', Adresa_sediu='$Adresa_sediu', Telefon='$Telefon', Email='$Email'
            WHERE ID_Agentie=$ID_Agentie";


    if ($conn->query($sql) === TRUE) {
        echo "Modificările au fost salvate cu succes!";
    } else {
        echo "Eroare la salvarea modificărilor: " . $conn->error;
    }
} else {
    echo "Agentia specificata nu există în bază de date.";
}

$conn->close();
?>