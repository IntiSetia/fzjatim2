          <?php
            foreach ($sm as $a) {
              $sm  = $a['nik'];
            }
          ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header col-xs-3">
      <h1 style="text-align: right;">
        <img style="height: 70px; width: 70px; " src="<?=base_url('assets/dist/img/100_persen_fiber.png')?>" />
      </h1>
    </section>
    <section class="content-header col-xs-6">
      <h1 style="text-align: center;">
        Kontrak Manajement Site Manager Consumer Services Tahun <?php echo date('Y');?>
      </h1>
    </section>
    <section class="content-header col-xs-3">
      <h1 style="text-align: left;">
        <img style="height: 60px; width: 190px; " src="<?=base_url('assets/dist/img/New-Logo-TA-2016.png');?>" />
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
            <?php
            foreach ($km as $b) {
            ?>
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
                    <th style="text-align: center;">50</th>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>a. Achievement Revenue Amija</td>
                    <td style="text-align: center;">Specific</td>
                    <td style="text-align: center;">Rp. M</td>
                    <td style="text-align: center;">50</td>
                    <td style="text-align: center;">0,30</td>
                    <td style="text-align: center;"><?=$b['revenue'];?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr class="bg-red color-palette">
                    <th>II.</th>
                    <th>CUSTOMER</th>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <th style="text-align: center;">33</th>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>a. SLG Comply Ratio (Assurance)</td>
                    <td style="text-align: center;">Specific</td>
                    <td style="text-align: center;">%</td>
                    <td style="text-align: center;">11</td>
                    <td style="text-align: center;">95</td>
                    <td style="text-align: center;"><?=$b['slg'];?></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>b. OverDue Time Ratio (Assurance)</td>
                    <td style="text-align: center;">Specific</td>
                    <td style="text-align: center;">%</td>
                    <td style="text-align: center;">11</td>
                    <td style="text-align: center;">5</td>
                    <td style="text-align: center;"><?=$b['reopen'];?></td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>c. Reopen Ticket (Assurance)</td>
                    <td style="text-align: center;">Specific</td>
                    <td style="text-align: center;">%</td>
                    <td style="text-align: center;">11</td>
                    <td style="text-align: center;">5</td>
                    <td style="text-align: center;"><?=$b['odt'];?></td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                  </tr>
                  <tr class="bg-red color-palette">
                    <th>III.</th>
                    <th>INTERNAL BUSINESS PROCESS</th>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <th style="text-align: center;">17</th>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>Poin Aktifitas Bulanan</td>
                    <td style="text-align: center;">Specific</td>
                    <td style="text-align: center;">%</td>
                    <td style="text-align: center;">8</td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>Absensi Teknisi</td>
                    <td style="text-align: center;" style="text-align: center;">Specific</td>
                    <td style="text-align: center;">%</td>
                    <td style="text-align: center;">9</td>
                    <td style="text-align: center;">100</td>
                    <td style="text-align: center;"><?=$b['absensi'];?></td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                  </tr>
                  <tr class="bg-red color-palette">
                    <th>IV.</th>
                    <th>LEARNING & GROWTH</th>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <th style="text-align: center;">0</th>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>Culture 6R</td>
                    <td style="text-align: center;">Common</td>
                    <td style="text-align: center;">%</td>
                    <td style="text-align: center;">0</td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>Pelatihan (e-learning atau kelas)</td>
                    <td style="text-align: center;">Common</td>
                    <td style="text-align: center;">%</td>
                    <td style="text-align: center;">0</td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>BIT (Build In Training) / Briefing</td>
                    <td style="text-align: center;">Common</td>
                    <td style="text-align: center;">%</td>
                    <td style="text-align: center;">0</td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                  </tr>
                  <tr class="bg-black color-palette">
                    <th colspan="4">Total</th>
                    <th style="text-align: center;">100</th>
                    <th colspan="2">&nbsp;</th>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
            <?php
            }
            ?>
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