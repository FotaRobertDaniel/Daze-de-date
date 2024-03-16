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
    $ID_Agentie = $_GET['id'];

    $sql = "SELECT * FROM agentie WHERE ID_Agentie = $ID_Agentie";
    $result = $conn->query($sql);
}
$agentie = $result->fetch_assoc();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<script src = "https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Meniu Tabele</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('imagine/poza1.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .table-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 100px;
        }

        button {
            margin: 10px 0;
            padding: 10px;
            width: 200px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>


<div class="table-buttons">
    <form class="searchForm" id="addForm" method="post">

            <label for="nume_adaugare">Nume:</label>
            <input type='text' name='nume_adaugare'  id="nume_adaugare" value='<?php echo $agentie['Nume_agentie']; ?>'>

            <label for="adresa_adaugare">Adresa:</label>
            <input type='text' name='adresa_adaugare'  id="adresa_adaugare" value='<?php echo $agentie['Adresa_sediu']; ?>'>

            <label for="telefon_adaugare">Telefon:</label>
            <input type='text' name='telefon_adaugare'  id="telefon_adaugare" value='<?php echo $agentie['Telefon']; ?>'>

            <label for="email_adaugare">Email:</label>
            <input type='text' name='email_adaugare'  id="email_adaugare" value='<?php echo $agentie['Email']; ?>'>

            <button class = 'cautare' type='submit' onclick="submitForm()">Salvare</button>
    </form>
    <button onclick="location.href='../index.php'">Home</button>
    <div class="message" id="mesaj"></div>
</div>
    <script>



                function submitForm() {
                    var formData = $('#addForm').serialize();

                    $.ajax({
                        type: 'POST',
                        url: 'table_agentie_edit_salvare.php?id=<?php echo $ID_Agentie; ?>',
                        data: formData,
                        success: function(response) {
                            alert(response);
                        }
                    });
                }

    </script>
</body>
</html>
