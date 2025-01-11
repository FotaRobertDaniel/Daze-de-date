$(document).ready(function () {
    // When the search form is submitted
    $('#searchAgencyForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Get the agency name entered in the input field
        var agencyName = $('#agency_name').val();

        // Send AJAX request to search for the agency using GET method
        $.ajax({
            type: 'GET',  // Changed to GET as we are calling fetch_agency.php
            url: '../../logic/agency/get_search_agency.php',  // Adjusted path to go up two levels
            data: { agency_name: agencyName },  // Send agency name
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
                    `);
                } else {
                    // If agency is not found, display an error message
                    $('#searchResults').html('<p>No agency found with that name.</p>');
                }
            },
            error: function () {
                // Handle error in the AJAX request
                $('#searchResults').html('<p>Error occurred while searching.</p>');
            }
        });
    });
});
