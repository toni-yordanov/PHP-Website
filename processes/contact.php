<?php 
include_once('send_email.php');
include_once('stringOperations.php');

if(isset($_POST['send_mail']))
{
    $name= strip_tags($_POST['name']) ;
    $email = strip_tags($_POST['email']);
    $message = strip_tags($_POST['message']);

    $errorEmpty=$errorName=$errorEmail = false;

    if(empty($name) || empty($email) || empty($message))
    {
        $errorEmpty = true;
        echo"<span class='form-error'>No field can be left empty!</span>";
    }
    else
    {
        try
        {
            stringOperations::checkName($name);
            stringOperations::checkEmail($email);
        }
        catch(InvalidNameException $ex)
        {
            echo"<span class='form-error'>" . $ex->getMessage() . "</span>";
            $errorName = true;
        }
        catch(InvalidEmailException $ex)
        {
            echo"<span class='form-error'>" . $ex->getMessage() . "</span>";
            $errorEmail = true;
        }
    }
    if($errorEmpty == false && $errorName== false && $errorEmail == false)
    {
        $body = "Name: " .$name . "<br> email address: " . $email ." <br>" . $message;
        //send a mail to an administrator
        Send_email::Mail("filip.andrei912@gmail.com", "contact message", $body);
        echo "Message sent!";
    }
    
}
?>
<script>
    $("#name, #email, #message").removeClass("input-error");
    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorName = "<?php echo $errorName; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";

    if(errorEmpty == true)
    {
        $("#name, #email, #message").addClass("input-error");
    }
    if(errorName == true)
    {
        $("#name").addClass("input-error");
    }
    if(errorEmail == true)
    {
        $("#email").addClass("input-error");
    }
    if(errorEmpty == false && errorName == false && errorEmail == false)
    {
        $("#name, #email, #message").val("");
    }
</script>