<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revenue extends CI_Controller {
	function __construct() {
      parent::__construct();

        /*if (!logged_in())
            redirect('index.php/login');*/

        if ($this->session->userdata('login')!==TRUE)
            redirect('index.php/login/viewlogin');

      $this->load->database();
      $this->load->helper('url');
      $this->load->model('RevModel');
    }
// Project Revenue
    public function index()
	{
		$this->load->view('header');
		$this->load->view('aside');
		$data['psb'] = $this->RevModel->get_prov();
		$data['rev'] = $this->RevModel->get_psb();
		$data['all_rev'] = $this->RevModel->get_all_rev();
		$this->load->view('revenue/dashboard_rev2', $data);
		$this->load->view('footer');
	}

	public function index3()
	{
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/form_coba');
		$this->load->view('footer');
	}

	public function detail($id)
	{
		$this->load->view('header');
		$this->load->view('aside');
		$data['psb'] = $this->RevModel->get_detail($id);	
		$this->load->view('revenue/detail', $data);
		$this->load->view('footer');
	}

	public function index_tunda(){
		$tipe = array(array("1"=>$this->RevModel->get_dt_psb()));
		
		/*for($i = 0; $i < count($tipe); $i++){
			$chart = (object) [];
			$chart->cols = array((object) array("type" => "string"), (object) array("type" => "number"));
			$chart->rows = $tipe[$i][$i+1];
			$value = [];
			foreach ($chart->rows as $row) {
				$tempValue = (object)array("c"=>array((object)array("v"=>$row->tgl_ps),(object)array("v"=>$row->harga)));
				array_push($value, $tempValue);
			}
			$chart->rows = $value;
			$data['chart'.$i] = json_encode($chart);
		}*/
		 
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		// echo "<pre>";
		$data['chart'] = json_encode($chart);
		// print_r($chart);
		// echo "</pre>";
		$data['rev'] = $this->RevModel->get_all_rev();	
		$this->load->view('header');
		$this->load->view('home_rev', $data);
		$this->load->view('footer', $data);
	}
// Ubah data
	public function upload_ba($id){
		$this->load->view('header');
		$this->load->view('aside');
		$data['psb'] = $this->RevModel->get_dt($id);		
		$this->load->view('revenue/upload_ba', $data);
		$this->load->view('footer');
	}

	public function update_bia($id){
		$this->load->view('header');
		$this->load->view('aside');
		$data['rev'] = $this->RevModel->get_biaya($id);
		$this->load->view('revenue/update_biaya', $data);
		$this->load->view('footer');
	}

	public function ubah_biaya($id){
		$no    = $this->input->post('id_rev');
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

		$data = array(
            /*'nama' 			=> $this->input->post('nama'),
            'alamat' 		=> $this->input->post('alamat'),
            'odp' 			=> $this->input->post('odp'),
            'ont' 			=> $this->input->post('ont'),
            'stb' 			=> $this->input->post('stb'),
            'layanan' 		=> $lay,
            'jenis_kabel' 	=> $this->input->post('jenis_kabel'),*/
            'panjang_kabel' => $p_kab,
            'kelebihan_kabel' => $p_kab_add,
            'tiang' 		=> $tiang,
            'patch_cord' 	=> $p_pc,
            'patch_cord_add'=> $p_pc_add,
            'kabel_utp' 	=> $p_utp,
            'kabel_utp_add' => $p_utp_add,
            'kabel_pvc' 	=> $this->input->post('kabel_pvc'),
            'stb_kedua' 	=> $stb,
            // 'hasil_cek_redaman' => $this->input->post('hasil_cek_redaman'),
            'biaya' 		=> $biaya
            );
		$where = array(
            'id_rev'		=> $no
    		);
        $this->RevModel->Update('data_psb', $data, $where);
        echo "<script>alert('Mengubah data biaya berhasil dilakukan')</script>";

        redirect(base_url('index.php/Revenue'),'refresh');
	}
// Menampilkan data dan form
	public function form_psb(){
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/form_psb');
		$this->load->view('footer');
	}

	public function form_ass(){
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/form_ass');
		$this->load->view('footer');
	}
	
	public function data_ass(){
		$data['psb'] = $this->RevModel->get_all_ass();
		$data['rev'] = $this->RevModel->get_ass();
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/table_ass', $data);
		$this->load->view('footer');
	}

	public function form_migrasi(){
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/form_migrasi');
		$this->load->view('footer');
	}
	
	public function data_migrasi(){
		$this->load->view('header');
		$this->load->view('aside');
		$data['psb'] = $this->RevModel->get_all_migrasi();
		$data['rev'] = $this->RevModel->get_migrasi();
		$this->load->view('revenue/table_migrasi', $data);
		$this->load->view('footer');
	}

	public function coba(){
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/rev_target_mig');
		$this->load->view('footer');
	}


	public function mainis(){
		$this->load->view('header');
		$this->load->view('mainis');
		$this->load->view('footer');
	}

	public function data_mainis(){
		$data['psb'] = $this->RevModel->get_all_mainis();
		$data['rev'] = $this->RevModel->get_mainis();
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/table_mainis', $data);
		$this->load->view('footer');
	}

	public function form_main_access(){
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/form_main_access');
		$this->load->view('footer');
	}

	public function data_main_access(){
		$data['psb'] = $this->RevModel->get_all_main_access();
		$data['rev'] = $this->RevModel->get_main_access();
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/table_main_access', $data);
		$this->load->view('footer');
	}

	public function form_gamas(){
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/form_gamas');
		$this->load->view('footer');
	}

	public function data_gamas(){
		$data['psb'] = $this->RevModel->get_all_gamas();
		$data['rev'] = $this->RevModel->get_gamas();
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/table_gamas', $data);
		$this->load->view('footer');
	}

	public function form_pt3(){
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/form_pt3');
		$this->load->view('footer');
	}

	public function form_nodeb(){
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/form_nodeb');
		$this->load->view('footer');
	}

	public function form_hem(){
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/form_hem');
		$this->load->view('footer');
	}

	public function form_pt2(){
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/form_pt2');
		$this->load->view('footer');
	}

	public function data_sd(){
		$data['psb'] = $this->RevModel->get_all_sd();
		$data['rev'] = $this->RevModel->get_sd();
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/table_sd', $data);
		$this->load->view('footer');
	}

	public function insert_ass(){
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

				$inti = $_FILES['ba_psb']['name'];
 
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
		         }        		
        // echo "<script>alert('Data berhasil ditambahkan')</script>";
        $data = array(
            'mdf' 			=> $this->input->post('mdf'),
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
            'ba_rev' 		=> $inti,
            'biaya' 		=> $biaya,
            'divisi' 		=> 'ggn'
             );
        $this->RevModel->Add($data);
        redirect(base_url('index.php/Revenue/data_ass'),'refresh');
	}

	public function insert_migrasi(){
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

				$inti = $_FILES['ba_psb']['name'];

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
		         }        		
        // echo "<script>alert('Data berhasil ditambahkan')</script>";
        $data = array(
            'mdf' 			=> $this->input->post('mdf'),
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
            'ba_rev' 		=> $inti,
            'biaya' 		=> $biaya,
            'divisi' 		=> 'migrasi'
             );
        $this->RevModel->Add($data);
        redirect(base_url('index.php/Revenue/data_migrasi'),'refresh');
	}

	public function insert_mainis(){
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

				$inti = $_FILES['ba_psb']['name'];

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
		         }        		
        // echo "<script>alert('Data berhasil ditambahkan')</script>";
        $data = array(
            'mdf' 			=> $this->input->post('mdf'),
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
            'ba_rev' 		=> $inti,
            'biaya' 		=> $biaya,
            'divisi' 		=> 'mainis'
             );
        $this->RevModel->Add($data);
        redirect(base_url('index.php/Revenue/data_mainis'),'refresh');
    }

    public function insert_main_access(){
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

				$inti = $_FILES['ba_psb']['name'];

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
		         }        		
        // echo "<script>alert('Data berhasil ditambahkan')</script>";
        $data = array(
            'mdf' 			=> $this->input->post('mdf'),
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
            'ba_rev' 		=> $inti,
            'biaya' 		=> $biaya,
            'divisi' 		=> 'main_access'
             );
        $this->RevModel->Add($data);
        redirect(base_url('index.php/Revenue/data_main_access'),'refresh');
    }

    public function insert_gamas(){
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

				$inti = $_FILES['ba_psb']['name'];

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
		         }        		
        // echo "<script>alert('Data berhasil ditambahkan')</script>";
        $data = array(
            'mdf' 			=> $this->input->post('mdf'),
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
            'ba_rev' 		=> $inti,
            'biaya' 		=> $biaya,
            'divisi' 		=> 'gamas'
             );
        $this->RevModel->Add($data);
        redirect(base_url('index.php/Revenue/data_gamas'),'refresh');
    }
	
	public function insert_pt3(){
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

				$inti = $_FILES['ba_psb']['name'];

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
		         }        		
        // echo "<script>alert('Data berhasil ditambahkan')</script>";
        $data = array(
            'mdf' 			=> $this->input->post('mdf'),
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
            'ba_rev' 		=> $inti,
            'biaya' 		=> $biaya,
            'divisi' 		=> 'pt3'
             );
        $this->RevModel->Add($data);
        redirect(base_url('index.php/Revenue/pt3'),'refresh');
    }

	public function insert_nodeb(){
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

				$inti = $_FILES['ba_psb']['name'];

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
		         }        		
        // echo "<script>alert('Data berhasil ditambahkan')</script>";
        $data = array(
            'mdf' 			=> $this->input->post('mdf'),
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
            'ba_rev' 		=> $inti,
            'biaya' 		=> $biaya,
            'divisi' 		=> 'nodeb'
             );
        $this->RevModel->Add($data);
        redirect(base_url('index.php/Revenue/nodeb'),'refresh');
    }
	
	public function insert_hem(){
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

				$inti = $_FILES['ba_psb']['name'];

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
		         }        		
        // echo "<script>alert('Data berhasil ditambahkan')</script>";

        $data = array(
            'mdf' 			=> $this->input->post('mdf'),
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
            'ba_rev' 		=> $inti,
            'biaya' 		=> $biaya,
            'divisi' 		=> 'hem'
             );
        $this->RevModel->Add($data);
        redirect(base_url('index.php/Revenue/hem'),'refresh');
    }
	
	public function insert_pt2(){
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

				$inti = $_FILES['ba_psb']['name'];

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
		         }        		
        // echo "<script>alert('Data berhasil ditambahkan')</script>";
        $data = array(
            'mdf' 			=> $this->input->post('mdf'),
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
            'ba_rev' 		=> $inti,
            'biaya' 		=> $biaya,
            'divisi' 		=> 'pt2'
             );
        $this->RevModel->Add($data);
        redirect(base_url('index.php/Revenue/pt2'),'refresh');
    }
//Untuk bagian rekon data
    public function all_rekon(){
		$data['psb'] = $this->RevModel->get_all_rek();
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/cari_all', $data);
		$this->load->view('footer');
	}

	public function cari_all_rekon(){
		$kt 		= $this->input->post('kategori');
		$ar 		= $this->input->post('area');
		$tgl1 		= $this->input->post('tanggal1');
		$bln1		= $this->input->post('bulan1');
		$thn1		= $this->input->post('tahun1');
		$tgl2 		= $this->input->post('tanggal2');
		$bln2		= $this->input->post('bulan2');
		$thn2		= $this->input->post('tahun2');
		$this->load->view('header');
		$this->load->view('aside');
		$data['psb'] = $this->RevModel->get_all2($kt, $ar, $tgl1, $bln1, $thn1, $tgl2, $bln2, $thn2);
		$this->load->view('revenue/cari_all', $data);
		$this->load->view('footer');

	}

	public function rekon(){
		$data['psb'] = $this->RevModel->get_all_rek();
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/cari_all', $data);
		$this->load->view('footer');
	}

	public function tertagih(){
		$this->load->view('header');
		$data['psb'] = $this->RevModel->get_all_tagih();
		$this->load->view('rev_tagih', $data);
		$this->load->view('footer');
	}

	public function belum_rekon(){
		$this->load->view('header');
		$data['psb'] = $this->RevModel->get_all();
		$this->load->view('rev_belum', $data);
		$this->load->view('footer');
	}	

	public function cari_data()
	{
		$this->load->view('header');
		$this->load->view('rev_base_date');
		$this->load->view('footer');
	}

	public function cari_hasil()
	{
		$kt 		= $this->input->post('kategori');
		$ka 		= $this->input->post('area');
		$tgl1 		= $this->input->post('tanggal1');
		$bln1		= $this->input->post('bulan1');
		$thn1		= $this->input->post('tahun1');
		$tgl2 		= $this->input->post('tanggal2');
		$bln2		= $this->input->post('bulan2');
		$thn2		= $this->input->post('tahun2');
		$this->load->view('header');
		$data['cari'] 	= $this->RevModel->get_search($kt, $ka, $tgl1, $bln1, $thn1, $tgl2, $bln2, $thn2);
		$this->load->view('rev_base_date', $data);
		$this->load->view('footer');
	}

	public function rekon_cek()
	{
		$re = $this->input->post('rekon');
		$this->db
             ->query("Update data_psb set rekon = 'ok' WHERE id_rev IN(".$re.")");
        redirect(base_url('index.php/SearchRev/cari_by_date'),'refresh');
	}

	public function tagih_cek($id)
	{		
        $data = array(
            'rekon' => 'charge'
             );
        $where = array(
        'id_rev' => $id
    		);
        $this->RevModel->Update('data_psb', $data, $where);
        redirect(base_url('index.php/RevRekon/data_dikerjakan'),'refresh');
	}

	public function rekon_cek1()
	{
        $this->load->view('selisih');
	}

	public function detail_prov($id)
	{
		$this->load->view('header');
		$this->load->view('aside');
		$data['psb'] = $this->RevModel->get_detail($id);	
		$this->load->view('revenue/detail_prov', $data);
		$this->load->view('footer');
	}
}
