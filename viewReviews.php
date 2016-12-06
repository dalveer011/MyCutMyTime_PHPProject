<?php
/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-12-02
 * Time: 1:30 AM
 */

require_once 'model/requireClasses.php';
require_once 'Session.php';
$salonownerEmail = $_SESSION['username'];
$salonid = $_SESSION['salonId'];

$reviews_db = new Reviews_db();
$reviews = $reviews_db->getReviewBySalonId($salonid);
$count = 0;
include_once "header.php";
?>
<title>View Reviews</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap-star-rating-master/css/star-rating.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="css/myCSS.css">
    <link rel="stylesheet" href="./bootstrap-star-rating-master/themes/krajee-fa/theme.min.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="bootstrap-star-rating-master/themes/krajee-svg/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="bootstrap-star-rating-master/themes/krajee-uni/theme.css" media="all" type="text/css"/>

</head>

<body id="homePage">

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
                <li><a href="SalonWelcome.php">Home</a></li>
                <li class="active"><a href="#">View Reviews</a></li>
                <li><a href="graph.php">Reports</a></li>
                <li><a href="#" class="btn btn-danger" id="btnSignUp">Log Out</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container-fluid">
    <div class="row">
        <aside class="col-sm-2" style="padding-left: 0px;">
            <nav class="navbar navbar-inverse sidebar" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#Salon">Salon</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li ><a href="SalonHome.php">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                            <li ><a href="viewProfileSalon.php">Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                            <li ><a href="./OwnerAppointment.php">Appointments<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bell"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-star"></span></a>

                                <ul class="dropdown-menu forAnimate" role="menu">
                                    <li><a>
                                            <form method="post" action="listServices.php">
                                                <input type="hidden" name="salonid" value=" <?php echo $salonid ?>">
                                                <input type="submit" name="submit" value="List Services">
                                            </form>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a>
                                            <form method="post" action="AddService.php">
                                                <input type="hidden" name="salonid" value="<?php echo $salonid?>">
                                                <input type="submit" name="submit" value="Add Services">
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="viewReviews.php">Reviews<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list-alt"></span></a></li>
                        </ul>
                    </div>
            </nav>
        </aside>
            <?php foreach ($reviews as $review): ?>
                <?php $count++;
                if($count >= 2){?>
                    <div class="col-sm-8 col-sm-offset-4">
                        <h3><?php echo $review['reviewtitle'];$count++ ?></h3><br>
                        <input type="text" class="rating rating-loading reviewStars" value="<?php echo $review['rating'] ?>" data-size="sm" id="titleRating" name="rating" disabled><br>
                        <blockquote style="background-color: lightgrey"><?php echo $review['reviewdescription'] ?></blockquote><br>
                        <a href="reportAbuse.php?id=<?php echo $review['id']?>">Report Abuse</a>
                    </div>
                <?php }else{ ?>
                <div class="col-sm-8 col-sm-offset-2">
                    <h3><?php echo $review['reviewtitle'];$count++ ?></h3><br>
                    <input type="text" class="rating rating-loading reviewStars" value="<?php echo $review['rating'] ?>" data-size="sm" id="titleRating" name="rating" disabled><br>
                    <blockquote style="background-color: lightgrey"><?php echo $review['reviewdescription'] ?></blockquote><br>
                     <a href="reportAbuse.php?id=<?php echo $review['id']?>">Report Abuse</a>
                </div>

            <?php }endforeach; ?>
    </div>
    <footer>
        <h5 class="text-center">&copy;&nbsp;Esac Inc. All Rights Reserved 2016</h5>
    </footer>


    <!--add javascript source here : first add jquery CDN then add bootstrap javascript CDN-->
    <script   src="https://code.jquery.com/jquery-3.1.1.min.js"
              integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
              crossorigin="anonymous"></script>
    <!--adding bootstrap javascript here-->
    <script src="js/bootstrap.js"></script>
    <script src="bootstrap-star-rating-master/js/star-rating.js" type="text/javascript"></script>
    <script src="bootstrap-star-rating-master/themes/krajee-fa/theme.js" type="text/javascript"></script>
    <script src="bootstrap-star-rating-master/themes/krajee-svg/theme.js" type="text/javascript"></script>
    <script src="bootstrap-star-rating-master/themes/krajee-uni/theme.js" type="text/javascript"></script>

<?php
include_once "footerSalonOwner.php";
?>
