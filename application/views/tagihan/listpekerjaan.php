<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List Pekerjaan
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

             <!-- <div class="box-body">
                <div class="form-group">
                  <form method="POST" action="" >
                    <div class="col-sm-3">
                      <div class="form-group">
                        <select class="form-control select2" style="width: 100%;" name="area">
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3"> 
                      <div class="form-group">
                        <select class="form-control select2" style="width: 100%;" name="bulan">
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" name="submit" class="btn btn-primary" value="Submit" >
                    </div>
                  </form>
                </div>
              </div> -->
            
            <div class="col-xs-12">
                <div class="box">
                    <!--<div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div>
                            <table id="listplan" class="table table-bordered table-hover display wrap">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Project</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Nama Mitra</th>
                                    <th>Pengawas Lapangan</th>
                                    <th>Biaya Telkom - TA</th>
                                    <th>Biaya TA - Mitra</th>
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
                                        <td style="text-align: center"><?= $no;?></td>
                                        <td><?= $a['idp'] . " + " . $id;?></td>
                                        <td><?= $a['pekerjaan'];?></td>
                                        <td><?= $a['jenis_pekerjaan'];?></td>
                                        <td><?= $a['mitra'];?></td>
                                        <td><?= $a['waspang'];?></td>
                                        <td><?php
                                            $hargatelkom    = $a['harga_telkom'];
                                            $tampil_hargat  = number_format($hargatelkom,0,",",".");
                                            echo $tampil_hargat;
                                        ?></td>
                                        <td><?php
                                            $hargam          = $a['harga_mitra'];
                                            $tampil_hargam   = number_format($hargam,0,",",".");
                                            echo $tampil_hargam;
                                        ?></td>
                                        <td>
                                            <?php if ($a['approval_pek'] !== NULL){
                                                if ($a['approval_pek'] == "RETURN") {
                                                    echo "<button type='button' class='btn btn-block btn-warning btn-sm' data-toggle='modal' data-target='#modal-approval'>RETURNED</button></td>";
                                                } else if ($a['approval_pek'] == "NOK") {
                                                    echo "<button type='button' class='btn btn-block btn-danger btn-sm btn-modal' pos='0' approv='".$id."' id='approval'>NOT APPROVED</button></td>";
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
                                                echo $a['ket_approval_pek'];
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

                                <div class="modal fade" id="modal-approval">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="" method="post" enctype="multipart/form-data" id="form-approval">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">APPROVAL </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-horizontal">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" style="width: 150px;">Status Approval</label>
                                                            <div class="col-sm-10" style="width: 450px;">
                                                                <select class="form-control" name="status_approval" required id="status_approval">
                                                                    <option value="" selected disabled>Pilih Status</option>
                                                                    <option value="RETURN">RETURN</option>
                                                                    <option value="OK">OK</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" style="width: 150px;">Keterangan</label>
                                                            <div class="col-sm-10" style="width: 450px;">
                                                                <input class="form-control" type="text" placeholder="Keterangan" name="keterangan"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

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
<!-- /.content-wrapper