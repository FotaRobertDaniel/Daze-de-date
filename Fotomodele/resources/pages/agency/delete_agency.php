<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ștergere Agenție</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" defer></script>
    <script src="../../scripts/agency/delete.js" defer></script>
</head>
<body>
    <div class="table-buttons">
        <h1>Ștergere Agentie</h1>
        
        <!-- Search Form -->
        <form id="searchAgencyForm" class="form-group">
            <label for="agency_name">Nume Agentie:</label>
            <input type="text" name="agency_name" id="agency_name" placeholder="Introduceți numele agenției" required>
            <button type="submit" class="btn-submit">Căutare</button>
        </form>
        
        <!-- Back to Home Button -->
        <button onclick="location.href='../../../index.php'">Acasă</button>
        
        <!-- Search Results Section -->
        <div class="tabel" id="searchResults">
            <!-- Results will be inserted here after a successful search -->
        </div>
        
        <!-- Delete Button (Initially hidden, will show up after a search result) -->
        <button id="deleteAgencyBtn" style="display:none;">Șterge Agenție</button>
    </div>
</body>
</html>
