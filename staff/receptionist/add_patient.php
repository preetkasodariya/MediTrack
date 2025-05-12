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
                            Add Patient
                        </li>
                    </ol>
                    <!-- Breadcrumb ends -->

                    <!-- Sales stats starts -->
                    <div class="ms-auto d-lg-flex d-none flex-row">
                        <div class="d-flex flex-row gap-1 day-sorting">
                            <button class="btn btn-sm btn-primary"><a href="view_patient.php" style="color: inherit;">View Patient</a></button>
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
                                    <h5 class="card-title">Add Patient Details</h5>
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
                                        $user_name = $_POST["uname"];
                                        $password = $_POST["pass"];
                                        $cityid = $_POST["cid"];

                                        // echo $patient_num;

                                        $ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
                                        $filename = time() . random_int(1111, 9999) . "." . $ext;  //67655566.png
                                        move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/patient/" . $filename);

                                        $sql = mysqli_query($conn, "SELECT * FROM tbl_patients 
                                        WHERE (email='$patient_email' OR `number`='$patient_num' OR username='$user_name')")
                                            or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($sql);

                                        if (mysqli_num_rows($sql) <= 0) {
                                            $result = mysqli_query($conn, "insert into tbl_patients (city_id, patient_image, firstname, lastname, age, gender, number, email, blood_group, address, pincode, username, password)  
                                            values('$cityid','$filename','$first_name','$last_name','$patient_age','$patient_gender','$patient_num','$patient_email','$patient_blood_group','$patient_address','$postal_code','$user_name','$password')") or die(mysqli_error($conn));


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
                                            if ($row['username'] == $user_name) {
                                                echo '<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">Username Already Exists!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                                            }
                                        }
                                    }

                                    ?>






                                    <!--                                       
                                        $sql = mysqli_query($conn, "SELECT * FROM tbl_patients WHERE `number`='$patient_num' OR email='$patient_email' OR username='$user_name'") or die(mysqli_error($conn));
                                        // $row = mysqli_fetch_assoc($sql);

                                        if (mysqli_num_rows($sql) <= 0) {
                                            $result = mysqli_query($conn, "INSERT INTO tbl_patients (city_id, patient_image, firstname, lastname, age, gender, `number`, email, blood_group, address, pincode, username, password)
                                            VALUES ('$cityid','$filename','$first_name','$last_name','$patient_age','$patient_gender','$patient_num','$patient_email','$patient_blood_group','$patient_address','$postal_code','$user_name','$password')") or die(mysqli_error($conn));


                                        } -->



                                    <form method="post" enctype="multipart/form-data" id="patfrm">

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

                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                        ?>
                                                            <option value="<?php echo $row["city_id"]; ?>"><?php echo $row["city_name"]; ?> </option>

                                                        <?php


                                                        }

                                                        ?>


                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a1">Upload Photo<span class="text-danger">*</span></label>
                                                    <input type="file" class="form-control" name="img" id="img" placeholder="Enter Photo">
                                                </div>
                                            </div>
                                            <div class="col-xxl-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
                                                </div>
                                            </div>
                                            <div class="col-xxl-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
                                                </div>
                                            </div>
                                            <div class="col-xxl-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a3">Age <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="age" name="age" placeholder="Enter Last Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="selectGender1">Gender <span
                                                            class="text-danger">*</span></label>
                                                    <div class="m-0">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender" id="gender"
                                                                value="male">
                                                            <label class="form-check-label" for="selectGender1">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender" id="gender"
                                                                value="female">
                                                            <label class="form-check-label" for="selectGender2">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a5">Email ID <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email ID">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a6">Mobile Number <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="num" name="num" placeholder="Enter Mobile Number">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a9">Blood Group <span class="text-danger">*</span></label>
                                                    <select class="form-select" id="bgroup" name="bgroup">
                                                        <option>Select</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a12">Address<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="add" name="add" placeholder="Enter Address">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a15">Postal Code<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="pcode" name="pcode" placeholder="Enter Postal Code">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="u1">User Name<span class="text-danger">*</span></label>
                                                    <input type="text" name="uname" id="uname" placeholder="Enter username" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="u2">Password<span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="password" name="pass" id="pass" class="form-control"
                                                            placeholder="Password must be 8-20 characters long.">
                                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                                            <i class="ri-eye-line text-primary" id="eyeIcon"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="d-flex gap-2 justify-content-end">
                                                    <a href="patients-list.html" type="button" class="btn btn-outline-secondary">
                                                        Cancel
                                                    </a>
                                                    <button type="submit" name="btnsubmit" class="btn btn-primary">
                                                        Create Patient Profile
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
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script>

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

                    pass: {
                        required: true,
                        minlength: 8,
                        maxlength: 14,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,14}$/
                    }

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

                    pass: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 8 characters",
                        maxlength: "Password must not exceed 14 characters",
                        pattern: "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character."
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
    <script>
        function togglePassword() {
            const pwdInput = document.getElementById('pass');
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


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/add-patient.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:06 GMT -->

</html>