
$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        var submit = $("#log-in").val();

        $(".form-message").load("../processes/login.php", {
            email: email,
            password: password,
            submit_login: submit
        });
    });
});
