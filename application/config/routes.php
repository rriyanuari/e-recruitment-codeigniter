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
  $route['papan-jadwal'] = 'user/papan_jadwal';
  $route['papan-jadwal/(:any)'] = 'user/papan_jadwal_tanggal/$1';
  $route['pemesanan'] = 'user/pemesanan';
    $route['tambah-pemesanan'] = 'user/pemesanan_tambah';
      $route['pemesanan-proses-tambah'] = 'user/pemesanan_proses_tambah';
      $route['pemesanan-proses-edit'] = 'user/pemesanan_proses_edit';
    $route['edit-pemesanan/(:any)'] = 'user/pemesanan_edit/$1';
    $route['pemesanan-proses-hapus'] = 'user/pemesanan_proses_hapus';


// ----------

// Admin
  $route['admin/dashboard'] = 'admin';
  $route['admin/papan-jadwal'] = 'admin/papan_jadwal';
  $route['admin/papan-jadwal/(:any)'] = 'admin/papan_jadwal_tanggal/$1';

    // MASTER DATA
      $route['admin/user'] = 'admin/master_user';
        $route['admin/tambah-user'] = 'admin/tambah_user';
        $route['admin/proses-tambah-user'] = 'admin/proses_tambah_user';
        $route['admin/proses-hapus-user'] = 'admin/proses_hapus_user';
        $route['admin/edit-user/(:any)'] = 'admin/edit_user/$1';
        $route['admin/proses-edit-user'] = 'admin/proses_edit_user';

      $route['admin/pelanggan'] = 'admin/pelanggan_master';
        $route['admin/pelanggan-tambah'] = 'admin/pelanggan_tambah';
        $route['admin/pelanggan-proses-tambah'] = 'admin/pelanggan_proses_tambah';
        $route['admin/pelanggan-proses-hapus'] = 'admin/pelanggan_proses_hapus';
        $route['admin/pelanggan-edit/(:any)'] = 'admin/pelanggan_edit/$1';
        $route['admin/pelanggan-proses-edit'] = 'admin/pelanggan_proses_edit';

      $route['admin/lapangan'] = 'admin/lapangan_master';
        $route['admin/lapangan-tambah'] = 'admin/lapangan_tambah';
        $route['admin/lapangan-proses-tambah'] = 'admin/lapangan_proses_tambah';
        $route['admin/lapangan-proses-hapus'] = 'admin/lapangan_proses_hapus';
        $route['admin/lapangan-edit/(:any)'] = 'admin/lapangan_edit/$1';
        $route['admin/lapangan-proses-edit'] = 'admin/lapangan_proses_edit';

      $route['admin/pemesanan'] = 'admin/pemesanan';
        $route['admin/pemesanan-proses-edit'] = 'admin/pemesanan_proses_edit';
        $route['admin/pemesanan-proses-hapus'] = 'admin/pemesanan_proses_hapus';

      $route['admin/laporan'] = 'admin/laporan';
        $route['admin/laporan-print'] = 'admin/laporan_print';
// -------------
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


