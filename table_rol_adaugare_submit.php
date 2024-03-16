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
    $denumire_adaugare = $_POST['denumire_adaugare'];
    $sarcini = $_POST['sarcini'];

    $sql = "INSERT INTO rol (Denumire, Sarcini) 
            VALUES ('$denumire_adaugare', '$sarcini')";

    if ($conn->query($sql) === TRUE) {
        echo "Înregistrarea a fost adăugată cu succes!";
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>