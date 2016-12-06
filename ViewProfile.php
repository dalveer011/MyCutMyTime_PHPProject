<?php
/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-12-03
 * Time: 9:38 PM
 */

require_once 'Session.php';
require_once 'model/requireClasses.php';
$customer = new User();
$customerDetails = $customer->getCustomerDetailsByemail($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--extra line we have to add to make it responsive bootstrap stuff-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--including bootstrap css files through cdn here-->
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <!--including my css file after because it will override some css in bootstrap-->
    <link rel="stylesheet" href="css/myCSS.css"/>
    <!--extra script we have to add to make broswer compatibility for older ie browser-->
    <!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src ="js/angular.min.js"></script>
    <![endif]-->
    <!--including angularJS first then  ngRoute for routing-->
    <title>User Home</title>
    <link rel="stylesheet" href="css/myCSS.css">
</head>

<body>
<!--navigationBar-->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <!--container fluid to make it responsive-->
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <!--these are responsible for showing three lines when it becomes button in smaller screen-->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#top"><img src="images/logo.jpg" alt="Company Logo"/></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--id in here is same as id in toggle mode to figure out the menu options-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!--navbar right means right side in navbar where we will have all our links-->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="UserHome.php">Home</a></li>
                <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="ViewProfile.php">View Profile</a></li>
                        <li><a href="EditProfile.php">Edit Profile</a></li>
                    </ul>
                </li>
                <li><a href="UserSalonSearch.php">Search</a></li>
                <li><a href="./ViewAppointments.php">View Appointments</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reviews<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="writeReview.php">Write A Review</a></li>
                    </ul>
                </li>
                <li><a href="LogOut.php" class="btn btn-danger">LogOut</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container-fluid">

    <section class="row">
        <img style="padding-top: 10px;" src="images/aboutus.png" class="img-responsive img-circle center-block"/>
    </section>
    <section class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover">
                <caption class="caption text-center text-primary page-header">Customer Profile</caption>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $customerDetails['firstname'] . ' ' . $customerDetails['lastname'] ?></td>
                    <td><?php echo $customerDetails['email'] ?></td>
                    <td><?php echo $customerDetails['phone'] ?></td>
                    <td><?php echo $customerDetails['streetaddress'] . ', ' . $customerDetails['city'] . ', ' . $customerDetails['province']. ', ' . $customerDetails['postalcode'] ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="row">
        <footer class="col-xs-12">
            <h5 class="text-center">&copy;&nbsp;Esac Inc. All Rights Reserved 2016</h5>
        </footer>
    </section>
</div>


<!--add javascript source here : first add jquery CDN then add bootstrap javascript CDN-->
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"
          integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
          crossorigin="anonymous"></script>
<!--adding bootstrap javascript here-->
<script src="js/bootstrap.js"></script>
<script src="js/script.js"></script>
</body>
</html>