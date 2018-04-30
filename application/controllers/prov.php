<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prov extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Cari');
        $this->load->model('RevModel');
        if ($this->session->userdata('login')!==TRUE)
            redirect('index.php/login/viewlogin');
    }


    function cobicobi()
    {
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('prov/table_');
        $this->load->view('footer');
    }

    function index()
    {
        $this->load->view('header');
        $this->load->view('aside');
        $data['target'] = $this->Cari->get_target_prov();
        $this->load->view('prov/table_ps', $data);
        $this->load->view('footer');
    }

    public function data_prov(){
        $data['psb'] = $this->RevModel->get_all_psb();
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
        $data['rev'] = $this->RevModel->get_psb();
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('prov/data_prov', $data);
        $this->load->view('footer');
    }

    public function form_prov()
    {
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('prov/form_prov');
        $this->load->view('footer');
    }

    // Untuk menambahkan data
    public function insert_prov(){
        $p_kab = $this->input->post('panjang_kabel');
        $p_pc  = $this->input->post('patch_cord');
        $p_utp = $this->input->post('kabel_utp');
        $lay = $this->input->post('layanan');
        $stb = $this->input->post('stb_kedua');
        $tiang = $this->input->post('tiang');

        if($p_kab > 100){
            $p_kab_add = $p_kab - 100;
            $b_kab_m = $p_kab_add*5200;
            $b_kab_j = $p_kab_add*3733;
            $b_kab_add = $b_kab_m+$b_kab_j;
        } else{
            $p_kab_add = 0;
            $b_kab_add = 0;
        }

        if($p_pc > 2){
            $p_pc_add = $p_pc - 2;
            $b_pc_add = $p_pc_add*7418;
        } else{
            $p_pc_add = 0;
            $b_pc_add = 0;
        }

        if($p_utp > 2){
            $p_utp_add = $p_utp - 2;
            $b_utp_add = $p_utp_add*7667;
        } else{
            $p_utp_add = 0;
            $b_utp_add = 0;
        }

        if($lay== 1){
            $b_lay = 1037553;
        } elseif($lay== 2){
            $b_lay = 1115159;
        } else{
            $b_lay = 1155613;
        }

        if($stb == 0){
            $b_stb = 0;
        } else{
            $b_stb = $stb*98045;
        }

        if($tiang == 0){
            $b_tiang = 0;
        } else{
            $b_tiang_m = $tiang*1062706;
            $b_tiang_j = $tiang*172387;
            $b_tiang = $b_tiang_m+$b_tiang_j;
        }

        $biaya = $b_lay+$b_kab_add+$b_pc_add+$b_utp_add+$b_stb+$b_tiang;

        /*$inti = $_FILES['ba_psb']['name'];

        if($inti == ""){
             $inti = NULL;
         }else{
             $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'pdf|jpg|png|doc|docx';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('ba_psb')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>alert('Berita acara gagal di-upload')</script>";
            }
            else {
                    $data = array('upload_data' => $this->upload->data());
                    echo "<script>alert('Berita acara berhasil ditambahkan')</script>";
            }
         }*/

        $fileName = $_FILES['ba_psb']['name'];

        $config['upload_path']      = './uploads/';
        $config['file_name']        = $fileName;
        $config['allowed_types']    = 'jpg|jpeg|png|pdf';
        $config['max_size']         = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('ba_psb'))
            $this->upload->display_errors();
        $media = $this->upload->data('ba_psb');

//         echo "<script>alert('Data berhasil ditambahkan')</script>";
        $data = array(
            'wilayah'		=> $this->input->post('wilayah'),
            'nomor_pots' 	=> $this->input->post('nomor_pots'),
            'nomor_speedy' 	=> $this->input->post('nomor_speedy'),
            'nama' 			=> $this->input->post('nama'),
            'alamat' 		=> $this->input->post('alamat'),
            'odp' 			=> $this->input->post('odp'),
            'ont' 			=> $this->input->post('ont'),
            'stb' 			=> $this->input->post('stb'),
            'layanan' 		=> $lay,
            'jenis_kabel' 	=> $this->input->post('jenis_kabel'),
            'panjang_kabel' => $p_kab,
            'kelebihan_kabel' => $p_kab_add,
            'tiang' 		=> $tiang,
            'patch_cord' 	=> $p_pc,
            'patch_cord_add'=> $p_pc_add,
            'kabel_utp' 	=> $p_utp,
            'kabel_utp_add' => $p_utp_add,
            'kabel_pvc' 	=> $this->input->post('kabel_pvc'),
            'stb_kedua' 	=> $stb,
            'tgl_va' 		=> $this->input->post('tgl_va'),
            'tgl_ps' 		=> $this->input->post('tgl_ps'),
            'hasil_cek_redaman' => $this->input->post('hasil_cek_redaman'),
            'ba_rev' 		=> $fileName,
            'biaya' 		=> $biaya,
            'divisi' 		=> 1
        );
        $this->RevModel->Add('data_psb',$data);
        redirect(base_url('index.php/prov/data_prov'),'refresh');
    }

    function cari_ps()
    {
        $this->load->view('header');
        $this->load->view('aside');
        $data['all'] = $this->Cari->get_all();
        $this->load->view('prov/cari_ps2', $data);
        $this->load->view('footer');
    }

    public function hasil_ps()
    {
        $no = $this->input->post('no_inet');
        $this->load->view('header');
        $this->load->view('aside');
        $data['cari'] = $this->Cari->data_ps($no);
        $data['all'] = $this->Cari->get_all();
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
        $this->load->view('prov/cari_ps2', $data);
        $this->load->view('footer');
    }

    public function data_prov_cari()
    {
        $data['psb'] = $this->Cari->get_all_prov();
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('prov/table_prov', $data);
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
        curl_setopt($data, CURLOPT_SSL_VERIFYPEER, false);
        // menjalankan CURL untuk membaca isi file
        $hasil = curl_exec($data);
        curl_close($data);
        return json_decode($hasil, true);
    }

    public function get_sc()
    {
        $noSc = $this->input->post('sc');
        $url = "https://starclick.telkom.co.id/backend/public/api/tracking?_dc=1505103195240&ScNoss=true&SearchText=" . $noSc . "&Field=ORDER_ID&limit=10";

        $kodeHTML = $this->bacaHtml("$url"); //kita kirim urlnya ke fungsi curl yang sudah kita buat
        $result = json_encode($kodeHTML['data'][0]);
        $result = json_decode($result, true);


        echo "<pre>";
        print_r($result);
        echo "</pre>";

        /*$this->load->view('header');
        $this->load->view('aside');
        $this->load->view('prov/form_prov', $result);
        $this->load->view('footer');*/

    }

    public function search_sc()
    {
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('prov/search_sc');
        $this->load->view('footer');
    }

    function dashboard()
    {
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('prov/home_prov');
        $this->load->view('footer');
    }

    function cari_rekon()
    {
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('prov/untuk_rekon');
        $this->load->view('footer');
    }

    public function hasil_rekon()
    {
        $no = $this->input->post('no_inet');
        $this->Cari->update($no);

        echo "<script>alert('Berhasil memperbarui status data')</script>";

        $data['psb'] = $this->Cari->get_rek($no);
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('prov/untuk_rekon', $data);
        $this->load->view('footer');
    }

    public function report()
    {
        $no = $this->input->post('bulan');
        $data['all_ba'] = $this->Cari->get_all_by_ba($no);
        $data['all'] = $this->Cari->get_all_by_bulan($no);
        $data['sto'] = $this->Cari->get_all_sto($no);
        $data['sto_ba'] = $this->Cari->get_sto_ba($no);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('prov/home_prov', $data);
        $this->load->view('footer');
    }


    // untuk upload
    public function form_u()
    {
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('prov/upload_file');
        $this->load->view('footer');
    }

    public function form_u2(){
        $this->load->view('prov/upload_file2');
    }

    function upload(){
        /*$inti = $_FILES['evident']['name'];

        if ($inti == "") {
            $inti = NULL;
        } else {
            $config['upload_path'] = './marshall/';
            $config['allowed_types'] = 'jpeg|jpg|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('evident')) {
                $error = array('error' => $this->upload->display_errors());
                echo "<script>alert('Berita acara gagal di-upload')</script>";
            } else {
                $data = array('upload_data' => $this->upload->data());
                echo "<script>alert('Berita acara berhasil ditambahkan')</script>";
            }
        }*/


        $gambar = $_FILES['evident']['name'];

        $config['upload_path'] = './marshall/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if (!empty($gambar)) {

            if ($this->upload->do_upload('evident')) {
                $data = array('upload_data' => $this->upload->data());
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './marshall/' . $data['evident'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 600;
                $config['height'] = 400;
                $config['new_image'] = './marshall' . $data['evident'];

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $data['evident'];
                $judul = $this->input->post('xjudul');
                $this->m_upload->simpan_upload($judul, $gambar);
                echo "Image berhasil diupload";
            }

        } else {
            echo "Image yang diupload kosong";
        }



    }


    }