

<?php
/**
 * Created by PhpStorm.
 * User: damil
 * Date: 2016-11-01
 * Time: 12:49 PM
 */
include 'Session.php';
require_once "model/requireClasses.php";
if(!isset($_SESSION['username'])){
    header("Location: /Error.php");
}
$mySalonOwner = new SalonOwner();
$ownerid = $mySalonOwner->getSalonOwnerId($_SESSION['username']);
if(isset($_POST['Add']))
{
    $salonName = $_POST['salonName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postalCode = $_POST['postalCode'];
    $error = '';
    if(empty($salonName)||empty($email)||empty($phone)||empty($street)||empty($city)||empty($postalCode))
    {

        header("Location:AddSalon.php");
        echo "none of the fields can be empty";

    }

    else
    {
        $salon1 = new Salons($salonName,$email,$phone, $ownerid, $street,$city,$province,$postalCode);
        $addSalon = new Salons_db();
        $addSalon->addSalon($salon1);
    }
}

?>
<!DOCTYPE html>
<html>
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

    <![endif]-->
    <title>Salon Added</title>

    <link rel="stylesheet" href="css/myCSS.css">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>

    <script src="js/route.js"></script>

</head>
<body id="homePage">

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
                <li class="active"><a href="#">Home</a></li>
                <li><a href="viewSalons.php">View Salons</a></li>
                <li><a href="AddSalon.php">Add Salon</a></li>

                <li><a href="#" class="btn btn-danger" id="btnSignUp">Log Out</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <nav class="navbar navbar-inverse sidebar" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#Salon">Salon</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                    <li ><a href="viewSalons.php">View Salons<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bell"></span></a></li>
                    <li ><a href="AddSalon.php">Add Salons<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bell"></span></a></li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="main">


        <div class="container-fluid" style="margin-top:5%;">
            <div class="row">
                <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                    <h2 class="text-center">Salon Registered Successfully<span style="color:#F89406;">with</span><span style="color:#26A65B;">MyCut</span><span style="color:#19B5FE;">MyTime</span></h2>
                    <center><div class="btn-group" style="margin-top:50px;">
                            <a href="viewSalons.php" class="btn btn-lg btn-primary">View Salons</a>
                            <a href="SalonWelcome.php" class="btn btn-lg btn-default">Home</a>
                        </div></center>
                </div>
            </div>
        </div>
        <section class="row">
            <footer class="col-xs-12">
                <h5 class="text-center">&copy;&nbsp;Esac Inc. All Rights Reserved 2016</h5>
            </footer>
        </section>
    </div>


</div>
<div class="modal fade" id='loginModal' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h4>Logout <i class="fa fa-lock"></i></h4></div>
            <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
            <div class="modal-footer"><a href="javascript:;" class="btn btn-primary btn-block">Logout</a></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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
