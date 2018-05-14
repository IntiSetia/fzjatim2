<?php
  Class HR extends CI_Model
  {
      function __construct()
      {
          $this->load->database();
      }

      function data($where)
      {
          $query = $this->db->query("SELECT * FROM data_nikposisism INNER JOIN data_posisi_sm
            on data_nikposisism.posisi = data_posisi_sm.id_posisi
            INNER JOIN data_km
            on data_posisi_sm.id_posisi = data_km.id_posisi
            INNER JOIN data_parameter`
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

      function selectwhereall($table, $where)
      {
          $query = $this->db->select('*')
              ->from($table)
              ->where($where)
              ->get();
          return $query->result_array();
      }

      function selectnonwhere($table)
      {
          $query = $this->db->select('*')
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
              if ($_POST['search']['value']) // if datatable send POST for search
              {

                  if ($i === 0) // first loop
                  {
                      $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                      $this->db->like($item, $_POST['search']['value']);
                  } else {
                      $this->db->or_like($item, $_POST['search']['value']);
                  }

                  if (count($this->column_search) - 1 == $i) //last loop
                      $this->db->group_end(); //close bracket
              }
              $i++;
          }

          if (isset($_POST['order'])) // here order processing
          {
              $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
          } else if (isset($this->order)) {
              $order = $this->order;
              $this->db->order_by(key($order), $order[key($order)]);
          }
      }

      function get_datatables()
      {
          $this->_get_datatables_query();
          if ($_POST['length'] != -1)
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

      function get_all_data($table)
      {
          //$this->db->from($table);   //untuk all data menggunakan Data HR Sec
          //$query  = $this->db->get();
          $query = $this->db
              ->select('*')
              ->from($table)
              ->where('nik IS NOT NULL')
              ->get();
          return $query->result_array();
      }

      function get_data_currently($id)
      {
          return $this->db->select('*')
                          ->from('data_hr_sec')
                          ->where('nik', $id)
                          ->get()
                          ->result_array();
      }

      function get_data($where)
      {
          $query = $this->db
              ->select('*')
              ->from('data_hr_sec')
              ->where('nik', $where)
              ->get();
          return $query->result_array();
      }

      function get_data_sm($where)
      {
          $query = $this->db
              ->select('*')
              ->from('data_hr_sec')
              ->where('nik', $where)
              ->get();
          return $query->result_array();
      }

      function get_data_km($where)
      {
          $query = $this->db
              ->select('*')
              ->from('data_km')
              ->where('nik', $where)
              ->get();
          return $query->result_array();
      }

      function get_data_tl($where)
      {
          $query = $this->db
              ->select('*')
              ->from('data_hr_sec')
              ->where('nik', $where)
              ->get();
          return $query->result_array();
      }

      // Fungsi Update for All
      function update($table, $data, $where)
      {
          $this->db->update($table, $data, $where);
      }

      //GET ONE DATA
      function get_one_data($table, $data, $where)
      {
          $query = $this->db->select($data)
              ->from($table)
              ->where('group_fungsi', $where)
              ->get();
          return $query->result_array();
      }

      function get_data_indikator($table, $data, $where)
      {
          $query = $this->db->select('*')
              ->from($table)
              ->where('position_sm', $where)
              ->where('induk_indikator', $data)
              ->get();
          return $query->result_array();
      }

      function posisi()
      {
          $where = $this->session->userdata('psa');
          $query = $this->db->query("SELECT position_name FROM data_hr WHERE psa = '$where' GROUP BY position_name ORDER BY position_name ASC");
          return $query->result_array();
      }

      function nama_naker()
      {
          $where = $this->session->userdata('psa');
          $query = $this->db->query("SELECT nama, nik FROM data_hr WHERE psa = '$where' AND nama IS NOT NULL ORDER BY nama ASC");
          return $query->result_array();
      }

      function add_tgl()
      {
//          $query = $this->db->query("ALTER TABLE data_absendow ADD COLUMN $tgl character varying(50) DEFAULT 'Masuk' ;");

              $data = array(
                  'no' => NULL,
                  'nik' => $this->input->post('nik'),
                  'tanggal' => $this->input->post('tanggal'),
                  'alasan' => $this->input->post('alasan')
              );

              $this->db->insert('data_absendowbaru', $data);

          if($this->db->affected_rows() > 0){
              return TRUE;
          } else {
              return FALSE;
          }
      }

      function updateabsen($table, $data, $where, $tgl)
      {
          $query = $this->db->query("UPDATE $table SET $tgl = '$data' WHERE nik = $where;");
      }

      function add_seragam()
      {
          $data_s = $this->db->where('jenis_seragam', $this->input->post('jenis_seragam'))->get('data_seragam')->row('s');
          $data_m = $this->db->where('jenis_seragam', $this->input->post('jenis_seragam'))->get('data_seragam')->row('m');
          $data_l = $this->db->where('jenis_seragam', $this->input->post('jenis_seragam'))->get('data_seragam')->row('l');
          $data_xl = $this->db->where('jenis_seragam', $this->input->post('jenis_seragam'))->get('data_seragam')->row('xl');
          $data = array(
              's'               => $data_s + $this->input->post('ukuran_s'),
              'm'               => $data_m + $this->input->post('ukuran_m'),
              'l'               => $data_l + $this->input->post('ukuran_l'),
              'xl'              => $data_xl + $this->input->post('ukuran_xl')
          );

          $this->db->where('jenis_seragam', $this->input->post('jenis_seragam'))
                   ->update('data_seragam', $data);

          if ($this->db->affected_rows() > 0)
          {
              return TRUE;
          } else {
              return FALSE;
          }
      }

      function get_data_seragam()
      {
          return $this->db->order_by('no','ASC')
                          ->get('data_seragam')
                          ->result();
      }

      function kurang_stok($foto)
      {
          if($this->input->post('ukuran_merah') != null || $this->input->post('total_merah') != null){
              $jumlah1 = $this->db->where('jenis_seragam', 'Indihome Merah')->get('data_seragam')->row($this->input->post('ukuran_merah'));
          }
          if($this->input->post('ukuran_merahputih') != null || $this->input->post('total_merahputih') != null){
              $jumlah = $this->db->where('jenis_seragam', 'Merah Putih')->get('data_seragam')->row($this->input->post('ukuran_merahputih'));
          }
          if ($foto != 'kosong'){
              $file = array(
                'ba_serah_terima_seragam' => $foto['file_name'],
                  'tanggal_upload_ba' => date('Y-m-d')
              );
          }
          if (isset($jumlah) && $jumlah > 0){
              $data = array(
                  $this->input->post('ukuran_merahputih') => $jumlah - $this->input->post('total_merahputih')
              );

              $this->db->where('jenis_seragam', 'Merah Putih')
                  ->update('data_seragam', $data);
              if (isset($file)){
                  $this->db->where('nik', $this->uri->segment(3))
                      ->update('data_hr_sec', $file);
              }
              if(isset($jumlah1) && $jumlah1 > 0){
                  $data1 = array(
                      $this->input->post('ukuran_merah') => $jumlah1 - $this->input->post('total_merah')
                  );

                  $this->db->where('jenis_seragam', 'Indihome Merah')
                      ->update('data_seragam', $data1);

                  if ($this->db->affected_rows() > 0) {
                      return TRUE;
                  } else {
                      return FALSE;
                  }
              }else{
                  if ($this->db->affected_rows() > 0) {
                      return TRUE;
                  } else {
                      return FALSE;
                  }
              }
          }else{
              if (isset($file)){
                  $this->db->where('nik', $this->uri->segment(3))
                      ->update('data_hr_sec', $file);
              }
              if(isset($jumlah1) && $jumlah1 > 0){
                  $data1 = array(
                      $this->input->post('ukuran_merah') => $jumlah1 - $this->input->post('total_merah')
                  );

                  $this->db->where('jenis_seragam', 'Indihome Merah')
                      ->update('data_seragam', $data1);

                  if ($this->db->affected_rows() > 0) {
                      return TRUE;
                  } else {
                      return FALSE;
                  }
              }else{
                  if (isset($file)){
                      if ($this->db->affected_rows() > 0) {
                          return TRUE;
                      } else {
                          return FALSE;
                      }
                  }else{
                      return FALSE;
                  }
              }
          }

      }

      function kirim_bpjs($foto){
          $file= array(
              'bpjs' => $foto['file_name']
          );

          $this->db->where('nik', $this->uri->segment(3))
              ->update('data_hr_sec', $file);

          if ($this->db->affected_rows() > 0) {
              return TRUE;
          } else {
              return FALSE;
          }
      }
  }
?>