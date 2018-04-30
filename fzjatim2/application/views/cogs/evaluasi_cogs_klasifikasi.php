<?php
  error_reporting(0);
?>
<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Evaluasi COGS per Klasifikasi
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
          <!-- <div class="box box-info"> -->
            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">
                <div class="form-group">

                  <?php
                    foreach ($cogs_per_klasifikasi as $a) {
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
                          <option value='ALKER, SALKER, KBM'>ALKER, SALKER, KBM</option>
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
              <!-- /.box-body -->
              <!-- /.box-footer -->
          <!-- </div> -->
            <!-- /.box-header -->
            <!-- form start -->
                  

        <div class="col-md-4">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> <?=$area ;?> - <?=$klasifikasi;?> </h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Periode</th>
                  <th>Jumlah Pengeluaran</th>
                </tr>
                  <?php
                    $grandtotal   = 0;
                    foreach ($cogs_per_klasifikasi as $a) {
                      $periode  = $a['posting_period'];
                      $jumlah   = $a['jumlah'];

                      if ($jumlah < 0) {
                        $jumlah = $jumlah * -1;
                      }

                      $tampil_jumlah    = number_format($jumlah,2,",",".");

                      echo "<tr>
                            <td>";
                      echo $periode;
                      echo "</td>
                            <td>";
                      echo $tampil_jumlah;
                      echo "</td>
                           </tr>";

                      $grandtotal   += $jumlah;
                    }
                  ?>
                <tr>
                  <th>Grand Total</th>
                  <th>
                    <?php
                      $grandtotal_t    = number_format($grandtotal,2,",",".");
                      echo $grandtotal_t;
                    ?>
                  </th>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div id="chartdiv_cogs_klasifikasi"></div>
        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper