<?php
if(isset($_POST['login'])){
    $adminid = $_POST['adminid'];
    $password = $_POST['password'];
    if(empty($adminid)|| empty($password)){
        echo "<p>All fiels are mandatory</p>";
        include 'AdminLogin.php';
    }else{
        if($adminid == "mcmtadmin" && $password == "djmd"){
            session_start();
            $_SESSION['admin'] = "admin";
            header("Location: ./adminHome.php");
        }else{
            echo "<p style='text-align: center;color: darkred'>wrong credentials</p>";
            include 'AdminLogin.php';
        }
    }
}else{
    header("Location: ./AdminLogin.php");
}