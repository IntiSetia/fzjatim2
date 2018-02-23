<?php 
    date_default_timezone_set('Asia/Jakarta');
    foreach ($dataallpekerjaan as $a) {
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Rekon Pekerjaan</h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol> -->
    </section>

    <section class="content">
        <form action="<?php echo base_url()."index.php/tagihan/update_rekon";?>" method="post" enctype="multipart/form-data">
        <div class="row">
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
                                    <input class="form-control" type="hidden" value="<?php echo date("Y-m-d");?>" name="tanggal"/>
                                    <input class="form-control" type="hidden" value="<?php echo $a['id'];?>" name="id"/>
                                </div>

                                <!--<div class="form-group">
                                    <label class="col-sm-2 control-label">ID</label>
                                </div>-->

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Project</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="ID Project" name="idp" required value="<?=$a['idp']?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Vestina</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="ID Vestina" name="idv" value="<?=$a['id_vestyna']?>"/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input value="<?=$a['pekerjaan']?>" class="form-control" type="text" placeholder="Nama Pekerjaan" name="nama_pekerjaan" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <select class="js-example-placeholder-single js-states form-control" name="jenis_pekerjaan" required onchange="jenis_pekerjaan" id="je_pekerjaan" >
                                            <?php
                                                if ($a['jenis_pekerjaan'] == NULL) {
                                            ?>
                                                    <option value="" disabled style="text-decoration-color: gainsboro;">Jenis Pekerjaan</option>
                                            <?php
                                                } else {
                                            ?>    
                                                    <option value="<?=$a['jenis_pekerjaan']?>" selected disabled style="text-decoration-color: gainsboro;"><?=$a['jenis_pekerjaan'];?></option>
                                            <?php
                                                }
                                            ?>
                                        <option value="QE Akses">QE Akses</option>
                                        <option value="QE Alpro">QE Alpro</option>
                                        <option value="QE Utilitas">QE Utilitas</option>
                                        </select>
                                    </div>
                                </div>

                                <!--<div class="form-group">
                                    <label class="col-sm-2 control-label" >Nama Mitra</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="nama_mitra" required id="namamitra"/>
                                        <option value="" selected disabled style="text-decoration-color: gainsboro;">Nama Mitra</option>
                                        <option value="PT TELKOM AKSES">PT TELKOM AKSES</option>
                                        <option value="PT GARUDA MITRA SOLUSI">PT GARUDA MITRA SOLUSI</option>
                                        <option value="PT WAHANA ERA SEJAHTERA">PT WAHANA ERA SEJAHTERA</option>
                                        <option value="CV MULTIUSER GLOBAL NETWORK">CV MULTIUSER GLOBAL NETWORK</option>
                                        <option value="KOPEGTEL MALANG">KOPEGTEL MALANG</option>
                                        <option value="PT DUTA ANUGRAH DAMAI SEJAHTERA">PT DUTA ANUGRAH DAMAI SEJAHTERA</option>
                                        <option value="PT LUMINTU">PT LUMINTU</option>
                                        <option value="PT CENTRALINDO PANCA SAKTI">PT CENTRALINDO PANCA SAKTI</option>
                                        <option value="PT SANDHY PUTRAMAKMUR">PT SANDHY PUTRAMAKMUR</option>
                                        <option value="PT SWARNA JAVADWIPA UTAMA">PT SWARNA JAVADWIPA UTAMA</option>
                                        <option value="PT KECUBUNG BORNEO KHATULISTIWA">PT KECUBUNG BORNEO KHATULISTIWA</option>
                                        <option value="PT DIAN KARYA">PT DIAN KARYA</option>
                                        <option value="PT DIBYACIPTA PRIMASOL">PT DIBYACIPTA PRIMASOL</option>
                                        <option value="CV PRIMA ANUGRAH SANTOSO">CV PRIMA ANUGRAH SANTOSO</option>
                                        </select>
                                    </div>
                                </div>-->

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID SPMK</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="ID SPMK" name="id_spmk" value="<?=$a['id_spmk'];?>"/>
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

                            <div class="row">
                            <div class="col-md-12" id="telkom">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Rekon</h3>
                                    </div>

                                    <div class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">KHS</label>
                                                <div class="col-sm-9">
                                                    <select class="js-example-placeholder-single js-states form-control" name="khs" id="khstelkom" required>
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
                                        <table class="table table-condensed">
                                            <tr>
                                                <th style="text-align: center">&nbsp;</th>
                                                <th style="width: 500px; text-align: center;">Designator</th>
                                                <!-- <th style="text-align: center; width: 200px;">Material</th>
                                                <th style="text-align: center; width: 200px;">Jasa</th> -->
                                                <th style="width: 150px; text-align: center;">Volume</th><!-- 
                                                <th style="text-align: center; width: 200px;">Jumlah</th> -->
                                                <th style="text-align: center">&nbsp;</th>
                                            </tr>
                                        </table>

                                        <table class="table table-condensed" id="addDesignator">
                                            <tr>
                                                <th style="text-align: center;">&nbsp;</th>
                                                <td style=" width: 500px; text-align: center;">
                                                    <select class="js-example-placeholder-single js-states form-control designator-select" id="designator" name="designator[]" >

                                                    </select>
                                                </td>
                                                <!-- <td style="width: 200px;"><div id="material">&nbsp;</div></td>
                                                <td style="width: 200px;"><div id="jasa">&nbsp;</div></td> -->
                                                <td style="width: 150px;"><input class="form-control" type="text" name="volume[]" id="volume" onkeyup="myVolume()"  /></td>
                                                <!-- <td style="width: 200px;"><div id="jumlah">&nbsp;</td> -->
                                                <td><span class="fa btn btn-success fa-plus" onclick="addMoreRows();"></span></td>
                                            </tr>
                                        </table>
                                        <div id="addedRows"></div>
                                    </div>
                                </div>
                            </div>
                            </div>

                                                <input type="submit" id="getdesignator" class="btn btn-primary" style="width: 150px;" value="Rekon">
                                                <?php
                                                if ($_alert != NULL) {
                                                    echo "<h5 class='box-title' style='color: green;'>".$_alert."</h5>";
                                                } else {
                                                    echo " ";
                                                }
                                                ?>

        </form>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
}
?>
