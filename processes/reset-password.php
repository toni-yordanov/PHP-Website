<?php  
include_once("../processes/server.php");
include_once("stringOperations.php");


if (isset($_POST["reset-password-submit"])) 
{
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if(empty($selector) || empty($validator))
    {
        header("Location: ../html/reset_password_anonymous_user.php?newpwd=empty"); 
        exit();
    }
    elseif($password != $passwordRepeat)
    {
        header("Location: ../html/reset_password_anonymous_user.php?newpwd=mismatch"); 
        exit();
    }
    update_password($selector, $validator, $password);
}
else
{
    header("Location: ../html/index.php");
}



function update_password($selector, $validator, $password)
{
    $now = date("U");
    $con = Dbh::connect(); 
    $sql = $con->prepare("SELECT * FROM pwdreset WHERE pwdResetSelector=:selector AND pwdResetExpires >=$now");
    $sql->bindParam(":selector", $selector);
    $sql->execute();
    $result = $sql->fetchAll();

    //echo json_encode($result);

    if($result == false)
    {
        echo "You need to re-submit your request(No token found)";
        exit();
    }
    else
    {
        $tokenBinary = hex2bin($validator);
        $tokenCheck = password_verify($tokenBinary, $result[0]["pwdResetToken"]);

        if($tokenCheck == false)
        {
            echo "You need to re-submit your request(Token mismatch)";
            exit();
        }
        elseif($tokenCheck == true)
        {
            $tokenEmail = $result[0]["pwdResetEmail"];
            $sqlg = $con->prepare("SELECT * FROM user WHERE email=:email");
            $sqlg->bindParam(":email",$tokenEmail);
            $sqlg->execute();
            $result = $sqlg->fetchAll();

            if($result == false)
            {
                echo "There was an error!";
                exit();
            }
            else
            {
                $sqlu = $con->prepare("UPDATE user SET password=:newPassword WHERE email=:email;");
                $newPassword = stringOperations::cleanPassword($password);
                $sqlu->bindParam(":newPassword", $newPassword);
                $sqlu->bindParam(":email", $tokenEmail);
                $sqlu->execute();

                //delete the token created
                $sqlStatement = $con->prepare("DELETE FROM pwdReset WHERE pwdResetEmail=:email");
                $sqlStatement->bindParam(":email", $tokenEmail);
                $sqlStatement->execute();
                header("Location: ../html/reset_password_anonymous_user.php?newpwd=passwordupdated");
            }
        }
    }

}
