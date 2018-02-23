<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List Plan Pekerjaan
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
                                    <th>Status Approval Pekerjaan</th>
                                    <th>Keterangan Approval Pekerjaan</th>
                                    <th>Status Approval Material</th>
                                    <th>Keterangan Approval Material</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 0;
                                foreach($listpekerjaan as $a){
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
                                        <td>
                                            <?php if ($a['approve1'] !== NULL){
                                                if ($a['approve1'] == "Approved"){
                                                    echo "<a href='" . base_url('index.php/tagihan/approval1/'.$a['idp']). "'><button type='button' class='btn btn-block btn-success btn-sm'>Approved</button></a></td>";
                                                } else if ($a['approve1'] == "Not Yet Approved"){
                                                    echo "<a href='" . base_url('index.php/tagihan/approval1/'.$a['idp']). "'><button type='button' class='btn btn-block btn-danger btn-sm'>Not Yet Approved</button></a></td>";
                                                } else if ($a['approve1'] == "Returned"){
                                                    echo "<a href='" . base_url('index.php/tagihan/approval1/'.$a['idp']). "'><button type='button' class='btn btn-block btn-warning btn-sm'>Returned</button></a></td>";
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php if ($a['ket1'] !== NULL){
                                                echo $a['ket1'];
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <?php if ($a['approve2'] !== NULL){
                                                if ($a['approve2'] == "Approved"){
                                                    echo "<a href='" . base_url('index.php/tagihan/approval2/'.$a['idp']). "'><button type='button' class='btn btn-block btn-success btn-sm'>Approved</button></a></td>";
                                                } else if ($a['approve2'] == "Submitted"){
                                                    echo "<a href='" . base_url('index.php/tagihan/approval2/'.$a['idp']). "'><button type='button' class='btn btn-block btn-danger btn-sm'>Not Yet Approved</button></a></td>";
                                                } else if ($a['approve2'] == "Returned"){
                                                    echo "<a href='" . base_url('index.php/tagihan/approval2/'.$a['idp']). "'><button type='button' class='btn btn-block btn-warning btn-sm'>Returned</button></a></td>";
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php if ($a['ket2'] !== NULL){
                                                echo $a['ket2'];
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
                                    <th>Status Approval Pekerjaan</th>
                                    <th>Keterangan Approval Pekerjaan</th>
                                    <th>Status Approval Material</th>
                                    <th>Keterangan Approval Material</th>
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