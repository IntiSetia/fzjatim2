<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome2 extends CI_Controller {

    public function index()
    {
    	if (!logged_in())

        $this->load->view('header');
        $this->load->view('aside');
        $this->load->view('newwelcome');
        $this->load->view('footer');
    }
}
