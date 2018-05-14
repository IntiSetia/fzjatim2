<?php
date_default_timezone_set("Asia/Jakarta");
foreach ($data_hr as $a) {
?>

    <style type="text/css">
        .file-upload {
            display: block;
            width: 100%;
        }

        .file-upload__label {
            display: block;
            padding: 1em 2em;
            color: #fff;
            background: #222;
            border-radius: .4em;
            transition: background .3s;

        &:hover {
             cursor: pointer;
             background: #000;
         }
        }

        .file-upload__input {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            text-align: center;
            width:100%;
            height: 100%;
            opacity: 0;
        }
    </style>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Peminjaman Barang
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url('index.php/wh/data_invent/')?>"><i class="fa fa-angle-left"></i> Kembali</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <form class="form-horizontal" method="POST" action="<?=base_url('index.php/wh/edit/')?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">No</label>

                                            <div class="col-sm-10">
                                                <input type="text" name="no" value="<?=$a['no'];?>" class="form-control" id="no" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Witel</label>

                                            <div class="col-sm-10">
                                                <input type="text" name="witel" value="<?=$a['witel'];?>" class="form-control" id="witel" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">STO</label>

                                            <div class="col-sm-10">
                                                <input type="text" name="sto" value="<?=$a['sto'];?>" class="form-control" id="sto" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Jenis Barang</label>

                                            <div class="col-sm-10">
                                                <input type="text" name="item" value="<?=$a['item'];?>" class="form-control" id="item" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama Barang</label>

                                            <div class="col-sm-10">
                                                <input type="text" name="namabarang" value="<?=$a['namabarang'];?>" class="form-control" id="namabarang" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Penanggung Jawab</label>

                                            <div class="col-sm-10">
                                                <input type="text" name="penanggungjawab" value="<?=$a['penanggungjawab'];?>" class="form-control" id="penanggungjawab" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Jumlah</label>

                                            <div class="col-sm-10">
                                                <input type="text" name="jumlah" value="<?=$a['jumlah'];?>" class="form-control" id="jumlah" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Serial Number</label>

                                            <div class="col-sm-10">
                                                <input type="text" name="sn" value="<?=$a['sn'];?>" class="form-control" id="sn" readonly>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <!--<button type="submit" class="btn btn-default">Cancel</button>-->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Jumlah Barang Dipinjam</label>

                                            <div class="col-sm-10">
                                                <input type="number" name="jml_barang" value="" class="form-control" id="jml_barang">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Atas Nama</label>

                                            <div class="col-sm-10">
                                                <input type="text" name="an" value="" class="form-control" id="an">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Tanggal Pinjam</label>

                                            <div class="col-sm-10">
                                                <input type="date" name="tgl_peminjaman" value="" class="form-control" id="tgl_peminjaman">
                                            </div>
                                        </div>

                                        <?php
                                            if ($a['jumlah'] == 0)
                                            {
                                                echo '<input type="submit" name="submit" value="Pinjam" class="btn btn-info pull-right" disabled>';
                                            }
                                            else
                                            {
                                                echo '<input type="submit" name="submit" value="Pinjam" class="btn btn-info pull-right">';
                                            }
                                        ?>


                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                            </div>


                        </div>

                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
<!-- /.content-wrapper -->

<?php } ?>