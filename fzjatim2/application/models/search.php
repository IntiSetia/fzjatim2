<?php
  Class Search extends CI_Model {
    function __construct(){
      $this->load->database();
    }

    function get_all_data(){
      $this->db->from('data_sn');
      $query  = $this->db->get();
      return $query->result_array();
    }

    function get_data($sn){
      $query  = $this->db
                ->select('*')
                ->from('data_sn')
                ->like('sn', $sn)
                ->get();;
      return $query->result_array();
    }

    function get_search_data($data, $vendor){
      if($vendor == ""){
        $sn  = $this->db
                ->select('*')
                ->from('data_sn')
                ->like('SN', $data)
                ->get();
      }
      else {
        $sn  = $this->db
                ->select('*')
                ->from('data_sn')
                ->like('SN', $data)
                ->where('Nama_Vendor', $vendor)
                ->get();
      }
      
      return $sn->result_array();
    }

    function get_search_data_vendor($data){
      $sn  = $this->db
                ->select('*')
                ->from('data_sn')
                ->where('Nama_Vendor', $data)
                ->get();
      return $sn->result_array();
    }
  }
?>