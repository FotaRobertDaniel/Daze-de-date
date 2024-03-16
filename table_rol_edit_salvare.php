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
    $ID_Rol = $_GET['id'];

    $Denumire = isset($_POST['denumire_editare']) ? $_POST['denumire_editare'] : "";
    $Sarcini = isset($_POST['sarcini_editare']) ? $_POST['sarcini_editare'] : "";
   

    $sql = "UPDATE rol 
            SET Denumire='$Denumire', Sarcini='$Sarcini'
            WHERE ID_Rol=$ID_Rol";


    if ($conn->query($sql) === TRUE) {
        echo "Modificările au fost salvate cu succes!";
    } else {
        echo "Eroare la salvarea modificărilor: " . $conn->error;
    }
} else {
    echo "Rolul specificat nu există în bază de date.";
}

$conn->close();
?>