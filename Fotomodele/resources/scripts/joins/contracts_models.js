$(document).ready(function () {
    fetch('../../logic/joins/get_contracts_models.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let html = '<table><tr><th>Contract ID</th><th>Contract Details</th><th>Model Name</th><th>Model Surname</th></tr>';
                data.contracts.forEach(contract => {
                    html += `<tr>
                                <td>${contract.contract_id}</td>
                                <td>${contract.contract_details}</td>
                                <td>${contract.model_name}</td>
                                <td>${contract.model_surname}</td>
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
