<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Data_model','m_data');
        $this->load->model('Device_model','m_device');
    }

    public function index(){
    	$this->load->view('home/index');
    }

    public function settings(){
      $this->load->view('home/settings');
    }

    public function about(){
      $this->load->view('home/about');
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

    public function device_name(){
      if ($this->input->is_ajax_request()) {      
        $data=$this->m_device->all_value();
        $output['status'] = true;
        $output['data'] = $data;
      }else{        
        $output['status'] = false;
        $output['message'] = 'access not permitted';
      }      
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

}