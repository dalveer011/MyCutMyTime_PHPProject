<?php
require_once '../model/requireClasses.php';
require_once './AdminSession.php';
$admin = new Admin_db();
$user  = new User();
$listOfReportedReviews = $admin->getReportedReviews();
$listOfsalonOwners = $admin->getAllSalonOwners();
?>
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
    <title>Admin Home</title>
    <link rel="stylesheet" href="../css/myCSS.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <!--container fluid to make it responsive-->
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <!--these are responsible for showing three lines when it becomes button in smaller screen-->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#top"><img src="../images/logo.jpg" alt="Company Logo"/></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--id in here is same as id in toggle mode to figure out the menu options-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!--navbar right means right side in navbar where we will have all our links-->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./adminHome.php">Home</a></li>
                <li  class="active"><a href="./ReportedAbuse.php">Reported Reviews</a></li>
                <li><a href="./adminLogout.php" class="btn btn-danger" id="btnSignUp">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <?php if($listOfReportedReviews == "No Reviews were reported"){?>
    <section class="row">
        <h1 class="text-center">No Reviews were reported</h1>
    </section>
    <?php } else{
        foreach ($listOfReportedReviews as $reportedReview) {?>
        <section class="row" style="margin-top: 2%">
            <article class="col-sm-6 col-sm-offset-3">
                <strong><?php echo $reportedReview['reviewtitle'] ?></strong><br>
                <span><?php echo $reportedReview['reviewdescription'] ?></span><br>
                <?php
                $user = new User();
                $email = $user->getCustomerEmailByid($reportedReview['customerid']);
                $salon = new Salons_db();
                $salonemail = $salon->getSalonEmailById($reportedReview['salonid']);
                ?>
                <span><strong>By&nbsp;<?php echo $email ?></strong></span><br>
                <a href="TakingActionsReviews.php?reviewid=<?php echo $reportedReview['id'];?>&email=<?php echo $email; ?>&action=deactivate">Flag Inappropriate</a><br>
                <a href="TakingActionsReviews.php?reviewid=<?php echo $reportedReview['id']?>&email=<?php echo $salonemail; ?>&action=ok&id="<?php echo $reportedReview['salonid'];?>>It is Fine</a>
                <hr>
            </article>
        </section>
    <?php }
    }
    ?>
    </div>

<!--add javascript source here : first add jquery CDN then add bootstrap javascript CDN-->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<!--adding bootstrap javascript here-->
<script src="../js/bootstrap.js"></script>
<script src="../js/script.js"></script>
</body>
</html>
