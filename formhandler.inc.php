<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nume = $_POST["Nume"];
    $Prenume = $_POST["Prenume"];
    $Data_nasterii = $_POST["Data_nasterii"];
    $Adresa = $_POST["Adresa"];
    $Email = $_POST["Email"];
    $Telefon = $_POST["Telefon"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO fotomodele(Nume, Prenume, Data_nasterii, Adresa, Email, Telefon) VALUES (?,?,?,?,?,?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$Nume, $Prenume, $Data_nasterii, $Adresa, $Email, $Telefon]);

        $pdo = null;
        $stmt = null;
        header("Location: ..//index.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage()); 
    }
} else {
    header("Location: ..//index.php");
}