<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
ini_set('max_execution_time', 100000000);
ini_set('memory_limit', '-1');

class Cogs extends CI_Controller {
	function __construct() {
      parent::__construct();
      $this->load->database();
      $this->load->helper('url');
      $this->load->library('PHPExcel');
      $this->load->model('cogs_model');
      $this->load->library('session');

      if ($this->session->userdata('login')!==TRUE)
            redirect('index.php/login');
    }

    function index(){
        //Data COGS per Area for Dashboard
        $data['fz2_ytd_cogs']           = $this->cogs_model->get_fz2_ytd_cogs();

        //Data REV per Area for Dashboard
        $data['fz2_ytd_rev']            = $this->cogs_model->get_fz2_ytd_rev();

        //Data Target for Dashboard
        $data['target']                 = $this->cogs_model->cogs_target();

        //Data COGS Per Klasifikasi
        $data['cogs_klasifikasi']       = $this->cogs_model->cogs_klas();

        /*echo "<pre>";
        print_r($data['target']);
        echo "</pre>";*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('cogs/dashboard_cogs', $data);
        $this->load->view('cogs/footer_cogs', $data);

        //$this->load->view('cogs/formula', $data);
    }

    function index2(){
        //Data COGS per Area for Dashboard
        $data['fz2_ytd_cogs']           = $this->cogs_model->get_fz2_ytd_cogs();

        //Data REV per Area for Dashboard
        $data['fz2_ytd_rev']            = $this->cogs_model->get_fz2_ytd_rev();

        //Data Target for Dashboard
        $data['target']                 = $this->cogs_model->cogs_target();

        //Data COGS Per Klasifikasi
        $data['cogs_klasifikasi']       = $this->cogs_model->cogs_klas();

        /*echo "<pre>";
        print_r($data['fz2_ytd_cogs']);
        echo "</pre>";*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('cogs/dashboard_cogs', $data);
        $this->load->view('cogs/footer_cogs', $data);

        //$this->load->view('cogs/formula', $data);
    }

    function dashboard(){
      //Data COGS per Area for Dashboard
      $data['fz2_ytd_cogs']           = $this->cogs_model->get_fz2_ytd_cogs();

      //Data REV per Area for Dashboard
      $data['fz2_ytd_rev']            = $this->cogs_model->get_fz2_ytd_rev();

      //Data Target for Dashboard
      $data['target']                 = $this->cogs_model->cogs_target();

      //Data COGS Per Klasifikasi
      $data['cogs_klasifikasi']       = $this->cogs_model->cogs_klas();

      /*echo "<pre>";
      print_r($data['target']);
      echo "</pre>";*/

      $this->load->view('header');
  		$this->load->view('aside');
  		$this->load->view('cogs/dashboard_cogs', $data);
      $this->load->view('cogs/footer_cogs', $data);

      //$this->load->view('cogs/formula', $data);
    }

    function cek_evaluasi(){
      $area   = $this->input->post('area');
      $bulan  = $this->input->post('bulan');
      
      if ($area == "all" && $bulan == "ytd") {
        $this->evaluasi();
      } elseif ($area == "all") {
        $this->evaluasi_m($bulan);
      } elseif ($bulan == "ytd") {
        $this->evaluasi_area($area);
      } else {
        $this->evaluasi_area_m($area, $bulan);
      }
    }

    function evaluasi(){
      //Data COGS per Area
      $data['fz2_ytd_cogs']         = $this->cogs_model->get_fz2_ytd_cogs();

      //Data REV per Area
      $data['fz2_ytd_rev']          = $this->cogs_model->get_fz2_ytd_rev();

      //Data Target
      $data['target']               = $this->cogs_model->cogs_target();

      //Data COGS Per Klasifikasi All
      $data['cogs_klasifikasi_all']       = $this->cogs_model->cogs_klas_all();

      //Data COGS Per Klasifikasi Area 
      $data['cogs_klasifikasi_area']      = $this->cogs_model->cogs_klas_area();

      /*echo "<pre>";
      print_r($data['cogs_klasifikasi']);
      echo "</pre>";*/

      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('cogs/evaluasi_cogs', $data);
      $this->load->view('cogs/footer_cogs', $data);

      //$this->load->view('cogs/formula', $data);
    }

    function evaluasi_m($bulan){
      //Data COGS per Area
      $data['fz2_ytd_cogs']         = $this->cogs_model->get_fz2_ytd_cogs();

      //Data REV per Area
      $data['fz2_ytd_rev']          = $this->cogs_model->get_fz2_ytd_rev();

      //Data Target
      $data['target']               = $this->cogs_model->cogs_target();

      //Data COGS Per Klasifikasi All
      //$data['cogs_klasifikasi_all']       = $this->cogs_model->cogs_klas_all();

      //Data COGS Per Klasifikasi Area 
      $data['cogs_klasifikasi_area']      = $this->cogs_model->cogs_klas_area();

      //START TEF 3 AUGUST 

      //Data COGS Per-klasifikasi ($area == all)
      $arrayBulan =  array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $data["bulan"] = array("id"=>$bulan,"nama"=>$arrayBulan[$bulan]);
      $data['cogs_klasifikasi_all']      = $this->cogs_model->cogs_klas_all_bulan($bulan);
      
      //END TEF

      /*echo "<pre>";
      print_r($data);
      echo "</pre>";*/

      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('cogs/evaluasi_cogs', $data);
      $this->load->view('cogs/footer_cogs', $data);

      //$this->load->view('cogs/formula', $data);
    }

    function evaluasi_area($area){
      //Data COGS per Area
      $data['fz2_ytd_cogs']         = $this->cogs_model->get_fz2_ytd_cogs();

      //Data REV per Area
      $data['fz2_ytd_rev']          = $this->cogs_model->get_fz2_ytd_rev();

      //Data Target
      $data['target']               = $this->cogs_model->cogs_target();

      //Data COGS Per Klasifikasi All YTD
      $data['cogs_klasifikasi_all']       = $this->cogs_model->cogs_klas_all();

      //Data COGS Per Klasifikasi Area YTD
      $data['area']   = array("area"=>$area);
      $data['cogs_klasifikasi_area']      = $this->cogs_model->cogs_klas_area_bulan($area);

      //START TEF 3 AUGUST 
      
      //END TEF

      /*echo "<pre>";
      print_r($data['cogs_klasifikasi']);
      echo "</pre>";*/

      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('cogs/evaluasi_cogs_area', $data);
      $this->load->view('cogs/footer_cogs', $data);

      //$this->load->view('cogs/formula', $data);
    }

    function evaluasi_area_m($area, $bulan){
      //Data COGS per Area
      $data['fz2_ytd_cogs']         = $this->cogs_model->get_fz2_ytd_cogs();

      //Data REV per Area
      $data['fz2_ytd_rev']          = $this->cogs_model->get_fz2_ytd_rev();

      //Data Target
      $data['target']               = $this->cogs_model->cogs_target();

      //Data COGS Per Klasifikasi All
      $data['cogs_klasifikasi_all']       = $this->cogs_model->cogs_klas_all();

      //Data COGS Per Klasifikasi Area 
      $arrayBulan =  array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      $data["bulan"] = array("id"=>$bulan,"nama"=>$arrayBulan[$bulan]);
      $data['cogs_klasifikasi_area']      = $this->cogs_model->cogs_klas_area_bulan_perbulan($area, $bulan);

      /*echo "<pre>";
      print_r($data['cogs_klasifikasi']);
      echo "</pre>";*/

      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('cogs/evaluasi_cogs_area', $data);
      $this->load->view('cogs/footer_cogs', $data);

      //$this->load->view('cogs/formula', $data);
    }

    function cogs_klasifikasi_all(){
      //Data COGS per Area
      $data['fz2_ytd_cogs']         = $this->cogs_model->get_fz2_ytd_cogs();

      //Data REV per Area
      $data['fz2_ytd_rev']          = $this->cogs_model->get_fz2_ytd_rev();

      //Data Target
      $data['target']               = $this->cogs_model->cogs_target();

      //Data COGS Per Klasifikasi All
      $data['cogs_klasifikasi_all']       = $this->cogs_model->cogs_klas_all();

      //Data COGS Per Klasifikasi Area 
      $data['cogs_klasifikasi_area']      = $this->cogs_model->cogs_klas_area();

      //Data COGS FZ 2 All per Klasifikasi 
      $data['cogs_all_per_klasifikasi']       = $this->cogs_model->cogs_all_per_klasifikasi();

      /*$data['data_klasifikasi']   = $this->cogs_model->data_klasifikasi();

      foreach ($data['data_klasifikasi'] as $datkla) {
        $klasifikasi_data   = $datkla['klasifikasi'];
        //echo $datkla['klasifikasi'] . "<br>";

        $data['period_klasifikasi']   = $this->cogs_model->period_klasifikasi($klasifikasi_data);
      }*/

      /*echo "<pre>";
      print_r($data['cogs_all_per_klasifikasi']);
      echo "</pre>";*/

      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('cogs/evaluasi_cogs_klasifikasi_all', $data);
      $this->load->view('cogs/footer_cogs', $data);

      //$this->load->view('cogs/formula2', $data);
    }

    function cogs_klasifikasi_m(){
      //Data COGS per Area
      $data['fz2_ytd_cogs']         = $this->cogs_model->get_fz2_ytd_cogs();

      //Data REV per Area
      $data['fz2_ytd_rev']          = $this->cogs_model->get_fz2_ytd_rev();

      //Data Target
      $data['target']               = $this->cogs_model->cogs_target();

      //Data COGS Per Klasifikasi All
      $data['cogs_klasifikasi_all']       = $this->cogs_model->cogs_klas_all();

      //Data COGS Per Klasifikasi Area 
      $data['cogs_klasifikasi_area']      = $this->cogs_model->cogs_klas_area();

      //Data COGS FZ 2 All per Klasifikasi 
      $data['cogs_all_per_klasifikasi']       = $this->cogs_model->cogs_all_per_klasifikasi();

      $area         = $this->input->post('area');
      $klasifikasi  = $this->input->post('klasifikasi');
      $data['cogs_per_klasifikasi']   = $this->cogs_model->cogs_klasifikasi_area($area, $klasifikasi);

      /*$data['data_klasifikasi']   = $this->cogs_model->data_klasifikasi();

      foreach ($data['data_klasifikasi'] as $datkla) {
        $klasifikasi_data   = $datkla['klasifikasi'];
        //echo $datkla['klasifikasi'] . "<br>";

        $data['period_klasifikasi']   = $this->cogs_model->period_klasifikasi($klasifikasi_data);
      }

      echo "<pre>";
      print_r($data['period_klasifikasi']);
      echo "</pre>";*/

      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('cogs/evaluasi_cogs_klasifikasi', $data);
      $this->load->view('cogs/footer_cogs', $data);

      //$this->load->view('cogs/formula2', $data);
    }

    function rev(){
      $area   = $this->input->post('area');

      //echo $area;

      if ($area == NULL || $area == "all") {
        $this->revenue();
      } else {
        $this->revenue_m($area);
      }

      
    }

    function revenue(){
      //Data COGS per Area for Dashboard
      $data['fz2_ytd_cogs']           = $this->cogs_model->get_fz2_ytd_cogs();

      //Data REV per Area for Dashboard
      $data['fz2_ytd_rev']            = $this->cogs_model->get_fz2_ytd_rev();

      //Data Target for Dashboard
      $data['target']                 = $this->cogs_model->cogs_target();

      //Data COGS Per Klasifikasi
      $data['cogs_klasifikasi']    = $this->cogs_model->cogs_klas();

      $data['trend_rev']   = $this->cogs_model->trend_rev_all();
      
      /*echo "<pre>";
      print_r($data['trend_rev']);
      echo "</pre>";*/
      
      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('cogs/evaluasi_revenue_all', $data);
      $this->load->view('cogs/footer_cogs', $data);
    }

    function revenue_m($area){
      //Data COGS per Area for Dashboard
      $data['fz2_ytd_cogs']           = $this->cogs_model->get_fz2_ytd_cogs();

      //Data REV per Area for Dashboard
      $data['fz2_ytd_rev']            = $this->cogs_model->get_fz2_ytd_rev();

      //Data Target for Dashboard
      $data['target']                 = $this->cogs_model->cogs_target();

      //Data COGS Per Klasifikasi
      $data['cogs_klasifikasi']       = $this->cogs_model->cogs_klas();

      $data['trend_rev']    = $this->cogs_model->trend_rev($area);
      $data['area']         = $area;
      
      /*echo "<pre>";
      print_r($data);
      echo "</pre>";*/

      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('cogs/evaluasi_revenue_m', $data);
      $this->load->view('cogs/footer_cogs', $data);
    }

    public function import(){ //All data use Data HR Sec 
      $msg    = $this->uri->segment(3);
          $alert  = '';
          if($msg == 'success'){
              $alert  = 'Success!!';
          }
          $data['_alert'] = $alert;

      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('cogs/import_cogs', $data);
      $this->load->view('footer');
    }

    function coba(){
      $data['cogs'] = $this->cogs_model->get_all();
      $data['bln'] = $this->cogs_model->get_cogs();
      $data['rev'] = $this->cogs_model->get_rev();
      $this->load->view('cogs/graph5', $data);
    }

    function coba2(){
      $data['cogs'] = $this->cogs_model->get_all();
      $data['bln'] = $this->cogs_model->get_cogs();
      $data['rev'] = $this->cogs_model->get_rev();
      $this->load->view('cogs/graph3', $data);
      $data['cogs'] = $this->cogs_model->get_all_data();

      echo "<pre>";
      print_r($data);
      echo "</pre>";
      //$this->load->view('cogs/graph', $data);
    }

    public function importfile(){ //Import file
        $fileName = time() . $_FILES['fileImport']['name'];                     // Sesuai dengan nama Tag Input/Upload

        $config['upload_path'] = './fileExcel/';                                // Buat folder dengan nama "fileExcel" di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        $this->db->empty_table("data_cogs"); 

        if (!$this->upload->do_upload('fileImport'))
            $this->upload->display_errors();

        $media = $this->upload->data('fileImport');
        $inputFileName = './fileExcel/' . $media['file_name'];

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 2; $row <= $highestRow; $row++) {                           // Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            
            $data = array(                                                      // Sesuaikan sama nama kolom tabel di database
                "reference"                 => $rowData[0][0],
                "account"                   => $rowData[0][1],
                "nama_akun"                 => $rowData[0][2],
                "gab_akun_cc"               => $rowData[0][3],
                "business_area"             => $rowData[0][4],
                "cost_center"               => $rowData[0][5],
                "profit_center"             => $rowData[0][6],
                "direktorat_tb"             => $rowData[0][7],
                "osm_tb"                    => $rowData[0][8],
                "gm_pm_tb"                  => $rowData[0][9],
                "unit_tb"                   => $rowData[0][10],
                "area"                      => $rowData[0][11],
                "group_akun"                => $rowData[0][12],
                "group_tipe"                => $rowData[0][13],
                "posting_key"               => $rowData[0][14],
                "document_type"             => $rowData[0][15],
                "posting_period"            => $rowData[0][16],
                "document_date"             => $rowData[0][17],
                "document_number"           => $rowData[0][18],
                "assignment"                => $rowData[0][19],
                "posting_date"              => $rowData[0][20],
                "document_currency"         => $rowData[0][21],
                "amount_in_doc_curr"        => $rowData[0][22],
                "amount_in_local_currency"  => $rowData[0][23],
                "text"                      => $rowData[0][24],
                "klasifikasi"               => $rowData[0][25],
                "cost_center2"              => $rowData[0][26],
                "account2"                  => $rowData[0][27],
                "fortofolio"                => $rowData[0][28],
                "trading_partner"           => $rowData[0][29]
            );
            
            $insert = $this->db->insert("data_cogs", $data);                   // Sesuaikan nama dengan nama tabel untuk melakukan insert data
            //delete_files($media['file_path']);                                  // menghapus semua file .xls yang diupload
        }
        
        redirect(base_url('index.php/cogs/import/success'));
    }

    function input(){
      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('cogs/input_target');
      $this->load->view('footer');
    }

    function input_target(){
      $area   = $this->input->post('area');
      $bulan  = $this->input->post('bulan');
      $target = $this->input->post('target');

      $tahun  = date('Y');
      $bultah = $bulan . $tahun;

      //echo $area . " " . $bultah . " " . $target;

      $data = array(
          "area"    => $area,
          "bultah"  => $bultah,
          "target"  => $target
      );

      $insert   = $this->db->insert("data_target", $data);

      if ($insert == TRUE) {
        $this->input();
      }
    }
}