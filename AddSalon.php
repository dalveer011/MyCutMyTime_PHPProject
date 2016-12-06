<?php
/**
 * Created by PhpStorm.
 * User: damil
 * Date: 2016-11-01
 * Time: 2:20 PM
 */
include 'Session.php';
if(!isset($_SESSION['username'])){
    header("Location: /Error.php");
}

$salonownerEmail = $_SESSION['username'];
require_once 'model/requireClasses.php';
include_once "header.php";
?>

<title>Add Salon</title>
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
                <li><a href="viewSalons.php">View Salons</a></li>
                <li class="active"><a href="#">Add Salon</a></li>
                <li><a href="#" class="btn btn-danger" id="btnSignUp">Log Out</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

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
                <li><a href="SalonWelcome.php">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                <li><a href="viewSalons.php">View Salons<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bell"></span></a></li>
                <li><a href="#">Add Salons<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bell"></span></a></li>
            </ul>
        </div>
    </div><!--container-fluid-->
</nav>


    <div class="container-fluid">
            <h1 class="display-3 text-center page-header">Add a Salon to your success</h1>
        <div class="row">
            <form method="post" class="col-sm-offset-2 col-sm-7" action="Success.php" name="addSalonForm" onsubmit="return(validate())">
                <div class="form-group">

                    <label>Salon Name</label>
                    <input type="text" class="form-control" name="salonName" id="name" placeholder="Enter SalonName" required value="">
                    <small id="nameErr" class="form-text text-muted">Go on.Feel proud to have one more salon.</small><br>

                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required value="">
                    <small id="emailErr" class="form-text text-muted">We'll never share your email with anyone else.</small><br>

                    <label>Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required value="">
                    <small id="phoneErr" class="form-text text-muted">We make sure everyone has your number.</small>

                </div>
                <div class="form-group">
                    <label>Street</label>
                    <input type="text" class="form-control" id="street" name="street" placeholder="Street" required value="">
                    <small id="emailHelp" class="form-text text-muted">Marketing begins from home</small><br>

                    <label>City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required value="">
                    <small id="cityErr" class="form-text text-muted"></small><br>

                    <label for="exampleSelect1">Province</label>
                    <select class="form-control" id="province" name="province">
                        <option>Ontario</option>
                        <option>Manitoba</option>
                        <option>Ottawa</option>
                        <option>Alberta</option>
                        <option>British Columbia</option>
                    </select><br>

                    <label>PostalCode</label>
                    <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Postal Code" required value="">
                    <small id="postalCodeErr" class="form-text text-muted"></small>


                </div>

                <button type="submit" class="btn btn-primary" name="Add">Submit</button>
                <script src="js/ClientSideFormVerification.js"></script>
            </form>
        </div>
        <div class="row">
            <footer class="col-xs-12">
                <h5 class="text-center">&copy;&nbsp;Esac Inc. All Rights Reserved 2016</h5>
            </footer>
        </div>
    </div>

<!-- Footer file here -->
<?php
include_once "footerSalonOwner.php";
?>


