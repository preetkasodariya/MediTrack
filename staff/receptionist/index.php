<?php

session_start();

include 'connetion.php';

?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:41:36 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>

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



            <div class="auth-box">
                <a href="index-2.html" class="auth-logo mb-4">
                    <img src="assets/images/logo-dark.svg" alt="Bootstrap Gallery">
                </a>
                <?php

                if (isset($_POST["btnsubmit"])) {
                    // echo "yes";

                    $txtuname = $_POST["username"];
                    $txtpws = $_POST["pwd"];

                    // echo $txtemail;
                    // echo $txtpws;


                    $result = mysqli_query($conn, "select * from tbl_staff where username='$txtuname' and password='$txtpws' and type='Receptionist'") or die(mysqli_error($conn));

                    if (mysqli_num_rows($result) <= 0) {
                        // echo "no";
                ?>
                        <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
                            Please Enter Valid Email & Password!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                <?php


                    } else {
                        // echo "yes";

                        $_SESSION["stafflogin"] = "true";


                        while($row = mysqli_fetch_assoc($result))
                        {
                            $_SESSION["staffid"] = $row["staff_id"];
                            $_SESSION["staffuname"] = $row["username"];
                            $_SESSION["staffemail"] = $row["email"];
                            $_SESSION["staffmobile"] = $row["mobile_number"];
                            $_SESSION["staffname"] = $row["first_name"] . " " . $row["last_name"];
                        }



                        header("Location:receptionist_dashboard.php");
                    }
                }

                ?>

                <h4 class="mb-4">Login</h4>

                <!-- Form starts -->
                <form method="post">



                    <div class="mb-3">
                        <label class="form-label" for="email">Your Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Username">
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="pwd">Your password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Enter password">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                <i class="ri-eye-line text-primary" id="eyeIcon"></i>
                            </button>
                           
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        <a href="forget_password.php" class="text-decoration-underline">Forgot password?</a>
                    </div>

                    <div class="mb-3 d-grid gap-2">
                        <button type="submit" name="btnsubmit" class="btn btn-primary">Login</button>

                    </div>

                </form>
                <!-- Form ends -->


            </div>


        </div>
        <!-- Auth wrapper ends -->

    </div>
    <!-- Container ends -->
    <script>
        function togglePassword() {
            const pwdInput = document.getElementById('pwd');
            const icon = document.getElementById('eyeIcon');
            if (pwdInput.type === 'password') {
                pwdInput.type = 'text';
                icon.classList.replace('ri-eye-line', 'ri-eye-off-line');
            } else {
                pwdInput.type = 'password';
                icon.classList.replace('ri-eye-off-line', 'ri-eye-line');
            }
        }

    </script>
</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:41:36 GMT -->

</html>