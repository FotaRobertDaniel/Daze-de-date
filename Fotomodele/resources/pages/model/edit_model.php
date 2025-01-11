<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Model</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" defer></script>
    <script src="../../scripts/model/edit.js" defer></script>
</head>
<body>
    <div class="table-buttons">
        <h1>Edit Model</h1>

        <!-- Search Model Form -->
        <form id="searchForm">
            <label for="model_id">Enter Model ID:</label>
            <input type="text" id="model_id" name="model_id" placeholder="Model ID" required>
            <button type="submit">Search</button>
            <button onclick="location.href='../../../index.php'">Home</button>
        </form>

        <hr>

        <!-- Edit Model Form (Initially hidden) -->
        <form id="editForm" style="display: none;">
            <input type="hidden" id="model_id_input" name="model_id">

            <label for="name_input">First Name:</label>
            <input type="text" id="name_input" name="name" required><br>

            <label for="surname_input">Last Name:</label>
            <input type="text" id="surname_input" name="surname" required><br>

            <label for="dob_input">Date of Birth:</label>
            <input type="text" id="dob_input" name="dob" required><br>

            <label for="agency_input">Agency:</label>
            <input type="text" id="agency_input" name="agency" required><br>

            <label for="address_input">Address:</label>
            <input type="text" id="address_input" name="address" required><br>

            <label for="email_input">Email:</label>
            <input type="text" id="email_input" name="email" required><br>

            <label for="phone_input">Phone:</label>
            <input type="text" id="phone_input" name="phone" required><br>

            <button type="submit">Update Model</button>
        </form>

        <hr>

        <!-- Associated Contracts Section (Initially hidden) -->
        <div id="contracts_section" style="display: none;">
            <h2>Contracts Associated with this Model</h2>
            <div id="contracts_list"></div>
        </div>

        <div id="message"></div>
    </div>
</body>
</html>
