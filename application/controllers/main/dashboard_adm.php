<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_adm extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
    }
    
    public function index()
	{	
		$data['content'] = 'main/dash_admin_awal';
		$this->load->view('main/dashboard_admin',$data);
	}
    
    public function data_profil_admin()
	{
		$data['content'] = 'main/profil_admin';
		$data['admin']=$this->model_data->getAdmin($this->session->userdata('id_user')->id_user);
		$this->load->view('main/dashboard_admin',$data);	
	}

	public function data_vendor(){
		$data['vendor'] = $this->model_data->lihat_vendor();
		$this->load->view('main/admin/data_vendor',$data);
	}

	public function data_penyewa(){
		$data['penyewa'] = $this->model_data->lihat_penyewa();
		$this->load->view('main/admin/data_penyewa',$data);
	}

	public function data_penyewaan()
	{
		$data['content'] = 'main/admin/data_penyewaan';
		$data['admin'] = $this->model_data->lihat_penyewaan();
		$this->load->view('main/dashboard_admin',$data);
	}

	public function hapus_penyewa($id_user)
	{
		// $username = $this->session->userdata('username');
		// if($username==""){
	   	// 	$this->load->view('view_login');
	  	// }
			$this->model_data->delete_data_peny($id_user);
			redirect('main/dashboard_adm/data_penyewa');
	}

	public function hapus_vendor($id_user)
	{
		$this->model_data->delete_data_ven($id_user);
		redirect('main/dashboard_adm/data_vendor');
	}

	public function hapus_penyewaan($id_sewa)
	{
		$this->model_data->delete_data_sewa($id_sewa);
		redirect('main/dashboard_adm/data_penyewaan');
	}

	public function edit_vendor($id_user){ 
		$role="vendor";
		$nama_vendor=$this->input->post('nama_ven');
		$telp_vendor=$this->input->post('telp_ven'); 
		$username_ven=$this->input->post('username_ven'); 
		$email_vendor=$this->input->post('email_ven'); 
		$status_vendor=$this->input->post('status'); 

		$data_update=array(
		"nama_ven"=>$nama_vendor,
		"telp_ven"=>$telp_vendor,
		"username_ven"=>$username_ven,
		"email_ven"=>$email_vendor,
		"status"=>$status_vendor
		);

		$this->model_data->simpan_profil_vendor($id_user,$data_update);
		$this->model_data->update_seslog($id_user,$username_ven,$role);
		redirect('main/dashboard_adm/data_vendor');
	}

	public function update_data_penyewa($id_user){
		$role="penyewa";
		$nama_peny=$this->input->post('nama_peny');
		$telp_peny=$this->input->post('telp_peny'); 
		$email_peny=$this->input->post('email_peny'); 
		$username_peny=$this->input->post('username_peny'); 

		$data_update=array(
		"nama_peny"=>$nama_peny,
		"telp_peny"=>$telp_peny,
		"email_peny"=>$email_peny,
		"username_peny"=>$username_peny
		);

		$this->model_data->simpan_profil_penyewa($id_user,$data_update);
		//$this->model_data->update_seslog($id_user,$username_peny,$this->session->userdata("role"));
		$this->model_data->update_seslog($id_user,$username_peny,$role);
		redirect('main/dashboard_adm/data_penyewa');	
	}
	
}