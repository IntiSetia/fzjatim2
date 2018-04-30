<?php date_default_timezone_set('Asia/Jakarta');?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Input Pekerjaan

            <button type="button" id="getplan" class="btn btn-primary" style="width: 150px;" value="Get From Plan"><b>Get From Plan</b></button>
            <button type="button" id="insidentil" class="btn btn-primary" style="width: 150px; display: none;" value="Insidentil"><b>Insidentil</b></button>

        </h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol> -->
    </section>

    <section class="content">
        <form action="<?php echo base_url()."index.php/tagihan/add_pekerjaan";?>" method="post" enctype="multipart/form-data">
            <div class="row" id="planpekerjaan" hidden="hidden">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!--<div class="box-header with-border">
                            <h3 class="box-title">Form 1</h3>
                        </div>-->
                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <input class="form-control" type="hidden" value="<?php echo $this->session->userdata('username')?>" name="maker"/>
                                    <input class="form-control" type="hidden" value="<?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    echo date("Y-m-d h:m:s");
                                    ?>" name="tanggal"/>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="jenis_pekerjaan" id="jenis">
                                            <option value="" selected disabled style="text-decoration-color: gainsboro;">Jenis Pekerjaan</option>
                                            <?php
                                            if ($this->session->userdata('tipe_user') == "construction") {
                                                ?>
                                                <option value="HEM">HEM</option>
                                                <option value="Node B">Node B</option>
                                                <option value="PT 2">PT 2</option>
                                                <option value="PT 3">PT 3</option>
                                                <option value="STTF">STTF</option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="QE Akses">QE Akses</option>
                                                <option value="QE Recovery">QE Recovery</option>
                                                <option value="Relokasi Utilitas">Relokasi Utilitas</option>
                                                <option value="Gamas">Gamas</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" >Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="nama_mitra" id="plan_pek_baru"/>

                                        </select>
                                    </div>
                                </div>

                                <!--<div class="form-group">
                                    <label class="col-sm-2 control-label">File Rekon</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="">
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="datainsidentil">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!--<div class="box-header with-border">
                            <h3 class="box-title">Form 1</h3>
                        </div>-->
                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <input class="form-control" type="hidden" value="<?php echo $this->session->userdata('username')?>" name="maker"/>
                                    <input class="form-control" type="hidden" value="<?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    echo date("Y-m-d h:m:s");
                                    ?>" name="tanggal"/>
                                </div>

                                <!--<div class="form-group">
                                    <label class="col-sm-2 control-label">ID</label>
                                </div>-->

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Witel</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder=""
                                               name="witel" value="<?php echo $this->session->userdata('psa');?>" readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Project</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="ID Project" name="idp" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Nama Pekerjaan" name="nama_pekerjaan" id="nama_pekerjaan" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <select class="js-example-placeholder-single js-states form-control" name="jenis_pekerjaan" required onchange="jenis_pekerjaan" id="je_pekerjaan">
                                            <option value="" style="text-decoration-color: gainsboro;">Jenis Pekerjaan</option>
                                            <?php
                                            if ($this->session->userdata('tipe_user') == "construction") {
                                                ?>
                                                <option value="HEM">HEM</option>
                                                <option value="Node B">Node B</option>
                                                <option value="PT 2">PT 2</option>
                                                <option value="PT 3">PT 3</option>
                                                <option value="STTF">STTF</option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="QE Akses">QE Akses</option>
                                                <option value="QE Recovery">QE Recovery</option>
                                                <option value="Relokasi Utilitas">Relokasi Utilitas</option>
                                                <option value="Gamas">Gamas</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Vestina</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="ID Vestina" name="idv"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID SPMK</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="ID SPMK" name="idspmk" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pengawas Lapangan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Pengawas Lapangan" name="waspang" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" >Nama Mitra</label>
                                    <div class="col-sm-10">
                                        <select class="js-example-placeholder-single js-states form-control" name="nama_mitra" required id="namamitra"/>
                                        <?php
                                        if ($this->session->userdata('psa') == "JEMBER") {
                                            ?>
                                            <option value="" selected disabled style="text-decoration-color: gainsboro;">Nama Mitra</option>
                                            <option value="PT TELKOM AKSES">PT TELKOM AKSES</option>
                                            <option value="PT CAMAR ERA MANDRI">PT CAMAR ERA MANDRI</option>
                                            <option value="KOPEGTEL CAMAR JEMBER">KOPEGTEL CAMAR JEMBER</option>
                                            <option value="KOPEGTEL BANYUWANGI">KOPEGTEL BANYUWANGI</option>
                                            <option value="PT SEMERU AGUNG MANDIRI">PT SEMERU AGUNG MANDIRI</option>
                                            <option value="CV KARYA AGUNG MANDIRI">CV KARYA AGUNG MANDIRI</option>
                                            <option value="PT PAS ADITAMA">PT PAS ADITAMA</option>
                                            <option value="PT ELKOKAR TIMUR">PT ELKOKAR TIMUR</option>
                                            <option value="PT SWARNA JAVADWIPA UTAMA">PT SWARNA JAVADWIPA UTAMA</option>
                                            <?php
                                        } else if ($this->session->userdata('psa') == "MALANG") {
                                            ?>
                                            <option value="" selected disabled
                                                    style="text-decoration-color: gainsboro;">Nama Mitra
                                            </option>
                                            <option value="PT TELKOM AKSES">PT TELKOM AKSES</option>
                                            <option value="PT GARUDA MITRA SOLUSI">PT GARUDA MITRA SOLUSI</option>
                                            <option value="PT WAHANA ERA SEJAHTERA">PT WAHANA ERA SEJAHTERA</option>
                                            <option value="CV MULTIUSER GLOBAL NETWORK">CV MULTIUSER GLOBAL
                                                NETWORK
                                            </option>
                                            <option value="KOPEGTEL MALANG">KOPEGTEL MALANG</option>
                                            <option value="PT DUTA ANUGRAH DAMAI SEJAHTERA">PT DUTA ANUGRAH DAMAI
                                                SEJAHTERA
                                            </option>
                                            <option value="PT LUMINTU">PT LUMINTU</option>
                                            <option value="PT CENTRALINDO PANCA SAKTI">PT CENTRALINDO PANCA SAKTI
                                            </option>
                                            <option value="PT SANDHY PUTRAMAKMUR">PT SANDHY PUTRAMAKMUR</option>
                                            <option value="PT SWARNA JAVADWIPA UTAMA">PT SWARNA JAVADWIPA UTAMA
                                            </option>
                                            <option value="PT KECUBUNG BORNEO KHATULISTIWA">PT KECUBUNG BORNEO
                                                KHATULISTIWA
                                            </option>
                                            <option value="PT DIAN KARYA">PT DIAN KARYA</option>
                                            <option value="PT DIBYACIPTA PRIMASOL">PT DIBYACIPTA PRIMASOL</option>
                                            <option value="CV PRIMA ANUGRAH SANTOSO">CV PRIMA ANUGRAH SANTOSO
                                            </option>
                                            <option value="CV PRIMA ANUGRAH SANTOSO">PT SEMERU AGUNG MANDIRI
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <!--<div class="form-group">
                                    <label class="col-sm-2 control-label">File Rekon</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="">
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" hidden="hidden" id="boqtelkom">
                <div class="col-md-12" id="telkom">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">BOQ TA - Telkom</h3>
                        </div>

                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">KHS</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="khs" id="khstelkom">
                                            <option value="" disabled selected>Pilih KHS</option>
                                            <?php
                                            foreach($khstelkom as $b){
                                                echo "<option value=".$b->id_khs.">".$b->nama_khs."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-body no-padding">
                            <table class="table table-condensed" id="addDesignator">
                                <tr>
                                    <th style="text-align: center;">&nbsp;</th>
                                    <th style="text-align: center;">Designator</th>
                                    <th style="text-align: center;">Material</th>
                                    <th style="text-align: center;">Jasa</th>
                                    <th style="text-align: center;">Vol Material</th>
                                    <th style="text-align: center;">Vol Jasa</th>
                                    <th style="text-align: center;">Jumlah</th>
                                    <th style="text-align: center;">&nbsp;</th>
                                    <th style="text-align: center;">&nbsp;</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center; width: 50px">&nbsp;</th>
                                    <td style="text-align: center; width: 284px">
                                        <select class="js-example-placeholder-single js-states form-control designator-select" pos="0" id="designator" name="designator[]" >
                                        </select>
                                    </td>
                                    <td style="width: 230px; text-align: center;"><input style="text-align: center;" class="form-control" type="text" pos="0" name="material" id="material0" readonly="readonly" /></td>
                                    <td style="width: 200px; text-align: center;"><input style="text-align: center;" class="form-control" type="text" pos="0" name="jasa" id="jasa0" readonly="readonly" /></td>
                                    <td style="width: 214px; text-align: center;"><input style="text-align: center;" class="form-control volume" type="text" pos="0"  name="volume[]" id="volume"  /></td>
                                    <!--<td style="width: 214px; text-align: center;"><input style="text-align: center;" class="form-control volumemat" type="text" pos="0"  name="volumemat[]" id="volumemat"  /></td>
                                    <td style="width: 214px; text-align: center;"><input style="text-align: center;" class="form-control volumejas" type="text" pos="0"  name="volumejas[]" id="volumejas"/></td>-->
                                    <td style="width: 214px; text-align: center;"><input style="text-align: center;" class="form-control" type="text" name="jumlah" id="jumlah0" readonly="readonly" value="0"/></td>
                                    <td><span class="fa btn btn-success fa-plus" onclick="addMoreRows3();"></span></td>
                                    <th style="text-align: center">&nbsp;</th>
                                    <th style="text-align: center">&nbsp;</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" hidden="hidden" id="boqmitra">
                <div class="col-md-12" id="telkom">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">BOQ TA - Mitra</h3>
                        </div>

                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">KHS</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="khsmitra" id="khsmitra">
                                            <option value="" disabled selected>Pilih KHS</option>
                                            <?php
                                            foreach($khsmitra as $b){
                                                echo "<option value=".$b->id_khs.">".$b->nama_khs."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-body no-padding">
                            <table class="table table-condensed" id="addDesignatorMitra">
                                <tr>
                                    <th style="text-align: center;">&nbsp;</th>
                                    <th style="text-align: center;">Designator</th>
                                    <th style="text-align: center;">Material</th>
                                    <th style="text-align: center;">Jasa</th>
                                    <th style="text-align: center;">Volume</th>
                                    <th style="text-align: center;">Jumlah</th>
                                    <th style="text-align: center;">&nbsp;</th>
                                    <th style="text-align: center;">&nbsp;</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center; width: 50px">&nbsp;</th>
                                    <td style="text-align: center; width: 284px">
                                        <select class="js-example-placeholder-single js-states form-control designator-select-mitra" pos="0" id="designatormitra" name="designatormitra[]" >
                                        </select>
                                    </td>
                                    <td style="width: 230px; text-align: center;"><input style="text-align: center;" class="form-control" type="text" pos="0" name="materialmitra" id="materialmitra0" readonly="readonly" /></td>
                                    <td style="width: 200px; text-align: center;"><input style="text-align: center;" class="form-control" type="text" pos="0" name="jasamaterial" id="jasamitra0" readonly="readonly" /></td>
                                    <td style="width: 214px; text-align: center;"><input style="text-align: center;" class="form-control volumemitra" type="text" pos="0"  name="volumemitra[]" id="volumemitra"  /></td>
                                    <td style="width: 214px; text-align: center;"><input style="text-align: center;" class="form-control" type="text" name="jumlahmitra" id="jumlahmitra0" readonly="readonly" /></td>
                                    <td><span class="fa btn btn-success fa-plus" onclick="addMoreRowsMitra();"></span></td>
                                    <th style="text-align: center">&nbsp;</th>
                                    <th style="text-align: center">&nbsp;</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-primary" style="width: 150px;" value="Submit Pekerjaan">
            <!--<button type="submit" class="btn btn-default" data-toggle="modal" data-target="#modal-default" id="inputplan" style="width: 150px;" value="Buat Plan"> Buat Plan
            </button>-->
            <?php
            if ($_alert != NULL) {
                echo "<b><h5 class='box-title' style='color: green;'>".$_alert."</h5></b>";
            } else {
                echo " ";
            }
            ?>

            <!--<div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Default Modal</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>-->

        </form>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
