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
            redirect('index.php/login/viewlogin');
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
        /*$this->load->view('tagihan/input_pekerjaan_baru2', $data);*/
        $this->load->view('footer');
    }

    function inputplan(){

        //$this->load->view('myform', array('states' => $states ));

        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $terakhirinput  = $this->mtagihan->get_data_last('data_planper', 'id');
            foreach ($terakhirinput as $a){
                $nama_khs2          = $this->mtagihan->get_nama_khs('khs', $a['khs']);
                $nama_khs           = "";
                foreach ($nama_khs2 as $a) {
                    $nama_khs    = $a['nama_khs'];
                }

                $alert  = "<b>PLAN PEKERJAAN BERHASIL DITAMBAHKAN!</b> ";
            }
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
        //Tgl: 30 Jan 2018 Disini aku mau ambil nama_khs berdasarkan $khs/id_khs nya. Nah, nampilinnya gimana ya? NGAMBIL nya I mean

        $maker              = $this->input->post('maker');
        $tanggal            = $this->input->post('tanggal');
        $idp                = $this->input->post('idp');
        $pekerjaan          = $this->input->post('nama_pekerjaan');
        $jenis_pekerjaan    = $this->input->post('jenis_pekerjaan');
        $idv                = $this->input->post('idv');
        $id_spmk            = $this->input->post('idspmk');
        $pengawas_lapangan  = $this->input->post('waspang');
        $nama_mitra         = $this->input->post('nama_mitra');
        $witel              = $this->input->post('witel');

        if($nama_mitra == "PT TELKOM AKSES") {
            $id_khs             = $this->input->post('khs');
            $designator         = $this->input->post('designator');
            $tampilharga = 0;
            foreach ($designator as $key => $item) {
                //echo $item ."<br>";
                $mat_jas    = $this->mtagihan->get_mat_jas('list_item', $item);
                //echo $item ." ". $item2['harga_material'] ." ". $item2['harga_jasa'] . "\n";
                $material   = $mat_jas[0]['harga_material'];
                $jasa       = $mat_jas[0]['harga_jasa'];

                $volume         = $this->input->post('volume');
                $volume         = $volume[$key];
                $harga_total    = (($volume * $material) + ($volume * $jasa));
                $tampilharga    += $harga_total;

                /*//VolumeJasa
                $volumejas          = $this->input->post('volumejas');
                $volumejas          = $volumejas[$key];
                $harga_total_jas    = $volumejas * $jasa;

                //VolumeMat
                $volumemat          = $this->input->post('volumemat');
                $volumemat          = $volumemat[$key];
                $harga_total_mat    = $volumemat * $material;

                $total              = $harga_total_mat + $harga_total_jas;
                $tampilharga        += $total;*/

                //DESIGNATOR
                /*echo $item."<br>".$material."<br>".$jasa."<br>".$volume;*/
            }

            if (isset($_POST["volume"]) && is_array($_POST["volume"])) {
                $volume = implode(",", $_POST["volume"]);
            }

            if (isset($_POST["designator"]) && is_array($_POST["designator"])) {
                $designator = implode(",", $_POST["designator"]);
            }

            /*if(isset($_POST["volumemat"]) && is_array($_POST["volumemat"])){
                $impvolumemat= implode(",", $_POST["volumemat"]);
            }

            if(isset($_POST["volumejas"]) && is_array($_POST["volumejas"])){
                $impvolumejas = implode(",", $_POST["volumejas"]);
            }*/

            $data = array(
                'maker'             => $maker,
                'tanggal'           => $tanggal,
                'idp'               => $idp,
                'pekerjaan'         => $pekerjaan,
                'jenis_pekerjaan'   => $jenis_pekerjaan,
                'id_vestyna'        => $idv,
                'id_spmk'           => $id_spmk,
                'waspang'           => $pengawas_lapangan,
                'mitra'             => $nama_mitra,
                'nama_khs'          => $id_khs,
                'id_designatortelkom'   => $designator,
                'volume_telkom'         => $volume,
                'harga_telkom'          => $tampilharga,
                'approval_pek'          => "NOK",
                'approval_rek'          => "NOK",
                'witel'                 => $witel/*,
                'volumemat'             => $harga_total_mat,
                'volumejas'             => $harga_total_jas*/
            );

            $this->mtagihan->Add('boq_input', $data);

            redirect(base_url('index.php/tagihan/input/success'));

        } else { //MITRA

            $id_khsmitra            = $this->input->post('khsmitra');
            $designatormitra        = $this->input->post('designatormitra');
            $tampilhargamitra       = 0;
            $tampilhargatelkom      = 0;
            foreach ($designatormitra as $key => $item) {
                //MITRA
                $matjasmitra        = $this->mtagihan->get_matjasmitra('list_item', $item);
                $materialmitra      = $matjasmitra[0]['harga_material'];
                $jasamitra          = $matjasmitra[0]['harga_jasa'];

                //TA
                $matjastelkom       = $this->mtagihan->get_mat_jas('list_item', $item);
                $materialtelkom     = $matjastelkom[0]['harga_material'];
                $jasatelkom         = $matjastelkom[0]['harga_jasa'];

                /*//VolumeJasa
                $volumejas          = $this->input->post('volumejas');
                $volumejas          = $volumejas[$key];
                //TA
                $harga_total_jas_ta         = $volumejas * $jasatelkom;
                //MITRA
                $harga_total_jas_mitra      = $volumejas * $jasamitra;

                //VolumeMat
                $volumemat          = $this->input->post('volumemat');
                $volumemat          = $volumemat[$key];
                //TA
                $harga_total_mat_ta         = $volumemat * $materialtelkom;
                //MITRA
                $harga_total_mat_mitra      = $volumemat * $materialmitra;

                //TA
                $totalta                    = $harga_total_mat_ta + $harga_total_jas_ta;
                $tampilhargatelkom          += $totalta;

                //MITRA
                $totalmitra                 = $harga_total_mat_mitra + $harga_total_jas_mitra;
                $tampilhargamitra           += $totalmitra;*/

                $volume             = $this->input->post('volumemitra');
                $volume             = $volume[$key];

                //MITRA
                $harga_totalmitra   = (($volume * $materialmitra) + ($volume * $jasamitra));
                $tampilhargamitra   += $harga_totalmitra;

                //TA
                $harga_totaltelkom  = (($volume * $materialtelkom) + ($volume * $jasatelkom));
                $tampilhargatelkom  += $harga_totaltelkom;

                //SHOW DATA
                /*echo "MITRA ".$item."<br>".$volume."<br>".$materialmitra."<br>".$jasamitra;
                echo "TELKOM ".$item."<br>".$volume."<br>".$materialtelkom."<br>".$jasatelkom;*/
            }

            if (isset($_POST["volumemitra"]) && is_array($_POST["volumemitra"])) {
                $volumemitra = implode(",", $_POST["volumemitra"]);
            }

            if (isset($_POST["designatormitra"]) && is_array($_POST["designatormitra"])) {
                $designatormitra = implode(",", $_POST["designatormitra"]);
            }

            if(isset($_POST["volumemat"]) && is_array($_POST["volumemat"])){
                $impvolumemat   = implode(",", $_POST["volumemat"]);
            }

            if(isset($_POST["volumejas"]) && is_array($_POST["volumejas"])){
                $impvolumejas   = implode(",", $_POST["volumejas"]);
            }

            $data = array(
                'maker'             => $maker,
                'tanggal'           => $tanggal,
                'idp'               => $idp,
                'pekerjaan'         => $pekerjaan,
                'jenis_pekerjaan'   => $jenis_pekerjaan,
                'id_vestyna'        => $idv,
                'id_spmk'           => $id_spmk,
                'waspang'           => $pengawas_lapangan,
                'mitra'             => $nama_mitra,
                'nama_khs'          => $id_khsmitra,
                'id_designatortelkom'   => $designatormitra,
                'volume_telkom'         => $volumemitra,
                'id_designatormitra'    => $designatormitra,
                'volume_mitra'          => $volumemitra,
                'harga_telkom'          => $tampilhargatelkom,
                'harga_mitra'           => $tampilhargamitra,
                'approval_pek'          => "NOK",
                'approval_rek'          => "NOK",
                'witel'                 => $witel/*,
                'volumemat'             => $impvolumemat,
                'volumejas'             => $impvolumejas*/
            );

            $this->mtagihan->Add('boq_input', $data);

            redirect(base_url('index.php/tagihan/input/success'));
        }
    }

    public function add_plan_pekerjaan(){
        //$id                 = $this->input->post('id');
        $maker              = $this->input->post('maker');
        $tanggal            = $this->input->post('tanggal');
        $pekerjaan          = $this->input->post('nama_pekerjaan');
        $jenis_pekerjaan    = $this->input->post('jenis_pekerjaan');
        $id_khs             = $this->input->post('khs');
        $designator         = $this->input->post('designator');
        $witel              = $this->input->post('witel');

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

                /*$mat            = $this->input->post('material');
                $mat            = $mat[$key];
                if ($mat == 0){
                    $harga_total    = $volume * $jasa;
                } else{
                    $harga_total    = (($volume * $material) + ($volume * $jasa));
                }*/

                //VolumeJasa
                /*$volumejas          = $this->input->post('volumejas');
                $volumejas          = $volumejas[$key];
                $harga_total_jas    = $volumejas * $jasa;

                //VolumeMat
                $volumemat          = $this->input->post('volumemat');
                $volumemat          = $volumemat[$key];
                $harga_total_mat    = $volumemat * $material;

                $total              = $harga_total_mat + $harga_total_jas;
                $tampilharga        += $total;*/

                //DESIGNATOR
                /*echo $item."<br>".$material."<br>".$jasa."<br>".$volumejas."<br>".$volumemat."<br>".$harga_total_mat."<br>".$harga_total_jas;*/
                /*echo $material . " " .$volume  . " " . $tampilharga . "<br>";*/
        }
        
        /*echo $tampilharga . "<br>";
        echo $maker."<br>".$tanggal."<br>".$idp."<br>".$pekerjaan."<br>".$jenis_pekerjaan;*/

        if(isset($_POST["volume"]) && is_array($_POST["volume"])){
            $volume = implode(",", $_POST["volume"]);
        }

        if(isset($_POST["designator"]) && is_array($_POST["designator"])){
            $designator = implode(",", $_POST["designator"]);
        }

        /*if(isset($_POST["designator"]) && is_array($_POST["material"])){
            $satuanmaterial = implode(",", $_POST["material"]);
        }

        if(isset($_POST["designator"]) && is_array($_POST["jasa"])){
            $satuanjasa = implode(",", $_POST["jasa"]);
        }*/

        /*if(isset($_POST["volumemat"]) && is_array($_POST["volumemat"])){
            $impvolumemat= implode(",", $_POST["volumemat"]);
        }

        if(isset($_POST["volumejas"]) && is_array($_POST["volumejas"])){
            $impvolumejas = implode(",", $_POST["volumejas"]);
        }*/

        $data   = array(
            'maker'             => $maker,
            'tanggal'           => $tanggal,
            'pekerjaan'         => $pekerjaan,
            'jenis_pekerjaan'   => $jenis_pekerjaan,
            'khs'               => $id_khs,
            'id_designator'     => $designator,
            'volume'            => $volume,
            'harga'             => $tampilharga,
            'approval'          => "NOK",
            'witel'             => $witel
            /*,
            'satuan_material'   => $satuanmaterial,
            'satuan_jasa'       => $satuanjasa*/
            /*,
            'volumemat'         => $impvolumemat,
            'volumejas'         => $impvolumejas*/
        );

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

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
        $this->load->view('tagihan/planpekerjaan', $data);
        $this->load->view('footer');
    }

    function listpekerjaan_ok(){
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
            echo "<option>Pilih Plan Pekerjaan</option>";
            foreach ($plan_pek_baru as $d) {
                echo "<option value='".$d['id']."'>" . $d['pekerjaan'] . "</option>";
            }
        } else {
            echo "<option>Tidak Ada Plan Pekerjaan</option>";
        }
        
    }

    public function detaildatapekerjaan()
    {
        $id     = $this->input->post('plan_pek_baru');

        $where = array(
            'id'    => $id,
        );

        $detailpekerjaan                    = $this->mtagihan->get_detailpek('data_planper', $where);

        $khs    = "";
        $jenis  = "";
        foreach ($detailpekerjaan as $a) {
            $jenis  = "<option value='".$a['id_designator']."'>" . $a['id_designator'] . "</option>";
            $nakhs  = $a['khs'];
            $khs    = $this->mtagihan->get_one_data('khs', 'nama_khs', $nakhs);
        }
        $to_return['pekerjaan']             =  $detailpekerjaan[0]['pekerjaan'];
        $to_return['nama_khs']              =  $khs[0]['nama_khs'];
        $to_return['designator']            =  $detailpekerjaan[0]['id_designator'];
        echo json_encode($to_return);
    }

    //TELKOM
    function getmaterialjasa(){
        $designator                     = $this->input->post('designator');
        $matjas                         = $this->mtagihan->get_mat_jas('list_item', $designator);
        $getmaterial                    = $matjas[0]['harga_material'];
        $getjasa                        = $matjas[0]['harga_jasa'];

        /*$material                       = number_format($getmaterial);
        $jasa                           = number_format($getjasa);*/

        $to_return['harga_material']    =  $getmaterial;
        $to_return['harga_jasa']        =  $getjasa;
        echo json_encode($to_return);
    }

    //MITRA
    function getmaterialjasamitra(){
        $designator                     = $this->input->post('designator');
        $matjas                         = $this->mtagihan->get_matjasmitra('list_item', $designator);
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

        $witel  = $this->session->userdata('psa');

        $data['listplanpekerjaanmanar']     = $this->mtagihan->getlistplanpekerjaanmanar('data_planper', $witel);
        $data['listplanpekerjaanadmin']     = $this->mtagihan->getlistplanpekerjaanadmin('data_planper', $witel);

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

    //LIST PEKERJAAN
    function listpekerjaan(){
        if(/*$this->session->userdata('nama') == 'TEFANI DIVA WIBOWO' ||*/ $this->session->userdata('nama') == 'ANUGRAH VITO AHYA' || $this->session->userdata('nama') == 'MOH SULAIMAN YAASIIN' || $this->session->userdata('position') == 'Admin Maintenance' || $this->session->userdata('position') == 'Site Manager Maintenance' || $this->session->userdata('position') == 'Team Leader Preventive Maintenance' || $this->session->userdata('position') == 'Team Leader Corrective Maintenance & QE'){
            $psa                    = $this->session->userdata('psa');
            $data['listpekerjaan']  = $this->mtagihan->getlistpekerjaan('boq_input', $psa);

            $this->load->view('header');
            $this->load->view('aside');
            $this->load->view('tagihan/listpekerjaanshow', $data);
            $this->load->view('footer');
        } else {
            $psa                    = $this->session->userdata('psa');
            $data['listpekerjaan']   = $this->mtagihan->getlistpekerjaan('boq_input', $psa);
            $this->load->view('header');
            $this->load->view('aside');
            $this->load->view('tagihan/listpekerjaan', $data);
            $this->load->view('footer');
        }
    }

    function listpekerjaanall(){
        $data['listpekerjaan']   = $this->mtagihan->getlistpekerjaanallok('boq_input');

        $data['khs']   = "";
        foreach ($data['listpekerjaan'] as $a) {
            $nakhs          = $a['nama_khs'];
            $data['khs']    = $this->mtagihan->get_one_data('khs', 'nama_khs', $nakhs);
        }

            $this->load->view('header');
            $this->load->view('aside');
            $this->load->view('tagihan/list_all_pekerjaan', $data);
            $this->load->view('footer');
    }

    /*function approval($id){
        $status         = $this->input->post('status_approval');
        $keterangan     = $this->input->post('keterangan');

        $data = array(
            'approval_pek'  => $status,
            'ket_approval_pek'=> $keterangan    
        );

        $where = array(
            'id' => $id
        );

        $this->mtagihan->update_approvalplan('boq_input', $data, $where);
        redirect('index.php/tagihan/listpekerjaan');
    }*/

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

    function groupingpekerjaan(){
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Grouping Pekerjaan Berhasil Dilakukan!';
        }
        $data['_alert']     = $alert;

        $data['listpekerjaan']   = $this->mtagihan->getlistpekerjaanallok('boq_input');

        echo "<pre>";
        print_r($data);
        echo "</pre>";

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('tagihan/grouping_pekerjaan', $data);
        $this->load->view('footer');
    }

    function search_pekerjaan(){
        $nama_pekerjaan     = $this->input->post('pekerjaan');

        echo $nama_pekerjaan;
    }

    function report_input(){
        $data['report_plan']    = $this->mtagihan->report_plan();
        $data['report_nonpo']   = $this->mtagihan->report_nonpo();
        $data['report_po']      = $this->mtagihan->report_po();
        $data['report_rekon']   = $this->mtagihan->report_rekon();
        $data['report_pr']      = $this->mtagihan->report_pr();
        $data['report_bast']    = $this->mtagihan->report_bast();
        $data['report_vestyna'] = $this->mtagihan->report_vestyna();
        $data['report_miro']    = $this->mtagihan->report_miro();

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('tagihan/report_input', $data);
        $this->load->view('footer');
    }
}