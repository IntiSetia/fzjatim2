<?php
date_default_timezone_set("Asia/Jakarta");
?>
<style>
    .hiding{
        display: none ;
    }
    .showing{
        display: block ;
    }
    .selectallnone{
        padding-left: 30px;
        padding-right: 30px;
        padding-top: 5px;
        padding-bottom: 5px;
        color: white;
        margin: 15px;
        height: 50px;
        width: 50px;
        background-color: #3c8dbc ;
        text-decoration: none;
    }
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Input Absen Apel DOW</h1>
    </section>

    <section class="content">
        <form onsubmit=mdy() action="<?php echo base_url() . "index.php/hrperformance/apel_dow"; ?>" method="post"
              enctype="multipart/form-data">
            <div class="row">
                <!-- left column -->
                <div class="col-md-7">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Witel</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder=""
                                               name="witel" value="<?php echo $this->session->userdata('psa');?>" readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tanggal Apel</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="date" placeholder="" name="tanggal" value="" pattern="[A-Za-z]{3}"/>
                                        <!--<input class="form-control" type="input" placeholder="Tuliskan Tanggal Disini" name="tanggal" value="<?php /*echo date('MdY') ; */?>" /><span>Format : bulan(english)tgltahun </span>-->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">&nbsp;</label>
                                    <div class="col-sm-6">

                                        <?php
                                        if ($_alert != NULL) {
                                            echo "<h3 class='box-title' style='color: green;'>" . $_alert . "</h3>";
                                        } else {
                                            echo " ";
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- left column -->
                <div class="col-md-7">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Nama Naker</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <?php
                                $total = count($nama_naker);
                                foreach ($nama_naker as $a) {
                                    ?>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <input type="checkbox" name="nama[]" value="<?php echo $a['nama'];?>">&nbsp;<?php echo $a['nama'];?>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" value="<?php echo $a['nik'];?>" name="nik[]" readonly="readonly">
                                        </td>
                                        <td>
                                            <select class="form-control" style="align-content: right" name="alasan[]"/>
                                                <option value="Masuk">Masuk</option>
                                                <option value="Alpha">Alpha</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Izin">Izin</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
