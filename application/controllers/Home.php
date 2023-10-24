<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Data_model','m_data');
    }

    public function index(){
    	$this->load->view('home/index');
    }

    public function settings(){
      $this->load->view('home/settings');
    }



    public function status(){
      if ($this->input->is_ajax_request()) {      
     		$data=$this->m_data->all_value();
      	$output['status'] = true;
      	$output['data'] = $data;
      }else{      	
      	$output['status'] = false;
      	$output['message'] = 'access not permitted';
      }      
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

}