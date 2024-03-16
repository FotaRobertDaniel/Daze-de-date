<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "fotomodele";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

$nume_categorie_cautare = isset($_POST['nume_categorie_cautare']) ? $_POST['nume_categorie_cautare'] : "";

$sql = "SELECT categoriievenimente.ID_CategorieEveniment, categoriievenimente.Nume_Categorie, categoriievenimente.Descriere_Categorie, alte_tabele.Nume
        FROM categoriievenimente
        INNER JOIN alte_tabele ON categoriievenimente.ID_Alt = alte_tabele.ID_Alt
        WHERE 1";

if(!empty($nume_categorie_cautare)){
    $sql .= " AND Nume_Categorie LIKE '%$nume_categorie_cautare%'";
}
$sql .= ";";

$result = $conn->query($sql);

echo "<h2>Tabelul categoriievenimente</h2>";

if ($result->num_rows >= 0) {
    echo "<table>
        <tr>
        <th>Nume_Categorie</th>
        <th>Descriere_Categorie</th>
        <th class='buttonrow'>Edit</th>
        <th class='buttonrow'>Delete</th>

        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["Nume_Categorie"] . "</td>
                <td>" . $row["Descriere_Categorie"] . "</td>
                <td><button class='edit' onclick='editFunction(" . $row["ID_CategorieEveniment"] . ")'>Edit</button></td>
                <td><button class='delete' onclick='deleteFunction(" . $row["ID_CategorieEveniment"] . ")'>Delete</button></td>
            </tr>";
        }

    echo "</table>";
} else {
    echo "Nu există înregistrări.";
}

$conn->close();
?>
<script>
    function submitFormPhp(formId){
            var formData = $('#' + formId).serialize();
            $.ajax({
                type: 'POST',
                url: 'table_categoriievenimente.php',
                data: formData,
                success: function(response){
                    $('#rezultateCautare').html(response);
                }
            });
        }
    function deleteFunction(id) {
        if (confirm("Sigur doriti stergerea respectiva?")) {
            $.ajax({
                type: 'POST',
                url: 'table_categoriievenimente_delete.php',
                data: { id: id },
                success: function(response) {
                    alert(response);
                    submitFormPhp('searchForm');
                }
            });
        }
    }

    function editFunction(id) {
    window.location.href = 'table_categoriievenimente_edit.php?id=' + id;
}
</script>
