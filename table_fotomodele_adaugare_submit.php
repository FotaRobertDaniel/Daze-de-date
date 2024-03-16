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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume_adaugare = $_POST['nume_adaugare'];
    $prenume_adaugare = $_POST['prenume_adaugare'];
    $idAgentie = $_POST['agentie_adaugare'];
    $datanasterii_adaugare = $_POST['datanasterii_adaugare'];
    $adresa_adaugare = $_POST['adresa_adaugare'];
    $email_adaugare = $_POST['email_adaugare'];
    $telefon_adaugare = $_POST['telefon_adaugare'];


    $sql = "INSERT INTO fotomodele (Nume, Prenume, ID_Agentie, Data_nasterii, Adresa, Email, Telefon) 
            VALUES ('$nume_adaugare', '$prenume_adaugare', '$idAgentie', '$datanasterii_adaugare', '$adresa_adaugare', '$email_adaugare', '$telefon_adaugare')";

    if ($conn->query($sql) === TRUE) {
        echo "Înregistrarea a fost adăugată cu succes!";
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>