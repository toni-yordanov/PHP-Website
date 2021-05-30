<?php 

session_start();

include_once('userQueries.php');
include_once('stringOperations.php');

if(isset($_POST['submit_login']))
{
    $email = stringOperations::cleanString($_POST['email']);
    $password = stringOperations::cleanPassword($_POST['password']);
    
    $errorEmpty = $errorEmail = $errorNoUser = "";

    if($email == "" || $password == "")
    {
        $errorEmpty = true;
        echo"<span class='form-error'>No field can be left empty!</span>";
    }
    else 
    {
        try
        {
            stringOperations::checkEmail($email);
            if(userQueries::CheckLogin($email,$password))
            {
                $_SESSION['email'] = $email;
            }
            else
            {
                $errorNoUser = true;
                echo"<span class='form-error'>Wrong email or password!</span>";
            }
        }
        catch(InvalidEmailException $ex)
        {
            echo"<span class='form-error'>" . $ex->getMessage() ."</span>";
            $errorEmail = true;
        }
    }
}
?>
<script>
    $("#email, #password").removeClass("input-error");
    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";
    var errorNoUser = "<?php echo $errorNoUser; ?>";
    if(errorEmpty == true)
    {
        $("#email, #password").addClass("input-error");
    }
    if(errorEmail == true)
    {
        $("#email").addClass("input-error");
    }
    if(errorEmpty == false && errorEmail == false && errorNoUser == false)
    {
        $("#email, #password").val("");
        window.location.href = "../html/profile.php";
    }
</script>