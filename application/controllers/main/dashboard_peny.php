<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_peny extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library("session");
	}

	public function index()
	{	
		$data['content'] = 'main/dash_awal_peny';
		$this->load->view('main/dashboard_penyewa',$data);	
		//$this->load->view('main/profil_penyewa');	
	}
	
	public function data_profil_peny()
	{
		// $data["penyewa"]=$this->model_data->getPenyewa($id_penyewa);
		// $this->load->view('main/profil_penyewa',$data);	
		$data['content'] = 'main/profil_penyewa';
		//$id_penyewa=$this->uri->segment('4');
		$data['penyewa']=$this->model_data->getPenyewa($this->session->userdata('id_user')->id_user);
		//var_dump($this->session->userdata("id_user"));
		$this->load->view('main/dashboard_penyewa',$data);	
	}

	public function update_penyewa()
	{
		$id_user=$this->input->post('id_penyewa');
		$nama_peny=$this->input->post('nama_peny');
		$telp_peny=$this->input->post('telp_peny');
		$email_peny=$this->input->post('email_peny');
		$username=$this->input->post('username_peny');
		$data=array(
			"id_user"=>$id_user,
			"nama_peny"=>$nama_peny,
			"telp_peny"=>$telp_peny,
			"email_peny"=>$email_peny,
			"username_peny"=>$username
		);
		$this->model_data->simpan_profil_penyewa($id_user,$data);
		//var_dump($data);
		//$this->model_data->update_seslog($id_user,$username);
		$this->model_data->update_seslog($id_user,$username,$this->session->userdata("role"));
		redirect('main/dashboard_peny/data_profil_peny/'.$id_user.'');
	}

	public function history_pesanan(){
		$data['content'] = 'main/penyewa/history';
		$data['history'] = $this->model_data->lihat_penyewaan_penyewa($this->session->userdata('id_user')->id_user);
		$this->load->view('main/dashboard_penyewa',$data);
	}

	// public function trial()
	// {
	// 	var_dump($this->session->userdata("id_user"));
	// }
	
}