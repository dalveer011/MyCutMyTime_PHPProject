<?php
include 'Session.php';
require_once 'model/requireClasses.php';
if(!isset($_SESSION['username'])){
    header("Location: ./home.php");
}
$salonId = $_POST['salonId'];
$salonAddress = $_POST['salonAddress'];
$salonName = $_POST['salonName'];
$distance = $_POST['distance'];
$services = new Services_db();
//now all services has all the details
$allServices = $services->getAllServicesWithDetails($salonId);
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
<!--    css for select2 js-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <!--extra script we have to add to make broswer compatibility for older ie browser-->
    <!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--including angularJS first then  ngRoute for routing-->
    <title>Appointment</title>
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
<div class="container-fluid">
    <!--adding info about the website-->
    <div class="row">
        <section class="col-sm-5 col-sm-offset-2">
            <form action="BookAppointment.php" method="post" style="margin-top: 20%;">
                <div class="form-group">
                    Salon Name - <label><?php echo $salonName ?></label>
                    <input type="hidden" name="salonid" value="<?php echo $salonId ?>">
                    <input type="hidden" name="salonname" value="<?php echo $salonName ?>">
                </div>
                <div class="form-group">
                    Address - <label><?php echo $salonAddress ?></label>
                    <input type="hidden" name="salonaddress" value="<?php echo $salonAddress ?>">
                </div>
                <div class="form-group">
                    Distance from you - <label><?php echo $distance ?>&nbsp;Km</label>
                </div>
                <div class="form-group">
                    What do you want us to do when you come -<br/>
                    <select name="chosenServices" class="select">
                        <?php foreach ($allServices as $service) : ?>
                            <option
                                value="<?php echo $service['id']?>" selected><?php echo $service['servicedescription'] ?>&nbsp;<?php echo "Price - $".$service['price'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-success" value="Get Your Time" name="gettime"/>
            </form>
        </section>
        <section class="col-sm-2" style="margin-top: 10%;">
            <img src="images/choosetime.png" class="center-block img-circle"/>
        </section>
    </div>
</div>

<!--add javascript source here : first add jquery CDN then add bootstrap javascript CDN-->
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"
          integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
          crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $('select').select2({
    });
</script>
<!--adding bootstrap javascript here-->
<script src="js/bootstrap.js"></script>
<script src="js/script.js"></script>

</body>
</html>