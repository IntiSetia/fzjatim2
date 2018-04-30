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
                                            echo $a['pekerjaan'] . "</td>";
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