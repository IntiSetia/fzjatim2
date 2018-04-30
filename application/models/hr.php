<?php
  Class HR extends CI_Model {
    function __construct(){
      $this->load->database();
    }

    function data($where){
        $query = $this->db->query("SELECT * FROM data_nikposisism INNER JOIN data_posisi_sm
            on data_nikposisism.id_posisi = data_posisi_sm.id_posisi
            INNER JOIN data_km
            on data_posisi_sm.id_posisi = data_km.id_posisi
            INNER JOIN data_parameter
            on data_km.id_parameter = data_parameter.id_parameter
            INNER JOIN data_indikator 
            on data_km.id_indikator = data_indikator.id_indikator
            INNER JOIN data_kpi_type
            on data_km.id_kpi = data_kpi_type.id_kpi_type
            INNER JOIN data_unit 
            on data_km.id_unit = data_unit.id_unit
            INNER JOIN data_nilai_km
            on data_km.id_indikator = data_nilai_km.indikator
            WHERE data_nikposisism.nik = '$where';");
        return $query->result_array();
    }

      function selectwhereall($table, $where){
          $query  = $this->db->select('*')
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


    //THIS IS START OF PIK

    var $table = 'data_hr_sec';
    var $column_order = array(null, 'nik', 'nama', 'position_name', 'direktorat', 'unit', 'sub_unit', 'psa'); //isilah yang ingin diurutkan
    var $column_search = array('nik', 'nama', 'position_name', 'direktorat', 'unit', 'sub_unit', 'psa'); //isilah apa saja yang ingin di search tapi nanti aja
    var $order = array('id' => 'asc'); // default order 

    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    //DIS IS END OF PIK

    function get_all_data($table){
      //$this->db->from($table);   //untuk all data menggunakan Data HR Sec
      //$query  = $this->db->get();
      $query  = $this->db
                ->select('*')
                ->from($table)
                ->where('nik IS NOT NULL')
                ->get();
      return $query->result_array();
    }

    function get_data_currently($id){
      $query  = $this->db
                ->select('*')
                ->from('data_hr_sec')
                ->where('nik', $id)
                ->get();
      return $query->result_array();
    }

    function get_data($where){
      $query  = $this->db
                ->select('*')
                ->from('data_hr_sec')
                ->where('nik', $where)
                ->get();
      return $query->result_array();
    }

    function get_data_sm($where){
      $query  = $this->db
                ->select('*')
                ->from('data_hr_sec')
                ->where('nik', $where)
                ->get();
      return $query->result_array();
    }

    function get_data_km($where){
      $query  = $this->db
                ->select('*')
                ->from('data_km')
                ->where('nik', $where)
                ->get();
      return $query->result_array();
    }

    function get_data_tl($where){
      $query  = $this->db
                ->select('*')
                ->from('data_hr_sec')
                ->where('nik', $where)
                ->get();
      return $query->result_array();
    }

    // Fungsi Update for All
    function update($table, $data, $where){
      $this->db->update($table, $data, $where);
    }

    //GET ONE DATA
      function get_one_data($table, $data, $where){
          $query = $this->db->select($data)
              ->from($table)
              ->where('group_fungsi', $where)
              ->get();
          return $query->result_array();
      }

      function get_data_indikator($table, $data, $where){
        $query = $this->db->select('*')
                 ->from($table)
                 ->where('position_sm', $where)
                 ->where('induk_indikator', $data)
                 ->get();
        return $query->result_array();
    }

    function posisi(){
        $where  = $this->session->userdata('psa');
        $query = $this->db->query("SELECT position_name FROM data_hr WHERE psa = '$where' GROUP BY position_name ORDER BY position_name ASC");
        return $query->result_array();
    }

    function nama_naker(){
        $where  = $this->session->userdata('psa');
        $query = $this->db->query("SELECT nama, nik FROM data_hr WHERE psa = '$where' AND nama IS NOT NULL ORDER BY nama ASC");
        return $query->result_array();
    }
  }
?>