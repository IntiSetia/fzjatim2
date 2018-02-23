 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Rekon PSB
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
            <div style="overflow-x:auto;">
              <table id="example" class="display" width="100%" cellspacing="0" class="table table-bordered table-hover" >
                <thead>
                <tr>
                  <th>STO</th>
                  <th>TARGET (Sesuai Sistem)</th>
                  <th>REALISASI</th>
                  <th>NOK (Sesuai Sistem)</th>
                </tr>
              </thead>
              <tbody>

                <?php
                  $no = 0;
                      foreach($target as $p){
                        $no++;

                  ?>
                  <tr>
                    <td><?= $p['sto'];?></td>
                    <td><?= $p['total'];?></td>
                    <td></td>
                    <td></td>
                  </tr>
                <?php 
                      }
                ?>

              </tbody>
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