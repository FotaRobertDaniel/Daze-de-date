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

$nume_cautare = isset($_POST['nume_cautare']) ? $_POST['nume_cautare'] : "";

$sql = "SELECT agentie.ID_Agentie, agentie.Nume_agentie, agentie.Adresa_sediu, agentie.Telefon, agentie.Email, alte_tabele.Nume
        FROM agentie
        INNER JOIN alte_tabele ON agentie.ID_Alt = alte_tabele.ID_Alt
        WHERE 1";

if(!empty($nume_cautare)){
    $sql .= " AND Nume_agentie LIKE '%$nume_cautare%'";
}
$sql .= ";";

$result = $conn->query($sql);

echo "<h2>Tabelul Agentie</h2>";

if ($result->num_rows >= 0) {
    echo "<table>
        <tr>
        <th>Nume_agentie</th>
        <th>Adresa_sediu</th>
        <th>Telefon</th>
        <th>Email</th>
        <th class='buttonrow'>Edit</th>
        <th class='buttonrow'>Delete</th>

        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["Nume_agentie"] . "</td>
                <td>" . $row["Adresa_sediu"] . "</td>
                <td>" . $row["Telefon"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td><button class='edit' onclick='editFunction(" . $row["ID_Agentie"] . ")'>Edit</button></td>
                <td><button class='delete' onclick='deleteFunction(" . $row["ID_Agentie"] . ")'>Delete</button></td>
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
                url: 'table_agentie.php',
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
                url: 'table_agentie_delete.php',
                data: { id: id },
                success: function(response) {
                    alert(response);
                    submitFormPhp('searchForm');
                }
            });
        }
    }

    function editFunction(id) {
    window.location.href = 'table_agentie_edit.php?id=' + id;
}
</script>
