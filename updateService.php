<?php
/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-26
 * Time: 6:46 PM
 */

require_once 'Session.php';
require_once 'model/requireClasses.php';
$salonowneremail = $_SESSION['username'];
$services_db = new Services_db();

if (isset($_POST['UpdateService'])){
    $serviceid = $_POST['serviceid'];
    $servDesc = $_POST['servicedescription'];
    $price = $_POST['price'];
    $salonid = $_POST['salonid'];
}

if (!(empty($servDesc) || empty($price)  || empty($serviceid) || empty($salonid))){
    $services_db->updateService($salonid, $serviceid, $servDesc, $price);
    include_once 'listServices.php';
}


