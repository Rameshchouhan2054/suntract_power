<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Naukariwala</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css') ?>">
  <link rel="shortcut icon" href="#">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar headerfix navbar-expand fixed-top" style="background-color: rgb(57 62 70); ">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: aliceblue;"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="admin" class="nav-link" style="color: aliceblue;">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link" style="color: aliceblue;">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search" style="color: aliceblue;"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                  
                </button>
               
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

        <!-- <p style="color: aliceblue;">logout</p> -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt" style="color: aliceblue;"></i>
          </a>
        </li>
        <li class="nav-item pt-1 pr-2">
          <a href="<?php
                    echo  base_url(); ?>logout" class="" style="color: ghostwhite; font-size: 21px;">Logout</a>
        </li>
      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?php echo base_url('assets/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SolarPanel</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>

              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">              
                <?php
                if ($this->session->admin->user_type == "Admin") {
                ?>
                  <li class="nav-item">
                    <a href="<?php echo base_url('backend-user-list') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Backend Users </p>
                    </a>
                  </li>                      
                <?php
                }
                ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('testimonial-list') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Testimonial</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('slider-image-list') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Slider</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('unsettled-query-list') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Query</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('gallery-image-list') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gallery</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('Notification-list') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Notifications</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->

    <!-- /.content-wrapper -->



    <!-- /.control-sidebar -->
    <!-- </div> -->
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      var base_url ="<?php echo base_url() ?>";
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
    <!-- daterangepicker -->
    <!-- <script src="<?php // echo base_url('assets/plugins/moment/moment.min.js') ?>"></script> -->
    <!-- <script src="<?php // echo base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <!-- <script src="<?php // echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script> -->

    <script src="<?php echo base_url('assets/dist/js/adminlte.js') ?>"></script>
</body>

</html>