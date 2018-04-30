<?php
  error_reporting(0);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Form Input Target</h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-7">
          <!-- general form elements -->
          <div class="box box-primary">
            <form action="<?php echo base_url()."index.php/cogs/input_target";?>" method="post" enctype="multipart/form-data">
            <div class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Area</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="area" required/>
                    <option value="Jember">Jember</option>
                    <option value="Kediri">Kediri</option>
                    <option value="Madiun">Madiun</option>
                    <option value="Malang">Malang</option>
                    <option value="Pasuruan">Pasuruan</option>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Bulan</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="bulan">
                          <?php
                              $nol    = 0;
                              echo "<option selected='selected' value='ytd'>Pilih Bulan</option>";
                              $monthName  = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                              for ($i=1; $i <= count($monthName); $i++) {
                                if ($i < 10) {
                                  echo "<option value=".$nol.$i.">" . $monthName[$i] . "</option>";
                                } else {
                                  echo "<option value=".$i.">" . $monthName[$i] . "</option>";
                                }
                              }
                          ?>
                        </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Jumlah Target</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan Jumlah Target" name="target" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-10">
                    <p class="text-red">*) Masukkan jumlah target dengan tanpa ada angka 0 dibelakangnya</p>
                    <p class="text-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contoh: 4.351.000.000 menjadi 4351 </p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-3">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit" >
                  </div>
                </div>
                
              </div>
          </div>
        </div>
        </form>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->