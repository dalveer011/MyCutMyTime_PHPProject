<?php
require_once 'Session.php';
require_once 'model/requireClasses.php';
if(isset($_POST['update'])){
    $streetAddress = $_POST['streetaddress'];
    $province = $_POST['province'];
    $postalcode = $_POST['postalcode'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    //creating a address object and assigning values
    $address = new Address();
    $address->setStreetadress($streetAddress);
    $address->setCity($city);
    $address->setPostalcode($postalcode);
    $address->setProvince($province);
    $address->setPhone($phone);

    //now updating the address for the user
    $address_db = new Address_db();
    $user = new User();

    //First Get Id for that email
    $id = $user->getCustomeridByemail($_SESSION['username']);

    //Update the address
    $address_db->updateAddress($address, $id);

    //updating password as well
    if(!empty($password)){
    $user->updatePassword($password,$_SESSION['username']);
    }
    //returning back to home page
    header('Location: ./UserHome.php');
}
?>