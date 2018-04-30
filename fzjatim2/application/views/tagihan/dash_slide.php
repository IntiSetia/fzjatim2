<?php
date_default_timezone_set("Asia/Jakarta");
if($this->session->userdata('position') == 'Admin Maintenance' || $this->session->userdata('nama') == 'TEFANI DIVA WIBOWO' || $this->session->userdata('nama') == 'INTI SETIA NINGTYAS' || $this->session->userdata('nama') == 'ANDRE FIRMAN SAPUTRA' || $this->session->userdata('position') == 'Mgr Shared Service & Performance Jawa Timur 2') {
?>
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
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div id="chartdiv_dashboardcogs"></div>
                        </div>
                        <!--<div class="item">
                            <img src="http://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">

                            <div class="carousel-caption">
                                Second Slide
                            </div>
                        </div>-->
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="fa fa-angle-right"></span>
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
    <?php
} else {
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1 style='color: red;'>Maaf, Anda tidak memiliki akses untuk laman ini</h1>
        </section>
    </div>
    <?php
}
?>
