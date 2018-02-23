
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List All Pekerjaan
            <!--<small>advanced tables</small>-->
        </h1>
        <!--<ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Tables</a></li>
          <li class="active">Data tables</li>
        </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

             <!-- <div class="box-body">
                <div class="form-group">
                  <form method="POST" action="<?php echo base_url('index.php/tagihan/cek_listpekerjaan')?>" >
                    <div class="col-sm-3">
                      <div class="form-group">
                        <select class="form-control select2" style="width: 100%;" name="mitra">
                            <option>Nama Mitra</option>
                            <option value="PT Telkom Akses">TA</option>
                            <option value="Non Telkom Akses">PA</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" name="submit" class="btn btn-primary" value="Submit" >
                    </div>
                  </form>
                </div>
              </div> -->
            
            <div class="col-xs-12">
                <div class="box">
                    <!--<div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div>
                            <table id="example" class="table table-bordered table-hover display nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Project</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Nama Mitra</th>
                                    <!-- <th>Status Dokumen Tagihan</th>
                                    <th>Aksi</th> -->
                                    <th>BOQ Realisasi</th>
                                    <th>Nomor PR</th>
                                    <th>BA Realisasi</th>
                                    <th>BAUT</th>
                                    <th>No PO</th>
                                    <th>BAST</th>
                                    <th>Status Invoice</th>
                                    <th>Status Faktur Pajak</th>
                                    <th>Status GR</th>
                                    <th>Status MIRO</th>
                                    <th>Verifikasi Tagihan</th>
                                    <th>Status Tagihan</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 0;
                                foreach($listpekerjaan as $a){
                                    $no++;
                                    $id   = $a['id'];
                                    ?>
                                    <tr>
                                        <td><?= $no;?></td>
                                        <td><?= $a['idp'];?></td>
                                        <td><?= $a['pekerjaan'];?></td>
                                        <td><?= $a['jenis_pekerjaan'];?></td>
                                        <td><?= $a['mitra'];?></td>
                                        <td style="text-align: center;">
                                            <?php
                                                $realisasi      = $a['id_designatorrealisasi'];
                                                $boq_realisasi  = $a['boq_real'];
                                                if ($realisasi == NULL) {
                                            ?>
                                                    <a href="<?php echo base_url()."index.php/tagihan/rekon/".$id;?>">Rekon</a>
                                            <?php
                                                } else {
                                            ?>
                                                    <a href="<?php echo base_url()."index.php/tagihan/viewboq/".$id;?>">View BOQ</a>
                                            <?php
                                                    /*echo $a['boq_real'];*/
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php
                                                $nomor_pr   = $a['nomor_pr'];
                                                if ($nomor_pr == NULL) {
                                            ?>
                                                    <button type='button' class='btn btn-block btn-primary btn-sm btn-pr' id-pr='<?=$id;?>' id="btn-pr">UPDATE</button>
                                            <?php
                                                } else {
                                                    echo $nomor_pr;
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php
                                                $ba_realisasi   = $a['ba_realisasi'];
                                                if ($ba_realisasi == NULL) {
                                            ?>
                                                    <button type='button' class='btn btn-block btn-primary btn-sm' data-toggle='modal' data-target='#modal-approval'>UPLOAD</button>
                                            <?php
                                                } else {
                                            ?>
                                                    <button type='button' class='btn btn-block btn-success btn-sm' data-toggle='modal' data-target='#modal-approval'>VIEW</button>
                                            <?php
                                                    /*echo $a['boq_real'];*/
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php
                                                $baut   = $a['baut'];
                                                if ($baut == NULL) {
                                            ?>
                                                    <button type='button' class='btn btn-block btn-primary btn-sm' data-toggle='modal' data-target='#modal-approval'>UPLOAD</button>
                                            <?php
                                                } else {
                                            ?>
                                                    <button type='button' class='btn btn-block btn-success btn-sm' data-toggle='modal' data-target='#modal-approval'>VIEW</button>
                                            <?php
                                                    /*echo $a['boq_real'];*/
                                                }
                                            ?>
                                        </td>
                                        <td><?= $a['no_po']?></td>
                                        <td><?= $a['bast']?></td>
                                        <td><?= $a['status_invoice']?></td>
                                        <td><?= $a['status_faktur_pajak']?></td>
                                        <td><?= $a['status_gr']?></td>
                                        <td><?= $a['status_miro']?></td>
                                        <td><?= $a['verifikasi_tagihan']?></td>
                                        <td><?= $a['status_tagihan_mitra']?></td>
                                        <td style="text-align: center;"><a href="<?= base_url('index.php/tagihan/editpekerjaan/'.$a['id'])?>"><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>

                                <div class="modal fade" id="modal-nomor_pr">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <form action="" method="post" enctype="multipart/form-data" id="form-pr">  
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">UPDATE NOMOR PR</h4>
                                      </div>
                                      <div class="modal-body">
                                         <div class="form-horizontal">
                                                    <div class="form-group">
                                                            <label class="col-sm-2 control-label" style="width: 150px;">Nomor PR</label>
                                                            <div class="col-sm-10" style="width: 450px;">
                                                                <input class="form-control" type="text" placeholder="Nomor PR" name="nomor_pr"/>
                                                            </div>
                                                    </div>
                                          </div>          
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                      </div>
                                      </form>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->


                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper