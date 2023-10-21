<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Token_model extends MY_Model {

	public $table_master = 'token';
	public $primary_key  = 'username';
	public $table_view   = '';	

	public function __construct(){
		parent::__construct();
	}

}

/* End of file Customer_model.php */