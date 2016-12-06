<?php
require_once 'Session.php';
require_once 'model/requireClasses.php';
$customer = new User();
$customerDetails = $customer->getCustomerDetailsByemail($_SESSION['username']);
$custid = $customerDetails['id'];

$orders_db=new Orders_db();
$allAppointments=$orders_db->getAppointmentDetails($custid);
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
    <title>View Appointments</title>
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
                <li><a href="UserSalonSearch.php">Search</a></li>
                <li  class="active"><a href="ViewAppointments.php">View Appointments</a></li>
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
<div class="container-fluid" id="signupForm">
    <div class="row">
        <?php if($allAppointments == "No Appointments for Now"){?>
        <h1 class="text-center">No Appointments for Now</h1>
    </div>
    <?php } else { ?>
    <section class="row">
    <section class="col-sm-8 col-sm-offset-2" >
        <form id="viewappoint">
            <table class="table">
                <thead>
                <tr>
                    <th>Salon Name</th>
                    <th>Service Description</th>
                    <th>Salon Address</th>
                    <th>Order Date</th>
                    <th>Appointment Start</th>
                    <th>Appointment End</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($allAppointments as $appointment): ?>
                    <tr class="info">
                        <td><?php echo $appointment['name']?> </td>
                        <td><?php echo $appointment['servicedescription']?> </td>
                        <td><?php echo $appointment['streetaddress']?>,<?php echo $appointment['city']?>,<?php echo $appointment['province']?>,<?php echo $appointment['postalcode']?></td>
                        <td><?php echo $appointment['orderdate']?></td>
                        <td><?php echo $appointment['appointmentstarttime']?> </td>
                        <td><?php echo $appointment['appointmentendtime']?> </td>
                        <td><a href="CancelAppointment.php?id=<?php echo $appointment['id']?>" class="btn btn-danger">Cancel Appointment</td>
                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </form>
    </section>
    </section>
    <?php } ?>
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