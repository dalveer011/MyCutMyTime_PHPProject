<?php
/**
 * Created by PhpStorm.
 * User: damil
 * Date: 2016-11-05
 * Time: 11:20 PM
 */
include "Session.php";
if(!isset($_SESSION['username'])){
    header("Location: ./Error.php");
}
$salonid = $_SESSION['salonId'];
require_once "model/requireClasses.php";
$mysalon = new Salons_db();
$salonemail = $_SESSION['username'];
$myjsondata = new JSONConverter();
$data=$myjsondata->convertToJSON("
select service.servicedescription,COUNT(serviceid)as 'orders' from orders join service on service.id = orders.serviceid where orders.salonid = $salonid GROUP by service.servicedescription");
header("Content-Type: application/json");
echo $data;
?>