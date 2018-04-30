<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchRev extends CI_Controller {
	function __construct() {
      parent::__construct();

        /*if (!logged_in())
            redirect('index.php/login');*/

        if ($this->session->userdata('login')!==TRUE)
            redirect('index.php/login');

      $this->load->database();
      $this->load->helper('url');
      $this->load->model('cari');
      $this->load->model('RevModel');
    }

	public function index()
	{	
		/*$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/form_ass');
		$this->load->view('footer');*/
		echo "Hai ini base controller SearchRev";
	}

	public function cari_ba()
	{		
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/cari_ba');
		$this->load->view('footer');
	}

	public function hasil_ba()
	{
		$kt 		= $this->input->post('kategori');
		$isi		= $this->input->post('data_cari');
		$this->load->view('header');
		$this->load->view('aside');
		$data['cari'] 	= $this->cari->get_search_data($kt, $isi);
		$this->load->view('revenue/cari_ba', $data);
		$this->load->view('footer');
	}

	public function cari_by_date()
	{
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/cari_by_date');
		$this->load->view('footer');
	}

	public function hasil_by_date()
	{
		$kt 		= $this->input->post('kategori');
		$tgl1 		= $this->input->post('tanggal1');
		$bln1		= $this->input->post('bulan1');
		$thn1		= $this->input->post('tahun1');
		$tgl2 		= $this->input->post('tanggal2');
		$bln2		= $this->input->post('bulan2');
		$thn2		= $this->input->post('tahun2');
		$this->load->view('header');
		$this->load->view('aside');
		$data['cari'] 	= $this->cari->get_search($kt, $tgl1, $bln1, $thn1, $tgl2, $bln2, $thn2);
		$this->load->view('revenue/cari_by_date', $data);
		$this->load->view('footer');
	}

	public function cari_by_div(){
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('revenue/cari_by_divisi');
		$this->load->view('footer');
	}

	public function hasil_by_divisi(){		
		$kt = $this->input->post('kategori');
		$ka  = $this->input->post('area');
		$ni = $this->input->post('no_inet');
		$this->load->view('header');
		$this->load->view('aside');
		$data['psb'] = $this->RevModel->get_kerja($kt, $ka, $ni);
		$this->load->view('revenue/cari_by_divisi', $data);
		$this->load->view('footer');
	}

//Tidak terpakai
	public function cari_hasil_lama()
	{
		$kt 		= $this->input->post('kategori');
		$tgl 		= $this->input->post('tanggal');
		$bln		= $this->input->post('bulan');
		$thn		= $this->input->post('tahun');
		$this->load->view('header');
		$data['cari'] 	= $this->cari->get_search($kt, $tgl, $bln, $thn);
		$this->load->view('search_data', $data);
		$this->load->view('footer');
	}

	public function cari_rekon()
	{
		$kt 		= $this->input->post('kategori');
		$ka 		= $this->input->post('area');
		$this->load->view('header');
		$data['psb'] = $this->cari->get_dt_rekon($kt, $ka);
		// $data['rev'] = $this->cari->get_revenue($kt, $ka);
		$this->load->view('rev_belum', $data);
		$this->load->view('footer');
	}

}