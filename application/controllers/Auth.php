<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('model_auth');
  }

  public function register()
  {
    if($this->session->userdata('logged_in')){
			redirect(base_url());
    }

    if($this->session->userdata('role') == 2 ){
      redirect(base_url('admin'));
    }

    $data = [
			'title' 		=> 'Daftar Akun',
			'page' 			=> 'register'			
		];

    $this->load->view('templates/user/index.php', $data);
    $this->load->view('function/register.php');
  }

  public function register_proses()
  {

    $this->load->model(['Model_pelamar']);
    $this->load->model(['Model_user']);

    $config['upload_path']= "./public/cv";
    $config['allowed_types'] = 'pdf';
    $config['max_size']  = '5000';
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('file')){
      $status = "error";
      $msg = ($this->upload->display_errors());
    } 
    else {
      $data2 = array(
        'username'       => $this->input->post('username'),
        'password'       => $this->input->post('password'),
        'role'           => 1,
        );
      $insert2 = $this->Model_user->tambah($data2,'t_user');
      $last_id = $this->db->insert_id();

      if($insert2){
        $dataupload         = $this->upload->data();
        $data = array(
          'id_user'             => $last_id,
          'nama_lengkap'        => $this->input->post('nama_lengkap'),
          'jenis_kelamin'       => $this->input->post('jenis_kelamin'),
          'jenjang_pendidikan'  => $this->input->post('jenjang_pendidikan'),
          'cv'                  => $dataupload['file_name'],
          'tgl_dibuat'          => Date('Y-m-d H:i:s')
          );
        $insert = $this->Model_pelamar->tambah($data,'pelamar');

        if($insert){
          $status = "success";
          $msg = "berhasil diupload";
        }
      }
    }
    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
  }

	public function login()
	{
    if($this->session->userdata('logged_in')){
			redirect(base_url());
    }

    $data = [
			'title' 		=> 'Login',
			'page' 			=> 'login'			
		];
    
    $this->load->view('templates/user/index.php', $data);
    $this->load->view('function/login.php');
	}

  public function loginProses()
  {      

    $username = $this->input->post('user');
    $password = $this->input->post('pass');

    $user = $this->model_auth->login($username, $password);
    if(!empty($user)){
      $session_data = array(
          'id'        => $user->id_user,
          'username'  => $user->username,
          'role'      => $user->role,
          'logged_in' => TRUE
      );
      $this->session->set_userdata($session_data);
      echo "success";
    } else{
      echo "error";
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }
}
