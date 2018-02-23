<?php date_default_timezone_set('Asia/Jakarta');?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Input Pekerjaan
            &nbsp;&nbsp;&nbsp;<button id="getplan" type="submit" class="btn btn-primary" style="width: 125px;"><b>GET FROM PLAN</b></button></h1>
        <ol class="breadcrumb">
          
        </ol>
    </section>

    <section class="content">
        
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary" hidden="hidden" id="jenis_pekerjaan">
                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Pekerjaan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="" id="jenis_pekerjaan">
                                        <option value="" selected disabled style="text-decoration-color: gainsboro;">Jenis Pekerjaan</option>
                                        <option value="QE Akses">QE Akses</option>
                                        <option value="QE Alpro">QE Alpro</option>
                                        <option value="QE Recovery">QE Recovery</option>
                                        <option value="QE Utilitas">QE Utilitas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" id="planpekerjaan" hidden>
                                <label class="col-sm-2 control-label" >Plan Pekerjaan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="" id="plan_pek_baru">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>    
                
        <div class="row" id="alldataproject">
            <!-- left column -->
            <div class="col-md-12">        
                <form action="<?php echo base_url()."index.php/tagihan/add_pekerjaan";?>" method="post" enctype="multipart/form-data" novalidate>
                <div class="box box-primary" >
                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <input class="form-control" type="hidden" value="<?php echo $this->session->userdata('username')?>" name="maker"/>
                                    <input class="form-control" type="hidden" value="<?php echo date("Y-m-d");?>" name="tanggal"/>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Project</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="ID Project" name="idp" value="">
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Vestina</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="ID Vestina" name="idv" value="">
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Nama Pekerjaan" name="nama_pekerjaan" value="">
                                        </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Pekerjaan</label>
                                        <div class="col-sm-10">
                                            <select class="js-example-placeholder-single js-states form-control" name="jenis_pekerjaan" required onchange="jenis_pekerjaan" id="je_pekerjaan">
                                                <option value="">Jenis Pekerjaan</option>
                                                <option value="QE Akses">QE Akses</option>
                                                <option value="QE Alpro">QE Alpro</option>
                                                <option value="QE Recovery">QE Recovery</option>
                                                <option value="QE Utilitas">QE Utilitas</option>
                                            </select>
                                        </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pengawas Lapangan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Pengawas Lapangan" name="pengawas_lapangan" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" >Nama Mitra</label>
                                    <div class="col-sm-10">
                                        <select class="js-example-placeholder-single js-states form-control" name="nama_mitra" required id="namamitra">
                                            <option value="" selected disabled>Nama Mitra</option>
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
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID SPMK</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="ID SPMK" name="id_spmk" />
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

                        <div class="row" id="boqtelkom" hidden="">
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
                                        <table class="table table-condensed" id="addDesignator">
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
                                                <th style="text-align: center;">&nbsp;</th>
                                                <td style="text-align: center;">
                                                    <select class="js-example-placeholder-single js-states form-control designator-select" id="designator" name="designator[]" >
                                                    </select>
                                                </td>
                                                <td style="width: 230px; text-align: center;"><input style="text-align: center;" class="form-control" type="text" name="material" id="material" readonly="readonly" /></td>
                                                <td style="width: 200px; text-align: center;"><input style="text-align: center;" class="form-control" type="text" name="jasa" id="jasa" readonly="readonly" /></td>
                                                <td style="width: 214px; text-align: center;"><input style="text-align: center;" class="form-control volume" type="text" name="volume[]" id="volume" onkeyup="myTotal()"  /></td>
                                                <td style="width: 214px; text-align: center;"><input style="text-align: center;" class="form-control" type="text" name="jumlah" id="jumlah" readonly="readonly" /></td>
                                                <td><span class="fa btn btn-success fa-plus" onclick="addMoreRows2();"></span></td>
                                                <th style="text-align: center">&nbsp;</th>
                                                <th style="text-align: center">&nbsp;</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="boqmitra" hidden="">
                            <div class="col-md-12" id="mitra">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">BOQ TA - Mitra</h3>
                                    </div>

                                    <div class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">KHS</label>
                                                <div class="col-sm-9">
                                                    <select class="js-example-placeholder-single js-states form-control" name="khsmitra" id="khsmitra" required>
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
                                                    <select class="js-example-placeholder-single js-states form-control designator-select" id="designatormitra" name="designatormitra[]" >
                                                    </select>
                                                </td>
                                                <td style="width: 230px; text-align: center;"><input style="text-align: center;" class="form-control" type="text" name="material" id="material" readonly="readonly" /></td>
                                                <td style="width: 200px; text-align: center;"><input style="text-align: center;" class="form-control" type="text" name="jasa" id="jasa" readonly="readonly" /></td>
                                                <td style="width: 214px; text-align: center;"><input style="text-align: center;" class="form-control volume" type="text" name="volumemitra[]" id="volume" onkeyup="myTotal()"  /></td>
                                                <td style="width: 214px; text-align: center;"><input style="text-align: center;" class="form-control" type="text" name="jumlah" id="jumlah" readonly="readonly" /></td>
                                                <td><span class="fa btn btn-success fa-plus" onclick="addMoreRowsMitra();"></span></td>
                                                <th style="text-align: center">&nbsp;</th>
                                                <th style="text-align: center">&nbsp;</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary" style="width: 175px;"> Buat Pekerjaan </button>
                            <?php
                            if ($_alert != NULL) {
                                echo "<h5 class='box-title' style='color: green;'>".$_alert."</h5>";
                            } else {
                                echo " ";
                            }
                            ?>
                        </div>
                        </form>
        
    </div>
    </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

