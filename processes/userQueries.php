<?php 

include_once('server.php');
//helper class
class UserQueries 
{
    public static function CheckLogin($email,$password)
    {
        $con = Dbh::connect();
        $query = $con->prepare("
        
            SELECT * FROM user WHERE email=:email AND password=:password
        ");
        $query->bindParam(":email",$email);
        $query->bindParam(":password",$password);

        $query->execute();

        //check how many rows are returned
        if($query->rowCount() == 1)
        {
            return true;
        }
        else {
            return false;
        }
    }
    public static function FindUser($email)
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
    public static function GetUserDetails($var)
    {
        $con = Dbh::connect();
        $query = $con->prepare("
            SELECT *
            FROM user
            WHERE email = :email
        ");
        $query->bindParam(":email",$var);
        $query->execute();

        $result = $query->fetch();
        return $result;
    }
    public static function updateDetails($id,$first_name,$last_name,$phone_nr)
    {
        $con =  Dbh::connect();
        $query = $con->prepare("
        UPDATE user
        SET first_name=:first_name, last_name=:last_name, phone_nr=:phone_nr
        WHERE id=:id
        ");
        $query->bindParam(":first_name",$first_name);
        $query->bindParam(":last_name",$last_name);
        $query->bindParam(":phone_nr",$phone_nr);
        $query->bindParam(":id",$id);

        return $query->execute();
    }
    public static function UpdatePassword($email, $newPassword)
    {
        $con = Dbh::connect();
        $sql = $con->prepare("
            UPDATE user SET password=:newPassword WHERE email = '$email';
        ");
        $sql->bindParam(":newPassword", $newPassword);
        $sql->execute();
    }
    public static function IsEmailUnique($email)
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
    public static function InsertUser(User $user)
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
    public static function RemoveUser($email)
    {
        
        $con = Dbh::connect();
        //I really could not use * and had to name each column name, otherwise it threw an error
        //copy the user to deleted_user
        $quey = $con->prepare("
            INSERT INTO deleted_user (id,first_name,last_name,email,phone_nr,password,rights)
            SELECT id,first_name,last_name,email,phone_nr,password,rights
            FROM user
            WHERE email = :email
            ");
        $quey->bindParam(":email",$email);
        $quey->execute();
        
        //delete the user from user table
        $quey = $con->prepare("
            DELETE 
            FROM user
            WHERE email = :email
        ");
        $quey->bindParam(":email",$email);
        $quey->execute();
    }

    //split this into methods
    public static function Update_password($selector, $validator, $password)
    {
        $now = date("U");
        $con = Dbh::connect(); 
        $sql = $con->prepare("SELECT * FROM pwdreset WHERE pwdResetSelector=:selector AND pwdResetExpires >=$now");
        $sql->bindParam(":selector", $selector);
        $sql->execute();
        $result = $sql->fetchAll();

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
    public static function CreateToken($email, $selector, $token, $expires)
    {
        $expires = date("U") + 1200;//set expire date in 20 minutes
        $hashToken = password_hash($token, PASSWORD_DEFAULT);
        $con = Dbh::connect();
        $sql = $con->prepare("
            INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires)
            VALUES(:email, :selector, :token, $expires);");
        $sql->bindParam(":email", $email);
        $sql->bindParam(":selector", $selector);
        $sql->bindParam(":token", $hashToken);
        $sql->execute();
    }
    public static function DeleteAnyExistentToken($email)
    {
        $con = Dbh::connect();
        $sql = $con->prepare("DELETE FROM pwdReset WHERE pwdResetEmail=:email");
        $sql->bindParam(":email", $email);
        return $sql->execute();
    }

}

?>