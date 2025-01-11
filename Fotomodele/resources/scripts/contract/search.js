$(document).ready(function () {
    // When the search form is submitted
    $('#searchContractForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Get the agency name entered in the input field
        var contractId = $('#contract_id').val();

        // Send AJAX request to search for the agency using GET method
        $.ajax({
            type: 'GET',  // Changed to GET as we are calling fetch_agency.php
            url: '../../logic/contract/get_search_contract.php',  // Adjusted path to go up two levels
            data: { contract_id: contractId },  // Send agency name
            success: function (response) {
                var data = JSON.parse(response); // Parse the JSON response from PHP

                if (data.success) {
                    // If the agency is found, display the agency info in the search results div
                    var contract = data.contract;
                    $('#searchResults').html(`
                        <p>ID Eveniment: ${contract.id_event}</p>
                        <p>ID Rol: ${contract.id_role}</p>
                        <p>Detalii: ${contract.details}</p>
                        <p>Capital: ${contract.money}</p>
                        <p>ID: ${contract.id}</p>
                    `);
                } else {
                    // If agency is not found, display an error message
                    $('#searchResults').html('<p>No contract found with that name.</p>');
                }
            },
            error: function () {
                // Handle error in the AJAX request
                $('#searchResults').html('<p>Error occurred while searching.</p>');
            }
        });
    });
});
