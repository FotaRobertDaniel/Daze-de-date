<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugare Eveniment</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" href="../../styles/style.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Link to external script -->
    <script src="../../scripts/event/add.js" defer></script>
</head>
<body>
    <div class="table-buttons">
        <h1>Adaugare Eveniment</h1>
        <form id="addForm">
            <div class="form-group">
                <label for="id_category_add">ID Categorie:</label>
                <input type="text" name="id_category_add" id="id_category_add" placeholder="ID-ul Categoriei" required>
            </div>

            <div class="form-group">
                <label for="name_add">Numele Eveniment:</label>
                <input type="text" name="name_add" id="name_add" placeholder="Numele Evenimentului" required>
            </div>

            <div class="form-group">
                <label for="date_add">Data Eveniment:</label>
                <input type="text" name="date_add" id="date_add" placeholder="Data evenimentului" required>
            </div>

            <div class="form-group">
                <label for="address_add">Adresa Eveniment:</label>
                <input type="text" name="address_add" id="address_add" placeholder="Adresa evenimentului" required>
            </div>

            <div class="form-group">
                <label for="description_add">Descriere:</label>
                <input type="text" name="description_add" id="description_add" placeholder="Descrierea evenimentului" required>
            </div>

            <button type="submit" class="btn-submit">Adauga</button>
        </form>

        <button onclick="location.href='../../../index.php'">Home</button>
        <div class="message" id="mesaj"></div>
    </div>
</body>
</html>
