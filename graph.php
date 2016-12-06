<?php
require_once 'Session.php';
require_once 'model/requireClasses.php';
$salonemail = $_SESSION['username'];
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
    <title>Analysis</title>

    <link rel="stylesheet" href="css/myCSS.css">

    <style type="text/css">
        #chart-container {
            width: 640px;
            height: auto;
        }
    </style>
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>

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
                <li><a href="SalonWelcome.php">Home</a></li>
                <li><a href="viewReviews.php">Reviews</a></li>
                <li  class="active"><a href="graph.php">Reports</a></li>
                <li><a href="#" class="btn btn-danger" id="btnSignUp">Log Out</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <section class="row" style="padding-left: 0px;">
        <aside class="col-sm-2" style="padding-left: 0px;">
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
                    <li class="active"><a href="./SalonWelcome.php">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                    <li ><a href="./viewProfileSalon.php">Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                    <li ><a href="./OwnerAppointment.php">Appointments<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bell"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-star"></span></a>
                        <ul class="dropdown-menu forAnimate" role="menu">
                            <li><a href="listServices.php">List Services</a></li>
                            <li class="divider"></li>
                            <li><a href="AddService.php">Add Services</a></li>
                            <li class="divider"></li>
                            <li><a href="./editService.php">Modify Services</a></li>
                        </ul>
                    </li>
                    <li><a href="viewReviews.php">Reviews<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list-alt"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>
            </aside>
        <div class="col-sm-6 col-sm-offset-4 main">
        <div id="chart-container">
            <canvas id="mycanvas"></canvas>
        </div>
            </div>
        </section>
        <section class="row">
            <footer>
                <h5 class="text-center">&copy;&nbsp;Esac Inc. All Rights Reserved 2016</h5>
            </footer>
        </section>
    <div class="modal fade" id='loginModal' tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"><h4>Logout <i class="fa fa-lock"></i></h4></div>
                <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
                <div class="modal-footer"><a href="LogOut.php" class="btn btn-primary btn-block">Logout</a></div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
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