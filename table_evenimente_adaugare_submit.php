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
    $nume_eveniment_adaugare = $_POST['nume_eveniment_adaugare'];
    $id_CategorieEveniment = $_POST['nume_categorie_adaugare'];
    $data_eveniment_adaugare = $_POST['data_eveniment_adaugare'];
    $locatie_adaugare = $_POST['locatie_adaugare'];
    $descriere_adaugare = $_POST['descriere_adaugare'];


    $sql = "INSERT INTO evenimente (Nume_eveniment, ID_CategorieEveniment, Data_eveniment, Locatie, Descriere_eveniment) 
            VALUES ('$nume_eveniment_adaugare', '$id_CategorieEveniment', '$data_eveniment_adaugare', '$locatie_adaugare', '$descriere_adaugare')";

    if ($conn->query($sql) === TRUE) {
        echo "Înregistrarea a fost adăugată cu succes!";
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>