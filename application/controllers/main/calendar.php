<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller
{

     public function __construct() {
        Parent::__construct();
        $this->load->model("calendar_model");
    }

     public function calendar($id_barang=null)
     {
         // $this->load->view("calendar/index.php", array());
           if($this->session->userdata('id_user')->role =="penyewa"){
                $data['content'] = 'calendar/index1';
                $data['id_barang'] = $id_barang;
               // $data["produk"]=$this->model_data->getBarang();
                // events : $this->calendar_model->get_events($start, $end);
                $this->load->view('main/dashboard_penyewa',$data);
            }
            if($this->session->userdata('id_user')->role =="vendor"){
                $data['content'] = 'calendar/index1';
                $data['id_barang'] = $id_barang;
            //    $data["produk"]=$this->model_data->getBarang();
                $this->load->view('main/dashboard_vendor',$data);
            }
     

    }

     public function get_events()
 {
     // Our Start and End Dates
     // $start = $this->input->get("start");
     // $end = $this->input->get("end");

     // $startdt = new DateTime('now'); // setup a local datetime
     // $startdt->setTimestamp($start); // Set the date based on timestamp
     // $start_format = $startdt->format('Y-m-d H:i:s');

     // $enddt = new DateTime('now'); // setup a local datetime
     // $enddt->setTimestamp($end); // Set the date based on timestamp
     // $end_format = $enddt->format('Y-m-d H:i:s');

    $events = $this->calendar_model->get_events();

     $data_events = array();

     foreach($events->result_array() as $r) {

         $data_events[] = array(
             "id_event" => $r['id_event'],
             "title" => $r['title'],
             "end" => $r['end'],
             "start" => $r['start']
         );
     }

     // var_dump($data_events);
     echo json_encode($data_events);
     // exit();
 }
    //  public function __construct() {
    //     Parent::__construct();
    //     $this->load->model("calendar_model");
    // }

    //  public function calendar()
    //  {
    //       $this->load->view("calendar/index.php", array());
    //  }

}
 ?>
