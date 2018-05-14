<?php
  Class Modelmarshall extends CI_Model
  {
      function __construct()
      {
          $this->load->database();
      }

      public function insert($table, $data)
      {
          $insert = $this->db->insert($table, $data);
          return $insert;
      }

      public function delete($table, $no)
      {
          $this->db->where('no', $no)->delete($table);
          if ($this->db->affected_rows() > 0) {
              return TRUE;
          } else {
              return FALSE;
          }
      }

      public function get_all($table)
      {
          $query = $this->db->select('*')
              ->from($table)
              ->get();
          return $query->result_array();
      }

      public function get_with_hr()
      {
          $query = $this->db->query("SELECT * FROM data_marshall INNER JOIN data_hr on data_marshall.inputer = data_hr.nik ORDER BY tgl ASC");
          return $query->result_array();
      }

      public function get_with_hr_where($where)
      {
          $query = $this->db->query("SELECT * FROM data_marshall INNER JOIN data_hr on data_marshall.inputer = data_hr.nik WHERE no = '$where' ORDER BY tgl ASC");
          return $query->result_array();
      }

      public function get_with_psa($table, $psa)
      {
          $query = $this->db->select('*')
              ->from($table)
              ->where('psa', $psa)
              ->get();
          return $query->result();
      }

      public function get_jadwal_marshal($witel, $bulan)
      {
          $query = $this->db->select('jadwal')
              ->from('data_jadwal_marshal')
              ->where('bulan', $bulan)
              ->where('witel', $witel)
              ->get();
          return $query->row();
      }

      public function get_with_no($table, $no)
      {
          $query = $this->db->select('*')
              ->from($table)
              ->where('no', $no)
              ->get();
          return $query->row();
      }

      public function get_all_result($table)
      {
          $query = $this->db->select('*')
              ->from($table)
              ->get();
          return $query->result();
      }

      public function count_statistik_marshall($psa,$tgl,$bln,$thn)
      {
          $explode_data = explode('-', 'yyyy-mm-dd');
          $explode_data[0] = $thn;
          $explode_data[1] = $bln;
          $explode_data[2] = $tgl;
          $implode_data = implode('-', $explode_data);
          $query = $this->db->query("SELECT COUNT('no') AS jml FROM data_marshall WHERE psa='$psa' AND tgl = '$implode_data';");
          return $query->row();
      }
  }
?>