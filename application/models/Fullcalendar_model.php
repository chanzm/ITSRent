<?php

class Fullcalendar_model extends CI_Model
{
 function fetch_all_event(){
  $this->db->order_by('id');
  // // $this->db->where('id_barang',$id_barang);
  return $this->db->get('calendar_events');
 // $query = $this->db->query("SELECT * from calendar_events where id_barang = $id_barang");
 // return $query->result_array();

 }
}

?>
