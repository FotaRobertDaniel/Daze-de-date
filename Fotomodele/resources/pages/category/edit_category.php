<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Categorie</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/category/edit.js" defer></script>
</head>
<body>

<h2>Edit Categorie</h2>

<!-- Search Category Form -->
<form id="search_form">
    <label for="category_id">Enter Category Name: </label>
    <input type="text" id="category_id" name="category_id" required>
    <button type="submit">Search</button>
    <button onclick="location.href='../../../index.php'">Home</button>
</form>

<hr>

<!-- Category Edit Form (Initially hidden) -->
<form id="edit_form" style="display: none;">
    <input type="hidden" id="category_id" name="category_id">
    <label for="category_name_input">Category Name:</label>
    <input type="text" id="category_name_input" name="category_name" required><br>

    <label for="category_description_input">Description:</label>
    <input type="text" id="category_description_input" name="category_description" required><br>

    <button type="submit">Update Category</button>
</form>

</body>
</html>
