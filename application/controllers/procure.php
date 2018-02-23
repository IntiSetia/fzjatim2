<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procure extends CI_Controller {
    function __construct() {

        if (!logged_in())
            redirect('index.php/login');

        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        //$this->load->model('modellogin');
    }

    function index(){
        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('procurement/penunjukan_pekerjaan');
        $this->load->view('footer_dashboard');
    }
}