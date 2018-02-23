 <?php
  error_reporting(0);
 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search for Data BA
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

        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pencarian Data PS Untuk Rekon</h3>
            </div>
            <div class="form-horizontal">
            <form method="post" action="<?php echo base_url()."index.php/prov/hasil_rekon";?>">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Internet</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" type="textarea" placeholder="Ketikkan beberapa nomor internet untuk pencarian" name="no_inet" required></textarea>
                  </div>
                </div>

              <div class="box-footer" align="center">
                <button type="submit" class="btn btn-primary">Rekon</button>
              </div>
          </form>

        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title"> Result Table</h3>
            </div> -->
            <div class="box-body">
            <div style="overflow-x:auto;">
              <table id="example" class="display" width="100%" cellspacing="0" class="table table-bordered table-hover" >
                <thead>
                <!-- <tr><td colspan="5">
                  Jumlah semua data PS <?php echo $all; ?>
                </td></tr> -->
                <tr>
                  <th>No</th>
                  <th>ID ALPRO</th>
                  <th>ND</th>
                  <th>ND INET</th>
                  <th>CITEM</th>
                  <th>KECEPATAN</th>
                  <th>STO</th>
                  <th>SO</th>
                  <th>STATUS INDIHOME</th>
                  <th>TGL REG</th>
                  <th>TGL STATUS</th>
                  <th>UMUR BY TGL REG</th>
                  <th>NAMA</th>
                  <th>KCONTACT</th>
                  <th>JALAN</th>
                  <th>DISTRIK</th>
                  <th>KOTA</th>
                  <th>TIPE</th>
                  <th>SUMBER</th>
                  <th>PERIODE REKON</th>
                  <th>JENIS</th>
                  <th>STATUS REKON</th>
                  <th>PETUGAS</th>
                  <th>BERITA ACARA</th>
                </tr>
              </thead>
              <tbody>

                <?php
                  $no = 0;
                      foreach($psb as $p){
                      $no++;                        
                      $array[] = $b['nd_inet'];
                  ?>
                  <tr>
                    <td><?= $no;?></td>
                    <td><?= $p['id_alpro'];?></td>
                    <td><?= $p['nd'];?></td>
                    <td><?= $p['nd_inet'];?></td>
                    <td><?= $p['citem'];?></td>
                    <td><?= $p['kecepatan'];?></td>
                    <td><?= $p['sto'];?></td>
                    <td><?= $p['so'];?></td>
                    <td><?= $p['status_indihome'];?></td>
                    <td><?= $p['tgl_reg'];?></td>
                    <td><?= $p['tgl_status'];?></td>
                    <td><?= $p['umur_by_tgl_reg'];?></td>
                    <td><?= $p['nama'];?></td>
                    <td><?= $p['kcontact'];?></td>
                    <td><?= $p['jalan'];?></td>
                    <td><?= $p['distrik'];?></td>
                    <td><?= $p['kota'];?></td>
                    <td><?= $p['tipe'];?></td>
                    <td><?= $p['sumber'];?></td>
                    <td><?= $p['periode_rekon'];?></td>
                    <td><?= $p['jenis'];?></td>
                    <td><?= $p['status_rekon'];?></td>
                    <td><?= $p['petugas'];?></td>
                    <td><?= $p['ba_prov'];?></td>
                  </tr>
                  <?php
                  }
                ?>
              </tbody>
            </table>
            </div>
            <br>

            <!-- <h3>Presentase Kelengkapan BA Instalasi <?= ROUND($hasil, 2);?>%</h3> -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>