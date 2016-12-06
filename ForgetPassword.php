
<!--//this is just a basic page that has resources which we need in every page-->
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
    <title>Forgot password</title>
    <link rel="stylesheet" href="css/myCSS.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <!--container fluid to make it responsive-->
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display data trget here is same as in navbar-->
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
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

</navbar>
<div class="container-fluid">
    <section class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <img src="images/forgot-password-icon-18348.jpg" class="img-rounded center-block"/>
            <h1 class="text-center">Forgot Password We got You</h1>
            <form action="ForgetPasswordProcessing.php" method="post">
            <input type="email" name="email" class="form-control form-group" placeholder="enter your email here" required/>
                <input type="submit" class="btn btn-success  form-group" name="change" value="change"/>
        </form>
        </div>
    </section>
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
