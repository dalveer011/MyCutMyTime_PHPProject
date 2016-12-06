<?php
date_default_timezone_set('Etc/UTC');
require 'Required Packages/PHPMailer/PHPMailerAutoload.php';
require_once 'model/LoadingClasses.php';
$email = "";
if (isset($_POST['change'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email == false || $email == null) {

    } else {
        if (LoginAuthentication::IsEmailAlreadyThere($email)) {
            $db = Database::getConnection();
            $token = password_hash($email,PASSWORD_BCRYPT);
            $query = "update role set forgotpasswordtoken = :forgetToken where email=:email";
            $statement = $db->prepare($query);
            $statement->bindValue(':forgetToken', $token);
            $statement->bindValue(':email', $email);
            $statement->execute();
            SendingEmail::sendForgetPasswordEmail($email, $token);
        } else {
            echo "<p style='color: red;text-align: center'>This email is not registered with us please enter another email";
            include 'ForgetPassword.php';
        }

    }
}