 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Detail Data</h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pelanggan</h3>
            </div>
            <?php
                  $no = 0;
                      foreach($psb as $p){
                        $no++;

            ?>
            <form action="<?php echo base_url()."index.php/revenue/insert_ass";?>" method="post" enctype="multipart/form-data">
            <div class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Witel</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="wilayah" readonly/>
                    <option value="<?= $p['wilayah'];?>"><?= $p['wilayah'];?></option>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">MDF</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $p['mdf'];?>" name="mdf" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">No. Pots</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $p['nomor_pots'];?>" name="nomor_pots" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">No. Inet</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $p['nomor_speedy'];?>" name="nomor_speedy" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $p['nama'];?>" name="nama" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $p['alamat'];?>" name="alamat" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">ODP</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $p['odp'];?>" name="odp" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">ONT</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $p['ont'];?>" name="ont" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">STB</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?= $p['stb'];?>" name="stb" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Layanan</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="layanan" readonly/>
                      <option value="<?= $p['layanan'];?>"><?= $p['layanan'];?></option>
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
                    <input class="form-control" type="text" value="<?= $p['jenis_kabel'];?>" name="jenis_kabel" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">P. Kabel</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" value="<?= $p['panjang_kabel'];?>" name="panjang_kabel" readonly/>
                  </div> meter
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tiang</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" value="<?= $p['tiang'];?>" name="tiang" readonly/>
                    </div> batang
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">PC</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" value="<?= $p['patch_cord'];?>" name="patch_cord" readonly/>
                  </div> buah
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">K. UTP</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" value="<?= $p['kabel_utp'];?>" name="kabel_utp" readonly/>
                  </div> meter
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">K. PVC</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" value="<?= $p['kabel_pvc'];?>" name="kabel_pvc" readonly/>
                  </div> meter
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">STB +</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" value="<?= $p['stb_kedua'];?>" name="stb_kedua" readonly/>
                  </div> buah
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tgl VA</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="date" name="tgl_va" value="<?= $p['tgl_va'];?>" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tgl PS</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="date" name="tgl_ps" value="<?= $p['tgl_ps'];?>" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Redaman</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="number" value="<?= $p['hasil_cek_redaman'];?>" name="hasil_cek_redaman" readonly/>
                  </div> buah
                </div>

              </div>
              </div>
          </div>
        </div>

        <div class="col-sm-12">
        <div class="box box-primary">
              <div class="box-body">
                <?php               
                    if($p['biaya'] != NULL ){?>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Total biaya
                          Rp. <?= $p['biaya'];?></label>
                        </div>    
                        <?php } else{?>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                    <a href="<?php echo base_url()."index.php/Revenue/update_bia/" . $p['id_rev'] ."";?>">Update Biaya</a></label>
                          </div>

                        </div>
              <div class="box-body">
                        <?php }

                        if($p['ba_rev'] != NULL ){?>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Berita acara
                            <a href="base_url();../../../../uploads/<?= $p['ba_rev'];?>"><?= $p['ba_rev'];?></a> 
                          </label>
                        </div>    
                        <?php } else{?>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">
                          <a href="<?php echo base_url()."index.php/Revenue/upload_ba/" . $p['id_rev'] ."";?>">Edit Data</a>
                        </label>
                        </div>
                        <?php }
                ?>
              </div>
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