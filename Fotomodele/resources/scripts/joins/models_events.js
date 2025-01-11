$(document).ready(function () {
    fetch('../../logic/joins/get_models_events.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let html = '<table>';
                html += '<tr><th>Model ID</th><th>Model Name</th><th>Model Surname</th><th>Event ID</th><th>Event Name</th></tr>';

                data.models.forEach(model => {
                    html += `<tr>
                                <td>${model.model_id}</td>
                                <td>${model.model_name}</td>
                                <td>${model.model_surname}</td>
                                <td>${model.event_id}</td>
                                <td>${model.event_name}</td>
                            </tr>`;
                });

                html += '</table>';
                $('#result').html(html);
            } else {
                $('#result').html('<p>No models or events found.</p>');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            $('#result').html('<p>Error fetching data.</p>');
        });
});
