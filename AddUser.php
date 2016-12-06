<?php
require 'Required Packages/PHPMailer/PHPMailerAutoload.php';
require_once 'model/LoadingClasses.php';
$useradded = false;
if(isset($_POST['register'])){
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if(empty($email)||empty($firstname)||empty($lastname)||empty($password)||empty($role)){
        echo "<p style='color: darkred;text-align: center'>All fields are mandatory</p>";
        include_once './SignUp.php';
    }else {
        if ($role == "User") {
            $user = new User();
            $user->setFirstName($firstname);
            $user->setLastName($lastname);
            $user->setEmail($email);
            $user->setPassword($password);
            if ($user->createUser($user)) {
                $useradded = true;
                include 'home.php';
            } else {
                include 'SignUp.php';
            }
        } else {
            $owner = new SalonOwner();
            $owner->setFname($firstname);
            $owner->setLname($lastname);
            $owner->setEmail($email);
            $owner->setPassword($password);
            if ($owner->createOwner($owner)) {
                $useradded = true;
                include 'home.php';
            } else {
                include 'SignUp.php';
            }
        }
    }
}else{
    header('Location ./Error.php');
}
?>
<html>
<head></head>
<body>
<div class="modal fade" id='verifyemailmodal' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Email Verification</h4>
            </div>
            <div class="modal-body">
                <span style="color: green">You account has been created please verify your email and then you can use all<br>
                    our services.We are very happy to have you </span>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id='emailAlreadyExists' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Email Id already exist</h4>
            </div>
            <div class="modal-body">
                <span style="color: red">Please enter some other email id this id already exists</span>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--add javascript source here : first add jquery CDN then add bootstrap javascript CDN-->
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"
          integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
          crossorigin="anonymous"></script>
<!--adding bootstrap javascript here-->
<script src="js/bootstrap.js"></script>
<script src="js/script.js"></script>
<?php
if($useradded){
    echo "<script>$('#verifyemailmodal').modal('show')</script>";
}else{
    echo "<script>$('#emailAlreadyExists').modal('show')</script>";
}
?>
</body>
</html>
</body>
</html>
