$(document).ready(function () {
    // When the search form is submitted
    $('#searchAgencyForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Get the agency name entered in the input field
        var agencyName = $('#agency_name').val();

        // Send AJAX request to search for the agency
        $.ajax({
            type: 'GET', // Using GET to send the search request
            url: '../../logic/agency/get_search_agency.php', // The correct path to fetch_agency.php
            data: { agency_name: agencyName }, // Sending agency name
            success: function (response) {
                var data = JSON.parse(response); // Parse the JSON response from PHP

                if (data.success) {
                    // If the agency is found, display the agency info in the search results div
                    var agency = data.agency;

                    $('#searchResults').html(`
                        <p>Agency Name: ${agency.name}</p>
                        <p>Address: ${agency.address}</p>
                        <p>Phone: ${agency.phone}</p>
                        <p>Email: ${agency.email}</p>
                        <p>ID: ${agency.id}</p>
                        <input type="hidden" id="agency_id" value="${agency.id}" />
                    `);

                    // Show the delete button
                    $('#deleteAgencyBtn').show();
                } else {
                    // If agency is not found, display an error message
                    $('#searchResults').html('<p>No agency found with that name.</p>');
                    $('#deleteAgencyBtn').hide(); // Hide the delete button if no agency is found
                }
            },
            error: function () {
                // Handle error
                $('#searchResults').html('<p>Error occurred while searching.</p>');
                $('#deleteAgencyBtn').hide(); // Hide the delete button if there was an error
            }
        });
    });

    // Delete Agency
    $('#deleteAgencyBtn').click(function () {
        var agencyId = $('#agency_id').val(); // Get the agency ID

        // Confirm deletion
        if (confirm("Are you sure you want to delete this agency?")) {
            // Send AJAX request to delete the agency
            $.ajax({
                type: 'POST',
                url: '../../logic/agency/post_delete_agency.php', // Path to the delete script
                data: { agency_id: agencyId }, // Sending the agency ID to delete
                success: function (response) {
                    var data = JSON.parse(response); // Parse the JSON response

                    if (data.success) {
                        // If deletion is successful
                        alert('Agency deleted successfully!');
                        $('#searchResults').html(''); // Clear search results
                        $('#deleteAgencyBtn').hide(); // Hide the delete button
                    } else {
                        // If there's an error with deletion
                        alert('Error deleting agency: ' + data.message);
                    }
                },
                error: function () {
                    // Handle error
                    alert('Error occurred while deleting the agency.');
                }
            });
        }
    });
});
