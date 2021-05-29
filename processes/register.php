<?php 
session_start();
include_once('userQueries.php');
include_once('stringOperations.php');
include_once('../classes/user.php');
include_once('../classes/Exceptions/UserExceptions.php');

if(isset($_POST['submit_register']))
{
    //$con =  Dbh::connect();
    $first_name = stringOperations::cleanString($_POST['first_name']);
    $last_name = stringOperations::cleanString($_POST['last_name']);
    $email = stringOperations::cleanString($_POST['email']);
    $phone_nr = stringOperations::cleanString($_POST['phone_nr']);
    $password = $_POST['password'];
    $passwordMatch = $_POST['passwordMatch'];
    $rights = "USER";

    $errorEmpty = false;
    $errorEmail = false;
    $errorFirstName = false;
    $errorLastName = false;
    $errorEmail = false;
    $errorPhoneNumber = false;
    $errorPassword = false;
    $errorPasswordMatch = false;
    $errorRights = false;

    if($first_name == "" || $last_name == "" || $email == "" || $phone_nr == "" || $password == "" || $passwordMatch == "")
    {
        echo"<span class='form-error'>No field can be left empty!</span>";
        $errorEmpty= true;
    }
    else
    {
        try
        {
            $user = new User($first_name, $last_name, $email, $phone_nr, $password, $rights);
            if(userQueries::IsEmailUnique($email) == false)
            {
                echo"<span class='form-error'>Email already is in use!</span>";
                $errorEmail = true;
            }
            elseif($password != $passwordMatch)
            {
                echo"<span class='form-error'>Passwords do not match!</span>";
                $errorPasswordMatch= true;
            }
            else 
            {
                userQueries::InsertUser($user);
                $_SESSION['email'] = $email;
                //header("Location: ../html/profile.php");    //redirects user to profile.php
            }
        } 
        catch (InvalidEmailException $ex) 
        {
            echo "<span class='form-error'>" . $ex->getMessage() ."</span>";
            $errorEmail = true;
        }
        catch (InvalidPhoneNumberException $ex) 
        {
            echo "<span class='form-error'>" . $ex->getMessage() ."</span>";
            $errorPhoneNumber = true;
        }
        catch (InvalidFirstNameException $ex) 
        {
            echo "<span class='form-error'>" . $ex->getMessage() ."</span>";
            $errorFirstName = true;
        }
        catch (InvalidLastNameException $ex) 
        {
            echo "<span class='form-error'>" . $ex->getMessage() ."</span>";
            $errorLastName = true;
        }
        catch (InvalidPasswordException $ex) 
        {
            echo "<span class='form-error'>" . $ex->getMessage() ."</span>";
            $errorPassword = true;
        }
        catch (InvalidRightsException $ex) 
        {
            echo "<span class='form-error'>" . $ex->getMessage() ."</span>";
            $errorRights = true;
        }
    }
}
else
{
    echo"<span class='form-error'>There was an error :(</span>";
}
?>
<script>
    $("#first-name, #last-name, #email, #phone-number, #password, #password-repeat").removeClass("input-error");
    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorFirstName = "<?php echo $errorFirstName; ?>";
    var errorLastName = "<?php echo $errorLastName; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";
    var errorPhoneNumber = "<?php echo $errorPhoneNumber; ?>";
    var errorPassword = "<?php echo $errorPassword; ?>";
    var errorPasswordMatch = "<?php echo $errorPasswordMatch; ?>" ;
    var errorRights = "<?php echo $errorRights; ?>";

    if(errorEmpty == true)
    {
        $("#first-name, #last-name, #email, #phone-number, #password, #password-repeat").addClass("input-error");
    }
    if(errorFirstName == true)
    {
        $("#first-name").addClass("input-error");
    }
    if(errorLastName == true)
    {
        $("#last-name").addClass("input-error");
    }
    if(errorEmail == true)
    {
        $("#email").addClass("input-error");
    }
    if(errorPhoneNumber == true)
    {
        $("#phone-number").addClass("input-error");
    }
    if(errorPassword == true)
    {
        $("#password").addClass("input-error");
    }
    if(errorPasswordMatch == true)
    {
        $("#password-repeat").addClass("input-error");
    }
    if(errorEmpty == false && errorFirstName == false && errorLastName == false && errorEmail == false && errorPhoneNumber == false && errorPassword == false && errorPasswordMatch == false && errorRights == false)
    {
        $("#first-name, #last-name, #email, #phone-number, #password, #password-repeat").val("");
        window.location.href = "../html/profile.php";
    }
</script>


