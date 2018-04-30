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

    public function get_with_hr(){
          $query = $this->db->query("SELECT * FROM data_marshall INNER JOIN data_hr on data_marshall.inputer = data_hr.nik ORDER BY tgl ASC");
          return $query->result_array();
      }

    public function get_with_hr_where($where){
        $query = $this->db->query("SELECT * FROM data_marshall INNER JOIN data_hr on data_marshall.inputer = data_hr.nik WHERE no = '$where' ORDER BY tgl ASC");
        return $query->result_array();
    }

    public function get_all_result($table){
          $query 		= $this->db->select('*')
              ->from($table)
              ->get();
          return $query->result();
      }
  }
?>