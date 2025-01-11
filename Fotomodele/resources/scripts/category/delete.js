$(document).ready(function () {
    // When the search form is submitted
    $('#searchCategoryForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Get the category ID entered in the input field
        var categoryId = $('#category_id').val();

        // Send AJAX request to search for the category using GET method
        $.ajax({
            type: 'GET',  // Using GET to search for the category
            url: '../../logic/category/get_search_category.php',  // Adjusted path
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

                    $('#deleteCategoryBtn').show(); // Show delete button
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

    // Delete category
    $('#deleteCategoryBtn').click(function () {
        var categoryId = $('#category_id').val(); // Get the category ID

        // Confirm deletion
        if (confirm("Are you sure you want to delete this category?")) {
            // Send AJAX request to delete the category
            $.ajax({
                type: 'POST',
                url: '../../logic/category/post_delete_category.php', // Path to the delete script
                data: { category_id: categoryId }, // Sending the category ID to delete
                success: function (response) {
                    var data = JSON.parse(response); // Parse the JSON response

                    if (data.success) {
                        // If deletion is successful
                        alert('Category deleted successfully!');
                        $('#searchResults').html(''); // Clear search results
                        $('#deleteCategoryBtn').hide(); // Hide the delete button
                    } else {
                        // If there's an error with deletion
                        alert('Error deleting category: ' + data.message);
                    }
                },
                error: function () {
                    // Handle error
                    alert('Error occurred while deleting the category.');
                }
            });
        }
    });
});
