<?php include 'sesstion.php'; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/book-appointment.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:10 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Appointment</title>

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
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- *************
		************ Vendor Css Files *************
	************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css">
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
                            <a href="receptionist_dashboard.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            Book Appointment
                        </li>
                    </ol>
                    <!-- Breadcrumb ends -->

                    <!-- Sales stats starts -->
                    <div class="ms-auto d-lg-flex d-none flex-row">
                        <div class="d-flex flex-row gap-1 day-sorting">
                            <button class="btn btn-sm btn-primary"><a href="view_appointment.php" style="color: inherit;">View Appointment</a></button>
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
                                    <h5 class="card-title">Book Appointment</h5>
                                </div>
                                <div class="card-body">


                                    <?php

                                    if (isset($_POST["btnsubmit"])) {
                                        $patID = $_POST["PID"];
                                        $app_date = $_POST["AppDate"];
                                        $app_time = $_POST["AppTime"];
                                        $pat_problem = $_POST["problem"];
                                        $pat_weight = $_POST["weight"];
                                        $type = $_POST["pat_type"];
                                        $ammt = $_POST["amt"];
                                        $pay_type = $_POST["payType"];
                                        $did = $_POST["Did"];



                                        $result = mysqli_query($conn, "insert into tbl_appointment (patient_id,Add_date,Add_time,problem,weight,patient_type,ammount,payment_type,doctor_id) 
                                values ('$patID','$app_date','$app_time','$pat_problem','$pat_weight','$type','$ammt','$pay_type','$did' )") or die(mysqli_error($conn));

                                        if ($result) {
                                    ?>
                                            <div class="alert bg-primary text-white alert-dismissible fade show" role="alert">
                                                Data Inserted!
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                <?php echo "<script>window.location='view_appointment.php'</script>"; ?>
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
                                    };

                                    ?>

                                    <!-- Row starts -->
                                    <form method="POST" id="appfrm">
                                        <div class="row gx-3">
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a1">Patient Name</label>
                                                    <select type="text" class="form-control" name="PID" id="PID" placeholder="Enter City">
                                                        <option>Select Patient</option>

                                                        <?php

                                                        $count = 1;

                                                        $result = mysqli_query($conn, "select * from tbl_patients ") or die(mysqli_error($conn));

                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                        ?>
                                                            <option value="<?php echo $row["patient_id"]; ?>"><?php echo $row["firstname"] . " " . $row["lastname"];  ?> </option>

                                                        <?php


                                                        }

                                                        ?>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a6">Appointment Date</label>
                                                    <input type="date" class="form-control" name="AppDate" id="AppDate" placeholder="Select date">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a7">Appointment Time</label>
                                                    <input type="time" class="form-control" name="AppTime" id="AppTime" placeholder="Select time">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a9">Problem</label>
                                                    <textarea class="form-control" name="problem" id="problem" placeholder="Enter Problem" rows="3" style="overflow: hidden; resize: none; "></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a7">Weight</label>
                                                    <input type="number" class="form-control" name="weight" id="weight" placeholder="Enter Weight">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a7">Doctor Id</label>
                                                    <select type="text" class="form-control" name="Did" id="Did" placeholder="Enter City">
                                                        <option>Select Doctor</option>

                                                        <?php

                                                        $count = 1;

                                                        $result = mysqli_query($conn, "select * from tbl_doctors ") or die(mysqli_error($conn));

                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                        ?>
                                                            <option value="<?php echo $row["doctor_id"]; ?>"><?php echo $row["first_name"] . " " . $row["last_name"];  ?> </option>

                                                        <?php


                                                        }

                                                        ?>


                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="selectGender1">Type<span
                                                            class="text-danger">*</span></label>
                                                    <div class="m-0">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pat_type"
                                                                id="pat_type" value="New">
                                                            <label class="form-check-label">New</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pat_type"
                                                                id="pat_type" value="Old">
                                                            <label class="form-check-label">Old</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a7">Amount</label>
                                                    <input type="number" class="form-control" name="amt" id="amt" placeholder="Enter Amoumt">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="selectGender1">Payment Type<span
                                                            class="text-danger">*</span></label>
                                                    <div class="m-0">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="payType" id="payType" value="Cash">
                                                            <label class="form-check-label">Cash</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="payType" id="payType" value="Online Payment">
                                                            <label class="form-check-label">Online Payment</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-12">
                                            <div class="d-flex gap-2 justify-content-end">
                                                <a href="appointments-list.html" class="btn btn-outline-secondary">
                                                    Cancel
                                                </a>
                                                <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary">
                                                    Book Appointment
                                                </button>
                                            </div>
                                        </div>
                                </div>
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

    <!-- Custom JS files -->
    <script src="assets/js/custom.js"></script>
   
    <!-- jQuery (needed for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script>

    <script>
        $(document).ready(function() {

            $("#appfrm").validate({

                rules: {
                    PID: {
                        required: true
                    },

                    AppDate: {
                        required: true
                    },

                    AppTime: {
                        required: true
                    },

                    problem: {
                        required: true
                    },

                    weight: {
                        required: true
                    },

                    Did: {
                        required: true
                    },

                    pat_type: {
                        required: true,
                        
                    },

                    amt: {
                        required: true,
                     
                    },

                    payType: {
                        required: true
                    }
                },
                
            });

});

                </script>
    <script>
        $(document).ready(function() {

            $("#appfrm").validate({
                rules: {
                    problem: {
                        required: true
                    }
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#PID').select2({
                placeholder: "Select Patient",
                allowClear: true,
                width: 'resolve' // adjust width nicely
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#Did').select2({
                placeholder: "Select Patient",
                allowClear: true,
                width: 'resolve' // adjust width nicely
            });
        });
    </script>


</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/book-appointment.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:10 GMT -->

</html>