
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fullcalendar extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('fullcalendar_model');
 }

 function index()
 {
  $this->load->view('fullcalendar');
 }

 function load()
 {
  $event_data = $this->fullcalendar_model->fetch_all_event();
  foreach($event_data->result_array() as $row)
  {
   $data[] = array(
    'id' => $row['id'],
    'title' => $row['title'],
    'start' => $row['start'],
    'end' => $row['end']
   );
  }
  echo json_encode($data);
 }


}

?>