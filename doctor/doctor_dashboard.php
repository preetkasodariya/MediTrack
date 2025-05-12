<?php include 'sesstion.php'; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:37:32 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Doctor Dashboard</title>

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
    .box-4 {
      display: flex;
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
              <a href="doctor_dashboard.php">Doctor Dashboard</a>
            </li>
          </ol>
          <!-- Breadcrumb ends -->


        </div>
        <!-- App Hero header ends -->

        <!-- App body starts -->
        <div class="app-body">

          <!-- Row starts -->
          <div class="row">
            <div class="col-12 mt-4">

              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-sm-12">
                  <div class="card mb-3 bg-1 bg-3">
                    <div class="card-body mh-230" style="height: 200px;">

                      <!-- Row starts -->
                      <div class="py-4 px-3 text-white">
                        <h6>Good Morning,</h6>
                        <h2>Dr. <?php echo $_SESSION["DocName"] ?></h2>
                        <h6><?php echo $_SESSION["DocEmail"] ?></h6>
                        <h6><?php echo $_SESSION["DocNum"] ?></h6>
                        <h6><?php echo $_SESSION["DocAbout"] ?></h6>


                      </div>
                      <!-- Row ends -->

                    </div>
                  </div>
                </div>
                <div class="col-xxl-2 col-sm-4">
                  <div class="card mb-3">
                    <div class="card-body mh-230">

                      <!-- Card details start -->
                      <div>
                        <div class="d-flex flex-column align-items-center">
                          <div class="icon-box xl bg-primary-subtle rounded-5 mb-2 no-shadow">
                            <i class="ri-empathize-line fs-1 text-primary"></i>
                          </div>
                          <?php

                          $result3 = mysqli_query($conn, "select * from tbl_patients");
                          $row3 = mysqli_num_rows($result3);
                          ?>

                          <h1 class="text-primary"><?php echo $row3; ?></h1>
                          <h6>Patients</h6>
                        </div>
                      </div>
                      <!-- Card details end -->

                    </div>
                  </div>
                </div>
                <div class="col-xxl-2 col-sm-4">
                  <div class="card mb-3">
                    <div class="card-body mh-230">

                      <!-- Card details start -->
                      <div>
                        <div class="d-flex flex-column align-items-center">
                          <div class="icon-box xl bg-danger-subtle rounded-5 mb-2 no-shadow">
                            <i class="fa-solid fa-calendar-check text-danger" style="font-size: 35px;"></i>
                          </div>
                          <?php
                          $id = $_SESSION["DocId"];
                          $result2 = mysqli_query($conn, "select * from tbl_appointment where doctor_id='$id' ");
                          $row2 = mysqli_num_rows($result2);
                          ?>
                          <h1 class="text-danger"><?php echo $row2; ?></h1>
                          <h6>Appointments</h6>
                        </div>
                      </div>
                      <!-- Card details end -->

                    </div>
                  </div>
                </div>
                <div class="col-xxl-2 col-sm-4">
                  <div class="card mb-3">
                    <div class="card-body mh-230">

                      <!-- Card details start -->
                      <div>
                        <div class="d-flex flex-column align-items-center">
                          <div class="icon-box xl bg-success-subtle rounded-5 mb-2 no-shadow">
                          <i class="fa-solid fa-user text-success" style="font-size: 35px;"></i>
                          </div>
                          <?php
                          $result1 = mysqli_query($conn, "select * from tbl_staff");
                          $row1 = mysqli_num_rows($result1);
                          ?>
                          <h1 class="text-success"><?php echo $row1; ?></h1>
                          <h6>Staff</h6>
                          <span class="badge bg-success"></span>
                        </div>
                      </div>
                      <!-- Card details end -->

                    </div>
                  </div>
                </div>
              </div>
              <!-- Row ends -->

            </div>
          </div>
          <!-- Row ends -->


          <!-- Row starts -->
          <div class="row">
            <div class="col-6">
              <div class="card card-h-100">
                <div class="card-body">
                  <h2>Patients</h2>
                  <div class="chart-container">
                    <canvas id="chart2" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6">
              <div class="card card-h-100">
                <div class="card-body">
                  <h2>Appointments</h2>
                  <div class="chart-container">
                    <canvas id="chart3" style="height: 300px;"></canvas>
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

  <!-- Apex Charts -->
  <script src="assets/vendor/apex/apexcharts.min.js"></script>
  <script src="assets/vendor/apex/custom/doc-dashboard/patients.js"></script>
  <script src="assets/vendor/apex/custom/doc-dashboard/appointments.js"></script>
  <script src="assets/vendor/apex/custom/doc-dashboard/gender.js"></script>
  <script src="assets/vendor/apex/custom/doc-dashboard/surgeries.js"></script>
  <script src="assets/vendor/apex/custom/doc-dashboard/income.js"></script>

  <script src="assets/js/chart.js"></script>
  <script src="assets/js/chart.min.js"></script>

  <!-- Raty JS -->
  <script src="assets/vendor/rating/raty.js"></script>
  <script src="assets/vendor/rating/raty-custom.js"></script>



  <!-- Custom JS files -->
  <script src="assets/js/custom.js"></script>

  <script>
    var data = {
      labels: [
        <?php
        $start_date = new DateTime('2025-01-01');
        $current_date = new DateTime();
        $interval = new DateInterval('P1M');
        $date_period = new DatePeriod($start_date, $interval, $current_date);
        foreach ($date_period as $month) {
          echo '"' . $month->format('M Y') . '"' . ",";
        }
        ?>
      ],
      datasets: [{
        label: "Patients",
        // backgroundColor: "rgba(13, 38, 140, 0.2)", // Fill area
        borderColor: "rgba(5,66,50)", // Line color
        borderWidth: 2,
        fill: false, // Enable area fill
        tension: 0.3, // Smooth curve
        pointBackgroundColor: "rgba(5,66,50)",
        pointRadius: 4,
        data: [
          <?php
          $start_date = new DateTime('2025-01-01');
          $current_date = new DateTime();
          $interval = new DateInterval('P1M');
          $date_period = new DatePeriod($start_date, $interval, $current_date);
          foreach ($date_period as $month) {
            $targetMonth = $month->format('M');
            $targetYear = $month->format('Y');

            $result = mysqli_query($conn, "SELECT COUNT(*) as total_patients
                        FROM tbl_patients
                        WHERE DATE_FORMAT(regi_datetime, '%b') = '$targetMonth'
                        AND YEAR(regi_datetime) = $targetYear");
            while ($row = mysqli_fetch_assoc($result)) {
              echo $row["total_patients"] . ",";
            }
          }
          ?>
        ]
      }]
    };

    var options = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: "rgba(255,99,132,0.1)"
          }
        },
        x: {
          grid: {
            display: false
          }
        }
      }
    };

    new Chart('chart2', {
      type: 'line', // Use 'line' chart type for area chart
      data: data,
      options: options
    });
  </script>



  <script>
    var data = {
      labels: [
        <?php
        $doctor_id = $_SESSION['DocId'];
        $start_date = new DateTime('2025-01-01');
        $current_date = new DateTime();
        $interval = new DateInterval('P1M');
        $date_period = new DatePeriod($start_date, $interval, $current_date);
        foreach ($date_period as $month) {
          echo '"' . $month->format('M Y') . '"' . ",";
        }
        ?>
      ],
      datasets: [{
        label: "Appointment",
        backgroundColor: "rgba(13, 38, 140, 0.2)",
        borderColor: "rgba(5,66,50)",
        borderWidth: 1,
        fill: true,
        tension: 0.3,
        pointBackgroundColor: "rgba(5,66,50)",
        pointRadius: 4,
        data: [
          <?php
          $start_date = new DateTime('2025-01-01');
          $current_date = new DateTime();
          $interval = new DateInterval('P1M');
          $date_period = new DatePeriod($start_date, $interval, $current_date);
          foreach ($date_period as $month) {
            $targetMonth = $month->format('m'); // Fixed: numeric month
            $targetYear = $month->format('Y');  // Fixed: year

            $result = mysqli_query($conn, "SELECT COUNT(*) as total_appointment
                  FROM tbl_appointment
                  WHERE MONTH(Add_date) = '$targetMonth'
                  AND YEAR(Add_date) = '$targetYear'
                  AND doctor_id = '$doctor_id'");

            while ($row = mysqli_fetch_assoc($result)) {
              echo $row["total_appointment"] . ",";
            }
          }
          ?>
        ]
      }]
    };

    var options = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: "rgba(255,99,132,0.1)"
          }
        },
        x: {
          grid: {
            display: false
          }
        }
      }
    };

    new Chart('chart3', {
      type: 'bar',
      data: data,
      options: options
    });
  </script>



</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:37:47 GMT -->

</html>