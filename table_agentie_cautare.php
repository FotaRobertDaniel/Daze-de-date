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
    <form class="searchForm" id="searchForm" method="post">


     <!-- copy paste daca e necesar -->
            <label for="nume_cautare">Nume:</label>
            <input type="text" name="nume_cautare" id="nume_cautare">

            <button class="butonCautare" type="button" onclick="submitFormPhp('searchForm')">Cautare</button>
        </form>
        
    <button onclick="location.href='../index.php'">Home</button>
    <div class="tabel" id="rezultateCautare"></div>
</div>
    <script>
        function submitFormPhp(formId){
            var formData = $('#' + formId).serialize();
            $.ajax({
                type: 'POST',
                url: 'table_agentie.php',
                data: formData,
                success: function(response){
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
