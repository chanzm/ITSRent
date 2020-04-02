<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_login');
	}
	
	public function index(){
		// $data['content'] = 'tampilan_utama';
		$data["produk"]=$this->model_data->getBarang();
		$this->load->view('tampilan_utama',$data);
		//$this->load->view('tampilan_utama');
	}

	public function klik_login(){
		$this->load->view('view_login');
	}

	public function login_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		//$this->form_validation->set_rules('role','Role','required');
		if($this->form_validation->run())
		{

			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$role=$this->input->post('role');
 			//var_dump($username,$password,$role);
			$this->load->model('model_login');
			//echo"hae";

			if($this->model_login->can_login($username,$password,$role))
			{
				$session_data = array(
					'username' => $username,
					'password' => ($password),
					'role' => $role,
					'id_user' => $this->model_login->getID($username,$role),
					// 'status_aktif' => $this->model_login->getStatus($username,$role),
					'status' => "sudahlogin"
					);
				$this->session->set_userdata($session_data);

				//echo"bujank";
				//var_dump($session_data);
				redirect(base_url() . 'login/enter');
			}
			else{
				$this->session->set_flashdata('error','Invalid Username or Password or Role');
				// redirect(base_url() . 'login/index');
				$this->load->view('view_login');
			}
		}
		else{
			$this->index();
			 
		}

	}
	
	public function enter(){
  		$username = $this->session->userdata('username');
   		if($username==""){
   		 redirect('login/index');
   		}
   		else if($this->session->userdata('role')=='admin'){
			redirect('main/dashboard_adm');
		  }
		else if($this->session->userdata('role')=='vendor'){
			redirect('main/dashboard_ven');
		  }
		else if($this->session->userdata('role')=='penyewa'){
			redirect('main/dashboard_peny');
		  }
		  else {
    		redirect('main/dashboard');
		  }
 	}
	public function logout(){
		$this->session->unset_userdata('username');
		redirect(base_url('login/index'));
	}

}

