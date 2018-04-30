<?php
  Class AssPer extends CI_Model {
    function __construct(){
      $this->load->database();
    }

    //get all data
    function get_all_data($tabel){
      $this->db->from($tabel);
      $query  = $this->db->get();
      return $query->result_array();
    }
  }
?>