<?php
/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-25
 * Time: 4:23 PM
 */
?>

<nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
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
                <li ><a href="SalonWelcome.php">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                <li ><a href="#">Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                <li ><a href="./OwnerAppointment.php">Appointments<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bell"></span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-star"></span></a>

                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a>
                            <form method="post" action="listServices.php">
                                <input type="hidden" name="salonid" value=" <?php echo $salonid?>">
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
    </div>
</nav>
