$(document).ready(function () {
    // Fetch data from the server when the page loads
    fetch('../../logic/joins/get_events_categories.php')
        .then(response => response.json()) // Parse the JSON response
        .then(data => {
            // Check if the query was successful
            if (data.success) {
                // Build the HTML table for displaying the data
                let html = '<table>';
                html += '<tr><th>Event ID</th><th>Event Name</th><th>Category ID</th><th>Category Name</th><th>Category Description</th></tr>';

                // Iterate through the events array and populate the table rows
                data.events.forEach(event => {
                    html += `<tr>
                                <td>${event.event_id}</td>
                                <td>${event.event_name}</td>
                                <td>${event.category_id}</td>
                                <td>${event.category_name}</td>
                                <td>${event.category_description}</td>
                            </tr>`;
                });

                html += '</table>'; // Close the table
                $('#result').html(html); // Display the table in the `#result` div
            } else {
                // If no data was found, display a message
                $('#result').html('<p>No events or categories found.</p>');
            }
        })
        .catch(error => {
            // Handle any errors during the fetch process
            console.error('Error:', error);
            $('#result').html('<p>Error fetching data.</p>');
        });
});
