<?php
date_default_timezone_set("Asia/Jakarta");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Input Absen Apel DOW</h1>
    </section>

    <section class="content">
        <form onsubmit=mdy() action="<?php echo base_url() . "index.php/hrperformance/apel_dowe"; ?>" method="post"
              enctype="multipart/form-data">
            <div class="row">
                <!-- left column -->
                <div class="col-md-7">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <input class="form-control" type="hidden"
                                           value="<?php echo $this->session->userdata('nama') ?>" name="maker"/>
                                    <input class="form-control" type="hidden"
                                           value="<?php echo date("MdY"); ?>" name="tanggal"/>
                                </div>

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
                                        <!--                                        <input class="form-control" type="date" placeholder=""
                                                                                       name="tgl_apel" value="" pattern="[A-Za-z]{3}"/>-->
                                        <input class="form-control" type="input" placeholder="Tuliskan Tanggal Disini"
                                               name="tgl_apel" value="<?php echo date('MdY') ; ?>" /><span>Format : bulan(english)tgltahun </span>
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

                                <!--<div class="form-group">
                                    <label class="col-sm-4 control-label">Posisi</label>
                                    <div class="col-sm-3">
                                        <select class="js-example-placeholder-single js-states form control">
                                            <?php
                                /*                                            foreach ($posisi as $b) {
                                                                                echo "<option value=" . $b['position_name'] . ">" . $b['position_name'] . "</option>";
                                                                            }
                                                                            */?>
                                        </select>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Nama Naker</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="form-horizontal">
                                <div class="box-body" id="addedReason">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Pegawai</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-placeholder-single js-states form-control"
                                                    name="khs" id="khstelkom" required>
                                                <?php
                                                foreach ($nama_naker as $p) {
                                                    echo "<option value=".$p['nik'].">".$p['nama']."</option>";
                                                }
                                                ?>
                                                <option value=""  selected>Pilih Pegawai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Alasan</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-placeholder-single js-states form-control"
                                                    name="khs" id="khstelkom" required>
                                                <option value=""  selected>Alpha</option>
                                                <option value=""  selected>Sakit</option>
                                                <option value=""  selected>Ijin</option>
                                                <option value=""  selected>Alasan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="text-align: center;">
                                        <span class="fa btn btn-success fa-plus" onclick="addMoreReason();"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>

            <input type="submit" id="submit" class="btn btn-primary" style="width: 150px;" value="Submit">
            <!--<button type="submit" class="btn btn-default" data-toggle="modal" data-target="#modal-default" id="inputplan" style="width: 150px;" value="Buat Plan"> Buat Plan
            </button>-->
            <?php
            if ($_alert != NULL) {
                echo "<h5 class='box-title' style='color: green;'>" . $_alert . "</h5>";
            } else {
                echo " ";
            }
            ?>

        </form>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">

</script>