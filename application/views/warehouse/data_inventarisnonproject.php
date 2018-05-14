

<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List Data Inventaris
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div>
                            <table id="realtable" class="display wrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Witel</th>
                                    <th style="text-align: center">STO</th>
                                    <th style="text-align: center">Nama Barang</th>
                                    <th style="text-align: center">Nama Group</th>
                                    <th style="text-align: center">Penanggungjawab</th>
                                    <th style="text-align: center">Jumlah Barang</th>
                                    <th style="text-align: center">Serial Number</th>
                                    <th style="text-align: center">BA Serah Terima</th>
                                    <!--<th style="text-align: center">Lihat Bukti</th>-->
                                    <!--<th style="text-align: center">Pinjam Barang</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 0;
                                foreach($invent as $a){
                                    $no++;
                                    $id   = $a['no'];
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?=$no;?></td>
                                        <td style="text-align: center"><?=$a['witel'];?></td>
                                        <td style="text-align: center"><?=$a['sto'];?></td>
                                        <td style="text-align: center"><?=$a['namabarang'];?></td>
                                        <td style="text-align: center"><?=$a['item'];?></td>
                                        <td style="text-align: center"><?=$a['penanggungjawab'];?></td>
                                        <td style="text-align: center"><?=$a['jumlah'];?></td>
                                        <td style="text-align: center"><?=$a['sn'];?></td>
                                        <td style="text-align: center">
                                            <a href="<?= base_url('/dokumenhr/' . $a['ba']) ?>" target="_blank"><?=$a['ba'];?>
                                            </a>
                                        </td>
                                        <!--<td style="text-align: center">
                                            <a href="<?/*= base_url('/dokumenhr/' . $a['ba']) */?>"><button type="button" class="btn btn-block btn-primary btn-xs">Lihat</button></a>
                                        </td>-->
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>

                                <div class="modal fade" id="modal-update">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="" method="post" enctype="multipart/form-data" id="form-update">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Update Data</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-horizontal">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label" style="width: 150px;">Tanggal</label>
                                                            <label class="col-sm-9 control-label" style="text-align: left"><?php echo date('Y-m-d');?></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label" style="width: 150px;">Witel</label>
                                                            <label class="col-sm-9 control-label" id="witel" style="text-align: left"></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label" style="width: 150px;">STO</label>
                                                            <label class="col-sm-9 control-label" id="sto" style="text-align: left"></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label" style="width: 150px;">Nama Barang</label>
                                                            <label class="col-sm-9 control-label" id="barang" style="text-align: left"></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Jumlah Keluar</label>
                                                            <div class="col-sm-3">
                                                                <input class="form-control" type="text" name="jumlah" id="jumlahbarang"/>
                                                            </div>
                                                            <label class="col-sm-2 control-label">Sisa</label>
                                                            <label class="col-sm-1 control-label" id="sisa" style="text-align: left"></label>
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