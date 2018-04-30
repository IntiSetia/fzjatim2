<?php
  Class Cogs_model extends CI_Model {
    function __construct(){

      $this->load->database();
    } 

    function login($data){
    $query = $this->db->get_where("data_user", $data);
    return $query->result_array();
    }

    function get_all(){
      $this->db->from('data_cogs');
      $query  = $this->db->get();
      return $query->result_array();
    }

    function get_jan(){
      $query = $this->db
                    ->select('SUM(amount_in_doc_curr) as total')
                    ->from('data_cogs')
                    ->where('posting_period', '1')
                    ->get();
      return $query->row()->total;
    }

    function get_cogs(){
      $query = $this->db
                    ->select('SUM(amount_in_doc_curr) as total')
                    ->from('data_cogs')
                    ->where('group_tipe', 'COGS')
                    // ->where('posting_period', '2')
                    ->group_by('posting_period')
                    ->order_by('posting_period', 'asc')
                    ->get();
      return $query->result_array();
    }

    function get_rev(){
      $query = $this->db
                    ->select('SUM(amount_in_doc_curr) as total')
                    ->from('data_cogs')
                    ->where('group_tipe', 'Pendapatan')
                    // ->where('posting_period', '2')
                    ->group_by('posting_period')
                    ->order_by('posting_period', 'asc')
                    ->get();
      return $query->result_array();
    }
    
    function get_fz2_ytd_cogs(){
      $query = $this->db->query("SELECT area, SUM(amount_in_doc_curr) as cogs FROM data_cogs WHERE group_tipe = 'COGS' AND posting_period IS NOT NULL GROUP BY area ORDER BY area ASC");
      return $query->result();

      /*$query = $this->db
                    ->select('area, SUM(amount_in_doc_curr) as cogs')
                    ->from('data_cogs')
                    ->where('group_tipe', 'COGS')
                    ->group_by('area')
                    ->order_by('area', 'asc')
                    ->get();
      return $query->result();*/
    }

    function get_fz2_ytd_rev(){
      $query = $this->db->query("SELECT area, SUM(amount_in_doc_curr) as rev FROM data_cogs WHERE group_tipe = 'Pendapatan' AND posting_period IS NOT NULL GROUP BY area ORDER BY area ASC");
      return $query->result();
      /*$query = $this->db
                    ->select('area, SUM(amount_in_doc_curr) as rev')
                    ->from('data_cogs')
                    ->where('group_tipe', 'Pendapatan')
                    ->where('posting_period', NOT NULL)
                    ->group_by('area')
                    ->order_by('area', 'asc')
                    ->get();
      return $query->result();*/
    }

    function cogs_klas_all(){
      $query = $this->db
                    ->select('klasifikasi, SUM(amount_in_doc_curr) as total')
                    ->from('data_cogs')
                    ->where('klasifikasi !=', ' ')
                    ->where('group_tipe', 'COGS')
                    ->group_by('klasifikasi')
                    ->order_by('klasifikasi', 'asc')
                    ->get();
      return $query->result_array();

      /*
        ->where('area', 'JEMBER')
      */
    }

    function cogs_klas(){
      $query = $this->db
                    ->select('klasifikasi, SUM(amount_in_doc_curr) as total')
                    ->from('data_cogs')
                    ->where('klasifikasi !=', ' ')
                    ->where('group_tipe', 'COGS')
                    ->group_by('klasifikasi')
                    ->order_by('klasifikasi', 'asc')
                    ->get();
      return $query->result_array();

      /*
        ->where('area', 'JEMBER')
      */
    }

    function cogs_klas_area(){
      $query = $this->db
                    ->select('klasifikasi, SUM(amount_in_doc_curr) as total')
                    ->from('data_cogs')
                    ->where('klasifikasi !=', ' ')
                    ->where('group_tipe', 'COGS')
                    ->group_by('klasifikasi')
                    ->order_by('klasifikasi', 'asc')
                    ->get();
      return $query->result_array();

      /*
        ->where('area', 'JEMBER')
      */
    }

    function cogs_klas_all_bulan($bulan){
      $query = $this->db
                    ->select('posting_period, klasifikasi, SUM(amount_in_doc_curr) as total')
                    ->from('data_cogs')
                    ->where('klasifikasi !=', ' ')
                    ->where('posting_period', $bulan)
                    ->where('group_tipe', 'COGS')
                    ->group_by('posting_period')
                    ->group_by('klasifikasi')
                    ->order_by('klasifikasi', 'asc')
                    ->get();
      return $query->result_array();
    }

    function cogs_klas_area_bulan($area){
      $query = $this->db->query("SELECT area, klasifikasi, SUM(amount_in_doc_curr) as total FROM data_cogs WHERE area = '$area' AND klasifikasi != ' ' AND group_tipe = 'COGS' GROUP BY area, klasifikasi ORDER BY klasifikasi;");
      return $query->result_array();
    }

    function cogs_klas_area_bulan_perbulan($area, $bulan){
      $query = $this->db->query("SELECT area, klasifikasi, SUM(amount_in_doc_curr) as total FROM data_cogs WHERE area = '$area' AND klasifikasi != ' ' AND group_tipe = 'COGS' AND posting_period = $bulan GROUP BY area, klasifikasi ORDER BY klasifikasi;");
      return $query->result_array();
    }

    function cogs_klasifikasi_area($area, $klasifikasi){
      $query = $this->db->query("SELECT area, klasifikasi, posting_period, SUM(amount_in_doc_curr) as jumlah FROM data_cogs WHERE group_tipe = 'COGS' AND area = '$area' AND klasifikasi = '$klasifikasi' GROUP BY posting_period, area, klasifikasi ORDER BY posting_period");
      return $query->result_array();
    }

    function cogs_all_per_klasifikasi(){
      $query = $this->db->query("SELECT klasifikasi, posting_period, SUM(amount_in_doc_curr) as total FROM data_cogs GROUP BY klasifikasi, posting_period ORDER BY klasifikasi, posting_period");
      return $query->result_array();
    }

    function data_klasifikasi(){
      $query = $this->db->query("SELECT DISTINCT klasifikasi FROM data_cogs ORDER BY klasifikasi");
      return $query->result_array();
    }

    function period_klasifikasi($klasifikasi){
      $query = $this->db->query("SELECT posting_period, SUM(amount_in_doc_curr) as total FROM data_cogs WHERE klasifikasi = '$klasifikasi' GROUP BY posting_period ORDER BY posting_period");
      return $query->result_array();
    }

    function cogs_target(){
      /*$bultah1  = "012017";*/
      $bultah1  = date('Y') . "-01-01";
      $bulan    = date('m', strtotime('-1 month'));
      $tahun    = date('Y');
      $bultah   = $tahun . "-" . $bulan . "-01";
      /*$bultah   = "122017";*/
      //date('mY');
      $query    = $this->db->query("SELECT area, SUM(target) as target FROM data_target WHERE bultah BETWEEN '$bultah1' AND '$bultah' GROUP BY area ORDER BY area");
      return $query->result_array();
    }

    function trend_rev_all(){
      $query    = $this->db->query("SELECT posting_period, SUM(amount_in_doc_curr) as total FROM data_cogs WHERE group_tipe = 'Pendapatan' AND posting_period > 0 GROUP BY posting_period ORDER BY posting_period");
      return $query->result_array();
    }

    function trend_rev($area){
      $query    = $this->db->query("SELECT area, posting_period, SUM(amount_in_doc_curr) as total FROM data_cogs WHERE group_tipe = 'Pendapatan' AND area = '$area' AND posting_period > 0  GROUP BY area, posting_period ORDER BY area, posting_period");
      return $query->result_array();
    }
}

//COGS PER BULAN (AREA)
/*SELECT area, posting_period, SUM(amount_in_doc_curr) as total FROM data_cogs WHERE group_tipe = 'COGS' GROUP BY area, posting_period ORDER BY area, posting_period*/
?>