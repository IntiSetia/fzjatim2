<?php 
  date_default_timezone_set("Asia/Jakarta");
  if($this->session->userdata('position') !== 'Site Manager Fiber Academy' || $this->session->userdata('position') !== 'Team Leader Fiber Academy' || $this->session->userdata('nama') !== 'TEFANI DIVA WIBOWO' || $this->session->userdata('nama') !== 'INTI SETIA NINGTYAS' || $this->session->userdata('nama') !== 'ANDRE FIRMAN SAPUTRA' || $this->session->userdata('position') !== 'Mgr Shared Service & Performance Jawa Timur 2') {
      ?>
      <div class="content-wrapper">
          <section class="content-header">
              <h1 style='color: red;'>Maaf, Anda tidak memiliki akses untuk laman ini</h1>
          </section>
      </div>
      <?php
  } else {
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Form Marshall</h1>
            <!-- <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Forms</a></li>
              <li class="active">General Elements</li>
            </ol> -->
        </section>

        <section class="content">
            <form action="<?php echo base_url() . "index.php/marshall/input_form"; ?>" method="post"
                  enctype="multipart/form-data">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-7">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Detail</h3>
                            </div>
                            <div class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tanggal</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="tgl" value="2018-03-03"
                                                   readonly="readonly"/>
                                        </div>
                                    </div>

                                    <div class="form-group" hidden="hidden">
                                        <label class="col-sm-4 control-label">Marshall</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="marshall"
                                                   value="<?= $this->session->userdata('username') ?>"
                                                   readonly="readonly"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Witel</label>
                                        <div class="col-sm-8">
                                            <select class="js-example-placeholder-single js-states form-control"
                                                    name="wilayah">
                                                <option value="">Pilih Witel</option>
                                                <option value="Jember">Jember</option>
                                                <option value="Kediri">Kediri</option>
                                                <option value="Madiun">Madiun</option>
                                                <option value="Malang">Malang</option>
                                                <option value="Pasuruan">Pasuruan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Jenis Finding</label>
                                        <div class="col-sm-8">
                                            <select class="js-example-placeholder-single js-states form-control"
                                                    name="jenisf">
                                                <option value="">Pilih Finding</option>
                                                <option value="Positive Fact Finding">Positive Fact Finding</option>
                                                <option value="Negative Fact Finding">Negative Fact Finding</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Lokasi</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" placeholder="Lokasi" name="lokasi"/>
                                        </div>
                                    </div>

                                    <div class="form-group has-warning">
                                        <label class="col-sm-4 control-label">Penemuan</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" placeholder="Penemuan"
                                                   name="penemuan"/>
                                        </div>
                                    </div>

                                    <div class="form-group has-warning">
                                        <label class="col-sm-3 control-label"></label>
                                        <label class="col-sm-8 help-block control-label">Format Penulisan Penemuan:
                                            temuan,temuan (tanpaspasi)</label>
                                    </div>

                                    <div class="form-group ">
                                        <label class="col-sm-4 control-label">Tindakan Perbaikan</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" placeholder="Tindakan Perbaikan"
                                                   name="tindakan"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">PIC</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" placeholder="PIC" name="pic"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Unit</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" placeholder="Unit" name="unit"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Target</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" placeholder="Target" name="target"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" placeholder="Status" name="status"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Catatan</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" placeholder="Catatan"
                                                   name="catatan"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- right column -->
                    <div class="col-md-5">
                        <!-- Horizontal Form -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Evident</h3>
                            </div>
                            <div class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Upload Gambar</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" name="evident"/>
                                        </div>
                                        <hr>
                                        <label class="col-sm-12 help-block" style="text-anchor: red;">Upload Evident
                                            (ekstensi jpg/jpeg/png maks: 2 MB)</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" style="width: 150px;" value="Submit"/>
                        <?php
                        if ($_alert != NULL) {
                            echo "<h5 class='box-title' style='color: green;'>" . $_alert . "</h5>";
                        } else {
                            echo " ";
                        }
                        ?>
                    </div>


                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
}
    ?>