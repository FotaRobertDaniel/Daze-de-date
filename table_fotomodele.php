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
$agentie_cautare = isset($_POST['agentie_cautare']) ? $_POST['agentie_cautare'] : "";

$sql = "SELECT ID_Fotomodele, Nume, Prenume, Nume_Agentie, Data_nasterii, Adresa, fotomodele.Email, fotomodele.Telefon
        FROM fotomodele
        LEFT JOIN agentie ON fotomodele.ID_Agentie = agentie.ID_Agentie
        WHERE 1";


if(!empty($nume_cautare)){
    $sql .= " AND Nume LIKE '%$nume_cautare%'";
}
if(!empty($agentie_cautare)){
    $sql .= " AND agentie.ID_Agentie LIKE '%$agentie_cautare%'";
}
$sql .= ";";

$result = $conn->query($sql);

echo "<h2>Tabelul Fotomodele</h2>";

if ($result->num_rows >= 0) {
    echo "<table>
        <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Agentie</th>
        <th>DataNasterii</th>
        <th>Adresa</th>
        <th>Email</th>
        <th>Telefon</th>
        <th class='buttonrow'>Delete</th>

        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["Nume"] . "</td>
                <td>" . $row["Prenume"] . "</td>
                <td>" . $row["Nume_Agentie"] . "</td>
                <td>" . $row["Data_nasterii"] . "</td>
                <td>" . $row["Adresa"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["Telefon"] . "</td>
                <td><button class='delete' onclick='deleteFunction(" . $row["ID_Fotomodele"] . ")'>Delete</button></td>
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
                url: 'table_fotomodele.php',
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
                url: 'table_fotomodele_delete.php',
                data: { id: id },
                success: function(response) {
                    alert(response);
                    submitFormPhp('searchForm');
                }
            });
        }
    }

</script>
