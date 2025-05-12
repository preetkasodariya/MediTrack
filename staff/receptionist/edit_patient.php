<?php include 'sesstion.php'; ?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/add-patient.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:06 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Patient</title>

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

    <!-- Uploader CSS -->
    <link rel="stylesheet" href="assets/vendor/dropzone/dropzone.min.css">
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
                            <a href="view_patient.php"> View Patients</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            Update Patient Details
                        </li>
                    </ol>
                    <!-- Breadcrumb ends -->

                    <!-- Sales stats starts -->
                    <div class="ms-auto d-lg-flex d-none flex-row">
                        <div class="d-flex flex-row gap-1 day-sorting">
                            <a href="view_patient.php" class="btn btn-sm btn-primary">View Patient</a>
                            <button class="btn btn-sm btn-primary"><a href="receptionist_dashboard.php" style="color: inherit;">Back</a></button>
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
                                    <h5 class="card-title">Update Patient Details</h5>
                                </div>
                                <div class="card-body">


                                    <?php
                                    if (isset($_POST["btnsubmit"])) {
                                        $first_name = $_POST["fname"];
                                        $last_name = $_POST["lname"];
                                        $patient_age = $_POST["age"];
                                        $patient_gender = $_POST["gender"];
                                        $patient_num = $_POST["num"];
                                        $patient_email = $_POST["email"];
                                        $patient_blood_group = $_POST["bgroup"];
                                        $patient_address = $_POST["add"];
                                        $postal_code = $_POST["pcode"];

                                        $cityid = $_POST["cid"];
                                        $id = $_GET["updateid"];


                                        $oldimage = $_POST['oldimg'];
                                        $newimage = "";

                                        if (empty($_FILES["img"]["name"])) {

                                            $newimage = $oldimage;
                                        } else {
                                            unlink("uploads/patient/$oldimage");
                                            $ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
                                            $filename = time() . random_int(1111, 9999) . "." . $ext;  //67655566.png
                                            move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/patient/" . $filename);
                                            $newimage = $filename;
                                        }

                                        $sql = mysqli_query($conn, "SELECT * FROM tbl_patients 
                                        WHERE (email='$patient_email' OR number='$patient_num')
                                        AND patient_id != '$id'")
                                            or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($sql);

                                        if (mysqli_num_rows($sql) <= 0) {
                                            $result = mysqli_query($conn, "Update tbl_patients set city_id='$cityid', patient_image='$newimage', firstname='$first_name', lastname='$last_name', age='$patient_age', gender='$patient_gender', number='$patient_num', email='$patient_email', blood_group='$patient_blood_group', address='$patient_address', pincode='$postal_code'  WHERE patient_id='$id'") or die(mysqli_error($conn));


                                            if ($result) {
                                    ?>
                                                <div class="alert bg-primary text-white alert-dismissible fade show" role="alert">
                                                    Data Updated!
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    <?php echo "<script>window.location='view_patient.php'</script>"; ?>
                                                </div>

                                            <?php
                                            } else {
                                            ?>
                                                <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
                                                    Data Not Updated!
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                    <?php
                                            }
                                        } else {
                                            if ($row['number'] == $patient_num) {
                                                echo '<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">Number Already Exists!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                                            }
                                            if ($row['email'] == $patient_email) {
                                                echo '<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">Email Already Exists!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                                            }
                                        
                                        }
                                    }

                                    ?>

                               

                                    <?php

                                    if (isset($_GET["updateid"])) {
                                        $id = $_GET["updateid"];
                                        $result = mysqli_query($conn, "select * from tbl_patients as p left join tbl_city as c on p.city_id=c.city_id where patient_id='$id'") or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);
                                    }

                                    ?>


                                    <form method="post" enctype="multipart/form-data">

                                        <!-- Row starts -->
                                        <div class="row gx-3">
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a14">City<span class="text-danger">*</span></label>
                                                    <select type="text" class="form-control" name="cid" id="cid" placeholder="Enter City">
                                                        <option>Select City</option>

                                                        <?php

                                                        $count = 1;

                                                        $result = mysqli_query($conn, "select * from tbl_city ") or die(mysqli_error($conn));

                                                        while ($row1 = mysqli_fetch_assoc($result)) {

                                                        ?>
                                                            <option <?php if ($row["city_id"] == $row1["city_id"]) { ?> selected <?php } ?> value="<?php echo $row["city_id"]; ?>"><?php echo $row1["city_name"]; ?> </option>

                                                        <?php


                                                        }

                                                        ?>


                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a1">Upload Photo<span class="text-danger">*</span></label>
                                                    <input type="file" class="form-control" name="img" id="img" placeholder="Upload Photo">
                                                    <img src="uploads/patient/<?php echo $row["patient_image"]; ?>" height="100" width="100" alt="">
                                                    <input type="hidden" name="oldimg" value="<?php echo $row["patient_image"]; ?>" id="oldimg">
                                                </div>
                                            </div>
                                            <div class="col-xxl-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="<?php echo $row["firstname"] ?>" id="fname" name="fname" placeholder="Enter First Name">
                                                </div>
                                            </div>
                                            <div class="col-xxl-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="<?php echo $row["lastname"] ?>" id="lname" name="lname" placeholder="Enter Last Name">
                                                </div>
                                            </div>
                                            <div class="col-xxl-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a3">Age <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" value="<?php echo $row["age"] ?>" id="age" name="age" placeholder="Enter Last Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="selectGender1">Gender <span
                                                            class="text-danger">*</span></label>
                                                    <div class="m-0">
                                                        <div class="form-check form-check-inline">
                                                            <input <?php if ($row["gender"] == "male") { ?> checked <?php } ?> class="form-check-input" type="radio" name="gender" id="gender"
                                                                value="male">
                                                            <label class="form-check-label" for="selectGender1">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input <?php if ($row["gender"] == "female") { ?> checked <?php } ?> class="form-check-input" type="radio" name="gender" id="gender"
                                                                value="female">
                                                            <label class="form-check-label" for="selectGender2">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a5">Email ID <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" value="<?php echo $row["email"] ?>" id="email" name="email" placeholder="Enter Email ID">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a6">Mobile Number <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="<?php echo $row["number"] ?>" id="num" name="num" placeholder="Enter Mobile Number">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a9">Blood Group <span class="text-danger">*</span></label>
                                                    <select class="form-select" id="bgroup" name="bgroup">
                                                        <option>Select</option>
                                                        <option value="A+" <?php if ($row["blood_group"] == "A+") echo "selected"; ?>>A+</option>
                                                        <option value="A-" <?php if ($row["blood_group"] == "A-") echo "selected"; ?>>A-</option>
                                                        <option value="B+" <?php if ($row["blood_group"] == "B+") echo "selected"; ?>>B+</option>
                                                        <option value="B-" <?php if ($row["blood_group"] == "B-") echo "selected"; ?>>B-</option>
                                                        <option value="O+" <?php if ($row["blood_group"] == "O+") echo "selected"; ?>>O+</option>
                                                        <option value="O-" <?php if ($row["blood_group"] == "O-") echo "selected"; ?>>O-</option>
                                                        <option value="AB+" <?php if ($row["blood_group"] == "AB+") echo "selected"; ?>>AB+</option>
                                                        <option value="AB-" <?php if ($row["blood_group"] == "AB-") echo "selected"; ?>>AB-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a12">Address<span class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="add" name="add" placeholder="Enter Your Address"><?php echo $row["address"]; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a15">Postal Code<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="<?php echo $row["pincode"] ?>" id="pcode" name="pcode" placeholder="Enter Postal Code">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="d-flex gap-2 justify-content-end">
                                                    <button type="submit" name="btnsubmit" class="btn btn-primary">
                                                        Save
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

    <!-- Dropzone JS -->
    <script src="assets/vendor/dropzone/dropzone.min.js"></script>

    <!-- Custom JS files -->
    <script src="assets/js/custom.js"></script>
    <!-- jQuery (needed for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

            $("#patfrm").validate({

                rules: {
                    cid: {
                        required: true
                    },

                    img: {
                        required: true
                    },

                    fname: {
                        required: true
                    },

                    lname: {
                        required: true
                    },

                    age: {
                        required: true
                    },

                    gender: {
                        required: true
                    },

                    email: {
                        required: true,
                        email: true
                    },

                    num: {
                        required: true,
                        maxlength: 10,
                        minlength: 10,
                    },

                    bgroup: {
                        required: true
                    },

                    add: {
                        required: true
                    },

                    pcode: {
                        required: true,
                        maxlength: 6,
                        minlength: 6,
                    },

                    uname: {
                        required: true
                    },


                },
                messages: {
                    cid: {
                        required: "Enter Your City Name",
                    },

                    img: {
                        required: "Upload Your image",
                    },

                    fname: {
                        required: "Enter Your First Name",
                    },

                    lname: {
                        required: "Enter Your Last Name",
                    },

                    age: {
                        required: "Enter Your Age",
                    },

                    gender: {
                        required: "Enter Your Gender",
                    },

                    email: {
                        required: "Enter Your Email",

                    },

                    num: {
                        required: "Enter Your Number",
                    },

                    bgroup: {
                        required: "Enter Your Blood Group",
                    },

                    add: {
                        required: "Enter Your Address",
                    },

                    pcode: {
                        required: "Enter Your Pincode",
                    },

                    uname: {
                        required: "Enter Your User Name",
                    },

                }

            });

        });
        </script>
    <script>
        $(document).ready(function() {
            $('#cid').select2({
                placeholder: "Select city",
                allowClear: true,
                width: 'resolve' // adjust width nicely
            });
        });
    </script>
    
</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/add-patient.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:06 GMT -->

</html>