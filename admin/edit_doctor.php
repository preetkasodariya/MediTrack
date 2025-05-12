<?php include 'sesstion.php'; ?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/add-doctors.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:37:54 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Dcotor</title>

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
      /* font-size: 14px;
    margin-top: 4px; */

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
              Update Doctor
            </li>
          </ol>
          <!-- Breadcrumb ends -->

          <!-- Sales stats starts -->
          <div class="ms-auto d-lg-flex d-none flex-row">
            <div class="d-flex flex-row gap-1 day-sorting">
              <button class="btn btn-sm btn-primary"><a href="view_doctor.php" style="color: inherit;">Back</a></button>

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
                <div class="card-body">

                  <!-- Custom tabs starts -->
                  <div class="custom-tabs-container">

                    <!-- Tab content starts -->
                    <div class="tab-content h-350">
                      <div class="tab-pane fade show active" id="oneA" role="tabpanel">
                        <?php
                        if (isset($_POST["btnsubmit"])) {
                          $fname = $_POST["firstname"];
                          $lname = $_POST["lastname"];
                          $age = $_POST["doc_age"];
                          $docgender = $_POST["doc_gender"];
                          $hname = $_POST["hos_name"];
                          $hnum = $_POST["hos_num"];
                          $docnum = $_POST["doc_num"];
                          $docemail = $_POST["doc_email"];
                      
                          $docisactive = $_POST["is_active"];
                          $aboutdoc = $_POST["abdoc"];
                          $add = $_POST["address"];
                          $pincode = $_POST["pcode"];
                          $cityid = $_POST["cid"];
                          $id = $_GET["updateid"];

                          $oldimage = $_POST["oldimg"];
                          $newimage = "";



                          $sql = mysqli_query($conn, "SELECT * from tbl_doctors where  (doc_number='$docnum' OR doc_email='$docemail')
                           AND  doctor_id != '$id'")
                            or die(mysqli_error($conn));




                          if (empty($_FILES["img"]["name"])) {
                            $newimage = $oldimage;
                          } else {
                            unlink("uploads/doctor/$oldimage");
                            $ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
                            $filename = time() . random_int(1111, 9999) . "." . $ext;  //67655566.png
                            move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/doctor/" . $filename);
                            $newimage = $filename;
                          }




                          $row = mysqli_fetch_assoc($sql);
                          if (mysqli_num_rows($sql) <= 0) {

                            $result = mysqli_query($conn, "update  tbl_doctors set doc_image='$newimage',hospital_name='$hname',hospital_number='$hnum',doc_number='$docnum',doc_email='$docemail', isactive='$docisactive',about_doctors='$aboutdoc',address='$add',pincode='$pincode',city_id='$cityid',first_name='$fname',last_name='$lname',age='$age',gender='$docgender' where doctor_id='$id'") or die(mysqli_error($conn));;

                            if ($result) {
                        ?>
                              <div class="alert bg-primary text-white alert-dismissible fade show" role="alert">
                                Data Updated!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                              <?php echo "<script>window.location='view_doctor.php'</script>"; ?>

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

                            if ($row['doc_email'] == $docemail) {
                              echo '<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">Email Already Exists!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                            }
                            if ($row['doc_number'] == $docnum) {
                              echo '<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">Mobile Number Already Exists!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                            }
                       
                          }
                        }

                        ?>


                        <?php

                        if (isset($_GET['updateid'])) {
                          $id = $_GET['updateid'];
                          $result = mysqli_query($conn, "select * from tbl_doctors where doctor_id='$id'") or die(mysqli_error($conn));
                          $row = mysqli_fetch_assoc($result);

                          // $result = mysqli_query($conn, "update  tbl_doctors " );
                        }
                        ?>


                        <form method="post" enctype="multipart/form-data" id="docform">
                          <!-- Row starts -->
                          <div class="row gx-12">

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a1">Upload Photo<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="img" id="img" placeholder="Enter First Name">
                                <img src="uploads/doctor/<?php echo $row["doc_image"]; ?>" height="100" width="100" alt="">
                                <input type="hidden" name="oldimg" value="<?php echo $row["doc_image"]; ?>" id="oldimg">

                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a1">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="<?php echo $row['first_name'] ?>" name="firstname" id="firstname" placeholder="Enter First Name">
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a2">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="<?php echo $row['last_name'] ?>" name="lastname" id="lastname" placeholder="Enter Last Name">
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a2">Age<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" value="<?php echo $row['age'] ?>" name="doc_age" id="doc_age" placeholder="Enter Age">
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="selectGender1">Gender<span
                                    class="text-danger">*</span></label>
                                <div class="m-0">
                                  <div class="form-check form-check-inline">
                                    <input <?php if ($row["gender"] == "male") { ?> checked <?php } ?> class="form-check-input" type="radio" name="doc_gender"
                                      id="doc_gender" value="male">
                                    <label class="form-check-label">Male</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="doc_gender"
                                      id="doc_gender" <?php if ($row["gender"] == "female") { ?> checked <?php } ?> value="female">
                                    <label class="form-check-label">Female</label>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a6">Mobile Number <span
                                    class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $row['doc_number'] ?>" class="form-control" name="doc_num" id="doc_num" placeholder="Enter Mobile Number">
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a6">Alternative Mobile Number<span
                                    class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $row['hospital_number'] ?>" class="form-control" name="hos_num" id="hos_num" placeholder="Enter Hospital Mobile Number">
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a5">Email ID <span class="text-danger">*</span></label>

                                <input type="email" value="<?php echo $row['doc_email'] ?>" class="form-control" name="doc_email" id="doc_email" placeholder="Enter Email ID">

                              </div>
                            </div>


                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a2">Doctor Qualification<span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $row['hospital_name'] ?>" class="form-control" name="hos_name" id="hos_name" placeholder="Enter Hospital Name">
                              </div>
                            </div>




                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a8">About Doctor</label>
                                <textarea name="abdoc" value="<?php echo $row['about_doctors'] ?>" id="abdoc" placeholder="About Doctor" class="form-control"><?php echo $row['about_doctors'] ?></textarea>
                              </div>
                            </div>


                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label">Is Active?<span
                                    class="text-danger">*</span></label>
                                <div class="m-0">
                                  <div class="form-check form-check-inline">
                                    <input <?php if ($row["isactive"] == "yes") { ?> checked <?php } ?> class="form-check-input" type="radio" name="is_active"
                                      id="is_active" value="yes">
                                    <label class="form-check-label">Yes</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input <?php if ($row["isactive"] == "no") { ?> checked <?php } ?> class="form-check-input" type="radio" name="is_active"
                                      id="is_active" value="no">
                                    <label class="form-check-label">No</label>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a11">Address</label>
                                <textarea name="address" value="<?php echo $row['address'] ?>" id="address" placeholder="About Doctor" class="form-control"><?php echo $row['address'] ?></textarea>
                              </div>
                            </div>


                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a14">City</label>
                                <select class="form-control" name="cid" id="cid" style="width:100%;">
                                  <option value="">Select city</option>
                                  <?php
                                  $result = mysqli_query($conn, "select * from tbl_city") or die(mysqli_error($conn));
                                  while ($row1 = mysqli_fetch_assoc($result)) {
                                  ?>
                                      <option <?php if($row["city_id"]==$row1["city_id"]) { ?> selected <?php } ?>  value="<?php echo $row1["city_id"]; ?>"><?php echo $row1["city_name"]; ?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>


                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="a15">Postal Code</label>
                                <input type="text" value="<?php echo $row['pincode'] ?>" class="form-control" name="pcode" id="pcode" placeholder="Enter Postal Code">
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="mb-3">
                                <label class="form-label" for="u1">User Name</label>
                                <input type="text" name="user_name" id="user_name" placeholder="Enter username" class="form-control" value="<?php echo $row['username'] ?>">
                              </div>
                            </div>


                            </div>
                            <div class="d-flex gap-2 justify-content-end mt-4">
                              <button type="submit" name="btnsubmit" class="btn btn-primary">
                                Save
                              </button>
                            </div>
                          </div>

                          <!-- Row ends -->
                        </form>
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

          $("#docform").validate({

            rules: {
              /* img: {
                 required: true
               },*/

              firstname: {
                required: true
              },

              lastname: {
                required: true
              },

              doc_age: {
                required: true
              },

              doc_gender: {
                required: true
              },

              doc_num: {
                required: true,
                maxlength: 10,
                minlength: 10,
              },

              doc_email: {
                required: true,
                email: true
              },

              hos_name: {
                required: true
              },

              hos_num: {
                required: true,
                maxlength: 10,
                minlength: 10,
              },

              abdoc: {
                required: true
              },

              address: {
                required: true
              },

              cid: {
                required: true
              },

              pcode: {
                required: true
              },

              user_name: {
                required: true
              },

              pass: {
                required: true,
              },

              is_active: {
                required: true,
              },


            },

          });

        });
      </script>

</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/add-doctors.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:00 GMT -->

</html>