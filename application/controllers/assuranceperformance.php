<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Assuranceperformance extends CI_Controller {
	function __construct() {
      parent::__construct();

        /*if (!logged_in())
            redirect('index.php/login');*/

      $this->load->database();
      $this->load->helper('url');
      $this->load->library('PHPExcel');
      $this->load->library('session');
      $this->load->model('AssPer');
    }

    public function data_open(){
    	$data['data_open'] 	= $this->AssPer->get_all_data('data_open');
    	$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('assurance_performance/data_open', $data);
		$this->load->view('footer');
    }

	public function import_open()
	{
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('assurance_performance/import_data_open');
		$this->load->view('footer');
	}

	public function report_month_open()
	{
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('assurance_performance/report_month_open');
		$this->load->view('footer');
	}

	public function report_ytd_open()
	{
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('assurance_performance/report_ytd_open');
		$this->load->view('footer');
	}

	public function data_close(){
    	$data['data_close'] 	= $this->AssPer->get_all_data('data_close');
    	$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('assurance_performance/data_close', $data);
		$this->load->view('footer');
    }

	public function import_close()
	{
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('assurance_performance/import_data_close');
		$this->load->view('footer');
	}

	public function report_month_close()
	{
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('assurance_performance/report_month_open');
		$this->load->view('footer');
	}

	public function report_ytd_close()
	{
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('assurance_performance/report_ytd_close');
		$this->load->view('footer');
	}

	//MTTR
    public function importfilemttr()
    {
        $fileName = time() . $_FILES['fileImport']['name'];                     // Sesuai dengan nama Tag Input/Upload
        $config['upload_path'] = './fileExcel/';                                // Buat folder dengan nama "fileExcel" di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        //$this->db->empty_table("data_cogs");

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

            $data = array(
                "mdf"               => $rowData[0][12],
                "nomor_pots"        => $rowData[0][8],
                "nomor_speedy"		  => $rowData[0][9],
                "nama"				      => $rowData[0][19],
                "alamat"			      => $rowData[0][21],
            );

            $mdf          = $rowData[0][12];
            $nomor_pots   = $rowData[0][8];
            $nomor_speedy = $rowData[0][9];
            $nama         = $rowData[0][19];
            $alamat       = $rowData[0][21];
            $sumber_order = "ms2n";

            $sql = 'INSERT INTO data_rekon (mdf, nomor_pots, nomor_speedy, nama, alamat, sumber_order) VALUES (?, ?, ?, ?, ?, ?) ON CONFLICT (nomor_speedy) DO UPDATE SET 
              mdf         = excluded.mdf, 
              nomor_pots  = excluded.nomor_pots, 
              nama        = excluded.nama,  
              alamat      = excluded.alamat,
              sumber_order= excluded.sumber_order';

            $query = $this->db->query($sql, array( $mdf, $nomor_pots, $nomor_speedy, $nama, $alamat, $sumber_order));

            //$insert = $this->db->insert("data_rekon", $data);                   // Sesuaikan nama dengan nama tabel untuk melakukan insert data
            //delete_files($media['file_path']);                                  // menghapus semua file .xls yang diupload
        }

        redirect(base_url('rekon/import3pms2n/success'));

    }


}