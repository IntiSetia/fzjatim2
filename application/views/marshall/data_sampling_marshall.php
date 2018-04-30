<?php
date_default_timezone_set("Asia/Jakarta");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Marshall</h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol> -->
    </section>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl</th>
                            <th>PSA</th>
                            <th>Jenis Finding</th>
                            <th>Lokasi</th>
                            <th>Penemuan</th>
                            <th>Tindakan Perbaikan</th>
                            <th>Pic</th>
                            <th>Target</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($sampling_marshall as $data)
                        {
                            echo '
                            <tr>
                                <td>'.$data->no.'</td>
                                <td>'.$data->tgl.'</td>
                                <td>'.$data->psa.'</td>
                                <td>'.$data->jenis_finding.'</td>
                                <td>'.$data->lokasi.'</td>
                                <td>'.$data->penemuan.'</td>
                                <td>'.$data->tindakan_perbaikan.'</td>
                                <td>'.$data->pic.'</td>
                                <td>'.$data->target.'</td>
                                <td>'.$data->status.'</td>
                                <td>'.$data->catatan.'</td>
                                <td>'.$data->jenis_finding.'</td>
                            ';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>

</script>
