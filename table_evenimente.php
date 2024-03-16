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

$nume_eveniment_cautare = isset($_POST['nume_eveniment_cautare']) ? $_POST['nume_eveniment_cautare'] : "";
$categoriievenimente_cautare = isset($_POST['categoriievenimente_cautare']) ? $_POST['categoriievenimente_cautare'] : "";

$sql = "SELECT ID_Eveniment, Nume_eveniment, Nume_Categorie, Data_eveniment, Locatie, Descriere_eveniment
        FROM evenimente
        LEFT JOIN categoriievenimente ON evenimente.ID_CategorieEveniment = categoriievenimente.ID_CategorieEveniment
        WHERE 1";


if(!empty($nume_eveniment_cautare)){
    $sql .= " AND Nume_eveniment LIKE '%$nume_eveniment_cautare%'";
}
if(!empty($categoriievenimente_cautare)){
    $sql .= " AND categoriievenimente.ID_CategorieEveniment LIKE '%$categoriievenimente_cautare%'";
}

$sql .= ";";

$result = $conn->query($sql);

echo "<h2>Tabelul Evenimente</h2>";

if ($result->num_rows >= 0) {
    echo "<table>
        <tr>
        <th>Nume_eveniment</th>
        <th>Nume_Categorie</th>
        <th>DataEveniment</th>
        <th>Locatia</th>
        <th>Descriere_eveniment</th>
        <th class='buttonrow'>Delete</th>

        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["Nume_eveniment"] . "</td>
                <td>" . $row["Nume_Categorie"] . "</td>
                <td>" . $row["Data_eveniment"] . "</td>
                <td>" . $row["Locatie"] . "</td>
                <td>" . $row["Descriere_eveniment"] . "</td>
                <td><button class='delete' onclick='deleteFunction(" . $row["ID_Eveniment"] . ")'>Delete</button></td>
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
                url: 'table_evenimente.php',
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
                url: 'table_evenimente_delete.php',
                data: { id: id },
                success: function(response) {
                    alert(response);
                    submitFormPhp('searchForm');
                }
            });
        }
    }

</script>
