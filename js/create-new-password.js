
$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault();

        var selector = $("#selector").val();
        var validator = $("#validator").val();
        var pwd = $("#pwd").val();
        var pwdRepeat = $("#pwd_repeat").val();
        var submit = $("#reset_password_submit").val();
        

        $(".form-message").load("../processes/reset-password.php", {
            selector: selector,
            validator: validator,
            pwd: pwd,
            pwd_repeat: pwdRepeat,
            reset_password_submit: submit
        });
    });
});
