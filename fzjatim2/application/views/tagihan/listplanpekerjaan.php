<?php
    if ($this->session->userdata('position') == 'Mgr Maintenance Malang') {
?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Plan Pekerjaan
            <?php
                if ($_alert != NULL) {
                    echo "<small style='color: red;'>".$_alert."</small>";
                } else {
                    echo " ";
                }
            ?>
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
                        <div>
                            <table id="listplan" class="table table-bordered table-hover display nowrap">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="200px">Nama Pekerjaan</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Total Kebutuhan</th>
                                    <th>Status Approval</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 0;
                                foreach($listplanpekerjaanadmin as $a){
                                    $no++;
                                    $id   = $a['id'];
                                    ?>
                                    <tr>
                                        <td><?= $no;?></td>
                                        <td><?= $a['pekerjaan'];?></td>
                                        <td><?= $a['jenis_pekerjaan'];?></td>
                                        <td><?php
                                            $harga          = $a['harga'];
                                            $tampil_harga   = number_format($harga,0,",",".");
                                            echo $tampil_harga;
                                        ?></td>
                                        <td style="text-align: center">
                                            <?php
                                                if ($a['approval'] == "RETURN") {
                                                    echo "<button type='button' class='btn btn-block btn-warning btn-sm' data-toggle='modal' data-target='#modal-approval'>RETURNED</button></td>";
                                                } elseif ($a['approval'] == "NOK") {
                                                    echo "<button type='button' class='btn btn-block btn-danger btn-sm btn-modal' id-approv='$id' id='approval'>NOT APPROVED</button></td>";
                                                } else {
                                                    echo "<p class='text-green'><b>APPROVED</b></p>";
                                                }
                                            ?>       
                                    </tr>
                                   
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
                                <!-- /.modal -->

                                <?php
                                    }
                                ?> 
                                </tbody>
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
<?php
    } else {
?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Plan Pekerjaan
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
                        <div>
                            <table id="listplan" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Total Kebutuhan</th>
                                    <th>Status Approval</th>
                                    <th>Keterangan</th>
                                    <!-- <th>Edit</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 0;
                                foreach($listplanpekerjaanadmin as $a){
                                    $no++;
                                    $id   = $a['id'];
                                    ?>
                                    <tr>
                                        <td><?= $no;?></td>
                                        <td><?php
                                                if ($a['approval'] == "RETURN" || $a['approval'] == "NOK") {
                                            ?>
                                                    <a href="<?= base_url('index.php/tagihan/editpekerjaan/'.$id)?>"><?=$a['pekerjaan'];?></a></td>
                                            <?php
                                            } else {
                                                    echo $a['pekerjaan'] . "</td>";
                                            }
                                            ?>
                                        <td><?= $a['jenis_pekerjaan'];?></td>
                                        <td><?php
                                            $harga          = $a['harga'];
                                            $tampil_harga   = number_format($harga,0,",",".");
                                            echo $tampil_harga;
                                        ?></td>
                                        <td style="text-align: center;">
                                            <?php if ($a['approval'] !== NULL){
                                                if ($a['approval'] == "RETURN") {
                                                    echo "<p class='text-yellow'><b>RETURNED</b></p>";
                                                } elseif ($a['approval'] == "NOK") {
                                                    echo "<p class='text-red'><b>NOT APPROVED</b></p>";
                                                } else {
                                                    echo "<p class='text-green'><b>APPROVED</b></p>";
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php 

                                                if ($a['keterangan'] == NULL){
                                                    echo "-";
                                                } else {
                                                    $keterangan     = $a['keterangan'];
                                                    echo $keterangan;
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
<?php
    }
?>

