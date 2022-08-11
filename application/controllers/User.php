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
		$this->load->view('function/register.php');
	}

	public function profil_proses()
  {

    $this->load->model(['Model_pelamar']);
    $this->load->model(['Model_user']);

    $config['upload_path']= "./public/cv";
    $config['allowed_types'] = 'pdf';
    $config['max_size']  = '5000';
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

		$data2 = array(
			'username'       => $this->input->post('username'),
			'password'       => $this->input->post('password'),
			'role'           => 1,
		);
		
		$where2 = array(
			'id_user' => $this->session->userdata('id'),
		);

		$insert2 = $this->Model_user->update_by_id($where2, $data2, 't_user');

		if($insert2){
			$data = array(
				'nama_lengkap'        => $this->input->post('nama_lengkap'),
				'jenis_kelamin'       => $this->input->post('jenis_kelamin'),
				'jenjang_pendidikan'  => $this->input->post('jenjang_pendidikan'),
				'tgl_dibuat'          => Date('Y-m-d H:i:s')
			);

			if (!$this->upload->do_upload('file')){
				$status = "error";
				$msg = ($this->upload->display_errors());
			}else{
				$dataupload         = $this->upload->data();
				($dataupload) ? $data['cv'] = $dataupload['file_name'] : '';
			}

			$where = array(
				'id' => $this->input->post('id'),
			);
		
			$insert = $this->Model_pelamar->update_by_id($where, $data,'pelamar');

			if($insert){
				$status = "success";
				$msg = "berhasil diupload";
			}
			
		}
    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
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
	
	public function pengerjaan_tes($id_lamaran)
	{
		$this->load->model(['Model_soal']);

		$soal_data = $this->Model_soal->semua()->result_array();

		$data = [
			'title' 		=> 'Pengerjaan Tes',
			'page' 			=> 'pengerjaan_tes',
			'soals' 		=> $soal_data,					
			'id_lamaran' 		=> $id_lamaran					
		];

			$this->load->view('templates/user/index.php', $data);
			$this->load->view('function/user/soal.php');

	}

	public function proses_pengerjaan_tes()
	{
		$this->load->model(['Model_lamaran']);
		$this->load->model(['Model_pelamar']);

		$pelamar = $this->Model_pelamar->by('id_user',$this->session->userdata('id'))->row_array();

		$id_lamaran = $this->input->post('id_lamaran');
		$nilai_tes = $this->input->post('nilai');

		$data = array(
			'nilai_tes'  => $nilai_tes,
			'status_lamaran'  => 'Proses',
			'tgl_tes'  => Date('Y-m-d H:i:s'),
		);

		$where = array(
			'id' => $id_lamaran,
			'id_pelamar' => $pelamar['id'],
		);

		if($this->Model_lamaran->update_by_id($where, $data, 'lamaran')){
			echo "success";
		} else{
			echo "error";
		}
	}

	public function status_lamaran()
	{
		$this->load->model(['Model_lamaran']);
		$this->load->model(['Model_pelamar']);

		$id_user  = $this->session->userdata('id');
		$pelamar = $this->Model_pelamar->by('id_user', $id_user)->row_array();

		$lamaran_data	=	$this->Model_lamaran->status_lamaran_by('id_pelamar', $pelamar['id'])->result_array();
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

