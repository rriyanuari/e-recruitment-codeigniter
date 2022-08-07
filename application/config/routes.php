<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'user/index';

// Auth
  $route['register'] = 'auth/register';
    $route['register-proses'] = 'auth/register_proses';

  $route['login'] = 'auth/login';
    $route['login/proses'] = 'auth/loginProses';

  $route['logout'] = 'auth/logout';

// ----------

// User
  $route['home'] = 'user/index';

  $route['profil'] = 'user/profil';
  
  $route['lowongan'] = 'user/lowongan';
    $route['lamar-lowongan/(:any)'] = 'user/lamar_lowongan/$1';

  $route['status-lamaran'] = 'user/status_lamaran';
  
  $route['lihat-cv/(:any)'] = 'user/lihat_cv/$1';

// ----------

// Admin
  $route['admin/dashboard'] = 'admin';

    // MASTER DATA
      $route['admin/user'] = 'admin/master_user';
        $route['admin/tambah-user'] = 'admin/tambah_user';
        $route['admin/proses-tambah-user'] = 'admin/proses_tambah_user';
        $route['admin/proses-hapus-user'] = 'admin/proses_hapus_user';
        $route['admin/edit-user/(:any)'] = 'admin/edit_user/$1';
        $route['admin/proses-edit-user'] = 'admin/proses_edit_user';

      $route['admin/lowongan'] = 'admin/lowongan_master';
        $route['admin/lowongan-tambah'] = 'admin/lowongan_tambah';
        $route['admin/lowongan-proses-tambah'] = 'admin/lowongan_proses_tambah';
        $route['admin/lowongan-proses-hapus'] = 'admin/lowongan_proses_hapus';
        $route['admin/lowongan-edit/(:any)'] = 'admin/lowongan_edit/$1';
        $route['admin/lowongan-proses-edit'] = 'admin/lowongan_proses_edit';

      $route['admin/soal'] = 'admin/soal_master';
        $route['admin/soal-tambah'] = 'admin/soal_tambah';
        $route['admin/soal-proses-tambah'] = 'admin/soal_proses_tambah';
        $route['admin/soal-proses-hapus'] = 'admin/soal_proses_hapus';
        $route['admin/soal-edit/(:any)'] = 'admin/soal_edit/$1';
        $route['admin/soal-proses-edit'] = 'admin/soal_proses_edit';

      $route['admin/pelamar'] = 'admin/pelamar_master';
        $route['admin/pelamar-proses-lulus'] = 'admin/pelamar_proses_lulus';
        $route['admin/pelamar-proses-gagal'] = 'admin/pelamar_proses_gagal';

      $route['admin/laporan'] = 'admin/laporan';
        $route['admin/laporan-print'] = 'admin/laporan_print';
// -------------
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


