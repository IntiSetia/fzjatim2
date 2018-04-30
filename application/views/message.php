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
    <section class="content-header">
        <h1>
            Messages
            <!--<small>Control panel</small>-->
        </h1>
    </section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="<?=base_url('index.php/tagihan/listplanpekerjaan');?>">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
<!--                    <i>-</i>-->
                    <p style="padding-top: 0.5em" class="fa fa-envelope"></p>
                </span>

                <div class="info-box-content">

                    <?php
                        if (($this->session->userdata('position') == 'commerce') || ($this->session->userdata('position') == 'procurement')){
                            echo "<span class='info-box-text'>Update NO PO</span>";
                        } else {
                            echo "<span class='info-box-text'>Plan Pekerjaan</span>";
                        }
                    ?>

                    <span class="info-box-number">
                        <b style="font-size: 2em;">
                        <?php
                        if (($this->session->userdata('position') == 'Mgr Maintenance Malang') || ($this->session->userdata('nama') == 'TEFANI DIVA WIBOWO')){
                            echo $jplan;
                        } else if(($this->session->userdata('position') == 'commerce')){
                            echo $jppo;
                        } else {    
                            echo $jplanreturn;
                        }?>
                        </b>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <?php
            if (($this->session->userdata('position') == 'procurement')){
                echo "";
            } else {
        ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="<?=base_url('index.php/tagihan/listpekerjaan');?>">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i></i>
                <p style="padding-top: 0.5em" class="fa fa-envelope-o"></p>
                </span>
                <div class="info-box-content">
                    <?php
                        if (($this->session->userdata('position') == 'commerce')){
                            echo "<span class='info-box-text'>Update BAST</span>";
                        } else {
                            echo "<span class='info-box-text'>Pekerjaan Baru</span>";
                        }
                    ?>
                    <span class="info-box-number">
                    <b style="font-size: 2em;">
                        <?php
                        if ($this->session->userdata('position') == 'Mgr Maintenance Malang' || $this->session->userdata('nama') == 'TEFANI DIVA WIBOWO'){
                            echo $jplanpek;
                        } else if(($this->session->userdata('position') == 'commerce')){
                            echo COUNT($jpbast);
                        } else{
                            echo $jplanpekreturn;
                        }?>
                        </b>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <?php
            }
        ?>

        <?php
            if (($this->session->userdata('position') == 'procurement')){
                echo "";
            } else {
        ?>
        <!-- fix for small devices only -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i></i>
                <p style="padding-top: 0.5em" class="fa fa-book"></p>
                </span>
                <div class="info-box-content">
                    <?php
                        if (($this->session->userdata('position') == 'commerce')){
                            echo "<span class='info-box-text'>Update Invoice dan FP</span>";
                        } else {
                            echo "<span class='info-box-text'>BA Rekon</span>";
                        }
                    ?>
                    <span class="info-box-number">
                    <b style="font-size: 2em;">
                        <?php
                        if ($this->session->userdata('position') == 'Mgr Maintenance Malang' || $this->session->userdata('nama') == 'TEFANI DIVA WIBOWO'){
                            echo $jbarekon;
                        } else if(($this->session->userdata('position') == 'commerce')){
                            echo COUNT($jpinvoicefp);
                        } else{
                            echo $jbarekonreturn;
                        }?>
                        </b>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <?php
            }
        ?>
        <!--
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"></span>
                    <span class="info-box-number"></span>
                </div>
            </div>
        </div>
         -->
    <!-- /.row -->
    </div>
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
</section>
</div>
