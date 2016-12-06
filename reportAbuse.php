<?php
/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-12-03
 * Time: 11:29 AM
 */

//var_dump($_GET);
require_once 'Session.php';
require_once 'model/requireClasses.php';

$reviewId = $_GET['id'];
echo $reviewId;

$review_db = new Reviews_db();
$review_db->updateReportAbuse($reviewId);

header("Location: ./viewReviews.php");