<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
    parent::__construct();

    if($this->session->userdata('role') == 2 ){
      redirect(base_url('admin'));
    }
		
  }

	public function index()
	{
		$data = [
			'title' 		=> 'Home',
			'page' 			=> 'home'			
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
			break;
    }

		$this->load->model(['Model_lamaran']);

		$id_pelamar  = $this->session->userdata('logged_in');

		$check = $this->Model_lamaran->check_by($id_pelamar, $id_lowongan);

		if($check->num_rows() != 0){
			?><script>
				alert('Lowongan sudah dilamar, tidak dapat melamar lowongan yang sama')
				window.location.href =`<?php echo base_url('status-lamaran')?>`;
			</script><?php
			break;
		}

		$data = [
			'id_pelamar' 				=> $id_pelamar,
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

		$id_pelamar  = $this->session->userdata('logged_in');

		$lamaran_data	=	$this->Model_lamaran->by('id_pelamar', $id_pelamar)->result_array();
		$data = [
			'title' 		=> 'Status Lamaran',
			'page' 			=> 'status_lamaran',
			'lamarans' 	=> $lamaran_data					
		];


		$this->load->view('templates/user/index.php', $data);

	}


}

