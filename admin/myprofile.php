<?php include 'sesstion.php'; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:39:07 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile</title>

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
                            My Profile
                        </li>
                    </ol>
                    <!-- Breadcrumb ends -->

                    <!-- Sales stats starts -->
                    <div class="ms-auto d-lg-flex d-none flex-row">
                        <div class="d-flex flex-row gap-1 day-sorting">
                            <a href="add_doctor.php" class="btn btn-sm btn-primary">My Profile</a>

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
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="card-title">My Profile</h5>
                                </div>
                                <div class="card-body" style="border: none; box-shadow: none;">
                                    <div class="table-outer" style="border: none;">
                                        <div class="table-responsive" style="border: none;">
                                            <table class="table truncate align-middle" style="width: 100%; border-collapse: collapse; border: none;">
                                                <tbody>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM tbl_admin") or die(mysqli_error($conn));
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <tr style="border: none;">
                                                            <th width="100px" style="border: none;">Name</th>
                                                            <td style="border: none;"><?php echo $row["name"]; ?></td>
                                                        </tr>
                                                        <tr style="border: none;">
                                                            <th width="100px" style="border: none;">Email</th>
                                                            <td style="border: none;"><?php echo $row["email"]; ?></td>
                                                        </tr>
                                                        <tr style="border: none;">
                                                            <th width="100px" style="border: none;">Username</th>
                                                            <td style="border: none;"><?php echo $row["username"]; ?></td>
                                                        </tr>
                                                        <tr style="border: none;">
                                                            <th width="100px" style="border: none;">Mobile</th>
                                                            <td style="border: none;"><?php echo $row["mobile"]; ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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

    <!-- Custom JS files -->
    <script src="assets/js/custom.js"></script>


</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:39:12 GMT -->

</html>