<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
    parent::__construct();

    // if($this->session->userdata('role') == 2 ){
    //   redirect(base_url('admin'));
    // }
		
  }

	public function index()
	{
		$data = [
			'title' 		=> 'Home',
			'page' 			=> 'home'			
		];
		$this->load->view('templates/user/index.php', $data);
	}

	public function profil()
	{
		$this->load->model(['Model_user']);
		$id_user  = $this->session->userdata('id');

		$pelamar_data	=	$this->Model_user->by($id_user)->row_array();

		$data = [
			'title' 		=> 'Akun',
			'page' 			=> 'profile',
			'pelamar'		=> $pelamar_data		
		];
		$this->load->view('templates/user/index.php', $data);
	}

	public function lowongan()
	{
		$this->load->model(['Model_lowongan']);

		$lowongan_data	=	$this->Model_lowongan->semua()->result_array();
		$data = [
			'title' 		=> 'Lowongan',
			'page' 			=> 'lowongan',
			'lowongans' => $lowongan_data					
		];

		$this->load->view('templates/user/index.php', $data);
		// $this->load->view('function/user/papan_jadwal.php');

	}

	public function lamar_lowongan($id_lowongan)
	{
    if($this->session->userdata('logged_in') == FALSE){
			?><script>
				alert('Silahkan login untuk melamar lowongan')
				window.location.href =`<?php echo base_url('login')?>`;
			</script><?php
			return null;
    }

		$this->load->model(['Model_lamaran']);
		$this->load->model(['Model_pelamar']);

		$id_user  = $this->session->userdata('id');
		$pelamar = $this->Model_pelamar->by('id_user', $id_user)->row_array();

		$check = $this->Model_lamaran->check_by($pelamar['id'], $id_lowongan);

		if($check->num_rows() != 0){
			?><script>
				alert('Lowongan sudah dilamar, tidak dapat melamar lowongan yang sama')
				window.location.href =`<?php echo base_url('status-lamaran')?>`;
			</script><?php
			return null;
		}

		$data = [
			'id_pelamar' 				=> $pelamar['id'],
			'id_lowongan' 			=> $id_lowongan,
			'status_lamaran' 		=> 'Tes',
			'tgl_lamaran' 			=> Date('Y-m-d H:i:s')					
		];
		$insert = $this->Model_lamaran->tambah($data,'lamaran');

		if($insert){
			?><script>
				alert('Lamaran berhasil dikirim')
				window.location.href =`<?php echo base_url('status-lamaran')?>`;
			</script><?php
		}
	}

	public function status_lamaran()
	{
		$this->load->model(['Model_lamaran']);
		$this->load->model(['Model_pelamar']);

		$id_user  = $this->session->userdata('id');
		$pelamar = $this->Model_pelamar->by('id_user', $id_user)->row_array();

		$lamaran_data	=	$this->Model_lamaran->by('id_pelamar', $pelamar['id'])->result_array();
		$data = [
			'title' 		=> 'Status Lamaran',
			'page' 			=> 'status_lamaran',
			'lamarans' 	=> $lamaran_data					
		];

			$this->load->view('templates/user/index.php', $data);

	}

	public function lihat_cv($nama_file)
	{
		$data = [
			'nama_file' 		=> $nama_file,
		];
		$this->load->view('pages/user/lihat_cv.php', $data);

	}


}

