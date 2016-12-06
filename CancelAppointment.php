<?php
require_once 'Session.php';
require_once 'model/requireClasses.php';
if(isset($_GET['id'])){
    $appointmentid = $_GET['id'];
    $orders_db = new Orders_db();
    $orders_db->cancelAppointment($appointmentid);
    header('Location: ./ViewAppointments.php');
}else{
    header('Location: ./UserHome.php');
}