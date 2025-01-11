$(document).ready(function () {
    // When the search form is submitted
    $('#searchContractForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Get the contract name entered in the input field
        var contractId = $('#contract_id').val();

        // Send AJAX request to search for the contract using GET method
        $.ajax({
            type: 'GET',  // Changed to GET as we are calling fetch_contract.php
            url: '../../logic/contract/get_search_contract.php',  // Adjusted path to go up two levels
            data: { contract_id: contractId },  // Send contract name
            success: function (response) {
                var data = JSON.parse(response); // Parse the JSON response from PHP

                if (data.success) {
                    // If the contract is found, display the contract info in the search results div
                    var contract = data.contract;
                    $('#searchResults').html(`
                        <p>ID Eveniment: ${contract.id_event}</p>
                        <p>ID Rol: ${contract.id_role}</p>
                        <p>Detalii: ${contract.details}</p>
                        <p>Capital: ${contract.money}</p>
                        <p>ID: ${contract.id}</p>
                    `);

                $('#deleteContractBtn').show();
                } else {
                    // If contract is not found, display an error message
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


    
// Delete contract
$('#deleteContractBtn').click(function () {
    var contractId = $('#contract_id').val(); // Get the contract ID

    // Confirm deletion
    if (confirm("Are you sure you want to delete this contract?")) {
        // Send AJAX request to delete the contract
        $.ajax({
            type: 'POST',
            url: '../../logic/contract/post_delete_contract.php', // Path to the delete script
            data: { contract_id: contractId }, // Sending the contract ID to delete
            success: function (response) {
                var data = JSON.parse(response); // Parse the JSON response

                if (data.success) {
                    // If deletion is successful
                    alert('Contract deleted successfully!');
                    $('#searchResults').html(''); // Clear search results
                    $('#deletecontractBtn').hide(); // Hide the delete button
                } else {
                    // If there's an error with deletion
                    alert('Error deleting contract: ' + data.message);
                }
            },
            error: function () {
                // Handle error
                alert('Error occurred while deleting the contract.');
            }
        });
    }
});