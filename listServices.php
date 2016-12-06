<?php
require_once 'Session.php';
require_once 'model/requireClasses.php';
$salonowneremail = $_SESSION['username'];
$salonid = $_SESSION['salonId'];

$services_db = new Services_db();
$allservices = $services_db->getAllServicesWithDetails($salonid);

include_once 'header.php';
?>

<title>Listing all Services</title>
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
                <li><a href="viewReviews.php">View Reviews</a></li>
                <li><a href="./graph.php">Reports</a></li>
                <li><a href="#" class="btn btn-danger" id="btnSignUp">Log Out</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

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
                <li ><a href="SalonHome.php">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                <li ><a href="viewProfileSalon.php">Profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                <li ><a href="./OwnerAppointment.php">Appointments<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bell"></span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-star"></span></a>

                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li class="active"><a>
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
                <li><a href="#">Reviews<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list-alt"></span></a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="text-center page-header">
            <h1>Services</h1>
        </div>
        <div class="col-md-8 table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Service Description</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($allservices as $service): ?>
                    <tr>
                        <td><?php echo $service['id']?></td>
                        <td><?php echo $service['servicedescription']?></td>
                        <td><?php echo $service['price']?></td>
                        <td>
                            <a>
                                <form method="post" action="editService.php">
                                    <input type="hidden" name="salonid" value="<?php echo $salonid?>">
                                    <input type="hidden" name="serviceid" value="<?php echo $service['id']?>">
                                    <input type="submit" name="EditService" value="Modify">
                                </form>
                            </a>
                        </td>
                        <td>
                            <a>
                                <form method="post" action="DeleteService.php">
                                    <input type="hidden" name="salonid" value="<?php echo $salonid?>">
                                    <input type="hidden" name="serviceid" value="<?php echo $service['id']?>">
                                    <input type="submit" name="DeleteService" value="Delete">
                                </form>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            <div class="text-center">
                <a>
                    <form method="post" action="AddService.php">
                        <input type="hidden" name="salonid" value="<?php echo $salonid?>">
                        <input type="submit" name="submit" value="Add Services">
                    </form>
                </a>
            </div>
        </div>
    </div>
    <footer>
        <h5 class="text-center">&copy;&nbsp;Esac Inc. All Rights Reserved 2016</h5>
    </footer>
</div>

<?php
include_once 'footerSalonOwner.php'
?>


