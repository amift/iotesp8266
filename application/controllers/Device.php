<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/JWT.php';

use \Firebase\JWT\JWT;

class Device extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Token_model','m_token'); 
        $this->load->model('Device_model','m_device'); 
    }

    public function index_get(){
        $this->response([
            'status' => true,
            'message' => 'Just GET response'
        ], REST_Controller::HTTP_UNAUTHORIZED);
    }

    public function index_post(){
        $username = $this->input->post('username');
        $token    = $this->input->post('token');
       
        $keyword  = array('username' => $username,'token' => $token); 
        $result=$this->m_token->get_data_by_keyword($keyword);        
        if (empty($result)){
            $this->response([
                'status' => false,
                'error' => 'Access denied'
            ], REST_Controller::HTTP_UNAUTHORIZED);
        }else{
            $data=$this->m_device->all_value();

            $this->response([
                'status' => true,
                'message' => $data
            ], REST_Controller::HTTP_OK);
        }
    }

}