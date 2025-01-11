<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meniu Tabele</title>
    <link rel="stylesheet" href="resources/styles/style.css">
</head>
<body>
    <div class="table-buttons">
        <!-- Agentie Section -->
        <div class="category">
            <h2>Agentie</h2>
            <button onclick="location.href='resources/pages/agency/search_agency.php'">Cautare Agentie</button>
            <button onclick="location.href='resources/pages/agency/add_agency.php'">Adaugare Agentie</button>
            <button onclick="location.href='resources/pages/agency/edit_agency.php'">Modificare Agentie</button>
            <button onclick="location.href='resources/pages/agency/delete_agency.php'">Stergere Agentie</button>
        </div>

        <!-- Fotomodel Section -->
        <div class="category">
            <h2>Fotomodel</h2>
            <button onclick="location.href='resources/pages/model/edit_model.php'">Editare Fotomodel</button>
            <button onclick="location.href='resources/pages/model/add_model.php'">Adaugare Fotomodel</button>
            <button onclick="location.href='resources/pages/model/delete_model.php'">Anihilare Fotomodel</button>
        </div>

        <!-- Eveniment Section -->
        <div class="category">
            <h2>Eveniment</h2>
            <button onclick="location.href='resources/pages/event/add_event.php'">Adaugare Eveniment</button>
            <!-- <button onclick="location.href='includes/table_evenimente_cautare.php'">Cautare Eveniment</button> -->
        </div>

        <!-- Contract Section -->
        <div class="category">
            <h2>Contract</h2>
            <button onclick="location.href='resources/pages/contract/add_contract.php'">Adaugare Contracte</button>
            <button onclick="location.href='resources/pages/contract/search_contract.php'">Cautare Contracte</button>
            <button onclick="location.href='resources/pages/contract/edit_contract.php'">Modificare Contracte</button>
            <button onclick="location.href='resources/pages/contract/delete_contract.php'">Stergere Contracte</button>
        </div>

        <!-- Rol Section -->
        <div class="category">
            <h2>Rol</h2>
            <!-- <button onclick="location.href='includes/table_rol_cautare.php'">Cautare Rol Fotomodel</button>
            <button onclick="location.href='includes/table_rol_adaugare.php'">Adaugare Rol Fotomodel</button> -->
        </div>

        <!-- Categorie Section -->
        <div class="category">
            <h2>Categorie</h2>
            <button onclick="location.href='resources/pages/category/search_category.php'">Cautare Categorie Eveniment</button>
            <button onclick="location.href='resources/pages/category/add_category.php'">Adaugare Categorie Eveniment</button>
            <button onclick="location.href='resources/pages/category/edit_category.php'">Modificare Categorie Eveniment</button>
            <button onclick="location.href='resources/pages/category/delete_category.php'">Stergere Categorie Eveniment</button>
        </div>

        <div class="category">
            <h2>Joined tables.</h2>
            <button onclick="location.href='resources/pages/joins/model_agencies.php'">Modele si Agentii</button>
            <button onclick="location.href='resources/pages/joins/contracts_models.php'">Contracte si Modele</button>
            <button onclick="location.href='resources/pages/joins/event_categories.php'">Evenimente si Categorii</button>
            <button onclick="location.href='resources/pages/joins/events_contracts.php'">Evenimente si Contracte</button>
            <button onclick="location.href='resources/pages/joins/models_events.php'">Modele si Evenimente</button>
            <button onclick="location.href='resources/pages/joins/models_contracts_agency_category.php'">Modele Contracte Agentii si Categorii</button>
        </div>
    </div>
</body>
</html>
