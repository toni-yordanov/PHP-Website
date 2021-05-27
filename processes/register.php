<?php 
session_start();
include_once('userQueries.php');
include_once('stringOperations.php');
include_once('../classes/user.php');
include_once('../classes/Exceptions/UserExceptions.php');

if(isset($_POST['register']))
{
    //$con =  Dbh::connect();
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
    if(userQueries::IsEmailUnique($email))
    {
        if($password == $passwordMatch)
        {
            try 
            {
                $user = new User($first_name, $last_name, $email, $phone_nr, $password, $rights);
                userQueries::InsertUser($user);
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




?>