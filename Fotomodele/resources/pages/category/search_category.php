<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Căutare Categorie</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" defer></script>
    <script src="../../scripts/category/search.js" defer></script>
</head>
<body>
    <div class="table-buttons">
        <h1>Căutare Categorie</h1>
        <!-- Updated form for searching categories -->
        <form id="searchCategoryForm" class="form-group">
            <label for="category_id">ID Categorie:</label>
            <input type="text" name="category_id" id="category_id" placeholder="Introduceți ID-ul categoriei" required>

            <button type="submit" class="btn-submit">Căutare</button>
        </form>
        <button onclick="location.href='../../../index.php'">Acasă</button>
        
        <!-- Updated div for displaying search results -->
        <div class="tabel" id="searchResults"></div>
    </div>
</body>
</html>
