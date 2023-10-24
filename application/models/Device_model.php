<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Device_model extends MY_Model {

	public $table_master = 'device';
	public $primary_key  = 'id';

	public function __construct(){
		parent::__construct();
	}
    
    public function all_value(){
        return $this->db->get($this->table_master)->result_array();
    }

}