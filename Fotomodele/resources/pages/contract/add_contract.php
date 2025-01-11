<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugare Contract</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" href="../../styles/style.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Link to external script -->
    <script src="../../scripts/contract/add.js" defer></script>
</head>
<body>
    <div class="table-buttons">
        <h1>Adaugare Contract</h1>
        <form id="addForm">
            <div class="form-group">
                <label for="id_event_add">ID Eveniment:</label>
                <input type="text" name="id_event_add" id="id_event_add" placeholder="ID-ul evenimentului" required>
            </div>

            <div class="form-group">
                <label for="id_role_add">ID Rol:</label>
                <input type="text" name="id_role_add" id="id_role_add" placeholder="ID-ul rolului" required>
            </div>

            <div class="form-group">
                <label for="details_add">Detalii:</label>
                <input type="text" name="details_add" id="details_add" placeholder="Introduceti detalii" required>
            </div>

            <div class="form-group">
                <label for="money_add">Suma:</label>
                <input type="text" name="money_add" id="money_add" placeholder="Suma contractuala" required>
            </div>

            <button type="submit" class="btn-submit">Adauga</button>
        </form>

        <button onclick="location.href='../../../index.php'">Home</button>
        <div class="message" id="mesaj"></div>
    </div>
</body>
</html>
