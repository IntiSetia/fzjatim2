<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Close Assurance Performance
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
          <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <div style="overflow-x: auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead> 
                  <tr>
                    <th>No.</th>
                    <th>Incident</th>
                    <th>Customer Name</th>
                    <th>Summary</th>
                    <th>Owner Group</th>
                    <th>Owner</th>
                    <th>Last Updated Work Log</th>
                    <th>Last Work Log Date</th>
                    <th>Source</th>
                    <th>Segment</th>
                    <th>Channel</th>
                    <th>Customer Segment</th>
                    <th>Service ID</th>
                    <th>Service No</th>
                    <th>Service Type</th>
                    <th>Top Priority</th>
                    <th>SLG</th>
                    <th>Technology</th>
                    <th>Datek</th>
                    <th>RK Name</th>
                    <th>Induk Gamas</th>
                    <th>Reported Date</th>
                    <th>Tanggal Open</th>
                    <th>TTR Nasional</th>
                    <th>TTR Regional</th>
                    <th>TTR Witel</th>
                    <th>TTR Mitra</th>
                    <th>TTR Agent</th>
                    <th>Status</th>
                    <th>OSM Resolved Code</th>
                    <th>Last Update Ticket</th>
                    <th>Status Date</th>
                    <th>Status Time</th>
                    <th>Tanggal Close</th>
                    <th>From Tanggal</th>
                    <th>From Tanggal</th>
                    <th>From Jam</th>
                    <th>Workzone</th>
                    <th>MITRA/PA</th>
                    <th>Witel</th>
                    <th>Regional</th>
                    <th>Incident's Symptom</th>
                    <th>Solutions's Segment</th>
                    <th>Actual Solution</th>
                  </tr>
                </thead>
                <tbody class="data">
                  <?php
                    $no = 0;
                        foreach($data_close as $u){
                          $no++;
                    ?>
                    <tr>
                      <td><?= $no;?></td>
                      <td><?= $u['incident'];?></td>
                      <td><?= $u['customer_name'];?></td>
                      <td><?= $u['summary'];?></td>
                      <td><?= $u['owner_group'];?></td>
                      <td><?= $u['owner'];?></td>
                      <td><?= $u['last_updated_work_log'];?></td>
                      <td><?= $u['last_work_log_date'];?></td>
                      <td><?= $u['source'];?></td>
                      <td><?= $u['segment'];?></td>
                      <td><?= $u['channel'];?></td>
                      <td><?= $u['customer_segment'];?></td>
                      <td><?= $u['service_id'];?></td>
                      <td><?= $u['service_no'];?></td>
                      <td><?= $u['service_type'];?></td>
                      <td><?= $u['top_priority'];?></td>
                      <td><?= $u['slg'];?></td>
                      <td><?= $u['technology'];?></td>
                      <td><?= $u['datek'];?></td>
                      <td><?= $u['rk_name'];?></td>
                      <td><?= $u['induk_gamas'];?></td>
                      <td><?= $u['reported_date'];?></td>
                      <td><?= $u['tgl_open'];?></td>
                      <td><?= $u['ttr_nasional'];?></td>
                      <td><?= $u['ttr_regional'];?></td>
                      <td><?= $u['ttr_witel'];?></td>
                      <td><?= $u['ttr_mitra'];?></td>
                      <td><?= $u['ttr_agent'];?></td>
                      <td><?= $u['status'];?></td>
                      <td><?= $u['osm_resolved_code'];?></td>
                      <td><?= $u['last_update_ticket'];?></td>
                      <td><?= $u['status_date'];?></td>
                      <td><?= $u['status_time'];?></td>
                      <td><?= $u['tgl_close'];?></td>
                      <td><?= $u['from_tgl'];?></td>
                      <td><?= $u['from_tanggal'];?></td>
                      <td><?= $u['from_jam'];?></td>
                      <td><?= $u['workzone'];?></td>
                      <td><?= $u['mitra_pa'];?></td>
                      <td><?= $u['witel'];?></td>
                      <td><?= $u['regional'];?></td>
                      <td><?= $u['incident_symptom'];?></td>
                      <td><?= $u['solution_segment'];?></td>
                      <td><?= $u['actual_solution'];?></td>
                    </tr>
                    <?php
                    }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                  <th>Incident</th>
                  <th>Customer Name</th>
                  <th>Summary</th>
                  <th>Owner Group</th>
                  <th>Owner</th>
                  <th>Last Updated Work Log</th>
                  <th>Last Work Log Date</th>
                  <th>Source</th>
                  <th>Segment</th>
                  <th>Channel</th>
                  <th>Customer Segment</th>
                  <th>Service ID</th>
                  <th>Service No</th>
                  <th>Service Type</th>
                  <th>Top Priority</th>
                  <th>SLG</th>
                  <th>Technology</th>
                  <th>Datek</th>
                  <th>RK Name</th>
                  <th>Induk Gamas</th>
                  <th>Reported Date</th>
                  <th>Tanggal Open</th>
                  <th>TTR Nasional</th>
                  <th>TTR Regional</th>
                  <th>TTR Witel</th>
                  <th>TTR Mitra</th>
                  <th>TTR Agent</th>
                  <th>Status</th>
                  <th>OSM Resolved Code</th>
                  <th>Last Update Ticket</th>
                  <th>Status Date</th>
                  <th>Status Time</th>
                  <th>Tanggal Close</th>
                  <th>From Tanggal</th>
                  <th>From Tanggal</th>
                  <th>From Jam</th>
                  <th>Workzone</th>
                  <th>MITRA/PA</th>
                  <th>Witel</th>
                  <th>Regional</th>
                  <th>Incident's Symptom</th>
                  <th>Solutions's Segment</th>
                  <th>Actual Solution</th>                  
                  </tr>
                </tfoot>
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