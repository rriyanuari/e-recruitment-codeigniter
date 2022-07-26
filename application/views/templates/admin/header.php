<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Temon Futsal - Admin Panel - <?=$title;?></title>

  <!-- CSS -->
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link rel="stylesheet" href="<?=base_url('public/');?>plugins/ionicons/ionicons.min.css"> -->
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/summernote/summernote-bs4.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url('public/');?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/daterangepicker/daterangepicker.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?=base_url('public/');?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <style>
      .dataTable > thead > tr > th[class*="sort"]:before,
      .dataTable > thead > tr > th[class*="sort"]:after {
          content: "" !important;
      }
    </style>
</head>
<body class="layout-top-nav">
<div class="wrapper">

  <!-- Preloader -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
          <li class="nav-item nav-item d-none d-sm-inline-block">
            <a href="<?=base_url("admin")?>" class="nav-link <?= ($page == "dashboard") ? "active" : ""; ?>">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <p> Dashboard</p>
            </a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=base_url("admin/user")?>" class="nav-link <?= ($page == "master_user") ? "active" : ""; ?>">
              <!-- <i class="nav-icon fas fa-user"></i> -->
              <p>Data User</p>
            </a>
          </li>          
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=base_url("admin/pelanggan")?>" class="nav-link <?= ($page == "pelanggan_master") ? "active" : ""; ?>">
              <!-- <i class="nav-icon fas fa-users"></i> -->
              <p>Data Pelanggan</p>
            </a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=base_url("admin/lapangan")?>" class="nav-link  <?= ($page == "lapangan_master") ? "active" : ""; ?>">
              <!-- <i class="nav-icon fas fa-campground"></i> -->
              <p>Data Lapangan</p>
            </a>
          </li>

          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=base_url("admin/pemesanan")?>" class="nav-link  <?= ($page == "pemesanan") ? "active" : ""; ?>">
              <!-- <i class="nav-icon fas fa-calendar-check"></i> -->
              <p>Pemesanan</p>
              <?php
                $pemesanan_pending = 0;
                if($this->session->userdata('login') == FALSE){
                  $CI =& get_instance();
                  $CI->load->model(['Model_pemesanan']);
      
                  $pemesanan_pending = $CI->Model_pemesanan->semua_proses()->num_rows();
                }
                if ($pemesanan_pending > 0){
              ?>
              <span class="badge badge-danger navbar-badge"><?=$pemesanan_pending?></span>
            <?php } ?> 
            </a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=base_url("admin/laporan")?>" class="nav-link  <?= ($page == "laporan") ? "active" : ""; ?>">
              <!-- <i class="nav-icon fas fa-book-open"></i> -->
              <p>Laporan</p>
            </a>
          </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fas fa-user"></i>
          <!-- <span class="badge badge-warning navbar-badge">15</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right text-center">
          <a class="dropdown-item" href="<?=base_url("logout");?>">
            logout
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->