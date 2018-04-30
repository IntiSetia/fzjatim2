<?php
//error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Marshall extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('modelmarshall');
        $this->load->library('session');

        if ($this->session->userdata('login')!==TRUE)
            redirect('index.php/login');
    }

    function view_form(){
    	$msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = '<b>Data berhasil ditambahkan!!</b>';
        } else if ($msg == 'imagetolarge'){
            $alert  = '<b>Foto Evident terlalu besar!!</b>';
        }
        $data['_alert'] = $alert;

    	$this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/input_form', $data);
        $this->load->view('footer');
    }

    function input_form(){
     	$tgl              = $this->input->post('tgl');
        $witel            = $this->input->post('wilayah');
        $jenisf           = $this->input->post('jenisf');
        $lokasi           = $this->input->post('lokasi');
        $penemuan         = $this->input->post('penemuan');
        $tindakan    	  = $this->input->post('tindakan');
        $unit 			  = $this->input->post('unit');
        $pic  			  = $this->input->post('pic');
        $target           = $this->input->post('target');
        $status           = $this->input->post('status');
        $catatan          = $this->input->post('catatan');

                $gambar		      = $_FILES['evident']['name'];
                
                $config['upload_path']          = './marshall/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                /*$config['max_size']             = 2048;*/

                $this->load->library('upload', $config);
 
                if (!$this->upload->do_upload('evident')) {
                        $error = array('error' => $this->upload->display_errors());
                        /*echo "<script>alert('Foto evident gagal ditambahkan')</script>";*/
                }
                else {
                        $data = array('upload_data' => $this->upload->data());
                        /*echo "<script>alert('Foto evident berhasil ditambahkan')</script>";*/
                }

        $inputer          = $this->input->post('marshall');

        $data   = array(
                'tgl'             => $tgl,
                'witel'           => $witel,
                'jenis_finding'   => $jenisf,
                'lokasi'		  => $lokasi,
                'penemuan'        => $penemuan,
                'tindakan_perbaikan'   	=> $tindakan,
                'pic'        			=> $pic,
                'target'           		=> $target,
                'status'           		=> $status,
                'catatan'             	=> $catatan, 
                'gambar'          		=> $gambar, 
                'inputer'               => $inputer,
                'unit'                  => $unit
            );

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

        $this->modelmarshall->insert('data_marshall', $data);
        redirect(base_url('index.php/marshall/view_form/success'));
    }

    function import_jadwal(){
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Success!!';
        }
        $data['_alert'] = $alert;

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/input_jadwal', $data);
        $this->load->view('footer');
    }

    function input_jadwal(){
        $fileName = time() . $_FILES['fileImport']['name'];                     // Sesuai dengan nama Tag Input/Upload

        $config['upload_path'] = './fileExcel/';                                // Buat folder dengan nama "fileExcel" di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        /*$this->db->empty_table("data_cogs");*/

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
                "nama_akun"                 => $rowData[0][2]
            );

            $insert = $this->db->insert("data_cogs", $data);                   // Sesuaikan nama dengan nama tabel untuk melakukan insert data
            //delete_files($media['file_path']);                                  // menghapus semua file .xls yang diupload
        }

        redirect(base_url('index.php/cogs/import/success'));
    }

    function report_marshall(){
        $data['marshall'] = $this->modelmarshall->get_all('data_marshall');

        /*echo "<pre>";
        print_r($data['id']);
        echo "</pre>";*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/report_marshall', $data);
        $this->load->view('footer');
    }

    function report_statistik(){
        $data['statistik'] = $this->modelmarshall->get_all('data_marshall');

        /*echo "<pre>";
        print_r($data['id']);
        echo "</pre>";*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/report_statistik');
        $this->load->view('footer');
    }
}