
$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault();
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        var submit = $("#send_mail").val();
        $(".form-message").load("../processes/contact.php", {
            name: name,
            email: email,
            message: message,
            send_mail: submit
        });
    });
});


