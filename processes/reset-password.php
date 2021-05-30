<?php  
include_once("userQueries.php");
include_once("stringOperations.php");
include_once("../classes/Exceptions/UserExceptions.php");

if (isset($_POST["reset_password_submit"])) 
{
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd_repeat"];

    $errorEmpty = $errorPassword = $errorPasswordRepeat = $errorEmptySelectorValidator = false;

    if(empty($selector) || empty($validator))
    {
        $errorEmptySelectorValidator = true;
    }
    else 
    {
        if(empty($password) || empty($passwordRepeat))
        {
            $errorEmpty = true;
            echo"<span class='form-error'>No field can be left empty!</span>";
        }
        else
        {
            try 
            {
                stringOperations::checkPassword($password);
                if($password == $passwordRepeat)
                {
                    UserQueries::Update_password($selector, $validator, $password);
                }
                else
                {
                    $errorPasswordRepeat = true;
                    echo"<span class='form-error'>The passwords do not match!</span>";
                }
            }
            catch (InvalidPasswordException $ex) 
            {
                $errorPassword = true;
                echo"<span class='form-error'>" . $ex->getMessage() . "</span>";
            }
        }
    }
}
?>
<script>
    $("#pwd, #pwd_repeat").removeClass("input-error");
    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorPassword = "<?php echo $errorPassword; ?>";
    var errorPasswordRepeat = "<?php echo $errorPasswordRepeat; ?>";
    var errorEmptySelectorValidator = "<?php echo $errorEmptySelectorValidator; ?>";

    if(errorEmptySelectorValidator == true)
    {
        window.location.href = "../html/reset_password_anonymous_user.php?newpwd=empty";
    }
    if(errorEmpty == true)
    {
        $("#pwd, #pwd_repeat").addClass("input-error");
    }
    if(errorPassword == true)
    {
        $("#pwd").addClass("input-error");
    }
    if(errorPasswordRepeat == true)
    {
        $("#pwd_repeat").addClass("input-error");
    }
    if(errorEmpty == false && errorPassword == false && errorPasswordRepeat == false && errorEmptySelectorValidator == false)
    {
        $("#pwd, #pwd_repeat").val("");
        alert("Password updated successfully! Now, login!");
        //window.location.href = "../html/log-in.php";
    }
</script>