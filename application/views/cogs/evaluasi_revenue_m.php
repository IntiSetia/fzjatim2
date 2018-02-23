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
                  <!-- <label for="inputEmail3" class="col-sm-1 control-label" style="padding-top: 7px;">BULAN</label> -->
                  <form method="POST" action="<?php echo base_url('index.php/cogs/rev')?>" >
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
                              echo "<option selected='selected' value='all'>All Area</option>";
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
                    <div class="col-sm-2">
                      <input type="submit" name="submit" class="btn btn-primary" value="Submit" >
                    </div>
                  </form>
                </div>
              </div>

        <div class="col-md-4">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Evaluasi Revenue <?=$area;?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="text-align: center;">Periode</th>
                  <th style="text-align: center;">Total Pemasukkan</th>
                </tr>
                  <?php
                    $grandtotal   = 0;
                    foreach ($trend_rev as $a) {
                      $periode  = $a['posting_period'];
                      $total   = $a['total'];

                      if ($total < 0) {
                        $total = $total * -1;
                      }

                      $tampil_total    = number_format($total,2,",",".");

                      echo "<tr>
                            <td style='text-align: center;'>";
                      echo $periode;
                      echo "</td>
                            <td style='text-align: right;'>";
                      echo $tampil_total;
                      echo "</td>
                           </tr>";

                      $grandtotal   += $total;
                    }
                  ?>
                <tr>
                  <th style="text-align: center;">Grand Total</th>
                  <th style="text-align: right;">
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
          <div id="chartdiv_trend_rev_m"></div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper


