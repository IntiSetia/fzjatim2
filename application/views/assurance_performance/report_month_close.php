<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Open Ticket (Month)
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
        <div class="col-xs-12">
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">
                <div class="form-group">
                
                  <label for="inputEmail3" class="col-sm-2 control-label" style="padding-top: 7px;">Bulan</label>

                <form method="POST" action="" >
                  <div class="col-sm-8">
                    <input type="text" name="sn" placeholder="No NTE" class="form-control">
                  </div>
                  <div class="col-sm-2">
                    <input type="submit" name="submit" class="btn btn-primary" value="Search" >
                  </div>
                </form>
                </div>
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
          </div>

          <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Serial Number</th>
                  <th>Nama Vendor</th>
                </tr>
                </thead>
                <tbody class="data">
                  <?php
                    $no = 0;
                        foreach($data_sn as $u){
                          $no++;

                    ?>
                    <tr>
                      <td><?= $no;?></td>
                      <td><?= $u['sn'];?></td>
                      <td><?= $u['nama_vendor'];?></td>
                    </tr>
                    <?php
                    }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Serial Number</th>
                  <th>Nama Vendor</th>
                </tr>
                </tfoot>
              </table>
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