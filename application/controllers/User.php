<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
    parent::__construct();

    if($this->session->userdata('role') == 2 ){
      redirect(base_url('admin'));
    }

		if($this->session->userdata('role') == 1 ){
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

	public function status_lamaran()
	{
		$this->load->model(['Model_lowongan']);

		$lowongan_data	=	$this->Model_lowongan->semua()->result_array();
		$data = [
			'title' 		=> 'Status Lamaran',
			'page' 			=> 'status_lamaran',
			'lowongans' => $lowongan_data					
		];

		$this->load->view('templates/user/index.php', $data);
		// $this->load->view('function/user/papan_jadwal.php');

	}


}

