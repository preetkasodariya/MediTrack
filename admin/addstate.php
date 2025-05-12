<?php include 'sesstion.php'; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/add-patient.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:06 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add State</title>

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
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            Add State
                        </li>
                    </ol>
                    <!-- Breadcrumb ends -->

                    <!-- Sales stats starts -->
                    <div class="ms-auto d-lg-flex d-none flex-row">
                        <div class="d-flex flex-row gap-1 day-sorting">
                            <a href="viewstate.php" class="btn btn-sm btn-primary">View State</a>

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
                                    <h5 class="card-title">Add State</h5>
                                </div>
                                <div class="card-body">

                                    <?php

                                    if (isset($_POST["btnsubmit"])) {
                                        // $sid = $_POST["stateid"];
                                        $sname = $_POST["statename"];


                                        $sql = mysqli_query($conn, "select * from tbl_states where state_name='$sname'") or die(mysqli_error($conn));

                                        if (mysqli_num_rows($sql) <= 0) {

                                            $result = mysqli_query($conn, "insert into tbl_states (state_name) values ('$sname')") or die(mysqli_error($conn));


                                            if ($result) {
                                    ?>
                                                <div class="alert bg-primary text-white alert-dismissible fade show" role="alert">
                                                    Data Inserted!
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>

                                            <?php
                                            } else {
                                            ?>
                                                <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
                                                    Data Not Inserted!
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>

                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
                                                Data Already Axist!
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>

                                    <?php
                                        }
                                    }

                                    ?>

                                    <!-- Row starts -->
                                    <form method="POST" id="frm">
                                        <div class="row gx-3">


                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a1">State Name</label>
                                                    <input type="text" class="form-control" id="statename" name="statename" placeholder="Enter State Name">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="d-flex gap-2 justify-content-end">

                                                    <button type="submit" name="btnsubmit" class="btn btn-primary">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- Row ends -->

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
                    statename: {
                        required: true
                    }
                },
                messages: {
                    statename: {
                        required: "Please Enter State Name",
                    }
                }
            });

        });
    </script>
</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/add-patient.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:06 GMT -->

</html>