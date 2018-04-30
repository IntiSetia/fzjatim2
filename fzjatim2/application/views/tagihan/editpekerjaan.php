<?php
    date_default_timezone_set('Asia/Jakarta');
    if($this->session->userdata('position') == 'Admin Maintenance' || $this->session->userdata('nama') == 'TEFANI DIVA WIBOWO' || $this->session->userdata('nama') == 'INTI SETIA NINGTYAS' || $this->session->userdata('nama') == 'ANDRE FIRMAN SAPUTRA' || $this->session->userdata('position') == 'Mgr Shared Service & Performance Jawa Timur 2') {
?>

<?php
    $nakhs = "";
    foreach($nama_khs as $a){
        $nakhs = $a['nama_khs'];
    }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Plan Pekerjaan</h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol> -->
    </section>

    <section class="content">
        <?php
            foreach ($dataallpekerjaan as $a) {
        ?>
        <form action="<?php echo base_url()."index.php/tagihan/edit_pekerjaan";?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!--<div class="box-header with-border">
                        <h3 class="box-title">Form 1</h3>
                    </div>-->
                    
                        <input  class="form-control" type="hidden" value="<?=$a['id'];?>" name="id" required/>

                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <input class="form-control" type="hidden" value="<?php echo $this->session->userdata('username')?>" name="maker"/>
                                    <input class="form-control" type="hidden" value="<?php echo date("Y-m-d");?>" name="tanggal"/>
                                </div>

                                <!--<div class="form-group">
                                    <label class="col-sm-2 control-label">ID</label>
                                </div>-->
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?=$a['pekerjaan'];?>" placeholder="Nama Pekerjaan" name="nama_pekerjaan" required/>
                                    </div>
                                </div>

                                <div class="form-group" id="tot_keb">
                                    <label class="col-sm-2 control-label">Total Kebutuhan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?php
                                            $harga          = $a['harga'];
                                            $tampil_harga   = number_format($harga,0,",",".");
                                            echo $tampil_harga;
                                        ?>" placeholder="Total Kebutuhan" name="harga" required readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="jenis_pekerjaan" required onchange="jenis_pekerjaan" id="je_pekerjaan">
                                        <?php
                                        if ($a['jenis_pekerjaan'] == NULL) {
                                        ?>
                                            <option value="" selected style="text-decoration-color: gainsboro;">Jenis Pekerjaan</option>
                                        <?php
                                        } else {
                                        ?>    
                                            <option value="<?=$a['jenis_pekerjaan']?>" selected style="text-decoration-color: gainsboro;"><?=$a['jenis_pekerjaan'];?></option>
                                            <?php
                                        }
                                        ?>    
                                        <option value="QE Akses">QE Akses</option>
                                        <option value="QE Alpro">QE Alpro</option>
                                        <option value="QE Utilitas">QE Utilitas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

                            <div class="row">
                            <div class="col-md-12" id="real">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">BOQ TA - Telkom</h3>

                                        <div class="box-tools pull-right">
                                           <button type='button' class='btn btn-block btn-primary btn-sm' id="editboq" data-toggle="modal" data-target="#modal-default">EDIT BOQ</button> 
                                        </div>
                                    </div>

                                    <div class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">KHS</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" value="<?=$nakhs?>" placeholder="KHS" name="nama_khs" readonly="readonly"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-body no-padding">
                                        <table class="table table-condensed">
                                            <tr>
                                                <th style="text-align: center">&nbsp;</th>
                                                <th style="text-align: center;">Designator</th>
                                                <!-- <th style="text-align: center; width: 200px;">Material</th>
                                                <th style="text-align: center; width: 200px;">Jasa</th> -->
                                                <th style=" text-align: center;">Volume</th><!-- 
                                                <th style="text-align: center; width: 200px;">Jumlah</th> -->
                                                <th style="text-align: center">&nbsp;</th>
                                            </tr>

                                        <?php
                                            $designator     = $a['id_designator'];
                                            $des            = explode(",", $designator);

                                            $volume         = $a['volume'];
                                            $vol            = explode(",", $volume);

                                            $total_des = 0;
                                            foreach($des as $key) {
                                                $total_des++;
                                            }

                                            /*$asatu          = 1;
                                            $pengulangan    = $total_des + $asatu;*/

                                            for ($i = 0; $i < $total_des ; $i++) {
                                        ?>    

                                            <tr>
                                                <th style="text-align: center;">&nbsp;</th>
                                                <td style="text-align: center;">
                                                    <input class="form-control" type="text" value="<?=$des[$i];?>" name="designator[]" readonly="readonly"/>
                                                </td>
                                                <!-- <td style="width: 200px;"><div id="material">&nbsp;</div></td>
                                                <td style="width: 200px;"><div id="jasa">&nbsp;</div></td> -->
                                                <td style=""><input class="form-control volume" type="text" value="<?=$vol[$i];?>" name="volume[]" readonly="readonly" id="volume"/></td>
                                                <th style="text-align: center;">&nbsp;</th>
                                                <!-- <td style="width: 200px;"><div id="jumlah">&nbsp;</td> -->
                                            </tr>

                                        <?php
                                            }
                                        ?>     

                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>

                                <input type="submit" class="btn btn-primary" style="width: 150px;" value="Edit Plan">
                                <a href="<?php echo base_url()."index.php/tagihan/deleteplan/".$a['id'];?>">
                                    <button type="button" style="display: none;" class="btn btn-danger" style="width: 150px;" id="delete">Delete Plan</button></a>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">NOTIFICATION!</h4>
              </div>
              <div class="modal-body">
                <p>Anda hanya dapat mengubah <b>volume</b> dari BOQ yang ada. Jika Anda ingin mengubah <b>designator</b> yang dibutuhkan. Lakukan <b>delete data</b> lalu, input ulang plan pekerjaan sedari awal.</p>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->                                        
                                            
        </form>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
}
?>
