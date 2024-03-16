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

$denumire_cautare = isset($_POST['denumire_cautare']) ? $_POST['denumire_cautare'] : "";

"SELECT rol.ID_Rol, rol.Denumire, rol.Sarcini, alte_tabele.Nume
FROM rol
INNER JOIN alte_tabele ON rol.ID_Alt = alte_tabele.ID_Alt
WHERE 1";

if(!empty($denumire_cautare)){
    $sql .= " AND Denumire LIKE '%$denumire_cautare%'";
}
$sql .= ";";

$result = $conn->query($sql);

echo "<h2>Tabelul Rol</h2>";

if ($result->num_rows >= 0) {
    echo "<table>
        <tr>
        <th>Denumire</th>
        <th>Sarcini</th>
        <th class='buttonrow'>Edit</th>
        <th class='buttonrow'>Delete</th>

        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["Denumire"] . "</td>
                <td>" . $row["Sarcini"] . "</td>
                <td><button class='edit' onclick='editFunction(" . $row["ID_Rol"] . ")'>Edit</button></td>
                <td><button class='delete' onclick='deleteFunction(" . $row["ID_Rol"] . ")'>Delete</button></td>
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
                url: 'table_rol.php',
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
                url: 'table_rol_delete.php',
                data: { id: id },
                success: function(response) {
                    alert(response);
                    submitFormPhp('searchForm');
                }
            });
        }
    }

    function editFunction(id) {
    window.location.href = 'table_rol_edit.php?id=' + id;
}
</script>
