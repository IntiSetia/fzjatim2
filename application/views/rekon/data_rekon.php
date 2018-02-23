 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Rekon
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="datarekon" class="display nowrap table table-bordered table-hover" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>MDF</th>
                  <th>SC</th>
                  <th>NOMOR POTS</th>
                  <th>NOMOR SPEEDY</th>
                  <th>NAMA</th>
                  <th>ALAMAT</th>
                  <th>ODP</th>
                  <th>ONT</th>
                  <th>STB</th>
                  <th>0P - 1P</th>
                  <th>0P - 2P</th>
                  <th>0P - 3P</th>
                  <th>1P - 2P</th>
                  <th>1P - 3P</th>
                  <th>2P - 3P</th>
                  <th>JENIS KABEL</th>
                  <th>PANJANG KABEL (m)</th>
                  <th>KELEBIHAN KABEL (m)</th>
                  <th>TIANG T-7</th>
                  <th>ROSET</th>
                  <th>PATCHCORE</th>
                  <th>INSTALASI SECOND STB</th>
                  <th>TGL VA</th>
                  <th>TGL PS</th>
                  <th>HASIL UKUR REDAMAN</th>
                  <th>PELAKSANA</th>
                  <th>JENIS PEKERJAAN</th>
                  <th>SUMBER ORDER</th>
                  <th>DUPLIKASI</th>
                  <th>HASIL REKON</th>
                  <th>BERITA ACARA</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>MDF</th>
                  <th>SC</th>
                  <th>NOMOR POTS</th>
                  <th>NOMOR SPEEDY</th>
                  <th>NAMA</th>
                  <th>ALAMAT</th>
                  <th>ODP</th>
                  <th>ONT</th>
                  <th>STB</th>
                  <th>0P - 1P</th>
                  <th>0P - 2P</th>
                  <th>0P - 3P</th>
                  <th>1P - 2P</th>
                  <th>1P - 3P</th>
                  <th>2P - 3P</th>
                  <th>JENIS KABEL</th>
                  <th>PANJANG KABEL (m)</th>
                  <th>KELEBIHAN KABEL (m)</th>
                  <th>TIANG T-7</th>
                  <th>ROSET</th>
                  <th>PATCHCORE</th>
                  <th>INSTALASI SECOND STB</th>
                  <th>TGL VA</th>
                  <th>TGL PS</th>
                  <th>HASIL UKUR REDAMAN</th>
                  <th>PELAKSANA</th>
                  <th>JENIS PEKERJAAN</th>
                  <th>SUMBER ORDER</th>
                  <th>DUPLIKASI</th>
                  <th>HASIL REKON</th>
                  <th>BERITA ACARA</th>
                </tr>
              </tfoot>
              <tbody>

                <?php
                  $no = 0;
                      foreach($rekon as $p){
                        $no++;

                  ?>
                  <tr>
                    <td><?= $no;?></td>
                    <td><?= $p['mdf'];?></td>
                    <td><?= $p['sc'];?></td>
                    <td><?= $p['nomor_pots'];?></td>
                    <td><?= $p['nomor_speedy'];?></td>
                    <td><?= $p['nama'];?></td>
                    <td><?= $p['alamat'];?></td>
                    <td><?= $p['odp'];?></td>
                    <td><?= $p['ont'];?></td>
                    <td><?= $p['stb'];?></td>
                    <td><?= $p['zpop'];?></td>
                    <td><?= $p['zptop'];?></td>
                    <td><?= $p['zptep'];?></td>
                    <td><?= $p['optop'];?></td>
                    <td><?= $p['optep'];?></td>
                    <td><?= $p['toptep'];?></td>
                    <td><?= $p['jenis_kabel'];?></td>
                    <td><?= $p['panjang_kabel'];?></td>
                    <td><?= $p['kelebihan_kabel'];?></td>
                    <td><?= $p['tiang_t7'];?></td>
                    <td><?= $p['roset'];?></td>
                    <td><?= $p['patchcore'];?></td>
                    <td><?= $p['instalasi_stb_kedua'];?></td>
                    <td><?= $p['tgl_va'];?></td>
                    <td><?= $p['tgl_ps'];?></td>
                    <td><?= $p['hasil_ukur_redaman'];?></td>
                    <td><?= $p['pelaksana'];?></td>
                    <td><?= $p['jenis_pekerjaan'];?></td>
                    <td><?= $p['sumber_order'];?></td>
                    <td><?= $p['duplikasi'];?></td>
                    <td><?= $p['hasil_rekon'];?></td>
                    <?php
                      if($p['ba'] != NULL ) {
                    ?>
                        <td><a href="base_url();../../../../uploads/<?= $p['ba'];?>"><?= $p['ba'];?></a></td>                        
                    <?php 
                      } else {
                    ?>
                        <td><a href="<?php echo base_url()."index.php/rekon/upload_ba/" . $p['nomor_speedy'] ."";?>">Upload BA</a></td>
                    <?php 
                      }
                    ?>
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