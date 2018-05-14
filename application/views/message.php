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
    <section class="content-header">
        <h1>
           Dashboard
            <!--<small>Control panel</small>-->
        </h1>
    </section>
    <section class="content">
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
                <a href="" class="small-box-footer btn-default" data-toggle="modal" data-target="#modal-plan">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo "Rp " . $tampilnonpo . "M";?></h3>

                    <p>NON PO<br><?=$totalnopo . " LOP";?></p>
                </div>
                <a href="" class="small-box-footer btn-default" data-toggle="modal" data-target="#modal-nonpo">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3><?php echo "Rp " . $tampilpo . "M";?></h3>

                    <p>PO<br><?=$totalpo . " LOP";?></p>
                </div>
                <a href="" class="small-box-footer btn-default" data-toggle="modal" data-target="#modal-po">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo "Rp " . $tampilrekon . "M";?></h3>

                    <p>REKON<br><?=$totalrekon . " LOP";?></p>
                </div>
                <a href="" class="small-box-footer btn-default" data-toggle="modal" data-target="#modal-rekon">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                <a href="" class="small-box-footer btn-default" data-toggle="modal" data-target="#modal-pr">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3><?php echo "Rp " . $tampilbast . "M";?></h3>

                    <p>BAST<br><?=$totalbast . " LOP";?></p>
                </div>
                <a href="" class="small-box-footer btn-default" data-toggle="modal" data-target="#modal-bast">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo "Rp " . $tampilvestyna . "M";?></h3>

                    <p>VESTYNA<br><?=$totalvestyna . " LOP";?></p>
                </div>
                <a href="" class="small-box-footer btn-default" data-toggle="modal" data-target="#modal-vestyna">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?php echo "Rp " . $tampilmiro . "M";?></h3>

                    <p>MIRO<br><?=$totalmiro . " LOP";?></p>
                </div>
                <a href="" class="small-box-footer btn-default" data-toggle="modal" data-target="#modal-miro">More info <i class="fa fa-arrow-circle-right"></i></a>

            </div>
        </div>
</div>

        <div class="modal fade" id="modal-plan">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">PLAN</h4>
                    </div>
                    <div class="modal-body">
                        <table id="report_input" class="table table-bordered table-hover display wrap">
                            <thead>
                            <tr>
                                <th style="text-align: center">AREA</th>
                                <th style="text-align: center">JUMLAH LOP</th>
                                <th style="text-align: center">TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no                 = 0;
                            $jumlahtotalplan    = 0;
                            $jumlahlopplan      = 0;
                            foreach($report_plan as $a){
                            $no++;
                            ?>
                            <tr>
                                <td><?= $a['witel']?></td>
                                <td style="text-align: center">
                                    <?php
                                    $count          = $a['count'];
                                    $jumlahlopplan  += $count;
                                    echo $count . " LOP";
                                    ?>
                                </td>
                                <td style="text-align: right">
                                    <?php
                                    $sum                = $a['sum'];
                                    $jumlah             = ceil($sum);
                                    $jumlahtotalplan    += $sum;
                                    $view           = number_format($jumlah,0,",",".");
                                    echo $view;
                                    ?>
                                </td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <th>FZ JATIM-2</th>
                                <th style="text-align: center">
                                    <?php
                                    echo $jumlahlopplan . " LOP";
                                    ?>
                                </th>
                                <th style="text-align: right">
                                    <?
                                    $viewjumlah     = number_format($jumlahtotalplan,0,",",".");
                                    echo $viewjumlah;
                                    ?>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>-->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-nonpo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">NON PO</h4>
                    </div>
                    <div class="modal-body">
                        <table id="report_input" class="table table-bordered table-hover display wrap">
                            <thead>
                            <tr>
                                <th style="text-align: center">AREA</th>
                                <th style="text-align: center">JUMLAH LOP</th>
                                <th style="text-align: center">TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no                 = 0;
                            $jumlahtotalnonpo    = 0;
                            $jumlahlopnonpo      = 0;
                            foreach($report_nonpo as $a){
                            $no++;
                            ?>
                            <tr>
                                <td><?= $a['witel']?></td>
                                <td style="text-align: center">
                                    <?php
                                    $count      = $a['count'];
                                    $jumlahlopnonpo  += $count;
                                    echo $count . " LOP";
                                    ?>
                                </td>
                                <td style="text-align: right">
                                    <?php
                                    $sum            = $a['sum'];
                                    $jumlah         = ceil($sum);
                                    $jumlahtotalnonpo    += $sum;
                                    $view           = number_format($jumlah,0,",",".");
                                    echo $view;
                                    ?>
                                </td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <th>FZ JATIM-2</th>
                                <th style="text-align: center">
                                    <?php
                                    echo $jumlahlopnonpo . " LOP";
                                    ?>
                                </th>
                                <th style="text-align: right">
                                    <?
                                    $viewjumlah     = number_format($jumlahtotalnonpo,0,",",".");
                                    echo $viewjumlah;
                                    ?>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>-->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-po">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">PO</h4>
                    </div>
                    <div class="modal-body">
                        <table id="report_input" class="table table-bordered table-hover display wrap">
                            <thead>
                            <tr>
                                <th style="text-align: center">AREA</th>
                                <th style="text-align: center">JUMLAH LOP</th>
                                <th style="text-align: center">TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no                 = 0;
                            $jumlahtotalpo    = 0;
                            $jumlahloppo      = 0;
                            foreach($report_po as $a){
                            $no++;
                            ?>
                            <tr>
                                <td><?= $a['witel']?></td>
                                <td style="text-align: center">
                                    <?php
                                    $count      = $a['count'];
                                    $jumlahloppo  += $count;
                                    echo $count . " LOP";
                                    ?>
                                </td>
                                <td style="text-align: right">
                                    <?php
                                    $sum            = $a['sum'];
                                    $jumlah         = ceil($sum);
                                    $jumlahtotalpo    += $sum;
                                    $view           = number_format($jumlah,0,",",".");
                                    echo $view;
                                    ?>
                                </td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <th>FZ JATIM-2</th>
                                <th style="text-align: center">
                                    <?php
                                    echo $jumlahloppo . " LOP";
                                    ?>
                                </th>
                                <th style="text-align: right">
                                    <?
                                    $viewjumlah     = number_format($jumlahtotalpo,0,",",".");
                                    echo $viewjumlah;
                                    ?>
                                </th>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>-->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-rekon">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">REKON</h4>
                    </div>
                    <div class="modal-body">
                        <table id="report_input" class="table table-bordered table-hover display wrap">
                            <thead>
                            <tr>
                                <th style="text-align: center">AREA</th>
                                <th style="text-align: center">JUMLAH LOP</th>
                                <th style="text-align: center">TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no                     = 0;
                            $jumlahtotalrekon       = 0;
                            $jumlahloprekon         = 0;
                            foreach($report_rekon as $a){
                            $no++;
                            ?>
                            <tr>
                                <td><?= $a['witel']?></td>
                                <td style="text-align: center">
                                    <?php
                                    $count      = $a['count'];
                                    $jumlahloprekon  += $count;
                                    echo $count . " LOP";
                                    ?>
                                </td>
                                <td style="text-align: right">
                                    <?php
                                    $sum                    = $a['sum'];
                                    $jumlah                 = ceil($sum);
                                    $jumlahtotalrekon       += $sum;
                                    $view           = number_format($jumlah,0,",",".");
                                    echo $view;
                                    ?>
                                </td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <th>FZ JATIM-2</th>
                                <th style="text-align: center">
                                    <?php
                                    echo $jumlahloprekon . " LOP";
                                    ?>
                                </th>
                                <th style="text-align: right">
                                    <?
                                    $viewjumlah     = number_format($jumlahtotalrekon,0,",",".");
                                    echo $viewjumlah;
                                    ?>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>-->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-pr">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">PR</h4>
                    </div>
                    <div class="modal-body">
                        <table id="report_input" class="table table-bordered table-hover display wrap">
                            <thead>
                            <tr>
                                <th style="text-align: center">AREA</th>
                                <th style="text-align: center">JUMLAH LOP</th>
                                <th style="text-align: center">TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no               = 0;
                            $jumlahtotalpr    = 0;
                            $jumlahloppr      = 0;
                            foreach($report_pr as $a){
                            $no++;
                            ?>
                            <tr>
                                <td><?= $a['witel']?></td>
                                <td style="text-align: center">
                                    <?php
                                    $count      = $a['count'];
                                    $jumlahloppr  += $count;
                                    echo $count . " LOP";
                                    ?>
                                </td>
                                <td style="text-align: right">
                                    <?php
                                    $sum            = $a['sum'];
                                    $jumlah         = ceil($sum);
                                    $jumlahtotalpr    += $sum;
                                    $view           = number_format($jumlah,0,",",".");
                                    echo $view;
                                    ?>
                                </td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <th>FZ JATIM-2</th>
                                <th style="text-align: center">
                                    <?php
                                    echo $jumlahloppr . " LOP";
                                    ?>
                                </th>
                                <th style="text-align: right">
                                    <?
                                    $viewjumlah     = number_format($jumlahtotalpr,0,",",".");
                                    echo $viewjumlah;
                                    ?>
                                </th>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>-->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-bast">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">BAST</h4>
                    </div>
                    <div class="modal-body">
                        <table id="report_input" class="table table-bordered table-hover display wrap">
                            <thead>
                            <tr>
                                <th style="text-align: center">AREA</th>
                                <th style="text-align: center">JUMLAH LOP</th>
                                <th style="text-align: center">TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no                 = 0;
                            $jumlahtotalbast    = 0;
                            $jumlahlopbast      = 0;
                            foreach($report_bast as $a){
                            $no++;
                            ?>
                            <tr>
                                <td><?= $a['witel']?></td>
                                <td style="text-align: center">
                                    <?php
                                    $count      = $a['count'];
                                    $jumlahlopbast  += $count;
                                    echo $count . " LOP";
                                    ?>
                                </td>
                                <td style="text-align: right">
                                    <?php
                                    $sum            = $a['sum'];
                                    $jumlah         = ceil($sum);
                                    $jumlahtotalbast    += $sum;
                                    $view           = number_format($jumlah,0,",",".");
                                    echo $view;
                                    ?>
                                </td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <ththth>FZ JATIM-2</ththth>
                                <ththth style="text-align: center">
                                    <?php
                                    echo $jumlahlopbast . " LOP";
                                    ?>
                                </ththth>
                                <ththth style="text-align: right">
                                    <?
                                    $viewjumlah     = number_format($jumlahtotalbast,0,",",".");
                                    echo $viewjumlah;
                                    ?>
                                </ththth>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>-->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-vestyna">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">VESTYNA</h4>
                    </div>
                    <div class="modal-body">
                        <table id="report_input" class="table table-bordered table-hover display wrap">
                            <thead>
                            <tr>
                                <th style="text-align: center">AREA</th>
                                <th style="text-align: center">JUMLAH LOP</th>
                                <th style="text-align: center">TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no                 = 0;
                            $jumlahtotalvestyna    = 0;
                            $jumlahlopvestyna      = 0;
                            foreach($report_vestyna as $a){
                            $no++;
                            ?>
                            <tr>
                                <td><?= $a['witel']?></td>
                                <td style="text-align: center">
                                    <?php
                                    $count      = $a['count'];
                                    $jumlahlopvestyna  += $count;
                                    echo $count . " LOP";
                                    ?>
                                </td>
                                <td style="text-align: right">
                                    <?php
                                    $sum            = $a['sum'];
                                    $jumlah         = ceil($sum);
                                    $jumlahtotalvestyna    += $sum;
                                    $view           = number_format($jumlah,0,",",".");
                                    echo $view;
                                    ?>
                                </td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <th>FZ JATIM-2</th>
                                <th style="text-align: center">
                                    <?php
                                    echo $jumlahlopvestyna . " LOP";
                                    ?>
                                </th>
                                <th style="text-align: right">
                                    <?
                                    $viewjumlah     = number_format($jumlahtotalvestyna,0,",",".");
                                    echo $viewjumlah;
                                    ?>
                                </th>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>-->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-miro">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">MIRO</h4>
                    </div>
                    <div class="modal-body">
                        <table id="report_input" class="table table-bordered table-hover display wrap">
                            <thead>
                            <tr>
                                <th style="text-align: center">AREA</th>
                                <th style="text-align: center">JUMLAH LOP</th>
                                <th style="text-align: center">TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no                 = 0;
                            $jumlahtotalmiro    = 0;
                            $jumlahlopmiro    = 0;
                            foreach($report_miro as $a){
                            $no++;
                            ?>
                            <tr>
                                <td><?= $a['witel']?></td>
                                <td style="text-align: center">
                                    <?php
                                    $count      = $a['count'];
                                    $jumlahlopmiro  += $count;
                                    echo $count . " LOP";
                                    ?>
                                </td>
                                <td style="text-align: right">
                                    <?php
                                    $sum            = $a['sum'];
                                    $jumlah         = ceil($sum);
                                    $jumlahtotalmiro    += $sum;
                                    $view           = number_format($jumlah,0,",",".");
                                    echo $view;
                                    ?>
                                </td>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <th>FZ JATIM-2</th>
                                <th style="text-align: center">
                                    <?php
                                    echo $jumlahlopmiro . " LOP";
                                    ?>
                                </th>
                                <th style="text-align: right">
                                    <?
                                    $viewjumlah     = number_format($jumlahtotalmiro,0,",",".");
                                    echo $viewjumlah;
                                    ?>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>-->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

</section>
</div>
