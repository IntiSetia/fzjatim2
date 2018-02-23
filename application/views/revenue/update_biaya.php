 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Form Migration</h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>
<?php
    $no = 0;
      foreach($rev as $r){
    $no++;
?>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pelanggan</h3>
            </div>
            <form action="<?php echo base_url()."index.php/revenue/ubah_biaya/".$r['id_rev']."";?>" method="post" enctype="multipart/form-data">
            <div class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Witel</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="wilayah" required/>
                    <option value="<?= $r['wilayah'];?>"><?= $r['wilayah'];?></option>
                    <option value="madiun">Madiun</option>
                    <option value="pasuruan">Pasuruan</option>
                    <option value="malang">Malang</option>
                    <option value="jember">Jember</option>
                    <option value="kediri">Kediri</option>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">MDF</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $r['mdf'];?>" name="mdf" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">No. Pots</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $r['nomor_pots'];?>" name="nomor_pots" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">No. Inet</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $r['nomor_speedy'];?>" name="nomor_speedy" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $r['nama'];?>" name="nama" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $r['alamat'];?>" name="alamat" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">ODP</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $r['odp'];?>" name="odp" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">ONT</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $r['ont'];?>" placeholder="Ketikkan nama ONT" name="ont" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">STB</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $r['stb'];?>" placeholder="Ketikkan nama STB" name="stb" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Layanan</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="layanan" required/>
                      <option value="<?= $r['layanan'];?>"><?= $r['layanan'];?></option>
                      <option value="1">OP-1P</option>
                      <option value="2">OP-2P</option>
                      <option value="3">OP-3P</option>
                  </select>
                  </div>
                </div>
              </div>
              </div>
          </div>
        </div>

        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Material</h3>
            </div>
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">J. Kabel</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $r['jenis_kabel'];?>" placeholder="Ketikkan jenis kabel" name="jenis_kabel" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">P. Kabel</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" value="<?= $r['panjang_kabel'];?>" placeholder="Ketikkan panjang kabel" name="panjang_kabel" required/>
                  </div> meter
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tiang</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" value="<?= $r['tiang'];?>" placeholder="Ketikkan jenis kabel" name="tiang" required/>
                    </div> batang
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">PC</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" value="<?= $r['patch_cord'];?>" placeholder="Ketikkan jumlah patch cord" name="patch_cord" required/>
                  </div> buah
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">K. UTP</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" value="<?= $r['kabel_utp'];?>" placeholder="Ketikkan panjang kabel utp" name="kabel_utp" required/>
                  </div> meter
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">K. PVC</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" value="<?= $r['kabel_pvc'];?>" placeholder="Ketikkan panjang kabel pvc" name="kabel_pvc" required/>
                  </div> meter
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">STB +</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" value="<?= $r['stb_kedua'];?>" placeholder="Ketikkan jumlah stb tambahan" name="stb_kedua" required/>
                  </div> buah
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tgl VA</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="date" value="<?= $r['tgl_va'];?>" name="tgl_va" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tgl PS</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="date" value="<?= $r['tgl_ps'];?>" name="tgl_ps" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Redaman</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" value="<?= $r['hasil_cek_redaman'];?>" placeholder="Ketikkan jumlah stb tambahan" name="hasil_cek_redaman" required/>
                  </div> buah
                </div>

              </div>
              </div>
          </div>
        </div>

        <div class="col-sm-12">
        <div class="box box-primary">
              <div class="box-body">                
                  <label>Berita Acara</label><br>
                <?php
                      if($r['ba_rev'] != NULL ){?>
                        <td>
                        <a href="base_url();../../../../../uploads/<?= $r['ba_rev'];?>"><?= $r['ba_rev'];?>
                        </a></td>                        
                        <?php } else{?>

                    <td>
                    <a href="<?php echo base_url()."index.php/Revenue/upload_ba/" . $r['id_rev'] ."";?>">Upload BA</a>
                    </td>
                <?php 
                  }
                ?>

              <!-- <div class="form-group">
                  <label>Upload Berita Acara</label>
                  <input type="file" name="ba_psb">
                  <p class="help-block">Upload berita acara dengan format jpg atau pdf.</p>
              </div> -->
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
        </div>
        </form>
        <?php
          }
        ?>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->