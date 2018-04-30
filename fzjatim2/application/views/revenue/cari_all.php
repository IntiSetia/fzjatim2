 <?php
  error_reporting(0);
 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search Data Recon
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
            <form method="post" action="<?php echo base_url()."index.php/revrekon/cari_all_rekon";?>">
            <?php
              $namaBulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",  "September", "Oktober",  "November", "Desember");
              $hariIni = time(); // menyimpan tanggal hari ini
              $f_hari = date("M-d-Y", $hariIni); // format tanggal hari ini
              $tahun = date("Y", $hariIni); // ambil tahun dari hari ini 
            ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pilih Kategori Divisi</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="kategori" required/>
                    <option value="semua" >Semua Divisi</option>
                    <option value="psb">Provisioning Indihome</option>
                    <option value="ggn">Assurance</option>
                    <option value="migrasi">Migration</option>
                    <option value="mainis">Maintenance Infra Support</option>
                    <option value="main_access">Maintenance Access</option>
                    <option value="gamas">Gamas & QE</option>
                    <option value="pt3">Prog Optimization PT3</option>
                    <option value="nodeb">NODE B</option>
                    <option value="hem">HEM</option> 
                    <option value="pt2">Prog Optimization PT2</option>
                    </select>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Pilih Kategori Area</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="area" required/>
                    <option value="semua">Semua Area</option>
                    <option value="malang">Malang</option>
                    <option value="madiun">Madiun</option>
                    <option value="pasuruan">Pasuruan</option>
                    <option value="kediri">Kediri</option>
                    <option value="jember">Jember</option>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Awal</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="tanggal1" required/>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                  <?php for ($n=10; $n<=31 ; $n++) { ?>
                    <option value="<?php echo $n; ?>" > <?php echo $n; ?> </option>
                  <?php } ?>
                  </select>
                  </div>

                  <div class="col-sm-3">
                  <select class="form-control" name="bulan1" required/>
                    <option value="01"> <?php echo $namaBulan[1]; ?> </option>
                    <option value="02"> <?php echo $namaBulan[2]; ?> </option>
                    <option value="03"> <?php echo $namaBulan[3]; ?> </option>
                    <option value="04"> <?php echo $namaBulan[4]; ?> </option>
                    <option value="05"> <?php echo $namaBulan[5]; ?> </option>
                    <option value="06"> <?php echo $namaBulan[6]; ?> </option>
                    <option value="07"> <?php echo $namaBulan[7]; ?> </option>
                    <option value="08"> <?php echo $namaBulan[8]; ?> </option>
                    <option value="09"> <?php echo $namaBulan[9]; ?> </option>
                    <?php for ($n=10; $n<=12 ; $n++) { ?> 
                    <option value="<?php echo $n; ?>" > <?php echo $namaBulan[$n]; ?> </option> 
                  <?php } ?> 
                  </select>
                  </div>

                  <div class="col-sm-3">
                  <select class="form-control" name="tahun1" required/>
                  <?php for ($n=$tahun-4; $n<=$tahun+5 ; $n++) { ?>
                  <option value="<?php echo $n; ?>" > <?php echo $n; ?> </option>
                  <?php } ?>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Akhir</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="tanggal2" required/>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                  <?php for ($n=10; $n<=31 ; $n++) { ?>
                    <option value="<?php echo $n; ?>" > <?php echo $n; ?> </option>
                  <?php } ?>
                  </select>
                  </div>

                  <div class="col-sm-3">
                  <select class="form-control" name="bulan2" required/>
                    <option value="01"> <?php echo $namaBulan[1]; ?> </option>
                    <option value="02"> <?php echo $namaBulan[2]; ?> </option>
                    <option value="03"> <?php echo $namaBulan[3]; ?> </option>
                    <option value="04"> <?php echo $namaBulan[4]; ?> </option>
                    <option value="05"> <?php echo $namaBulan[5]; ?> </option>
                    <option value="06"> <?php echo $namaBulan[6]; ?> </option>
                    <option value="07"> <?php echo $namaBulan[7]; ?> </option>
                    <option value="08"> <?php echo $namaBulan[8]; ?> </option>
                    <option value="09"> <?php echo $namaBulan[9]; ?> </option>
                    <?php for ($n=10; $n<=12 ; $n++) { ?> 
                    <option value="<?php echo $n; ?>" > <?php echo $namaBulan[$n]; ?> </option> 
                  <?php } ?> 
                  </select>
                  </div>

                  <div class="col-sm-3">
                  <select class="form-control" name="tahun2" required/>
                  <?php for ($n=$tahun-4; $n<=$tahun+5 ; $n++) { ?>
                  <option value="<?php echo $n; ?>" > <?php echo $n; ?> </option>
                  <?php } ?>
                  </select>
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
                  <th>ID REV</th>
                  <th>MDF</th>
                  <th>Nomor Pots</th>
                  <th>Nomor Speedy</th>
                  <th>Nama Pelanggan</th>
                  <th>Alamat</th>
                  <th>Witel</th>
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
                  <th>Bukti BA</th>
                </tr>
              </thead>
              <tbody>

                <?php
                  $no = 0;
                      foreach($psb as $p){
                        $no++;

                  ?>
                  <tr>
                    <td><?= $p['id_rev'];?></td>
                    <td><?= $p['mdf'];?></td>
                    <td><?= $p['nomor_pots'];?></td>
                    <td><?= $p['nomor_speedy'];?></td>
                    <td><?= $p['nama'];?></td>
                    <td><?= $p['alamat'];?></td>
                    <td><?= $p['wilayah'];?></td>
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
                    <td><a href="base_url();../../../../uploads/<?= $p['ba_rev'];?>"><?= $p['ba_rev'];?></a></td>                    
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