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
    <script src ="js/angular.min.js"></script>
    <![endif]-->
    <link rel="icon" href="images/favicon.icon" type="image/ico">
    <title>Home My cut My Time</title>
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
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li><a href="contactUs.php">Contact Us</a></li>
                <li><a href="#" class="btn btn-danger" id="btnSignUp">Sign In</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--adding carousel now-->
<div class="container-fluid">
<section class="row">
<div id="carousel" style="margin-left: -15px;" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="images/carousel1.jpg" alt="carousel images"/>
        </div>
        <div class="item">
            <img src="images/carousel2.jpg" alt="carousel images">
        </div>
        <div class="item">
            <img src="images/carousel3.jpg" alt="carousel images">
        </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</section>
<!--adding info about the website-->
<section class="row">
    <aside class="col-md-4">
        <img class="img-responsive img-circle center-block" src="images/search.jpg" alt="search"/>
        <h2 class="text-center">Search</h2>
        <p class="text-center">At First, search for salon as per your requirements</p>
    </aside>
    <article class="col-md-4">
    <img class="img-responsive img-circle center-block" src="images/choosetime.png" alt="appointment"/>
        <h2 class="text-center">Book</h2>
    <p class="text-center">after selecting the salon choose your time as per your convenience.</p>
    </article>
    <aside class="col-md-4">
    <img class="img-responsive img-circle center-block" src="images/getCut.gif" alt="Get Cut"/>
    <h2 class="text-center">Get your Hair Cut</h2>
    <p class="text-center">Now go to salon at your chosen time and get your hair cut.</p>
    </aside>
</section>
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