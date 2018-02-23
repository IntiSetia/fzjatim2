 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Form Update Target Revenue PT2</h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>

    <section class="content">
      <div class="row">
        <form action="<?php echo base_url()."index.php/revtarget/tambah_target_pt2";?>" method="post" enctype="multipart/form-data">
        <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Target Revenue PT2 IDR <b><?= $rev;?></b> M</h3>
            </div>
              <div class="box-body">
              <div class="form-group">
                  <label>Input Target Revenue</label>
                  <input class="form-control" type="text" placeholder="Ketikkan jumlah target revenue migration dalam satuan juta" name="target" required/>
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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