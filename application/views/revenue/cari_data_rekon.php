 <?php
  error_reporting(0);
 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search for BA
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
              <h3 class="box-title">Search Form</h3>
            </div>
            <div class="form-horizontal">
            <form method="post" action="<?php echo base_url()."index.php/searchrev/hasil_ba";?>">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pilih Kategori</label>
                  <div class="col-sm-10">
                    <select name="kategori" class="form-control" name="wilayah" required/>
                    <option value="nomor_inet" >Nomor Internet</option>
                    <option value="nomor_telp">Nomor Telepon</option>
                    <option value="nomor_ont">Serial Number ONT</option>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Data Pencarian</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan beberapa data untuk pencarian" name="data_cari" required/>
                  </div>
                </div>

              <div class="box-footer" align="center">
                <button type="submit" class="btn btn-primary">Submit</button>
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
                <tr>
                  <th>Bukti BA</th>
                  <th>ID REV</th>
                  <th>MDF</th>
                  <th>Nomor Pots</th>
                  <th>Nomor Speedy</th>
                  <th>Nama Pelanggan</th>
                  <th>Alamat</th>
                  <th>ODP</th>
                  <th>ONT</th>
                  <th>STB</th>
                  <th>Layanan</th>
                  <th>Jenis Kabel</th>
                  <th>Panjang Kabel</th>
                  <th>Kelebihan Kabel</th>
                  <th>Tiang</th>
                  <th>Patch Cord</th>
                  <th>Patch Cord Tambahan</th>
                  <th>Kabel UTP</th>
                  <th>Kabel UTP Tambahan</th>
                  <th>Kabel PVC</th>
                  <th>STB Tambahan</th>
                  <th>Tanggal VA</th>
                  <th>Tanggal PS</th>
                  <th>Hasil Cek Redaman</th>
                  <th>Biaya</th>
                </tr>
              </thead>
              <tbody>

                <?php
                  $no = 0;
                      foreach($cari as $p){
                        $no++;

                  ?>
                  <tr>
                    <?php
                      if($p['ba_rev'] != NULL ){?>
                        <td><a href="base_url();../../../../uploads/<?= $p['ba_rev'];?>"><?= $p['ba_rev'];?></a></td>                        
                        <?php } else{?>

                    <td><a href="<?php echo base_url()."index.php/Revenue/upload_ba/" . $p['id_rev'] ."";?>">Upload BA</a></td>
                        <?php }
                    ?>
                    <td><?= $p['id_rev'];?></td>
                    <td><?= $p['mdf'];?></td>
                    <td><?= $p['nomor_pots'];?></td>
                    <td><?= $p['nomor_speedy'];?></td>
                    <td><?= $p['nama'];?></td>
                    <td><?= $p['alamat'];?></td>
                    <td><?= $p['odp'];?></td>
                    <td><?= $p['ont'];?></td>
                    <td><?= $p['stb'];?></td>
                    <td><?= $p['layanan'];?></td>
                    <td><?= $p['jenis_kabel'];?></td>
                    <td><?= $p['panjang_kabel'];?></td>
                    <td><?= $p['kelebihan_kabel'];?></td>
                    <td><?= $p['tiang'];?></td>
                    <td><?= $p['patch_cord'];?></td>
                    <td><?= $p['patch_cord_add'];?></td>
                    <td><?= $p['kabel_utp'];?></td>
                    <td><?= $p['kabel_utp_add'];?></td>
                    <td><?= $p['kabel_pvc'];?></td>
                    <td><?= $p['stb_kedua'];?></td>
                    <td><?= $p['tgl_va'];?></td>
                    <td><?= $p['tgl_ps'];?></td>
                    <td><?= $p['hasil_cek_redaman'];?></td>
                    <td><?= $p['biaya'];?></td>
                  </tr>
                  <?php
                  }
                ?>

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