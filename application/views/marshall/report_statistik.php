<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <!--<div class="box-header with-border">
                        <h3 class="box-title">Dashboard COGS</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="col-sm-4">
                                <form method="post" action="<?php echo base_url(); ?>index.php/marshall/report_statistik">
                                    <select class="form-control" name="bulan" id="bulan" style="height:100%">
                                        <option value="">--Pilih Bulan--</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                            </div>
                            <div class="col-sm-2">
                                <input class="btn btn-block bg-blue waves-effect" type="submit" name="submit">
                            </div>
                            </form>
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div id="chartmarshall" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                                </div>
                                <!--<div class="item">
                                    <img src="http://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">

                                    <div class="carousel-caption">
                                        Second Slide
                                    </div>
                                </div>-->
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
</div>
<!-- /.row -->
<!-- END ACCORDION & CAROUSEL-->