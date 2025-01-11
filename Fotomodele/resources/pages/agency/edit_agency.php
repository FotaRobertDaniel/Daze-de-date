<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Agency</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../../scripts/agency/edit.js" defer></script>
</head>
<body>

<h2>Edit Agency</h2>

<!-- Search Agency Form -->
<form id="search_form">
    <label for="agency_name">Enter Agency Name: </label>
    <input type="text" id="agency_name" name="agency_name" required>
    <button type="submit">Search</button>
    <button onclick="location.href='../../../index.php'">Home</button>
</form>

<hr>

<!-- Agency Edit Form (Initially hidden) -->
<form id="edit_form" style="display: none;">
    <input type="hidden" id="agency_id" name="agency_id">
    <label for="agency_name_input">Agency Name:</label>
    <input type="text" id="agency_name_input" name="agency_name" required><br>

    <label for="agency_address_input">Address:</label>
    <input type="text" id="agency_address_input" name="agency_address" required><br>

    <label for="agency_phone_input">Phone:</label>
    <input type="text" id="agency_phone_input" name="agency_phone" required><br>

    <label for="agency_email_input">Email:</label>
    <input type="email" id="agency_email_input" name="agency_email" required><br>

    <button type="submit">Update Agency</button>
</form>

</body>
</html>
