<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Model_login extends CI_Model {

    function can_login($username,$password,$role)
    {
      $this->db->where('username',$username);
      $this->db->where('password',$password);
      $this->db->where('role',$role);
      $query = $this->db->get('login_session');
      if($query->num_rows() > 0){
        return true;
      }
      else{
        return false;
      }
    }

    // function adopsi_regis_vendor($username_ven,$password,$id_user)
    // {
    //   $query=$this->db->query("INSERT into login_session (username,password,role,id_user) VALUES ('$username_ven','$password','vendor',$id_user)");
    //   return $query;
    // }  
    
    public function getID($username,$role){
      $this->db->where('username',$username);
      $this->db->where('role',$role);
      $query=$this->db->get('login_session');
      return $query->row();
    }

    function adopsi_regis_vendor($username_ven,$password,$id)
    {
      $query=$this->db->query("INSERT into login_session (username,password,role,id_user) VALUES ('$username_ven','$password','vendor','$id')");
      return $query;
    }
    function adopsi_regis_penyewa($username_peny,$password,$id)
    {
      $query=$this->db->query("INSERT into login_session (username,password,role,id_user) VALUES ('$username_peny','$password','penyewa','$id')");
      return $query;
    }
  }
?>