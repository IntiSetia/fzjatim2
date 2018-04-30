<?php
date_default_timezone_set("Asia/Jakarta");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Upload</h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol> -->
    </section>

    <section class="content">
        <form action="<?php echo base_url() . "index.php/prov/upload"; ?>" method="post"
              enctype="multipart/form-data">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                <!-- right column -->
                <div class="col-md-8">
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
                                        <input class="form-control" type="file" name="evident" />
                                    </div>
                                    <hr>
                                    <label class="col-sm-12 help-block" style="text-anchor: red;">Upload Evident
                                        (namafiletanpa spasi || ekstensi jpg/jpeg/png  || maks: 2 MB)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" style="width: 150px;" value="Submit"/>
                </div>


                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
