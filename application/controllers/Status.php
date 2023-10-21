<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/JWT.php';

use \Firebase\JWT\JWT;

class Status extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Token_model','m_data'); 
    }

    public function index_post(){
        $username = $this->input->post('username');
        $token    = $this->input->post('token');
        
        $keyword  = array('username' => $username,'token' => $token); 
        $result=$this->m_data->get_data_by_keyword($keyword);
        if (empty($result)){
            $this->response([
                'status' => false,
                'error' => 'Access denied'
            ], REST_Controller::HTTP_UNAUTHORIZED);
        }else{
            $result = $decoded = JWT::decode($result->token, $this->config->item('jwt_key'), array($this->config->item('jwt_algorithm')) );
            $this->response([
                'status' => true,
                'result' => $result
            ], REST_Controller::HTTP_OK);
        }
    }

}