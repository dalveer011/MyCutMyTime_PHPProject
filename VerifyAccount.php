<?php
require_once 'model/LoadingClasses.php';
if(isset($_GET['token'])){
    $token = $_GET['token'];
    if(LoginAuthentication::validate($token) != 0){
        header("Location: Congratulations.php");
    }else{
        echo "<p style='color: red'>Not a valid token</p>";
        include 'home.php';
    }
}else{
    echo "<p style='color: red'>You did not come here by a valid link so can not verify valid user</p>";
    include 'home.php';
}
?>
