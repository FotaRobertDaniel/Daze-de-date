<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Căutare Agentie</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" defer></script>
    <script src="../../scripts/agency/search.js" defer></script>
</head>
<body>
    <div class="table-buttons">
        <h1>Căutare Agentie</h1>
        <!-- Updated form with matching ID and name -->
        <form id="searchAgencyForm" class="form-group">
            <label for="agency_name">Nume Agentie:</label>
            <input type="text" name="agency_name" id="agency_name" placeholder="Introduceți numele agenției" required>

            <button type="submit" class="btn-submit">Căutare</button>
        </form>
        <button onclick="location.href='../../../index.php'">Acasă</button>
        
        <!-- Update div ID to match JavaScript selector -->
        <div class="tabel" id="searchResults"></div>
    </div>
</body>
</html>
