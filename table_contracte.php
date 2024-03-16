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

$idFotomodel = isset($_POST['fotomodel_cautare']) ? $_POST['fotomodel_cautare'] : "";
$idEveniment = isset($_POST['eveniment_cautare']) ? $_POST['eveniment_cautare'] : "";
$idRol = isset($_POST['rol_cautare']) ? $_POST['rol_cautare'] : "";
$suma = isset($_POST['suma_cautare']) ? $_POST['suma_cautare'] : "";


$sql = "SELECT ID_Fotomodel, fotomodele.Nume, evenimente.ID_Eveniment, evenimente.Nume_eveniment, rol.ID_Rol, rol.Denumire, Suma_contract, Detalii_contract
        FROM contracte
        LEFT JOIN evenimente ON contracte.ID_Eveniment = evenimente.ID_Eveniment
        LEFT JOIN rol ON contracte.ID_Rol = rol.ID_Rol
        LEFT JOIN fotomodele ON contracte.ID_Fotomodel = fotomodele.ID_Fotomodele
        WHERE 1";


if(!empty($idFotomodel)){
    $sql .= " AND contracte.ID_Fotomodel LIKE '%$idFotomodel%'";
}
if(!empty($idEveniment)){
    $sql .= " AND evenimente.ID_Eveniment LIKE '%$idEveniment%'";
}

if(!empty($idRol)){
    $sql .= " AND rol.ID_Rol LIKE '%$idRol%'";
}
if(!empty($suma)){
    $sql .= " AND Suma_contract LIKE '%$suma%'";
}


$sql .= ";";

$result = $conn->query($sql);

echo "<h2>Tabelul Evenimente</h2>";

if ($result->num_rows >= 0) {
    echo "<table>
        <tr>
        <th>Nume_Fotomodel</th>
        <th>Eveniment</th>
        <th>Rol</th>
        <th>Suma</th>
        <th>Detalii</th>
        <th class='buttonrow'>Delete</th>

        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["Nume"] . "</td>
                <td>" . $row["Nume_eveniment"] . "</td>
                <td>" . $row["Denumire"] . "</td>
                <td>" . $row["Suma_contract"] . "</td>
                <td>" . $row["Detalii_contract"] . "</td>
                <td><button class='delete' onclick='deleteFunction(" . $row["ID_Fotomodel"] . ")'>Delete</button></td>
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
                url: 'table_contracte.php',
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
                url: 'table_contracte_delete.php',
                data: { id: id },
                success: function(response) {
                    alert(response);
                    submitFormPhp('searchForm');
                }
            });
        }
    }

</script>
