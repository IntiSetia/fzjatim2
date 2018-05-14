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
            redirect('index.php/login/viewlogin');

        //Data COGS per Area for Dashboard
        $this->data['fz2_ytd_cogs'] = $this->cogs_model->get_fz2_ytd_cogs();

        //Data REV per Area for Dashboard
        $this->data['fz2_ytd_rev'] = $this->cogs_model->get_fz2_ytd_rev();

        //Data Target for Dashboard
        $this->data['target'] = $this->cogs_model->cogs_target();

        //Data COGS Per Klasifikasi
        $this->data['cogs_klasifikasi'] = $this->cogs_model->cogs_klas();

        //PAKBIWAN
        $this->data['notification'] = $this->mtagihan->notification('boq_input', 'Not Yet Approved');

        //MAINTENANCE
        $this->data['notificationm'] = $this->mtagihan->notification('boq_input', 'Approved');

        $witel                  = $this->session->userdata('psa');

        //MAINTENANCE
        $this->data['jplan']          = $this->mtagihan->get_jplan($witel);
        $this->data['jplanreturn']    = $this->mtagihan->get_jplanreturn($witel);
        $this->data['jplanpek']       = $this->mtagihan->get_jpek($witel);
        $this->data['jplanpekreturn'] = $this->mtagihan->get_jpekreturn($witel);
        $this->data['jbarekon']       = $this->mtagihan->get_jbarekon($witel);
        $this->data['jbarekonreturn'] = $this->mtagihan->get_jbarekonreturn($witel);

        //COMMERCE
        $this->data['jppo']           = $this->mtagihan->get_jppo($witel);
        $this->data['jpbast']         = $this->mtagihan->get_jpbast($witel);
        $this->data['jpinvoicefp']    = $this->mtagihan->get_jpinvoicefp($witel);

        //PROCUREMENT
        $this->data['jppomi']           = $this->mtagihan->get_jppomi($witel);

        //DASHBOARD REVENUE
        $this->data['plan']       = $this->mtagihan->total_jumlah_plan();
        foreach ($this->data['plan'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $plan   = round($p2, 2);
        }

        $this->data['po']           = $this->mtagihan->total_jumlah_po();
        $this->data['tampilpo'] = "";
        foreach ($this->data['po'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $this->data['tampilpo']   = round($p2, 2);
        }

        $this->data['nonpo']           = $this->mtagihan->total_jumlah_non_po();
        $this->data['tampilnonpo'] = "";
        foreach ($this->data['nonpo'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $this->data['tampilnonpo']   = round($p2, 2);
        }

        $this->data['pr']           = $this->mtagihan->total_jumlah_pr();
        $this->data['tampilpr'] = "";
        foreach ($this->data['pr'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $this->data['tampilpr']   = round($p2, 2);
        }

        $this->data['bast']           = $this->mtagihan->total_jumlah_bast();
        $this->data['tampilplan'] = "";
        foreach ($this->data['plan'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $this->data['tampilplan']   = round($p2, 2);
        }

        $this->data['vestyna']           = $this->mtagihan->total_jumlah_vestyna();
        $this->data['tampilvestyna'] = "";
        foreach ($this->data['vestyna'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $this->data['tampilvestyna']   = round($p2, 2);
        }

        $this->data['rekon']           = $this->mtagihan->total_jumlah_rekon();
        $this->data['tampilrekon'] = "";
        foreach ($this->data['rekon'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $this->data['tampilrekon']   = round($p2, 2);
        }

        $this->data['miro']           = $this->mtagihan->total_jumlah_miro();
        $this->data['tampilmiro'] = "";
        foreach ($this->data['miro'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $this->data['tampilmiro']   = round($p2, 2);
        }

        $this->data['bast']           = $this->mtagihan->total_jumlah_miro();
        $this->data['tampilbast'] = "";
        foreach ($this->data['bast'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $this->data['tampilbast']   = round($p2, 2);
        }

        $this->data['report_plan']    = $this->mtagihan->report_plan();
        $this->data['report_nonpo']   = $this->mtagihan->report_nonpo();
        $this->data['report_po']      = $this->mtagihan->report_po();
        $this->data['report_rekon']   = $this->mtagihan->report_rekon();
        $this->data['report_pr']      = $this->mtagihan->report_pr();
        $this->data['report_bast']    = $this->mtagihan->report_bast();
        $this->data['report_vestyna'] = $this->mtagihan->report_vestyna();
        $this->data['report_miro']    = $this->mtagihan->report_miro();

        //MARSHALL
        $data['tahun_now']      = $thn = gmdate("Y");
        $data['bulan_now']      = $thn = gmdate("m");
        $data['bulan_now2']     = $thn = gmdate("M");
    }

    function index()
    {
        /*$data['dashboardtagihan']   = array(
            'plan'      => $plan
        );*/

        //MAINTENANCE ON GOING PROCESS
        /*if ($this->session->userdata('position') == 'Mgr Shared Service & Performance Jawa Timur 2' || $this->session->userdata('position') == 'Team Leader Operation & Maintenance Report' || $this->session->userdata('nama') == 'INTI SETIA NINGTYAS' || $this->session->userdata('nama') == 'NADIA WIDY OKTAVIANI'){
            $this->load->view('header', $data);
            $this->load->view('aside', $data);
            $this->load->view('dash_slide', $data);
            $this->load->view('footer_dashboard', $data);
        } else {
            redirect(base_url('index.php/login/viewlogin/undermaintenance'));
        }*/

        //MAINTENANCE DONE
        if ($this->session->userdata('nama') == 'LILIK AJI LUTHFIANTO'){
            $this->load->view('header', $this->data);
            $this->load->view('aside', $this->data);
            $this->load->view('dash_slide_marshall', $this->data);
            $this->load->view('footer_dashboard', $this->data);
        }

        /*else if ($this->session->userdata('nama') == 'MOH SULAIMAN YAASIIN' || $this->session->userdata('position') == 'Admin Maintenance' || $this->session->userdata('position') == 'Site Manager Maintenance' || $this->session->userdata('position') == 'Team Leader Preventive Maintenance' || $this->session->userdata('position') == 'Team Leader Corrective Maintenance & QE' || $this->session->userdata('position') == 'Mgr Maintenance Malang' || $this->session->userdata('position') == 'Admin Procurement & Partnership' || $this->session->userdata('position') == 'Team Leader Procurement & Partnership' || $this->session->userdata('position') == 'Team Leader Commerce' || $this->session->userdata('position') == 'Site Manager Commerce') {
            redirect(base_url('index.php/login/viewlogin/undermaintenance'));
        }*/

        else if ($this->session->userdata('position') == 'Mgr Shared Service & Performance Jawa Timur 2' || $this->session->userdata('position') == 'Team Leader Operation & Maintenance Report' || $this->session->userdata('nama') == 'TEFANI DIVA WIBOWO' ||  $this->session->userdata('nama') == 'INTI SETIA NINGTYAS' || $this->session->userdata('nama') == 'NADIA WIDY OKTAVIANI'){
            /*echo "<pre>";
            print_r($data);
            echo "</pre>";*/

            $this->load->view('header', $this->data);
            $this->load->view('aside', $this->data);
            $this->load->view('dash_slide', $this->data);
            $this->load->view('footer_dashboard', $this->data);
            /*$this->load->view('footer_jose', $this->data);*/
        }

        else if($this->session->userdata('position') == 'Team Leader Inventory & Asset Management Non NTE' || $this->session->userdata('position') == 'Team Leader Drawing & Inventory' || $this->session->userdata('position') == 'Team Leader Surveyor' || $this->session->userdata('position') == 'Team Leader Helpdesk Provisioning' || $this->session->userdata('position') == 'Team Leader Assurance Consumer Service' || $this->session->userdata('position') == 'Admin HSE' || $this->session->userdata('position') == 'Site Manager Fiber Academy' || $this->session->userdata('position') == 'Site Manager Provisioning' || $this->session->userdata('position') == 'Site Manager Assurance Consumer Services' || $this->session->userdata('position') == 'Site Manager Helpdesk' || $this->session->userdata('position') == 'Site Manager Assurance Corporate' || $this->session->userdata('position') == 'Site Manager Project Deployment' || $this->session->userdata('position') == 'Team Leader Fiber Academy' || $this->session->userdata('position') == 'Team Leader TSEL Services'){
            $this->load->view('header', $this->data);
            $this->load->view('aside', $this->data);
            $this->load->view('dash_slide_marshall', $this->data);
            $this->load->view('footer_dashboard', $this->data);
        }

        else if ($this->session->userdata('position') == 'Admin Human Capital Service' || $this->session->userdata('position') == 'Team Leader Human Capital Service'){
            $this->load->view('header', $this->data);
            $this->load->view('aside', $this->data);
            $this->load->view('dash_slide_hr', $this->data);
            $this->load->view('footer_dashboard', $this->data);
        }

        else if ($this->session->userdata('nama') == 'ANUGRAH VITO AHYA' || $this->session->userdata('nama') == 'MOH SULAIMAN YAASIIN' || $this->session->userdata('position') == 'Admin Maintenance' || $this->session->userdata('position') == 'Site Manager Maintenance' || $this->session->userdata('position') == 'Team Leader Preventive Maintenance' || $this->session->userdata('position') == 'Team Leader Corrective Maintenance & QE' || $this->session->userdata('position') == 'Mgr Maintenance Malang' || $this->session->userdata('position') == 'Admin Procurement & Partnership' || $this->session->userdata('position') == 'Team Leader Procurement & Partnership' || $this->session->userdata('position') == 'Admin Commerce' || $this->session->userdata('position') == 'Team Leader Commerce' || $this->session->userdata('position') == 'Site Manager Commerce'){
            $this->load->view('header', $this->data);
            $this->load->view('aside', $this->data);
            $this->load->view('message', $this->data);
            $this->load->view('footer_dashboard', $this->data);
        }

        else if ($this->session->userdata('position') == 'Team Leader Inventory & Asset Management NTE' ){
            $this->load->view('header', $this->data);
            $this->load->view('aside', $this->data);
            $this->load->view('dash_slide_marshall', $this->data);
            $this->load->view('footer_dashboard', $this->data);
        }

        else {
            redirect(base_url('index.php/login/viewlogin/notstilluser'));
        }
    }

    function dash_slide_marshall(){
        $this->load->view('header', $this->data);
        $this->load->view('aside', $this->data);
        $this->load->view('dash_slide_marshall', $this->data);
        $this->load->view('footer_dashboard', $this->data);
    }

    function dash_slide_maintenance(){
        $this->load->view('header', $this->data);
        $this->load->view('aside', $this->data);
        $this->load->view('message', $this->data);
        $this->load->view('footer_dashboard', $this->data);
    }
}