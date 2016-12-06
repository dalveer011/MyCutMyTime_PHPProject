<?php
require '../Required Packages/PHPMailer/PHPMailerAutoload.php';
require_once '../model/requireClasses.php';
require_once './AdminSession.php';
if(isset($_GET['action'])){
    $action = $_GET['action'];
    $email = $_GET['email'];
    $reviewid = $_GET['reviewid'];
    $review_db = new Reviews_db();
    $review_db->takeActionReviews($email,$action,$reviewid);
    header('Location: ./ReportedAbuse.php');
}else{
    header('Location: ./ReportedAbuse.php');
}