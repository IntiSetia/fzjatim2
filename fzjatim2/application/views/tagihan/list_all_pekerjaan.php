<?php
    foreach ($khs as $b){
        $nama_khs   = $b['nama_khs'];
    }
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List All Pekerjaan
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
                  <form method="POST" action="<?php echo base_url('index.php/tagihan/cek_listpekerjaan')?>" >
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
              </div> -->
            
            <div class="col-xs-12">
                <div class="box">
                    <!--<div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div>
                            <table id="listplan" class="table table-bordered table-hover display nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Project</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Nama Mitra</th>
                                    <th>ID Vestyna</th>
                                    <th>ID SPMK</th>
                                    <th>Nama KHS</th>
                                    <th>Nilai Rekon Telkom</th>
                                    <th>Nilai Rekon Mitra</th>
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
                                        <td><?= $a['mitra'];?></td>
                                        <td><?= $a['id_vestyna'];?></td>
                                        <td><?php
                                            if ($a['id_spmk'] == NULL || $a['id_spmk'] == 0) {
                                                echo "-";
                                            } else {
                                                echo $a['id_spmk'];
                                            }
                                            ?>
                                        </td>
                                        <td><?= $nama_khs;?></td>
                                        <td><?php
                                            $hargatelkom    = $a['harga_telkom'];
                                            $tampil_hargat  = number_format($hargatelkom,0,",",".");
                                            echo $tampil_hargat;
                                            ?></td>
                                        <td><?php
                                            $hargam          = $a['harga_mitra'];
                                            $tampil_hargam   = number_format($hargam,0,",",".");
                                            if ($a['mitra'] == "PT TELKOM AKSES") {
                                                echo "-";
                                            } else {
                                                echo $tampil_hargam;
                                            }
                                            ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>

                                <div class="modal fade" id="modal-nomor_pr">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <form action="" method="post" enctype="multipart/form-data" id="form-pr">  
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">UPDATE NOMOR PR</h4>
                                      </div>
                                      <div class="modal-body">
                                         <div class="form-horizontal">
                                                    <div class="form-group">
                                                            <label class="col-sm-2 control-label" style="width: 150px;">Nomor PR</label>
                                                            <div class="col-sm-10" style="width: 450px;">
                                                                <input class="form-control" type="text" placeholder="Nomor PR" name="nomor_pr"/>
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