<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Reporting Progress Pekerjaan</h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol> -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">PLAN</h3>
                        <div class="box-body">
                            <div>
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
                        </div>
                        <!-- /.box-body -->
                        </div>
                    <!-- /.box -->
                    </div>
            <!-- /.col -->
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">NON PO</h3>
                        <div class="box-body">
                            <div>
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
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">PO</h3>
                        <div class="box-body">
                            <div>
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
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">REKON</h3>
                        <div class="box-body">
                            <div>
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
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">PR</h3>
                        <div class="box-body">
                            <div>
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
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">BAST</h3>
                        <div class="box-body">
                            <div>
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
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">VESTYNA</h3>
                        <div class="box-body">
                            <div>
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
                                            <thth>FZ JATIM-2</thth>
                                            <thth style="text-align: center">
                                                <?php
                                                echo $jumlahlopvestyna . " LOP";
                                                ?>
                                            </thth>
                                            <thth style="text-align: right">
                                                <?
                                                $viewjumlah     = number_format($jumlahtotalvestyna,0,",",".");
                                                echo $viewjumlah;
                                                ?>
                                            </thth>
                                        </tr>

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

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">MIRO</h3>
                        <div class="box-body">
                            <div>
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
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
</div>