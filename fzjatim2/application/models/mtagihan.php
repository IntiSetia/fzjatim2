<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtagihan extends CI_Model {

    function __construct(){
        $this->load->database();
    }

    //INSERT
    public function Add($table, $data){
        $add_per = $this->db->insert($table, $data);
        return $add_per;
    }

    //GET DATA LAST
    function get_data_last($table, $data){
        $query = $this->db->select('*')
            ->from($table)
            ->order_by($data, 'DESC')
            ->limit(1)
            ->get();
        return $query->result_array();
    }

    //GET DATA
    function get_data($table, $data){
        $this->db->select('id')
                 ->from($table)
                 ->order_by($data, 'DESC')
                 ->limit(1);
        $query  = $this->db->get();
        return $query->result_array();
    }

    function get_one_data($table, $data, $where){
        $query = $this->db->select($data)
                 ->from($table)
                 ->where('id_khs', $where)
                 ->get();
        return $query->result_array();
    }

    //SELECT DATA LIST
    function get_list($table){
        $this->db->select('id_designator')
                 ->select('uraian')
                 ->select('id_db')
                 ->from($table);
        $query 	= $this->db->get();
        return $query->result_array();
    }

    //SELECT DATA KHS
    function get_data_khs($namakhs){
        $query 	= $this->db->select('*')
            ->from($namakhs)
            ->order_by('nama_khs', 'ASC')
            ->get();
        return $query->result();
    }

    //SELECT DATA KHS
    function notification($table, $data){
        $query 	= $this->db->select('*')
                           ->from($table)
                           ->where('approval_pek', $data)
                           ->get();
        return $query->result_array();
    }

    //SELECT DATA NOT APPROVED
    function get_listnonapproved($table){
        $query 	= $this->db->select('*')
            ->from($table)
            ->where('approval_pek', "")
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

    function update_approve($table, $data, $where){
        $this->db->update($table, $data, $where);
    }

    //LIST PEKERJAAN ALL
    function get_listpekerjaan($table){
        $query 	= $this->db->select('*')
            ->from($table)
            ->get();
        return $query->result_array();
    }

    function get_listitem($table, $id){
        $query 	= $this->db->select('id_designator')
            ->from($table)
            ->where('id_khs', $id)
            ->order_by('id_designator', 'ASC')
            ->get();
        return $query->result_array();
    }

    function get_listitemnonid($table){
        $query 	= $this->db->select('id_designator')
            ->from($table)
            ->order_by('id_designator', 'ASC')
            ->get();
        return $query->result();
    }

    //KHS TELKOM
    function get_data_khs_jenis($table, $where){
        $query 	= $this->db->select('*')
            ->from($table)
            ->where('for', $where)
            ->order_by('nama_khs', 'ASC')
            ->get();
        return $query->result();
    }

    //Select Plan Pekerjaan untuk QE Akses
    function get_plan_pek($table, $where){
        $query 	= $this->db->select('*')
            ->from($table)
            ->where($where)
            ->order_by('pekerjaan', 'ASC')
            ->get();
        return $query->result_array();
    }

    function get_detail_pek($table, $where){
            $query 	= $this->db->select('*')
                ->from($table)
                ->where($where)
                ->get();
            return $query->result();
    }

    function get_detailpek($table, $where){
        $query 	= $this->db->select('*')
            ->from($table)
            ->where($where)
            ->get();
        return $query->result_array();
    }

    //UPDATE DATA WITH SELECTED ID
    /*function update_approve($table, $data, $where){
        $this->db->sql("UPDATE $table SET $data WHERE 'idp' = $where");
    }*/

    /*function update_approve($table, $data, $where){
        $query 	= $this->db->update($table)
                        ->entry($data)
            ->where('idp', $where);
    }*/

    function get_jplan(){
        $query = $this->db
            ->select('COUNT(id) as total')
            ->from('data_planper')
            ->where('approval', "NOK")
            ->get();
        return $query->row()->total;
    }

    function get_jplanreturn(){
        $query = $this->db
            ->select('COUNT(id) as total')
            ->from('data_planper')
            ->where('approval', 'RETURN')
            ->get();
        return $query->row()->total;
    }

    function get_jpek(){
        $query = $this->db
            ->select('COUNT(id) as total')
            ->from('boq_input')
            ->where('approval_pek', 'NOK')
            ->get();
        return $query->row()->total;
    }

    function get_jpekreturn(){
        $query = $this->db
            ->select('COUNT(id) as total')
            ->from('boq_input')
            ->where('approval_pek', 'RETURN')
            ->get();
        return $query->row()->total;
    }

    function get_jbarekon(){
        $query = $this->db
            ->select('COUNT(id) as total')
            ->from('boq_input')
            ->where('approval_rek', '')
            ->get();
        return $query->row()->total;
    }

    function get_jbarekonreturn(){
        $query = $this->db
            ->select('COUNT(id) as total')
            ->from('boq_input')
            ->where('approval_rek', '')
            ->get();
        return $query->row()->total;
    }

    //COMMERCE
    function get_jppo(){
        $query = $this->db->query("SELECT COUNT(id) as total FROM boq_input WHERE boq_real IS NOT NULL AND mitra = 'PT TELKOM AKSES'");
        return $query->row()->total;
    }

    function get_jpbast(){
        $query = $this->db->query("SELECT no_po_telkom FROM boq_input WHERE no_po_telkom IS NOT NULL AND mitra = 'PT TELKOM AKSES' GROUP BY no_po_telkom");
        return $query->result_array();
    }

    function get_jpinvoicefp(){
        $query = $this->db->query("SELECT bast FROM boq_input WHERE bast IS NOT NULL AND mitra = 'PT TELKOM AKSES' GROUP BY bast");
        return $query->result_array();
    }

    //PROCUREMENT
    function get_jppomi(){
        $query = $this->db->query("SELECT COUNT(id) as total FROM boq_input WHERE boq_real IS NOT NULL AND mitra != 'PT TELKOM AKSES'");
        return $query->row()->total;
    }
    
    //GET MATERIAL JASA FROM ID_DESIGNATOR
    function get_mat_jas($table, $where){
        $query = $this->db
            ->select('harga_material, harga_jasa')
            ->from($table)
            ->where('id_designator', $where)
            ->where('khs', 'telkom')
            ->get();
        return $query->result_array();
    }

    function get_matjasmitra($table, $where){
        $query = $this->db
            ->select('harga_material, harga_jasa')
            ->from($table)
            ->where('id_designator', $where)
            ->where('khs', 'mitra')
            ->get();
        return $query->result_array();
    }

    //GET DATA LIST DETAIL PLAN PEKERJAAN NOOK (APPROVAL)
    function getlistplanpekerjaanadmin($table){
        $query = $this->db
                ->select('*')
                ->from($table)
                ->order_by('approval')
                ->get();
        return $query->result_array();
    }

    function getlistplanpekerjaanmanar($table){
        $query = $this->db
                ->select('*')
                ->from($table)
                ->where('approval', 'NOK')
                ->get();
        return $query->result_array();
    }

    //UPDATE PLAN PEKERJAAN NOK APPROVAL
    function update_approvalplan($table, $data, $where){
        $this->db->update($table, $data, $where);
    }

    //GET DATA LIST DETAIL PEKERJAAN NOOK (APPROVAL)
    function getlistpekerjaan($table){
        $query = $this->db
                ->select('*')
                ->from($table)
                ->order_by('approval_pek')
                ->get();
        return $query->result_array();
    }

    //UPDATE PEKERJAAN NOK APPROVAL
    function update_approval($table, $data, $where){
        $this->db->update($table, $data, $where);
    }

    //FOR SUBMENU PEKERJAAN
    function getlistpekerjaanallok($table){
        $query = $this->db
                ->select('*')
                ->from($table)
                ->where('approval_pek', "OK")
                ->order_by('approval_pek')
                ->get();
        return $query->result_array();
    }

    //ALL DETAIL
    function get_data_currently_pek($id){
      $query  = $this->db
                ->select('*')
                ->from('data_planper')
                ->where('id', $id)
                ->get();
      return $query->result_array();
    }

    function get_data_rekon($id){
      $query  = $this->db
                ->select('*')
                ->from('boq_input')
                ->where('id', $id)
                ->get();
      return $query->result_array();
    }

    //NAMA KHS
    function get_nama_khs($table, $id){
        $query  = $this->db
                ->select('nama_khs')
                ->from($table)
                ->where('id_khs', $id)
                ->get();
        return $query->result_array();
    }

    //ID KHS
    function get_id_khs($table, $id){
        $query  = $this->db
                ->select('id_khs')
                ->from($table)
                ->where('nama_khs', $id)
                ->get();
        return $query->result_array();
    }

    //DESIGNATOR
    function get_detail_designator($table, $id){
        $query  = $this->db
                ->select('*')
                ->from($table)
                ->where('id_db', $id)
                ->get();
        return $query->result_array();
    }

    function editpek($table, $data, $where){
      $this->db->update($table, $data, $where);
    }

    //DELETE PLAN
    function delete_plan($id){
        $this->db->where('id', $id);
        $this->db->delete('data_planper');
    }
}
?>