<?php include 'sesstion.php'; ?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/dashboard2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:41:39 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Receptionist Dashboard</title>

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
    <?php include "header.php"; ?>
    <!-- App header ends -->

    <!-- Main container starts -->
    <div class="main-container">

      <!-- Sidebar wrapper starts -->
      <?php include "sidebar.php"; ?>
      <!-- Sidebar wrapper ends -->

      <!-- App container starts -->
      <div class="app-container">

        <!-- App hero header starts -->
        <div class="app-hero-header d-flex align-items-center">

          <!-- Breadcrumb starts -->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
              <a >Dashboard</a>
            </li>
          </ol>
          <!-- Breadcrumb ends -->



        </div>
        <!-- App Hero header ends -->

        <!-- App body starts -->
        <div class="app-body">

          <!-- Row starts -->
          <div class="row gx-3">
            <div class="col-xxl-9 col-sm-12">
              <div class="card mb-3 bg-3">
                <div class="card-body">
                  <div class="mh-230">
                    <div class="py-4 px-3 text-white">
                      <h6>Good Morning,</h6>
                      <h2><?php echo isset($_SESSION["staffname"]) ? $_SESSION["staffname"] : "Staff"; ?></h2>
                     
                      <div class="mt-4 d-flex gap-3">
                        <div class="d-flex align-items-center">
                          <div class="icon-box lg bg-arctic rounded-2 me-3">
                            <i class="ri-surgical-mask-line fs-4"></i>
                          </div>
                          <div class="d-flex flex-column">

                            <?php

                            $result2 = mysqli_query($conn, "select * from tbl_appointment");
                            $row2 = mysqli_num_rows($result2);
                            ?>
                            <h2 class="m-0 lh-1"><?php echo $row2; ?></h2>
                            <p class="m-0">Appointments</p>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card card-h-100">
                <div class="card-body">
                  <h2>Patients</h2>
                  <div class="chart-container">
                    <canvas id="chart2" style="height: 190px;"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->



          <!-- Row starts -->
          <div class="row gx-3">
            <div class="col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Appointments</h5>
                </div>
                <div class="card-body">

                  <!-- Table starts -->
                  <div class="table-responsive">
                    <table id="appointmentsGrid" class="table m-0 align-middle" class="table-outer">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Patient Name</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Problem</th>
                          <th>Weight</th>
                          <th>Type</th>
                          <th>Ammount</th>
                          <th>Payment type</th>
                          <th>Doctor Name</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $count = 1;
                        $result = mysqli_query($conn, "SELECT * 
                                FROM tbl_appointment AS ap
                                LEFT JOIN tbl_doctors AS d ON ap.doctor_id = d.doctor_id
                                LEFT JOIN tbl_patients AS p ON ap.patient_id = p.patient_id where ap.status='pending'") or die(mysqli_error($conn));

                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                          <tr>
                            <td>
                              <?php echo $count++; ?>
                            </td>
                            <td><?php echo $row["firstname"] . " " . $row["lastname"]; ?></td>

                            <td><?php echo $row["Add_date"]; ?></td>
                            <td><?php echo $row["Add_time"]; ?></td>
                            <td><?php echo $row["problem"]; ?></td>
                            <td><?php echo $row["weight"]; ?></td>
                            <td><?php echo $row["patient_type"]; ?></td>
                            <td><?php echo $row["ammount"]; ?></td>
                            <td><?php echo $row["payment_type"]; ?></td>
                            <td><?php echo $row["first_name"] . " " . $row["last_name"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>


                  </div>
                  </td>
                  </tr>
                <?php
                        }
                ?>
                </tbody>
                </table>
                </div>
                <!-- Table ends -->

              </div>
            </div>
          </div>
          
        </div>
        <!-- Row ends -->

      </div>
      <!-- App body ends -->

      <!-- App footer starts -->
      <?php include "footer.php"; ?>
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
  <script src="assets/vendor/apex/custom/dashboard2/activity.js"></script>
  <script src="assets/vendor/apex/custom/dashboard2/income.js"></script>
  <script src="assets/vendor/apex/custom/dashboard2/orders.js"></script>
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
        backgroundColor: "rgba(13, 38, 140, 0.2)", // Fill area
        borderColor: "rgba(5,66,50)", // Line color
        borderWidth: 2,
        fill: true, // Enable area fill
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
      type: 'bar', // Use 'line' chart type for area chart
      data: data,
      options: options
    });
  </script>
</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/dashboard2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:41:39 GMT -->

</html>