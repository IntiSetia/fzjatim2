<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rakor extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');

        if ($this->session->userdata('login')!==TRUE)
            redirect('index.php/login');
    }

    function index()
    {
            $this->load->view('header_rakor');
    }
}