<?php 
require_once("../processes/send_email.php");
require_once("../processes/server.php");
include_once('userQueries.php');
include_once("stringOperations.php");

$errorEmpty = $errorEmail = $errorNoUser = false;

if(isset($_POST['update_password']))
{
    $email = $_POST["email"];
    if(empty($email))
    {
        $errorEmpty = true;
        echo"<span class='form-error'>Fill in an email!</span>";
    }
    else
    {
        try
        {
            stringOperations::checkEmail($email);

            if(userQueries::FindUser($email))
            {
                /*2 tokens: 1 for making sure it is the right user,
                1 for pointing the token that we need to check the
                user gets back to the website: timing attack proof*/
                $selector = bin2hex(random_bytes(8));
                //for making sure this is the correct user
                $token =  random_bytes(32);

                $url = "localhost/WAD/html/create-new-password.php?selector=$selector&validator=".bin2hex($token);

                userQueries::DeleteAnyExistentToken($email);
                userQueries::CreateToken($email, $selector, $token);
                $message = '<p>We received a request for reseting your password.</p></br>';
                $message .= '<p>Here is the link for resetting it:</p></br>';
                $message .= '<a href ="' . $url . '">'.$url.'</a>';
                //$headers = "Content-type: text/html\r\n";
                
                //repalce my mail with an actual email
                Send_email::Mail('filip.andrei912@gmail.com','password-reset', $message);
                //header('Location: ../html/reset_password_anonymous_user.php?reset=success'); 
            }
            else
            {
                $errorNoUser = true;
                echo"<span class='form-error'>There is no user with this email!</span>";
            }
        }
        catch(InvalidEmailException $ex)
        {
            $errorEmail = true;
            echo"<span class='form-error'>". $ex->getMessage() ."</span>";
        }
    }
}
?>
<script>
    $("#email, #update_password").removeClass("input-error");
    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";
    var errorNoUser = "<?php echo $errorNoUser; ?>";

    if(errorEmpty == true)
    {
        $("#email").addClass("input-error");
    }
    if(errorEmail == true)
    {
        $("#email").addClass("input-error");
    }
    if(errorEmpty == false && errorEmail == false && errorNoUser == false)
    {
        $("#email").val("");
        window.location.href = "../html/reset_password_anonymous_user.php?reset=success";
    }
</script>




