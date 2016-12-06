<?php
/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-26
 * Time: 4:19 PM
 */

require_once 'Session.php';
require_once 'model/requireClasses.php';
$salonowneremail = $_SESSION['username'];
$services_db = new Services_db();

//var_dump($_POST);


if (isset($_POST['DeleteService'])){
    $serviceid = $_POST['serviceid'];
    $salonid = $_POST['salonid'];
}

if (!(empty($serviceid) || empty($salonid))){
    $services_db->deleteService($salonid, $serviceid);
    include_once 'listServices.php';
}
