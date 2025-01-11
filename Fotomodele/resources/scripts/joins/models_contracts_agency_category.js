$(document).ready(function () {
    fetch('../../logic/joins/get_models_contracts_agency_category.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let html = '<table>';
                html += '<tr><th>Model ID</th><th>Model Name</th><th>Model Surname</th><th>Contract ID</th><th>Contract Details</th><th>Contract Value</th><th>Agency ID</th><th>Agency Name</th><th>Category ID</th><th>Category Name</th></tr>';

                data.records.forEach(record => {
                    html += `<tr>
                                <td>${record.model_id}</td>
                                <td>${record.model_name}</td>
                                <td>${record.model_surname}</td>
                                <td>${record.contract_id}</td>
                                <td>${record.contract_details}</td>
                                <td>${record.contract_value}</td>
                                <td>${record.agency_id}</td>
                                <td>${record.agency_name}</td>
                                <td>${record.category_id}</td>
                                <td>${record.category_name}</td>
                            </tr>`;
                });

                html += '</table>';
                $('#result').html(html);
            } else {
                $('#result').html('<p>No data found.</p>');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            $('#result').html('<p>Error fetching data.</p>');
        });
});
