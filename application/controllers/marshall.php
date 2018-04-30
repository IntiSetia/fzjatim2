<?php
//error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Marshall extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->model('modelmarshall');
        $this->load->library('session');
        $this->load->library('image_lib');
        $this->load->library('upload');

        if ($this->session->userdata('login')!==TRUE)
            redirect('index.php/login/viewlogin');

        /*if ($this->session->userdata('login')!==TRUE)*/
            /*$data_url = array(
                'url'   => base_url(uri_string())
            );*/
            /*$this->session->set_userdata(base_url(uri_string()));*/
            /*redirect('index.php/login');*/
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
        $temuan     = $this->input->post('temuan');
        if(isset($_POST["temuan"]) && is_array($_POST["temuan"])){
            $temuanall = implode(",", $_POST["temuan"]);
        }

        $fileName = $_FILES['evident']['name'];     // Sesuai dengan nama Tag Input/Upload

        $config['upload_path']      = './marshall/';                                // Buat folder dengan nama "fileExcel" di root folder
        $config['file_name']        = $fileName;
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('evident'))
            $this->upload->display_errors();
        $media = $this->upload->data('evident');

     	$tgl              = $this->input->post('tgl');
        $witel            = $this->input->post('wilayah');
        $jenisf           = $this->input->post('jenisf');
        $jenisi           = $this->input->post('jenisi');
        $jenisp           = $this->input->post('jenisp');
        $lokasi           = $this->input->post('lokasi');
        $penemuan         = $this->input->post('penemuan');
        $tindakan    	  = $this->input->post('tindakan');
        $unit 			  = $this->input->post('unit');
        $pic  			  = $this->input->post('pic');
        $target           = $this->input->post('target');
        $status           = $this->input->post('status');
        $catatan          = $this->input->post('catatan');
        $inputer          = $this->input->post('marshall');

        /*if($inti == "") {
             $inti = NULL;
        } else {*/
            /*$config['upload_path']          = './marshall/';
            $config['allowed_types']        = 'jpeg|jpg|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('evident')) {
                $error = array('error' => $this->upload->display_errors());
                echo $error;
            } else {
                $data = array('upload_data' => $this->upload->data());
                echo $data;
            }*/
         /*}*/

        $data   = array(
                'tgl'             => $tgl,
                'psa'             => $witel,
                'jenis_finding'   => $jenisf,
                'jenis_instalasi' => $jenisi,
                'lokasi'		  => $lokasi,
                'penemuan'        => $temuanall,
                'tindakan_perbaikan'   	=> $tindakan,
                'jenis_pelanggaran'     => $jenisp,
                'pic'        			=> $pic,
                'target'           		=> $target,
                'status'           		=> $status,
                'catatan'             	=> $catatan, 
                'gambar'          		=> $fileName,
                'inputer'               => $inputer,
                'unit_marshall'         => $unit
            );

        /*echo "<pre>";
        print_r($temuan);
        echo "</pre>";

        echo $temuanall;*/

        $this->modelmarshall->insert('data_marshall', $data);
        redirect(base_url('index.php/marshall/view_form/success'));
    }

    function edit_sampling_marshall(){
        $data['sampling_marshall'] = $this->modelmarshall->get_all_result('data_marshall');

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/data_sampling_marshall',$data);
        $this->load->view('footer');
    }

    function import_jadwal(){
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Success!!';
        } else if ($msg == 'jadwalnotsuccess'){
            $alert  = 'Jadwal gagal di upload!!';
        }
        $data['_alert'] = $alert;

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/input_jadwal', $data);
        $this->load->view('footer');
    }

    function input_jadwal(){

        $witel      = $this->input->post('witel');
        $bulan      = $this->input->post('bulan');
        $jadwal     = $_FILES['jadwal']['name'];                    // Sesuai dengan nama Tag Input/Upload

        $config['upload_path']      = './marshall/';                                // Buat folder dengan nama "fileExcel" di root folder
        $config['file_name']        = $jadwal;
        $config['allowed_types']    = 'xls|xlsx|pdf|docx|doc';

        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('jadwal'))
            $this->upload->display_errors();
        $media = $this->upload->data('jadwal');

        $data   = array(
            'witel'             => $witel,
            'bulan'             => $bulan,
            'jadwal'            => $jadwal
        );

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

        $this->modelmarshall->insert('data_jadwal_marshal', $data);
        redirect(base_url('index.php/marshall/import_jadwal/success'));

    }

    function report_marshall(){
        $data['marshall'] = $this->modelmarshall->get_with_hr();

        /*echo "<pre>";
        print_r($data['marshall']);
        echo "</pre>";*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/report_marshall2', $data);
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

    function detail_marshall($id){
        $data['detail'] = $this->modelmarshall->get_with_hr_where($id);

        echo "<pre>";
        print_r($data['detail']);
        echo "</pre>";

        /*$this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/detail_marshall');
        $this->load->view('footer');*/
    }

    function get_detail_marshall()
    {
        $id = $this->uri->segment(3);
        $data = $this->modelmarshall->get_with_hr_where($id);
        echo json_encode($data);
    }
}