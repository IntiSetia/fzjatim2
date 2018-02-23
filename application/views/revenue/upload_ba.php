 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Form Upload Berita Acara</h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pelanggan</h3>
            </div>
          <?php
            foreach ($psb as $p) {
          ?>
            <form action="<?php echo base_url()."index.php/revenue/update_psb/".$p['id_rev']."";?>" method="post" enctype="multipart/form-data">
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
                    <input class="form-control" type="text" value="<?= $p['nama'];?>"name="nama" readonly/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Upload Berita Acara</label>
                  <div class="col-sm-10">
                    <input type="file" name="ba_psb" required/>
                    <p class="help-block">Upload berita acara dengan format nama tanpa spasi dan berekstensi jpg atau pdf.</p>
                  </div>
                </div>

              <div class="box-footer" align="center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

              </div>
              </div>
          </div>
        </div>

              </div>
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