<?php include 'sesstion.php'; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/appointments-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:10 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Appointments</title>


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

  <!-- Data Tables -->
  <link rel="stylesheet" href="assets/vendor/datatables/dataTables.bs5.css">
  <link rel="stylesheet" href="assets/vendor/datatables/dataTables.bs5-custom.css">
  <link rel="stylesheet" href="assets/vendor/datatables/buttons/dataTables.bs5-custom.css">

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
      <?php include 'sidebar.php' ?>
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
              Appointments List
            </li>
          </ol>
          <!-- Breadcrumb ends -->

          <!-- Sales stats starts -->
          <div class="ms-auto d-lg-flex d-none flex-row">
            <div class="d-flex flex-row gap-1 day-sorting">
              <a href="receptionist_dashboard.php" class="btn btn-sm btn-primary">Back</a>

            </div>
          </div>
          <!-- Sales stats ends -->

        </div>
        <!-- App Hero header ends -->

        <!-- App body starts -->
        <div class="app-body">

          <!-- Row starts -->
          <div class="row gx-3">

            <!-- Left side: Filters + Table -->
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="card-title">Appointments List</h5>
                  <a href="add_appointment.php" class="btn btn-primary ms-auto">Book Appointment</a>
                </div>
                <div class="card-body">

                  <!-- Filters Row -->
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <input type="date" id="dateFilter" class="form-control" placeholder="Filter by Date">
                    </div>
                    <!-- <div class="col-md-6">
                      <input type="text" id="searchBox" class="form-control" placeholder="Search...">
                    </div> -->
                  </div>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Appointment</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to Delete Appointment ?
                        </div>
                        <div class="modal-footer">
                          <form method="post">
                            <input type="text" name="deleteid" id="deleteid">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" name="deletebtn" class="btn btn-primary">Yes</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php

                  if (isset($_POST["deletebtn"])) {
                    $Aid = $_POST["deleteid"];

                    $result = mysqli_query($conn, "delete from tbl_appointment where appointment_id='$Aid'") or die(mysqli_error($conn));
                  }

                  ?>

                  <div class="table-responsive">
                    <table id="appointmentsGrid" class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Patient Name</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Problem</th>
                          <th>Weight</th>
                          <th>Type</th>
                          <th>Amount</th>
                          <th>Payment type</th>
                          <th>Doctor Name</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $count = 1;
                        $result = mysqli_query($conn, "SELECT * 
                        FROM tbl_appointment AS ap
                        LEFT JOIN tbl_doctors AS d ON ap.doctor_id = d.doctor_id
                        LEFT JOIN tbl_patients AS p ON ap.patient_id = p.patient_id
                        ORDER BY 
                          CASE 
                            WHEN ap.status = 'pending' THEN 0 
                            WHEN ap.status = 'complete' THEN 1 
                            ELSE 2 
                          END,
                          ap.Add_date ASC;") or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $row["firstname"] . " " . $row["lastname"]; ?></td>
                            <td class="appointment-date"><?php echo $row["Add_date"]; ?></td>
                            <td><?php echo $row["Add_time"]; ?></td>
                            <td><?php echo $row["problem"]; ?></td>
                            <td><?php echo $row["weight"]; ?></td>
                            <td><?php echo $row["patient_type"]; ?></td>
                            <td><?php echo $row["ammount"]; ?></td>
                            <td><?php echo $row["payment_type"]; ?></td>
                            <td><?php echo $row["first_name"] . " " . $row["last_name"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <!-- <button  class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Appointment">
                                 <a href="edit_appointment.php?updateid="<?php echo $row["appointment_id"]; ?>> <i class="ri-edit-box-line"></i></a>
                                </button> -->

                                <a href="edit_appointment.php?updateid=<?php echo $row["appointment_id"]; ?>" class="btn btn-outline-success btn-sm"> <i class="ri-edit-box-line"></i></a>
                                <button data-id="<?php echo $row["appointment_id"]; ?>" id="btndelete" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                  <i class="ri-close-circle-line"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>



          </div>
          <!-- Row ends -->


        </div>
        <!-- App body ends -->

        <!-- App footer starts -->
        <?php include 'footer.php' ?>
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

  <!-- Data Tables -->
  <script src="assets/vendor/datatables/dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap.min.js"></script>
  <script src="assets/vendor/datatables/custom/custom-datatables.js"></script>

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
  <script>
    $(document).ready(function() {
      // When the date filter changes
      $("#dateFilter").on("change", function() {
        var selectedDate = $(this).val();

        // If no date is selected, show all rows
        if (selectedDate === "") {
          $("#appointmentsGrid tbody tr").show(); // Show all appointments
        } else {
          $("#appointmentsGrid tbody tr").filter(function() {
            $(this).toggle($(this).find(".appointment-date").text().trim() === selectedDate);
          });
        }
      });

      // // Search functionality
      // $("#searchBox").on("keyup", function() {
      //   var value = $(this).val().toLowerCase();
      //   $("#appointmentsGrid tbody tr").filter(function() {
      //     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      //   });
      // });

    });
  </script>


</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/appointments-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:38:10 GMT -->

</html>