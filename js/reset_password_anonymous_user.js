
$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault();
        var email = $("#email").val();
        var submit = $("#update_password").val();

        $(".form-message").load("../processes/update_password.php", {
            email: email,
            update_password: submit
        });
    });
});
