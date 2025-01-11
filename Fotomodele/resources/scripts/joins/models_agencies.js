$(document).ready(function () {
    // Fetch data on page load
    fetch('../../logic/joins/get_models_agencies.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let html = '<table><tr><th>Model Name</th><th>Model Surname</th><th>Agency Name</th><th>Agency Address</th></tr>';
                data.models.forEach(model => {
                    html += `<tr>
                                <td>${model.model_name}</td>
                                <td>${model.model_surname}</td>
                                <td>${model.agency_name}</td>
                                <td>${model.agency_address}</td>
                            </tr>`;
                });
                html += '</table>';
                $('#result').html(html);
            } else {
                $('#result').html('<p>No data found</p>');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            $('#result').html('<p>Error fetching data</p>');
        });
});
