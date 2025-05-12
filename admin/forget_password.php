<?php

include 'connetion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/phpmailer/src/PHPMailer.php';
require 'vendor/PHPMailer/phpmailer/src/SMTP.php';
require 'vendor/PHPMailer/phpmailer/src/Exception.php';
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:39:54 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:title" content="Admin Templates - Dashboard Templates">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <link rel="shortcut icon" href="assets/images/favicon.svg">

    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="assets/fonts/remix/remixicon.css">
    <link rel="stylesheet" href="assets/css/main.min.css">

</head>

<body class="login-bg">

    <!-- Container starts -->
    <div class="container">

        <!-- Auth wrapper starts -->
        <div class="auth-wrapper">




            <!-- Form starts -->
            <form method="Post">


                <div class="auth-box">

                    <h4 class="mb-4">Forgot Password</h4>

                    <!-- <a href="index-2.html" class="auth-logo mb-4">
                        <img src="assets/images/logo-dark.svg" alt="Bootstrap Gallery">
                    </a> -->


                    <?php

                    if (isset($_POST["btnsubmit"])) {

                        // echo "hello";
                        $email = $_POST["email"];

                        // echo $email;

                        $result = mysqli_query($conn, "select * from tbl_admin where email = '$email' ") or die(mysqli_error($conn));

                        $row = mysqli_num_rows($result);

                        if ($row >= 1) {

                            // echo "email";

                            foreach ($result as $row) {

                                $pass = $row['password'];
                                $useremail = $row['email'];
                                $username = $row['name'];


                                // echo "<br/>";
                                // echo $pass;
                                // echo "<br/>";
                                // echo $username;
                                // echo "<br/>";
                            }
                            $mail = new PHPMailer;

                            $mail->isSMTP();
                            //$mail->SMTPDebug = 1; # 0 off, 1 client, 2 client y server
                            $mail->CharSet  = 'UTF-8';
                            $mail->Host     = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->SMTPSecure = 'tls';
                            $mail->Port     = 587;
                            $mail->Username = 'preetkasodariya3008@gmail.com';
                            $mail->Password = 'vhqc fhwb zeud bsyw';
                            // Sender info 
                            $mail->setFrom('preetkasodariya3008@gmail.com', 'Admin');
                            $mail->addReplyTo('preetkasodariya3008@gmail.com', 'Admin');

                            // Add a recipient 
                            $mail->addAddress($email);

                            // Email subject 
                            $mail->Subject = 'Forgot Password';

                            // Set email format to HTML 
                            $mail->isHTML(true);

                            $mail->Body = "<h2> Login Details </h2>
                                    <p>Dear User,</p>
                                    <p>Username : $username</p>
                                    <p>UserEmail : $useremail</p>
                                    <p>Password : $pass</p>
                                    <h2>Thank You - Team MediTrack</h2>
                                    ";

                            // Send email 

                            if (!$mail->send()) {
                                echo "mail not send";
                                print_r(error_get_last());
                            } else {
                                // echo "Mail Send";
                                echo "<script>window.location='index.php'</script>";
                            }

                            // echo $name;
                        } else {
                            echo "Email Id Does not Register";
                        }
                    }




                    ?>


                    <h6 class="fw-light mb-4">In order to access your dashboard, please enter the email ID you provided during
                        the
                        registration process.</h6>

                    <div class="mb-3">
                        <label class="form-label" for="email">Your email <span class="text-danger">*</span></label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email">
                    </div>

                    <div class="mb-3 d-grid">
                        <button type="submit" class="btn btn-primary" name="btnsubmit">
                            Submit
                        </button>
                    </div>
                </div>

            </form>
            <!-- Form ends -->

        </div>
        <!-- Auth wrapper ends -->

    </div>
    <!-- Container ends -->

</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:39:54 GMT -->

</html>