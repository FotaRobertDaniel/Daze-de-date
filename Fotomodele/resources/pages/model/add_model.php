<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugare Fotomodel</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" href="../../styles/style.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Link to external script -->
    <script src="../../scripts/model/add.js" defer></script>
</head>
<body>
    <div class="table-buttons">
        <h1>Adaugare Fotomodel</h1>
        <form id="addForm">
            <div class="form-group">
                <label for="name_add">Prenume Fotomodel:</label>
                <input type="text" name="name_add" id="name_add" placeholder="Prenumele Fotomodelului" required>
            </div>

            <div class="form-group">
                <label for="surname_add">Numele Fotomodelului:</label>
                <input type="text" name="surname_add" id="surname_add" placeholder="Numele Fotomodelului" required>
            </div>

            <div class="form-group">
                <label for="dob_add">Data de nastere:</label>
                <input type="text" name="dob_add" id="dob_add" placeholder="Data de nastere a fotomodelului" required>
            </div>

            <div class="form-group">
                <label for="agency_add">Agentia:</label>
                <input type="text" name="agency_add" id="agency_add" placeholder="ID-ul agentiei" required>
            </div>

            <div class="form-group">
                <label for="address_add">Adresa:</label>
                <input type="text" name="address_add" id="address_add" placeholder="Adresa de domiciliu" required>
            </div>

            <div class="form-group">
                <label for="email_add">Email:</label>
                <input type="text" name="email_add" id="email_add" placeholder="Adresa de email" required>
            </div>

            <div class="form-group">
                <label for="phone_add">Telefon:</label>
                <input type="text" name="phone_add" id="phone_add" placeholder="Numarul de telefon personal" required>
            </div>

            <button type="submit" class="btn-submit">Adauga</button>
        </form>

        <button onclick="location.href='../../../index.php'">Home</button>
        <div class="message" id="mesaj"></div>
    </div>
</body>
</html>
