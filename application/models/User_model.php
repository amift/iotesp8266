<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

	public $table_master = 'user';
	public $primary_key  = 'username';
	public $table_view   = '';

	public function __construct(){
		parent::__construct();
	}

    public function get_user_access($username){
    	$result=$this->db->query('SELECT ua.url FROM user u,user_access ua WHERE (u.username=ua.username) AND (u.username="'.$username.'")')->result();
        $options = array();
        foreach($result as $key){
        	$no++;
        	$options[]= $key->url;
        }
        return $options;
    }	
}