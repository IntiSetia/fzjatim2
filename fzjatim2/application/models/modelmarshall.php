<?php
  Class Modelmarshall extends CI_Model {
    function __construct(){
      $this->load->database();
    }

    public function insert($table, $data){
        $insert 	= $this->db->insert($table, $data);
        return $insert;
    }

    public function get_all($table){
        $query 		= $this->db->select('*')
        			->from($table)
        			->get();
        return $query->result_array();
    }
  }
?>