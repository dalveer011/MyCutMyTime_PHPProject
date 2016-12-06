<?php
$email="";
//checking if the cookie is set if yes then getting its value to use in email address field of signIn
if(isset($_COOKIE['useremail'])){
    $email = $_COOKIE['useremail'];
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
    <link rel="stylesheet" href="css/myCSS.css"/>
    <!--extra script we have to add to make broswer compatibility for older ie browser-->
    <!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title>Signup</title>
    <link rel="stylesheet" href="css/myCSS.css">
</head>
<body>
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
                <li><a href="./home.php">Home</a></li>
                <li><a href="./search.php">Search</a></li>
                <li><a href="./AboutUs.php">About Us</a></li>
                <li><a href="./contactUs.php">Contact Us</a></li>
                <li><a href="#" class="btn btn-danger" id="btnSignUp">Sign In</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--starting form-->
<div class="container-fluid" id="signupForm">
        <section class="col-sm-5 col-sm-offset-2" >
    <form id="mapForm" action="AddUser.php" method="post">
        <div class="form-group">
            <input type="text" name="firstname" class="form-control" id="firstName" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <input type="text" name="lastname" class="form-control" id="lastName" placeholder="Last Name" required>
        </div>
        <div class="form-group">
            <input type="email"  name="email" class="form-control" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <div class="form-group" >
            <select class="form-control" name="role">
                <option value="Select role">Select Role</option>
                <option value="User" selected>User</option>
                <option value="Salon owner">Salon Owner</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success" value="register" name="register" id="signup_btn_register">Register</button>
    </form>
            </section>
    <section class="col-sm-5">
        <img src="images/signup.jpeg" class="img-responsive img-circle center-block" />
        <p class="text-center">Just register and you can use this application<br>Forever
    </section>
    </div>
<div class="modal fade" id='loginModal' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sign In</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="Authentication.php">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" value="<?php echo $email ?>" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                        <a href="./ForgetPassword.php" style="float: right">forgot password</a>
                    </div>
                    <div class="checkbox" >
                        <label>
                            <input type="checkbox" name="rememberme" value="Remember Me" checked> Remember Me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success"  name="submit">Login</button>
                    Not a member yet? <a href="SignUp.php">sign up</a>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--add javascript source here : first add jquery CDN then add bootstrap javascript CDN-->
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"
          integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
          crossorigin="anonymous"></script>
<!--adding bootstrap javascript here-->
<script src="js/bootstrap.js"></script>
<script src="js/verify.notify.js"></script>
<script src="js/script.js"></script>
</body>
</html>