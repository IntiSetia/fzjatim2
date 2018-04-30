<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lop extends CI_Controller {
	function __construct() {
      parent::__construct();

        if ($this->session->userdata('login')!==TRUE)
            redirect('index.php/login');

      $this->load->database();
      $this->load->helper('url');
      $this->load->library('PHPExcel');
      $this->load->model('modellop');
      $this->load->library('session');
    } 

    public function importlop(){ //All data use Data HR Sec 
      $msg    = $this->uri->segment(3);
          $alert  = '';
          if($msg == 'success'){
              $alert  = 'Success!!';
          }
          $data['_alert'] = $alert;

      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('lop/importfilelop', $data);
      $this->load->view('footer');
    }

    public function importfilelop(){ //Import file
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
            
            /*$data = array(      
                "sc"                => $rowData[0][1],
                "mdf"               => $rowData[0][22],
                "nomor_pots"        => $rowData[0][3],
                "nomor_speedy"      => $rowData[0][2],
                "nama"              => $rowData[0][8],
                "alamat"            => $rowData[0][9],
                "odp"               => $rowData[0][21],
            );*/

            $teritori               = $rowData[0][1];
            $witel                  = $rowData[0][2];
            $id_project             = $rowData[0][3];
            $pekerjaan              = $rowData[0][4];
            $cek_ed                 = $rowData[0][5];
            $program                = $rowData[0][6];
            $id_deployer            = $rowData[0][7];
            $nilai_rekon            = $rowData[0][8];
            $bulan_tahun_pekerjaan  = $rowData[0][9];
            $status_pekerjaan       = $rowData[0][10];
            $pr                     = $rowData[0][11];
            $non_po                 = $rowData[0][12];
            $ba_rekon               = $rowData[0][13];
            $bast                   = $rowData[0][14];
            $inv                    = $rowData[0][15];
            $dok_rekon_ba           = $rowData[0][16];
            $dok_ba                 = $rowData[0][17];
            $bulan_bast             = $rowData[0][18];
            $status                 = $rowData[0][19];
            $anggaran               = $rowData[0][20];
            $gm_pm                  = $rowData[0][21];
            $nilai_awal_netoff      = $rowData[0][22];
            $po_manual_108          = $rowData[0][23];
            $vestina                = $rowData[0][24];
            $no_vestina             = $rowData[0][25];
            $cek_ed                 = $rowData[0][27];
            $urgent                 = $rowData[0][28];
            $keterangan_durk        = $rowData[0][29];
            $status_vestina         = $rowData[0][30];
            $checklist_ho           = $rowData[0][31];
            $bo                     = $rowData[0][32];
            $ba_drm                 = $rowData[0][33];
            $ba_comtest             = $rowData[0][34];
            $ba_abd                 = $rowData[0][35];
            $baut                   = $rowData[0][36];
            $ba_rekon               = $rowData[0][37];
            $npi                    = $rowData[0][38];
            $njki                   = $rowData[0][39];
            $pelimpahan             = $rowData[0][40];
            $pr                     = $rowData[0][41];
            $po                     = $rowData[0][42];
            $bast                   = $rowData[0][43];
            $pelimpahan2            = $rowData[0][44];

            $sql = 'INSERT INTO data_lop (teritori, witel, id_project, pekerjaan, cek_ed, program, id_deployer, nilai_rekon, bulan_tahun_pekerjaan, status_pekerjaan, pr, non_po, ba_rekon, bast, inv, dok_rekon_ba, dok_ba, bulan_bast, status, anggaran, gm_pm, nilai_awal_netoff, po_manual_108, vestina, no_vestina, cek_ed, keterangan_durk, status_vestina, checklist_ho, bo, ba_drm, ba_comtest, ba_abd, baut, ba_rekon, npi, njki, pelimpahan, pr, po, bast, pelimpahan2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON CONFLICT (pekerjaan) DO UPDATE SET 
              teritori                = excluded.teritori, 
              witel                   = excluded.witel, 
              id_project              = excluded.id_project, 
              cek_ed                  = excluded.cek_ed,  
              program                 = excluded.program, 
              id_deployer             = excluded.id_deployer,
              nilai_rekon             = excluded.nilai_rekon,
              bulan_tahun_pekerjaan   = excluded.bulan_tahun_pekerjaan,
              status_pekerjaan        = excluded.status_pekerjaan,
              pr                      = excluded.pr,
              non_po                  = excluded.non_po,
              ba_rekon                = excluded.ba_rekon,
              bast                    = excluded.bast,
              inv                     = excluded.inv,
              dok_rekon_ba            = excluded.dok_rekon_ba,
              dok_ba                  = excluded.dok_ba,
              bulan_bast              = excluded.bulan_bast,
              status                  = excluded.status,
              anggaran                = excluded.anggaran,
              gm_pm                   = excluded.gm_pm,
              nilai_awal_netoff       = excluded.nilai_awal_netoff,
              po_manual_108           = excluded.po_manual_108,
              vestina                 = excluded.vestina,
              no_vestina              = excluded.no_vestina,
              cek_ed                  = excluded.cek_ed,
              urgent                  = excluded.urgent,
              keterangan_durk         = excluded.keterangan_durk,
              status_vestina          = excluded.status_vestina,
              checklist_ho            = excluded.checklist_ho,
              bo                      = excluded.bo,
              ba_drm                  = excluded.ba_drm,
              ba_comtest              = excluded.ba_comtest,
              ba_abd                  = excluded.ba_abd,
              baut                    = excluded.baut,
              ba_rekon                = excluded.ba_rekon,
              npi                     = excluded.npi,
              njki                    = excluded.njki,
              pelimpahan              = excluded.pelimpahan,
              pr                      = excluded.pr,
              po                      = excluded.po,
              bast                    = excluded.bast,
              pelimpahan2             = excluded.pelimpahan2';

            $query = $this->db->query($sql, array($teritori ,$witel ,$id_project, $pekerjaan , $cek_ed, $program, $id_deployer, $nilai_rekon, $bulan_tahun_pekerjaan , $status_pekerjaan, $pr , $non_po, $ba_rekon, $bast, $inv, $dok_rekon_ba, $dok_ba, $bulan_bast, $status, $anggaran ,$gm_pm, $nilai_awal_netoff, $po_manual_108, $vestina, $no_vestina, $cek_ed, $urgent, $keterangan_durk , $status_vestina, $checklist_ho, $bo, $ba_drm, $ba_comtest, $ba_abd, $baut, $ba_rekon, $npi ,$njki, $pelimpahan, $pr, $po, $bast, $pelimpahan2));
            
            //$insert = $this->db->insert("data_rekon", $data);                   // Sesuaikan nama dengan nama tabel untuk melakukan insert data
            //delete_files($media['file_path']);                                  // menghapus semua file .xls yang diupload
        }
        
        redirect(base_url('lop/importfilelop/success'));
    }    

    public function show_data(){ //All data use Data HR Sec 
      $data['rekon'] = $this->modelrekon->get_all_data('data_rekon');

      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('rekon/data_rekon', $data);
      $this->load->view('footer');
    }

    public function upload_ba($nomor_speedy){
      $data['datpel'] = $this->modelrekon->getselectdata('data_rekon', $nomor_speedy);  

      $this->load->view('header');
      $this->load->view('aside');
      $this->load->view('rekon/upload_ba', $data);
      $this->load->view('footer');
    }
}
?>