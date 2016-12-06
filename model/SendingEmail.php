<?php
class SendingEmail
{
public static function sendActivationEmail($email,$activationToken){
    $mail = new PHPMailer;
//Tell PHPMailer to use SMTP
        $mail->isSMTP();
//Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
        $mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = Confidential::$EMAIL;
//Password to use for SMTP authentication
        $mail->Password = Confidential::$PASSWORD;
//Set who the message is to be sent from
        $mail->setFrom(Confidential::$EMAIL, 'Esac inc.');
//Set who the message is to be sent to
        $mail->addAddress($email, 'User');
//Set the subject line
        $mail->Subject = 'verify email';
        $mail->isHTML(true);
        $mail->Body ='<h2>verify email</h2>
                            <p>following is the link to verify you account<br>
                            <a href="http://localhost/Project/MyCutMyTime/VerifyAccount.php?token='.$activationToken.'">click here to verify your account</a></p>
                            <hr style="size: 20px;width: 80%">
                            <p style="color:red;text-align:center">&copy;&nbsp;Esac Inc.</p>
                            <hr style="size: 20px;width: 80%">';

//send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
}
    public static function sendForgetPasswordEmail($email,$passwordToken){
        $mail = new PHPMailer;
//Tell PHPMailer to use SMTP
            $mail->isSMTP();
//Set the hostname of the mail server
            $mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
            $mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = Confidential::$EMAIL;
//Password to use for SMTP authentication
            $mail->Password = Confidential::$PASSWORD;
//Set who the message is to be sent from
            $mail->setFrom(Confidential::$EMAIL, 'Esac inc.');
//Set who the message is to be sent to
            $mail->addAddress($email, 'User');
//Set the subject line
            $mail->Subject = 'Reset Password';
            $mail->isHTML(true);
            $mail->Body ='<h2>Reset Password</h2>
                            <p>following is the link to reset your password<br>
                            <a href="http://localhost/Project/MyCutMyTime/ResetPassword.php?token='.$passwordToken.'">click here to reset password</a></p>
                            <hr style="size: 20px;width: 80%">
                            <p style="color:red;text-align:center">&copy;&nbsp;Esac Inc.</p>
                            <hr style="size: 20px;width: 80%">';

            //send the message, check for errors
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "<p style='color: green;text-align: center;font-size: medium'>Message sent! please check your email";
                include 'home.php';
            }
        }
    public static function sendingDeactivationEmail($email,$reviewid){
        $mail = new PHPMailer;
//Tell PHPMailer to use SMTP
        $mail->isSMTP();
//Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
        $mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = Confidential::$EMAIL;
//Password to use for SMTP authentication
        $mail->Password = Confidential::$PASSWORD;
//Set who the message is to be sent from
        $mail->setFrom(Confidential::$EMAIL, 'Esac inc.');
//Set who the message is to be sent to
        $mail->addAddress($email, 'User');
//Set the subject line
        $mail->Subject = 'Account Deactivated ';
        $mail->isHTML(true);
        //getting review details
        $review = new Reviews_db();
        $reportedReview = $review->getReviewById($reviewid);
        $reviewTitle = $reportedReview['title'];
        $reviewDesc = $reportedReview['reviewdescription'];
        $mail->Body ='<h2>Your Account has been deactivated</h2>
                            <p>following is the information regarding your account Deactivation<br>
                            <span>You posted a review that was reported<br>
                            abuse by the salon owner and for that we are taking this action and also deleting review</span>
                            <span>Details are attached as follow</span>
                            <strong>title</strong>'.$reviewTitle.'<br>
                            <strong>Description</strong>'.$reviewDesc.'<br>
                            <hr style="size: 20px;width: 80%">
                            <p style="color:red;text-align:center">&copy;&nbsp;Esac Inc.</p>
                            <hr style="size: 20px;width: 80%">';
        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
        //deleting the review
        $review->deleteReview($reviewid);
    }
    public static function sendReactivate($email){
        $mail = new PHPMailer;
//Tell PHPMailer to use SMTP
        $mail->isSMTP();
//Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
        $mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = Confidential::$EMAIL;
//Password to use for SMTP authentication
        $mail->Password = Confidential::$PASSWORD;
//Set who the message is to be sent from
        $mail->setFrom(Confidential::$EMAIL, 'Esac inc.');
//Set who the message is to be sent to
        $mail->addAddress($email, 'User');
//Set the subject line
        $mail->Subject = 'Account Re-Activated';
        $mail->isHTML(true);
        $mail->Body ='<h2>Account Re-Activation</h2>
                            <p>Your Account has been reactivated<br>
                            <hr style="size: 20px;width: 80%">
                            <p style="color:red;text-align:center">&copy;&nbsp;Esac Inc.</p>
                            <hr style="size: 20px;width: 80%">';

        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
    public static function sendSalonOwnerResponseForReportedAbuse($reviewid){
        $mail = new PHPMailer;
//Tell PHPMailer to use SMTP
        $mail->isSMTP();
//Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
        $mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = Confidential::$EMAIL;
//Password to use for SMTP authentication
        $mail->Password = Confidential::$PASSWORD;
//Set who the message is to be sent from
        $mail->setFrom(Confidential::$EMAIL, 'Esac inc.');
//Set who the message is to be sent to
        $review_db = new Reviews_db();
        $salonEmail = $review_db->getSalonEmailByReviewId($reviewid);
        $mail->addAddress($salonEmail, 'User');
//Set the subject line
        $mail->Subject = 'Appropriate Review';
        $mail->isHTML(true);
        $review = new Reviews_db();
        $reportedReview = $review->getReviewById($reviewid);
        $mail->Body ='<h2>Your Account has been deactivated</h2>
                            <p>you have reported a review abuse but our team finds it appropriate<br>
                            <span>Details are attached as follow</span>
                            <strong>title</strong>'.$reportedReview['title'].'<br>
                            <strong>Description</strong>'.$reportedReview['reviewdescription'].'<br>
                            <hr style="size: 20px;width: 80%">
                            <p style="color:red;text-align:center">&copy;&nbsp;Esac Inc.</p>
                            <hr style="size: 20px;width: 80%">';

        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
public static function sendContactUsEmail ($message, $fromEmail, $phone, $name){
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = Confidential::$EMAIL;
        //Password to use for SMTP authentication
        $mail->Password = Confidential::$PASSWORD;
        //Set who the message is to be sent from
        $mail->setFrom(Confidential::$EMAIL, 'Esac inc.');
        //Set who the message is to be sent to
        $mail->addAddress(Confidential::$EMAIL, 'Admin');
        //Set the subject line
        $mail->Subject = 'Comments from '. $name;
        $mail->isHTML(true);
        $mail->Body ='<h2>Comments from Customer!!</h2>
                            <h4>From: '. $name . '</h4>
                            <h4>Email: '.$fromEmail.' </h4>
                            <h4>Contact: '. $phone . '</h4>
                            <p>Message: '.$message.' </p>
                            <hr style="size: 20px; width: 80%">
                            <p style="color:red;text-align:center">&copy;&nbsp;Esac Inc.</p>
                            <hr style="size: 20px;width: 80%">';

        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "<p style='color: green;text-align: center;font-size: medium'>Thank you for contacting us we will get back to you";
            include 'home.php';
        }
    }
    public static function sendingAppoinymentConfirmation($email,$starttime,$endtime,$service,$address,$name,$date){
        $mail = new PHPMailer;
//Tell PHPMailer to use SMTP
        $mail->isSMTP();
//Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
        $mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = Confidential::$EMAIL;
//Password to use for SMTP authentication
        $mail->Password = Confidential::$PASSWORD;
//Set who the message is to be sent from
        $mail->setFrom(Confidential::$EMAIL, 'Esac inc.');
//Set who the message is to be sent to
        $mail->addAddress($email, 'User');
//Set the subject line
        $mail->Subject = 'Appointment confirmation';
        $mail->isHTML(true);
        $mail->Body ='<h2>Thanks for booking the appointment with us </h2>
                            <p>following is the information regarding your Appointment <br>
                            <span><strong>Salon Name - </strong>'.$name.'</span><br>
                            <span><strong>Salon Address - </strong>'.$address.'</span><br>
                            <span><strong>Appointment date - </strong>'.$date.'</span><br>
                            <span><strong>Appointment Start from  - </strong>'.$starttime.' till '.$endtime.'</span><br>
                            <span><strong>Appointment for - </strong>'.$service.'</span><br>
                            <hr style="size: 20px;width: 80%">
                            <p style="color:red;text-align:center">&copy;&nbsp;Esac Inc.</p>
                            <hr style="size: 20px;width: 80%">';
        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
}