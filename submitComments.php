<?php
/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-28
 * Time: 1:30 AM
 */
require 'Required Packages/PHPMailer/PHPMailerAutoload.php';
require_once 'model/LoadingClasses.php';
require_once 'model/requireClasses.php';

if(isset($_POST['submit'])){
    $name = $_POST['nameInput'];
    $fromEmail = $_POST['emailInput'];
    $phone = $_POST['phoneInput'];
    $message = $_POST['messageInput'];
}

if (!(empty($name) || empty($fromEmail) || empty($phone) || empty($message))){
    SendingEmail::sendContactUsEmail($message, $fromEmail, $phone, $name);
}else{
    echo "Some of the things missing!";
}