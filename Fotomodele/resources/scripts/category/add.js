$(document).ready(function () {
    $('#addForm').submit(function (category) {
        category.preventDefault(); // Prcategory default form submission

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '../../logic/category/post_add_category.php', // Updated to point to the correct file
            data: formData,
            success: function (response) {
                const messageBox = $('#mesaj');
                if (response.trim() !== "") {
                    messageBox.html(response).addClass('success'); // Add success class for styling
                } else {
                    messageBox.html('Adaugarea a eșuat!').addClass('error'); // Add error class
                }
            },
            error: function () {
                $('#mesaj').html('Eroare la procesare!').addClass('error'); // Error message with class
            },
        });
    });
});
