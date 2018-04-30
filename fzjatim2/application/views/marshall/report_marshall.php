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