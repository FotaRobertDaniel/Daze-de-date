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

if (isset($_POST['id'])) {
    $ID = $_POST['id'];

    $sql = "DELETE FROM contracte WHERE ID_Fotomodel = $ID";

    if ($conn->query($sql) === TRUE) {
        echo "stears cu succes!";
    } else {
        echo "Eroare la ștergere: " . $conn->error;
    }
} else {
    echo "ID invalid pentru ștergere.";
}

$conn->close();
?>