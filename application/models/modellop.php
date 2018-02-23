<?php
  Class Modellop extends CI_Model {
    function __construct(){
      $this->load->database();
    }

    //get all data
    function get_all_data($tabel){
      $this->db->from($tabel);
      $query  = $this->db->get();
      return $query->result_array();
    }

    function getnospeedy($tabel){
      $this->db->select('nomor_speedy')
               ->from($tabel);
      $query  = $this->db->get();
      return $query->result_array();
    }

    function getselectdata($tabel, $data){
      $this->db->select('*')
               ->from($tabel)
               ->where('nomor_speedy', $data);
      $query  = $this->db->get();
      return $query->result_array();
    }

    public function get_ba($table, $data, $where){
        $this->db->update($table, $data, $where); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        
    }

  }
?>