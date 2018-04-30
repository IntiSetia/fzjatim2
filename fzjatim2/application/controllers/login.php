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
        } else if ($msg == 'notfzjt2'){
            $alert  = "<script type='text/javascript'>alert('Anda bukan naker FZ Jatim-2!');</script>";
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
                    $data = array(
                        'status'     => "AKTIF"
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

                    redirect(base_url("index.php/dash_slide", $data_session));
                } else if ($nik == "admin" && $password == "admin"){
                    redirect('index.php/dash_slide');
                } else {
                    redirect(base_url('index.php/login/notsuccess'));
                }
        }
    }

    function login_sso(){
        $nik        = $this->input->post('nik');
        $password   = $this->input->post('password');

        //STEP1
        $post_data = http_build_query(
            array(
                'id_aplikasi'      => '209'
            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $post_data
            )
        );

        $context    = stream_context_create($opts);
        $result     = file_get_contents('http://api.telkomakses.co.id/API/ip_receiver.php', false, $context);
        $result     = json_decode($result, true);

           if ($result['message'] == "Receiver OK") {
               /*echo "Halo";*/
               $post_data2 = http_build_query(
                   array(
                       'id_aplikasi'    => '209',
                       'id_api'         => '303',
                       'nik'            => $nik,
                       'password'       => $password
                   )
               );

               $opts2 = array('http' =>
                   array(
                       'method' => 'POST',
                       'header' => 'Content-type: application/x-www-form-urlencoded',
                       'content' => $post_data2
                   )
               );

               $context2    = stream_context_create($opts2);
               $result2     = file_get_contents('http://api.telkomakses.co.id/API/provisioning_api.php', false, $context2);
               $result2     = json_decode($result2, true);

               /*echo "Message " . $result2['message'] . "<br>";
               echo "Key " . $result2['key'];*/

               $key         = $result2['key'];

                   if ($result2['message'] == "auth ok"){
                       //echo "Hai";
                       $post_data3 = http_build_query(
                           array(
                               'username'   => $nik,
                               'password'   => $password,
                               'key'        => $key,
                               'id_api'     => '303'
                           )
                       );

                       $opts3 = array('http' =>
                           array(
                               'method' => 'POST',
                               'header' => 'Content-type: application/x-www-form-urlencoded',
                               'content' => $post_data3
                           )
                       );

                       $context3    = stream_context_create($opts3);
                       $result3     = file_get_contents('http://api.telkomakses.co.id/API/sso/auth_sso_post2.php', false, $context3);
                       $result3     = json_decode($result3, true);

                       if ($result3['auth'] == "Yes") {
                           $where = array(
                               'nik'    => $nik
                               /*'password' => $password*/
                           );

                           //$cek['data'] = $this->modellogin->login($where);
                           $cek     = $this->modellogin->loginsso($where);

                           if(count($cek)==1) {
                               /*$data = array(
                                   'status'     => "AKTIF"
                               );*/

                               $where = array(
                                   'username' => $cek[0]['nik'],
                                   'position' => $cek[0]['position_name']
                               );

                               /*$this->modellogin->update('data_user', $data, $where);*/

                               $data_session = array(
                                   'username'   => $cek[0]['nik'],
                                   'position'   => $cek[0]['position_name'],
                                   'nama'       => $cek[0]['nama'],
                                   'login'      => TRUE
                               );

                               $this->session->set_userdata($data_session);

                               redirect(base_url("index.php/dash_slide", $data_session));
                           } else {
                               redirect(base_url('index.php/login/notfzjt2'));
                           }
                       }
                   } else {
                       redirect(base_url('index.php/login/notsuccess'));
                   }
               } else {
               redirect(base_url('index.php/login/notsuccess'));
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
        $username   = $this->session->userdata('username');

        $data = array(
            'status'     => " "
        );

        $where = array(
            'username'      => $username
        );

        $this->modellogin->update('data_user', $data, $where);

        $this->session->sess_destroy();
        redirect(base_url('index.php/login'));
    }

}