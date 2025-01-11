$(document).ready(function () {
    $('#addForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '../../logic/event/post_add_event.php', // Updated to point to the correct file
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
