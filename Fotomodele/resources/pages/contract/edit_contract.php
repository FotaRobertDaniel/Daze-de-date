<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contract</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" defer></script>
    <script src="../../scripts/contract/edit.js" defer></script>
</head>
<body>

<h2>Edit Contract</h2>

<!-- Search Contract Form -->
<form id="search_form">
    <label for="contract_id">Enter Contract ID: </label>
    <input type="text" id="contract_id" name="contract_id" required>
    <button type="submit">Search</button>
    <button onclick="location.href='../../../index.php'">Home</button>
</form>

<hr>

<!-- Contract Edit Form (Initially hidden) -->
<form id="edit_form" style="display: none;">
    <input type="hidden" id="contract_id_input" name="contract_id">
    
    <label for="event_id_input">Event ID:</label>
    <input type="text" id="event_id_input" name="event_id" required><br>

    <label for="role_id_input">Role ID:</label>
    <input type="text" id="role_id_input" name="role_id" required><br>

    <label for="details_input">Details:</label>
    <input type="text" id="details_input" name="details" required><br>

    <label for="money_input">Capital:</label>
    <input type="text" id="money_input" name="money" required><br>

    <button type="submit">Update Contract</button>
</form>

<hr>

<!-- Models List Section (Initially hidden) -->
<div id="models_list_section" style="display: none;">
    <h3>Models Associated with this Contract:</h3>
    <div id="models_list"></div>
</div>

</body>
</html>
