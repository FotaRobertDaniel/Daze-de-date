$(document).ready(function () {
    // When the search form is submitted
    $('#searchModelForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Get the model name entered in the input field
        var modelId = $('#model_id').val();

        // Send AJAX request to search for the model using GET method
        $.ajax({
            type: 'GET',  // Changed to GET as we are calling fetch_model.php
            url: '../../logic/model/get_search_model.php',  // Adjusted path to go up two levels
            data: { model_id: modelId },  // Send model name
            success: function (response) {
                var data = JSON.parse(response); // Parse the JSON response from PHP

                if (data.success) {
                    // If the model is found, display the model info in the search results div
                    var model = data.model;
                    $('#searchResults').html(`
                        <p>Nume: ${model.name}</p>
                        <p>Prenume: ${model.surname}</p>
                        <p>Agentie: ${model.agency}</p>
                        <p>Data nasterii: ${model.date_of_birth}</p>
                        <p>Adresa: ${model.address}</p>
                        <p>Email: ${model.email}</p>
                        <p>Numar de telefon: ${model.phone}</p>
                        <p>ID model: ${model.id}</p>
                    `);

                $('#deleteModelBtn').show();
                } else {
                    // If model is not found, display an error message
                    $('#searchResults').html('<p>No model found with that name.</p>');
                }
            },
            error: function () {
                // Handle error in the AJAX request
                $('#searchResults').html('<p>Error occurred while searching.</p>');
            }
        });
    });
});


    
// Delete model
$('#deleteModelBtn').click(function () {
    var modelId = $('#model_id').val(); // Get the model ID
    console.log(modelId)
    // Confirm deletion
    if (confirm("Are you sure you want to delete this model?")) {
        // Send AJAX request to delete the model
        $.ajax({
            type: 'POST',
            url: '../../logic/model/post_delete_model.php', // Path to the delete script
            data: { model_id: modelId }, // Sending the model ID to delete
            success: function (response) {
                var data = JSON.parse(response); // Parse the JSON response

                if (data.success) {
                    // If deletion is successful
                    alert('Model deleted successfully!');
                    $('#searchResults').html(''); // Clear search results
                    $('#deletemodelBtn').hide(); // Hide the delete button
                } else {
                    // If there's an error with deletion
                    alert('Error deleting model: ' + data.message);
                }
            },
            error: function () {
                // Handle error
                alert('Error occurred while deleting the model.');
            }
        });
    }
});