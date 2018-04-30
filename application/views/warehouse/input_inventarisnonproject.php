<?php date_default_timezone_set('Asia/Jakarta');?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--<h1>Form Provisioning</h1>-->
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol> -->
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">From Data Inventaris Non Project</h3>
                    </div>
                    <form action="<?php echo base_url() . "index.php/wh/input_inventnonpro"; ?>" method="post"
                          enctype="multipart/form-data">
                        <div class="form-horizontal">

                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Witel</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-placeholder-single form-control" name="witel" id="witel" required/>
                                            <option value="">Pilih Witel</option>
                                            <option value="MADIUN">Madiun</option>
                                            <option value="PASURUAN">Pasuruan</option>
                                            <option value="MALANG">Malang</option>
                                            <option value="JEMBER">Jember</option>
                                            <option value="KEDIRI">Kediri</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">STO</label>
                                    <div class="col-sm-6">
                                        <select class="js-example-placeholder-single form-control" name="sto" id="sto" required/>

                                        </select>
                                    </div>
                                    <button type="button" class="col-sm-2 btn btn-default btn-sm" data-toggle="modal" data-target="#modal-addsto">
                                        Add STO
                                    </button>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Barang </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Nama Barang"
                                               name="namabarang" id="" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Group</label>
                                    <div class="col-sm-6">
                                        <select class="js-example-placeholder-single form-control" name="barang" id="barang" required/>
                                            <option value="">Pilih Group</option>
                                            <?php
                                                foreach ($barang as $b){
                                                    echo "<option value='".$b['barang']."'>".$b['barang']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="button" class="col-sm-2 btn btn-default btn-sm" data-toggle="modal" data-target="#modal-addbarang">
                                        Add Group
                                    </button>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Penanggungjawab</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Nama Penanggungjawab"
                                               name="penanggung" id="" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Jumlah</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" placeholder="Jumlah Barang"
                                               name="jumlah" id="" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Serial Number</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Serial Number Barang"
                                               name="sn" id=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">BA Serah Terima </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" name="ba_serah_terima">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <p class="help-block">Format: jpg || pdf.</p>
                                    </div>
                                </div>


                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <?php
                                        if ($_alert != NULL) {
                                            echo "<b><h5 class='box-title' style='color: green;'>" . $_alert . "</h5></b>";
                                        } else {
                                            echo " ";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-addsto">
            <div class="modal-dialog">
                <form action="<?php echo base_url() . "index.php/wh/addsto"; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Data STO</h4>
                        </div>

                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Witel</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="nama_witel" id="witel" required/>
                                        <option value="">Pilih Witel</option>
                                        <option value="MADIUN">Madiun</option>
                                        <option value="PASURUAN">Pasuruan</option>
                                        <option value="MALANG">Malang</option>
                                        <option value="JEMBER">Jember</option>
                                        <option value="KEDIRI">Kediri</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama STO</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Nama STO (HURUF CAPITAL)"
                                               name="nama_sto" id="" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-addbarang">
            <div class="modal-dialog">
                <form action="<?php echo base_url() . "index.php/wh/addbarang"; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Data Group</h4>
                        </div>

                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Grouping</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Nama Grouping (Awali dengan huruf besar. Ex: Printer)"
                                               name="nama_barang" id="" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
</div>