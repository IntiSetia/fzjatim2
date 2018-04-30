<?php
  error_reporting(0);
?>

<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
              <div class="box-body">
                <div class="form-group">

                  <?php
                    foreach ($trend_rev as $a) {
                      $area           = $a['area'];
                      $klasifikasi    = $a['klasifikasi'];
                    }
                  ?>

                  <!-- <label for="inputEmail3" class="col-sm-1 control-label" style="padding-top: 7px;">BULAN</label> -->
                  <form method="POST" action="<?php echo base_url('index.php/cogs/cogs_klasifikasi_m')?>" >
                    <div class="col-sm-3">
                      <div class="form-group">
                        <select class="form-control select2" style="width: 100%;" name="area">
                          <?php
                            if ($area != null) {
                              echo "<option selected='selected' value='".$area."'>".$area."</option>";
                              echo "<option value='all'>All Area</option>";
                              echo "<option value='JEMBER'>JEMBER</option>";
                              echo "<option value='KEDIRI'>KEDIRI</option>";
                              echo "<option value='MADIUN'>MADIUN</option>";
                              echo "<option value='MALANG'>MALANG</option>";
                              echo "<option value='PASURUAN'>PASURUAN</option>";
                            } else {
                              echo "<option selected='selected' value='ytd'>All Area</option>";
                              echo "<option value='JEMBER'>JEMBER</option>";
                              echo "<option value='KEDIRI'>KEDIRI</option>";
                              echo "<option value='MADIUN'>MADIUN</option>";
                              echo "<option value='MALANG'>MALANG</option>";
                              echo "<option value='PASURUAN'>PASURUAN</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3"> <!--sini kah?-->
                      <div class="form-group">
                        <select class="form-control select2" style="width: 100%;" name="klasifikasi">
                          <?php
                            if ($klasifikasi != null) {
                          ?>
                              <option value='<?=$klasifikasi;?>'><?=$klasifikasi;?></option>
                          <?php
                            }
                          ?>
                        
                          <option value=''>Klasifikasi</option>
                          <option value='ALKER SARKER'>ALKER SARKER</option>
                          <option value='AMORTISASI'>AMORTISASI</option>
                          <option value='BBM'>BBM</option>
                          <option value='DEPRESIASI'>DEPRESIASI</option>
                          <option value='GAJI'>GAJI</option>
                          <option value='MATERIAL ALISTA'>MATERIAL ALISTA</option>
                          <option value='MATERIAL NON PO'>MATERIAL NON PO</option>
                          <option value='PENGELUARAN IF'>PENGELUARAN IF</option>
                          <option value='SEWA GEDUNG'>SEWA GEDUNG</option>
                          <option value='SEWA KBM'>SEWA KBM</option>
                          <option value='SPPD'>SPPD</option>
                          <option value='TAGIHAN MITRA'>TAGIHAN MITRA</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" name="submit" class="btn btn-primary" value="Submit" >
                    </div>
                  </form>
                </div>
              </div>

        <div class="col-xs-12">
          <!-- <div class="box box-info"> -->
            <!-- /.box-header -->
            <!-- form start -->

              <!-- <div class="box-body">
                <div class="form-group">
                
                  <label for="inputEmail3" class="col-sm-1 control-label" style="padding-top: 7px;">BULAN</label>

                  <form method="POST" action="" >
                    <div class="col-sm-4">
                      <div class="form-group">
                        <select class="form-control select2" style="width: 100%;"> -->
                          <!--<option selected="selected"></option>-->
                          
                            <!-- /*$monthName  = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                            for ($i=0; $i < count($monthName); $i++) { 
                              $mn   = 1 + $i;
                              if ($mn == date("m")) {
                                echo "<option selected value=". $mn .">" . $monthName[$i] . "</option>";
                              }
                              else {
                                echo "<option value=". $mn .">" . $monthName[$i] . "</option>";
                              }
                            }*/
                            //date("F Y"); -->
                          
                        <!-- </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" name="submit" class="btn btn-primary" value="Search" >
                    </div>
                  </form>
                </div>
              </div> -->
              <!-- /.box-body -->
              <!-- /.box-footer -->
          <!-- </div> -->
            <!-- /.box-header -->
            <!-- form start -->


          <!--<div class="box">
            <div id="chartdiv_allkla_line"></div>
          </div>-->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper


