<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('mtagihan');
        $this->load->library('session');

        if ($this->session->userdata('login')!==TRUE)
            redirect('index.php/login');
    }

    function input(){

        //$this->load->view('myform', array('states' => $states ));

        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Pekerjaan berhasil ditambahkan!';
        }
        $data['_alert']     = $alert;
        $data['listitem']   = $this->mtagihan->get_list('list_item');

        //ALL KHS
        $data['khs']        = $this->mtagihan->get_data_khs('khs');

        //KHS TELKOM
        $data['khstelkom']  = $this->mtagihan->get_data_khs_jenis('khs', 'telkom');

        //KHS MITRA
        $data['khsmitra']   = $this->mtagihan->get_data_khs_jenis('khs', 'mitra');

        $data['designator'] = $this->mtagihan->get_listitemnonid('list_item');

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('tagihan/input_pekerjaan_baru', $data);
        $this->load->view('footer');
    }

    function inputplan(){

        //$this->load->view('myform', array('states' => $states ));

        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = '<b>PLAN PEKERJAAN BERHASIL DITAMBAHKAN!</b>';
        }
        $data['_alert']     = $alert;
        $data['listitem']   = $this->mtagihan->get_list('list_item');

        //ALL KHS
        $data['khs']        = $this->mtagihan->get_data_khs('khs');

        //KHS TELKOM
        $data['khstelkom']  = $this->mtagihan->get_data_khs_jenis('khs', 'telkom');

        //KHS MITRA
        $data['khsmitra']   = $this->mtagihan->get_data_khs_jenis('khs', 'mitra');

        //ID SYSTEM
        $data['id']         = $this->mtagihan->get_data('data_planper', 'id');

        $data['designator'] = $this->mtagihan->get_listitemnonid('list_item');

        /*echo "<pre>";
        print_r($data['id']);
        echo "</pre>";*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('tagihan/input_plan', $data);
        $this->load->view('footer');
    }

    public function add_pekerjaan(){
        $maker              = $this->input->post('maker');
        $tanggal            = $this->input->post('tanggal');
        $idp                = $this->input->post('idp');
        $idv                = $this->input->post('idv');
        $pekerjaan          = $this->input->post('nama_pekerjaan');
        $jenis_pekerjaan    = $this->input->post('jenis_pekerjaan');
        $pengawas_lapangan  = $this->input->post('pengawas_lapangan');
        $nama_mitra         = $this->input->post('nama_mitra');
        $id_spmk            = $this->input->post('id_spmk');

        //TELKOM
        $khs                = $this->input->post('khs');
        $nama_khs2          = $this->mtagihan->get_nama_khs('khs', $khs);
        $nama_khs           = "";
        foreach ($nama_khs2 as $a) {
            $nama_khs    = $a['nama_khs'];
        }

        //$nama_khs           = $this->mtagihan->get_nama_khs('khs', $khs);

        //Tgl: 30 Jan 2018 Disini aku mau ambil nama_khs berdasarkan $khs/id_khs nya. Nah, nampilinnya gimana ya? NGAMBIL nya I mean 

        //MITRA
        
        /*echo $tampilharga . "<br>";
        echo $maker."<br>".$tanggal."<br>".$idp."<br>".$pekerjaan."<br>".$jenis_pekerjaan;*/

        /*echo $maker."<br>".$tanggal."<br>".$idp."<br>".$idv."<br>".$idp."<br>".$pekerjaan."<br>".$jenis_pekerjaan."<br>".$pengawas_lapangan."<br>".$nama_mitra."<br>".$id_spmk."<br>".$designator."<br>".$volume."<br>".$tampilharga."<br>".$designatormitra."<br>".$volumemitra."<br>".$tampilhargamitra;*/

        if ($nama_mitra == "PT TELKOM AKSES") {

            $designator         = $this->input->post('designator');
            $tampilharga        = 0;

            foreach ($designator as $key=>$item) {
                //echo $item ."<br>";
                $mat_jas        = $this->mtagihan->get_mat_jas('list_item', $item);
                //echo $item ." ". $item2['harga_material'] ." ". $item2['harga_jasa'] . "\n";
                    $material       = $mat_jas[0]['harga_material'];
                    $jasa           = $mat_jas[0]['harga_jasa'];
                    $volume         = $this->input->post('volume');
                    $volume         = $volume[$key];
                    $harga_total    = (($volume * $material) + ($volume * $jasa));

                    $tampilharga    += $harga_total;

                    //DESIGNATOR
                    //echo $item ."<br>";
            }

            if(isset($_POST["designator"]) && is_array($_POST["designator"])){
                $designator = implode(",", $_POST["designator"]);
            }

            if(isset($_POST["volume"]) && is_array($_POST["volume"])){
                $volume = implode(",", $_POST["volume"]);
            }

            $data   = array(
                'maker'             => $maker,
                'tanggal'           => $tanggal,
                'idp'               => $idp,
                'pekerjaan'         => $pekerjaan,
                'jenis_pekerjaan'   => $jenis_pekerjaan,
                'id_vestyna'        => $idv,
                'id_spmk'           => $id_spmk,
                'waspang'           => $pengawas_lapangan,
                'mitra'             => $nama_mitra, //Ngambil disini nya langsung Pik. Mau tak masukkan database 
                'nama_khs'          => $nama_khs,
                'id_designatortelkom'   => $designator,
                'volume_telkom'         => $volume,
                'harga_telkom'          => $tampilharga,
                'approval_pek'          => "NOK",
                'approval_rek'          => "NOK"
            );

            $this->mtagihan->Add('boq_input', $data);

            redirect(base_url('index.php/tagihan/input/success'));
        } else {

            $designator         = $this->input->post('designator');
            $tampilharga        = 0;

            foreach ($designator as $key=>$item) {
                //echo $item ."<br>";
                $mat_jas        = $this->mtagihan->get_mat_jas('list_item', $item);
                //echo $item ." ". $item2['harga_material'] ." ". $item2['harga_jasa'] . "\n";
                    $material       = $mat_jas[0]['harga_material'];
                    $jasa           = $mat_jas[0]['harga_jasa'];
                    $volume         = $this->input->post('volume');
                    $volume         = $volume[$key];
                    $harga_total    = (($volume * $material) + ($volume * $jasa));

                    $tampilharga    += $harga_total;

                    //DESIGNATOR
                    //echo $item ."<br>";
            }

            if(isset($_POST["designator"]) && is_array($_POST["designator"])){
                $designator = implode(", ", $_POST["designator"]);
            }

            if(isset($_POST["volume"]) && is_array($_POST["volume"])){
                $volume = implode(", ", $_POST["volume"]);
            }

            $khsmitra                = $this->input->post('khsmitra');
            $designatormitra         = $this->input->post('designatormitra');
            $tampilhargamitra        = 0;
            foreach ($designatormitra as $key=>$item) {
                //echo $item ."<br>";
                    $mat_jas        = $this->mtagihan->get_mat_jas('list_item', $item);
                //echo $item ." ". $item2['harga_material'] ." ". $item2['harga_jasa'] . "\n";
                    $material       = $mat_jas[0]['harga_material'];
                    $jasa           = $mat_jas[0]['harga_jasa'];
                    $volume         = $this->input->post('volumemitra');
                    $volume         = $volume[$key];
                    $harga_total    = (($volume * $material) + ($volume * $jasa));

                    $tampilhargamitra    += $harga_total;

                    //DESIGNATOR
                    //echo $item ."<br>";
            }
            if(isset($_POST["designatormitra"]) && is_array($_POST["designatormitra"])){
                $designatormitra = implode(", ", $_POST["designatormitra"]);
            }

            if(isset($_POST["volumemitra"]) && is_array($_POST["volumemitra"])){
                $volumemitra = implode(", ", $_POST["volumemitra"]);
            }

            $data   = array(
                'maker'             => $maker,
                'tanggal'           => $tanggal,
                'idp'               => $idp,
                'pekerjaan'         => $pekerjaan,
                'jenis_pekerjaan'   => $jenis_pekerjaan,
                'id_vestyna'        => $idv,
                'id_spmk'           => $id_spmk,
                'waspang'           => $pengawas_lapangan,
                'mitra'             => $nama_mitra,
                'nama_khs'          => $nama_khs,
                'id_designatortelkom'   => $designator,
                'volume_telkom'         => $volume,
                'harga_telkom'          => $tampilharga,
                'id_designatormitra'    => $designatormitra,
                'volume_mitra'          => $volumemitra,
                'harga_mitra'           => $tampilhargamitra,
                'approval_pek'          => "NOK",
                'approval_rek'          => "NOK"
            );

            $this->mtagihan->Add('boq_input', $data);

            redirect(base_url('index.php/tagihan/input/success'));
        }
    }

    public function add_plan_pekerjaan(){

        $id                 = $this->input->post('id');
        $maker              = $this->input->post('maker');
        $tanggal            = $this->input->post('tanggal');
        $pekerjaan          = $this->input->post('nama_pekerjaan');
        $jenis_pekerjaan    = $this->input->post('jenis_pekerjaan');
        $id_khs             = $this->input->post('khs');
        $designator         = $this->input->post('designator');

        $tampilharga        = 0;
        foreach ($designator as $key=>$item) {
            //echo $item ."<br>";
            $mat_jas        = $this->mtagihan->get_mat_jas('list_item', $item);
            //echo $item ." ". $item2['harga_material'] ." ". $item2['harga_jasa'] . "\n";
                $material       = $mat_jas[0]['harga_material'];
                $jasa           = $mat_jas[0]['harga_jasa'];
                $volume         = $this->input->post('volume');
                $volume         = $volume[$key];
                $harga_total    = (($volume * $material) + ($volume * $jasa));

                $tampilharga    += $harga_total;

                //DESIGNATOR
                //echo $item ."<br>";
        }

        
        /*echo $tampilharga . "<br>";
        echo $maker."<br>".$tanggal."<br>".$idp."<br>".$pekerjaan."<br>".$jenis_pekerjaan;*/

        if(isset($_POST["designator"]) && is_array($_POST["designator"])){
            $designator = implode(", ", $_POST["designator"]);
        }

        if(isset($_POST["volume"]) && is_array($_POST["volume"])){
            $volume = implode(", ", $_POST["volume"]);
        }

        $data   = array(
            'id'                => $id,
            'maker'             => $maker,
            'tanggal'           => $tanggal,
            'pekerjaan'         => $pekerjaan,
            'jenis_pekerjaan'   => $jenis_pekerjaan,
            'khs'               => $id_khs,
            'id_designator'     => $designator,
            'volume'            => $volume,
            'harga'             => $tampilharga,
            'approval'          => "NOK"
        );

        $this->mtagihan->Add('data_planper', $data);

        redirect(base_url('index.php/tagihan/inputplan/success'));
        
    }

    public function listitemdesignatortelkom()
    {
        $id_khs             = $this->input->post('khstelkom');
        $designator         = $this->mtagihan->get_listitem('list_item', $id_khs);

        echo '<option value=" "> Pilih Designator </option>';
        foreach ($designator as $d) {
            echo "<option value='".$d['id_designator']."'>" . $d['id_designator'] . "</option>";
        }
    }

    public function listitemdesignatormitra()
    {
        $id_khs             = $this->input->post('khsmitra');
        $designator         = $this->mtagihan->get_listitem('list_item', $id_khs);

        echo '<option value=" "> Pilih Designator </option>';
        foreach ($designator as $d) {
            echo "<option value='".$d['id_designator']."'>" . $d['id_designator'] . "</option>";
        }
    }

    function listnonapproved(){
        $data['listnonapproved']   = $this->mtagihan->get_listnonapproved('boq_input');

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('tagihan/list_non_approved', $data);
        $this->load->view('footer');
    }

    function approval1($id){
        /*echo $id;*/
        $data = array(
            'approve1' => "Approved"
        );

        $where = array(
            'idp' => $id
        );

        $this->mtagihan->update_approve('boq_input', $data, $where);
        redirect('index.php/tagihan/listnonapproved');
    }

    function listapproved(){
        $data['listapproved']   = $this->mtagihan->get_listapproved('boq_input');

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('tagihan/list_non_approved', $data);
        $this->load->view('footer');
    }

    public function listplanpek()
    {
        $plan_pek   = $this->input->post('jenis_pekerjaan');

        $where = array(
            'jenis_pekerjaan'   => $plan_pek,
            'approval'          => "OK"
        );

        $plan_pek_baru   = $this->mtagihan->get_plan_pek('data_planper', $where);

        if ($plan_pek_baru !== NULL) {
            foreach ($plan_pek_baru as $d) {
                echo '<option value=" "> Pilih Plan Pekerjaan </option>';
                echo "<option value='".$d['id']."'>" . $d['pekerjaan'] . "</option>";
            }
        } else {
            echo '<option value=" ">Tidak Ada Plan Pekerjaan</option>';
        }
        
    }

    public function detaildatapekerjaan()
    {
        $id     = $this->input->post('plan_pek_baru');

        $where = array(
            'id'    => $id,
        );

        $detailpekerjaan   = $this->mtagihan->get_detailpek('data_planper', $where);

        foreach ($detailpekerjaan as $d) {
            echo "
            <div class'box box-primar' >
                    <form action'" . base_url('index.php/tagihan/add_pekerjaan'). "' method='post' enctype='multipart/form-data'>
                        <div class='form-horizontal'>
                            <div class='box-body'>
                                <div class='form-group'>
                                    <input class='form-control' type='hidden' value='" . $this->session->userdata('username'). "' name='maker'/>
                                </div>


                        <div class='form-group'>
                        <label class='col-sm-2 control-label'>ID Project</label>
                            <div class='col-sm-10'>
                                <input class='form-control' type='text' placeholder='ID Project' name='idp' value='".$d['idp']. "'required/>
                            </div>
                        </div>
                            </div>
                        </div>
            </div>";
        }
    }

    function getmaterialjasa(){
        $designator     = $this->input->post('designator');
        $matjas         = $this->mtagihan->get_mat_jas('list_item', $designator);
        $to_return['harga_material']    =  $matjas[0]['harga_material'];
        $to_return['harga_jasa']        =  $matjas[0]['harga_jasa'];
        echo json_encode($to_return);
    }

    //LIST PLAN PEKERJAAN NOK (APPROVAL) 
    function listplanpekerjaan(){
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'successplan'){
            $alert  = 'Plan Pekerjaan berhasil di ajukan kembali!';
        } else if ($msg == 'successdelete') {
            $alert  = 'Plan Pekerjaan berhasil di Delete!';
        }
        $data['_alert']                     = $alert;
        $data['listplanpekerjaanmanar']     = $this->mtagihan->getlistplanpekerjaanmanar('data_planper');
        $data['listplanpekerjaanadmin']     = $this->mtagihan->getlistplanpekerjaanadmin('data_planper');

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('tagihan/listplanpekerjaan', $data);
        $this->load->view('footer');
    }

    function approvalplan($id){
        $status         = $this->input->post('status_approval');
        $keterangan     = $this->input->post('keterangan');

        /*echo $status . " + " . $keterangan . " + " . $id; */

        $data = array(
            'approval'  => $status,
            'keterangan'=> $keterangan    
        );

        $where = array(
            'id' => $id
        );

        $this->mtagihan->update_approvalplan('data_planper', $data, $where);
        redirect('index.php/tagihan/listplanpekerjaan');
    }

    //LIST PEKERJAAN
    function listpekerjaan(){

        if($this->session->userdata('tipe_user') == "maintenance"){
            $data['listpekerjaan']   = $this->mtagihan->getlistpekerjaan('boq_input');
            $this->load->view('header');
            $this->load->view('aside');
            $this->load->view('tagihan/listpekerjaanshow', $data);
            $this->load->view('footer');
        } else {
            $data['listpekerjaan']   = $this->mtagihan->getlistpekerjaan('boq_input');
            $this->load->view('header');
            $this->load->view('aside');
            $this->load->view('tagihan/listpekerjaan', $data);
            $this->load->view('footer');
        }
    }

    function listpekerjaanall(){
        $data['listpekerjaan']   = $this->mtagihan->getlistpekerjaanallok('boq_input');
            $this->load->view('header');
            $this->load->view('aside');
            $this->load->view('tagihan/list_all_pekerjaan', $data);
            $this->load->view('footer');
    }

    function approval($id){
        $status         = $this->input->post('status_approval');
        $keterangan     = $this->input->post('keterangan');

        /*echo $status . " + " . $keterangan . " + " . $id; */

        $data = array(
            'approval_pek'  => $status,
            'ket_approval_pek'=> $keterangan    
        );

        $where = array(
            'id' => $id
        );

        $this->mtagihan->update_approvalplan('boq_input', $data, $where);
        redirect('index.php/tagihan/listpekerjaan');
    }

    //SHO
    function cek_listpekerjaan(){
        $mitra         = $this->input->post('mitra');

        if ($mitra == "PT Telkom Akses") {
            $where = array(
                'nama_mitra'    => $mitra
            );
            $this->mtagihan->get_pekta('boq_input', $where);
            redirect('index.php/tagihan/listpekerjaan');
        } else {
            $this->mtagihan->get_pekpa('boq_input');
            redirect('index.php/tagihan/listpekerjaan');
        }
    }

    public function editpekerjaan($id){
        
        $data['dataallpekerjaan']   = $this->mtagihan->get_data_currently_pek($id); //All data use Data HR Sec 

        $data['nama_khs']   = "";
        foreach ($data['dataallpekerjaan'] as $a) {
            $nakhs  = $a['khs'];
            $data['nama_khs'] = $this->mtagihan->get_one_data('khs', 'nama_khs', $nakhs);
        }

        $data['listitem']   = $this->mtagihan->get_list('list_item');

        //ALL KHS
        $data['khs']        = $this->mtagihan->get_data_khs('khs');

        //KHS TELKOM
        $data['khstelkom']  = $this->mtagihan->get_data_khs_jenis('khs', 'telkom');
        $data['designator'] = $this->mtagihan->get_listitemnonid('list_item');

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('tagihan/editpekerjaan', $data);
        $this->load->view('footer');
    }

    function edit_pekerjaan(){
        $maker              = $this->input->post('maker');
        $tanggal            = $this->input->post('tanggal');
        $id                 = $this->input->post('id');
        $pekerjaan          = $this->input->post('nama_pekerjaan');
        $jenis_pekerjaan    = $this->input->post('jenis_pekerjaan');
        $nama_khs           = $this->input->post('nama_khs'); //ketika tidak mengedit BOQ
        /*$id_khs             = $this->input->post('khs');*/ //ketika mengedit BOQ
        $designator         = $this->input->post('designator');
        $volume             = $this->input->post('volume');
        $get_id_khs         = $this->mtagihan->get_id_khs('khs', $nama_khs);

            $id_khs    = "";
            foreach ($get_id_khs as $a) {
                $id_khs    = $a['id_khs'];
            }

        //echo $maker."<br>".$tanggal."<br>".$id."<br>".$pekerjaan."<br>".$jenis_pekerjaan."<br>".$id_khs."<br>".$designator."<br>".$volume."<br>".$tampilharga;

        /*echo "<pre>";
        print_r($designator);
        print_r($volume);
        echo "</pre>";*/

        $tampilharga        = 0;
        foreach ($designator as $key=>$item) {
            //echo $item ."<br>";
            $mat_jas        = $this->mtagihan->get_mat_jas('list_item', $item);

            /*echo "<pre>";
            print_r($mat_jas);
            echo "</pre>";*/

            //echo $item ." ". $item2['harga_material'] ." ". $item2['harga_jasa'] . "\n";
            $material       = $mat_jas[0]['harga_material'];
            $jasa           = $mat_jas[0]['harga_jasa'];
            $volume         = $this->input->post('volume');
            $volume         = $volume[$key];
            $harga_total    = (($volume * $material) + ($volume * $jasa));

            $tampilharga    += $harga_total;

            //DESIGNATOR
            //echo $item ."<br>";
        }

        if(isset($_POST["designator"]) && is_array($_POST["designator"])){
            $designator = implode(",", $_POST["designator"]);
        }

        if(isset($_POST["volume"]) && is_array($_POST["volume"])){
            $volume = implode(",", $_POST["volume"]);
        }

        $data   = array(
            'maker'             => $maker,
            'tanggal'           => $tanggal,
            'pekerjaan'         => $pekerjaan,
            'jenis_pekerjaan'   => $jenis_pekerjaan,
            'khs'               => $id_khs,
            'id_designator'     => $designator,
            'volume'            => $volume,
            'harga'             => $tampilharga,
            'approval'          => "NOK"
        );

        $where  = array(
            'id'       => $id
        );

        $this->mtagihan->editpek('data_planper', $data, $where);

        redirect(base_url('index.php/tagihan/listplanpekerjaan/successplan'));

    }

    public function add_po(){
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('tagihan/add_npo');
        $this->load->view('footer');
    }

    function rekon($id){
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Pekerjaan berhasil ditambahkan!';
        }
        $data['_alert']             = $alert;
        $data['dataallpekerjaan']   = $this->mtagihan->get_data_rekon($id);

            //ALL KHS
            $data['khs']        = $this->mtagihan->get_data_khs('khs');

            //KHS TELKOM
            $data['khstelkom']  = $this->mtagihan->get_data_khs_jenis('khs', 'telkom');

            //KHS MITRA
            $data['khsmitra']   = $this->mtagihan->get_data_khs_jenis('khs', 'mitra');

            $data['designator'] = $this->mtagihan->get_listitemnonid('list_item');

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('tagihan/rekonpekerjaan', $data);
        $this->load->view('footer');
    }

    function update_rekon(){

            $id                 = $this->input->post('id');
            $designator         = $this->input->post('designator');
            $tampilharga        = 0;

            foreach ($designator as $key=>$item) {
                //echo $item ."<br>";
                $mat_jas        = $this->mtagihan->get_mat_jas('list_item', $item);
                //echo $item ." ". $item2['harga_material'] ." ". $item2['harga_jasa'] . "\n";
                    $material       = $mat_jas[0]['harga_material'];
                    $jasa           = $mat_jas[0]['harga_jasa'];
                    $volume         = $this->input->post('volume');
                    $volume         = $volume[$key];
                    $harga_total    = (($volume * $material) + ($volume * $jasa));

                    $tampilharga    += $harga_total;

                    //DESIGNATOR
                    //echo $item ."<br>";
            }

            if(isset($_POST["designator"]) && is_array($_POST["designator"])){
                $designator = implode(", ", $_POST["designator"]);
            }

            if(isset($_POST["volume"]) && is_array($_POST["volume"])){
                $volume = implode(", ", $_POST["volume"]);
            }

        $data = array(
            'id_designatorrealisasi'    => $designator,
            'volume_realisasi'          => $volume,
            'harga_realisasi'           => $tampilharga
        );

        $where = array(
            'id'                        => $id
        );

        $this->mtagihan->editpek('boq_input', $data, $where);

        redirect(base_url('index.php/tagihan/listpekerjaanall/success'));
    }

    function updatenopr($id){
        $nomor_pr     = $this->input->post('nomor_pr');

        /*echo $status . " + " . $keterangan . " + " . $id; */

        $data = array(
            'nomor_pr'  => $nomor_pr  
        );

        $where = array(
            'id' => $id
        );

        $this->mtagihan->editpek('boq_input', $data, $where);
        redirect('index.php/tagihan/listpekerjaanall');
    }

    function viewboq($id){

        $data['datadetail']     = $this->mtagihan->get_data_rekon($id);

        $detail_design          = $this->mtagihan->get_detail_designator('list_item', $id);
        $nama_design            = "";
        foreach ($nama_khs2 as $a) {
            $nama_khs    = $a['nama_khs'];
        }

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('tagihan/viewboq', $data);
        $this->load->view('footer');
    }

    function deleteplan($id){

        $this->mtagihan->delete_plan($id);

        redirect(base_url('index.php/tagihan/listplanpekerjaan/successdelete'));
    }
}