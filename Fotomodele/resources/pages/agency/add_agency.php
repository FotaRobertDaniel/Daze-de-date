<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugare Agentie</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" href="../../styles/style.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Link to external script -->
    <script src="../../scripts/agency/add.js" defer></script>
</head>
<body>
    <div class="table-buttons">
        <h1>Adaugare Agentie</h1>
        <form id="addForm">
            <div class="form-group">
                <label for="name_add">Nume:</label>
                <input type="text" name="name_add" id="name_add" placeholder="Introduceti numele agentiei" required>
            </div>

            <div class="form-group">
                <label for="address_add">Adresa:</label>
                <input type="text" name="address_add" id="address_add" placeholder="Introduceti adresa" required>
            </div>

            <div class="form-group">
                <label for="phone_add">Telefon:</label>
                <input type="tel" name="phone_add" id="phone_add" placeholder="Introduceti telefonul" required>
            </div>

            <div class="form-group">
                <label for="email_add">Email:</label>
                <input type="email" name="email_add" id="email_add" placeholder="Introduceti emailul" required>
            </div>

            <button type="submit" class="btn-submit">Adauga</button>
        </form>

        <button onclick="location.href='../../../index.php'">Home</button>
        <div class="message" id="mesaj"></div>
    </div>
</body>
</html>
