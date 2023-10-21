<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/JWT.php';

use \Firebase\JWT\JWT;

class Get_token extends REST_Controller{
 
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model','m_data'); 
        $this->load->model('Token_model','m_token'); 
    }

    public function index_post(){
        // time() + (7 * 24 * 60 * 60)
        // 7 days; 24 hours; 60 mins; 60 secs                    

        $username=$this->post('username');
        $password=$this->post('password');
        
        // $hashed_password=hash( 'sha256', $password.$this->config->item('mf_salt') );
        $hashed_password=md5($password);
        $keyword = array('username' => $username, 'password' => $hashed_password); 
        $user=$this->m_data->get_data_by_keyword($keyword);
        if (empty($user)){
            $this->response([
                'status' => false,
                'error' => 'Invalid Authorized'
            ], REST_Controller::HTTP_UNAUTHORIZED);
        }else{
            $payload = array(
                'token_time' => time() + (24 * 60 * 60), // (24 * 60 * 60), // 24 JAM
                'username' => $user->username,
                'name' => $user->name,
                'ip' => $this->input->ip_address()
            );
            $token = JWT::encode($payload, $this->config->item('jwt_key'));
            $this->m_token->insert(['username' => $user->username,'token' => $token]);
            $this->response([
                'status' => true,
                'data' => [
                            'username' => $user->username,
                            'token' => $token
                            // 'hasil' => $decoded = JWT::decode($token, $this->config->item('jwt_key'), array($this->config->item('jwt_algorithm')) )
                          ]
            ], REST_Controller::HTTP_OK);
        }
    }

}