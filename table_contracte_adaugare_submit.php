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
    $id_Fotomodel = $_POST['Nume_Fotomodel'];
    $id_Eveniment = $_POST['Nume_Eveniment'];
    $Denumire_Rol = $_POST['Denumire_Rol'];
    $suma_adaugare = $_POST['suma_adaugare'];
    $detalii_adaugare = $_POST['detalii_adaugare'];


    $sql = "INSERT INTO contracte (ID_Fotomodel, ID_Eveniment, ID_Rol, Suma_contract, Detalii_contract) 
            VALUES ('$id_Fotomodel', '$id_Eveniment', '$Denumire_Rol', '$suma_adaugare', '$detalii_adaugare')";

    if ($conn->query($sql) === TRUE) {
        echo "Înregistrarea a fost adăugată cu succes!";
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>