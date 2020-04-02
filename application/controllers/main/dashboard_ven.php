<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_ven extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{	
		$data['content'] = 'main/dash_awal_ven';
		$this->load->view('main/dashboard_vendor',$data);	
		//$this->load->view('main/profil_penyewa');	
	}
	
	public function data_profil_vendor()
	{
		// $data["penyewa"]=$this->model_data->getPenyewa($id_penyewa);
		// $this->load->view('main/profil_penyewa',$data);	
		$data['content'] = 'main/profil_vendor';
		//$id_vendor=$this->uri->segment('4');
		$data['vendor']=$this->model_data->getVendor($this->session->userdata('id_user')->id_user);
		$this->load->view('main/dashboard_vendor',$data);	
		//var_dump($data);
	}

	public function update_vendor()
	{
		$id_user=$this->input->post('id_vendor');
		$nama_ven=$this->input->post('nama_ven');
		$telp_ven=$this->input->post('telp_ven');
		$email_ven=$this->input->post('email_ven');
		$username=$this->input->post('username_ven');
		//$id_user=$this->model_data->getId_vendor($username_ven);
		//$id_user=$this->model_data->getVendor($id_vendor);
		$data=array(
			"id_user"=>$id_user,
			"nama_ven"=>$nama_ven,
			"telp_ven"=>$telp_ven,
			"email_ven"=>$email_ven,
			"username_ven"=>$username
		);
		//$this->model_data->simpan_profil_vendor($id_user,$data);
		$this->model_data->simpan_profil_vendor($id_user,$data);
		//var_dump($data);
		// $this->model_data->update_seslog($id_user,$username);
		$this->model_data->update_seslog($id_user,$username,$this->session->userdata("role"));
		redirect('main/dashboard_ven/data_profil_vendor/'.$id_user.'');
	}

	//cek status 0 ato 1
	public function cek_status_upload(){
		// $this->load->view('main/upload_barang');
		$data= $this->model_data->getStatusVendor($this->session->userdata('id_user')->id_user);
		 if($data == 1){
			redirect ('main/dashboard_ven/upload_barang');
		}
		 else if ($data == 0){
			 redirect('main/dashboard_ven/belum_aktif');
		 }
		 else{
			 redirect('main/dashboard_ven/akun_nonaktif');
		 }
	}

	public function aktifasi_akun(){
		$status= $this->model_data->getStatusVendor($this->session->userdata('id_user')->id_user);
		if($status=="0"){
			$data['content']='main/vendor/belum_aktif';
			$this->load->view('main/dashboard_vendor',$data);
		}
		else if($status=='1'){
			$data['content']='main/vendor/akun_aktif';
			$this->load->view('main/dashboard_vendor',$data);
		}
		else if($status==2){
			$data['content'] = 'main/vendor/akun_nonaktif';
			$this->load->view('main/dashboard_vendor',$data);
		}
	}

	public function nonaktifkan_akun(){
		$this->model_data->update_status_vendor($this->session->userdata('id_user')->id_user,2);
		$data['content']='main/vendor/berhasil_aktifasi';
		$this->load->view('main/dashboard_vendor',$data);
	}

	public function aktifkan_akun(){
		$this->model_data->update_status_vendor($this->session->userdata('id_user')->id_user,1);
		$data['content']='main/vendor/berhasil_aktif';
		$this->load->view('main/dashboard_vendor',$data);
	}

	public function belum_aktif(){
		$data['content'] = 'main/vendor/belum_aktif';
		$uploaddir = './assets/img/vendor/bayar_daftar/';
		$uploadfile = $uploaddir . basename($_FILES['foto_bukti_byr']['name']);

        if (move_uploaded_file($_FILES['foto_bukti_byr']['tmp_name'], $uploadfile)) {
           // echo "File is valid, and was successfully uploaded.\n";
             $this->model_data->upload_daftar_ven($_FILES['foto_bukti_byr']['name'],$this->session->userdata('id_user')->id_user);
        } else {
            echo "Ukuran File terlalu besar!\n";
		}
		redirect('main/dashboard_ven');
	}


	public function akun_nonaktif(){
		$data['content'] = 'main/vendor/akun_nonaktif';
		$this->load->view('main/dashboard_vendor',$data);
	}


	public function upload_barang(){
		$data['content'] = 'main/vendor/upload_barang';
		$this->load->view('main/dashboard_vendor',$data);
	}

	public function penyewaan()
	{
		$data['content'] = 'main/vendor/data_penyewaan';
		$data['vendor'] = $this->model_data->lihat_penyewaan_vendor($this->session->userdata('id_user')->id_user);
		$this->load->view('main/dashboard_vendor',$data);
		//var_dump($this->session->userdata('id_user')->id_user);
	}

	public function konfirmasi($id_sewa){
		$data['content'] = 'main/vendor/konfirmasi_penyewaan';
		$data['sewa'] = $this->model_data->konfirmasi_sewa($id_sewa);
		$this->load->view('main/dashboard_vendor',$data);
	}

	public function bukti_bayar($id_sewa){
		$data['content'] = 'main/vendor/lihat_bukti_bayar';
		$data['sewa'] = $this->model_data->lihat_bukti($id_sewa);
		$this->load->view('main/dashboard_vendor',$data);

	}

	// public function lihat_bukti($id_sewa){
	// 	//$data['content'] = 'main/vendor/konfirmasi_penyewaan';
	// 	$data['sewa'] = $this->model_data->lihat_bukti($id_sewa);
	// 	$this->load->view('main/dashboard_vendor',$data);
	// }


	public function terima_pesanan($id_sewa,$id_barang,$nama_peny,$tgl_pinjam,$tgl_kembali){
		$data['content'] = 'main/vendor/terima_pesanan';
		$this->model_data->terima_pesanan($id_sewa);
		$this->model_data->insert_event($id_barang,$nama_peny,$tgl_pinjam,$tgl_kembali);
		$this->load->view('main/dashboard_vendor',$data);
	}

	public function tolak_pesanan($id_sewa){
		$data['content'] = 'main/vendor/tolak_pesanan';
		$this->model_data->tolak_pesanan($id_sewa);
		$this->load->view('main/dashboard_vendor',$data);
	} 

	public function edit_barang($id_barang){
		$data['content'] = 'main/vendor/edit_barang';
		$data['barang'] = $this->model_data->getDetail($id_barang);
		$this->load->view('main/dashboard_vendor',$data);
	}

	public function update_barang(){
		$id_barang=$this->input->post('id_barang');
		$nama_barang=$this->input->post('nama_barang');
		$deskripsi_barang=$this->input->post('deskripsi_barang');
		$harga_barang=$this->input->post('harga_barang');
		$data=array(
			"id_barang"=>$id_barang,
			"nama_barang"=>$nama_barang,
			"deskripsi_barang"=>$deskripsi_barang,
			"harga_barang"=>$harga_barang
		);
		$this->model_data->edit_barang($id_barang,$data);
		redirect('main/barang/detail/'.$id_barang);
	}

	public function kembalikan_barang($id_sewa){
        $this->model_data->vendor_terima_barang($id_sewa);
        redirect('main/dashboard_ven');
    }

}