<div class="app-header d-flex align-items-center">

  <!-- Toggle buttons starts -->
  <div class="d-flex">
    <button class="toggle-sidebar">
      <i class="ri-menu-line"></i>
    </button>
    <button class="pin-sidebar">
      <i class="ri-menu-line"></i>
    </button>
  </div>
  <!-- Toggle buttons ends -->

  <!-- App brand starts -->
  <div class="app-brand ms-3">
    <a href="index-2.html" class="d-lg-block d-none">
      <!-- <img src="assets/images/logo.svg" class="logo" alt="Medicare Admin Template"> -->
    </a>
    <a href="index-2.html" class="d-lg-none d-md-block">
      <!-- <img src="assets/images/logo-sm.svg" class="logo" alt="Medicare Admin Template"> -->
    </a>
  </div>
  <!-- App brand ends -->

  <!-- App header actions starts -->
  <div class="header-actions">



    <!-- Header user settings starts -->
    <div class="dropdown ms-2">
      <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        <div class="avatar-box"><?php echo substr($_SESSION["DocName"], 0, 2); ?><span class="status busy"></span></div>
      </a>
      <div class="dropdown-menu dropdown-menu-end shadow-lg">
        <div class="px-3 py-2">
          <span class="small">Doctor</span>
          <h6 class="m-0"><?php echo $_SESSION["DocName"] ?></h6>
        </div>
        <div class="mx-3 my-2 d-grid">
          <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
      </div>
    </div>
    <!-- Header user settings ends -->

  </div>
  <!-- App header actions ends -->

</div>