<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/JWT.php';

use \Firebase\JWT\JWT;

class Api extends REST_Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index_post(){
        $username = $this->post('username');
        $password    = $this->post('password');
        
        $keyword  = array('username' => $username,'password' => $password); 

        
        $this->response([
            'status' => true,
            'result' => $keyword,
            'leased_time' => 7200
        ], REST_Controller::HTTP_OK);
    }

    public function index_get(){
        $this->response([
            'status' => true,
            'message' => 'hello this is API server'
        ], REST_Controller::HTTP_OK);
    }

}