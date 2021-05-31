<?php 
session_start();
include_once('userQueries.php');
include_once('stringOperations.php');
include_once('../classes/Exceptions/UserExceptions.php');

//declare vars 
$email = $password = $newPassword = $newPasswordRepeat = "";


$errorEmpty = $errorNewPassword = $errorNewPasswordRepeat = $errorNoUser = false;


if(isset($_POST['reset_password']))
{
    //store required data in variables
    $email = $_SESSION['email'];
    $password = $_POST['current_pwd'];
    $newPassword = $_POST['new_pwd'];
    $newPasswordRepeat = $_POST['new_pwd_repeat'];

    if(empty($password) || empty($newPassword) || empty($newPasswordRepeat))
    {
        $errorEmpty = true;
        echo"<span class='form-error'>No field can be left empty!</span>";
    }
    else
    {
        try
        {
            stringOperations::checkPassword($newPassword);
            if($newPassword == $newPasswordRepeat)
            {
                if(UserQueries::CheckLogin($email,stringOperations::cleanPassword($password)))
                {
                    userQueries::UpdatePassword($email, stringOperations::cleanPassword($newPassword));
                    session_destroy();
                }
                else
                {
                    $errorNoUser = true;
                    echo"<span class='form-error'>Wrong current password!</span>";
                }
            }
            else
            {
                echo"<span class='form-error'>Passwords do not match!</span>";
                $errorNewPasswordRepeat = true;
            }

        }
        catch (InvalidPasswordException $ex)
        {
            $errorNewPassword = true;
            echo"<span class='form-error'>" . $ex->getMessage() ."</span>";
        }
    }
}


?>
<script>
    $("#current_pwd, #new_pwd, #new_pwd_repeat").removeClass("input-error");
    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorNewPassword = "<?php echo $errorNewPassword; ?>";
    var errorNewPasswordRepeat = "<?php echo $errorNewPasswordRepeat; ?>";
    var errorNoUser = "<?php echo $errorNoUser; ?>";
    


    if(errorEmpty == true)
    {
        $("#current_pwd, #new_pwd, #new_pwd_repeat").addClass("input-error");
    }
    
    if(errorNewPassword == true)
    {
        $("#new_pwd").addClass("input-error");
    }
    if(errorNewPasswordRepeat == true)
    {
        $("#new_pwd_repeat").addClass("input-error");
    }
    
    if(errorEmpty == false && errorNewPassword == false && errorNewPasswordRepeat == false && errorNoUser == false)
    {
        $("#current_pwd, #new_pwd, #new_pwd_repeat").val("");
        alert("Password updated successfully! Please log in again.");
        window.parent.location.href = "../html/log-in.php";
    }
</script>
