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
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol> -->
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
                                               name="tanggal" value="<?php echo date('MdY') ; ?>" /><span>Format : bulan(english)tgltahun </span>
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
                            <table class="table table-condensed">

                                <?php
                                $total = count($nama_naker);
                                foreach ($nama_naker as $a) {
                                    ?>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <fieldset id="group_1">
                                            <input type="checkbox" id="1<?=$a['nik']?>" name="nama[]" value="<?=$a['nama']?>" onchange="hidereason(<?=$a['nik']?>) ">
                                            <input class="form-control" type="hidden" value="<?=$a['nik']?>" name="nik[]"/>
                                            <?=$a['nama']?>
                                            </fieldset>
                                        </td>
                                        <td>
                                            <select class="js-example-placeholder-single js-states form-control" style="width: 450px; align-content: right" name="alasan[]" id="<?=$a['nik']?>"/>
                                                <option value="Masuk" >Masuk</option>
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

                        <!-- /.box-body -->
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- /.box -->
                </div>
            </div>

<!--            <input type="submit" id="submit" class="btn btn-primary" style="width: 150px;" value="Submit">-->
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
    $(document).ready( function() {

        // Select all
        $("#select_all").click( function() {
            $("#" + $(this).attr('rel') + " INPUT[type='checkbox']").attr('checked', true);
            $('.reason').addClass("showing");
            $('.reason').removeClass("hiding");
            return false;
        });
        // Select none
        // $('#select_none').click( function() {
        //     $("#" + $(this).attr('rel') + " INPUT[type='checkbox']").attr('checked', false);
        //     $('.reason').addClass("showing");
        //     $('.reason').removeClass("hiding");
        //     return false;
        // });
});
    function hidereason(nik)
    {
        if (this.checked == true) {
            $('#' + nik).addClass("showing");
            $('#' + nik).removeClass("hiding");
        }
        else{
            $('#' + nik).addClass("hiding");
            $('#' + nik).removeClass("showing");


        }

    }


</script>
<!-- /.content-wrapper -->