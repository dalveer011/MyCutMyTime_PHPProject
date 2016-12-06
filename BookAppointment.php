<?php
include 'Session.php';
require_once 'model/requireClasses.php';
if(isset($_POST['gettime'])){
$salonId = $_POST['salonid'];
$salonAddress = $_POST['salonaddress'];
$salonName = $_POST['salonname'];
$serviceid = $_POST['chosenServices'];
//now getting service details chosen by user
    $serviceObj = new Services_db();
    $serviceDetails = $serviceObj->getServiceDetails($serviceid);
}
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
    <link rel="stylesheet" href="css/myCSS.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<!--    this one is for drop down select2 js-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <!--extra script we have to add to make broswer compatibility for older ie browser-->
    <!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--including angularJS first then  ngRoute for routing-->
    <title>get your time</title>

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
            <a href="./UserHome.php"><img src="images/logo.jpg" alt="Company Logo"/></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--id in here is same as id in toggle mode to figure out the menu options-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!--navbar right means right side in navbar where we will have all our links-->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="UserHome.php">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="ViewProfile.php">View Profile</a></li>
                        <li><a href="EditProfile.php">Edit Profile</a></li>
                    </ul>
                </li>
                <li  class="active"><a href="UserSalonSearch.php">Search</a></li>
                <li><a href="ViewAppointments.php">View Appointments</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reviews<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="./writeReview.php">Write A Review</a></li>
                    </ul>
                </li>
                <li><a href="LogOut.php" class="btn btn-danger">LogOut</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--adding carousel now-->
<div class="container-fluid" id="signupForm" ng-app="myApp">

    <div class="row" ng-controller="MyAppointmentController">
        <section class="col-sm-5 col-sm-offset-2">
            <form style="margin-top: 10%;" action="BookAppointmentProcessing.php" method="post">
                <div class="form-group">
                    <label>Salon Name - &nbsp;</label><?php echo $salonName ?>
                    <input type="hidden" id="salonid" name="salonId" value="<?php echo $salonId ?>">
                    <input type="hidden" name="salonname" value="<?php echo $salonName ?>">
                </div>
                <div class="form-group">
                    <label>Address - &nbsp;</label><?php echo $salonAddress ?>
                    <input type="hidden" name="address" value="<?php echo $salonAddress ?>">
                </div>
                <div class="form-group">
                    <label>You chose</label><br/>
                    <?php echo $serviceDetails[0]["servicedescription"] ?><br/>
                    <input type="hidden" name="servicedesc" value="<?php echo $serviceDetails[0]["servicedescription"] ?>">
                    <input type="hidden" name="serviceid" value="<?php echo $serviceDetails[0]["id"] ?>">
                    Price - $<?php echo  $serviceDetails[0]["price"] ?>
                </div>
                <div class="form-group">
                    <label>Select date </label><br/>
                    <input type="text" style="margin-bottom: 20px;" name="chosenappointmentDate" ng-model="chosenDate" id="appointmentDate" ng-change="getAppointmentTimings(chosenDate)"/>
                </div>
                <div class="form-group">
                    <label>Choose Time</label><br/>
                    <select name="appointmentTime" class="select">
                        <option ng-repeat="appointment in availableAppointmentTimings" value="{{appointment}}">{{appointment}}</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-success" value="Book Appointment" name="book"/>
                <a href="./UserHome.php" class="btn btn-danger">Not Now</a>
            </form>
        </section>
        <section class="col-sm-2" style="margin-top: 10%;">
            <img src="images/choosetime.png" class="center-block img-circle"/>
        </section>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $("#appointmentDate").datepicker({
        minDate: 0,
        dateFormat: "yy-mm-dd"
    });
    $('select').select2({
        placeholder: 'Select Time'
    });
</script>
<!--adding bootstrap javascript here-->
<script src="js/bootstrap.js"></script>
<script src="js/angular.min.js"></script>
<script src="js/scriptUsingAngular.js"></script>
</body>
</html>
