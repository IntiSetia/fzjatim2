  <?php
    foreach ($dataallpekerjaan as $a) {
  ?>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Pekerjaan</h1>
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
              <h3 class="box-title">Data Pekerjaan</h3>
            </div>
            <form action="<?php echo base_url()."index.php/revenue/insert_ass";?>" method="post" enctype="multipart/form-data">
            <div class="form-horizontal">
            <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Project</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?=$a['idp'];?>" placeholder="ID Project" name="idp" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Pekerjaan</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?=$a['pekerjaan'];?>" placeholder="Nama Pekerjaan" name="nam_pek" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Pekerjaan</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?=$a['jenis_pekerjaan'];?>" placeholder="Jenis Pekerjaan" name="jen-pek" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Mitra</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?=$a['mitra'];?>" placeholder="Nama Mitra" name="nam_mit" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">BOQ Realisasi</label>
                  <div class="col-sm-10">
                    <?php
                    if ($a['boq_realisasi'] == NULL) {
                      echo "<input type='file' name='boq_realisasi'>";
                    } else {
                      $a['boq_realisasi'];
                    }
                    ?>
                    <!-- <input class="form-control" type="text" value="" placeholder="BOQ Realisasi" name="boq_real" required/> -->
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor PR</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?=$a['nomor_pr'];?>" placeholder="" name="odp" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">BA Realisasi</label>
                  <div class="col-sm-10">
                    <?php
                    if ($a['ba_realisasi'] == NULL) {
                      echo "<input type='file' name='ba_realisasi'>";
                    } else {
                      $a['ba_realisasi'];
                    }
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">BAUT</label>
                  <div class="col-sm-10">
                    <?php
                    if ($a['baut'] == NULL) {
                      echo "<input type='file' name='baut'>";
                    } else {
                      $a['baut'];
                    }
                    ?>
                  </div>
                </div>
              </div>
              </div>
          </div>
        </div>
        </form>
        <!--/.col (right) -->
      </div>

      <div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
}
?>