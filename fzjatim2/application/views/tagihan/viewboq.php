<?php
    foreach ($datadetail as $a) {
?>

<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center;" rowspan="3">NO</th>
                                    <th style="text-align: center;" rowspan="3">DESIGNATOR</th>
                                    <th style="text-align: center;" rowspan="3">URAIAN PEKERJAAN</th>
                                    <th style="text-align: center;" rowspan="3">SATUAN</th>
                                    <th style="text-align: center;" rowspan="2" colspan="2">HARGA SATUAN</th>
                                    <th style="text-align: center;" colspan="8"><?=$a['pekerjaan']?></th>
                                </tr>
                                <tr>
                                    <th style="text-align: center;" colspan="4">SURAT PESANAN</th>
                                    <th style="text-align: center;" colspan="4">REALISASI</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center;">Material</th>
                                    <th style="text-align: center;">Jasa</th>
                                    <th style="text-align: center;">VOL</th>
                                    <th style="text-align: center;">Material</th>
                                    <th style="text-align: center;">Jasa</th>
                                    <th style="text-align: center;">Jumlah</th>
                                    <th style="text-align: center;">VOL</th>
                                    <th style="text-align: center;">Material</th>
                                    <th style="text-align: center;">Jasa</th>
                                    <th style="text-align: center;">Jumlah</th>
                                </tr>
                                </thead>
                                <tbody>
                                    
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
<!-- /.content-wrapper-->
<?php
}
?>