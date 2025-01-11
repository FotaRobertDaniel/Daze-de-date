$(document).ready(function () {
    // When the search form is submitted
    $('#searchCategoryForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Get the category ID entered in the input field
        var categoryId = $('#category_id').val();

        // Send AJAX request to search for the category using GET method
        $.ajax({
            type: 'GET',  // Changed to GET as we are calling get_search_category.php
            url: '../../logic/category/get_search_category.php',  // Adjusted path for category
            data: { category_id: categoryId },  // Send category ID
            success: function (response) {
                var data = JSON.parse(response); // Parse the JSON response from PHP

                if (data.success) {
                    // If the category is found, display the category info in the search results div
                    var category = data.category;
                    $('#searchResults').html(`
                        <p>Nume Categorie: ${category.name}</p>
                        <p>Descriere: ${category.description}</p>
                        <p>ID: ${category.id}</p>
                    `);
                } else {
                    // If category is not found, display an error message
                    $('#searchResults').html('<p>No category found with that ID.</p>');
                }
            },
            error: function () {
                // Handle error in the AJAX request
                $('#searchResults').html('<p>Error occurred while searching.</p>');
            }
        });
    });
});
