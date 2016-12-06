<?php
/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-12-02
 * Time: 1:30 AM
 */

require_once 'model/requireClasses.php';
if(isset($_GET['salonid'])) {
    $salonid = $_GET['salonid'];
    $reviews_db = new Reviews_db();
    $reviews = $reviews_db->getReviewBySalonId($salonid);
}else{
    header("Location: ./Error.php");
}
?>
<html>
<head>
<title>View Reviews</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="bootstrap-star-rating-master/css/star-rating.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="css/myCSS.css">
    <link rel="stylesheet" href="./bootstrap-star-rating-master/themes/krajee-fa/theme.min.css" media="all" type="text/css"/>
<link rel="stylesheet" href="bootstrap-star-rating-master/themes/krajee-svg/theme.css" media="all" type="text/css"/>
<link rel="stylesheet" href="bootstrap-star-rating-master/themes/krajee-uni/theme.css" media="all" type="text/css"/>
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
            <a href="./home.php"><img src="images/logo.jpg" alt="Company Logo"/></a>
        </div>
        </div>
    </nav>
<div class="container-fluid" style="padding-top: 20px;">
    <?php foreach ($reviews as $review): ?>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-2">
                <h3><?php echo $review['reviewtitle']?></h3>

                    <input type="text" class="rating rating-loading reviewStars" value="<?php echo $review['rating'] ?>" data-size="sm" id="titleRating" name="rating" disabled>
                    <blockquote style="background: lightgrey"><?php echo $review['reviewdescription'] ?></blockquote>
</div>
                </div>
            <?php endforeach; ?>
        </div><!--col-md-8-->
    </div><!--row-->

    <footer>
        <h5 class="text-center">&copy;&nbsp;Esac Inc. All Rights Reserved 2016</h5>
    </footer>
</div>

<!--add javascript source here : first add jquery CDN then add bootstrap javascript CDN-->
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"
          integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
          crossorigin="anonymous"></script>
<!--adding bootstrap javascript here-->
<script src="js/bootstrap.js"></script>
<script src="bootstrap-star-rating-master/js/star-rating.js" type="text/javascript"></script>
<script src="bootstrap-star-rating-master/js/themes/krajee-fa/theme.js" type="text/javascript"></script>
<script src="bootstrap-star-rating-master/js/themes/krajee-svg/theme.js" type="text/javascript"></script>
<script src="bootstrap-star-rating-master/js/themes/krajee-uni/theme.js" type="text/javascript"></script>
</body>
</html>