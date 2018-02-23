<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Close Ticket (Year to Date)
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
                <label for="inputEmail3" class="col-sm-2 control-label" style="padding-top: 7px;">Date Range </label>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="date1" class="form-control pull-right" id="datepicker" value="<?=date('m/01/Y');?>">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                   <div class="col-sm-5">
                    <div class="form-group">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="date1" class="form-control pull-right" id="datepickerrange" value="<?=date('m/d/Y');?>">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="padding-top: 7px;">All Apro </label>
                  <div class="col-xs-10">
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">-- All Apro --</option>
                      <option>FTTH</option>
                      <option>Cooper</option>
                    </select>
                  </div>
                </div>
                <br>
                <br>
                <div class="form-group" >
                    <label class="col-sm-12 control-label" style="padding-top: 10px; text-align: center;">
                      <input type="submit" name="submit" class="btn btn-primary" value="Done" >
                    </label>
                </div>
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
          </div>

          <div class="box">
              <div class="box-body">
                <!--<div id="chartdiv"></div>-->
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