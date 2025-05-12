<?php include 'sesstion.php'; ?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/add-doctors.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:37:54 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Staff</title>

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

  <!-- Quill Editor -->
  <link rel="stylesheet" href="assets/vendor/quill/quill.core.css">
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
              Add Staff
            </li>
          </ol>
          <!-- Breadcrumb ends -->

          <!-- Sales stats starts -->
          <div class="ms-auto d-lg-flex d-none flex-row">
            <div class="d-flex flex-row gap-1 day-sorting">
              <button class="btn btn-sm btn-primary"><a href="viewstaff.php" style="color: inherit;">View Staff</a></button>
              <button class="btn btn-sm btn-primary"><a href="doctor_dashboard.php" style="color: inherit;">Back</a></button>

            </div>
          </div>
          <!-- Sales stats ends -->

        </div>
        <!-- App Hero header ends -->

        <!-- App body starts -->
        <div class="app-body">

          <!-- Row starts -->
          <div class="row gx-3">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Add Staff</h5>
                </div>
                <div class="card-body">

                  <!-- Custom tabs starts -->


                    <!-- Tab content starts -->
                    <div class="tab-content h-350">
                      <div class="tab-pane fade show active" id="oneA" role="tabpanel">
                        <?php

                        if (isset($_POST["btnsubmit"])) {
                          // $dp = "img.jpg";
                          $Fname = $_POST["firstname"];
                          $Lname = $_POST["lastname"];
                          $age = $_POST["staff_age"];
                          $staffgender = $_POST["staff_gender"];
                          $staffnum = $_POST["staff_num"];
                          $staffemail = $_POST["staff_email"];
                          $uname = $_POST["user_name"];
                          $pwd = $_POST["pass"];
                          $staffisBlock = $_POST["isBlock"];
                          $add = $_POST["address"];
                          $pincode = $_POST["pcode"];
                          $StaffType = $_POST["staff_type"];


                          $ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
                          $filename = time() . random_int(1111, 9999) . "." . $ext;  //67655566.png
                          move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/staff/" . $filename);

                          $sql = mysqli_query($conn, "SELECT * FROM tbl_staff 
                          WHERE email='$staffemail' OR mobile_number='$staffnum' OR username='$uname'") or die(mysqli_error($conn));
                          $row = mysqli_fetch_assoc($sql);

                          if (mysqli_num_rows($sql) <= 0) {

                            $result = mysqli_query($conn, "insert into tbl_staff (image,first_name,last_name,age,username,password,isblock,staff_add,gender,type,mobile_number,email,staff_pincode) 
                            values ('$filename','$Fname','$Lname','$age','$uname','$pwd','$staffisBlock','$add','$staffgender','$StaffType','$staffnum','$staffemail','$pincode')") or die(mysqli_error($conn));


                            if ($result) {
                        ?>
                              <div class="alert bg-primary text-white alert-dismissible fade show" role="alert">
                                Data Inserted!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?php echo "<script>window.location='viewstaff.php'</script>"; ?>
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

                            if ($row['email'] == $staffemail) {
                              echo '<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">Email Already Exists!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                            }
                            if ($row['mobile_number'] == $staffnum) {
                              echo '<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">Mobile Number Already Exists!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                            }
                            if ($row['username'] == $uname) {
                              echo '<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">Username Already Exists!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                            }
                          }
                        }

                        ?>

                        <form method="post" enctype="multipart/form-data" id="staffform">
                          <!-- Row starts -->
                          <div class="row gx-12">


                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a1">Upload Photo<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="img" id="img" placeholder="Enter First Name">
                              </div>
                            </div>


                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name">
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter First Name">
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a2">Age<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="staff_age" id="staff_age" placeholder="Enter Age">
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="selectGender1">Gender<span
                                    class="text-danger">*</span></label>
                                <div class="m-0">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="staff_gender"
                                      id="staff_gender" value="male">
                                    <label class="form-check-label">Male</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="staff_gender"
                                      id="staff_gender" value="female">
                                    <label class="form-check-label">Female</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a6">Mobile Number <span
                                    class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="staff_num" id="staff_num" placeholder="Enter Mobile Number">
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a5">Email ID <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="staff_email" id="staff_email" placeholder="Enter Email ID">
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a11">Address</label>
                                <textarea name="address" id="address" placeholder="Enter Your Address" class="form-control"></textarea>
                              </div>
                            </div>


                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a15">Postal Code</label>
                                <input type="text" class="form-control" name="pcode" id="pcode" placeholder="Enter Postal Code">
                              </div>
                            </div>

                            <div class="row gx-3">
                              <div class="col-sm-12">
                                <div class="mb-3">
                                  <label class="form-label" for="u1">User Name</label>
                                  <input type="text" name="user_name" id="user_name" placeholder="Enter username" class="form-control">
                                </div>
                              </div>

                              <div class="col-sm-12">
                                <div class="mb-3">
                                  <label class="form-label" for="u2">Password</label>
                                  <div class="input-group">
                                  <input type="password" name="pass" id="pass" class="form-control"
                                    placeholder="Password must be 8-20 characters long.">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                <i class="ri-eye-line text-primary" id="eyeIcon"></i>
                            </button></div>
                              </div>

                              <div class="col-sm-12">
                                <div class="mb-3">
                                  <label class="form-label" for="d1">Staff Type</label>
                                  <select class="form-select" name="staff_type" id="staff_type">
                                    <option value="Receptionist">Receptionist</option>
                                    <option value="Pharmacist">Pharmacist</option>

                                  </select>
                                </div>
                              </div>

                              <div class="col-sm-12">
                                <div class="mb-3">
                                  <label class="form-label">Is Block?<span
                                      class="text-danger">*</span></label>
                                  <div class="m-0">
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="isBlock"
                                        id="isBlock" value="yes">
                                      <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="isBlock"
                                        id="isBlock" value="no">
                                      <label class="form-check-label">No</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="d-flex gap-2 justify-content-end mt-4">

                            <button type="submit" name="btnsubmit" class="btn btn-primary">
                              Submit
                            </button>
                          </div>
                          <!-- Row ends -->
                        </form>
                      </div>

                    </div>
                    <!-- Tab content ends -->

                
                  <!-- Custom tabs ends -->

                  <!-- Card acrions starts -->

                  <!-- Card acrions ends -->

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

  <!-- Quill Editor JS -->
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/quill/custom.js"></script>

  <!-- Custom JS files -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/jquery.validate.min.js"></script>
  <script src="assets/js/additional-methods.min.js"></script>


  <script>
    $(document).ready(function() {

      $("#staffform").validate({

        rules: {
          img: {
            required: true
          },

          firstname: {
            required: true
          },

          lastname: {
            required: true
          },

          staff_age: {
            required: true
          },

          staff_gender: {
            required: true
          },

          staff_num: {
            required: true,
            maxlength: 10,
            minlength: 10,
          },

          staff_email: {
            required: true,
            email: true
          },

          user_name: {
            required: true
          },

          pass: {
            required: true,
            minlength: 8,
            maxlength: 14,
            pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,14}$/
          },

          isBlock: {
            required: true
          },

          address: {
            required: true
          },

          pcode: {
            required: true,
            maxlength: 6,
            minlength: 6,
          },

          staff_type: {
            required: true,
          },

        },

        messages: {
          pass: {
            required: "Please enter a password",
            minlength: "Password must be at least 8 characters",
            maxlength: "Password must not exceed 14 characters",
            pattern: "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character."
          }
        }

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


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/add-doctors.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:00 GMT -->

</html>