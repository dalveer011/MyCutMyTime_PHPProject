<?php
require_once 'Session.php';
require_once 'model/requireClasses.php';
$customer = new User();
$customerDetails = $customer->getCustomerDetailsByemail($_SESSION['username']);
$cities = ["Mississauga","Toronto","Scarborough","Brampton"];
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
    <title>Edit Profile</title>
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
                    <a href="./ViewProfile.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="ViewProfile.php">View Profile</a></li>
                        <li><a href="EditProfile.php">Edit Profile</a></li>
                    </ul>
                </li>
                <li><a href="UserSalonSearch.php">Search</a></li>
                <li><a href="ViewAppointments.php">View Appointments</a></li>
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

<div class="container-fluid" id="signupForm">
    <section class="col-sm-5 col-sm-offset-2" >
        <?php if($customerDetails['streetaddress'] == "Not provided"){ ?>
        <form id="mapForm" action="UpdatingInfo.php" method="post">
            <div class="form-group">
                <input type="text" name="firstname" class="form-control" value="<?php echo $customerDetails['firstname']?>" disabled>
            </div>
            <div class="form-group">
                <input type="text" name="lastname" class="form-control" value="<?php echo $customerDetails['lastname']?>" disabled>
            </div>
            <div class="form-group">
                <input type="email"  name="email" class="form-control" value="<?php echo $customerDetails['email']?>" disabled>
            </div>
            <div class="form-group">
                <input type="text"  name="phone" class="form-control" placeholder="<?php echo "Phone -".$customerDetails['phone']?>" required>
            </div>
            <div class="form-group">
                <input type="text"  name="streetaddress" class="form-control"  placeholder='<?php echo "Street Address -".$customerDetails['streetaddress']?>' required>
            </div>
            <div class="form-group dropdown">
                <select name="city" class="form-control">
                    <option value="Mississauga" selected>Mississauga</option>
                    <option value="Toronto">Toronto</option>
                    <option value="Etobicoke">Etobicoke</option>
                    <option value="Scarborough">Scarborough</option>
                    <option value="Markham">Markham</option>
                </select>
            </div>
            <div class="form-group" >
                    <select name="province" class="form-control">
                        <option value="Ontario" selected>Ontario</option>
                    </select>
            </div>
            <div class="form-group">
                <input type="text"  name="postalcode" class="form-control" placeholder='<?php echo "Postal Code -".$customerDetails['postalcode']?>' required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Change Password">
            </div>
            <button type="submit" class="btn btn-success" value="Update" name="update">Update</button>
            <a href="./UserHome.php"  class="btn btn-warning">Cancel</a>
        </form>
        <?php }  else {?>
            <form id="mapForm" action="UpdatingInfo.php" method="post">
                <div class="form-group">
                    <input type="text" name="firstname" class="form-control" value="<?php echo $customerDetails['firstname']?>" disabled>
                </div>
                <div class="form-group">
                    <input type="text" name="lastname" class="form-control" value="<?php echo $customerDetails['lastname']?>" disabled>
                </div>
                <div class="form-group">
                    <input type="email"  name="email" class="form-control" value="<?php echo $customerDetails['email']?>" disabled>
                </div>
                <div class="form-group">
                    <input type="text"  name="phone" class="form-control" value="<?php echo $customerDetails['phone'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="text"  name="streetaddress" class="form-control"  value="<?php echo $customerDetails['streetaddress']?>" required>
                </div>
                <div class="form-group dropdown">
                    <select name="city" class="form-control">
                        <?php foreach ($cities as $city):
                            if($customerDetails['city'] == $city){?>
                        <option value="<?php echo $city?>" selected><?php echo $city ?></option>
                        <?php }else{?>
                                <option value="<?php echo $city?>"><?php echo $city ?></option>
                            <?php }endforeach;?>
                    </select>
                </div>
                <div class="form-group" >
                    <select name="province" class="form-control">
                        <option value="Ontario" selected>Ontario</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text"  name="postalcode" class="form-control" value='<?php echo $customerDetails['postalcode']?>' required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Change Password">
                </div>
                <button type="submit" class="btn btn-success" value="Update" name="update">Update</button>
                <a href="./UserHome.php"  class="btn btn-warning">Cancel</a>
            </form>
        <?php } ?>
        </section>
</div>
