
$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault();
        var current_pwd = $("#current_pwd").val();
        var new_pwd = $("#new_pwd").val();
        var new_pwd_repeat = $("#new_pwd_repeat").val();
        var reset_password = $("#reset_password").val();
       

        $(".form-message").load("../processes/update_password_logged_user.php", {
            current_pwd: current_pwd,
            new_pwd: new_pwd,
            new_pwd_repeat: new_pwd_repeat,
            reset_password: reset_password
        });
    });
});
