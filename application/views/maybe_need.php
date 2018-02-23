                  <?php
                    $no = 0;
                        foreach($data_hr as $a){
                          $no++;
                          $id   = $a['object_id'];
                    ?>
                    <tr>
                      <td><?= $no;?></td>
                      <td><?= $a['nik'];?></td>
                      <td><?= $a['nama'];?></td>
                      <td><?= $a['position_name'];?></td>
                      <td><?= $a['direktorat'];?></td>
                      <td><?= $a['unit'];?></td>
                      <td><?= $a['sub_unit'];?></td>
                      <td><?= $a['psa'];?></td>
                      <td>Status Naker</td>
                      <td>Status Kedja</td>
                      <td style="text-align: center;"><a href="<?= base_url('index.php/HrPerformance/Detail/'.$a['nik'])?>"><i class="fa fa-bars"></i></a></td>
                      <td style="text-align: center;"><a href="<?= base_url('index.php/HrPerformance/View_Edit/'.$a['nik'])?>"><i class="fa fa-edit"></i></a></td>
                    </tr>
                    <?php
                    }
                  ?>


                  <?php
                  if ($this->session->userdata('tipe_user') == 'pakbiwan'){

                      $count  = 0;
                      foreach ($notification as $a){
                          $count++;
                      }

                      echo "<span class=\"label label-primary pull-right\">".$count."</span>";
                  }
                  ?>

                  <?php
                  if ($this->session->userdata('tipe_user') == 'pakbiwan'){

                      $count  = 0;
                      foreach ($notification as $a){
                          $count++;
                      }

                      if ($count > 0) {
                          echo "<span class='label label-primary pull-right'>" . $count . "</span>";
                      } else {
                          echo "<i class=\"fa fa-angle-left pull-right\">";
                      }
                  } else {
                      echo "<i class=\"fa fa-angle-left pull-right\">";
                  }
                  ?>
                  </i>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Jenis Pekerjaan</label>
                      <div class="col-sm-10">
                          <select class="form-control" name="jenis_pekerjaan" required/>
                          <option value="" selected disabled style="text-decoration-color: gainsboro;">Jenis Pekerjaan</option>
                          <option value="Deployer PT 2">Deployer PT 2</option>
                          <option value="Deployer PT 3">Deployer PT 3</option>
                          <option value="QE Recovery">QE Recovery</option>
                          <option value="HEM">HEM</option>
                          <option value="Material - GGN">Material - GGN</option>
                          <option value="QE Utilitas">QE Utilitas</option>
                          <option value="PT 3">PT 3</option>
                          <option value="QE Akses">QE Akses</option>
                          <option value="LME">LME</option>
                          <option value="Material - Migrasi">Material - Migrasi</option>
                          <option value="LS - PT3">LS - PT3</option>
                          <option value="Mattam PSB">Mattam PSB</option>
                          <option value="MIGRASI FTTH TITO">MIGRASI FTTH TITO</option>
                          <option value="MDU GAMAS">MDU GAMAS</option>
                          <option value="MODERNISASI(RK/SENTRAL)">MODERNISASI(RK/SENTRAL)</option>
                          <option value="ISP-OLT">ISP-OLT</option>
                          <option value="Swap">Swap</option>
                          <option value="PSB PT1">PSB PT1</option>
                          <option value="PT 2">PT 2</option>
                          <option value="AMS">AMS</option>
                          <option value="Deployer">Deployer</option>
                          <option value="PT1 - HEM">PT1 - HEM</option>
                          <option value="MIGRASI FTTH">MIGRASI FTTH</option>
                          <option value="Node B">Node B</option>
                          <option value="Node B - FIMO">Node B - FIMO</option>
                          <option value="Node B - FIRO">Node B - FIRO</option>
                          <option value="PT 4">PT 4</option>
                          <option value="Migrasi">Migrasi</option>
                          <option value="Node B - FONI">Node B - FONI</option>
                          <option value="LME WIFI">LME WIFI</option>
                          <option value="Jasa Rekon">Jasa Rekon</option>
                          <option value="Node B - OLO">Node B - OLO</option>
                          <option value="MDU">MDU</option>
                          <option value="Material - PSB / HEM">Material - PSB / HEM</option>
                          <option value="Migrasi - Upselling">Migrasi - Upselling</option>
                          <option value="New Roll Out FTTH GF">New Roll Out FTTH GF</option>
                          <option value="TITO">TITO</option>
                          <option value="MODERNISASI GRANULAR">MODERNISASI GRANULAR</option>
                          <option value="Material AMS">Material AMS</option>
                          <option value="FIMO">FIMO</option>
                          <option value="PT 2/3">PT 2/3</option>
                          <option value="FIRO">FIRO</option>
                          </select>
                      </div>
                  </div>

                  <script>
                  $('#khstelkom').change(function () {
                  var idkhstelkom = $("#khstelkom").val();
                  $.ajax({
                  type : 'POST',
                  url  : '<?= base_url('index.php/tagihan/listitemdesignatortelkom'); ?>',
                  data : {
                  khstelkom : $(this).val()
                  },
                  success : function(option){
                  $('select[name="designator"]').html(option);
                  }
                  });
                  alert(idkhstelkom);
                  });
                  </script>

                  <div class="form-group">
                      <table>
                          <tr><td>
                                  <label class="col-sm-2 control-label">Designator</label>
                                  <div class="col-sm-7">
                                      <select class="form-control" name="designator" id="designatortelkom" required/>

                                      </select>
                                  </div>
                                  <label class="col-sm-1 control-label">Volume</label>
                                  <div class="col-sm-2">
                                      <input class="form-control" type="text" placeholder="Volume" name="volume" />
                                  </div>
                                  <div class="col-sm-1">
                                      <span class="fa btn btn-success fa-plus" onclick="addMoreRows();"></span  >
                                  </div>
                              </td></tr>
                      </table>
                      <div id="addedRows"></div>
                  </div>

                  <script type="text/javascript">
                      var rowCount = 1;
                      function addMoreRows(frm) {
                          rowCount ++;
                          // var recRow = '<p id="rowCount'+rowCount+'"><tr><td><input name="" type="text" size="17%"  maxlength="120" /></td><td><input name="" type="text"  maxlength="120" style="margin: 4px 5px 0 5px;"/></td><td><input name="" type="text" maxlength="120" style="margin: 4px 10px 0 0px;"/></td></tr> <a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Delete</a></p>';
                          var recRow = '<div class="form-group" id="rowCount">\n' +
                              '                                <label class="col-sm-1 control-label">Designator</label>\n' +
                              '                                <div class="col-sm-6">\n' +
                              '                                    <select class="form-control" name="designator" id="designator" required/>\n' +
                              '\n' +
                              '                                    </select>\n' +
                              '                                </div>\n' +
                              '                                <label class="col-sm-1 control-label">Volume</label>\n' +
                              '                                <div class="col-sm-2">\n' +
                              '                                    <input class="form-control" type="text" placeholder="Volume" name="volume" />\n' +
                              '                                </div>\n' +
                              '                                <div class="col-sm-1">\n' +
                              '                                    <button type="submit" class="fa btn btn-danger fa-plus" onclick="removeRow('+rowCount+');"></button>\n' +
                              '                                </div>\n' +
                              '                            </div>';
                          jQuery('#addedRows').append(recRow);
                      }

                      function removeRow(removeNum) {
                          jQuery('#rowCount'+removeNum).remove();
                      }
                  </script>

                  <option value="" disabled selected style="text-decoration-color: gainsboro;">Pilih Plan Pekerjaan</option>
                  <?php
                  foreach($plan_pek_baru as $p){
                      echo "<option value=".$p->idp.">".$p->pekerjaan."</option>";
                  }
                  ?>



                  //var idkhstelkom = $("#khstelkom").val();
                  //$.ajax({
                  //    type : 'POST',
                  //    url  : '<?//= base_url('index.php/tagihan/listitemdesignatortelkom'); ?>//',
                  //    dataType: 'json',
                  //    data : {
                  //        khstelkom : idkhstelkom
                  //    },
                  //    success : function(option){
                  //        $('select[id="designator"]').html(option);
                  //    },
                  //    error: function(XMLHttpRequest, textStatus, errorThrown) {
                  //        alert("Status: " + textStatus); alert("Error: " + errorThrown);
                  //    }
                  //});

                  //
                  //var kidn = "designator"+rowCount;
                  //alert(kidn);
                  //$.ajax({
                  //    type : 'POST',
                  //    url  : '<?//= base_url('index.php/tagihan/listitemdesignatortelkom'); ?>//',
                  //    data : {
                  //        khstelkom : $(this).val()
                  //    },
                  //    success : function(option){
                  //        var ids = kidn;
                  //        alert("Success");
                  //        $('select[id='+ids+']').html(option);
                  //    },
                  //    error: function(XMLHttpRequest, textStatus, errorThrown) {
                  //        alert("Status: " + textStatus); alert("Error: " + errorThrown);
                  //    }
                  //});

                  <?php
                  if ($this->session->userdata('tipe_user') == 'pakbiwan'){

                      $count  = 0;
                      foreach ($notification as $a){
                          $count++;
                      }

                      if ($count > 0) {
                          echo "<span class='label label-primary pull-right'>" . $count . "</span>";
                      } else {
                          echo " ";
                      }

                  }
                  ?>
