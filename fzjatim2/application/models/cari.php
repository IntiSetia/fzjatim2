<?php
  Class Cari extends CI_Model {
    function __construct(){
      $this->load->database();
    }

    function get_all_data(){
      $this->db->from('data_psb');
      $query  = $this->db->get();
      return $query->result_array();
    }

    function get_search_data($kt, $isi){
      if($kt == "nomor_inet"){
        /*$ba  = $this->db
                ->select('*')
                ->from('data_psb')
                ->where('nomor_speedy', $isi)
                ->get();*/
        $ba  = $this->db
                      ->query("SELECT * FROM data_psb WHERE nomor_speedy IN(".$isi.") AND ba_rev IS NOT NULL");
      } else if($kt == "nomor_telp"){
        /*$ba  = $this->db
                ->select('*')
                ->from('data_psb')
                ->where('nomor_pots', $isi)
                ->get();*/
        $ba  = $this->db
                      ->query("SELECT * FROM data_psb WHERE nomor_pots IN(".$isi.") AND ba_rev IS NOT NULL");
      } else{
        /*$ba  = $this->db
                ->select('*')
                ->from('data_psb')
                ->where('ont', $isi)
                ->get();*/
        $ba  = $this->db
                      ->query("SELECT * FROM data_psb WHERE ont IN('".$isi."') AND ba_rev IS NOT NULL");
    }
      return $ba->result_array();
  }

  function get_search_lama($kt, $tgl, $bln, $thn){
    $dt = $thn.'-'.$bln.'-'.$tgl;
    if($kt == "tgl_va"){
        $cari  = $this->db
                ->select('*')
                ->from('data_psb')
                ->where('tgl_va', $dt)
                ->get();
      } else{
        $cari  = $this->db
                ->select('*')
                ->from('data_psb')
                ->where('tgl_ps', $dt)
                ->get();  
    }        
      return $cari->result_array();
  }

  function get_search($kt, $tgl1, $bln1, $thn1, $tgl2, $bln2, $thn2){
    $dt1 = $thn1.'-'.$bln1.'-'.$tgl1;
    $dt2 = $thn2.'-'.$bln2.'-'.$tgl2;
    if($kt == "tgl_va"){
        $cari  = $this->db->query("SELECT * FROM data_psb WHERE (tgl_va BETWEEN '". $dt1 ."' AND '". $dt2 ."');");
      } else{
        $cari  = $cari  = $this->db->query("SELECT * FROM data_psb WHERE (tgl_ps BETWEEN '". $dt1 ."' AND '". $dt2 ."');");
    }
      return $cari->result_array();
  }

  function get_dt_rekon($kt, $ka){
    if($kt == "semua_ba" && $ka == "semua_ba"){
        $cari  = $this->db
                ->select('*')
                ->from('data_psb')
                ->get();
      } else if($kt == "semua_ba"){
        $cari  = $this->db
                ->select('*')
                ->from('data_psb')
                ->where('wilayah', $ka)
                ->get();
      } else if($ka == "semua_ba"){
        $cari  = $this->db
                ->select('*')
                ->from('data_psb')
                ->where('divisi', $kt)
                ->get();
      } else{
        $cari  = $this->db
                ->select('*')
                ->from('data_psb')
                ->where('divisi', $kt)
                ->where('wilayah', $ka)
                ->get();  
    }        
      return $cari->result_array();
  }

  function get_revenue($kt, $ka){
    if($kt == "semua_ba" && $ka == "semua_ba"){
        $query = $this->db
                    ->select('SUM(biaya) as total')
                    ->from('data_psb')
                    ->get();
      } else if($kt == "semua_ba"){
        $query = $this->db
                    ->select('SUM(biaya) as total')
                    ->from('data_psb')
                    ->where('wilayah', $ka)
                    ->get();
      } else{
        $query = $this->db
                    ->select('SUM(biaya) as total')
                    ->from('data_psb')
                    ->where('divisi', $kt)
                    ->where('wilayah', $ka)
                    ->get();  
    }    
      return $query->row()->total;
    }
    
    //Untuk Kegiatan Controller Provisioning
    function data_ps($no){
      $cari = $this->db
             ->query("SELECT * FROM data_provisioning WHERE nd_inet IN(".$no.")");
      return $cari->result_array();
    }

    function get_rek($no){
      $cari = $this->db
             ->query("SELECT * FROM data_provisioning WHERE nd_inet IN(".$no.")");
      return $cari->result_array();
    }
 // AND ba_prov IS NOT NULL
    function get_all(){
      $this->db->from('data_provisioning');
      $query  = $this->db->get();
      return $query->num_rows();
    }

    function get_target_prov(){
      $cari = $this->db
             ->query("SELECT sto, COUNT(sto) AS total FROM data_provisioning WHERE status_rekon = 'NOK' OR status_rekon = 'nok' GROUP BY sto ORDER BY sto");
      return $cari->result_array();
    }

    function get_all_prov(){
      $query = $this->db
                    ->select('*')
                    ->from('data_provisioning')
                    // ->limit(100)
                    ->get();
      return $query->result_array();
    }
    
    public function update($no){
        $this->db
             ->query("UPDATE data_provisioning SET status_rekon = 'ok' WHERE nd_inet IN(".$no.")");
    }

    // Untuk dashboard Provisioning
    function get_all_by_bulan($no){
      $query = $this->db
                    ->select('COUNT(sto) as jsto')
                    ->from('data_provisioning')
                    ->like('tgl_status', '-'.$no.'-')
                    ->get();
      return $query->row()->jsto;
    }

    function get_all_by_ba($no){
      $query = $this->db
                    ->select('COUNT(sto) as ba_sto')
                    ->from('data_provisioning')
                    ->where('ba_prov', NULL)
                    ->like('tgl_status', '-'.$no.'-')
                    ->get();
      return $query->row()->ba_sto;
    }

    function get_all_sto($no){
      $query = $this->db
                    ->select('sto')
                    ->select('COUNT(id_prov) as jum')
                    ->from('data_provisioning')
                    ->like('tgl_status', '-'.$no.'-')
                    ->group_by('sto')
                    ->order_by('sto', 'asc')
                    ->get();
      return $query->result_array();
    }

    function get_sto_ba($no){
      $query = $this->db
                    ->select('sto')
                    ->select('COUNT(id_prov) as jum')
                    ->from('data_provisioning')
                    ->like('tgl_status', '-'.$no.'-')
                    ->where('ba_prov', NULL)
                    ->group_by('sto')
                    ->order_by('sto', 'asc')
                    ->get();
      return $query->result_array();
    }

}
?>