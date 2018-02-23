  <?php
    foreach ($data_hr as $a) {
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('index.php/HrPerformance/')?>"><i class="fa fa-angle-left"></i> Kembali</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

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

            <a href="<?=base_url('index.php/HrPerformance/view_edit/'.$a['nik'])?>" class="btn btn-primary btn-block" ><b>Edit Data Profile</b></a>

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Detail</a></li>
              <li><a href="#timeline" data-toggle="tab">Document</a></li>
              <!-- <li><a href="#settings" data-toggle="tab">Settings</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                  <form class="form-horizontal" method="POST" action="<?=base_url('index.php/HrPerformance/edit/')?>">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">OBJECT ID</label>

                        <div class="col-sm-10">
                          <input type="text" name="object_id" value="<?=$a['object_id'];?>" class="form-control" id="inputEmail3" placeholder="Object Id" readonly style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">NIK</label>

                        <div class="col-sm-10">
                          <input type="text" name="nik" value="<?=$a['nik'];?>" class="form-control" id="inputEmail3" placeholder="NIK" readonly="NIK" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">NAMA</label>

                        <div class="col-sm-10">
                          <input type="text" name="nama" value="<?=$a['nama'];?>" class="form-control" id="inputPassword3" placeholder="Nama" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">PSA</label>

                        <div class="col-sm-10">
                          <input type="text" name="psa" value="<?=$a['psa'];?>" class="form-control" id="inputPassword3" placeholder="PSA" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">WITEL</label>

                        <div class="col-sm-10">
                          <input type="text" name="witel" value="<?=$a['witel'];?>" class="form-control" id="inputPassword3" placeholder="Witel" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">TERITORY</label>

                        <div class="col-sm-10">
                          <input type="text" name="teritory" value="<?=$a['teritory'];?>" class="form-control" id="inputPassword3" placeholder="Teritory" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">REGIONAL</label>

                        <div class="col-sm-10">
                          <input type="text" name="regional" value="<?=$a['regional'];?>" class="form-control" id="inputPassword3" placeholder="Regional" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">LEVEL</label>

                        <div class="col-sm-10">
                          <input type="text" name="level" value="<?=$a['level'];?>" class="form-control" id="inputPassword3" placeholder="Level" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">BIZPART ID</label>

                        <div class="col-sm-10">
                          <input type="text" name="bizpart_id" value="<?=$a['bizpart_id'];?>" class="form-control" id="inputPassword3" placeholder="Bizpart Id" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">DIREKTORAT</label>

                        <div class="col-sm-10">
                          <input type="text" name="direktorat" value="<?=$a['direktorat'];?>" class="form-control" id="inputPassword3" placeholder="Direktorat" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">UNIT</label>

                        <div class="col-sm-10">
                          <input type="text" name="unit" value="<?=$a['unit'];?>" class="form-control" id="inputPassword3" placeholder="Unit" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">SUB UNIT</label>

                        <div class="col-sm-10">
                          <input type="text" name="sub_unit" value="<?=$a['sub_unit'];?>" class="form-control" id="inputPassword3" placeholder="Sub Unit" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">GROUP</label>

                        <div class="col-sm-10">
                          <input type="text" name="group" value="<?=$a['group'];?>" class="form-control" id="inputPassword3" placeholder="Group" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">SUB GROUP</label>

                        <div class="col-sm-10">
                          <input type="text" name="sub_group" value="<?=$a['sub_group'];?>" class="form-control" id="inputPassword3" placeholder="Sub Group" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">GROUP FUNGSI</label>

                        <div class="col-sm-10">
                          <input type="text" name="group_fungsi" value="<?=$a['group_fungsi'];?>" class="form-control" id="inputPassword3" placeholder="Group Fungsi" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">COST CENTER</label>

                        <div class="col-sm-10">
                          <input type="text" name="cost_center" value="<?=$a['cost_center'];?>" class="form-control" id="inputPassword3" placeholder="Cost Center" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">STATUS PGS</label>

                        <div class="col-sm-10">
                          <input type="text" name="status_pgs" value="<?=$a['status_pgs'];?>" class="form-control" id="inputPassword3" placeholder="Status PGS" style="border: none; border-color: transparent;">
                        </div>
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>
                    <!-- /.box-footer -->
                  </form>
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!--body-->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

  <?php  
    }
  ?> 