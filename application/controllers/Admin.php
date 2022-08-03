<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
    parent::__construct();

    if($this->session->userdata('logged_in') == FALSE){
      redirect(base_url('login'));
    }

    if($this->session->userdata('role') == 1 ){
      redirect(base_url());
    }


  }

  // MASTER ----------------------
    public function index()
    {
      $data = [
        'title' 		=> 'Dashboard',
        'page' 			=> 'dashboard'			
      ];
      $this->load->view('templates/admin/index.php', $data);
    }

    public function master_user()
    {
      $this->load->model(['Model_user']);

      $data_user	=	$this->Model_user->semua()->result_array();
      $data = [
        'title' 		=> 'Data User',
        'page' 			=> 'master_user',
        'users'			=> $data_user			
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/user.php');
    }

    public function tambah_user()
    {
      $data = [
        'title' 		=> 'Tambah User',
        'page' 			=> 'tambah_user',
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/user.php');
    }

    public function proses_tambah_user()
    {
      $this->load->model(['Model_user']);
  
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $role = $this->input->post('role');
  
      $data = array(
        'username'       => $username,
        'password'       => $password,
        'role'           => $role,
        );
      $insert = $this->Model_user->tambah($data,'user');
      
      if($insert){
        echo "success";
      } else{
        echo "error";
        
      }    
    }

    public function proses_hapus_user()
    {
      $this->load->model(['Model_user']);
  
      $id = $this->input->post('id');
  
      if($this->Model_user->hapus_by_id($id)){
        echo "success";
      } else{
        echo "error";
        
      }
    }

    public function edit_user($id)
    {
      $this->load->model(['Model_user']);

      $data_user	=	$this->Model_user->by_id($id)->row_array();
      $data = [
        'title' 		=> 'Edit User',
        'page' 			=> 'ediuser',
        'user'			=> $data_user			
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/user.php');
    }

    public function proses_edit_user()
    {
      $this->load->model(['Model_user']);

      $id = $this->input->post('id');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $role = $this->input->post('role');

      $data = array(
        'username' => $username,
        'password' => $password,
        'role' => $role
      );

      $where = array(
        'id_user' => $id
      );

      if($this->Model_user->update_by_id($where,$data,'user')){
        echo "success";
      } else{
        echo "error";
        
      }
    }

  // LOWONGAN
    public function lowongan_master()
    {
      $this->load->model(['Model_lowongan']);

      $data_lowongan	=	$this->Model_lowongan->semua()->result_array();
      $data = [
        'title' 		=> 'Data lowongan',
        'page' 			=> 'lowongan_master',
        'lowongans'			=> $data_lowongan			
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/lowongan.php');
    }
    
    public function lowongan_tambah()
    {
      $data = [
        'title' 		=> 'Tambah lowongan',
        'page' 			=> 'lowongan_tambah',
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/lowongan.php');
    }

    public function lowongan_proses_tambah()
    {
      $this->load->model(['Model_lowongan']);
  
      $judul = $this->input->post('judul');
      $deskripsi = $this->input->post('deskripsi');
      $status = $this->input->post('status');
  
      $data = array(
        'judul'        => $judul,
        'deskripsi'       => $deskripsi,
        'status_aktif'    => $status,
        );
      
      $insert = $this->Model_lowongan->tambah($data,'lowongan');
      
      if($insert){
        echo "success";
      } else{
        echo "error";
      }    
    }

    public function lowongan_proses_hapus()
    {
      $this->load->model(['Model_lowongan']);
  
      $id = $this->input->post('id');
  
      if($this->Model_lowongan->hapus_by_id($id)){
        echo "success";
      } else{
        echo "error";
        
      }
    }

    public function lowongan_edit($id)
    {
      $this->load->model(['Model_lowongan']);
      
      $data_lowongan	=	$this->Model_lowongan->by_id($id)->row_array();
      $data = [
        'title' 		=> 'Edit lowongan',
        'page' 			=> 'lowongan_edit',
        'lowongan'  => $data_lowongan,	
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/lowongan.php');
    }

    public function lowongan_proses_edit()
    {
      $this->load->model(['Model_lowongan']);

      $id = $this->input->post('id');
  
      $judul = $this->input->post('judul');
      $deskripsi = $this->input->post('deskripsi');
      $status = $this->input->post('status');

      if($status == 'true') $status = TRUE;
  
      $data = array(
        'judul'        => $judul,
        'deskripsi'       => $deskripsi,
        'status_aktif'    => $status,
      );

      $where = array(
        'id' => $id
      );

      if($this->Model_lowongan->update_by_id($where,$data,'lowongan')){
        echo "success";
      } else{
        echo "error";
      }
    }
  // END LOWONGAN ======

  // SOAL
    public function soal_master()
    {
      $this->load->model(['Model_soal']);

      $data_soal	=	$this->Model_soal->semua()->result_array();
      $data = [
        'title' 		=> 'Data soal',
        'page' 			=> 'soal_master',
        'soals'			=> $data_soal			
      ];
      $this->load->view('templates/admin/index.php', $data);
      // $this->load->view('function/admin/soal.php');
    }  
  // END SOAL ======

  // PELAMAR
    public function pelamar_master()
    {
      $this->load->model(['Model_lamaran']);

      $data_lamaran	=	$this->Model_lamaran->join_pelamar_lowongan()->result_array();
      $data = [
        'title' 		=> 'Data Pelamar',
        'page' 			=> 'pelamar_master',
        'lamarans'			=> $data_lamaran			
      ];
      $this->load->view('templates/admin/index.php', $data);
      // $this->load->view('function/admin/lamaran.php');
    }  
  // END PELAMAR ======

    public function laporan()
    {
      $this->load->model(['Model_lamaran']);
      $tanggal1 = "";
      $tanggal2 = "";
      $tanggal3 = "";

      if($this->input->get('tgl_awal') != "" ){
        $tanggal1 = $this->input->get('tgl_awal');
        $tanggal2 = $this->input->get('tgl_akhir');

        $tanggal3 = new DateTime($tanggal2);
        $tanggal3 = $tanggal3->modify('+1 day');
        $tanggal3 = $tanggal3->format('Y-m-d');
      }
      $data_lamaran	=	$this->Model_lamaran->join_pelamar_lowongan();
  
      $data = [
        'title' 				=> 'Laporan ',
        'page' 					=> 'laporan',
        'tgl_awal' 			=> $tanggal1,
        'tgl_akhir' 		=> $tanggal2,
        'lamarans'	  => $data_lamaran
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/laporan.php');
    }

    public function laporan_print()
    {
      $this->load->model(['Model_lamaran']);
      $tanggal1 = $this->input->get('tgl_awal');
      $tanggal2 = $this->input->get('tgl_akhir');

      $tanggal3 = new DateTime($tanggal2);
      $tanggal3 = $tanggal3->modify('+1 day');
      $tanggal3 = $tanggal3->format('Y-m-d');
      $data_lamaran	=	$this->Model_lamaran->join_pelamar_lowongan();

      
      $data = [
        'title' 				=> 'Laporan Pelamar',
        'tgl_awal' 			=> $tanggal1,
        'tgl_akhir' 		=> $tanggal2,
        'lamarans'	  => $data_lamaran,
        'username'	    => $this->session->userdata('username')
      ];
      $this->load->view('pages/admin/print_laporan.php', $data);
    }



}
