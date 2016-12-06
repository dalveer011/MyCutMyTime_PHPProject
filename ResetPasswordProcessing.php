<?php
require_once 'model/LoadingClasses.php';
if(isset($_POST['reset'])){
    $token = $_POST['token'];
    $password = $_POST['password'];
    if(LoginAuthentication::changePassword($password,$token) > 0){
    echo"<p style='color: green;text-align: center'>Your password have been changed please login with your new password</p>";
    include 'home.php';
}else{
        echo"<p style='color: green;text-align: center'>Token is not valid so can not update password.Try Again!</p>";
        include 'home.php';
}
}