<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Marshall
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
                              <select class="form-control" style="width: 100%;" name="area">
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
                              <select class="form-control" style="width: 100%;" name="klasifikasi">
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


        <div class="col-xs-12">
          <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listplan" class="table table-bordered table-hover display nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Marshall</th>
                  <th>Jenis Finding</th>
                  <th>Lokasi</th>
                  <th>Gambar</th>
                  <th>Penemuan</th>
                  <th>Tindakan Perbaikan</th>
                  <th>PIC</th>
                  <th>Unit</th>
                  <th>Target</th>
                  <th>Status</th>
                  <th>Catatan</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $nom = 0;
                        foreach($marshall as $a){
                          $nom++;
                          $no   = $a['no'];
                    ?>
                    <tr>
                      <td><?= $nom;?></td>
                      <td style="text-align: center;">
                          <?php
                              if ($a['inputer'] != NULL) {
                                  echo $a['inputer'];
                              } else {
                                  echo "-";
                              }
                          ?>
                      </td>
                      <td style="text-align: center;">
                          <?php
                          if ($a['jenis_finding'] != NULL) {
                              $jfind    = $a['jenis_finding'];
                              if ($jfind == "Positive Fact Finding") {
                                  echo $a['jenis_finding'] . "<br><br><span class='fa btn btn-success fa-plus'></span>";
                              } else {
                                  echo $a['jenis_finding'] . "<br><br><span class='fa btn btn-danger fa-minus'></span>";
                              }
                          } else {
                              echo "-";
                          }
                          ?>
                      </td>
                      <td style="text-align: center;">
                            <?php
                            if ($a['lokasi'] != NULL) {
                                echo $a['lokasi'];
                            } else {
                                echo "-";
                            }
                            ?>
                      </td>
                      <td><?php
                          if ($a['gambar'] != NULL) {
                            echo "<img src='".base_url('marshall/'.$a['gambar'])."' alt='User profile picture' height='100' width='100'>";
                          } else {
                            echo "Tidak ada gambar";
                          }
                      ?></td>
                      <td>
                          <?php
                              $penemuan   = $a['penemuan'];
                              $showpen    = explode(",", $penemuan);

                              $total_temuan = 0;
                              foreach($showpen as $key) {
                                  $total_temuan++;
                              }

                              for ($i = 0; $i < $total_temuan ; $i++) {
                                  echo "- " . $showpen[$i] . "<br>";
                              }
                          ?>
                      </td>
                        <td style="text-align: center;">
                            <?php
                            if ($a['tindakan_perbaikan'] != NULL) {
                                echo $a['tindakan_perbaikan'];
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td style="text-align: center;">
                            <?php
                            if ($a['pic'] != NULL) {
                                echo $a['pic'];
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td style="text-align: center;">
                            <?php
                            if ($a['unit'] != NULL) {
                                echo $a['unit'];
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td style="text-align: center;">
                            <?php
                            if ($a['target'] != NULL) {
                                echo $a['target'];
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td style="text-align: center;">
                            <?php
                            if ($a['status'] != NULL) {
                                echo $a['status'];
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td style="text-align: center;">
                            <?php
                            if ($a['catatan'] != NULL) {
                                echo $a['catatan'];
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    }
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