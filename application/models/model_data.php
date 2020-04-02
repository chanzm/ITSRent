<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data extends CI_Model 
{

  //menampilkan data barang
  public function getBarang(){

  $query=$this->db->query("SELECT * from barang join vendor on barang.id_vendor=vendor.id_user");
  	return $query->result();
  }

  public function vendor_barang(){
    $id=$this->session->userdata('id_user')->id_user;
    $query=$this->db->query("SELECT * from barang join vendor on barang.id_vendor=vendor.id_user where barang.id_vendor='$id'");
      return $query->result();
    }

  public function getDetail($id){
    //$this->db->where('id_barang',$id);
    // $query=$this->db->get('barang');
    $query = $this->db->query("SELECT * from barang b , vendor v where b.id_vendor=v.id_user and b.id_barang='$id'");
    //var_dump($query->result());
    return $query->result();
  }

  public function buat_pesanan($id_barang,$id_penyewa,$nama_barang,$jumlah_barang,$total,$tgl_pinjam,$tgl_kembali,$lama_sewa,$ambil_barang,$alamat,$ket,$status){
    $id_vendor=$this->db->query("SELECT id_vendor from barang where id_barang='$id_barang'");
    $ven = $id_vendor->row()->id_vendor;
    $query=$this->db->query("INSERT into penyewaan (id_barang,id_penyewa,id_vendor,nama_barang,jumlah_barang,total_bayar,tgl_pinjam,tgl_kembali,lama_sewa,ambil_barang,alamat,ket,status)VALUES ('$id_barang','$id_penyewa','$ven','$nama_barang','$jumlah_barang','$total','$tgl_pinjam','$tgl_kembali','$lama_sewa','$ambil_barang','$alamat','$ket','$status')");
    return;
  }

  public function getById_penyewaan($id_barang){
    $this->db->where('id_barang',$id_barang);
    // $this->db->where('id_vendor',$id_vendor);
    // $this->db->where('id_barang',$id_penyewa);
    $query=$this->db->get('penyewaan');
    return $query->result();
  }

  public function get_rinci_pesanan($id_sewa){
    $this->db->where('id_sewa',$id_sewa);
    // $this->db->where('id_vendor',$id_vendor);
    // $this->db->where('id_barang',$id_penyewa);
    $query=$this->db->get('penyewaan');
    return $query->result();
  }


  public function getRinci($id_barang,$jumlah_barang,$tgl_pinjam,$tgl_kembali,$ambil_barang,$alamat=null){
    $this->db->where('id_barang',$id_barang);
    $this->db->where('jumlah_barang',$jumlah_barang);
    $this->db->where('tgl_pinjam',$tgl_pinjam);
    $this->db->where('tgl_kembali',$tgl_kembali);
    $this->db->where('ambil_barang',$ambil_barang);
    $this->db->where('alamat',$alamat);
    $query = $this->db->get('penyewaan');
    return $query->result();
  }

  // public function fetch_poin($id_peristiwa){
  //   $query = $this->db->query("SELECT point FROM peristiwa where id_peristiwa = ".$id_peristiwa);   
  //   return $query->row()->point;
  // }

  public function getPenyewa($id_penyewa)
  {
    $query=$this->db->query("SELECT * from penyewa where id_user='".$id_penyewa."'");
    return $query->result();
    //var_dump($query);
  }

  //menampilkan data vendor
  public function getVendor($id_vendor)
  {
    $query=$this->db->query("SELECT * from vendor where id_user='".$id_vendor."'");
    return $query->result();
    //var_dump($query);
  }


  public function getStatusVendor($id_user)
  {
    $query=$this->db->query("SELECT status from vendor where id_user='".$id_user."'");
    return $query->row()->status;
    //var_dump($query->row()->status);
  }

  public function update_status_vendor($id_user,$status){
   $query = $this->db->query("UPDATE vendor SET status='$status' where id_user='$id_user'");
    return $query;
  }

  public function getAdmin($id_admin)
  {
    $query=$this->db->query("SELECT * from admin where id_user='".$id_admin."'");
    return $query->result();
    //var_dump($query);
  }

  // public function simpan_profil_vendor($id_user,$nama_ven,$telp_ven,$email_ven,$username_ven)
  // {
  //   $hasil=$this->db->query("UPDATE vendor SET nama_ven='$nama_ven',telp_ven='$telp_ven',email_ven='$email_ven',username_ven='$username_ven' where id_user='".$id_user."'");
  //   return $hasil;
  // }

 public function getId_vendor($username_ven){
  return $this->db->get_where('vendor',["username_ven" => $username_ven])->row()->id_user;
}

public function getId_penyewa($username_peny){
  return $this->db->get_where('penyewa',["username_peny" => $username_peny])->row()->id_user;
}

// public function getId_cadangan_ven($password_ven)
// {
//   $sql=$this->db->query("");
//   return $sql;
// }

 
  public function simpan_profil_vendor($id_user,$data)
  {
    $this->db->where('id_user', $id_user);
    $this->db->update('vendor', $data);
  }

  public function simpan_profil_penyewa($id_user,$data)
  {
    $this->db->where('id_user', $id_user);
    $this->db->update('penyewa', $data);
  }

  public function update_seslog($id_user,$username,$role)
  {
    $hasil=$this->db->query("UPDATE login_session SET username='$username' where role='".$role."' and id_user='".$id_user."'");
    return $hasil;
  }

  public function lihat_vendor(){
    $query = $this->db->query("SELECT * from vendor");
    return $query->result();
  }
  
  public function lihat_penyewa(){
    $query = $this->db->query("SELECT * from penyewa");
    return $query->result();
  }

  public function lihat_penyewaan(){
    $query = $this->db->query("SELECT s.id_sewa,s.id_barang,p.nama_peny,v.nama_ven,s.jumlah_barang,s.total_bayar,s.tgl_pinjam,s.tgl_kembali,s.lama_sewa,s.ambil_barang,s.alamat,s.ket,s.status from penyewaan s,vendor v,penyewa p where s.id_vendor=v.id_user and s.id_penyewa=p.id_user");
    return $query->result();
  }

  
  public function lihat_penyewaan_penyewa($id_user){
    $query = $this->db->query("SELECT s.id_sewa,s.id_penyewa,s.waktu_pemesanan,s.nama_barang,v.nama_ven,s.jumlah_barang,s.total_bayar,s.tgl_pinjam,s.tgl_kembali,s.lama_sewa,s.ambil_barang,s.alamat,s.ket,s.status from penyewaan s,vendor v where s.id_vendor=v.id_user and s.id_penyewa='$id_user'");
    //var_dump($query->result());
    return $query->result();
  }

  public function lihat_penyewaan_vendor($id_user){
    $query = $this->db->query("SELECT s.id_sewa,s.id_penyewa,s.waktu_pemesanan,s.id_barang,b.nama_barang,p.nama_peny,v.nama_ven,s.jumlah_barang,s.total_bayar,s.tgl_pinjam,s.tgl_kembali,s.lama_sewa,s.ambil_barang,s.alamat,s.ket,s.status from penyewaan s,vendor v,penyewa p,barang b where s.id_vendor=v.id_user and s.id_penyewa=p.id_user and s.id_vendor='$id_user' and b.id_barang=s.id_barang");
    return $query->result();
  }

  public function konfirmasi_sewa($id_sewa){
    $query = $this->db->query("SELECT s.id_sewa,s.waktu_pemesanan,s.id_barang,b.nama_barang,p.nama_peny,v.nama_ven,s.jumlah_barang,s.total_bayar,s.tgl_pinjam,s.tgl_kembali,s.lama_sewa,s.ambil_barang,s.alamat,s.ket,s.status from penyewaan s,vendor v,penyewa p,barang b where s.id_vendor=v.id_user and s.id_penyewa=p.id_user and s.id_sewa='$id_sewa' and b.id_barang=s.id_barang");
    return $query->result();
  }

  public function lihat_bukti($id_sewa)
  {
    $query=$this->db->query("SELECT * from penyewaan where id_sewa='".$id_sewa."'");
     //var_dump($query->result());
   return $query->result();
  }

public function vendor_kirim_barang($id_sewa){
    $query = $this->db->query("UPDATE penyewaan SET status='BARANG DIKIRIM' where id_sewa='".$id_sewa."'");
    return $query;
  }

   public function terima_barang($id_sewa){
    $query = $this->db->query("UPDATE penyewaan SET status='BARANG DITERIMA' where id_sewa='".$id_sewa."'");
    return $query;
  }

    public function kembalikan_barang($id_sewa){
    $query = $this->db->query("UPDATE penyewaan SET status='DIKEMBALIKAN PENYEWA' where id_sewa='".$id_sewa."'");
    return $query;
  }

  public function vendor_terima_barang($id_sewa){
    $query = $this->db->query("UPDATE penyewaan SET status='SELESAI' where id_sewa='".$id_sewa."'");
    return $query;
  }

  public function delete_data_peny($id_user)
  {
    $query=$this->db->query("DELETE from penyewa where id_user='$id_user'");
    return;
  }

  public function delete_data_ven($id_user)
  {
    $query=$this->db->query("DELETE from vendor where id_user='$id_user'");
    return;
  }

  public function delete_data_sewa($id_sewa)
  {
    $query=$this->db->query("DELETE from penyewaan where id_sewa='$id_sewa'");
    return;
  }

  public function terima_pesanan($id_sewa){
    $query=$this->db->query("UPDATE penyewaan set status = 'DIKONFIRMASI' where id_sewa='$id_sewa'");
    //var_dump($query);
    return;
  }

  public function tolak_pesanan($id_sewa){
    $query=$this->db->query("UPDATE penyewaan set status = 'DITOLAK' where id_sewa='$id_sewa'");
    //var_dump($query);
    return;
  }

  public function getDetailSewa($id_sewa)
  {
    $this->db->where('id_sewa',$id_sewa);
    $query = $this->db->get('penyewaan');
    return $query->result();
  }

  // public function update_status($id_sewa){
  //   $query = $this->db->query("UPDATE penyewaan SET status='SUDAH DIBAYAR' where id_sewa='".$id_sewa."'");
  //   return $query;
  // }

  public function upload_barang($nama_barang,$id_vendor,$deskripsi_barang,$jumlah_barang,$harga_barang,$foto_barang){
    $query = $this->db->query("INSERT INTO barang (nama_barang,id_vendor,deskripsi_barang,jumlah_barang,harga_barang,foto_barang) VALUES ('$nama_barang','$id_vendor','$deskripsi_barang','$jumlah_barang','$harga_barang','$foto_barang')");
    return $query;
  }

  // public function 

  public function get_barang_vendor($id_vendor,$nama_barang,$foto_barang){
      $this->db->where('id_vendor',$id_vendor);
      $this->db->where('nama_barang',$nama_barang);
      $this->db->where('foto_barang',$foto_barang);
      return $this->db->get('gambar')->result();
  }

  public function insert_image($image){
    $data = array(
      'id_vendor' => $this->input->post('id_vendor'),
      'nama_barang' => $this->input->post('nama_barang'),
      'deskripsi_barang'=> $this->input->post('deskripsi_barang'),
      'harga_barang'=>$this->input->post('harga_barang'),
      'foto_barang' => $image

     );
    $this->db->insert('barang', $data);
  }

  // public function update_status($id_sewa){
  //   $query = $this->db->query("UPDATE penyewaan SET status='SUDAH DIBAYAR' where id_sewa='".$id_sewa."'");
  //   return $query;
  // }

  // public function update_status($image,$id_sewa)
  // {
  //   $data = array(
  //     'status' => 'SUDAH DIBAYAR'
  //     /*'foto_bukti_bayar' => $image*/
  //   );

  //   $this->db->where('id_sewa', $id_sewa);
  //   return $this->db->update('penyewaan', $data);
  //   // $query = $this->db->query("UPDATE penyewaan SET status='SUDAH DIBAYAR' where id_sewa = '$id_sewa'");
  //   // return $query;
  // }

  public function update_status($image,$id_sewa)
  {
    $this->db->query("update penyewaan set status='SUDAH DIBAYAR', foto_bukti_bayar='".$image."' where id_sewa='".$id_sewa."'");
  
  }

  public function upload_daftar_ven($image,$id_user){
    $data = array(
      'status' => 1,
      'foto_bukti_byr' => $image
    );
    // $this->db->insert('vendor',$data);
    $this->db->where('id_user', $id_user);
    $this->db->update('vendor', $data);
  }
  
  public function insert_event($id_barang,$nama_peny,$tgl_pinjam,$tgl_kembali){
    $title = "Sudah disewa oleh $nama_peny";
    $data = array(
      "id_barang" => $id_barang,
      "title" => $title,
      "start" => $tgl_pinjam,
      "end" => $tgl_kembali,
      // "end_calendar" => $this->model_data->get_end_cal($tgl_kembali)
    );
    // var_dump($data);
    $this->db->insert("calendar_events",$data);
  }

  public function edit_barang($id_barang,$data){
    $this->db->where("id_barang",$id_barang);
    $this->db->update("barang",$data);
  }

  public function get_end_cal($tgl_kembali){
    $this->db->query("SELECT DATE_ADD($tgl_kembali, INTERVAL 1 DAY);");
    }  
}