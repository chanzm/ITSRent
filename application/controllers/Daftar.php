<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {	

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_daftar');
		$this->load->model('Model_login');
	}
	
	public function index(){
		$this->load->view('pilih_daftar');
	}

	public function daftar_penyewa(){
		$data['content'] = 'pilih_daftar';
		$uploaddir1 = './assets/img/penyewa/profil/';
		$uploadfile1 = $uploaddir1 . basename($_FILES['foto_peny']['name']);

		$uploaddir2 = './assets/img/penyewa/identitas/';
		$uploadfile2 = $uploaddir2 . basename($_FILES['upload_identitas_peny']['name']);
		
		$username_peny=$this->input->post('username_peny');
		$password=$this->input->post('password_peny');

        echo '<pre>';
		if ( (move_uploaded_file($_FILES['foto_peny']['tmp_name'], $uploadfile1)) && (move_uploaded_file($_FILES['upload_identitas_peny']['tmp_name'], $uploadfile2)) )
		{
            //echo "File is valid, and was successfully uploaded.\n";
             $this->Model_daftar->insert_penyewa($_FILES['foto_peny']['name'],$_FILES['upload_identitas_peny']['name']);
        } else {
            echo "Possible file upload attack!\n";
		}
		
		//echo "lala";
		redirect('daftar/nyari_id_penyewa/'.$username_peny.'/'.$password.'');

        // echo 'Here is some more debugging info:';
        //  print_r($_FILES);

        // print "</pre>";
        //redirect ('main/dashboard_ven');
	}

	public function daftar_vendor(){
		$data['content'] = 'pilih_daftar';
		$uploaddir1 = './assets/img/vendor/profil/';
		$uploadfile1 = $uploaddir1 . basename($_FILES['foto_ven']['name']);

		$uploaddir2 = './assets/img/vendor/identitas/';
		$uploadfile2 = $uploaddir2 . basename($_FILES['upload_identitas_ven']['name']);
		
		$username_ven=$this->input->post('username_ven');
	 	$password=$this->input->post('password_ven');

        echo '<pre>';
		if ( (move_uploaded_file($_FILES['foto_ven']['tmp_name'], $uploadfile1)) && (move_uploaded_file($_FILES['upload_identitas_ven']['tmp_name'], $uploadfile2)) )
		{
            //echo "File is valid, and was successfully uploaded.\n";
             $this->Model_daftar->insert_vendor($_FILES['foto_ven']['name'],$_FILES['upload_identitas_ven']['name']);
        } else {
            echo "Possible file upload attack!\n";
		}
		
		//echo "lala";
		redirect('daftar/nyari_id_vendor/'.$username_ven.'/'.$password.'');

        // echo 'Here is some more debugging info:';
        //  print_r($_FILES);

        // print "</pre>";
        //redirect ('main/dashboard_ven');
	}

	public function nyari_id_vendor($username,$password)
	{
		$id=$this->model_data->getId_vendor($username);
		$this->Model_login->adopsi_regis_vendor($username,$password,$id); //masuk session login
		redirect('login/klik_login');
		//var_dump($id);
	}

	public function nyari_id_penyewa($username,$password)
	{
		$id=$this->model_data->getId_penyewa($username);
		$this->Model_login->adopsi_regis_penyewa($username,$password,$id); //masuk session login
		redirect('login/klik_login');
		//var_dump($username);
	}

}