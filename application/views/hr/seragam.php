<?php
if ($this->session->flashdata('notif')){
    ?>
    <script>
        swal(
            '<?= $this->session->flashdata("notif");?>',
            '',
            'success'
        )
    </script>
    <?php
}
date_default_timezone_set("Asia/Jakarta");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Input Seragam</h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="<?php echo base_url();?>index.php/hrperformance/tambah_seragam" role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Jenis Seragam</label>
                                <select name="jenis_seragam" class="form-control" required>
                                    <option value="" disabled selected>— Pilih Jenis Seragam —</option>
                                    <option value="Merah Putih">Merah Putih</option>
                                    <option value="Indihome Merah">Indihome Merah</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ukuran</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">S</label>

                                <div class="col-sm-10">
                                    <input type="number" min="0" class="form-control" name="ukuran_s" placeholder="Jumlah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">M</label>

                                <div class="col-sm-10">
                                    <input type="number" min="0" class="form-control" name="ukuran_m" placeholder="Jumlah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">L</label>

                                <div class="col-sm-10">
                                    <input type="number" min="0" class="form-control" name="ukuran_l" placeholder="Jumlah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">XL</label>

                                <div class="col-sm-10">
                                    <input type="number" min="0" class="form-control" name="ukuran_xl" placeholder="Jumlah">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-xs-12">
                <div class="box">
                    <!--<div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="sx" class="table table-bordered table-hover display wrap" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Seragam</th>
                                <th>S</th>
                                <th>M</th>
                                <th>L</th>
                                <th>XL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($dt_seragam as $data) {
                                echo '
                                        <tr>
                                            <td>'.$data->no.'</td>
                                            <td>'.$data->jenis_seragam.'</td>
                                            <td>'.$data->s.'</td>
                                            <td>'.$data->m.'</td>
                                            <td>'.$data->l.'</td>
                                            <td>'.$data->xl.'</td>
                                        </tr>
                                    ';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
        </section>
    <!-- /.content -->
</div>
<script type="text/javascript">

</script>