<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* class       = MY_MODEL
* by          = miftahul (a.k.a) amift 
* email       = miftahul81@gmail.com
* year        = 2018
* change logs = 2018, 3-april-2018
*
* an implementation or Sample basic model for all CRUD operation. 
*
* :: SAMPLE ::
*
*        class Name_model extends MY_Model {
*
*            public $table_master = 'payroll';           // table name
*            public $primary_key  = 'id';                // primary key of the table name
*            public $table_view   = 'payroll_view';      // optional mysql view for easiest relational database implementation
*
*            public function __construct(){
*                parent::__construct();
*            }
*
*        }
*/
class MY_Model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function switch_table(){
        if (!empty($this->table_view)) {
            $this->table=$this->table_view;
        }else{
            $this->table=$this->table_master;
        }
    }

    // CRUD  - START
    public function insert($post_data){
        $this->table=$this->table_master;
        $this->db->insert($this->table, $post_data);
    }

   public function get_data_by_id($id,$fields=null){
        $this->switch_table();
        if ($fields!=null) {
            $this->db->select($fields);
        }
        return $this->db->where($this->primary_key,$id)->get($this->table)->row();
    }    

    public function get_data_by_keyword($keyword, $fields=null){        
        $this->switch_table();

        if ($fields!=null) {
            $this->db->select($fields);
        }
        return $this->db->where($keyword)->get($this->table)->row();
    }
    
    public function get_all_data($fields=null,$orderby=null,$limit=null){
        $this->switch_table();

        if ($fields!=null) {
            $this->db->select($fields);
        }
        if ($orderby!=null) {
            $this->db->order_by($orderby);
        }
        if ($limit!=null) {
            $this->db->limit($limit);
        }
        return $this->db->get($this->table)->result();
    }

    public function get_all_data_by_keyword($fields=null,$keyword=null,$orderby=null,$limit=null){
        $this->switch_table();

        if ($fields!=null) {
            $this->db->select($fields);
        }
        if ($orderby!=null) {
            $this->db->order_by($orderby);
        }
        if ($limit!=null) {
            $this->db->limit($limit);
        }        
        return $this->db->where($keyword)->get($this->table)->result();
    }

    public function get_all_data_like_keyword($keyword,$fields=null,$limit,$where=null){
        $this->switch_table();

        if ($where!=null) {
            $this->db->where($where);
        }
        return $this->db->like($fields, $keyword)->get($this->table,$limit)->result();
    }

    public function get_data_as_array($fields=null,$opt=null,$secure=null,$keyword=null){
        $this->switch_table();

        if ($keyword!=null) {
            $result=$this->get_all_data_by_keyword($fields,$keyword);
        }else{
            $result=$this->get_all_data($fields);
        }
        $options = array();
        if ($opt!=null){
            $options[''] = $opt;
        }
        foreach($result as $key){
            if ($secure==null) 
                $options[$key->id] = $key->nama;
            else 
                $options[$this->mfcrypt->secure_it($key->id)] = $key->nama;
        }
        return $options;
    }
    
    public function update($post_data,$id=null){
        $this->table=$this->table_master;
        $this->db->where($this->primary_key,$id)->update($this->table, $post_data);
    }

    public function update_by_keyword($post_data,$keyword=null){
        $this->table=$this->table_master;
        return $this->db->where($keyword)->update($this->table, $$post_data);
    }

    public function delete($id){
        $this->table=$this->table_master;
        return $this->db->where($this->primary_key,$id)->delete($this->table);        
    } // End :: CRUD

    public function delete_by_keyword($keyword){
        $this->table=$this->table_master;
        $check=$this->get_data_by_keyword($keyword);
        if (empty($check)) {
            return false;
        }else{
            return $this->db->where($keyword)->delete($this->table);
        }
    }    

    public function inserted_id(){
        $this->table=$this->table_master;
        return $this->db->insert_id();        
    }
   
} // End of file MY_Model.php

