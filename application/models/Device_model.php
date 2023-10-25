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

    public function stat_value(){
        $this->db->select('status');
        $this->db->order_by('id');
        $data=$this->db->get($this->table_master)->result_array();
        $rest = '';
        foreach ($data as $key) {
        	if ( $key['status'] == 'on' ) {
        		$rest .= 'A';
        	}else{
        		$rest .= 'N';
        	}
        }
        return $rest;
    }

    public function set_status_active($id){
        $this->db->where(['id' => $id])->update($this->table_master, ['status' => 'on']);
    }

    public function set_status_nonactive($id){
        $this->db->where(['id' => $id])->update($this->table_master, ['status' => 'off']);
    }

}