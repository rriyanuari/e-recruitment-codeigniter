<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $title; ?> &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg bg-danger"></div>
      <nav class="navbar navbar-expand-lg main-navbar pt-5">
        <img src="<?=base_url('public/')?>img/logoAlt.png" class="image rounded mr-5" width="200">
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <li class="nav-item <?php echo $this->uri->segment(1) == '' ? 'active' : ''; ?>"><a href="<?= base_url(); ?>" class="nav-link">Beranda</a></li>
            <li class="nav-item <?php echo $this->uri->segment(1) == 'lowongan' ? 'active' : ''; ?>"><a href="<?= base_url('lowongan'); ?>" class="nav-link">Lowongan</a></li>
            <li class="nav-item <?php echo $this->uri->segment(1) == 'daftar-akun' ? 'active' : ''; ?> <?= ($this->session->userdata('logged_in') ? 'd-none' : ''); ?>"><a href="<?= base_url('register'); ?>" class="nav-link">Daftar Akun</a></li>
            <li class="nav-item <?php echo $this->uri->segment(1) == 'status-lamaran' ? 'active' : ''; ?> <?= ($this->session->userdata('logged_in') ? '' : 'd-none'); ?>"><a href="<?= base_url('status-lamaran'); ?>" class="nav-link">Status Lamaran</a></li>
          </ul>
        </div>
        <ul class="navbar-nav ml-auto">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none <?= ($this->session->userdata('logged_in') ? 'd-lg-inline-block' : 'd-none'); ?>">Hello, <?= $this->session->userdata('username'); ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?php echo base_url('profil'); ?>" class="dropdown-item has-icon <?= ($this->session->userdata('logged_in') ? '' : 'd-none'); ?>">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon text-danger <?= ($this->session->userdata('logged_in') ? '' : 'd-none'); ?>" 
                data-confirm="Logout?|Apakah anda yakin ingin logout?" data-confirm-yes="window.location.href =`<?php echo base_url('logout')?>`">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <a href="<?php echo base_url('login'); ?>" class="dropdown-item has-icon text-primary <?= ($this->session->userdata('logged_in') ? 'd-none' : ''); ?>">
                <i class="fas fa-sign-in-alt"></i> Login
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section mt-5">
          <?php $this->load->view('pages/user/'.$page); ?>
        </section>
      </div>

      <footer class="main-footer">
          <div class="container">
            Copyright &copy; 2022
          </div> 
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
</body>
</html>