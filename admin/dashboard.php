<?php include 'sesstion.php'; ?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:35:10 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

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

    <!-- Loading starts -->
    <div id="loading-wrapper">
        <div class='spin-wrapper'>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
        </div>
    </div>
    <!-- Loading ends -->

    <!-- Page wrapper starts -->
    <div class="page-wrapper">

        <!-- App header starts -->
        <?php include 'header.php' ?>
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
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                    <!-- Breadcrumb ends -->

                    <!-- Sales stats starts -->

                    <!-- Sales stats ends -->

                </div>
                <!-- App Hero header ends -->

                <!-- App body starts -->
                <div class="app-body">

                    <!-- Row starts -->
                    <div class="row gx-3">
                        <!-- Blue Card -->
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                            <div class="card bg-2 h-100">
                                <div class="card-body">
                                    <div class="py-4 px-3 text-white">
                                        <h6>Good Morning,</h6>
                                        <h2><?php echo $_SESSION["DocUname"] ?></h2>
                                        <div class="mt-4 d-flex gap-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-box lg bg-arctic rounded-3 me-3">
                                                    <i class="ri-surgical-mask-line fs-4"></i>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <?php
                                                    $result3 = mysqli_query($conn, "select * from tbl_patients");
                                                    $row3 = mysqli_num_rows($result3);
                                                    ?>
                                                    <h2 class="m-0 lh-1"><?php echo $row3; ?></h2>
                                                    <p class="m-0">Patients</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Small Cards -->
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <?php
                                    $result = mysqli_query($conn, "select * from tbl_doctors");
                                    $row = mysqli_num_rows($result);
                                    ?>
                                    <div class="icon-box md rounded-5 bg-primary mb-3">
                                        <i class="fa-solid fa-user-doctor" style="font-size: 22px;"></i>
                                    </div>
                                    <h6>Doctors</h6>
                                    <h2 class="text-primary m-0"><?php echo $row; ?></h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <?php
                                    $result1 = mysqli_query($conn, "select * from tbl_staff");
                                    $row1 = mysqli_num_rows($result1);
                                    ?>
                                    <div class="icon-box md rounded-5 bg-primary mb-3">
                                        <i class="fa-solid fa-user" style="font-size: 20px;"></i>
                                    </div>
                                    <h6>Staff</h6>
                                    <h2 class="text-primary m-0"><?php echo $row1; ?></h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <?php
                                    $result2 = mysqli_query($conn, "select * from tbl_appointment");
                                    $row2 = mysqli_num_rows($result2);
                                    ?>
                                    <div class="icon-box md rounded-5 bg-primary mb-3">
                                        <i class="fa-solid fa-calendar-check" style="font-size: 20px;"></i>
                                    </div>
                                    <h6>Appointments</h6>
                                    <h2 class="text-primary m-0"><?php echo $row2; ?></h2>
                                </div>
                            </div>
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
          <br>
                    <!-- Row ends -->


                    <!-- Row starts -->
                    <div class="row gx-3">



                        <!-- Row ends -->



                        <!-- Row starts -->
                        <!-- Row starts -->
                        <div class="row gx-3">

                            <div class="col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title">All doctors</h5>
                                    </div>





                                    <div class="card-body">
                                        <div class="table-outer">
                                            <div class="table-responsive">
                                                <table class="table truncate align-middle">
                                                    <thead>
                                                        <tr>
                                                            <th width="30px">#</th>
                                                            <th width="100px" style="border-radius: 50%;">doctor image</th>
                                                            <th width="100px">city Name</th>
                                                            <th width="100px">first name</th>
                                                            <th width="100px">last name</th>
                                                            <!-- <th width="100px">Age</th> -->
                                                            <!-- <th width="100px">Gender</th> -->
                                                            <th width="100px">Doctor number</th>
                                                            <!-- <th width="100px">doctor email</th> -->
                                                            <th width="100px">Hospital name</th>
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

                                                        if (isset($_POST["btnisactive"])) {
                                                            $id = $_POST["txtdataid"];
                                                            $data = $_POST["txtdata"];


                                                            $result = mysqli_query($conn, "update tbl_doctors set isactive='$data' where doctor_id='$id'") or die(mysqli_error($conn));
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
                                                                    if ($row["isactive"] == "yes") {
                                                                    ?>
                                                                        <form method="post">
                                                                            <button type="submit" class="btn btn-primary" name="btnisactive">Yes</button>
                                                                            <input type="hidden" name="txtdataid" value="<?php echo $row["doctor_id"]; ?>" id="txtdataid">
                                                                            <input type="hidden" name="txtdata" value="no" id="txtdata">
                                                                        </form>
                                                                    <?php
                                                                    } else {
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
                                                                    <a href="edit_doctor.php?updateid=<?php echo $row["doctor_id"]; ?>" class="btn btn-primary">Edit</a>
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

                        <!-- Row ends -->
                    </div>

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

    <!-- Apex Charts -->
    <script src="assets/vendor/apex/apexcharts.min.js"></script>
    <script src="assets/vendor/apex/custom/home/patients.js"></script>
    <script src="assets/vendor/apex/custom/home/treatment.js"></script>
    <script src="assets/vendor/apex/custom/home/available-beds.js"></script>
    <script src="assets/vendor/apex/custom/home/earnings.js"></script>
    <script src="assets/vendor/apex/custom/home/gender-age.js"></script>
    <script src="assets/vendor/apex/custom/home/claims.js"></script>
    <script src="assets/js/chart.js"></script>
  <script src="assets/js/chart.min.js"></script>


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


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2025 12:37:12 GMT -->

</html>