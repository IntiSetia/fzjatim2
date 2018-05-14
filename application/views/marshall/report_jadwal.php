<style>
    input[type="text"]
    {
        background: transparent;
        border: none;
        margin-right: 100px;
        width:40%;
    }
    .modal-body label{
        width:40%;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Report Marshall <?php if(!empty($header)){echo $header;} ?>
            <!--<small>advanced tables</small>-->
        </h1>
        <!--<ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Tables</a></li>
          <li class="active">Data tables</li>
        </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--<div class="box-body">
              <div class="form-group">
                  <form method="POST" action="" >
                      <div class="col-sm-2">
                          <div class="form-group">
                              <select   style="width: 100%;" name="area">
                                  <option value='all'>All Area</option>
                                  <option value='JEMBER'>JEMBER</option>
                                  <option value='KEDIRI'>KEDIRI</option>
                                  <option value='MADIUN'>MADIUN</option>
                                  <option value='MALANG'>MALANG</option>
                                  <option value='PASURUAN'>PASURUAN</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <div class="form-group">
                              <select   style="width: 100%;" name="klasifikasi">
                                  <?php
            /*                                  if ($bulan != null) {
                                                  echo "<option selected='selected' value='".$bulan["id"]."'>".$bulan["nama"]."</option>";
                                                  echo "<option value='ytd'>Year to Date</option>";
                                                  $monthName  = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                                  for ($i=1; $i < count($monthName); $i++) {
                                                      echo "<option value=".$i.">" . $monthName[$i] . "</option>";
                                                  }
                                              } else {
                                                  echo "<option selected='selected' value='ytd'>Year to Date</option>";
                                                  $monthName  = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                                  for ($i=1; $i < count($monthName); $i++) {
                                                      echo "<option value=".$i.">" . $monthName[$i] . "</option>";
                                                  }
                                              }
                                              */?>
                              </select>
                          </div>
                      </div>
                      <div class="col-sm-2">
                          <input type="submit" name="submit" class="btn btn-primary" value="Submit" >
                      </div>
                  </form>
              </div>
          </div>-->

                <div class="col-sm-4" style="margin-bottom: 10px">
                    <form method="post" action="<?php echo base_url(); ?>index.php/marshall/report_jadwal_marshall">
                    <select class="js-example-placeholder-single js-states form-control" name="bulan" id="bulan" style="height:20px">
                        <option value="">--Pilih Bulan--</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <input class="btn btn-block bg-blue waves-effect" type="submit" name="submit">
                </div>
                    </form>
            <div class="col-xs-12">

                <div class="box">
                    <!--<div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="listplan" class="table table-bordered table-hover display wrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th style="text-align: center;">WITEL</th>
                                <th style="text-align: center;">JADWAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $nom = 0;
                            ?>

                            <tr>
                                <td>1</td>
                                <td>Malang</td>
                                <td>
                                    <a href="<?php if(!empty($jadwal_marshall_malang->jadwal)){echo base_url().'marshall/'.$jadwal_marshall_malang->jadwal;}?>">
                                        <?php if(!empty($jadwal_marshall_malang->jadwal)){echo $jadwal_marshall_malang->jadwal;}?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Pasuruan</td>
                                <td>
                                    <a href="<?php if(!empty($jadwal_marshall_pasuruan->jadwal)){echo base_url().'marshall/'.$jadwal_marshall_pasuruan->jadwal;}?>">
                                        <?php if(!empty($jadwal_marshall_pasuruan->jadwal)){echo $jadwal_marshall_pasuruan->jadwal;} ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Madiun</td>
                                <td>
                                    <a href="<?php if(!empty($jadwal_marshall_madiun->jadwal)){echo base_url().'marshall/'.$jadwal_marshall_madiun->jadwal;}?>">
                                        <?php if(!empty($jadwal_marshall_madiun->jadwal)){echo $jadwal_marshall_madiun->jadwal;} ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Jember</td>
                                <td>
                                    <a href="<?php if(!empty($jadwal_marshall_jember->jadwal)){echo base_url().'marshall/'.$jadwal_marshall_jember->jadwal;}?>">
                                        <?php if(!empty($jadwal_marshall_jember->jadwal)){echo $jadwal_marshall_jember->jadwal;} ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Kediri</td>
                                <td>
                                    <a href="<?php if(!empty($jadwal_marshall_kediri->jadwal)){echo base_url().'marshall/'.$jadwal_marshall_kediri->jadwal;}?>">
                                        <?php if(!empty($jadwal_marshall_kediri->jadwal)){echo $jadwal_marshall_kediri->jadwal;} ?>
                                    </a>
                                </td>
                            </tr>

                            <?php
                            ?>
                            </tbody>
                        </table>
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

