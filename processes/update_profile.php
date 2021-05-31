<?php 

include_once('server.php');
include_once('../html/profile.php');
include_once('../processes/stringOperations.php');
include_once('userQueries.php');


$email = GetEmail();
$result = UserQueries::GetUserDetails($email);

if(isset($_POST['update']))
{
    $con =  Dbh::connect();
    $first_name = stringOperations::cleanString($_POST['first_name']);
    $last_name = stringOperations::cleanString($_POST['last_name']);
    $phone_nr = stringOperations::cleanString($_POST['phone_nr']);
    
    if($first_name == "" || $last_name == "" || $phone_nr == "" )
    {
        echo "No field can be left empty";
    }
    else
    {
        $id = $result['id'];
        try 
        {
            stringOperations::checkFirstName($first_name);
            stringOperations::checkLastName($last_name);
            stringOperations::checkPhone_nr($phone_nr);
            if(UserQueries::updateDetails($id,$first_name,$last_name,$phone_nr))
            {
                //header("Location: ../html/profile.php");
                ?>
                <script>
                alert("Information updated successfully");
                window.location.href = "../html/profile.php";
                </script>
                
                <?php
            }
        } 
        catch (InvalidFirstNameException $ex) 
        {
            echo $ex->getMessage();
        }
        catch (InvalidLastNameException $ex) 
        {
            echo $ex->getMessage();
        }
        catch (InvalidPhoneNumberException $ex) 
        {
            echo $ex->getMessage();
        }
    }
}
?>