document.getElementById('search_form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    var contractId = document.getElementById('contract_id').value;

    // Make an AJAX request to fetch contract details
    fetch('../../logic/contract/get_search_contract.php?contract_id=' + contractId)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // If the contract is found, populate the form fields
                document.getElementById('contract_id_input').value = data.contract.id;
                document.getElementById('event_id_input').value = data.contract.id_event;
                document.getElementById('role_id_input').value = data.contract.id_role;
                document.getElementById('details_input').value = data.contract.details;
                document.getElementById('money_input').value = data.contract.money;

                // Show the edit form
                document.getElementById('edit_form').style.display = 'block';

                // Fetch related models for this contract
                fetchModelsForContract(contractId);
            } else {
                alert('Contract not found.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

// Function to fetch and display models related to the contract
function fetchModelsForContract(contractId) {
    fetch('../../logic/contract/get_models_for_contract.php?contract_id=' + contractId)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                var modelsList = data.models.map(model => `<li>${model.name} ${model.surname}</li>`).join('');
                document.getElementById('models_list').innerHTML = `<ul>${modelsList}</ul>`;

                // Show models list section
                document.getElementById('models_list_section').style.display = 'block';
            } else {
                document.getElementById('models_list').innerHTML = '<p>No models associated with this contract.</p>';
                document.getElementById('models_list_section').style.display = 'block';
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Handle contract update form submission
document.getElementById('edit_form').addEventListener('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    // Make an AJAX request to update the contract details
    fetch('../../logic/contract/post_edit_contract.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
