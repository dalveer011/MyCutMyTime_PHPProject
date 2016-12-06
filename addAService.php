<?php
/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-26
 * Time: 2:47 PM
 */
require_once 'Session.php';
require_once 'model/requireClasses.php';
$salonowneremail = $_SESSION['username'];
$services_db = new Services_db();

//var_dump($_POST);

if (isset($_POST['AddService'])){
    $servDesc = $_POST['serviceDescription'];
    $price = $_POST['price'];
    $salonid = $_POST['salonid'];
}

if (!(empty($servDesc) || empty($price))){
    $services = new Services($servDesc,$price, $salonid);
    $services_db->addService($services);

    include_once 'listServices.php';
}
