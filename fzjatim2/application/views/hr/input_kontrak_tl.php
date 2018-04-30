 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Masukkan NIK Team Leader</h1>
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
            <form action="<?php echo base_url()."index.php/HrPerformance/input_kontrak_tl";?>" method="post">
            <div class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">NIK</label>
                  <div class="col-sm-7">
                      <input class="form-control" type="text" placeholder="Masukkan NIK" name="nik" value="<?=$nik;?>" required/>
                  </div>
                  <div class="col-sm-3">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit" >
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
          <!--/.col (right) -->
        </div>
      </div>

        <?php
            foreach ($data_tl as $a) {
              $object_id  = $a['object_id'];
              if ($object_id != NULL) {
        ?>
              <div class="row">
                <div class="col-md-3">

                  <!-- Profile Image -->
                  <div class="box box-primary">
                    <div class="box-body box-profile">
                    <?php
                      if ($a['foto'] != NULL) {
                        echo "<img class='profile-user-img img-responsive img-circle' src='".base_url('profil/'.$a['foto'])."' alt='User profile picture' height='200' width='200'>";
                      } else {
                        echo "<img class='profile-user-img img-responsive img-circle' src='".base_url('assets/dist/img/foto/default.png')."' alt='User profile picture' height='200' width='200'>";
                      }
                    ?>
                      <!--<a href="#" class="btn btn-primary btn-block" ><b>Edit Photo</b></a>-->
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>

                <div class="col-md-9">
                  <div class="nav-tabs-custom">
                    <div class="tab-content">
                      <div class="active tab-pane" id="activity">
                        <div class="box-body">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">NIK</label>
                            <div class="col-sm-10">
                              <input type="text" name="nik" value="<?=$a['nik'];?>" class="form-control" id="inputEmail3" placeholder="NIK" readonly style="border: none; border-color: transparent;">
                            </div>
                          </div>
                          <hr>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">NAMA</label>
                            <div class="col-sm-10">
                              <input type="text" name="nama" value="<?=$a['nama'];?>" class="form-control" id="inputPassword3" placeholder="Nama" readonly style="border: none; border-color: transparent;">
                            </div>
                          </div>
                          <hr>
                          <hr>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">POSITION NAME</label>
                            <div class="col-sm-10">
                              <input type="text" name="nama" value="<?=$a['position_name'];?>" class="form-control" id="inputPassword3" placeholder="Nama" readonly style="border: none; border-color: transparent;">
                            </div>
                          </div>
                          </div> 

                          <div class="box-footer">
                            <!--<button type="submit" class="btn btn-default">Cancel</button>-->
                            <a href="<?=base_url('index.php/HrPerformance/kontrak_management_tl/'.$a['nik'])?>" class="btn btn-primary btn-block" ><b>Lihat Kontrak Management</b></a>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  
                  </div>
                </div>
              </div>
        <?php
              }
            }  
        ?>
        
        <!-- /.row -->
      </section>
      <!-- /.content -->
</div>
    <!-- /.content-wrapper -->