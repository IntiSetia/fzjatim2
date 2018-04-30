<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Form Procurement</h1>
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
                        <h3 class="box-title">Form 1</h3>
                    </div>
                    <form action="<?php echo base_url()."index.php/prov/insert_prov";?>" method="post" enctype="multipart/form-data">
                        <div class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID SPMK</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Ketikkan ID ALPRO" name="id_alpro" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">TGL SPMK</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Ketikkan ND" name="nd" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan Dimulai</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Ketikkan ND Internet" name="nd_inet" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pekerjaan Selesai</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Ketikkan citem" name="citem" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Rekonsiliasi</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Ketikkan kecepatan" name="ked" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">File Rekon</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="">
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
            </div>

            <!-- right column -->
            <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form 2</h3>
                    </div>
                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID PR</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Ketikkan nama pelanggan" name="nama" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Created Date</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Ketikkan kcontact" name="kcontact" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Ketikkan kcontact" name="kcontact" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Ketikkan kcontact" name="kcontact" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Approval</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Ketikkan kcontact" name="kcontact" required/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            </form>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->