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

        $witel                  = $this->session->userdata('psa');

        //MAINTENANCE
        $data['jplan']          = $this->mtagihan->get_jplan($witel);
        $data['jplanreturn']    = $this->mtagihan->get_jplanreturn($witel);
        $data['jplanpek']       = $this->mtagihan->get_jpek($witel);
        $data['jplanpekreturn'] = $this->mtagihan->get_jpekreturn($witel);
        $data['jbarekon']       = $this->mtagihan->get_jbarekon($witel);
        $data['jbarekonreturn'] = $this->mtagihan->get_jbarekonreturn($witel);

        //COMMERCE
        $data['jppo']           = $this->mtagihan->get_jppo($witel);
        $data['jpbast']         = $this->mtagihan->get_jpbast($witel);
        $data['jpinvoicefp']    = $this->mtagihan->get_jpinvoicefp($witel);

        //PROCUREMENT
        $data['jppomi']           = $this->mtagihan->get_jppomi($witel);

        //DASHBOARD REVENUE
        $data['plan']       = $this->mtagihan->total_jumlah_plan();
        foreach ($data['plan'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $plan   = round($p2, 2);
        }

        $data['po']           = $this->mtagihan->total_jumlah_po();
        $data['tampilpo'] = "";
        foreach ($data['po'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $data['tampilpo']   = round($p2, 2);
        }

        $data['nonpo']           = $this->mtagihan->total_jumlah_non_po();
        $data['tampilnonpo'] = "";
        foreach ($data['nonpo'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $data['tampilnonpo']   = round($p2, 2);
        }

        $data['pr']           = $this->mtagihan->total_jumlah_pr();
        $data['tampilpr'] = "";
        foreach ($data['pr'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $data['tampilpr']   = round($p2, 2);
        }

        $data['bast']           = $this->mtagihan->total_jumlah_bast();
        $data['tampilplan'] = "";
        foreach ($data['plan'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $data['tampilplan']   = round($p2, 2);
        }

        $data['vestyna']           = $this->mtagihan->total_jumlah_vestyna();
        $data['tampilvestyna'] = "";
        foreach ($data['vestyna'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $data['tampilvestyna']   = round($p2, 2);
        }

        $data['rekon']           = $this->mtagihan->total_jumlah_rekon();
        $data['tampilrekon'] = "";
        foreach ($data['rekon'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $data['tampilrekon']   = round($p2, 2);
        }

        $data['miro']           = $this->mtagihan->total_jumlah_miro();
        $data['tampilmiro'] = "";
        foreach ($data['miro'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $data['tampilmiro']   = round($p2, 2);
        }

        $data['bast']           = $this->mtagihan->total_jumlah_miro();
        $data['tampilbast'] = "";
        foreach ($data['bast'] as $a){
            $p   = ceil($a['sum']);
            $p2   = $p/1000000000;
            $data['tampilbast']   = round($p2, 2);
        }

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
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('dash_slide_marshall', $data);
            $this->load->view('footer_dashboard', $data);
        }

        /*else if ($this->session->userdata('nama') == 'MOH SULAIMAN YAASIIN' || $this->session->userdata('position') == 'Admin Maintenance' || $this->session->userdata('position') == 'Site Manager Maintenance' || $this->session->userdata('position') == 'Team Leader Preventive Maintenance' || $this->session->userdata('position') == 'Team Leader Corrective Maintenance & QE' || $this->session->userdata('position') == 'Mgr Maintenance Malang' || $this->session->userdata('position') == 'Admin Procurement & Partnership' || $this->session->userdata('position') == 'Team Leader Procurement & Partnership' || $this->session->userdata('position') == 'Team Leader Commerce' || $this->session->userdata('position') == 'Site Manager Commerce') {
            redirect(base_url('index.php/login/viewlogin/undermaintenance'));
        }*/

        else if ($this->session->userdata('position') == 'Mgr Shared Service & Performance Jawa Timur 2' || $this->session->userdata('position') == 'Team Leader Operation & Maintenance Report' || $this->session->userdata('nama') == 'TEFANI DIVA WIBOWO' ||  $this->session->userdata('nama') == 'INTI SETIA NINGTYAS' || $this->session->userdata('nama') == 'NADIA WIDY OKTAVIANI'){
            /*echo "<pre>";
            print_r($data);
            echo "</pre>";*/

            $this->load->view('header', $data);
            $this->load->view('aside', $data);
            $this->load->view('dash_slide', $data);
            $this->load->view('footer_dashboard', $data);
        }

        else if($this->session->userdata('position') == 'Team Leader Inventory & Asset Management Non NTE' || $this->session->userdata('position') == 'Team Leader Drawing & Inventory' || $this->session->userdata('position') == 'Team Leader Surveyor' || $this->session->userdata('position') == 'Team Leader Helpdesk Provisioning' || $this->session->userdata('position') == 'Team Leader Assurance Consumer Service' || $this->session->userdata('position') == 'Admin HSE' || $this->session->userdata('position') == 'Site Manager Fiber Academy' || $this->session->userdata('position') == 'Site Manager Provisioning' || $this->session->userdata('position') == 'Site Manager Assurance Consumer Services' || $this->session->userdata('position') == 'Site Manager Helpdesk' || $this->session->userdata('position') == 'Site Manager Assurance Corporate' || $this->session->userdata('position') == 'Site Manager Project Deployment' || $this->session->userdata('position') == 'Team Leader Fiber Academy' || $this->session->userdata('position') == 'Team Leader TSEL Services'){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('dash_slide_marshall', $data);
            $this->load->view('footer_dashboard', $data);
        }

        else if ($this->session->userdata('position') == 'Admin Human Capital Service' || $this->session->userdata('position') == 'Team Leader Human Capital Service'){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('dash_slide_hr', $data);
            $this->load->view('footer_dashboard', $data);
        }

        else if ($this->session->userdata('nama') == 'ANUGRAH VITO AHYA' || $this->session->userdata('nama') == 'MOH SULAIMAN YAASIIN' || $this->session->userdata('position') == 'Admin Maintenance' || $this->session->userdata('position') == 'Site Manager Maintenance' || $this->session->userdata('position') == 'Team Leader Preventive Maintenance' || $this->session->userdata('position') == 'Team Leader Corrective Maintenance & QE' || $this->session->userdata('position') == 'Mgr Maintenance Malang' || $this->session->userdata('position') == 'Admin Procurement & Partnership' || $this->session->userdata('position') == 'Team Leader Procurement & Partnership' || $this->session->userdata('position') == 'Admin Commerce' || $this->session->userdata('position') == 'Team Leader Commerce' || $this->session->userdata('position') == 'Site Manager Commerce'){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('message', $data);
            $this->load->view('footer_dashboard', $data);
        }

        else if ($this->session->userdata('position') == 'Team Leader Inventory & Asset Management NTE' ){
            $this->load->view('aside', $data);
            $this->load->view('header', $data);
            $this->load->view('dash_slide_marshall', $data);
            $this->load->view('footer_dashboard', $data);
        }


        else {
            redirect(base_url('index.php/login/viewlogin/notstilluser'));
        }

    }
}