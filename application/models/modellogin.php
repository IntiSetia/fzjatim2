<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modellogin extends CI_Model {

    function __construct(){
        $this->load->database();
    }

    //LOGIN
    function login($data){
        $query = $this->db->select('*')
                      ->from("data_user")
                      ->where($data)
                      ->get();
        return $query->result_array();
    }

    //SELECT ALL DATA
    function get_all_data($table){
        $this->db->from($table);
        $query 	= $this->db->get();
        return $query->result_array();
    }

    //SELECT ALL DATA WITH CURRENT MITRA
    function get_all_data_mitra($table, $nama_mitra){
        $query 	= $this->db->select('*')
            ->from($table)
            ->where('nama_mitra', $nama_mitra)
            ->get();
        return $query->result_array();
    }

    //SHOW DATA WITH SELECTED ID
    function get_data_currently($id, $table){
        $query 	= $this->db->select('*')
            ->from($table)
            ->where('nd_inet', $id)
            ->get();
        return $query->result_array();
    }

    //UPDATE DATA WITH SELECTED ID
    function update_data($table, $data, $where){
        $this->db->update($table, $data, $where);
    }

    function get_user($nik, $pass)
    {
        $c_nik 	    = $nik;
        $c_pass 	= $pass;
        $query 		= $this->db->get_where('data_user', array(
                'username' 	=> $c_nik,
                'password'	=> $c_pass
            )
        );
        return $query->result_array();
    }

    function update($table, $data, $where){
        $this->db->update($table, $data, $where);
    }
}
?>