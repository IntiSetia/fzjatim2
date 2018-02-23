<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Human Resource
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
                        <div style="overflow-x:auto;">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Project</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Nama Mitra</th>
                                    <th>No SPMK</th>
                                    <th>Status Approval</th>
                                    <th>Keterangan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 0;
                                foreach($listnapproved as $a){
                                    $no++;
                                    $id   = $a['id_boq'];
                                    ?>
                                    <tr>
                                        <td><?= $no;?></td>
                                        <td><?= $a['idp'];?></td>
                                        <td><?= $a['pekerjaan'];?></td>
                                        <td><?= $a['jenis_pekerjaan'];?></td>
                                        <td><?= $a['mitra'];?></td>
                                        <td style="text-align: center">
                                            <?php if ($a['spmk'] !== NULL){
                                                echo $a['spmk'];
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <td><a href="<?= base_url('index.php/tagihan/approval1/'.$a['idp'])?>"><button type="button" class="btn btn-block btn-danger btn-sm">Not Approved</button></a></td>
                                        <td style="text-align: center">
                                            <?php if ($a['ket1'] !== NULL){
                                                echo $a['ket1'];
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
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>ID Project</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Nama Mitra</th>
                                    <th>No SPMK</th>
                                    <th>Status Approval</th>
                                    <th>Keterangan</th>
                                </tr>
                                </tfoot>
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