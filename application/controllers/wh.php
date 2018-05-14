<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Wh extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('model_wh');
        $this->load->model('RevModel');
        $this->load->library('session');

        if ($this->session->userdata('login')!==TRUE)
            redirect('index.php/login/viewlogin');
    }

    function input_ba(){
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('warehouse/search_sc');
        $this->load->view('footer');
    }

    function bacaHtml($url)
    {
        // inisialisasi CURL
        $data = curl_init();
        // setting CURL
        curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($data, CURLOPT_URL, $url);
        curl_setopt($data, CURLOPT_HEADER, false);
        curl_setopt($data,CURLOPT_SSL_VERIFYPEER, false);
        // menjalankan CURL untuk membaca isi file
        $hasil = curl_exec($data);
        curl_close($data);
        return json_decode($hasil, true);
    }

    function get_sc(){
            /*$noSc = 8047473;*/
            $noSc = $this->input->post('sc');
            $url  = "https://starclick.telkom.co.id/backend/public/api/tracking?_dc=1505103195240&ScNoss=true&SearchText=".$noSc."&Field=ORDER_ID&limit=10";

            $kodeHTML =  $this->bacaHtml("$url"); //kita kirim urlnya ke fungsi curl yang sudah kita buat

           /* echo "<pre>";
            print_r(json_encode($kodeHTML['data'][0]));
            echo "</pre>";*/

           $result          = json_encode($kodeHTML['data'][0]);
           /*$data['sc']    = json_decode($result, true);*/
           $data['sc']      = json_encode($kodeHTML['data'][0]);

         /*echo "<pre>";
         print_r($data);
         echo "</pre>";*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('warehouse/form_input_ba', $data);
        $this->load->view('footer');
    }

    function inventaris_nonproject(){
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Data Inventaris berhasil ditambahkan!';
        } else if($msg == 'stosuccess'){
            $alert  = 'Data STO berhasil ditambahkan!';
        } else if($msg == 'barangsuccess'){
            $alert  = 'Data Barang berhasil ditambahkan!';
        }
        $data['_alert']     = $alert;

        //Get list barang
        $data['barang']     = $this->model_wh->selectnonwhere('data_barang');

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('warehouse/input_inventarisnonproject', $data);
        $this->load->view('footer');
    }

    function input_inventnonpro(){

        $fileName = $_FILES['ba_serah_terima']['name'];

        $config['upload_path']      = './dokumenhr/';
        $config['file_name']        = $fileName;
        $config['allowed_types']    = 'jpg|pdf|doc|docx';

        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('ba_serah_terima'))
            $this->upload->display_errors();
        $media = $this->upload->data('ba_serah_terima');


        $group     = $this->input->post('group');
        //echo $group;
        /*if ($group == "Seragam"){
            $s      = $this->input->post('s');
            $m      = $this->input->post('m');
            $l      = $this->input->post('l');
            $xl      = $this->input->post('xl');
            $xl2      = $this->input->post('2xl');
            $xl3      = $this->input->post('3xl');
            $xl4      = $this->input->post('4xl');
            $xl5      = $this->input->post('5xl');

            echo $s . " " . $m . " " . $l . " " . $xl . " "  .$xl2 . " " . $xl3 . " " . $xl4 . " " . $xl5;
         } else {*/

            $data = array(
                'item' => $this->input->post('group'),
                'namabarang' => $this->input->post('namabarang'),
                'jumlah' => $this->input->post('jumlah'),
                'sto' => $this->input->post('sto'),
                'witel' => $this->input->post('witel'),
                'penanggungjawab' => $this->input->post('penanggung'),
                'sn' => $this->input->post('sn'),
                'ba' => $fileName
            );

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
        /*}*/

        $this->model_wh->add('data_inventnonproject', $data);
        redirect(base_url('index.php/wh/inventaris_nonproject/success'));
    }

    function addsto(){
        $data       = array(
            'sto'   => $this->input->post('nama_sto'),
            'witel' => $this->input->post('nama_witel')
        );

        $this->model_wh->add('data_sto', $data);
        redirect(base_url('index.php/wh/inventaris_nonproject/stosuccess'));
    }

    function addbarang(){
        $data       = array(
//            'namabarang' => $this->input->post('namabarang'),
            'barang'   => $this->input->post('nama_barang')
//            'penanggung' => $this->input->post('penanggung')
        );

        $this->model_wh->add('data_barang', $data);
        redirect(base_url('index.php/wh/inventaris_nonproject/barangsuccess'));
    }

    function getsto(){
        $where = array(
            'witel'     => $this->input->post('witel')
        );

        $sto    = $this->model_wh->select('data_sto', 'sto', $where);

        if ($sto !== NULL) {
            echo "<option>Pilih STO</option>";
            foreach ($sto as $d) {
                echo "<option value='".$d['sto']."'>" . $d['sto'] . "</option>";
            }
        } else {
            echo "<option>Tidak ada STO</option>";
        }
    }

    function data_invent(){
        //Get list inventaris
        $data['invent']     = $this->model_wh->selectnonwhere('data_inventnonproject');

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('warehouse/data_inventarisnonproject', $data);
        $this->load->view('footer');
    }

    function updatedatainvent($no){
        $where = array(
            'no'     => $no
        );

        $data['jumlahtersedia']     = $this->model_wh->select('data_inventnonproject', 'jumlah', $where);

        $jumlahtersedia     = "";
        foreach ($data['jumlahtersedia'] as $a) {
            $jumlahtersedia     = $a['jumlah'];
        }


    }

    function dokumen(){
        $fileName = $_FILES['ba_serah_terima']['name'];

        $config['upload_path']      = './dokumenhr/';
        $config['file_name']        = $fileName;
        $config['allowed_types']    = 'jpg|pdf|doc|docx';

        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('ba_serah_terima'))
            $this->upload->display_errors();
        $media = $this->upload->data('ba_serah_terima');



            $data   = array(
                'ba'  => $fileName
            );

            $this->model_wh->add('data_inventnonproject', $data);
            redirect(base_url('index.php/wh/inventaris_nonproject/'));




        /*$data       = array(
            'nik'       => $nik,
            'namadoc'   => $namadoc,
            'doc'       => $fileName
        );*/

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
    }

    public function view_edit($no){
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Success!!';
        }
        $data['_alert']     = "success";
        $data['data_hr'] 	= $this->model_wh->get_data_currently($no); //All data use data_inventnonproject

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('warehouse/pinjam', $data);
        $this->load->view('footer');
    }

    public function edit()
    {
        $no = $this->input->post('no');
        $jml_barang = $this->input->post('jml_barang');
        $jumlah = $this->model_wh->kurangijumlah($no);
        $kurangijumlah = $jumlah - $jml_barang;

        $data = array(
            'no' 		    => $this->input->post('no'),
            'jml_barang' 	=> $this->input->post('jml_barang'),
            'an' 	        => $this->input->post('an'),
            'tgl_peminjaman'=> $this->input->post('tgl_peminjaman'),
            'status'        => 'Belum Dikembalikan'
        );

        $this->model_wh->add('data_peminjaman', $data);

        $datakurangijumlah = array(
            'jumlah' => $kurangijumlah
        );

        $where = array(
            'no' 	=> $this->input->post('no')
        );

        $this->model_wh->update('data_inventnonproject', $datakurangijumlah, $where);

        $data['invent']     = $this->model_wh->selectnonwhere('data_inventnonproject');

        redirect('index.php/wh/data_invent');
    }

    function data_peminjaman(){
        //Get list inventaris
        //$data['invent'] = $this->model_wh->selectnonwhere('data_peminjaman');
        $data['invent'] = $this->model_wh->data_peminjaman();

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('warehouse/data_peminjaman', $data);
        $this->load->view('footer');
    }

    function kembali()
    {
        $id_peminjaman      = $this->input->post("id_oke");
        $id_barang          = $this->input->post("id_eko");
        $tgl_pengembalian   = $this->input->post("tgl_pengembalian");
        $this->model_wh->kembali($id_peminjaman, $id_barang, $tgl_pengembalian);
        $data['invent'] = $this->model_wh->data_peminjaman();

        redirect('index.php/wh/data_peminjaman');
    }

}

