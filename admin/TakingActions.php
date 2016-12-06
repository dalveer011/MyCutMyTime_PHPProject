<?php
require '../Required Packages/PHPMailer/PHPMailerAutoload.php';
require_once '../model/requireClasses.php';
require_once './AdminSession.php';
$admin = new Admin_db();
if(isset($_GET['action'])){
    $action = $_GET['action'];
    $email = $_GET['email'];
    $admin->takeAction($email,$action);
    header('Location: ./adminHome.php');
}else{
    header('Location: ./adminHome.php');
}