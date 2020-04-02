<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Model_daftar extends CI_Model {

    public function insert_penyewa($image1,$image2){
      $data = array(
        		'id_user'=>$this->input->post('id_user'),
          	'nama_peny'=>$this->input->post('nama_peny'),
          	'telp_peny'=>$this->input->post('telp_peny'),
          	'email_peny'=>$this->input->post('email_peny'),
          	'username_peny'=>$this->input->post('username_peny'),
          	'password_peny'=>$this->input->post('password_peny'),
            'foto_peny'=> $image1,
            'upload_identitas_peny' => $image2
      );
      $this->db->insert('penyewa', $data);
    }

    public function insert_vendor($image1,$image2)
    {
      $data = array (
        'id_user'=>$this->input->post('id_user'),
        'nama_ven'=>$this->input->post('nama_ven'),
        'telp_ven'=>$this->input->post('telp_ven'),
        'email_ven'=>$this->input->post('email_ven'),
        'bank_ven' => $this->input->post('bank_ven'),
        'no_rek_ven'=>$this->input->post('no_rek_ven'),
        'username_ven'=>$this->input->post('username_ven'),
        'password_ven'=>$this->input->post('password_ven'),
        'foto_ven'=> $image1,
        'upload_identitas_ven' => $image2
      );
      $this->db->insert('vendor', $data);
    }

    // function panggil_id_penyewa($username,$password)
    // {
    //   $query=$this->db->query("SELECT p.id_user from penyewa p,login_session ls where p.username_peny='.$username.' and p.password_peny='.$password.' and ls.role='penyewa'");
    //   // $hasil= $this->db->query("INSERT into login_session (username,password,role,id_user) VALUES ('$username','$password','penyewa','$query')");
    //   // return $hasil;
    //   var_dump($query);
    // }

  }
?>