


<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List Data Peminjaman
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
<!--                                    <th style="text-align: center">No</th>-->
                                    <th style="text-align: center">Id. Peminjaman</th>
                                    <th style="text-align: center">Nama Barang</th>
                                    <th style="text-align: center">Jumlah Barang</th>
                                    <th style="text-align: center">Atas Nama</th>
                                    <th style="text-align: center">Tanggal Peminjaman</th>
                                    <th style="text-align: center">Tanggal Pengembalian</th>
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">Aksi</th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 0;
                                foreach($invent as $a){
                                    $no++;
                                    $id   = $a->no;
                                    ?>
                                    <tr>
<!--                                        <td style="text-align: center">--><?//=$no;?><!--</td>-->
                                        <td style="text-align: center"><?=$a->id_peminjaman;?></td>
                                        <td style="text-align: center"><?=$a->namabarang;?></td>
                                        <td style="text-align: center"><?=$a->jml_barang;?></td>
                                        <td style="text-align: center"><?=$a->an;?></td>
                                        <td style="text-align: center"><?=$a->tgl_peminjaman;?></td>
<!--                                        <td style="text-align: center">-->
<!--                                            <input type="date" name="tgl_peminjaman" value="" class="form-control" id="tgl_peminjaman">-->
<!--                                            --><?//=$a->tgl_pengembalian;?>
<!--                                        </td>-->

                                        <td style="text-align: center">

                                            <?php
                                            if ($a->tgl_pengembalian == NULL){
                                                //echo "<button type='button' class='btn btn-block btn-warning btn-xs' id-witel='".$a['witel']."' id-sto='".$a['sto']."' id-item='".$a['namabarang']."' id-update='".$a['no']."' id='updatedata'>Pinjam</button></td>";
                                            ?>
                                                <form method="post" action="<?php echo base_url().'index.php/wh/kembali/'.$a->id_peminjaman; ?>">
                                                    <input type="text" name="id_oke" value="<?=$a->id_peminjaman;?>" hidden>
                                                    <input type="text" name="id_eko" value="<?=$a->no;?>" hidden>
                                                    <input type="date" name="tgl_pengembalian" value="" class="form-control" id="tgl_pengembalian" required>
                                            <?php
                                            } else {
                                            ?>
                                                    <?=$a->tgl_pengembalian;?>
                                            <?php
                                            }
                                            ?>

                                        </td>

                                        <td style="text-align: center"><?=$a->status;?></td>

                                        <td style="text-align: center">

                                            <?php
                                            if ($a->status == 'Sudah Dikembalikan'){
                                                //echo "<button type='button' class='btn btn-block btn-warning btn-xs' id-witel='".$a['witel']."' id-sto='".$a['sto']."' id-item='".$a['namabarang']."' id-update='".$a['no']."' id='updatedata'>Pinjam</button></td>";
                                                ?>
                                                <a><button type="button" class="btn btn-block btn-success btn-xs">Sudah</button></a>
                                                <?php
                                            } else {
                                                ?>
                                                <input type="submit" class="btn btn-block btn-danger btn-xs" name="submit"></input>
                                                <?php
                                            }
                                            ?>

                                        </td>
                                        </form>
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
<!-- /.content-wrapper

