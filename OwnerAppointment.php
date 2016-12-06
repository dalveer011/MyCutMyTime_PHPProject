<?php
/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-26
 * Time: 12:59 PM
 */

require_once 'model/requireClasses.php';
require_once 'Session.php';
$salonownerEmail = $_SESSION['username'];
$salonId = $_SESSION['salonId'];

include_once "header.php";

$orders_db = new Orders_db();
$allAppointments = $orders_db->getAppointmentDetailsforOwner($salonId);

?>
<title>Appointments</title>
</head>
<?php
include_once "navbarTopSalon.php";
include_once "navbarSideSalon.php";
?>

<body>
<div class="container-fluid">
    <div class="row">
        <?php if ($allAppointments == "No Appointments for Now"){ ?>
        <h1 class="text-center">No Appointments for Now</h1>
    </div>
    <?php } else { ?>
        <section class="row">
            <section class="col-sm-6 col-sm-offset-2">
                <form id="ownerappoint">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Order Date</th>
                            <th>Appointment start-time</th>
                            <th>Appointment end-time</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($allAppointments as $appointment): ?>
                            <tr class="info">
                                <td><?php echo $appointment['firstname'] ?><?php echo $appointment['lastname'] ?></td>
                                <td><?php echo $appointment['orderdate'] ?></td>
                                <td><?php echo $appointment['appointmentstarttime'] ?> </td>
                                <td><?php echo $appointment['appointmentendtime'] ?> </td>
                                <td><a href="AppointmentDone.php?id=<?php echo $appointment['id'] ?>"
                                       class="btn btn-success">Done with Appointment</td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </form>
            </section>
        </section>
    <?php } ?>
</div>
<div
<footer>
    <h5 class="text-center">&copy;&nbsp;Esac Inc. All Rights Reserved 2016</h5>
</footer>
</div>
</body>
<?php
include_once "footerSalonOwner.php";

?>


