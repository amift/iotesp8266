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
        $data=$this->m_device->stat_value();
        print_r($data);
        die();
        $this->response([
            'status' => true,
            'message' => 'Just GET response '.$data
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
            $data=$this->m_device->stat_value();
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    public function active_post(){
        $username = "admin";
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0b2tlbl90aW1lIjoxNjk3OTUyNjQ2LCJ1c2VybmFtZSI6ImFkbWluIiwibmFtZSI6IkFkbWluaXN0cmF0b3IiLCJpcCI6IjEyNy4wLjAuMSJ9.XAygF7XCQ7WEStQ29fHqqOppZw_j2hGF5pY0EPICl4U";
        $id = $this->input->post('id');
       
        $keyword  = array('username' => $username,'token' => $token); 
        $result=$this->m_token->get_data_by_keyword($keyword);        
        if (empty($result)){
            $this->response([
                'status' => false,
                'error' => 'Access denied'
            ], REST_Controller::HTTP_UNAUTHORIZED);
        }else{
            $this->m_device->set_status_active($id);
            $this->response([
                'status' => true,
                'message' => 'success '
            ], REST_Controller::HTTP_OK);
        }
    }

    public function nonactive_post(){
        $username = "admin";
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0b2tlbl90aW1lIjoxNjk3OTUyNjQ2LCJ1c2VybmFtZSI6ImFkbWluIiwibmFtZSI6IkFkbWluaXN0cmF0b3IiLCJpcCI6IjEyNy4wLjAuMSJ9.XAygF7XCQ7WEStQ29fHqqOppZw_j2hGF5pY0EPICl4U";
        $id = $this->input->post('id');
       
        $keyword  = array('username' => $username,'token' => $token); 
        $result=$this->m_token->get_data_by_keyword($keyword);        
        if (empty($result)){
            $this->response([
                'status' => false,
                'error' => 'Access denied'
            ], REST_Controller::HTTP_UNAUTHORIZED);
        }else{
            $this->m_device->set_status_nonactive($id);
            $this->response([
                'status' => true,
                'message' => 'success '
            ], REST_Controller::HTTP_OK);
        }
    }

    public function updatename_post(){
        $username = "admin";
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0b2tlbl90aW1lIjoxNjk3OTUyNjQ2LCJ1c2VybmFtZSI6ImFkbWluIiwibmFtZSI6IkFkbWluaXN0cmF0b3IiLCJpcCI6IjEyNy4wLjAuMSJ9.XAygF7XCQ7WEStQ29fHqqOppZw_j2hGF5pY0EPICl4U";
        $id = $this->input->post('id');
        $name = $this->input->post('name');
       
        $keyword  = array('username' => $username,'token' => $token); 
        $result=$this->m_token->get_data_by_keyword($keyword);        
        if (empty($result)){
            $this->response([
                'status' => false,
                'error' => 'Access denied'
            ], REST_Controller::HTTP_UNAUTHORIZED);
        }else{
            $this->m_device->update_name($id, $name);
            $this->response([
                'status' => true,
                'message' => 'success '
            ], REST_Controller::HTTP_OK);
        }
    }

}