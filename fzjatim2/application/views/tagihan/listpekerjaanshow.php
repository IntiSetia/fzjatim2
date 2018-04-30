<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List Pekerjaan Maintenance
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
                  <form method="POST" action="echo base_url('index.php/tagihan/cek_listpekerjaan')" >
                    <div class="col-sm-3">
                      <div class="form-group">
                        <select class="form-control select2" style="width: 100%;" name="mitra">
                            <option>Nama Mitra</option>
                            <option value="PT Telkom Akses">TA</option>
                            <option value="Non Telkom Akses">PA</option>
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
                        <div>
                            <table id="listplan" class="table table-bordered table-hover display nowrap">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Project</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Pengawas Lapangan</th>
                                    <th>Nama Mitra</th>
                                    <th>Status Approval</th>
                                    <th>Keterangan Approval</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 0;
                                foreach($listpekerjaan as $a){
                                    $no++;
                                    $id   = $a['id'];
                                    ?>
                                    <tr>
                                        <td><?= $no;?></td>
                                        <td><?= $a['idp'];?></td>
                                        <td><?= $a['pekerjaan'];?></td>
                                        <td><?= $a['jenis_pekerjaan'];?></td>
                                        <td><?= $a['waspang'];?></td>
                                        <td><?= $a['mitra'];?></td>
                                        <td style="text-align: center;">
                                            <?php if ($a['approval_pek'] !== NULL){
                                                if ($a['approval_pek'] == "RETURN") {
                                                    echo "<p class='text-yellow'><b>RETURNED</b></p>";
                                                } elseif ($a['approval_pek'] == "NOK") {
                                                    echo "<p class='text-red'><b>NOT APPROVED</b></p>";
                                                } else {
                                                    echo "<p class='text-green'><b>APPROVED</b></p>";
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php if ($a['ket_approval_pek'] !== NULL){
                                                echo "<b>".$a['ket_approval_pek']."</b>";
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
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                            </table>
                        </div>
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