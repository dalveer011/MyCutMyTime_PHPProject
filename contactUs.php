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
    <!--including angularJS first then  ngRoute for routing-->
    <title>Home My cut My Time | Contact Us</title>
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
                <li><a href="home.php">Home</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li  class="active"><a href="contactUs.php">Contact Us</a></li>
                <li><a href="#" class="btn btn-danger" id="btnSignUp">Sign In</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="page-header">
    <h2 style="text-align:center; margin-top: 140px;">Contact Us</h2>
</div>

<!--adding info about the website-->
<div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
        <form name="contactForm" class="form-horizontal" method="post" action="submitComments.php">
                <div class="form-group">
                    <label for="nameInput" class="control-label col-md-2">Name</label>
                    <div class="col-md-8">
                        <input 
                        type="text"
                        id="nameInput"
                        name="nameInput" 
                        class="form-control" 
                        placeholder="Your name"
                        required
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="emailInput" class="control-label col-md-2">Email</label>
                    <div class="col-md-8">
                        <input 
                        type="text"
                        name="emailInput"
                        id="emailInput"
                        class="form-control" 
                        placeholder="Your email"
                        required
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneInput" class="control-label col-md-2">Phone</label>
                    <div class="col-md-8">
                        <input 
                        type="text"
                        id="phoneInput"
                        name="phoneInput"
                        class="form-control" 
                        placeholder="Your Phone"
                        required
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="messageInput" class="control-label col-md-2">Message</label>
                    <div class="col-md-8">
                        <textarea cols=40 rows="10"
                        name="messageInput"
                        id="messageInput"
                        class="form-control"
                        placeholder="Your Message" required>
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <input type="submit" name="submit" value="Submit" class="btn btn-success">
                    </div>
                </div>
        </form>
    </div>
</div>

<div>
    <section class="row">
    <footer class="col-xs-12">
        <h5 class="text-center">&copy;&nbsp;Esac Inc. All Rights Reserved 2016</h5>
    </footer>
    </section>
</div>

<!--//adding a modal whenever user will click sign in this will open-->
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
<script src="js/script.js"></script>
</body>
</html>