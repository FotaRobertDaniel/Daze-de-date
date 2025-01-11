document.getElementById('search_form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    var agencyName = document.getElementById('agency_name').value;

    // Make an AJAX request to search for the agency
    fetch('../../logic/agency/get_search_agency.php?agency_name=' + agencyName)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // If the agency is found, populate the form fields
                document.getElementById('agency_id').value = data.agency.id;
                document.getElementById('agency_name_input').value = data.agency.name;
                document.getElementById('agency_address_input').value = data.agency.address;
                document.getElementById('agency_phone_input').value = data.agency.phone;
                document.getElementById('agency_email_input').value = data.agency.email;

                // Show the edit form
                document.getElementById('edit_form').style.display = 'block';
            } else {
                alert('Agency not found.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

// Handle form submission
document.getElementById('edit_form').addEventListener('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    // Make an AJAX request to submit the form data
    fetch('../../logic/agency/post_edit_agency.php', {
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
