$(document).ready(function () {
    // Handle Search Form Submission
    $('#searchForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        const modelId = $('#model_id').val();

        // AJAX request to fetch model details
        $.ajax({
            type: 'GET',
            url: '../../logic/model/get_search_model.php',
            data: { model_id: modelId },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Populate the edit form
                    $('#model_id_input').val(response.model.id);
                    $('#name_input').val(response.model.name);
                    $('#surname_input').val(response.model.surname);
                    $('#dob_input').val(response.model.dob);
                    $('#agency_input').val(response.model.agency);
                    $('#address_input').val(response.model.address);
                    $('#email_input').val(response.model.email);
                    $('#phone_input').val(response.model.phone);

                    $('#editForm').show(); // Show the edit form
                    fetchContracts(modelId); // Fetch contracts associated with the model
                } else {
                    $('#message').html('Model not found.').addClass('error');
                }
            },
            error: function () {
                $('#message').html('Error while searching for the model.').addClass('error');
            },
        });
    });

    // Handle Edit Form Submission
    $('#editForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        const formData = $(this).serialize();

        // AJAX request to update the model
        $.ajax({
            type: 'POST',
            url: '../../logic/model/post_edit_model.php',
            data: formData,
            success: function (response) {
                $('#message').html(response).addClass('success');
            },
            error: function () {
                $('#message').html('Error while updating the model.').addClass('error');
            },
        });
    });

    // Function to fetch contracts associated with the model
    function fetchContracts(modelId) {
        $.ajax({
            type: 'GET',
            url: '../../logic/model/get_model_contracts.php',
            data: { model_id: modelId },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    const contractsHtml = response.contracts
                        .map(
                            (contract) =>
                                `<li>Contract ID: ${contract.id}, Event ID: ${contract.id_event}, Role ID: ${contract.id_role}, Details: ${contract.details}, Money: ${contract.money}</li>`
                        )
                        .join('');
                    $('#contracts_list').html(`<ul>${contractsHtml}</ul>`);
                    $('#contracts_section').show();
                } else {
                    $('#contracts_list').html('<p>No contracts associated with this model.</p>');
                    $('#contracts_section').show();
                }
            },
            error: function () {
                $('#contracts_list').html('<p>Error while fetching contracts.</p>');
                $('#contracts_section').show();
            },
        });
    }
});
