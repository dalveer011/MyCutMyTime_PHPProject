<?php
require_once 'model/LoadingClasses.php';
$rememberme = "";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($email) || empty($password)){
        echo "<p style='color: darkred;text-align: center'>All fields are mandatory</p>";
        include_once 'home.php';
    }else {
        //checking if user selected remember me or not
        if (isset($_POST['rememberme'])) {
            $rememberme = $_POST['rememberme'];
        }
        //first checking if user is registered or not if yes
        if (LoginAuthentication::IsEmailAlreadyThere($email)) {
            //then checking if user is activated or not if yes
            if (LoginAuthentication::isActivated($email) == "activated") {
                //then checking if password entered is correct or not
                if ((LoginAuthentication::isValidUser($email, $password))) {
                    session_start();
                    if (!isset($_SESSION['username'])) {
                        $_SESSION['username'] = $email;
                        if (LoginAuthentication::getRole($email) == "User") {
                            //if user selected remember me then setting up the cookie
                            if ($rememberme == "Remember Me") {
                                $name = "useremail";
                                $value = $email;
                                $expire = new DateTime('+1 year');
                                setcookie($name, $email, $expire->getTimestamp(), "/", "localhost", false, true);
                            }
                            //there should not be any space between Location and colon
                            header('Location: ./UserHome.php');
                        } else {
                            if ($rememberme == "Remember Me") {
                                $name = "useremail";
                                $value = $email;
                                $expire = new DateTime('+1 year');
                                setcookie($name, $email, $expire->getTimestamp(), "/", "localhost", false, true);
                            }
                            header('Location: SalonWelcome.php');
                        }
                    }else{
                        echo "<p style='color: darkred;text-align: center'>Already Logged in</p>";
                        include_once 'home.php';
                    }
                }
                    else {
                        echo "<p style='color: darkred;text-align: center'>Invalid Credentials! wrong password</p>";
                        include_once 'home.php';
                    }
                } else if (LoginAuthentication::isActivated($email) == "deactivated") {
                    echo "<p style='color: darkred;text-align: center'>your account have been deactivated</p>";
                    include_once 'home.php';
                } else {
                    echo "<p style='color: darkred;text-align: center'>you have not verified your account yet</p>";
                    include_once 'home.php';
                }
            } else {
                echo "<p style='color: darkred;text-align: center'>Email Id not registered</p>";
                include_once 'home.php';
            }
        }

}