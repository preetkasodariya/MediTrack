<?php
include 'connetion.php';
// session_start();

// // Check if patient is logged in and fetch details
// $patient_name = isset($_SESSION['firstname']) ? $_SESSION['patient_name'] : 'Guest';
// $patient_photo = isset($_SESSION['patient_image']) ? $_SESSION['patient_photo'] : 'assets/images/user6.png';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sidebar</title>
</head>

<body>
    <nav id="sidebar" class="sidebar-wrapper">

        <!-- Sidebar profile starts -->
        <div class="sidebar-profile">
        <img src="assets/images/images.jpeg" class="img-shadow img-3x me-3 rounded-5" alt="Hospital Admin Templates">
            <div class="m-0">
                <h5 class="mb-1 profile-name text-nowrap text-truncate"><?php echo $_SESSION["staffname"] ?></h5>
                <p class="m-0 small profile-name text-nowrap text-truncate">Staff</p>
            </div>
        </div>
        <!-- Sidebar profile ends -->

        <!-- Sidebar menu starts -->
        <div class="sidebarMenuScroll">
            <ul class="sidebar-menu">
                <li class="active current-page">
                    <a href="receptionist_dashboard.php">
                        <i class="ri-home-6-line"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#!">
                    <i class="ri-empathize-line" style="font-size: 25px;"></i>
                        <span class="menu-text">Patients</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="view_patient.php">View Patients</a>
                        </li>
                        <li>
                            <a href="add_patient.php">Add Patients</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#!">
                    <i class="fa-solid fa-calendar-check"></i>
                    
                        <span class="menu-text">Appointments</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="add_appointment.php">Book Appointments</a>
                        </li>
                        <li>
                            <a href="view_appointment.php">View appointments</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#!">
                        <i class="ri-secure-payment-line"></i>
                        <span class="menu-text">Accounts</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="index.php">LogOut</a>
                        </li>
                        <li>
                            <a href="changepass.php">Change Password</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar menu ends -->

        <!-- Sidebar contact starts -->
        <div class="sidebar-contact">
            <p class="fw-light mb-1 text-nowrap text-truncate">Emergency Contact</p>
            <h5 class="m-0 lh-1 text-nowrap text-truncate">7016488792</h5>
            <i class="ri-phone-line"></i>
        </div>
        <!-- Sidebar contact ends -->

    </nav>
</body>

</html>