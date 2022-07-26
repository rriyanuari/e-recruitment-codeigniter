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

		$this->load->view('templates/user/index.php', $data);
		$this->load->view('function/user/papan_jadwal.php');

	}

	public function pemesanan()
	{
		$this->load->model(['Model_pemesanan']);
		$this->load->model(['Model_pelanggan']);

		// GET ID PELANGGAN
		$username = $this->session->userdata('username');
		$id_pelanggan = $this->Model_pelanggan->by_user($username)->row_array();
		$id_pelanggan = $id_pelanggan['id_pelanggan'];

		$pemesanan_data	=	$this->Model_pemesanan->by_pelanggan($id_pelanggan);
		$data = [
			'title' 		=> 'Pemesanan',
			'page' 			=> 'pemesanan',
			'pemesanans' => $pemesanan_data		
		];
		$this->load->view('templates/user/index.php', $data);
		$this->load->view('function/user/pemesanan_tambah.php');
	}

	public function pemesanan_tambah()
	{
		$this->load->model(['Model_lapangan']);
		$this->load->model(['Model_pemesanan']);

		$tgl = "";
		$lapangan = "";
		// $tgl = date('Y-m-d');
		// $tgl = new DateTime($tgl);
		// $tgl->modify('+1 day');
		// $tgl = $tgl->format('Y-m-d');
		if($this->input->get('tgl') != "" ){
			$tgl = $this->input->get('tgl');
			$lapangan = $this->input->get('lap');
		}

		$lapangan_data	=	$this->Model_lapangan->semua()->result_array();
		$pemesanan_data	=	$this->Model_pemesanan->by_lapangan($lapangan)->result_array();
		$data = [
			'title' 		=> 'Pemesanan',
			'page' 			=> 'pemesanan_tambah',
			'lapangans' => $lapangan_data,	
			'pemesanans' => $pemesanan_data,
			'tgl' => $tgl,
			'lapangan_pesan' => $lapangan		
		];

		$this->load->view('templates/user/index.php', $data);
		$this->load->view('function/user/pemesanan_tambah.php');
	}

	public function pemesanan_proses_tambah()
	{
		$this->load->model(['Model_lapangan']);
		$this->load->model(['Model_pelanggan']);
		$this->load->model(['Model_pemesanan']);

		// GET ID PELANGGAN
		$username = $this->session->userdata('username');
		$id_pelanggan = $this->Model_pelanggan->by_user($username)->row_array();
		$id_pelanggan = $id_pelanggan['id_pelanggan'];

		$lapangan = $this->input->post('lapangan');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		$datetime = $tanggal." ".$jam.":00";
		$durasi = $this->input->post('durasi');

		// GET HARGA
			function isweekend($date){
				$date = strtotime($date);
				$date = date("l", $date);
				$date = strtolower($date);
				if($date == "saturday" || $date == "sunday") {
						return "true";
				} else {
						return "false";
				}
			}

			$data_lapangan = $this->Model_lapangan->by_lapangan($lapangan)->row_array();
			if(isweekend($tanggal)){
				if(strtotime($jam) < strtotime("16:00")){
					$harga_lapangan = $data_lapangan['weekday_siang'];
				}else{
					$harga_lapangan = $data_lapangan['weekday_malam'];
				}
			}else{
				$harga_lapangan = $data_lapangan['weekend'];
			}
			$harga = $harga_lapangan*$durasi;

		date_default_timezone_set("Asia/Jakarta");
		$data = array(
			'id_pelanggan'   	=> $id_pelanggan,
			'lapangan'   			=> $lapangan,
			'tanggal_jam'     => $datetime,
			'durasi'          => $durasi,
			'status'   				=> "pending",
			'harga'   				=> $harga,
			'tgl_pemesanan'  => date('Y-m-d H:i:s')
			);

		$insert = $this->Model_pemesanan->tambah($data,'t_pemesanan');
		if($insert){
			echo "success";
		} else{
			echo "error";
		}    
	}

	public function pemesanan_proses_hapus()
	{
		$this->load->model(['Model_pemesanan']);
		$this->load->model(['Model_user']);

		$id = $this->input->post('id');
		if($this->Model_pemesanan->hapus_by_id($id)){
			echo "success";
		} else{
			echo "error";
			
		}    
	}

	public function pemesanan_edit($id_pemesanan)
	{
		$this->load->model(['Model_pemesanan']);

		$pemesanan_data	=	$this->Model_pemesanan->by_id($id_pemesanan)->row_array();
		$data = [
			'title' 		=> 'Pemesanan',
			'page' 			=> 'pemesanan_edit',
			'pemesanan' => $pemesanan_data		
		];

		$this->load->view('templates/user/index.php', $data);
		$this->load->view('function/user/pemesanan_edit.php');
	}

	public function pemesanan_proses_edit(){
		$config['upload_path']="./public/img/bukti_bayar";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '1000';

		$this->load->library('upload', $config);
		$this->load->model(['Model_pemesanan']);

		$file = $this->input->post('file');


		if ( ! $this->upload->do_upload('file')){
				$status = "error";
				$msg = $this->upload->display_errors();
		}
		else{
				$dataupload = $this->upload->data();

				$data = array(
					'bukti_bayar'	=> $dataupload['file_name'],
					'status'			=> 'proses',
					);
				$id = $this->input->post('id');
				$where = array(
					'id_pemesanan' => $id
				);
				$this->Model_pemesanan->update_by_id($where,$data,'t_pemesanan');
				$status = "success";
				$msg = $dataupload['file_name']." berhasil diupload";
		}
		$this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
	}

	

}

