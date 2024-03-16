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
    $ID_CategorieEveniment = $_GET['id'];

    $Nume_Categorie = isset($_POST['nume_categorie_editare']) ? $_POST['nume_categorie_editare'] : "";
    $Descriere_Categorie = isset($_POST['descriere_categorie_editare']) ? $_POST['descriere_categorie_editare'] : "";
   

    $sql = "UPDATE categoriievenimente 
            SET Nume_Categorie='$Nume_Categorie', Descriere_Categorie='$Descriere_Categorie'
            WHERE ID_CategorieEveniment=$ID_CategorieEveniment";


    if ($conn->query($sql) === TRUE) {
        echo "Modificările au fost salvate cu succes!";
    } else {
        echo "Eroare la salvarea modificărilor: " . $conn->error;
    }
} else {
    echo "Categoria specificata nu există în bază de date.";
}

$conn->close();
?>