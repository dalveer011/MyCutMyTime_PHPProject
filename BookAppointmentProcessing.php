<?php
require_once 'Required Packages/PHPMailer/PHPMailerAutoload.php';
include 'Session.php';
require_once 'model/requireClasses.php';
// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require './Required Packages/twilio-php-master/Twilio/autoload.php';
// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

if(!isset($_SESSION['username'])){
    header("Location: ./Error.php");
}
if(isset($_POST['book'])) {

    $salonid = $_POST['salonId'];
    $serviceid = $_POST['serviceid'];
    $starttime = $_POST['appointmentTime'];
    //this is getting time selected from last page and adding 30 min to that time
    $timestamp = strtotime($starttime) + 30*60;
    $endtime = date('H:i:s', $timestamp);
    $orderdate = $_POST['chosenappointmentDate'];
    //getting customer details
    $customer = new User();
    $customerDetails = $customer->getCustomerDetailsByemail($_SESSION['username']);
    $firstname = $customerDetails['firstname'];
    $lastname = $customerDetails['lastname'];
    $myAppointment = new Orders();
    $myAppointment->setSalonid($salonid);
    $myAppointment->setServiceid($serviceid);
    $myAppointment->setAppointmentstarttime($starttime);
    $myAppointment->setAppointmentendtime($endtime);
    $myAppointment->setCustomerid($customerDetails["id"]);
    $myAppointment->setOrderdate($orderdate);

    $bookAppointment = new Orders_db();
    $bookAppointment->bookAppointment($myAppointment);
    //getting service description as per service id
    SendingEmail::sendingAppoinymentConfirmation($_SESSION['username'],$starttime,$endtime,$_POST['servicedesc'],$_POST['address'],$_POST['salonname'],$orderdate);
    //sending text to salon owner
    $sid = 'AC519bd69927bbe93ea8f8ac1a9d0b7ee3';
$token = 'ea09fcc0bc360710dac8c7fff31f89c9';
$client = new Client($sid, $token);
// Use the client to do fun stuff like send text messages!
$client->messages->create(
// the number you'd like to send the message to
    '+16477181875',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+16473608564',
        // the body of the text message you'd like to send
        'body' => "You have an appointment with  ".$firstname." ".$lastname." for ".$_POST['servicedesc']." on ".$orderdate." starting at ".$starttime." Thank you for using our Service Esac Inc."
    )
);
    header('Location: ./ViewAppointments.php');
    }
