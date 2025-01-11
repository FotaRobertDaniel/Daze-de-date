$(document).ready(function () {
    fetch('../../logic/joins/get_events_contracts.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let html = '<table>';
                html += '<tr><th>Event ID</th><th>Event Name</th><th>Contract ID</th><th>Contract Details</th><th>Contract Value</th></tr>';

                data.events.forEach(event => {
                    html += `<tr>
                                <td>${event.event_id}</td>
                                <td>${event.event_name}</td>
                                <td>${event.contract_id}</td>
                                <td>${event.contract_details}</td>
                                <td>${event.contract_value}</td>
                            </tr>`;
                });

                html += '</table>';
                $('#result').html(html);
            } else {
                $('#result').html('<p>No events or contracts found.</p>');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            $('#result').html('<p>Error fetching data.</p>');
        });
});
