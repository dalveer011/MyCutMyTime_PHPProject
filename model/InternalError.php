
<!--//this is just a basic page that has resources which we need in every page-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--extra line we have to add to make it responsive bootstrap stuff-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--including bootstrap css files through cdn here-->
    <link rel="stylesheet" href="../css/bootstrap.css"/>
    <!--including my css file after because it will override some css in bootstrap-->
    <link rel="stylesheet" href="../css/myCSS.css"/>
    <!--extra script we have to add to make broswer compatibility for older ie browser-->
    <!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title>Error Occured</title>
    <link rel="stylesheet" href="../css/myCSS.css">
</head>
<body style="background-color: gray">
<div class="container-fluid">
    <section class="row">
        <img src="../images/error.PNG" class="col-sm-6 img-responsive" alt="Error Occured" style="float:right;width: 40%;height: 40%"/>
    </section>
    <section class="row" style="background-color: lightgrey">
        <span class="h1 col-sm-10" style="color:red">An Internal error occured we are <br>
            very sorry for that we will resolve this ASAP.<a href="../home.php">Home</span>
    </section>
</div>
<!--add javascript source here : first add jquery CDN then add bootstrap javascript CDN-->
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"
          integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
          crossorigin="anonymous"></script>
<!--adding bootstrap javascript here-->
<script src="../js/bootstrap.js"></script>
<script src="../js/script.js"></script>
</body>
</html>

