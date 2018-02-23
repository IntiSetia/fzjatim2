<?php
//error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('modellogin');
        $this->load->library('session');
    }

    function index(){
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'notsuccess'){
            $alert  = "<script type='text/javascript'>alert('Username atau Password Anda Salah!');</script>";
        }
        $data['_alert'] = $alert;

        $this->load->view('login/login2', $data);
    }

    function login_cek(){
        $nik        = $this->input->post('nik');
        $password   = $this->input->post('password');

        if ($password == "TELKOMAKSES") {
                $where = array(
                'username' => $nik,
                'password' => $password
            );

    //        $cek['data'] = $this->modellogin->login($where);
            $cek = $this->modellogin->login($where);

                if(count($cek)==1){
                    $data = array(
                        'kehadiran'     => "HADIR"
                    );

                    $where = array(
                        'username'      => $cek[0]['username']
                    );

                    $this->modellogin->update('data_user', $data, $where);

                    $data_session = array(
                        'username'  => $cek[0]['username'],
                        'tipe_user' => $cek[0]['tipe_user'],
                        'login'     => TRUE
                    );

                    $this->session->set_userdata($data_session);

                    redirect(base_url("index.php/rakor", $data_session));
                } else {
                    redirect(base_url('index.php/login/notsuccess'));
                }
        } else {

            $where = array(
                'username' => $nik,
                'password' => $password
            );

    //        $cek['data'] = $this->modellogin->login($where);
            $cek = $this->modellogin->login($where);

                if(count($cek)==1){
                    $data_session = array(
                        'username'  => $cek[0]['username'],
                        'tipe_user' => $cek[0]['tipe_user'],
                        'login'     => TRUE
                    );

                    $this->session->set_userdata($data_session);

                    redirect(base_url("index.php/dash_slide", $data_session));
                } else if ($nik == "admin" && $password == "admin"){
                    redirect('index.php/dash_slide');
                } else {
                    redirect(base_url('index.php/login/notsuccess'));
                }
        }
    }

    function checklogin()
    {
        $nik = $this->input->post('nik');
        $pass = $this->input->post('password');

        $data = array(
            'username' => $nik,
            'password' => $pass
        );

        if ($nik == "admin" && $pass == "admin") {
            redirect('index.php/dash_slide');
        } else {
            $check = $this->modellogin->get_user($nik, $pass);

            if ($check !== NULL) {
                //echo "berhasil";

                /*$sess = array(
                    'username' => $nik,
                    'tipe_user' => $check['tipe_user'],
                    'login' => TRUE
                );

                $this->session->set_userdata($sess);

                redirect("index.php/dash_slide");*/

                echo $check['tipe_user'];

                //echo "berhasil";

                //Agar ketika masuk tidak melalui halaman index akan kembali ke halaman dimana dia masuk
                /*if (!empty($idm)) {
                    redirect('view/movie_details/'.$idm);
                } else {
                    redirect('view/');
                }*/
            } else {
                redirect('index.php/login/notsuccess');
            }
        }
    }

    function notsuccess(){
        $alert  = 'Username dan Password Anda Salah!!';
        $data['_alert'] = $alert;

        $this->load->view('login/login2', $data);
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('index.php/login'));
    }

}