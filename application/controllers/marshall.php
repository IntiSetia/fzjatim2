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
                'tgl'                   => $tgl,
                'psa'                   => $witel,
                'jenis_finding'         => $jenisf,
                'jenis_instalasi'       => $jenisi,
                'lokasi'		        => $lokasi,
                'penemuan'              => $temuanall,
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

    function update(){
        $table  = 'data_marshall';
        $no     = $this->uri->segment(3);
        $data   = array(
            'tgl'                   => $this->input->post('tgl'),
            'psa'                   => $this->input->post('wilayah'),
            'jenis_finding'         => $this->input->post('jenisf'),
            'jenis_instalasi'       => $this->input->post('jenisi'),
            'lokasi'		        => $this->input->post('lokasi'),
            'penemuan'              => $this->input->post('penemuan'),
            'tindakan_perbaikan'   	=> $this->input->post('tindakan'),
            'jenis_pelanggaran'     => $this->input->post('jenisp'),
            'pic'        			=> $this->input->post('pic'),
            'target'           		=> $this->input->post('target'),
            'status'           		=> $this->input->post('status'),
            'catatan'             	=> $this->input->post('catatan'),
            //'gambar'          		=> $fileName,
            'inputer'               => $this->input->post('marshall'),
            'unit_marshall'         => $this->input->post('unit')
        );

        $this->db->where('no', $no)->update($table ,$data);
        redirect(base_url('index.php/marshall/data_sampling_marshall'));
        if($this->db->affected_rows() > 0)
        {
            return TRUE;
            redirect(base_url('index.php/marshall/data_sampling_marshall'));
        }
        else
        {
            return FALSE;
            redirect(base_url('index.php/marshall/data_sampling_marshall'));
        }
    }

    function data_sampling_marshall(){
        $table = 'data_marshall';
        $psa   = $this->session->userdata('psa');
        $data['sampling_marshall'] = $this->modelmarshall->get_with_psa($table, $psa);

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/data_sampling_marshall',$data);
        $this->load->view('footer');
    }

    function data_jadwal_marshall(){
        $table = 'data_jadwal_marshall';
        $bulan   = $this->session->userdata('bulan');
        $data['jadwal_marshall'] = $this->modelmarshall->get_with_bulan($table, $bulan);

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/report_jadwal',$data);
        $this->load->view('footer');
    }

    function update_sampling_marshall(){
        $table = 'data_marshall';
        $no    = $this->uri->segment(3);
        //var_dump($this->modelmarshall->get_all_result('data_marshall'));
        $data['value'] = $this->modelmarshall->get_with_no($table,$no);

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/edit_form',$data);
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
        $bulan = $this->input->post('bulan');
        if($bulan != '') {
            redirect(base_url() . "index.php/marshall/report_statistik/" . $bulan . "/2018");
        }

        $data['tahun_now']      = $thn = gmdate("Y");
        $data['bulan_now']      = $thn = gmdate("m");
        $data['bulan_now2']     = $thn = gmdate("M");

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/report_statistik');
        $this->load->view('footer_jose',$data);
    }

    function report_jadwal_marshall()
    {
        $table = 'data_jadwal_marshal';
        $bulan   = $this->input->post('bulan');
        if($bulan != '') {
            $data['jadwal_marshall_malang']     = $this->modelmarshall->get_jadwal_marshal('MALANG', $bulan);
            $data['jadwal_marshall_pasuruan']   = $this->modelmarshall->get_jadwal_marshal('PASURUAN', $bulan);
            $data['jadwal_marshall_madiun']     = $this->modelmarshall->get_jadwal_marshal('MADIUN', $bulan);
            $data['jadwal_marshall_jember']     = $this->modelmarshall->get_jadwal_marshal('JEMBER', $bulan);
            $data['jadwal_marshall_kediri']     = $this->modelmarshall->get_jadwal_marshal('KEDIRI', $bulan);
        }
        else{
            $bulan = '1';
            $data['jadwal_marshall_malang']     = $this->modelmarshall->get_jadwal_marshal('MALANG', $bulan);
            $data['jadwal_marshall_pasuruan']   = $this->modelmarshall->get_jadwal_marshal('PASURUAN', $bulan);
            $data['jadwal_marshall_madiun']     = $this->modelmarshall->get_jadwal_marshal('MADIUN', $bulan);
            $data['jadwal_marshall_jember']     = $this->modelmarshall->get_jadwal_marshal('JEMBER', $bulan);
            $data['jadwal_marshall_kediri']     = $this->modelmarshall->get_jadwal_marshal('KEDIRI', $bulan);
        }
        switch($bulan){
        case "1":
            $bulan = "Januari";
        break;
        case "2":
            $bulan = "Februari";
        break;
        case "3":
            $bulan = "Maret";
        break;
        case "4":
            $bulan = "April";
        break;
        case "5":
            $bulan = "Mei";
        break;
        case "6":
            $bulan = "Juni";
        break;
        case "7":
            $bulan = "Juli";
        break;
        case "8":
            $bulan = "Agustus";
        break;
        case "9":
            $bulan = "September";
        break;
        case "10":
            $bulan = "Oktober";
        break;
        case "11":
            $bulan = "November";
        break;
        case "12":
            $bulan = "Desember";
        break;
        }
        $data['header'] = $bulan;

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('marshall/report_jadwal',$data);
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

    function delete_sampling_marshall()
    {
      $table = 'data_marshall';
      $no    = $this->uri->segment(3);
      if ($this->session->userdata('login') == TRUE)
      {
          if ($this->modelmarshall->delete($table, $no) == TRUE)
          {
              $this->session->set_flashdata('notif','Hapus data berhasil !');
              redirect('marshall/data_sampling_marshall');
          } else {
              $this->session->set_flashdata('notif','Hapus data gagal !');
              redirect('marshall/data_sampling_marshall');
          }
      } else {
          redirect('marshall/data_sampling_marshall');
      }
    }
}