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
            background-image: url('C:/xampp/htdocs/Fotomodele/imagine/poza1.jpg');
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
    <form class="searchForm" id="searchForm" method="post">


            <label for="fotomodel_cautare">Nume Fotomodel:</label>
            <select name="fotomodel_cautare"></select>

            <label for="eveniment_cautare">Eveniment:</label>
            <select name="eveniment_cautare"></select>

            <label for="rol_cautare">Rol:</label>
            <select name="rol_cautare"></select>

            <label for="suma_cautare">Suma:</label>
            <input type="text" name="suma_cautare" id="suma_cautare">
                
            <button class="butonCautare" type="button" onclick="submitFormPhp('searchForm')">Cautare</button>
        </form>
        
    <button onclick="location.href='../index.php'">Home</button>
    <div class="tabel" id="rezultateCautare"></div>
</div>
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: 'get_fotomodel.php',
                success: function(response) {
                    $('select[name="fotomodel_cautare"]').html(response);
                }
            });
            $.ajax({
                type: 'GET',
                url: 'get_evenimente.php',
                success: function(response) {
                    $('select[name="eveniment_cautare"]').html(response);
                }
            });
            $.ajax({
                type: 'GET',
                url: 'get_rol.php',
                success: function(response) {
                    $('select[name="rol_cautare"]').html(response);
                }
            });
        });

        function submitFormPhp(formId) {
            var formData = $('#' + formId).serialize();
            $.ajax({
                type: 'POST',
                url: 'table_contracte.php',
                data: formData,
                success: function(response) {
                    $('#rezultateCautare').html(response);
                }
            });
        }

        $('form').submit(function(event) {
            event.preventDefault();
        });
    </script>
</body>
</html>
