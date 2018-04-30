<?php
Class Model_wh extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    function add($table, $data){
        $this->db->insert($table, $data);
    }

    function select($table, $data, $where){
        $query  = $this->db->select($data)
                ->from($table)
                ->where($where)
                ->get();
        return $query->result_array();
    }

    function selectnonwhere($table){
        $query  = $this->db->select('*')
            ->from($table)
            ->get();
        return $query->result_array();
    }
}