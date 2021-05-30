
$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault();
        var firstName = $("#first-name").val();
        var lastName = $("#last-name").val();
        var email = $("#email").val();
        var phoneNumber = $("#phone-number").val();
        var password = $("#password").val();
        var passwordRepeat = $("#password-repeat").val();
        var submit = $("#btn-register").val();
        $(".form-message").load("../processes/register.php", {
            first_name: firstName,
            last_name: lastName,
            email: email,
            phone_nr: phoneNumber,
            password: password,
            passwordMatch: passwordRepeat,
            submit_register: submit
        });
    });
});
