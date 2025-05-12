<?php include 'sesstion.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Appointments</title>
  <link rel="stylesheet" href="assets/fonts/remix/remixicon.css">
  <link rel="stylesheet" href="assets/css/main.min.css">
  <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="assets/vendor/dropzone/dropzone.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>
    .box_1 {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="page-wrapper">
    <?php include 'header.php'; ?>
    <div class="main-container">
      <?php include 'sidebar.php'; ?>
      <div class="app-container">
        <div class="app-hero-header d-flex align-items-center">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
              <a href="doctor_dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item text-primary" aria-current="page">Appointments</li>
          </ol>
          <div class="ms-auto d-lg-flex d-none flex-row">
            <div class="d-flex flex-row gap-1 day-sorting">
              <button class="btn btn-sm btn-primary"><a href="receptionist_dashboard.php" style="color: inherit;">Back</a></button>
            </div>
          </div>
        </div>

        <div class="app-body">
          <div class="row gx-3">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">PATIENT DETAILS</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <?php
                    $id = $_GET["data-id"];
                    $result = mysqli_query($conn, "SELECT * FROM tbl_appointment AS ap LEFT JOIN tbl_patients AS p ON ap.patient_id = p.patient_id WHERE appointment_id = '$id'") or die(mysqli_error($conn));

                    if ($row = mysqli_fetch_assoc($result)) {
                      $pid = $row["patient_id"];
                    ?>
                      <div class="col-md-6 mb-3"><strong>NAME:</strong> <?php echo $row["firstname"]; ?></div>
                      <div class="col-md-6 mb-3"><strong>GENDER:</strong> <?php echo $row["gender"]; ?></div>
                      <div class="col-md-6 mb-3"><strong>AGE:</strong> <?php echo $row["age"]; ?></div>
                      <div class="col-md-6 mb-3"><strong>WEIGHT:</strong> <?php echo $row["weight"]; ?></div>
                      <div class="col-md-6 mb-3"><strong>PROBLEM:</strong> <?php echo $row["problem"]; ?></div>
                      <div class="col-md-6 mb-3"><strong>TYPE:</strong> <?php echo $row["patient_type"]; ?></div>
                      <div class="col-md-6 mb-3"><strong>DATE:</strong> <?php echo $row["Add_date"]; ?></div>
                      <div class="col-md-6 mb-3"><strong>TIME:</strong> <?php echo $row["Add_time"]; ?></div>
                    <?php } ?>
                  </div>

                  <!-- patient details  -->
                  <table id="appointmentsGrid" class="table m-0 align-middle" class="table-outer">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Patient ID</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Disease</th>
                        <th>Weight</th>
                        <th>Type</th>
                        <th>Ammount</th>
                        <th>Payment type</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $count = 1;
                      $id = $_SESSION["DocId"];
                      $result = mysqli_query($conn, "SELECT * FROM tbl_appointment AS ap LEFT JOIN tbl_patients AS p ON ap.patient_id = p.patient_id WHERE ap.patient_id = '$pid' and ap.appointment_id!='" . $_GET["data-id"] . "'") or die(mysqli_error($conn));

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

                          <td>
                            <div class="d-inline-flex gap-1">
                              <?php
                              if ($row["status"] == "complete") {
                              ?>
                                <button class="btn btn-outline-success btn-sm"
                                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Appointment"><a href="edit_treatment.php?data-id=<?php echo $row["appointment_id"]; ?>"><i class="ri-edit-box-line"></i></button>
                              <?php } else { ?>
                                <button class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip"
                                  data-bs-placement="top" data-bs-title="View"> <a href="appointments.php?data-id=<?php echo $row["appointment_id"]; ?>"><i class="ri-eye-line"></i> </a></button>

                              <?php } ?>
                              <button data-id="<?php echo $row["appointment_id"]; ?>" id="btndelete" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-title="Reject"><i class="ri-close-circle-line"></i></button>
                          </td>
                </div>
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

        <?php
        // Handle treatment update
        if (isset($_POST["btnupdate"])) {
          $tid = $_POST["tid"];
          $medicine = $_POST["medicine"];
          $medtime = $_POST["medtime"];
          $meddose = $_POST["meddose"];
          $medtype = $_POST["medtype"];
          $Qty = $_POST["qty"];
          $update = mysqli_query($conn, "UPDATE tbl_treatmentmedicine SET medicine_id = '$medicine', time = '$medtime', dose = '$meddose', qty='$Qty', type = '$medtype' WHERE tm_id = '$tid'");
          echo $update ? '<script>window.location.href="appointments.php?data-id=' . $_GET["data-id"] . '";</script>' : '<div class="alert bg-danger text-white">Update Failed!</div>';
        }

        // Handle treatment insert
        if (isset($_POST["btnsubmit"])) {
          $app_id = $_POST["aid"];
          $medicine = $_POST["medicine"];
          $medtime = $_POST["medtime"];
          $medtype = $_POST["medtype"];
          $meddose = $_POST["meddose"];
          $Qty = $_POST["qty"];
          $sql = mysqli_query($conn, "select * from tbl_medicines where medicine_id='$medicine'");
          $row = mysqli_fetch_assoc($sql);
          $price = $row["sell_price"];
          $insert = mysqli_query($conn, "INSERT INTO tbl_treatmentmedicine (appointment_id, medicine_id, time, dose, qty, type,finalprice) VALUES ('$app_id','$medicine','$medtime','$meddose','$Qty','$medtype','$price')");
          echo $insert ? '<div class="alert bg-primary text-white">Treatment Added!</div>' : '<div class="alert bg-danger text-white">Insert Failed!</div>';
        }

        // Handle treatment delete
        if (isset($_GET['deleteid'])) {
          $deleteid = $_GET['deleteid'];
          mysqli_query($conn, "DELETE FROM tbl_treatmentmedicine WHERE tm_id = '$deleteid'");
          echo '<script>window.location.href="appointments.php?data-id=' . $_GET["data-id"] . '";</script>';
        }
        ?>

        <div class="row gx-3 box_1">
          <?php
          if (isset($_GET['editid'])) {
            $tid = $_GET['editid'];
            $editData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_treatmentmedicine WHERE tm_id = '$tid'"));
          ?>
            <div class="col-xxl-6 col-sm-12">
              <div class="card h-100">
                <div class="card-header">
                  <h5 class="card-title mb-0">Edit Treatment</h5>
                </div>
                <div class="card-body">
                  <form method="POST">
                    <input type="hidden" name="tid" value="<?php echo $tid; ?>">
                    <div class="mb-3">
                      <label class="form-label">Medicine</label>
                      <select class="form-select" name="medicine" id="medicine" onchange="loadprice(this.value)">
                        <?php
                        $medResult = mysqli_query($conn, "SELECT * FROM tbl_medicines");
                        while ($med = mysqli_fetch_assoc($medResult)) {
                          $selected = ($med["medicine_id"] == $editData["medicine_id"]) ? "selected" : "";
                          echo '<option value="' . $med["medicine_id"] . '" ' . $selected . '>' . $med["medicine_name"] . '</option>';
                        }
                        ?>

                      </select>
                      <p id="stockoutput" style="color: red;font-weight: bold;"></p>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Time</label>
                      <select class="form-select" name="medtime">
                        <?php
                        $times = ["Morning", "Afternoon", "Evening", "Night", "Morning,Afternoon", "Morning,Evening", "Morning,Night", "Afternoon,Evening", "Afternoon,Night", "Evening,Night", "Morning,Afternoon,Night", "Morning,Afternoon,Evening,Night"];
                        foreach ($times as $time) {
                          $selected = ($time == $editData["time"]) ? "selected" : "";
                          echo "<option $selected>$time</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Type</label>
                      <select class="form-select" name="medtype">
                        <?php
                        $types = ["Before Meal", "After Meal"];
                        foreach ($types as $type) {
                          $selected = ($type == $editData["type"]) ? "selected" : "";
                          echo "<option $selected>$type</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Dose</label>
                      <input type="text" class="form-control" name="meddose" value="<?php echo $editData["dose"] ?>">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Quantity</label>
                      <input type="text" class="form-control" name="qty" value="<?php echo $editData["qty"] ?>">
                    </div>
                    <button type="submit" name="btnupdate" class="btn btn-warning w-100">Update Treatment</button>
                  </form>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <!-- Add Treatment -->
            <div class="col-xxl-6 col-sm-12">
              <div class="card h-100">
                <div class="card-header">
                  <h5 class="card-title mb-0">Add Treatment</h5>
                </div>
                <div class="card-body">
                  <form method="POST">
                    <div class="mb-3">
                      <label class="form-label">Appointment</label>
                      <select class="form-select" name="aid">
                        <option value="<?php echo $_GET["data-id"] ?>" selected><?php echo $_GET["data-id"] ?></option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Medicine</label>
                      <select class="form-select" name="medicine" id="medicine" onchange="loadprice(this.value)">
                        <option value=''>Please select medicine</option>
                        <?php
                        $meds = mysqli_query($conn, "SELECT * FROM tbl_medicines");
                        while ($med = mysqli_fetch_assoc($meds)) {
                          echo '<option value="' . $med["medicine_id"] . '">' . $med["medicine_name"] . '</option>';
                        }
                        ?>

                      </select>
                      <p id="stockoutput" style="color: red;font-weight: bold;"></p>
                    </div>
                    <div class="mb-3" style="max-height: 300px; overflow-y: auto;">
                      <label class="form-label">Time</label>
                      <select class="form-select" name="medtime">
                        <option>Morning </option>
                        <option>Afternoon </option>
                        <option>Evening </option>
                        <option>Night </option>
                        <option>Morning,Afternoon</option>
                        <option>Morning,Evening</option>
                        <option>Morning,Night</option>
                        <option>Afternoon,Evening </option>
                        <option>Afternoon,Night </option>
                        <option>Evening,Night </option>
                        <option>Morning,Afternoon,Night</option>
                        <option>Morning,Afternoon,Evening,Night</option>

                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Intake Type</label>
                      <select class="form-select" name="medtype">
                        <option>Before Meal</option>
                        <option>After Meal</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Dose</label>
                      <input type="text" class="form-control" name="meddose">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Quantity</label>
                      <input type="text" class="form-control" name="qty">
                    </div>
                    <button type="submit" name="btnsubmit" class="btn btn-primary w-100">Add Treatment</button>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>

          <!-- View Treatment -->
          <div class="col-xxl-6 col-sm-12">
            <div class="card h-100">
              <div class="card-header">
                <h5 class="card-title mb-0">View Treatment</h5>
              </div>
              <div class="card-body" style="max-height: 600px; overflow-y: auto;">
                <?php
                $id = $_GET["data-id"];
                $result = mysqli_query($conn, "SELECT t.*, m.medicine_name FROM tbl_treatmentmedicine AS t LEFT JOIN tbl_medicines AS m ON t.medicine_id = m.medicine_id WHERE appointment_id = '$id'");
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<div class="mb-3 p-2 bg-light rounded border">';
                  echo '<div><strong>Medicine:</strong> ' . $row["medicine_name"] . '</div>';
                  echo '<div><strong>Time:</strong> ' . $row["time"] . '</div>';
                  echo '<div><strong>Intake Time:</strong> ' . $row["type"] . '</div>';
                  echo '<div><strong>Dose:</strong> ' . $row["dose"] . '</div>';
                  echo '<div><strong>Quantity:</strong> ' . $row["qty"] . '</div>';
                  echo '<div><strong>Price:</strong> Rs.' . $row["finalprice"] . '</div>';
                  echo '<div class="mt-2 d-flex gap-2">';
                  echo '<a href="appointments.php?data-id=' . $_GET["data-id"] . '&editid=' . $row["tm_id"] . '" class="btn btn-sm btn-warning">Edit</a>';
                  echo '<a href="appointments.php?data-id=' . $_GET["data-id"] . '&deleteid=' . $row["tm_id"] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</a>';
                  echo '</div></div>';
                }
                ?>
              </div>
            </div>
          </div>
        </div>



        <!-- Row starts -->
        <div class="row gx-3 box_1" data-aos="fade-up">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Treatment</h5>
              </div>
              <div class="card-body">
                <!-- Row starts -->




                <!-- insert into Treatment-->
                <?php

                if (isset($_POST["update"])) {
                  // $sid = $_POST["stateid"];
                  $prob = $_POST["prob"];
                  $soln = $_POST["soln"];
                  $report = $_POST["report"];
                  $nxtdate = $_POST["nxtdate"];
                  $medtake = $_POST["medtake"];
                  $appid = $_POST["appid"];
                  $id = $_GET["data-id"];




                  $result = mysqli_query($conn, "update  tbl_treatment set  problem='$prob',solution='$soln',next_date='$nxtdate',reports='$report',medicine_take='$medtake',appointment_id='$appid' where appointment_id ='$id'") or die(mysqli_error($conn));


                  if ($result) {
                ?>
                    <div class="alert bg-primary text-white alert-dismissible fade show" role="alert">
                      Data Updated!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      <?php echo "<script>window.location='view_appointments.php'</script>"; ?>
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
                }

                ?>


                <?php

                if (isset($_GET["data-id"])) {
                  $id = $_GET["data-id"];

                  $result = mysqli_query($conn, "select * from tbl_treatment where appointment_id ='$id'") or die(mysqli_error($conn));
                  $row = mysqli_fetch_assoc($result);
                }

                ?>


                <!-- Insert into treatment ends !-->
                <form method="POST">

                  <div class="row gx-3">
                    <div class="col-sm-12">
                      <div class="mb-3">
                        <label class="form-label">Appointment</label>
                        <select class="form-select" name="appid">
                          <option value="<?php echo $_GET["data-id"] ?>" selected><?php echo $_GET["data-id"] ?></option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="a1">Problem <span
                            class="text-danger">*</span></label>
                        <textarea type="text" class="form-control" value="<?php echo $row["problem"] ?>" id="prob" name="prob" placeholder="Enter Problem"><?php echo $row["problem"] ?></textarea>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="mb-3">
                        <label class="form-label" for="a1">Solutions <span
                            class="text-danger">*</span></label>
                        <textarea type="text" value="<?php echo $row["solution"] ?>" class="form-control" id="soln" name="soln" placeholder="Enter Solutions"><?php echo $row["solution"] ?></textarea>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="mb-3">
                        <label class="form-label">Report <span class="text-danger">*</span></label>
                        <div class="m-0">
                          <div class="form-check form-check-inline">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="report"
                              id="reportYes"
                              value="Yes"
                              <?php if (isset($row["reports"]) && $row["reports"] == "Yes") echo "checked"; ?>>
                            <label class="form-check-label" for="reportYes">Yes</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="report"
                              id="reportNo"
                              value="No"
                              <?php if (isset($row["reports"]) && $row["reports"] == "No") echo "checked"; ?>>
                            <label class="form-check-label" for="reportNo">No</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="mb-3">
                        <label class="form-label" for="a1">Next Date <span
                            class="text-danger">*</span></label>
                        <input type="date" value="<?php echo $row["next_date"] ?>" class="form-control" id="nxtdate" name="nxtdate" placeholder="Enter State Name">
                      </div>
                    </div>


                    <div class="col-sm-12">
                      <div class="mb-3">
                        <label class="form-label">medicine take <span
                            class="text-danger">*</span></label>
                        <div class="m-0">
                          <div class="form-check form-check-inline">
                            <input <?php if ($row["medicine_take"] == "yes") { ?> checked <?php } ?> class="form-check-input" type="radio" name="medtake" id="medtake"
                              value="yes">
                            <label class="form-check-label">Yes</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input <?php if ($row["medicine_take"] == "no") { ?> checked <?php } ?>class="form-check-input" type="radio" name="medtake" id="medtake"
                              value="no">
                            <label class="form-check-label">No</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="d-flex gap-2 justify-content-end">
                        <button type="submit" name="update" class="btn btn-primary">
                          Submit
                        </button>
                      </div>
                    </div>

                  </div>
                </form>
                <!-- Row ends -->

              </div>
            </div>
          </div>
        </div>
        <!-- Row ends -->


      </div>
      <?php include 'footer.php'; ?>
    </div>
  </div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/moment.min.js"></script>
  <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
  <script src="assets/vendor/dropzone/dropzone.min.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- jQuery (needed for Select2) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    AOS.init();
  </script>
  <script>
    function loadprice(mid) {
      $.ajax({
        url: "ajax/getprice.php",
        method: "POST",
        data: {
          "mid": mid
        },
        success: function(response) {
          $("#stockoutput").html("<br/>" + "Available Stock =  " + response);
        },
        error: function(error) {
          console.log(error);
        }
      })
    }
  </script>

  <script>
    $(document).ready(function() {
      $('#medicine').select2({
        placeholder: "Select Medicine",
        allowClear: true
      });
    });
  </script>
</body>

</html>