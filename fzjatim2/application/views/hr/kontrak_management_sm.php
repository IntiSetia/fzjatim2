          <?php
          date_default_timezone_set("Asia/Jakarta");
          if($this->session->userdata('position') !== 'Admin Human Capital Service' || $this->session->userdata('position') !== 'Team Leader Human Capital Service' || $this->session->userdata('nama') !== 'TEFANI DIVA WIBOWO' || $this->session->userdata('nama') !== 'INTI SETIA NINGTYAS' || $this->session->userdata('nama') !== 'ANDRE FIRMAN SAPUTRA' || $this->session->userdata('position') !== 'Mgr Shared Service & Performance Jawa Timur 2') {
              ?>
              <div class="content-wrapper">
                  <section class="content-header">
                      <h1 style='color: red;'>Maaf, Anda tidak memiliki akses untuk laman ini</h1>
                  </section>
              </div>
              <?php
          } else {

              foreach ($sm as $a) {
                  $sm = $a['nik'];
                  $position_name = $a['position_name'];
                  $psa = $a['psa'];
              }

              /*foreach ($position_name as $d){
                  $indikator  = $d['indikator'];
                  $ind        = explode(",", $indikator);
              }*/

              date_default_timezone_set('Asia/Jakarta');

              if ($km == NULL) {
                  ?>
                  <div class="content-wrapper">
                      <section class="content-header">
                          <h1 style='color: red;'>Kontrak Management atas NIK: <?php echo $sm; ?> tidak tersedia</h1>
                          <ol class="breadcrumb">
                              <li><a href="<?= base_url('index.php/hrperformance/input_kontrak') ?>"
                                     style="color: blue;"><i class="fa fa-angle-left" style="color: blue;"></i> Kembali</a>
                              </li>
                          </ol>
                      </section>
                  </div>
                  <?php
              }
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
                          <img style="height: 70px; width: 70px; "
                               src="<?= base_url('assets/dist/img/100_persen_fiber.png') ?>"/>
                      </h1>
                  </section>
                  <section class="content-header col-xs-6">
                      <h1 style="text-align: center;">
                          Kontrak Management <?php echo $position_name . " " . $psa; ?> <?php echo date('Y'); ?>
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
                                                      <?php
                                                      $fw = " ";
                                                      foreach ($financial as $f) {
                                                          $fweight = $f['weight'];
                                                          $fw += $fweight;
                                                      }
                                                      echo $fw;
                                                      ?>
                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                              </tr>

                                              <?php
                                              foreach ($financial as $f2) {
                                                  ?>
                                                  <tr>
                                                      <td>&nbsp;</td>
                                                      <td><?= $f2['indikator'] ?></td>
                                                      <td style="text-align: center;"><?= $f2['kpi_type'] ?></td>
                                                      <td style="text-align: center;"><?= $f2['unit'] ?></td>
                                                      <td style="text-align: center;"><?= $f2['weight'] ?></td>
                                                      <td style="text-align: center;"></td>
                                                      <td style="text-align: center;"></td>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                  </tr>
                                                  <?php
                                              }
                                              ?>

                                              <tr class="bg-red color-palette">
                                                  <th>II.</th>
                                                  <th>CUSTOMER</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">
                                                      <?php
                                                      $cw = " ";
                                                      foreach ($customer as $c) {
                                                          $cweight = $c['weight'];
                                                          $cw += $cweight;
                                                      }
                                                      echo $cw;
                                                      ?>
                                                  </th>
                                                  <td style="text-align: center;">&nbsp;</td>
                                                  <td style="text-align: center;">&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                              </tr>

                                              <?php
                                              foreach ($customer as $c2) {
                                                  ?>
                                                  <tr>
                                                      <td>&nbsp;</td>
                                                      <td><?= $c2['indikator'] ?></td>
                                                      <td style="text-align: center;"><?= $c2['kpi_type'] ?></td>
                                                      <td style="text-align: center;"><?= $c2['unit'] ?></td>
                                                      <td style="text-align: center;"><?= $c2['weight'] ?></td>
                                                      <td style="text-align: center;"></td>
                                                      <td style="text-align: center;"></td>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                  </tr>
                                                  <?php
                                              }
                                              ?>

                                              <tr class="bg-red color-palette">
                                                  <th>III.</th>
                                                  <th>INTERNAL BUSINESS PROCESS</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">
                                                      <?php
                                                      $iw = " ";
                                                      foreach ($internal as $i) {
                                                          $iweight = $i['weight'];
                                                          $iw += $iweight;
                                                      }
                                                      echo $iw;
                                                      ?>
                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td style="text-align: center;">&nbsp;</td>
                                                  <td style="text-align: center;">&nbsp;</td>
                                              </tr>

                                              <?php
                                              foreach ($internal as $i2) {
                                                  ?>
                                                  <tr>
                                                      <td>&nbsp;</td>
                                                      <td><?= $i2['indikator'] ?></td>
                                                      <td style="text-align: center;"><?= $i2['kpi_type'] ?></td>
                                                      <td style="text-align: center;"><?= $i2['unit'] ?></td>
                                                      <td style="text-align: center;"><?= $i2['weight'] ?></td>
                                                      <td style="text-align: center;"></td>
                                                      <td style="text-align: center;"></td>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                  </tr>
                                                  <?php
                                              }
                                              ?>

                                              <tr class="bg-red color-palette">
                                                  <th>IV.</th>
                                                  <th>LEARNING & GROWTH</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <th style="text-align: center;">
                                                      <?php
                                                      $lw = " ";
                                                      foreach ($learning as $l) {
                                                          $lweight = $l['weight'];
                                                          $lw += $lweight;
                                                      }
                                                      echo $lw;
                                                      ?>
                                                  </th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td style="text-align: center;">&nbsp;</td>
                                                  <td style="text-align: center;">&nbsp;</td>
                                              </tr>

                                              <?php
                                              foreach ($learning as $l2) {
                                                  ?>
                                                  <tr>
                                                      <td>&nbsp;</td>
                                                      <td><?= $l2['indikator'] ?></td>
                                                      <td style="text-align: center;"><?= $l2['kpi_type'] ?></td>
                                                      <td style="text-align: center;"><?= $l2['unit'] ?></td>
                                                      <td style="text-align: center;"><?= $l2['weight'] ?></td>
                                                      <td style="text-align: center;"></td>
                                                      <td style="text-align: center;"></td>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                  </tr>
                                                  <?php
                                              }
                                              ?>

                                              <tr class="bg-black color-palette">
                                                  <th colspan="4">Total</th>
                                                  <th style="text-align: center;">
                                                      <?php
                                                      $total = $fw + $cw + $iw + $lw;
                                                      echo $total;
                                                      ?>
                                                  </th>
                                                  <th colspan="2">&nbsp;</th>
                                                  <td style="text-align: center;">&nbsp;</td>
                                                  <td style="text-align: center;">&nbsp;</td>
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
              <?php
          }?>