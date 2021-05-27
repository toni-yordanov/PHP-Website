<?php 
session_start();
include_once('server.php');
include_once('stringOperations.php');
include_once('../classes/user.php');
include_once('../classes/Exceptions/UserExceptions.php');

if(isset($_POST['register']))
{
    $con =  Dbh::connect();
    $first_name = stringOperations::cleanString($_POST['first_name']);
    $last_name = stringOperations::cleanString($_POST['last_name']);
    $email = stringOperations::cleanString($_POST['email']);
    $phone_nr = stringOperations::cleanString($_POST['phone_nr']);
    $password = $_POST['password'];
    $passwordMatch = $_POST['passwordMatch'];
    $rights = "USER";

    if($first_name == "" || $last_name == "" || $email == "" || $phone_nr == "" || $password == "" || $passwordMatch == "")
    {
        echo "No field can be left empty";
        return;
    }
    if(isEmailUnique($email))
    {
        if($password == $passwordMatch)
        {
            try 
            {
                $user = new User($first_name, $last_name, $email, $phone_nr, $password, $rights);
                insertUser($user);
                $_SESSION['email'] = $email;
                header("Location: ../html/profile.php");    //redirects user to profile.php
            } 
            catch (InvalidEmailException $ex) 
            {
                echo $ex->getMessage();
            }
            catch (InvalidPhoneNumberException $ex) 
            {
                echo $ex->getMessage();
            }
            catch (InvalidNameException $ex) 
            {
                echo $ex->getMessage();
            }
            catch (InvalidPasswordException $ex) 
            {
                echo $ex->getMessage();
            }
            catch (InvalidRightsException $ex) 
            {
                echo $ex->getMessage();
            }
        }
        else
            echo "Passwords do not match";
    }
    else
        echo "Email already is in use";
}

function insertUser(User $user)
{
    $con = Dbh::connect();
    $query = $con->prepare("
        INSERT INTO  user (id,first_name,last_name,email,phone_nr,password,rights)

        VALUES(NULL,:first_name,:last_name,:email,:phone_nr,:password,:rights)
    ");
    $firstName = $user->getFirstName();
    $lastName = $user->getLastName();
    $email = $user->getEmail();
    $phoneNumber = $user->getPhone_number();
    $password = $user->getPassword();
    $rights = $user->getRights();

    $query->bindParam(":first_name", $firstName);
    $query->bindParam(":last_name", $lastName);
    $query->bindParam(":email", $email);
    $query->bindParam(":phone_nr", $phoneNumber);
    $query->bindParam(":password", $password);
    $query->bindParam(":rights", $rights);
    
    return $query->execute();
}

function isEmailUnique($email)
{
    $con =  Dbh::connect();
    $query = $con->prepare("
        SELECT * 
        FROM user 
        WHERE email=:email
    ");
    $query->bindParam(":email",$email);

    $query->execute();

    //check how many rows are returned
    if($query->rowCount() == 0)
    {
        return true;
    }
    else 
    {
        return false;
    }
}
?>