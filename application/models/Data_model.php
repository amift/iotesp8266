<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends MY_Model {

	public $table_master = 'pzem';
	public $primary_key  = 'id';

	public function __construct(){
		parent::__construct();
	}
    
    public function all_value(){
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get($this->table_master)->row();
    }

}