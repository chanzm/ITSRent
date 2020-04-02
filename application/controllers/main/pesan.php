<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_data');
    }

	public function index()
	{
        $this->load->view("main/barang/sewa_barang");
    }

    public function form_pesan($id_barang=null){
        // $data["produk"]=$this->model_data->getDetail($id_barang);
        // $this->load->view("main/pesan/form_pesan", $data);
        $role = $this->session->userdata('role');
        if($role=="penyewa"){
            $data['content'] = 'main/pesan/form_pesan';
            $data["produk"]=$this->model_data->getDetail($id_barang);
            $this->load->view('main/dashboard_penyewa',$data);
        }
        if($role=="vendor"){
            $data['content'] = 'main/pesan/form_pesan';
            $data["produk"]=$this->model_data->getDetail($id_barang);
            $this->load->view('main/dashboard_vendor',$data);
        }
        
    }

    public function buat_pesanan(){

        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $harga_barang = $this->input->post('harga_barang');
        $tgl_pinjam = $this->input->post('tgl_pinjam');
        $tgl_kembali = $this->input->post('tgl_kembali');
        $ambil_barang = $this->input->post('ambil_barang');
       // $alamat = $this->input->post('alamat');
        $ket = $this->input->post('ket');
        $total=$harga_barang*$jumlah_barang;
        $datetime1 = new DateTime($tgl_kembali);
        $datetime2 = new DateTime($tgl_pinjam);
        $difference = $datetime1->diff($datetime2);
        $lama_sewa= $difference->days;
        $status="BELUM DIKONFIRMASI";
        if($ambil_barang=="Diambil di tempat penyedia"){
            $alamat = "";
        }
        else {
            $alamat = $this->input->post('alamat');
        }
        // $data=array(
        //     "id_barang"=>$id_barang,
        //     "nama_barang"=>$nama_barang,
        //     "jumlah_barang"=>$jumlah_barang,
        //     "total_bayar"=>$total,
        //     "tgl_pinjam"=>$tgl_pinjam,
        //     "tgl_kembali"=>$tgl_kembali,
        //     "lama_sewa" => $lama_sewa,
        //     "ambil_barang"=>$ambil_barang,
        //     "alamat"=>$alamat,
        //     "ket"=>$ket,
        //     "status"=>$status
        // );
        $id_penyewa=$this->session->userdata('id_user')->id_user;
        //var_dump($id_penyewa);
         $this->model_data->buat_pesanan($id_barang,$id_penyewa,$nama_barang,$jumlah_barang,$total,$tgl_pinjam,$tgl_kembali,$lama_sewa,$ambil_barang,$alamat,$ket,$status);
        //$this->model_data->hitung_total($jumlah_barang,$harga_barang);
        redirect('main/pesan/nyari_id_sewa/'.$id_barang.'/'.$jumlah_barang.'/'.$tgl_pinjam.'/'.$tgl_kembali.'/'.$ambil_barang.'/'.$alamat.'');
       // var_dump($data);
    }

    public function nyari_id_sewa($id_barang,$jumlah_barang,$tgl_pinjam,$tgl_kembali,$ambil_barang,$alamat=null)
	{
        $data['content'] = 'main/pesan/berhasil';
        $data["rincian_pesan"]=$this->model_data->getRinci($id_barang,$jumlah_barang,$tgl_pinjam,$tgl_kembali,$ambil_barang,$alamat);
        $this->load->view('main/dashboard_penyewa',$data);
		//var_dump($rinci);
    }
    
    public function detail_pesanan_penyewa($id_sewa){
        $data['content'] = 'main/pesan/detail_pesanan';
        $data["rincian_pesan"]=$this->model_data->get_rinci_pesanan($id_sewa);
        $this->load->view('main/dashboard_penyewa',$data);
    }

    public function detail_pesanan($id_barang){
        $data["produk"]=$this->model_data->getById_penyewaan($id_barang);
        $this->load->view('main/pesan/detail_pesanan',$data);
    }

    public function konfirmasi_bayar($id_sewa)
    {
        $data['content'] = 'main/pesan/konfirmasi_bayar';
        $data["sewa"]=$this->model_data->getDetailSewa($id_sewa);
        $this->load->view('main/dashboard_penyewa',$data);
    }

    public function berhasil_pesan(){
        $data['content'] = 'main/pesan/berhasil_pesan';
        $this->load->view('main/dashboard_penyewa',$data);
    }

    // public function detail_pesanan($id_barang,$id_vendor,$id_penyewa){
    //     $data["produk"]=$this->model_data->getById_penyewaan($id_barang,$id_vendor,$id_penyewa);
    //     $this->load->view('main/pesan/detail_pesanan',$data);
    // }

    public function upload_bukti()
    {
        $uploaddir = './assets/img/penyewaan/';
        $uploadfile = $uploaddir . basename($_FILES['foto_bukti_bayar']['name']);
        $id_sewa = $this->input->post('id_sewa');
        //$image nya mana bosqu,
        $image=$uploadfile;
        // echo '<pre>';
        if (move_uploaded_file($_FILES['foto_bukti_bayar']['tmp_name'], $uploadfile)) {
            // echo "File is valid, and was successfully uploaded.\n";
            // $this->model_data->update_status($_FILES['foto_bukti_bayar']['name'], $id_sewa);
            //var_dump($id_sewa);
            $this->model_data->update_status($image,$id_sewa);
        } else {
            echo "Ukuran File terlalu besar!\n";
        }

        // echo 'Here is some more debugging info:';
        // print_r($_FILES);

        // print "</pre>";
        //s$this->model_data->update_status($id_sewa);
         redirect('main/pesan/dashboard_peny/');

    }

    public function lakukan_pengiriman($id_sewa)
    {
         $this->model_data->vendor_kirim_barang($id_sewa);
        redirect('main/dashboard_ven');
    }

    public function terima_barang($id_sewa){
        $this->model_data->terima_barang($id_sewa);
        redirect('main/dashboard_peny/history_pesanan');
    }

    public function kembalikan_barang($id_sewa){
        $this->model_data->kembalikan_barang($id_sewa);
        //var_dump($id_sewa);
        redirect('main/dashboard_peny/history_pesanan');
    }

    // public function upload_bukti() {
    //     // $id = $this->session->userdata('id_user')->id_user;

    //     $config['upload_path']         = './assets/img/penyewaan/';  // foler upload 
    //     $config['allowed_types']        = 'gif|jpg|png'; // jenis file
    //     $config['max_size']             = 3000;
    //     $config['max_width']            = 1024;
    //     $config['max_height']           = 768;

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('foto_bukti_bayar')) {
    //         return $this->upload->data("file_name");
    //     }
        
    //     echo 'gagal';
    //     // else
    //     // {
    //     //     //tampung data dari form
    //     //     $id = $this->input->post('id_sewa');
    //     //     $gambar = $file['file_name'];

    //     //     var_dump($gambar,$id);
    //     //     //$this->model_data->upload_bukti_bayar_sewa($gambar,$id);
    //     //     //$this->session->set_flashdata('msg','data berhasil di update');
    //     //     // redirect('product');
    //     //  }
        
    //     // $data['tampil']=$this->product_m->get_by_id($id); 
    //     // $this->load->view('productedit',$data);
    //   }
}