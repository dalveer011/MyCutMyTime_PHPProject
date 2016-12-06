<?php
require_once 'model/requireClasses.php';
require_once 'Session.php';
if(isset($_GET['id'])){
    $order_db = new Orders_db();
    $order_db->appointmentDone($_GET['id']);
    header('Location: ./OwnerAppointment.php');
}else{
    header('Location: ./OwnerAppointment.php');
}