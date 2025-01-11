<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugare Categorie</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" href="../../styles/style.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Link to external script -->
    <script src="../../scripts/category/add.js" defer></script>
</head>
<body>
    <div class="table-buttons">
        <h1>Adaugare Categorie Eveniment</h1>
        <form id="addForm">

            <div class="form-group">
                <label for="name_add">Nume Categorie:</label>
                <input type="text" name="name_add" id="name_add" placeholder="Numele categoriei" required>
            </div>

            <div class="form-group">
                <label for="description_add">Descriere:</label>
                <input type="text" name="description_add" id="description_add" placeholder="Descrierea categoriei" required>
            </div>

            <button type="submit" class="btn-submit">Adauga</button>
        </form>

        <button onclick="location.href='../../../index.php'">Home</button>
        <div class="message" id="mesaj"></div>
    </div>
</body>
</html>
