<?php
require_once '../model/requireClasses.php';
$admin_db = new Admin_db();
if(isset($_POST['login'])){
    $adminid = $_POST['adminid'];
    $password = $_POST['password'];
    if(empty($adminid)|| empty($password)){
        echo "<p>All fiels are mandatory</p>";
        include 'AdminLogin.php';
    }else{
        if($admin_db->authenticate($adminid) != false){
            if(password_verify($password,$admin_db->authenticate($adminid))){
                session_start();
                $_SESSION['admin'] = "admin";
                header("Location: ./adminHome.php");
            }else{
                echo "<p style='text-align: center;color: darkred'>wrong credentials</p>";
                include 'AdminLogin.php';
            }
        }else{
            echo "<p style='text-align: center;color: darkred'>wrong credentials</p>";
            include 'AdminLogin.php';
        }
    }
}else{
    header("Location: ./AdminLogin.php");
}