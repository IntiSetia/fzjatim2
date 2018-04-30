<?php
$tampilplan     = "";
$totalplan      = "";
foreach ($plan as $a){
    $p   = ceil($a['sum']);
    $p2   = $p/1000000000;
    $tampilplan     = round($p2, 2);
    $totalplan      = $a['count'];
}

$tampilpo = "";
$totalpo     = "";
foreach ($po as $a){
    $p   = ceil($a['sum']);
    $p2   = $p/1000000000;
    $tampilpo   = round($p2, 2);
    $totalpo      = $a['count'];
}

$tampilnonpo = "";
$totalnopo     = "";
foreach ($nonpo as $a){
    $p   = ceil($a['sum']);
    $p2   = $p/1000000000;
    $tampilnonpo   = round($p2, 2);
    $totalnopo      = $a['count'];
}

$tampilpr = "";
$totalpr      = "";
foreach ($pr as $a){
    $p   = ceil($a['sum']);
    $p2   = $p/1000000000;
    $tampilpr   = round($p2, 2);
    $totalpr      = $a['count'];
}

$tampilplan = "";
$totalplan      = "";
foreach ($plan as $a){
    $p   = ceil($a['sum']);
    $p2   = $p/1000000000;
    $tampilplan   = round($p2, 2);
    $totalplan      = $a['count'];
}

$tampilvestyna = "";
$totalvestyna      = "";
foreach ($vestyna as $a){
    $p   = ceil($a['sum']);
    $p2   = $p/1000000000;
    $tampilvestyna   = round($p2, 2);
    $totalvestyna      = $a['count'];
}

$tampilrekon = "";
$totalrekon      = "";
foreach ($rekon as $a){
    $p   = ceil($a['sum']);
    $p2   = $p/1000000000;
    $tampilrekon   = round($p2, 2);
    $totalrekon      = $a['count'];
}

$tampilmiro = "";
$totalmiro      = "";
foreach ($miro as $a){
    $p   = ceil($a['sum']);
    $p2   = $p/1000000000;
    $tampilmiro   = round($p2, 2);
    $totalmiro      = $a['count'];
}

$tampilbast = "";
$totalbast      = "";
foreach ($bast as $a){
    $p   = ceil($a['sum']);
    $p2   = $p/1000000000;
    $tampilbast   = round($p2, 2);
    $totalbast      = $a['count'];
}
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
                        <div class="item" >
                            <div id="chartdiv_dashboardcogs"></div>
                        </div>
                        <div class="item active" >
                            <div class="row">
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h3>
                                            <?php echo "Rp " . $tampilplan . "M";?>
                                            </h3>

                                            <p>PLAN<br><?=$totalplan . " LOP";?></p>

                                        </div>
                                        <!-- -->
                                        <a href="<?=base_url('index.php/tagihan/report_input')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h3><?php echo "Rp " . $tampilnonpo . "M";?></h3>

                                            <p>NON PO<br><?=$totalnopo . " LOP";?></p>
                                        </div>
                                         
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-orange">
                                        <div class="inner">
                                            <h3><?php echo "Rp " . $tampilpo . "M";?></h3>

                                            <p>PO<br><?=$totalpo . " LOP";?></p>
                                        </div>
                                         
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <h3><?php echo "Rp " . $tampilrekon . "M";?></h3>

                                            <p>REKON<br><?=$totalrekon . " LOP";?></p>
                                        </div>
                                         
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-navy">
                                        <div class="inner">
                                            <h3><?php echo "Rp " . $tampilpr . "M";?></h3>

                                            <p>PR<br><?=$totalpr . " LOP";?></p>
                                        </div>
                                         
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-teal">
                                        <div class="inner">
                                            <h3><?php echo "Rp " . $tampilbast . "M";?></h3>

                                            <p>BAST<br><?=$totalbast . " LOP";?></p>
                                        </div>
                                         
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?php echo "Rp " . $tampilvestyna . "M";?></h3>

                                            <p>VESTYNA<br><?=$totalvestyna . " LOP";?></p>
                                        </div>
                                         
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-primary">
                                        <div class="inner">
                                            <h3><?php echo "Rp " . $tampilmiro . "M";?></h3>

                                            <p>MIRO<br><?=$totalmiro . " LOP";?></p>
                                        </div>
                                         
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            
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
