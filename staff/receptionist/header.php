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

<!-- App brand ends -->

<!-- App header actions starts -->
<div class="header-actions">



  <!-- Header user settings starts -->
  <div class="dropdown ms-2">
    <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button"
      data-bs-toggle="dropdown" aria-expanded="false">
      <div class="avatar-box">  <?php echo isset($_SESSION["staffname"]) ? substr($_SESSION["staffname"], 0, 2) : "ST"; ?><span class="status busy"></span></div>
    </a>
    <div class="dropdown-menu dropdown-menu-end shadow-lg">
      <div class="px-3 py-2">
        <span class="small">Staff</span>
        <h6 class="m-0">     <?php echo isset($_SESSION["staffname"]) ? $_SESSION["staffname"] : "Staff"; ?></h6>
      </div>
      <div class="mx-3 my-2 d-grid">
        <a href="index.php" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
  <!-- Header user settings ends -->

</div>
<!-- App header actions ends -->

</div>