<?php
//this file is to make sure that a session is there
session_start();
if(!isset($_SESSION['username'])){
    header("Location: ./home.php");
}