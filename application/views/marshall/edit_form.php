<?php
date_default_timezone_set("Asia/Jakarta");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Marshall</h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol> -->
    </section>

    <section class="content">
        <form action="<?php echo base_url() . "index.php/marshall/update/" . $this->uri->segment(3); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <!-- left column -->
                <div class="col-md-7">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Data Detail</h3>
                        </div>
                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tanggal</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="tgl" value="<?php date_default_timezone_set("America/Los_Angeles"); echo date("Y-m-d");?>"
                                               readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="form-group" hidden="hidden">
                                    <label class="col-sm-4 control-label">Marshall</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="marshall"
                                               value="<?= $this->session->userdata('username') ?>"
                                               readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Witel</label>
                                    <div class="col-sm-8">
                                        <select class="js-example-placeholder-single js-states form-control"
                                                name="wilayah">
                                            <option value="<?php echo $value->psa; ?>"><?php echo $value->psa; ?></option>
                                            <option value="">Pilih Witel</option>
                                            <option value="JEMBER">Jember</option>
                                            <option value="KEDIRI">Kediri</option>
                                            <option value="MADIUN">Madiun</option>
                                            <option value="MALANG">Malang</option>
                                            <option value="PASURUAN">Pasuruan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jenis Finding</label>
                                    <div class="col-sm-8">
                                        <select class="js-example-placeholder-single js-states form-control"
                                                name="jenisf" id="jenis_finding">
                                            <option value="<?php echo $value->jenis_finding; ?>"><?php echo $value->jenis_finding; ?></option>
                                            <option value="">Pilih Finding</option>
                                            <option value="Positive Fact Finding">Positive Fact Finding</option>
                                            <option value="Negative Fact Finding">Negative Fact Finding</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" id="jenis_pelanggaran" hidden>
                                    <label class="col-sm-4 control-label">Jenis Pelanggaran</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="jenisp">
                                            <option value="">Pilih Jenis Pelanggaran</option>
                                            <option value="Code of Conduct">Code of Conduct</option>
                                            <option value="Fraud">Fraud</option>
                                            <option value="Safety Culture">Safety Culture</option>
                                            <option value="Quality Installation">Quality Installation</option>
                                            <option value="Disiplin Operasi">Disiplin Operasi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jenis Instalasi</label>
                                    <div class="col-sm-8">
                                        <select class="js-example-placeholder-single js-states form-control"
                                                name="jenisi" id="jenisi">
                                            <option value="<?php echo $value->jenis_instalasi; ?>"><?php echo $value->jenis_instalasi; ?></option>
                                            <option value="">Pilih Jenis Instalasi</option>
                                            <option value="PT1">PT1</option>
                                            <option value="PT2">PT2</option>
                                            <option value="PT3">PT3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" hidden id="PT3">
                                    <label class="col-sm-4 control-label">Temuan</label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Kelenturan Tarikan KU antar Tiang">
                                            Kelenturan Tarikan KU antar Tiang
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Instalasi Accesoris Tiang">
                                            Instalasi Accesoris Tiang
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="StrangeClamp">
                                            StrangeClamp
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Bracket A">
                                            Bracket A
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group" hidden id="PT2">
                                    <label class="col-sm-4 control-label">Temuan</label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="ODP">
                                            ODP
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Bracket A">
                                            Bracket A
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Label ODP">
                                            Label ODP
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="SLACK Kabel (Panjang > 2M)">
                                            SLACK Kabel(Panjang > 2M)
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Ketinggian 423cm">
                                            Ketinggian 423cm
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Menghadap Source Kabel">
                                            Menghadap Source Kabel
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Safety Helmet">
                                            Safety Helmet
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Body Hardness">
                                            Body Hardness
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group" hidden id="PT1">
                                    <label class="col-sm-4 control-label">Temuan</label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Label-DC">
                                            Label-DC
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="S-Clamp">
                                            S-Clamp
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Clamp-Hook">
                                            Clamp-Hook
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Roset">
                                            Roset
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Pacthcord">
                                            Patchcord
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Safety Body Hardness">
                                            Safety Body Hardness
                                        </label>
                                    </div>

                                    <label class="col-sm-4 control-label"></label>
                                    <div class=" col-sm-8 checkbox">
                                        <label>
                                            <input type="checkbox" name="temuan[]" value="Safety Helmet">
                                            Safety Helmet
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Lokasi</label>
                                    <!-- Lokasi -->
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" placeholder="Lokasi" name="lokasi"  id="latitude" value="<?php echo $value->lokasi;?>"/>
                                        <!--<button type="button" class="col-sm-7 btn btn-default btn-sm" onclick="tryGeolocation()">
                                                Ambil Lokasi
                                        </button>-->
                                    </div>
                                </div>

                                <!--<div class="form-group" >
                                    <label class="col-sm-4 control-label">Latitude</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" placeholder="Latitude" name="latitude" id="latitude" readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Longitude</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" placeholder="Longitude" name="longitude"  id="longitude" readonly="readonly"/>
                                    </div>
                                </div>-->

                                <div class="form-group has-warning">
                                    <label class="col-sm-4 control-label">Penemuan</label>
                                    <div class="col-sm-8">
                                            <textarea style="height: 150px;" class="form-control" type="text" placeholder="Penemuan"
                                                      name="penemuan" value="<?php echo $value->penemuan;?>"></textarea>
                                    </div>
                                </div>

                                <div class="form-group has-warning" hidden>
                                    <label class="col-sm-3 control-label"></label>
                                    <label class="col-sm-8 help-block control-label">Format Penulisan Penemuan:
                                        temuan,temuan (tanpaspasi)</label>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-4 control-label">Tindakan Perbaikan</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" placeholder="Tindakan Perbaikan"
                                               name="tindakan" value="<?php echo $value->tindakan_perbaikan;?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">PIC</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" placeholder="PIC" name="pic" value="<?php echo $value->pic;?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Unit</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" placeholder="Unit" name="unit" value="<?php echo $value->unit_marshall;?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Target</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" placeholder="Target" name="target" value="<?php echo $value->target;?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Status</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" placeholder="Status" name="status" value="<?php echo $value->status;?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Catatan</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" placeholder="Catatan"
                                               name="catatan" value="<?php echo $value->catatan;?>"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- right column -->
                <div class="col-md-5">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Data Evident</h3>
                        </div>
                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Upload Gambar</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="file" name="evident"/>
                                    </div>
                                    <hr>
                                    <label class="col-sm-12 help-block" style="text-anchor: red;">Upload Evident
                                        (namafiletanpa spasi || ekstensi jpg/jpeg/png  || maks: 2 MB)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" style="width: 150px;" value="Submit"/>
                    <?php
                    /*if ($_alert != NULL) {
                        echo "<h5 class='box-title' style='color: green;'>" . $_alert . "</h5>";
                    } else {
                        echo " ";
                    }*/
                    ?>
                </div>


                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>

</script>
