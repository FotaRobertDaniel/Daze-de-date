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
    $adresa_adaugare = $_POST['adresa_adaugare'];
    $telefon_adaugare = $_POST['telefon_adaugare'];
    $email_adaugare = $_POST['email_adaugare'];

    $sql = "INSERT INTO agentie (Nume_agentie, Adresa_sediu, Telefon, Email) 
            VALUES ('$nume_adaugare', '$adresa_adaugare', '$telefon_adaugare', '$email_adaugare')";

    if ($conn->query($sql) === TRUE) {
        echo "Înregistrarea a fost adăugată cu succes!";
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>