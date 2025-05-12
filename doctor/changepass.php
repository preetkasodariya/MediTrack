<?php include 'sesstion.php'; ?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/add-patient.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:06 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>

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

    <!-- *************
		************ Vendor Css Files *************
	************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css">

    <!-- Uploader CSS -->
    <link rel="stylesheet" href="assets/vendor/dropzone/dropzone.min.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <!-- Page wrapper starts -->
    <div class="page-wrapper">

        <!-- App header starts -->
        <?php include 'header.php'; ?>
        <!-- App header ends -->

        <!-- Main container starts -->
        <div class="main-container">

            <!-- Sidebar wrapper starts -->
            <?php include 'sidebar.php'; ?>
            <!-- Sidebar wrapper ends -->

            <!-- App container starts -->
            <div class="app-container">

                <!-- App hero header starts -->
                <div class="app-hero-header d-flex align-items-center">

                    <!-- Breadcrumb starts -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
                            <a href="doctor_dashboard.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            change password
                        </li>
                    </ol>
                    <!-- Breadcrumb ends -->

                    <!-- Sales stats starts -->
                    <div class="ms-auto d-lg-flex d-none flex-row">
                        <div class="d-flex flex-row gap-1 day-sorting">
                            <a href="doctor_dashboard.php" class="btn btn-sm btn-primary">Back</a>

                        </div>
                    </div>
                    <!-- Sales stats ends -->

                </div>
                <!-- App Hero header ends -->

                <!-- App body starts -->
                <div class="app-body">

                    <!-- Row starts -->
                    <div class="row gx-3">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Change password</h5>
                                </div>
                                <div class="card-body">

                                <?php 
                                     
                                     if(isset($_POST["btnsubmit"]))
                                     {
                                        $oldpass = $_POST["oldpass"];
                                        $NewPass = $_POST["newpass"];
                                        $id = $_SESSION["DocId"];



                                        $result = mysqli_query($conn,"select * from tbl_doctors where doctor_id='$id' and password='$oldpass'");
                                        

                                        if(mysqli_num_rows($result)<=0)
                                        {
                                            echo "Old Password Not Match!";
                                        }
                                        else
                                        {
                                        $result = mysqli_query($conn,"update tbl_doctors set password='$NewPass' where doctor_id='$id'");
                                        if($result)
                                        {
                                            // header("Location:index.php");
                                            echo "<script>window.location='index.php'</script>";
                                        }
                                        else
                                        {
                                            echo "Password Not Change!";
                                        }

                                        }

                                        // echo $NewPass;
                                     }
                                ?>


                                    <form method="post" id="frm">
                                        <!-- Row starts -->
                                        <div class="row gx-3">

                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a1">Old password</label>
                                                    <input type="password" class="form-control" id="oldpass" name="oldpass" placeholder="Enter Old password">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a1">New password</label>
                                                    <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Enter New password">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a1">Confirm password</label>
                                                    <input type="password" class="form-control" id="confpass" name="confpass" placeholder="Enter confirm  password">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="d-flex gap-2 justify-content-end">
                                                    <button type="submit"  name="btnsubmit" class="btn btn-primary">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>

                                           
                                        </div>
                                        <p id="error-message" style="color: red; display: none;">Passwords do not match!</p>
                                        <!-- Row ends -->

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row ends -->

                </div>
                <!-- App body ends -->

                <!-- App footer starts -->
                <?php include 'footer.php'; ?>
                <!-- App footer ends -->

            </div>
            <!-- App container ends -->

        </div>
        <!-- Main container ends -->

    </div>
    <!-- Page wrapper ends -->

    <!-- *************
			************ JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/moment.min.js"></script>

    <!-- *************
			************ Vendor Js Files *************
		************* -->

    <!-- Overlay Scroll JS -->
    <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

    <!-- Dropzone JS -->
    <script src="assets/vendor/dropzone/dropzone.min.js"></script>

    <!-- Custom JS files -->
    <script src="assets/js/custom.js"></script>

    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script>

    <script>
        $(document).ready(function() {

            $("#frm").validate({
                rules: {
                    oldpass: {
                        required: true
                    },
                    newpass: {
                        required: true,
                        minlength: 8,
                        maxlength: 14,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,14}$/

                    },
                    confpass: {
                        required: true,
                    }
                },
                messages: {
                    oldpass: {
                        required: "Please Enter Old password"
                    },
                    newpass: {
                        required: "Please enter NEw password",
                        minlength: "Password must be at least 8 characters",
                        maxlength: "Password must not exceed 14 characters",
                        pattern: "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character."
                    },

                    confpass: {
                        required: "Please enter Confirm password"

                    }
                }
            });

        });
    </script>

<script>
        $(document).ready(function() {
            $('#frm').on('submit', function(event) {
                var newPassword = $('#newpass').val();
                var confirmPassword = $('#confpass').val();

                if (newPassword !== confirmPassword) {
                    $('#error-message').show();
                    event.preventDefault();
                } 
                else {
                    $('#error-message').hide();
                }
            });
        });
    </script>
</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/add-patient.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:06 GMT -->

</html>