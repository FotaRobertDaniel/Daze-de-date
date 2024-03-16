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
    <form class="searchForm" id="addForm" method="post">

            <label for="denumire_adaugare">Denumire:</label>
            <input type="text" name="denumire_adaugare" id="denumire_adaugare">

            <label for="sarcini">Sarcini:</label>
            <input type="text" name="sarcini" id="sarcini">


            <input class="butonAdaugare" type="submit" value="adauga">Adaugare</button>
        </form>
        
    <button onclick="location.href='../index.php'">Home</button>
    <div class="message" id="mesaj"></div>
</div>
    <script>


        function submitForm() {
            $('#addForm').submit();
        }
       
        $('#addForm').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: 'table_rol_adaugare_submit.php',
                    data: formData,
                    success: function(response) {
                        if (response.trim() !== "") {
                            $('#mesaj').html(response);
                        }
                    }
                });
            });
    </script>
</body>
</html>
