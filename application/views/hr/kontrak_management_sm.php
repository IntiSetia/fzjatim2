          <?php
          date_default_timezone_set("Asia/Jakarta");

                foreach ($sm as $a) {
                  $sm = $a['nik'];
                  $position_name = $a['position_name'];
                  $psa = $a['psa'];
                }

              foreach ($position_name as $d){
                  $indikator  = $d['indikator'];
                  $ind        = explode(",", $indikator);
              }

              date_default_timezone_set('Asia/Jakarta');
              ?>

              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">
                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                      <!-- <h1>
                        User Profile
                      </h1> -->
                      <ol class="breadcrumb">
                          <li><a href="<?= base_url('index.php/hrperformance/input_kontrak') ?>" style="color: blue;"><i
                                          class="fa fa-angle-left" style="color: blue;"></i> Kembali</a></li>
                      </ol>
                  </section>

                  <br>
                  <br>

                  <section class="content-header col-xs-3">
                      <h1 style="text-align: right;">
                          <img style="height: 80px; width: 80px; "
                               src="<?= base_url('assets/image/logo-curved.png') ?>"/>
                      </h1>
                  </section>
                  <section class="content-header col-xs-6">
                      <h1 style="text-align: center;">
                          Kontrak Management <?=$position_name;?>
                      </h1>
                  </section>
                  <section class="content-header col-xs-3">
                      <h1 style="text-align: left;">
                          <img style="height: 60px; width: 190px; "
                               src="<?= base_url('assets/dist/img/New-Logo-TA-2016.png'); ?>"/>
                      </h1>
                  </section>

                  <br>
                  <br>
                  <br>
                  <br>

                  <section class="content">
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="box">
                                  <!--<div class="box-header">
                                    <h3 class="box-title">Hover Data Table</h3>
                                  </div>-->
                                  <!-- /.box-header -->

                                  <div class="box-body">
                                      <div style="overflow-x:auto;">
                                          <table class="table table-bordered table-hover">
                                              <thead>
                                              <tr class="bg-black color-palette">
                                                  <th>No</th>
                                                  <th>Parameter/Indikator</th>
                                                  <th style="text-align: center;">KPI Type</th>
                                                  <th style="text-align: center;">Unit</th>
                                                  <th style="text-align: center;">Weight</th>
                                                  <th style="text-align: center;">Target</th>
                                                  <th style="text-align: center;">Realisasi</th>
                                                  <th style="text-align: center;">Pencapaian</th>
                                                  <th style="text-align: center;">Score</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              <tr class="bg-red color-palette">
                                                  <th>I.</th>
                                                  <th>FINANCIAL</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">

                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                              </tr>

                                              <tr class="bg-gray-active color-palette">
                                                  <th></th>
                                                  <th><b>Own Financial</b></th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">

                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                              </tr>

                                              <tr class="bg-gray color-palette">
                                                  <th></th>
                                                  <td>Cost Leadership</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">

                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                              </tr>

                                              <tr class="bg-red color-palette">
                                                  <th>II.</th>
                                                  <th>CUSTOMER</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">

                                                  </th>
                                                  <td style="text-align: center;">&nbsp;</td>
                                                  <td style="text-align: center;">&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                              </tr>

                                              <tr class="bg-gray-active color-palette">
                                                  <th></th>
                                                  <th><b>Customer Experience</b></th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">

                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                              </tr>

                                              <tr class="bg-gray color-palette">
                                                  <th></th>
                                                  <td>
                                                      <?php
                                                      if ($position_name == "Site Manager Provisioning") {
                                                          echo "SLG Fulfillment";
                                                      } else if ($position_name == "Site Manager Assurance Consumer Services") {
                                                          echo "SLG Assurance";
                                                      } else if ($position_name == "Site Manager Maintenance") {
                                                          echo "SLG Maintenance";
                                                      }
                                                      ?>
                                                  </td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">

                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                              </tr>

                                              <tr class="bg-red color-palette">
                                                  <th>III.</th>
                                                  <th>INTERNAL BUSINESS PROCESS</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">

                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td style="text-align: center;">&nbsp;</td>
                                                  <td style="text-align: center;">&nbsp;</td>
                                              </tr>

                                              <tr class="bg-gray-active color-palette">
                                                  <th></th>
                                                  <th><b>Lean</b></th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">

                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                              </tr>

                                              <tr class="bg-gray color-palette">
                                                  <th></th>
                                                  <td>Service Excellence Achievement</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">

                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                              </tr>

                                              <tr class="bg-red color-palette">
                                                  <th>IV.</th>
                                                  <th>LEARNING & GROWTH</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">

                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td style="text-align: center;">&nbsp;</td>
                                                  <td style="text-align: center;">&nbsp;</td>
                                              </tr>

                                              <tr class="bg-gray-active color-palette">
                                                  <th></th>
                                                  <th><b>Organizational Capital</b></th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">

                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                              </tr>

                                              <tr class="bg-black color-palette">
                                                  <th colspan="4">Total</th>
                                                  <th style="text-align: center;">

                                                  </th>
                                                  <!--<th colspan="2">&nbsp;</th>
                                                  <td style="text-align: center;">&nbsp;</td>
                                                  <td style="text-align: center;">&nbsp;</td>-->
                                              </tr>
                                              </tbody>
                                          </table>
                                      </div>
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




