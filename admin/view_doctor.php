<?php include 'sesstion.php'; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:39:07 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Doctor</title>

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
              All doctors
            </li>
          </ol>
          <!-- Breadcrumb ends -->

          <!-- Sales stats starts -->
          <div class="ms-auto d-lg-flex d-none flex-row">
            <div class="d-flex flex-row gap-1 day-sorting">
              <a href="add_doctor.php" class="btn btn-sm btn-primary">Add Doctor</a>

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
                  <h5 class="card-title">Doctor List</h5>
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
                
                if(isset($_POST["deletebtn"]))
                {
                  $did = $_POST["deleteid"];
                  $dimg = $_POST["deleteimg"];

                  unlink("uploads/doctor/$dimg");

                  $result = mysqli_query($conn,"delete from tbl_doctors where doctor_id='$did'") or die(mysqli_error($conn));

                }
                
                ?>
                
                <div class="card-body">
                <div class="table-outer" style="max-height: 450px; overflow-y: auto;">
                    <div class="table-responsive">
                      <table class="table truncate align-middle">
                        <thead>
                          <tr>
                            <th width="30px">#</th>
                            <th width="100px" style="border-radius: 50%;">Doctor image</th>
                            <th width="100px">City</th>
                            <th width="100px">First name</th>
                            <th width="100px">Last name</th>
                            <!-- <th width="100px">Age</th> -->
                            <!-- <th width="100px">Gender</th> -->
                            <th width="100px">Doctor number</th>
                            <!-- <th width="100px">doctor email</th> -->
                            <th width="100px">Qualification</th>
                            <!-- <th width="100px">Hospital number</th> -->
                            <th width="100px">is active?</th>
                            <!-- <th width="100px">About doctor</th> -->
                            <!-- <th width="100px">Address</th> -->
                            <!-- <th width="100px">Pincode</th> -->
                            <!-- <th width="100px">username</th> -->
                            <!-- <th width="100px">Password</th> -->
                            <!-- <th width="100px">Registration date&time</th> -->
                             <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>


                        <?php 
                        
                        if(isset($_POST["btnisactive"]))
                        {
                          $id = $_POST["txtdataid"];
                          $data = $_POST["txtdata"];


                          $result = mysqli_query($conn,"update tbl_doctors set isactive='$data' where doctor_id='$id'") or die(mysqli_error($conn));

                        }
                        
                        ?>


                          <?php

                          $count = 1;

                          $result = mysqli_query($conn, "select * from tbl_doctors as d left join tbl_city as c on d.city_id=c.city_id") or die(mysqli_error($conn));

                          while ($row = mysqli_fetch_assoc($result)) {

                          ?>
                            <tr>
                              <td>
                                <?php echo $count++; ?>
                              </td>

                              <td><img src="uploads/doctor/<?php echo $row["doc_image"]; ?>" height="100" width="100" alt=""></td>
                              <td><?php echo $row["city_name"]; ?></td>
                              <td><?php echo $row["first_name"]; ?></td>
                              <td><?php echo $row["last_name"]; ?></td>
                              <!-- <td><?php echo $row["age"]; ?></td> -->
                              <!-- <td><?php echo $row["gender"]; ?></td> -->
                              <td><?php echo $row["doc_number"]; ?></td>
                              <!-- <td><?php echo $row["doc_email"]; ?></td> -->
                              <td><?php echo $row["hospital_name"]; ?></td>
                              <!-- <td><?php echo $row["hospital_number"]; ?></td> -->
                              <!-- <td><?php echo $row["isactive"]; ?></td> -->
                               <td>
                                <?php
                                  if($row["isactive"]=="yes")
                                  {
                                    ?>
                                    <form method="post">
                                      <button type="submit" class="btn btn-primary" name="btnisactive">Yes</button>
                                      <input type="hidden" name="txtdataid" value="<?php echo $row["doctor_id"]; ?>" id="txtdataid">
                                      <input type="hidden" name="txtdata" value="no" id="txtdata">
                                    </form>
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                    <form method="post">
                                      <button type="submit" class="btn btn-danger" name="btnisactive">No</button>
                                      <input type="hidden" name="txtdataid" value="<?php echo $row["doctor_id"]; ?>" id="txtdataid">
                                      <input type="hidden" name="txtdata" value="yes" id="txtdata">
                                    </form>
                                    <?php
                                  }
                                ?>
                               </td>
                              <!-- <td><?php echo $row["about_doctors"]; ?></td> -->
                              <!-- <td><?php echo $row["address"]; ?></td> -->
                              <!-- <td><?php echo $row["pincode"]; ?></td> -->
                              <!-- <td><?php echo $row["username"]; ?></td> -->
                              <!-- <td><?php echo $row["password"]; ?></td> -->
                              <!-- <td><?php echo $row["reg_datetime"]; ?></td> -->

                              <td>
                                <a href="detailsdoctor.php?dataid=<?php echo $row["doctor_id"]; ?>" class="btn btn-primary">View</a>
                                <a  href="edit_doctor.php?updateid=<?php echo $row["doctor_id"]; ?>" class="btn btn-primary">Edit</a>
                                <button data-id="<?php echo $row["doctor_id"]; ?>" data-img="<?php echo $row["doc_image"]; ?>" id="btndelete" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Delete</button>
                                </td>
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
    $(document).ready(function(){


      $(document).on("click","#btndelete",function(){
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