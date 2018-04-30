<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All Data PSB
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
            <!--<div class="box-body">
               <div class="form-group">
                 <form method="POST" action="echo base_url('index.php/tagihan/cek_listpekerjaan')" >
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
             </div>-->

            <div class="col-xs-12">
                <div class="box">
                    <!--<div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div>
                            <table id="listplan" class="table table-bordered table-hover display nowrap">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Witel</th>
                                    <th>No POTS</th>
                                    <th>No Internet</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>ODP</th>
                                    <th>ONT</th>
                                    <th>STB</th>
                                    <th>Layanan</th>
                                    <th>Jenis Kabel</th>
                                    <th>Panjang Kabel</th>
                                    <th>Tiang</th>
                                    <th>Patchcord</th>
                                    <th>UTP</th>
                                    <th>PVC</th>
                                    <th>2ND STB</th>
                                    <th>Tanggal VA</th>
                                    <th>Tanggal PS</th>
                                    <th>Redaman</th>
                                    <th>Berita Acara</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 0;
                                foreach($psb as $a){
                                    $no++;
                                    ?>
                                    <tr>
                                        <td><?= $no;?></td>
                                        <td><?= $a['wilayah'];?></td>
                                        <td><?= $a['nomor_pots'];?></td>
                                        <td><?= $a['nomor_speedy'];?></td>
                                        <td><?= $a['nama'];?></td>
                                        <td><?= $a['alamat'];?></td>
                                        <td><?= $a['odp'];?></td>
                                        <td><?= $a['ont'];?></td>
                                        <td><?= $a['stb'];?></td>
                                        <td><?= $a['layanan'];?></td>
                                        <td><?= $a['jenis_kabel'];?></td>
                                        <td><?= $a['panjang_kabel'];?></td>
                                        <td><?= $a['tiang'];?></td>
                                        <td><?= $a['patch_cord'];?></td>
                                        <td><?= $a['kabel_utp'];?></td>
                                        <td><?= $a['kabel_pvc'];?></td>
                                        <td><?= $a['stb_kedua'];?></td>
                                        <td><?= $a['tgl_va'];?></td>
                                        <td><?= $a['tgl_ps'];?></td>
                                        <td><?= $a['hasil_cek_redaman'];?></td>
                                        <td><?= $a['ba_rev'];?></td>

                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
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
<!-- /.content-wrapper -->