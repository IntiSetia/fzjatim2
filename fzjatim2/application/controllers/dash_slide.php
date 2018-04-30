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

        if ($this->session->userdata('login')!==TRUE)
            redirect('index.php/login');
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

        /*if (($this->session->userdata('position') == 'pakbiwan') || ($this->session->userdata('position') == 'maintenance') || ($this->session->userdata('position') == 'commerce') || ($this->session->userdata('position') == 'procurement') || ($this->session->userdata('position') == 'construction') || ($this->session->userdata('position') == 'maintenance2') || ($this->session->userdata('position') == 'pakbiwan2')){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('message', $data);
            $this->load->view('footer_dashboard', $data);
        } else if($this->session->userdata('position') == 'Admin Human Capital Service' || $this->session->userdata('position') == 'Team Leader Human Capital Service'){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('dash_slide_hr', $data);
            $this->load->view('footer_dashboard', $data);
        } else if($this->session->userdata('position') == 'Site Manager Fiber Academy' || $this->session->userdata('position') == 'Team Leader Fiber Academy'){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('dash_slide_marshall', $data);
            $this->load->view('footer_dashboard', $data);    
        } else {
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('dash_slide', $data);
            $this->load->view('footer_dashboard', $data);
        }*/

        /*echo "SEE YOU TOMORROW :)";*/

        if ($this->session->userdata('nama') == 'ANDRE FIRMAN SAPUTRA' || $this->session->userdata('position') == 'Mgr Shared Service & Performance Jawa Timur 2' ||$this->session->userdata('nama') == 'TEFANI DIVA WIBOWO' || $this->session->userdata('nama') == 'INTI SETIA NINGTYAS'){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('dash_slide', $data);
            $this->load->view('footer_dashboard', $data);
        } else if($this->session->userdata('position') == 'Site Manager Fiber Academy' || $this->session->userdata('position') == 'Team Leader Fiber Academy'){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('dash_slide_marshall', $data);
            $this->load->view('footer_dashboard', $data);
        } else if ($this->session->userdata('position') == 'Admin Human Capital Service' || $this->session->userdata('position') == 'Team Leader Human Capital Service'){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('dash_slide_hr', $data);
            $this->load->view('footer_dashboard', $data);
        } else if ($this->session->userdata('position') == 'Admin Maintenance' || $this->session->userdata('position') == 'Site Manager Maintenance' || $this->session->userdata('position') == 'Team Leader Preventive Maintenance' || $this->session->userdata('position') == 'Team Leader Corrective Maintenance & QE'){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('message', $data);
            $this->load->view('footer_dashboard', $data);
        }
    }
}