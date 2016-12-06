<?php
include 'Session.php';
require_once "model/requireClasses.php";
if(!isset($_SESSION['username'])){
    header("Location: /Error.php");
}

$mySalonOwner = new SalonOwner();
$ownerid = $mySalonOwner->getSalonOwnerId($_SESSION['username']);
$salons_db = new Salons_db();
$salons = $salons_db->listSalonBySalonOwnerId($ownerid);

include_once "header.php";
?>

<!--Include title and close head tag-->
<title>View Salons</title>
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
                <li class="active"><a href="#">View Salons</a></li>
                <li><a href="AddSalon.php">Add Salon</a></li>
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
                <li ><a href="SalonWelcome.php">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                <li ><a href="#">View Salons<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bell"></span></a></li>
                <li ><a href="AddSalon.php">Add Salons<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bell"></span></a></li>
            </ul>
        </div>
    </div><!--container-fluid-->
</nav>

<div class="container-fluid">
        <div class="row">
            <div class="text-center page-header">
                <h1>Salons</h1>
            </div>
            <div class="col-md-8 col-sm-8 col-lg-8 table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>Province</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($salons as $salon): ?>
                    <tr>
                        <td><?php echo $salon['name']?></td>
                        <td><?php echo $salon['email']?></td>
                        <td><?php echo $salon['phone']?></td>
                        <td><?php echo $salon['streetaddress']?></td>
                        <td><?php echo $salon['city']?></td>
                        <td><?php echo $salon['province']?></td>
                        <td>
                            <a>
                                <form method="post" action="SalonHome.php">
                                    <input type="hidden" name= "salonid" value="<?php echo $salon['id'] ?>">
                                    <input type="submit" value="View Details" name="submit">
                                </form>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="AddSalon.php">Add Salons</a>
                </div>
            </div>
        </div>

        <footer>
            <h5 class="text-center">&copy;&nbsp;Esac Inc. All Rights Reserved 2016</h5>
        </footer>
</div>

<!-- Footer file here -->
<?php
include_once "footerSalonOwner.php";
?>

