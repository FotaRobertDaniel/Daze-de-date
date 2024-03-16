<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h3>Signup</h3>
<form action ="includes/formhandler.inc.php" method="post">
    <input type = "text" name="Nume" placeholder="Nume">
    <input type = "text" name="Prenume" placeholder="Prenume">
    <input type = "date" name="Data_nasterii" placeholder="Data_nasterii">
    <input type = "text" name="Adresa" placeholder="Adresa">
    <input type = "text" name="Email" placeholder="Email">
    <input type = "tel" name="Telefon" placeholder="Telefon">
    <button>Signup</button>
</form>

<body>
</body>
</html>
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <button onclick="location.href='includes/table_agentie_cautare.php'">Cautare Agentie</button>
    <button onclick="location.href='includes/table_agentie_adaugare.php'">Adaugare Agentie</button>

    <button onclick="location.href='includes/table_categoriievenimente_cautare.php'">Cautare Categorii Evenimente</button>
    <button onclick="location.href='includes/table_categoriievenimente_adaugare.php'">Adaugare Categorii Evenimente</button>

    <button onclick="location.href='includes/table_rol_cautare.php'">Cautare Rol Fotomodel</button>
    <button onclick="location.href='includes/table_rol_adaugare.php'">Adaugare Rol Fotomodel</button>

    <button onclick="location.href='includes/table_fotomodele_cautare.php'">Cautare Fotomodel</button>
    <button onclick="location.href='includes/table_fotomodele_adaugare.php'">Adaugare Fotomodel</button>

    <button onclick="location.href='includes/table_evenimente_cautare.php'">Cautare Eveniment</button>
    <button onclick="location.href='includes/table_evenimente_adaugare.php'">Adaugare Eveniment</button>

    <button onclick="location.href='includes/table_contracte_cautare.php'">Cautare Contracte</button>
    <button onclick="location.href='includes/table_contracte_adaugare.php'">Adaugare Contracte</button>
</div>

</body>
</html>


