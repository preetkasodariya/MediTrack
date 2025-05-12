<?php include 'sesstion.php'; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:39:07 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View state</title>

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
              View state
            </li>
          </ol>
          <!-- Breadcrumb ends -->

          <!-- Sales stats starts -->
          <div class="ms-auto d-lg-flex d-none flex-row">
            <div class="d-flex flex-row gap-1 day-sorting">
              <a href="addstate.php" class="btn btn-sm btn-primary">Add state</a>

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
                  <h5 class="card-title">View state</h5>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete State Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete data ?
                      </div>
                      <div class="modal-footer">
                        <form method="post">
                          <input type="hidden" name="deleteid" id="deleteid">
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
             

                  $result = mysqli_query($conn, "delete from tbl_states where state_id='$did'") or die(mysqli_error($conn));
                } ?>

                <div class="card-body">
                  <div class="table-outer">
                    <div class="table-responsive">
                      <table class="table truncate align-middle">
                        <thead>
                          <tr>
                            <th width="30px">#</th>

                            <th width="100px">state Name</th>
                            <th width="100px">Actions</th>
                          </tr>
                        </thead>
                        <tbody>


                          <?php

                          $count = 1;

                          $result = mysqli_query($conn, "select * from tbl_states") or die(mysqli_error($conn));

                          while ($row = mysqli_fetch_assoc($result)) {

                          ?>
                            <tr>
                              <td>
                                <?php echo $count++; ?>
                              </td>

                              <td><?php echo $row["state_name"]; ?></td>

                              <td>
                                <a href="editstate.php?updateid=<?php echo $row["state_id"]; ?>" class="btn btn-primary">Edit</a>
                                <button data-id="<?php echo $row["state_id"]; ?>" id="btndelete" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Delete</button>
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
        $("#deleteid").val(id);


      });

    });
  </script>
</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:39:12 GMT -->

</html>