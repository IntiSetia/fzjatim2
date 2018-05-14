<style>
    input[type="text"]
    {
        background: transparent;
        border: none;
        margin-right: 100px;
        width:40%;
    }
    .modal-body label{
        width:40%;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Report Marshall
            <!--<small>advanced tables</small>-->
        </h1>
        <!--<ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Tables</a></li>
          <li class="active">Data tables</li>
        </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--<div class="box-body">
              <div class="form-group">
                  <form method="POST" action="" >
                      <div class="col-sm-2">
                          <div class="form-group">
                              <select   style="width: 100%;" name="area">
                                  <option value='all'>All Area</option>
                                  <option value='JEMBER'>JEMBER</option>
                                  <option value='KEDIRI'>KEDIRI</option>
                                  <option value='MADIUN'>MADIUN</option>
                                  <option value='MALANG'>MALANG</option>
                                  <option value='PASURUAN'>PASURUAN</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                              <select   style="width: 100%;" name="klasifikasi">
                                  <?php
            /*                                  if ($bulan != null) {
                                                  echo "<option selected='selected' value='".$bulan["id"]."'>".$bulan["nama"]."</option>";
                                                  echo "<option value='ytd'>Year to Date</option>";
                                                  $monthName  = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                                  for ($i=1; $i < count($monthName); $i++) {
                                                      echo "<option value=".$i.">" . $monthName[$i] . "</option>";
                                                  }
                                              } else {
                                                  echo "<option selected='selected' value='ytd'>Year to Date</option>";
                                                  $monthName  = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                                  for ($i=1; $i < count($monthName); $i++) {
                                                      echo "<option value=".$i.">" . $monthName[$i] . "</option>";
                                                  }
                                              }
                                              */?>
                              </select>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <input type="submit" name="submit" class="btn btn-primary" value="Submit" >
                      </div>
                  </form>
              </div>
          </div>-->


            <div class="col-xs-12">
                <div class="box">
                    <!--<div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="listplan" class="table table-bordered table-hover display wrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">TGL</th>
                                <th style="text-align: center;">WITEL</th>
                                <th style="text-align: center;">MARSHALL</th>
                                <th style="text-align: center;">JENIS FINDING</th>
                                <th style="text-align: center;">ALAMAT</th>
                                <th style="text-align: center;">UNIT</th>
                                <th style="text-align: center;">PIC</th>
                                <th style="text-align: center;">DETAIL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $nom = 0;
                            foreach($marshall as $a){
                                $nom++;
                                $no   = $a['no'];
                                ?>
                                <tr>
                                    <td><?= $nom;?></td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($a['tgl'] != NULL) {
                                            echo $a['tgl'];
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($a['psa'] != NULL) {
                                            echo $a['psa'];
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($a['nama'] != NULL) {
                                            echo $a['nama'];
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($a['jenis_finding'] != NULL) {
                                            $jfind    = $a['jenis_finding'];
                                            /*if ($jfind == "Positive Fact Finding") {
                                                echo $a['jenis_finding'] . "<br><hr><br><hr><span class='fa btn btn-success fa-plus'></span>";
                                            } else {
                                                echo $a['jenis_finding'] . "<br><hr><br><hr><span class='fa btn btn-danger fa-minus'></span>";
                                            }*/

                                            if ($jfind == "Positive Fact Finding") {
                                                echo "<span class='fa btn btn-success fa-plus'></span>";
                                            } else {
                                                echo "<span class='fa btn btn-danger fa-minus'></span>";
                                            }
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($a['lokasi'] != NULL) {
                                            echo $a['lokasi'];
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($a['unit_marshall'] != NULL) {
                                            echo $a['unit_marshall'];
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($a['pic'] != NULL) {
                                            echo $a['pic'];
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="<?= base_url('index.php/marshall/detail_marshall/' . $a['no']) ?>" hidden>
                                            <i class="fa fa-bars">
                                            </i>
                                        </a>
                                        <?php
                                        $no1 = htmlspecialchars($no);
                                        echo '<a data-toggle="modal" href="#modal_detil" onclick="prepare_insert('.$no.')">
                                            <i class="fa fa-bars">
                                            </i>
                                        </a>'
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal_detil" tabindex="-1" role="dialog" aria-labelledby="modal_detil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_ubahLabel">Detail</h4>
            </div>
            <div class="modal-body">
                <label>No</label>
                <input type="text" name="no_modal" id="no_modal">
                <br><hr>
                <label>Tanggal</label>
                <input type="text" name="tgl_modal" id="tgl_modal">
                <br><hr>
                <label>PSA</label>
                <input type="text" name="psa_modal" id="psa_modal">
                <br><hr>
                <label>Jenis Finding</label>
                <input type="text" name="jenis_finding_modal" id="jenis_finding_modal">
                <br><hr>
                <label>Lokasi</label>
                <input type="text" name="lokasi_modal" id="lokasi_modal">
                <br><hr>
                <label>Penemuan</label>
                <input type="text" name="penemuan_modal" id="penemuan_modal">
                <br><hr>
                <label>Tindakan Perbaikan</label>
                <input type="text" name="tindakan_perbaikan_modal" id="tindakan_perbaikan_modal">
                <br><hr>
                <label>PIC</label>
                <input type="text" name="pic_modal" id="pic_modal">
                <br><hr>
                <label>Target</label>
                <input type="text" name="target_modal" id="target_modal">
                <br><hr>
                <label>Status</label>
                <input type="text" name="status_modal" id="status_modal">
                <br><hr>
                <label>Catatan</label>
                <input type="text" name="catatan_modal" id="catatan_modal">
                <br><hr>
                <label>Gambar</label>
                <input type="text" name="gambar_modal" id="gambar_modal">
                <br><hr>
                <label>Latitude</label>
                <input type="text" name="latitude_modal" id="latitude_modal">
                <br><hr>
                <label>Longitude</label>
                <input type="text" name="longitude_modal" id="longitude_modal">
                <br><hr>
                <label>Unit Marshall</label>
                <input type="text" name="unit_marshall_modal" id="unit_marshall_modal">
                <br><hr>
                <label>Jenis Instalasi</label>
                <input type="text" name="jenis_instalasi_modal" id="jenis_instalasi_modal">
                <br><hr>
                <label>Jenis Pelanggaran</label>
                <input type="text" name="jenis_pelanggaran_modal" id="jenis_pelanggaran_modal">
                <br><hr>
                <label>Inputer</label>
                <input type="text" name="inputer_modal" id="inputer_modal">
                <br><hr>
                <label>Object ID</label>
                <input type="text" name="object_id_modal" id="object_id_modal">
                <br><hr>
                <label>Position Name</label>
                <input type="text" name="position_name_modal" id="position_name_modal">
                <br><hr>
                <label>NIK</label>
                <input type="text" name="nik_modal" id="nik_modal">
                <br><hr>
                <label>Nama</label>
                <input type="text" name="nama_modal" id="nama_modal">
                <br><hr>
                <label>Witel</label>
                <input type="text" name="witel_modal" id="witel_modal">
                <br><hr>
                <label>Teritori</label>
                <input type="text" name="teritori_modal" id="teritori_modal">
                <br><hr>
                <label>Regional</label>
                <input type="text" name="regional_modal" id="regional_modal">
                <br><hr>
                <label>Level</label>
                <input type="text" name="level_modal" id="level_modal">
                <br><hr>
                <label>Bizpart ID</label>
                <input type="text" name="bizpart_id_modal" id="bizpart_id_modal">
                <br><hr>
                <label>Direktorat</label>
                <input type="text" name="direktorat_modal" id="direktorat_modal">
                <br><hr>
                <label>Unit</label>
                <input type="text" name="unit_modal" id="unit_modal">
                <br><hr>
                <label>Sub Unit</label>
                <input type="text" name="sub_unit_modal" id="sub_unit_modal">
                <br><hr>
                <label>Group</label>
                <input type="text" name="group_modal" id="group_modal">
                <br><hr>
                <label>Sub Group</label>
                <input type="text" name="sub_group_modal" id="sub_group_modal">
                <br><hr>
                <label>Group Fungsi</label>
                <input type="text" name="group_fungsi_modal" id="group_fungsi_modal">
                <br><hr>
                <label>Cost Center</label>
                <input type="text" name="cost_center_modal" id="cost_center_modal">
                <br><hr>
                <label>Status PGS</label>
                <input type="text" name="status_pgs_modal" id="status_pgs_modal">
                <br><hr>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="restart_modal()" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal-content -->
<script>
    function prepare_insert(id_no)
    {
        $('#no_modal').empty();
        $('#tgl_modal').empty();
        $('#psa_modal').empty();
        $('#jenis_finding_modal').empty();
        $('#lokasi_modal').empty();
        $('#penemuan_modal').empty();
        $('#tindakan_perbaikan_modal').empty();
        $('#pic_modal').empty();
        $('#target_modal').empty();
        $('#status_modal').empty();
        $('#catatan_modal').empty();
        $('#gambar_modal').empty();
        $('#latitude_modal').empty();
        $('#longitude_modal').empty();
        $('#unit_marshall_modal').empty();
        $('#jenis_instalasi_modal').empty();
        $('#jenis_pelanggaran_modal').empty();
        $('#inputer_modal').empty();
        $('#object_id_modal').empty();
        $('#position_name_modal').empty();
        $('#nik_modal').empty();
        $('#nama_modal').empty();
        $('#witel_modal').empty();
        $('#teritory_modal').empty();
        $('#regional_modal').empty();
        $('#level_modal').empty();
        $('#bizpart_id_modal').empty();
        $('#direktorat_modal').empty();
        $('#unit_modal').empty();
        $('#sub_unit_modal').empty();
        $('#group_modal').empty();
        $('#sub_group_modal').empty();
        $('#group_fungsi_modal').empty();
        $('#cost_center_modal').empty();
        $('#status_pgs_modal').empty();



        $.getJSON('<?php echo base_url(); ?>index.php/marshall/get_detail_marshall/' + id_no, function(data){
            $('#no_modal').val(data[0].no);
            $('#tgl_modal').val(data[0].tgl);
            $('#psa_modal').val(data[0].psa);
            $('#jenis_finding_modal').val(data[0].jenis_finding);
            $('#lokasi_modal').val(data[0].lokasi);
            $('#penemuan_modal').val(data[0].penemuan);
            $('#tindakan_perbaikan_modal').val(data[0].tindakan_perbaikan);
            $('#pic').val(data[0].pic);
            $('#target_modal').val(data[0].target);
            $('#status_modal').val(data[0].status);
            $('#catatan_modal').val(data[0].catatan);
            $('#gambar_modal').val(data[0].gambar);
            $('#latitude_modal').val(data[0].latitude);
            $('#longitude_modal').val(data[0].longitude);
            $('#unit_marshall_modal').val(data[0].unit_marshall);
            $('#jenis_instalasi_modal').val(data[0].jenis_instalasi);
            $('#jenis_pelanggaran_modal').val(data[0].jenis_pelanggaran);
            $('#inputer_modal').val(data[0].inputer);
            $('#object_id_modal').val(data[0].object_id);
            $('#position_name_modal').val(data[0].position_name);
            $('#nik_modal').val(data[0].nik);
            $('#nama_modal').val(data[0].nama);
            $('#witel_modal').val(data[0].witel);
            $('#teritory_modal').val(data[0].teritory);
            $('#regional_modal').val(data[0].regional);
            $('#level_modal').val(data[0].level);
            $('#bizpart_id_modal').val(data[0].bizpart_id);
            $('#unit_modal').val(data[0].unit);
            $('#sub_unit_modal').val(data[0].sub_unit);
            $('#group_modal').val(data[0].group);
            $('#sub_group_modal').val(data[0].sub_group);
            $('#group_fungsi_modal').val(data[0].group_fungsi);
            $('#cost_center_modal').val(data[0].cost_center);
            $('#status_pgs_modal').val(data[0].status_pgs);



        });
    }
</script>