<?php
date_default_timezone_set("Asia/Jakarta");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="margin-bottom: 10px;"><?php echo 'Data Marshall PSA '; echo $this->session->userdata('psa'); ?></h1>
        <?php
        if($this->session->flashdata('notif') != '')
        {
            echo '<div class="alert alert-danger" style="width:30%">';
            echo $this->session->flashdata('notif');
            echo '</div>';
        }
        ?>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol> -->
    </section>

    <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!--<div class="box-header">
                  <h3 class="box-title">Hover Data Table</h3>
                </div>-->
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="listplan" class="table table-bordered table-hover display wrap" cellspacing="0" width="100%">
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
                        $no = 1;
                        $alert = "'Apakah anda yakin menghapus data ini ?'";
                        foreach ($sampling_marshall as $data)
                        {
                            echo '
                            <tr>
                                <td>'.$no.'</td>
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
                                <td>
                                     <a href="'.base_url().'index.php/marshall/update_sampling_marshall/'.$data->no.'" class="btn btn-info btn-medium"><i class="glyphicon glyphicon-edit"></i></a>
                                     <a style="margin-top: 10px;" href="'.base_url().'index.php/marshall/delete_sampling_marshall/'.$data->no.'" class="btn btn-danger btn-medium" onclick="return confirm('.$alert.')"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            ';
                            $no++;
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
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->

<script>

</script>
