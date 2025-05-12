<?php include 'sesstion.php'; ?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:39:07 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Patient</title>

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
    <style>
        #patient_image {
            border-radius: 50%;
            height: 50px; 
            width: 50px;
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
                            <a href="receptionist_dashboard.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            View Patient
                        </li>
                    </ol>
                    <!-- Breadcrumb ends -->

                    <!-- Sales stats starts -->
                    <div class="ms-auto d-lg-flex d-none flex-row">
                        <div class="d-flex flex-row gap-1 day-sorting">
                            <a href="add_patient.php" class="btn btn-sm btn-primary">Add Patient</a>
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
                                    <h5 class="card-title">View Patient</h5>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Doctor Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete data ?
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post">
                                                    <input type="hidden" name="deleteid" id="deleteid">
                                                    <input type="hidden" name="deleteimg" id="deleteimg">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                    <button type="submit" name="deletebtn" class="btn btn-primary">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php

                                if (isset($_POST["deletebtn"])) {
                                    $did = $_POST["deleteid"];
                                    $dimg = $_POST["deleteimg"];

                                    unlink("uploads/patient/$dimg");

                                    $result = mysqli_query($conn, "delete from tbl_patients where patient_id='$did'") or die(mysqli_error($conn));
                                }


?>

                                


                                <div class="card-body">
                                    <div class="table-outer">
                                        <div class="table-responsive">
                                            <table class="table truncate align-middle">
                                                <thead>
                                                    <tr>
                                                        <th width="30px">#</th>
                                                        <th width="100px">Image</th>
                                                        <th width="100px">city</th>
                                                        <th width="100px">Name</th>
                                                        <th width="100px">Age</th>
                                                        <th width="100px">Gender</th>
                                                        <!-- <th width="100px">Mobile Number</th> -->
                                                        <!-- <th width="100px">Email ID</th> -->
                                                        <!-- <th width="100px">Blood Group</th> -->
                                                        <!-- <th width="100px">Address</th> -->
                                                        <!-- <th width="100px">Pincode</th> -->
                                                        <!-- <th width="100px">username</th> -->
                                                        <!-- <th width="100px">Password</th> -->
                                                        <th width="100px">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php

                                                    $count = 1;

                                                    $result = mysqli_query($conn,"select * from tbl_patients as p left join tbl_city as c on p.city_id=c.city_id") or die(mysqli_error($conn));

                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $count++; ?>
                                                            </td>

                                                            <td><img id="patient_image" src="uploads/patient/<?php echo $row["patient_image"]; ?>" alt=""></td>
                                                            <td><?php echo $row["city_name"]; ?></td>
                                                            <td><?php echo $row["firstname"] . " " . $row["lastname"]; ?></td>
                                                            <td><?php echo $row["age"]; ?></td>
                                                            <td><?php echo $row["gender"]; ?></td>
                                                            <!-- <td><?php echo $row["number"]; ?></td> -->
                                                            <!-- <td><?php echo $row["email"]; ?></td> -->
                                                            <!-- <td><?php echo $row["blood_group"]; ?></td> -->
                                                            <!-- <td><?php echo $row["address"]; ?></td> -->
                                                            <!-- <td><?php echo $row["pincode"]; ?></td> -->
                                                            <!-- <td><?php echo $row["username"]; ?></td> -->
                                                            <!-- <td><?php echo $row["password"]; ?></td> -->
                                                            <td>
                                                                
                                                                <button class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Patient Details"><a href="patient_detail.php?dataid=<?php echo $row["patient_id"]; ?>"><i class="ri-eye-line"></i></a></button>

                                                                <a href="edit_patient.php?updateid=<?php echo $row["patient_id"]; ?>" class="btn btn-outline-success btn-sm"> <i class="ri-edit-box-line"></i></a>
                                                                
                                                                <button class="btn btn-outline-danger btn-sm" data-bs-placement="top" data-bs-title="Delete Patient Detail" data-id="<?php echo $row["patient_id"]; ?>" data-img="<?php echo $row["patient_image"]; ?>" id="btndelete"
                                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="ri-delete-bin-line"></i></button>
                                                            </td>
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


    <script>
        $(document).ready(function() {


            $(document).on("click", "#btndelete", function() {
                // alert("test")


                var id = $(this).attr("data-id");
                var img = $(this).attr("data-img");
                $("#deleteid").val(id);
                $("#deleteimg").val(img);


            });

        });
    </script>
</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:39:12 GMT -->

</html>