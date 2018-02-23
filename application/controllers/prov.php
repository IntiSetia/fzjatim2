<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prov extends CI_Controller {
	function __construct() {
      parent::__construct();

        if (!logged_in())
            redirect('index.php/login');

      $this->load->database();
      $this->load->helper('url');
      $this->load->model('Cari');
      $this->load->model('RevModel');
    }

    function index(){
      $this->load->view('header');
      $this->load->view('aside');
      $data['target'] = $this->Cari->get_target_prov();
      $this->load->view('prov/table_ps', $data);
      $this->load->view('footer');
    }

     function cari_ps(){
      $this->load->view('header');
      $this->load->view('aside');
      $data['all'] = $this->Cari->get_all();
      $this->load->view('prov/cari_ps2', $data);
      $this->load->view('footer');
    }

    public function hasil_ps(){
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

  public function data_prov(){
    $data['psb'] = $this->Cari->get_all_prov();
    $this->load->view('header');
    $this->load->view('aside');
    $this->load->view('prov/table_prov', $data);
    $this->load->view('footer');
  }

  public function form_prov(){
    $this->load->view('header');
    $this->load->view('aside');
    $this->load->view('prov/form_prov');
    $this->load->view('footer');
  }

  function dashboard(){
    $this->load->view('header');
    $this->load->view('aside');
    $this->load->view('prov/home_prov');
    $this->load->view('footer');
  }

  function cari_rekon(){
    $this->load->view('header');
    $this->load->view('aside');
    $this->load->view('prov/untuk_rekon');
    $this->load->view('footer');
  }

  public function hasil_rekon(){
    $no = $this->input->post('no_inet');
    $this->Cari->update($no);

    echo "<script>alert('Berhasil memperbarui status data')</script>";

    $data['psb'] = $this->Cari->get_rek($no);
    $this->load->view('header');
    $this->load->view('aside');
    $this->load->view('prov/untuk_rekon', $data);
    $this->load->view('footer');
  }

  public function report(){
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
  
}