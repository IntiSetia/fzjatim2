<?php
date_default_timezone_set("Asia/Jakarta");
if($this->session->userdata('position') !== 'Team Leader Human Capital Service' || $this->session->userdata('position') !== 'Admin Human Capital Service' || $this->session->userdata('nama') !== 'TEFANI DIVA WIBOWO' || $this->session->userdata('nama') !== 'INTI SETIA NINGTYAS' || $this->session->userdata('nama') !== 'ANDRE FIRMAN SAPUTRA' || $this->session->userdata('position') !== 'Mgr Shared Service & Performance Jawa Timur 2') {
        $posisi = $this->session->userdata('position');
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1 style='color: red;'>Maaf, Anda tidak memiliki akses untuk laman ini</h1>

        </section>
    </div>
    <?php
} else {
    ?>
    ?>
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
                            <table id="sx" class="table table-bordered table-hover display nowrap" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Position Name</th>
                                    <th>Direktorat</th>
                                    <th>Unit</th>
                                    <th>Sub Unit</th>
                                    <th>PSA</th>
                                    <th>Status Naker</th>
                                    <th>Status Kerja</th>
                                    <th>Detail</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 0;
                                foreach ($data_hr as $a) {
                                    $no++;
                                    $id = $a['object_id'];
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $a['nik']; ?></td>
                                        <td><?= $a['nama']; ?></td>
                                        <td><?= $a['position_name']; ?></td>
                                        <td><?= $a['direktorat']; ?></td>
                                        <td><?= $a['unit']; ?></td>
                                        <td><?= $a['sub_unit']; ?></td>
                                        <td><?= $a['psa']; ?></td>
                                        <?php
                                        if ($a['status_naker'] == "aktif") {
                                            echo "<td><span class='label label-success'>Aktif</span></td>";
                                        } else {
                                            echo "<td><span class='label label-danger'>Tidak Aktif</span></td>";
                                        }
                                        ?>
                                        <?php
                                        $num = $a['nik'];
                                        $numlength = strlen((string)$num);

                                        if ($numlength == 6) {
                                            echo "<td>KARTAP</td>";
                                        } elseif ($numlength == 8) {
                                            echo "<td>KONTRAK</td>";
                                        }
                                        ?>
                                        <td style="text-align: center;"><a
                                                    href="<?= base_url('index.php/HrPerformance/Detail/' . $a['nik']) ?>"><i
                                                        class="fa fa-bars"></i></a></td>
                                        <td style="text-align: center;"><a
                                                    href="<?= base_url('index.php/HrPerformance/View_Edit/' . $a['nik']) ?>"><i
                                                        class="fa fa-edit"></i></a></td>
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
    <?php
}
    ?>