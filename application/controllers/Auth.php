<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('model_auth');
  }

  public function register()
  {
    if($this->session->userdata('login')){
			redirect(base_url());
    }

    if($this->session->userdata('role') == 2 ){
      redirect(base_url('admin'));
    }
    
    $this->load->view('pages/register.php');
    $this->load->view('function/register.php');
  }

  public function register_proses()
  {
    if($this->session->userdata('login')){
			redirect(base_url());
    }

    if($this->session->userdata('role') == 2 ){
      redirect(base_url('admin'));
    }

      $this->load->model(['Model_pelanggan']);
      $this->load->model(['Model_user']);

      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $email    = $this->input->post('email');
      $hp       = $this->input->post('hp');
      $jeniskelamin = $this->input->post('jeniskelamin');
  
      $data = array(
        'pelanggan'       => $username,
        'email'           => $email,
        'no_hp'           => $hp,
        'jenis_kelamin'   => $jeniskelamin,
        'tgl_bergabung'   => Date('Y-m-d H:i:s')
        );
      
      $insert = $this->Model_pelanggan->tambah($data,'t_pelanggan');
      if($insert){
        $data2 = array(
          'username'       => $username,
          'password'       => $password,
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

	public function login()
	{
    if($this->session->userdata('logged_in')){
			redirect(base_url());
    }
    
      $this->load->view('pages/login.php');
      $this->load->view('function/login.php');
	}

  public function loginProses(){      

    $username = $this->input->post('user');
    $password = $this->input->post('pass');
    // $password = md5($password);

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
    redirect(base_url("login"));
  }
}
