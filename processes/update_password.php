<?php 
require_once("../processes/send_email.php");
require_once("../processes/server.php");

if(findUser($_POST["email"]) == false)
{
    echo"There is no user with this email";
}
else
{
    if(isset($_POST['update_password']))
    {
        /*2 tokens: 1 for making sure it is the right user,
        1 for pointing the token that we need to check the
        user gets back to the website: timing attack proof*/
        $selector = bin2hex(random_bytes(8));
        //for making sure this is the correct user
        $token =  random_bytes(32);

        $url = "localhost/WAD/html/create-new-password.php?selector=$selector&validator=".bin2hex($token);
        

        $userEmail = $_POST["email"];
        deleteAnyExistentToken($userEmail);
        createToken($userEmail, $selector, $token, $expires);
        $message = '<p>We received a request for reseting your password.</p></br>';
        $message .= '<p>Here is the link for resetting it:</p></br>';
        $message .= '<a href ="' . $url . '">'.$url.'</a>';
        //$headers = "Content-type: text/html\r\n";
        
        //repalce my mail with an actual email
        Send_email::Mail('filip.andrei912@gmail.com','password-reset', $message);
        header('Location: ../html/reset_password_anonymous_user.php?reset=success'); 
    }
    else
    {
        header("Location: ../html/index.php");
    }
}


function deleteAnyExistentToken($email)
{
    $con = Dbh::connect();
    $sql = $con->prepare("DELETE FROM pwdReset WHERE pwdResetEmail=:email");
    $sql->bindParam(":email", $email);
    return $sql->execute();
}
function createToken($email, $selector, $token, $expires)
{
    $expires = date("U") + 1200;//set expire date in 20 minutes
    $hashToken = password_hash($token, PASSWORD_DEFAULT);
    $con = Dbh::connect();
    $sql = $con->prepare("INSERT INTO pwdReset
    (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires)
    VALUES(:email, :selector, :token, $expires);");
    $sql->bindParam(":email", $email);
    $sql->bindParam(":selector", $selector);
    $sql->bindParam(":token", $hashToken);
    $sql->execute();
}
function findUser($email)
{
    $con = Dbh::connect();
    $sql = $con->prepare("SELECT * FROM user WHERE email=:email");
    $sql->bindParam(":email", $email);
    $sql->execute();

    if($sql->fetchAll() != false)
    {
        return true;
    }
}