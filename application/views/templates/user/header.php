<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Temon Futsal - <?=$title;?></title>

  <!-- Google Font: Source Sans Pro -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url('public/');?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('public/');?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light">
    <div class="container">
      <!-- <a href="<?=base_url()?>" class="navbar-brand">
        <span class="brand-text">Temon Futsal Club</span>
      </a> -->

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3 ml-3 justify-content-center" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <!-- <li class="nav-item <?= ($page == "beranda") ? "active" : ""; ?>">
            <a class="nav-link" href="<?=base_url();?>">Beranda</a>
          </li> -->
          <li class="nav-item <?= ($page == "home") ? "active" : ""; ?>">
            <a class="nav-link" href="<?=base_url('home');?>">Home</a>
          </li>
          <li class="nav-item <?= ($page == "papan_jadwal") ? "active" : ""; ?>">
            <a class="nav-link" href="<?=base_url('papan-jadwal');?>" >Papan Jadwal</a>
          </li>
          <li class="nav-item <?= ($page == "pemesanan") ? "active" : ""; ?> <?= ($this->session->userdata('role') < 1) ? "d-none" : ""; ?>">
            <a class="nav-link" href="<?=base_url('pemesanan');?>" >
              Pemesanan
              <?php
                $pemesanan_pending = 0;
                if($this->session->userdata('login') == FALSE){
                  $CI =& get_instance();
                  $CI->load->model(['Model_pelanggan']);
                  $CI->load->model(['Model_pemesanan']);
      
                  $pelanggan = $CI->session->userdata('username');
                  $pelanggan	=	$CI->Model_pelanggan->by_user($pelanggan)->row_array();
                  $pelanggan = $pelanggan['id_pelanggan'];
            
                  $pemesanan_pending = $CI->Model_pemesanan->by_pelanggan_pending($pelanggan)->num_rows();
                }
                if ($pemesanan_pending > 0){
              ?>
              <span class="badge badge-danger navbar-badge"><?=$pemesanan_pending?></span>
              <?php } ?> 
            </a>

          </li>
        </ul>

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fas fa-user"></i>
            <!-- <span class="badge badge-warning navbar-badge">15</span> -->
          </a>
          <div class="dropdown-menu dropdown-menu dropdown-menu-right text-center">
            <a class="dropdown-item" href="<?= ($this->session->userdata('logged_in')) ? base_url("logout")  : base_url("login"); ;?>">
              <?= ($this->session->userdata('logged_in')) ? "Logout " : "Login"; ?>
            </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
