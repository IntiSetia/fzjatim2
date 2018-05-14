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

    public function kurangijumlah($no)
    {
        $this->db->select('jumlah')->from('data_inventnonproject')->where('no', $no);
        $query = $this->db->get();

            $sql = $query->row();
            return $sql->jumlah;
    }

    function selectnonwhere($table){
        $query  = $this->db->select('*')
            ->from($table)
            ->get();
        return $query->result_array();
    }

    function get_data_currently($no){
        $query  = $this->db
            ->select('*')
            ->from('data_inventnonproject')
            ->where('no', $no)
            ->get();
        return $query->result_array();
    }

    function update($table, $data, $where){
        $this->db->update($table, $data, $where);
    }

    public function data_peminjaman(){
        return $this->db->join('data_inventnonproject','data_inventnonproject.no = data_peminjaman.no')
                        ->get('data_peminjaman')
                        ->result();
    }

    public function kembali($id_peminjaman, $id_barang, $tgl_pengembalian){
        //$query = $this->db->query("UPDATE data_peminjaman SET status = 'Sudah Dikembalikan' WHERE id_peminjaman = $id_peminjaman");
        //$this->db->query($add_tanggal);

        $query = ("UPDATE data_peminjaman SET status = 'Sudah Dikembalikan', tgl_pengembalian = '$tgl_pengembalian' WHERE id_peminjaman = $id_peminjaman");
        $this->db->query($query);

        $jml_pinjam = $this->db->query("SELECT jml_barang FROM data_peminjaman WHERE id_peminjaman = '$id_peminjaman'")->row()->jml_barang;
        $jml_stok = $this->db->query("SELECT jumlah FROM data_inventnonproject WHERE no = '$id_barang'")->row()->jumlah;
        $todtal = $jml_stok + $jml_pinjam;

        $this->db->query("UPDATE data_inventnonproject SET jumlah = '$todtal' WHERE no = '$id_barang'");

    }

}