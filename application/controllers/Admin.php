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

    public function papan_jadwal()
    {
      $this->load->model(['Model_pemesanan']);
  
      $tanggal_papan_jadwal = date("Y-m-d");
  
      if($this->input->get('tanggal_papan_jadwal') != "" ){
        $tanggal_papan_jadwal = $this->input->get('tanggal_papan_jadwal');
      }
  
      $tanggal2 = new DateTime($tanggal_papan_jadwal);
      $tanggal2->modify('+1 day');
      $tanggal2 = $tanggal2->format('Y-m-d');
  
      $pemesanan_data	=	$this->Model_pemesanan->where_success_by_tanggal_join_pelanggan($tanggal_papan_jadwal, $tanggal2)->result_array();
      $data = [
        'title' 		=> 'Papan Jadwal',
        'page' 			=> 'papan_jadwal',
        'tgl_cari' 	=>  $tanggal_papan_jadwal,					
        'pemesanans' => $pemesanan_data					
      ];
  
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/papan_jadwal.php');
  
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
      $insert = $this->Model_user->tambah($data,'t_user');
      
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
        'page' 			=> 'edit_user',
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

      if($this->Model_user->update_by_id($where,$data,'t_user')){
        echo "success";
      } else{
        echo "error";
        
      }
    }


    public function pelanggan_master()
    {
      $this->load->model(['Model_pelanggan']);

      $pelanggan_data	=	$this->Model_pelanggan->semua()->result_array();
      $data = [
        'title' 				=> 'Data Pelanggan',
        'page' 					=> 'pelanggan_master',
        'pelanggans'			=> $pelanggan_data
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/pelanggan.php');
    }

    public function pelanggan_tambah()
    {
      $data = [
        'title' 		=> 'Tambah Pelanggan ',
        'page' 			=> 'pelanggan_tambah',
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/pelanggan.php');
    }

    public function pelanggan_proses_tambah()
    {
      $this->load->model(['Model_pelanggan']);
      $this->load->model(['Model_user']);
  
      $pelanggan = $this->input->post('pelanggan');
      $email    = $this->input->post('email');
      $hp       = $this->input->post('hp');
      $jeniskelamin = $this->input->post('jeniskelamin');
  
      $data = array(
        'pelanggan'       => $pelanggan,
        'email'           => $email,
        'no_hp'           => $hp,
        'jenis_kelamin'   => $jeniskelamin,
        'tgl_bergabung'   => Date('Y-m-d H:i:s')
        );
      
      $insert = $this->Model_pelanggan->tambah($data,'t_pelanggan');
      if($insert){
        $data2 = array(
          'username'       => $pelanggan,
          'password'       => "12345",
          'role'           => 1,
          );
        $insert2 = $this->Model_user->tambah($data2,'t_user');
        if($insert2){
          echo "success";
        }
      } else{
        echo "error";
        
      }    
    }

    public function pelanggan_proses_hapus()
    {
      $this->load->model(['Model_pelanggan']);
      $this->load->model(['Model_user']);
  
      $id = $this->input->post('id');
      $id_user = $this->Model_pelanggan->semua_join_user_by_id($id)->row_array();
      $id_user = $id_user['id_user'];
      if($this->Model_pelanggan->hapus_by_id($id)){
        if($this->Model_user->hapus_by_id($id_user)){
          echo "success";
        }
      } else{
        echo "error";
        
      }    
    }

    public function pelanggan_edit($id)
    {
      $this->load->model(['Model_pelanggan']);
      
      $data_pelanggan	=	$this->Model_pelanggan->by_id($id)->row_array();
      $data = [
        'title' 		=> 'Edit pelanggan',
        'page' 			=> 'pelanggan_edit',
        'pelanggan'  => $data_pelanggan,	
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/pelanggan.php');
    }

    public function pelanggan_proses_edit()
    {
      $this->load->model(['Model_pelanggan']);

      $id = $this->input->post('id');
      $pelanggan = $this->input->post('pelanggan');
      $email    = $this->input->post('email');
      $hp       = $this->input->post('hp');
      $jeniskelamin = $this->input->post('jeniskelamin');
  
      $data = array(
        'pelanggan'        => $pelanggan,
        'email'           => $email,
        'no_hp'           => $hp,
        'jenis_kelamin'   => $jeniskelamin,
        'tgl_bergabung'   => Date('Y-m-d H:i:s')
        );


      $where = array(
        'id_pelanggan' => $id
      );

      if($this->Model_pelanggan->update_by_id($where,$data,'t_pelanggan')){
        echo "success";
      } else{
        echo "error";
      }
    }

    public function lapangan_master()
    {
      $this->load->model(['Model_lapangan']);

      $lapangan_data	=	$this->Model_lapangan->semua()->result_array();
      $data = [
        'title' 				=> 'Data lapangan ',
        'page' 					=> 'lapangan_master',
        'lapangans'			=> $lapangan_data
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/lapangan.php');
    }

    public function lapangan_tambah()
    {
      $data = [
        'title' 		=> 'Tambah lapangan ',
        'page' 			=> 'lapangan_tambah',
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/lapangan.php');
    }

    public function lapangan_proses_tambah()
    {
      $this->load->model(['Model_lapangan']);
  
      $lapangan = $this->input->post('lapangan');
      $jenis = $this->input->post('jenis');
      $weekday_siang = $this->input->post('weekday_siang');
      $weekday_malam = $this->input->post('weekday_malam');
      $weekend = $this->input->post('weekend');
      $weekend_malam = $this->input->post('weekend_malam');
  
      $data = array(
        'lapangan'       => $lapangan,
        'jenis_lapangan'           => $jenis,
        'weekday_siang'           => $weekday_siang,
        'weekday_malam'   => $weekday_malam,
        'weekend'   => $weekend,
        'weekend_malam'   => $weekend_malam
        );
      
      $insert = $this->Model_lapangan->tambah($data,'t_lapangan');

      
      if($insert){
        echo "success";
      } else{
        echo "error";
      }    
    }

    public function lapangan_proses_hapus()
    {
      $this->load->model(['Model_lapangan']);
  
      $id = $this->input->post('id');
  
      if($this->Model_lapangan->hapus_by_id($id)){
        echo "success";
      } else{
        echo "error";
        
      }
    }

    public function lapangan_edit($id)
    {
      $this->load->model(['Model_lapangan']);
      
      $data_lapangan	=	$this->Model_lapangan->by_id($id)->row_array();
      $data = [
        'title' 		=> 'Edit lapangan',
        'page' 			=> 'lapangan_edit',
        'lapangan'  => $data_lapangan,	
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/lapangan.php');
    }

    public function lapangan_proses_edit()
    {
      $this->load->model(['Model_lapangan']);

      $id = $this->input->post('id');
      $lapangan = $this->input->post('lapangan');
      $jenis = $this->input->post('jenis');
      $weekday_siang = $this->input->post('weekday_siang');
      $weekday_malam = $this->input->post('weekday_malam');
      $weekend = $this->input->post('weekend');
      $weekend_malam = $this->input->post('weekend_malam');
  
      $data = array(
        'lapangan'       => $lapangan,
        'jenis_lapangan'           => $jenis,
        'weekday_siang'           => $weekday_siang,
        'weekday_malam'   => $weekday_malam,
        'weekend'   => $weekend,
        'weekend_malam'   => $weekend_malam
        );

      $where = array(
        'id_lapangan' => $id
      );

      if($this->Model_lapangan->update_by_id($where,$data,'t_lapangan')){
        echo "success";
      } else{
        echo "error";
      }
    }

    public function pemesanan()
    {
      $this->load->model(['Model_pemesanan']);

      $pemesanan_data	=	$this->Model_pemesanan->semua_join_pelanggan()->result_array();
      $data = [
        'title' 				=> 'Data Pemesanan ',
        'page' 					=> 'pemesanan',
        'pemesanans'	  => $pemesanan_data
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/pemesanan.php');
    }

    public function pemesanan_proses_edit()
    {
      $this->load->model(['Model_pemesanan']);
  
      $id = $this->input->post('id');

      $data = array(
        'status'			=> 'success',
        );
      $where = array(
        'id_pemesanan' => $id
      );
      if($this->Model_pemesanan->update_by_id($where,$data,'t_pemesanan')){
        echo "success";
      } else{
        echo "error";
        
      }    
    }

    public function pemesanan_proses_hapus()
    {
      $this->load->model(['Model_pemesanan']);

      $id = $this->input->post('id');
      if($this->Model_pemesanan->hapus_by_id($id)){
        echo "success";
      } else{
        echo "error";
        
      }    
    }

    public function laporan()
    {
      $this->load->model(['Model_pemesanan']);
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
      $pemesanan_data	=	$this->Model_pemesanan->where_success_by_tanggal_join_pelanggan($tanggal1, $tanggal3);
  
      $data = [
        'title' 				=> 'Laporan ',
        'page' 					=> 'laporan',
        'tgl_awal' 			=> $tanggal1,
        'tgl_akhir' 		=> $tanggal2,
        'pemesanans'	  => $pemesanan_data
      ];
      $this->load->view('templates/admin/index.php', $data);
      $this->load->view('function/admin/laporan.php');
    }

    public function laporan_print()
    {
      $this->load->model(['Model_pemesanan']);
      $tanggal1 = $this->input->get('tgl_awal');
      $tanggal2 = $this->input->get('tgl_akhir');

      $tanggal3 = new DateTime($tanggal2);
      $tanggal3 = $tanggal3->modify('+1 day');
      $tanggal3 = $tanggal3->format('Y-m-d');
      $pemesanan_data	=	$this->Model_pemesanan->where_success_by_tanggal_join_pelanggan($tanggal1, $tanggal3);

      
      $data = [
        'tgl_awal' 			=> $tanggal1,
        'tgl_akhir' 		=> $tanggal2,
        'pemesanans'	  => $pemesanan_data,
        'username'	    => $this->session->userdata('username')
      ];
      $this->load->view('pages/admin/laporan_print.php', $data);
    }



}
