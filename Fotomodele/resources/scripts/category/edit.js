document.getElementById('search_form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    var categoryName = document.getElementById('category_id').value;

    // Make an AJAX request to search for the category
    fetch('../../logic/category/get_search_category.php?category_id=' + categoryName)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // If the category is found, populate the form fields
                document.getElementById('category_id').value = data.category.id;
                document.getElementById('category_name_input').value = data.category.name;
                document.getElementById('category_description_input').value = data.category.description;

                // Show the edit form
                document.getElementById('edit_form').style.display = 'block';
            } else {
                alert('Category not found.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

// Handle form submission for updating category details
document.getElementById('edit_form').addEventListener('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    // Make an AJAX request to submit the form data for updating the category
    fetch('../../logic/category/post_edit_category.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Show the response message
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
