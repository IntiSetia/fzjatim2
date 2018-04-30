<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Masukkan No SC</h1>
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
                    <div class="form-horizontal">
                        <div class="box-body">
                            <form action="<?php echo base_url()."index.php/wh/get_sc";?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nomor SC</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" placeholder="Masukkan No SC" name="sc" id="sc" required/>
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" name="submit" class="btn btn-primary" id="cari_sc">Search</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--/.col (right) -->
            </div>
        </div>
        <!-- /.row -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->