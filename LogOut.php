<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['salonId']);
session_destroy();
header("Location: ./home.php");