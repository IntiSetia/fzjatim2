<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Dash_slide extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('cogs_model');
        $this->load->model('mtagihan');
        $this->load->library('session');
    }

    function index()
    {
        //Data COGS per Area for Dashboard
        $data['fz2_ytd_cogs'] = $this->cogs_model->get_fz2_ytd_cogs();

        //Data REV per Area for Dashboard
        $data['fz2_ytd_rev'] = $this->cogs_model->get_fz2_ytd_rev();

        //Data Target for Dashboard
        $data['target'] = $this->cogs_model->cogs_target();

        //Data COGS Per Klasifikasi
        $data['cogs_klasifikasi'] = $this->cogs_model->cogs_klas();

        //PAKBIWAN
        $data['notification'] = $this->mtagihan->notification('boq_input', 'Not Yet Approved');

        //MAINTENANCE
        $data['notificationm'] = $this->mtagihan->notification('boq_input', 'Approved');

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
        
        //Jumlah Plan Pekerjaan
        $data['jplan']          = $this->mtagihan->get_jplan();
        $data['jplanreturn']    = $this->mtagihan->get_jplanreturn();
        $data['jplanpek']       = $this->mtagihan->get_jpek();
        $data['jplanpekreturn'] = $this->mtagihan->get_jpekreturn();
        $data['jbarekon']       = $this->mtagihan->get_jbarekon();
        $data['jbarekonreturn'] = $this->mtagihan->get_jbarekonreturn();

        //COMMERCE
        $data['jppo']           = $this->mtagihan->get_jppo();
        $data['jpbast']         = $this->mtagihan->get_jpbast();
        $data['jpinvoicefp']    = $this->mtagihan->get_jpinvoicefp();

        //PROCUREMENT
        $data['jppomi']           = $this->mtagihan->get_jppomi();

        if (($this->session->userdata('tipe_user') == 'pakbiwan') || ($this->session->userdata('tipe_user') == 'maintenance') || ($this->session->userdata('tipe_user') == 'commerce') || ($this->session->userdata('tipe_user') == 'procurement') || ($this->session->userdata('tipe_user') == 'construction')){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('message', $data);
            $this->load->view('footer_dashboard', $data);
        } else if(($this->session->userdata('tipe_user') == 'hr')){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('dash_slide_hr', $data);
            $this->load->view('footer_dashboard', $data);
        } else {
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('dash_slide', $data);
            $this->load->view('footer_dashboard', $data);
        }
    }
}