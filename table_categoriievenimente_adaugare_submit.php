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
    $nume_categorie_adaugare = $_POST['nume_categorie_adaugare'];
    $descriere_categorie_adaugare = $_POST['descriere_categorie_adaugare'];

    $sql = "INSERT INTO categoriievenimente (Nume_Categorie, Descriere_Categorie) 
            VALUES ('$nume_categorie_adaugare', '$descriere_categorie_adaugare')";

    if ($conn->query($sql) === TRUE) {
        echo "Înregistrarea a fost adăugată cu succes!";
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>