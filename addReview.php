<?php
/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-12-01
 * Time: 1:14 AM
 */

require_once 'Session.php';
require_once 'model/requireClasses.php';

//var_dump($_POST);

$salon_db = new Salons_db();

if(isset($_POST['submit'])){
    $salonname = $_POST['salonName'];
    $cusId = $_POST['customerId'];
    $reviewTitle = $_POST['title'];
    $reviewDesc = $_POST['reviewDescription'];
    $rating = $_POST['rating'];
}

$salonid = $salon_db->getSalonIdByName($salonname);

$review = new Reviews($reviewTitle,$reviewDesc,$rating, $salonid, $cusId);
$review_db = new Reviews_db();
$review_db->addReviews($review);

//returning back to home page
header('Location: ./UserHome.php');
