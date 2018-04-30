  <?php
    foreach ($data_hr as $a) {
  ?>
   
  <style type="text/css">
    .file-upload {
      display: block;
      width: 100%;
    }

    .file-upload__label {
      display: block;
      padding: 1em 2em;
      color: #fff;
      background: #222;
      border-radius: .4em;
      transition: background .3s;
      
      &:hover {
         cursor: pointer;
         background: #000;
      }
    }
        
    .file-upload__input {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        text-align: center;
        font-size: 12;
        width:100%;
        height: 100%;
        opacity: 0;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('index.php/hrperformance/')?>"><i class="fa fa-angle-left"></i> Kembali</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <form method="post" action="<?php echo base_url()."index.php/hrperformance/upload_img/".$a['nik']."";?>" enctype="multipart/form-data">
          <div class="box box-primary">
            <div class="box-body box-profile">
            <?php
              if ($a['foto'] != NULL) {
                echo "<img class='profile-user-img img-responsive img-circle' src='".base_url('profil/'.$a['foto'])."' alt='User profile picture' height='200' width='200'>";
              } else {
                echo "<img class='profile-user-img img-responsive img-circle' src='".base_url('assets/dist/img/foto/default.png')."' alt='User profile picture' height='200' width='200'>";
              }
            ?>
            <hr>
              <div class="file-upload">
                  <label for="upload" class="btn btn-success btn-block">Choose Photo</label>
                  <input id="upload" class="btn file-upload__input btn-block" type="file" name="filePhoto" style="text-align: center;">
                  <input type="hidden" value="<?=$a['nik'];?>" name="id_user"/>
              </div>
            </div>
          </div>
                  <input type="submit" class="btn btn-primary btn-block" value="Save Photo">
                </form>
                <!-- <form method="post" enctype="multipart/form-data" action="">
                  <input type="file" class="btn btn-primary" name="fileLatar" id="fileLatar" />
                  <input type="hidden" name="id_user"/>
                  <br>
                  <input type="submit" name="gambar" class="btn btn-primary" value="Jadikan Gambar Sampul"/>
                </form> -->
            <!-- /.box-body -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
               <li class="active"><a href="#activity" data-toggle="tab">Detail</a></li>
               <li><a href="#document" data-toggle="tab">Document</a></li>
             </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                  <form class="form-horizontal" method="POST" action="<?=base_url('index.php/hrperformance/edit/')?>">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">OBJECT ID</label>

                        <div class="col-sm-10">
                          <input type="text" name="object_id" value="<?=$a['object_id'];?>" class="form-control" id="inputEmail3" placeholder="Object Id" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">NIK</label>

                        <div class="col-sm-10">
                          <input type="text" name="nik" value="<?=$a['nik'];?>" class="form-control" id="inputEmail3" placeholder="NIK" readonly="NIK">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">NAMA</label>

                        <div class="col-sm-10">
                          <input type="text" name="nama" value="<?=$a['nama'];?>" class="form-control" id="inputPassword3" placeholder="Nama">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">PSA</label>

                        <div class="col-sm-10">
                          <input type="text" name="psa" value="<?=$a['psa'];?>" class="form-control" id="inputPassword3" placeholder="PSA">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">WITEL</label>

                        <div class="col-sm-10">
                          <input type="text" name="witel" value="<?=$a['witel'];?>" class="form-control" id="inputPassword3" placeholder="Witel">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">TERITORY</label>

                        <div class="col-sm-10">
                          <input type="text" name="teritory" value="<?=$a['teritory'];?>" class="form-control" id="inputPassword3" placeholder="Teritory">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">REGIONAL</label>

                        <div class="col-sm-10">
                          <input type="text" name="regional" value="<?=$a['regional'];?>" class="form-control" id="inputPassword3" placeholder="Regional">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">LEVEL</label>

                        <div class="col-sm-10">
                          <input type="text" name="level" value="<?=$a['level'];?>" class="form-control" id="inputPassword3" placeholder="Level">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">BIZPART ID</label>

                        <div class="col-sm-10">
                          <input type="text" name="bizpart_id" value="<?=$a['bizpart_id'];?>" class="form-control" id="inputPassword3" placeholder="Bizpart Id">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">DIREKTORAT</label>

                        <div class="col-sm-10">
                          <input type="text" name="direktorat" value="<?=$a['direktorat'];?>" class="form-control" id="inputPassword3" placeholder="Direktorat">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">UNIT</label>

                        <div class="col-sm-10">
                          <input type="text" name="unit" value="<?=$a['unit'];?>" class="form-control" id="inputPassword3" placeholder="Unit">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">SUB UNIT</label>

                        <div class="col-sm-10">
                          <input type="text" name="sub_unit" value="<?=$a['sub_unit'];?>" class="form-control" id="inputPassword3" placeholder="Sub Unit">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">GROUP</label>

                        <div class="col-sm-10">
                          <input type="text" name="group" value="<?=$a['group'];?>" class="form-control" id="inputPassword3" placeholder="Group">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">SUB GROUP</label>

                        <div class="col-sm-10">
                          <input type="text" name="sub_group" value="<?=$a['sub_group'];?>" class="form-control" id="inputPassword3" placeholder="Sub Group">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">GROUP FUNGSI</label>

                        <div class="col-sm-10">
                          <input type="text" name="group_fungsi" value="<?=$a['group_fungsi'];?>" class="form-control" id="inputPassword3" placeholder="Group Fungsi">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">COST CENTER</label>

                        <div class="col-sm-10">
                          <input type="text" name="cost_center" value="<?=$a['cost_center'];?>" class="form-control" id="inputPassword3" placeholder="Cost Center">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">STATUS PGS</label>

                        <div class="col-sm-10">
                          <input type="text" name="status_pgs" value="<?=$a['status_pgs'];?>" class="form-control" id="inputPassword3" placeholder="Status PGS">
                        </div>
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <!--<button type="submit" class="btn btn-default">Cancel</button>-->
                      <input type="submit" name="submit" value="Edit" class="btn btn-info pull-right">
                    </div>
                    <!-- /.box-footer -->
                  </form>
              </div>

                <div class="tab-pane" id="document">
                    <form class="form-horizontal" method="POST" action="<?=base_url('index.php/hrperformance/dokumen/')?>" enctype="multipart/form-data">
                        <div class="box-body">
                        <input class="form-control" type="hidden" name="nik" value="<?=$a['nik'];?>">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jenis Dokumen</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="namadoc" id="namadoc" />
                                    <option value="">Pilih Jenis Dokumen</option>
                                    <option value="BASTS">BA Serah Terima Seragam</option>
                                    <option value="BPJS">BPJS</option>
                                </select>
                            </div>
                        </div>

                            <div class="form-group" hidden id="merahputih">
                                <label class="col-sm-3 control-label">Indihome Merah Putih</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="ukuran_merahputih" id="ukuran_merahputih" />
                                    <option value="">Jenis Ukuran</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input class="form-control" type="number" name="total_merahputih" placeholder="Total" >
                                </div>
                            </div>

                            <div class="form-group" hidden id="merah">
                                <label class="col-sm-3 control-label">MyIndihome Merah</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="ukuran_merah" id="ukuran_merah"/>
                                    <option value="">Jenis Ukuran</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input class="form-control" type="number" name="total_merah" placeholder="Total">
                                </div>
                            </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Dokumen</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" name="doc">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">&nbsp;</label>
                            <div class="col-sm-9">
                                <p class="help-block">Format: jpg || pdf || doc || docx</p>
                            </div>
                        </div>
                        </div>

                        <div class="box-footer">
                            <input type="submit" name="submit" value="Submit" class="btn btn-info pull-right">
                        </div>
                    </form>
                </div>
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