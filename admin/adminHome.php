<?php
require_once '../model/requireClasses.php';
require_once './AdminSession.php';
$admin = new Admin_db();
$listOfCustomers = $admin->getAllUsers();
$listOfsalonOwners = $admin->getAllSalonOwners();
?>
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
                <li class="active"><a href="./adminHome.php">Home</a></li>
                <li><a href="./ReportedAbuse.php">Reported Reviews</a></li>
                <li><a href="./adminLogout.php" class="btn btn-danger" id="btnSignUp">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <section class="row">
        <h3>List of all the customers</h3>
        <div class="col-sm-offset-1 col-sm-10" id="customers">
            <input class="search form-control" placeholder="Search customer by first name,last name or email"/><br>
            <table class="table">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <tbody class="list">
                <?php foreach ($listOfCustomers as $customer) : ?>
                    <tr>
                        <td class="firstname"><?php echo $customer['firstname'] ?></td>
                        <td class="lastname"><?php echo $customer['lastname'] ?></td>
                        <td class="email"><?php echo $customer['email'] ?></td>
                        <td><?php echo $admin->getAccountStatus($customer['email']) ?></td>
                        <td><a href="TakingActions.php?action=activate&email=<?php echo $customer['email']?>" class="btn btn-success">Activate</a>
                        <td><a href="TakingActions.php?action=deactivate&email=<?php echo $customer['email']?>" class="btn btn-success">Deactivate</a>
                        <td><a href="TakingActions.php?action=delete&email=<?php echo $customer['email']?>" class="btn btn-success">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <ul class="pagination"></ul>
        </div>
    </section>
    <hr>
    <section class="row">
        <h3>List of all salon Owners</h3>

        <div class="col-sm-offset-1 col-sm-10" id="salonowners">
            <input class="search form-control" placeholder="Search salon owner by first name,last name or email"/><br>
            <table class="table">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <tbody class="list">
                <?php foreach ($listOfsalonOwners as $salonowner) : ?>
                    <tr>
                        <td class="firstname"><?php echo $salonowner['firstname'] ?></td>
                        <td class="lastname"><?php echo $salonowner['lastname'] ?></td>
                        <td class="email"><?php echo $salonowner['email'] ?></td>
                        <td><?php echo $admin->getAccountStatus($salonowner['email']) ?></td>
                        <td><input type="submit" class="btn btn-success" name="activate" value="Activate">
                        <td><input type="submit" name="deactivate" class="btn btn-warning" value="Deactivate">
                        <td><input type="submit" name="delete" class="btn btn-danger" value="delete">
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <ul class="pagination"></ul>
        </div>
    </section>
</div>
<!--add javascript source here : first add jquery CDN then add bootstrap javascript CDN-->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<!--adding bootstrap javascript here-->
<script src="../js/bootstrap.js"></script>
<!--list.js lets us search and do pagination-->
<script src="http://listjs.com/assets/javascripts/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
<script src="../js/script.js"></script>
<!--pagination and search-->
<script>
    var customerList = new List('customers', {
        valueNames: ['firstname', 'email', 'lastname'],
        page: 2,
        plugins: [ListPagination({})]
    });
    var customerList = new List('salonowners', {
        valueNames: ['firstname', 'email', 'lastname'],
        page: 2,
        plugins: [ListPagination({})]
    });
</script>
</body>
</html>
