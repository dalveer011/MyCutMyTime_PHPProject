<?php

class LoginAuthentication
{
    //function for authentication for a valid user
    public static function isValidUser($email,$password){
            $db = Database::getConnection();
            $query = "select password from role where email=:email";
            $statement = $db->prepare($query);
            $statement->bindValue(':email',$email);
            $statement->execute();
            if($statement->rowCount() != 0){
                $result = $statement->fetch(PDO::FETCH_ASSOC);
               //password_verify returns true if given string matches the hash provided in second argument
                return password_verify($password,$result["password"]);
            }
            else{
                return false;
            }
        }
    public static  function getRole($email){
        $db = Database::getConnection();
        $query = "select role from role where email=:email";
        $statement = $db->prepare($query);
        $statement->bindValue(':email',$email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['role'];
    }
    //function to check if email is already registered in the database
    public static function IsEmailAlreadyThere($email){
        $db = Database::getConnection();
        $query = "select email from role where email=:email";
        $statement = $db->prepare($query);
        $statement->bindValue(':email',$email);
        $statement->execute();
        if($statement->rowCount() != 0){
            return true;
        }else{
            return false;
        }
    }
    //function to check if user verified the account or not
    public static function isActivated($email){

            $db = Database::getConnection();
            $query = "select activationtoken from role where email=:email";
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result['activationtoken'] == "activated") {
                return true;
            } else if($result['activationtoken'] == "deactivated"){
                return "deactivated";
            }else{
                return "under verification";
            }
    }
    public static function changePassword($password,$forgotPasswordToken){
        $db = Database::getConnection();
        $encPassword = password_hash($password,PASSWORD_BCRYPT);
        $query = "update role set password=:password,forgotpasswordtoken='' where forgotpasswordtoken=:forgotpasswordtoken";
        $statement = $db->prepare($query);
        $statement->bindValue(':password',$encPassword);
        $statement->bindValue(':forgotpasswordtoken',$forgotPasswordToken);
         $statement->execute();
        return $statement->rowCount();
    }
    public static function validate($verifyToken){
        $db = Database::getConnection();
        $query = "update role set activationtoken='activated' where activationtoken=:activationtoken";
        $statement = $db->prepare($query);
        $statement->bindValue(':activationtoken',$verifyToken);
        $statement->execute();
        return $statement->rowCount();
    }
}