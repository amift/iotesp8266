<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/JWT.php';

use \Firebase\JWT\JWT;

class Delete_token extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Token_model','m_data'); 
    }

    public function index_post(){
        $username=$this->input->post('username');
        $token=$this->input->post('token');
        $keyword = array('username' => $username,'token' => $token); 
        $result=$this->m_data->delete_by_keyword($keyword);
        if ($result==false) {
            $this->response([
                'status' => $result,
                'error' => 'Access denied'
            ], REST_Controller::HTTP_UNAUTHORIZED);
        }else{
            $this->response([
                'status' => true,
                'result' => 'Token successfully released',
            ], REST_Controller::HTTP_OK);            
        }
    }

}