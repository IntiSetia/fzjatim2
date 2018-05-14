<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
ini_set('max_execution_time', 100000000);
ini_set('memory_limit', '-1');

class hrperformance extends CI_Controller {
	function __construct() {
      parent::__construct();

        /*if (!logged_in())
            redirect('index.php/login');*/

      $this->load->database();
      $this->load->library('PHPExcel');
      $this->load->helper('url');
      $this->load->model('hr');

        if ($this->session->userdata('login')!==TRUE)
            redirect('index.php/login/viewlogin');
    }

	public function index()
	{

        $data['data_hr'] 	= $this->hr->get_all_data('data_hr_sec'); //All data use Data HR Sec

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('hr/data_hr', $data);
		$this->load->view('footer');
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
		$this->load->view('hr/import_data_hr', $data);
		$this->load->view('footer');
	}

    public function importfile(){ //Import file
        $fileName = time() . $_FILES['fileImport']['name'];                     // Sesuai dengan nama Tag Input/Upload

        $this->db->empty_table('data_hr');
        $this->db->empty_table('data_hr_sec');

        $config['upload_path'] = './fileExcel/';                                // Buat folder dengan nama "fileExcel" di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);

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
                "object_id"     => $rowData[0][0],
                "position_name" => $rowData[0][1],
                "nik"           => $rowData[0][2],
                "nama"          => $rowData[0][3],
                "psa"           => $rowData[0][4],
                "witel"         => $rowData[0][5],
                "teritory"      => $rowData[0][6],
                "regional"      => $rowData[0][7],
                "level"         => $rowData[0][8],
                "bizpart_id"    => $rowData[0][9],
                "direktorat"    => $rowData[0][10],
                "unit"          => $rowData[0][11],
                "sub_unit"      => $rowData[0][12],
                "group"         => $rowData[0][13],
                "sub_group"     => $rowData[0][14],
                "group_fungsi"  => $rowData[0][15],
                "cost_center"   => $rowData[0][16],
                "status_pgs"    => $rowData[0][17]
            );

            $data2  = array(
                "object_id"     => $rowData[0][0],
                "nik"           => $rowData[0][2],
                "nama"          => $rowData[0][3],
                "position_name" => $rowData[0][1],
                "psa"           => $rowData[0][4]
            );
            
            $insert = $this->db->insert("data_hr", $data);                   // Sesuaikan nama dengan nama tabel untuk melakukan insert data
            $insert = $this->db->insert("data_hr_sec", $data);
            $insert = $this->db->insert("data_absendow", $data2);
            $update = $this->db->query("UPDATE data_hr_sec SET status_naker = 'aktif' WHERE data_hr_sec.object_id IN (SELECT object_id FROM data_hr)");
            $update1 = $this->db->query("UPDATE data_hr_sec SET status_naker = 'tidak aktif' WHERE data_hr_sec.object_id NOT IN (SELECT object_id FROM data_hr)");
            $update2 = $this->db->query("UPDATE data_absendow SET status_naker = 'tidak aktif' WHERE data_absendow.object_id NOT IN (SELECT object_id FROM data_hr)");
            delete_files($media['file_path']);                                  // menghapus semua file .xls yang diupload
        }
        
        redirect(base_url('index.php/hrperformance/import/success'));
    }

    public function import_km(){ //All data use Data HR Sec
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Success!!';
        }
        $data['_alert'] = $alert;

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('hr/import_data_km', $data);
        $this->load->view('footer');
    }

	public function detail($id){
		$data['data_hr'] 	= $this->hr->get_data_currently($id); //All data use Data HR Sec


        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('hr/detail_data_hr', $data);
		$this->load->view('footer');
	}

	public function view_edit($id){
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Success!!';
        }
        $data['_alert']     = "success";
		$data['data_hr'] 	= $this->hr->get_data_currently($id); //All data use Data HR Sec
        $data['id']         = $id;

		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('hr/edit_data_hr', $data);
		$this->load->view('footer');
	}

	public function edit()
	{
		$data = array(
			'object_id' 		=> $this->input->post('object_id'),
            'nama' 				=> $this->input->post('nama'),
            'position_name' 	=> $this->input->post('position_name'),
            'psa' 				=> $this->input->post('psa'),
            'witel' 			=> $this->input->post('witel'),
            'teritory' 			=> $this->input->post('teritory'),
            'regional' 			=> $this->input->post('regional'),
            'level' 			=> $this->input->post('level'),
            'bizpart_id' 		=> $this->input->post('bizpart_id'),
            'direktorat' 		=> $this->input->post('direktorat'),
            'unit' 				=> $this->input->post('unit'),
            'sub_unit' 			=> $this->input->post('sub_unit'),
            'group'				=> $this->input->post('group'),
            'group_fungsi' 		=> $this->input->post('group_fungsi'),
            'cost_center' 		=> $this->input->post('cost_center'),
            'status_pgs' 		=> $this->input->post('status_pgs')
        );

        $where = array(
            'nik' 				=> $this->input->post('nik')
    	);

    	$this->hr->update('data_hr', $data, $where);
    	$this->hr->update('data_hr_sec', $data, $where);
	}

	//PIK START
	public function ajax_list()
    {
        $list = $this->hr->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $haer) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $haer->nik;
            $row[] = $haer->nama;
            $row[] = $haer->position_name;
            $row[] = $haer->psa;
            $row[] = $haer->direktorat;
            $row[] = $haer->unit;
            $row[] = $haer->sub_unit;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->customers->count_all(),
                        "recordsFiltered" => $this->customers->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    //PIK END

    public function upload_img($id){
                $inti = $_FILES['filePhoto']['name'];
                
                $config['upload_path']          = './profil/';
                $config['allowed_types']        = 'pdf|jpg|png|doc|docx';

                $this->load->library('upload', $config);
 
                if (!$this->upload->do_upload('filePhoto')) {
                        $error = array('error' => $this->upload->display_errors());
                        echo "<script>alert('Foto profil baru gagal di-upload')</script>";
                }
                else {
                        $data = array('upload_data' => $this->upload->data());
                        echo "<script>alert('Foto profil baru berhasil ditambahkan')</script>";
                }

        $data = array(
            'foto'        => $inti
             );
        $where = array(
        'nik' => $id
            );
        $this->hr->update('data_hr_sec', $data, $where);
        redirect(base_url('index.php/hrperformance/view_edit/' . $id),'refresh');
    }

    function input_kontrak(){
        $nik                = $this->input->post('nik');
        $data['data_sm']    = $this->hr->get_data($nik);
        $data['nik']        = $nik;

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

        /*foreach ($data['data_sm'] as $a) {
            $level      = $a['level'];
            if ($level !== "Site Manager" || $level !== "Team Leader" ){
                $msg    = $this->uri->segment(3);
                $alert  = '';
                if($msg == 'success'){
                    $alert  = 'Success!!';
                }
                $data['_alert'] = "KM untuk NIK : " . $nik_sm . " tidak tersedia";
                $this->load->view('header');
                $this->load->view('aside');
                $this->load->view('hr/input_kontrak', $data);
                $this->load->view('footer');
            } else {
                $this->load->view('header');
                $this->load->view('aside');
                $this->load->view('hr/input_kontrak', $data);
                $this->load->view('footer');
            }
        }*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('hr/input_kontrak', $data);
        $this->load->view('footer');
    }

    function input_kontrak_sm(){
        $nik_sm     = $this->input->post('nik');

        $data['data_sm']    = $this->hr->get_data_sm($nik_sm);
        $data['nik']        = $nik_sm;

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

        foreach ($data['data_sm'] as $a) {
            $level      = $a['level'];
            if ($level !== "Site Manager" || $level !== "Team Leader" ){
                $msg    = $this->uri->segment(3);
                $alert  = '';
                if($msg == 'success'){
                    $alert  = 'Success!!';
                }
                $data['_alert'] = "KM untuk NIK : " . $nik_sm . " tidak tersedia";
                $this->load->view('header');
                $this->load->view('aside');
                $this->load->view('hr/input_kontrak_sm', $data);
                $this->load->view('footer');
            } else {
                $this->load->view('header');
                $this->load->view('aside');
                $this->load->view('hr/input_kontrak_sm', $data);
                $this->load->view('footer');
            }
        }

                /*$this->load->view('header');
                $this->load->view('aside');
                $this->load->view('hr/input_kontrak_sm', $data);
                $this->load->view('footer');*/
    }

    function input_kontrak_tl(){
         $nik_tl     = $this->input->post('nik');

        $data['data_tl']    = $this->hr->get_data_sm($nik_tl);
        $data['nik']        = $nik_tl;

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('hr/input_kontrak_tl', $data);
        $this->load->view('footer');
    }

    function kontrak_management_sm($nik){
	    $data['data_km']   = $this->hr->data($nik);

	    //SHOW DATA
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

        /*$data['sm']    = $this->hr->get_data_sm($nik);
        $data['km']    = $this->hr->get_data_km($nik);

        $data['financial']  = "";
        $data['customer']   = "";
        $data['internal']   = "";
        $data['learning']   = "";

        $data['km_sm_prov']    = "";
        foreach ($data['sm'] as $a) {
            $position_name         = $a['position_name'];

            $where                 = array(
                'nik'   => $a['nik']
            );

            if ($position_name == "Site Manager Provisioning"){
                $data['nilai_km']    = $this->hr->selectwhereall('data_km_sm_prov', $nik);
            }
            $data['financial']     = $this->hr->get_data_indikator('data_indikator_km', 'FINANCIAL', $position_name);
            $data['customer']      = $this->hr->get_data_indikator('data_indikator_km', 'CUSTOMER', $position_name);
            $data['internal']      = $this->hr->get_data_indikator('data_indikator_km', 'INTERNAL BUSINESS PROCESS', $position_name);
            $data['learning']      = $this->hr->get_data_indikator('data_indikator_km', 'LEARNING & GROWTH', $position_name);
        }*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('hr/kontrak_management_sm', $data);
        $this->load->view('footer');

        /*if ($data['km'] == NULL){
            $data['alert']  = 'KM untuk NIK tersebut tidak tersedia!!';
            $this->load->view('header');
            $this->load->view('aside');
            $this->load->view('hr/kontrak_management_sm', $data);
            $this->load->view('footer');
        } else {
            $this->load->view('header');
            $this->load->view('aside');
            $this->load->view('hr/kontrak_management_sm', $data);
            $this->load->view('footer');
        }*/
    }

     function kontrak_management_tl(){
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('hr/kontrak_management_tl');
        $this->load->view('footer');
    }

    function input_data_km(){
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('hr/input_data_km');
        $this->load->view('footer');
    }

    function dokumen(){
        $fileName = $_FILES['doc']['name'];

        $config['upload_path']      = './dokumenhr/';
        $config['file_name']        = $fileName;
        $config['allowed_types']    = 'jpg|pdf|doc|docx';

        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('doc'))
            $this->upload->display_errors();
        $media = $this->upload->data('doc');

        $nik        = $this->input->post('nik');
        $namadoc    = $this->input->post('namadoc');

        if ($namadoc == "BPJS"){
            $where = array(
                'nik'   => $nik
            );

            $data   = array(
                'bpjs'  => $fileName
            );

            $this->hr->update('data_hr_sec', $data, $where);
            redirect(base_url('index.php/hrperformance/view_edit/'.$nik));
        } else if ($namadoc == "BASTS"){
            $where = array(
                'nik'   => $nik
            );

            $data   = array(
                'ba_serah_terima_seragam'  => $fileName
            );

            $this->hr->update('data_hr_sec', $data, $where);
            redirect(base_url('index.php/hrperformance/view_edit/'.$nik));
        }

        /*$data       = array(
            'nik'       => $nik,
            'namadoc'   => $namadoc,
            'doc'       => $fileName
        );*/

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
    }

    function apeldow(){
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Success!!';
        }
        $data['_alert'] = $alert;

        $data['posisi']         = $this->hr->posisi();
        $data['nama_naker']     = $this->hr->nama_naker();

        /*echo "<pre>";
        print_r($data['nama_naker']);
        echo "</pre>";*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('hr/absen_apeldow', $data);
        $this->load->view('footer');
    }

    /*function apeldowe(){
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Success!!';
        }
        $data['_alert'] = $alert;

        $data['posisi']         = $this->hr->posisi();
        $data['nama_naker']     = $this->hr->nama_naker();

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('hr/Absen_Apel', $data);
        $this->load->view('footer');
    }*/

    function apel_dow(){
        $tgl    = $this->input->post('tanggal');
        $nama   = $this->input->post('nama');
        $nik    = $this->input->post('nik');
        $alasan = $this->input->post('alasan');

        foreach ($nama as $key => $item){
                 $data = array(
                     "nik"      => $nik[$key],
                     "tanggal"  => $tgl,
                     "alasan"   => $alasan[$key]
                 );
        }

        echo "<pre>";
        print_r($nama);
        echo "</pre>";

//        if ($this->hr->add_tgl('data_absendowbaru', $data) == TRUE) {
//            redirect(base_url('index.php/hrperformance/apeldow/success'));
//        };

    }

    function seragam(){
	    $data['dt_seragam'] = $this->hr->get_data_seragam();
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('hr/seragam', $data);
        $this->load->view('footer');
    }

    function tambah_seragam(){
	    if ($this->input->post('submit')){
	        if ($this->hr->add_seragam() == TRUE){
                $this->session->set_flashdata('notif','Tambah Seragam Berhasil !');
                redirect(base_url('index.php/hrperformance/seragam'));
            } else {
                $this->load->view('header');
                $this->load->view('aside');
                $this->load->view('hr/seragam');
                $this->load->view('footer');
            }
        }
    }

    function input_ba($id){
        if ($this->input->post('submit')){
            $configs['upload_path'] = './assets/uploads/bpjs/';
            $configs['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
            $configs['max_size']  = '1000000';

            $this->upload->initialize($configs);

            if ($this->upload->do_upload('docbpjs')){
                if ($this->hr->kirim_bpjs($this->upload->data()) == TRUE){
                    $this->session->set_flashdata('notif','Input BPJS Berhasil !');
                    redirect('index.php/hrperformance/view_edit/'.$id);
                } else {
                    redirect('index.php/hrperformance/view_edit/'.$id);
                }
            } else {
                /*$this->session->set_flashdata('notif',$this->upload->display_errors());
                redirect('index.php/hrperformance/view_edit/'.$id);*/
                $config['upload_path'] = './assets/uploads/seragam/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
                $config['max_size']  = '1000000';

                $this->upload->initialize($config);

                if ($this->upload->do_upload('docseragam')){
                    if ($this->hr->kurang_stok($this->upload->data()) == TRUE){
                        $this->session->set_flashdata('notif','Input BA Seragam Berhasil !');
                        redirect('index.php/hrperformance/view_edit/'.$id);
                    } else {
                        $this->session->set_flashdata('notif','gagal');
                        redirect('index.php/hrperformance/view_edit/'.$id);
                    }
                } else {
                    if ($this->hr->kurang_stok('kosong') == TRUE){
                        redirect('index.php/hrperformance/view_edit/'.$id);
                    } else {
                        $this->session->set_flashdata('notif',$this->upload->display_errors());
                        redirect('index.php/hrperformance/view_edit/'.$id);
                    }
                }
            }
        }
    }
}