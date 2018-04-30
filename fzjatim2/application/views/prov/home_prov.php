<?php
  error_reporting(0);
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        TARGET KM-2 AREA FZ JATIM 2 2017
      </h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
        
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Data Rekon PSB</h3>
            </div>
            <div class="form-horizontal">
            <form method="post" action="<?php echo base_url()."index.php/prov/report";?>">
            <?php
              $namaBulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",  "September", "Oktober",  "November", "Desember");
            ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pilih Bulan</label>
                  <div class="col-sm-10">
                  <select class="form-control" name="bulan">
                  <?php
                    if($bulan != NULL){
                  ?>
                    <option value="01"> <?php echo $no?> </option>
                  <?php
                    } else {
                  ?>
                    <option value="01"> <?php echo $namaBulan[1]; ?> </option>
                    <option value="02"> <?php echo $namaBulan[2]; ?> </option>
                    <option value="03"> <?php echo $namaBulan[3]; ?> </option>
                    <option value="04"> <?php echo $namaBulan[4]; ?> </option>
                    <option value="05"> <?php echo $namaBulan[5]; ?> </option>
                    <option value="06"> <?php echo $namaBulan[6]; ?> </option>
                    <option value="07"> <?php echo $namaBulan[7]; ?> </option>
                    <option value="08"> <?php echo $namaBulan[8]; ?> </option>
                    <option value="09"> <?php echo $namaBulan[9]; ?> </option>
                    <?php for ($n=10; $n<=12 ; $n++) { ?> 
                    <option value="<?php echo $n; ?>" > <?php echo $namaBulan[$n]; ?> </option> 
                  <?php } 

                  }?> 
                  </select>
                  </div>
                </div>

              <div class="box-footer" align="center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
       </div>

              <br> 
              
      <div class="row">
        <div class="col-md-12">
       <div class="box">
            <div class="box-body no-padding">
              <table class="table table-bordered">
                <tr>
                  <th style="text-align:center;" class="success">SEKTOR</th>
                  <th style="text-align:center;" class="success">TARGET (sesuai sistem)</th>
                  <th style="text-align:center;" class="success">REALISASI</th>
                  <th style="text-align:center;" class="success">NOK (sesuai sistem)</th>

                </tr>
                <?php
                foreach($sto as $s){
                  $sto[] = $s['sto'];
                  $jum[] = $s['jum'];
                };
                foreach($sto_ba as $sb){
                  $stob[] = $sb['sto'];
                  $jumb[] = $sb['jum'];
                };
                ?>
                <tr>
                  <th style="text-align:center;">SEKTOR 1</th>
                  <td style="text-align:center;">
                    <b><?= $jum[0]+$jum[8]+$jum[7];?></b></td>
                  <td style="text-align:center;">
                    <!-- <input type="text" class="form-control"> -->
                  </td>
                  <td style="text-align:center;">
                    <b><?= $jumb[0]+$jumb[8]+$jumb[7];?></b>
                  </td>
                </tr>
                <tr>
                  <th style="text-align:center;">BLB</th>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jum[0];?>" readonly>
                  </td>
                  <td style="text-align:center;">
                    <input type="text" style="text-align:center;" name="" class="form-control">
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jumb[0];?>" readonly>
                  </td>
                </tr>
                <tr>
                  <th style="text-align:center;">SGS</th>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jum[8];?>" readonly></td>
                  <td style="text-align:center;">
                    <input type="text" style="text-align:center;" name="" class="form-control">
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jumb[8];?>" readonly></td>
                </tr>
                <tr>
                  <th style="text-align:center;">PKS</th>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jum[7];?>" readonly></td>
                  <td style="text-align:center;">
                    <input type="text" style="text-align:center;" name="" class="form-control">
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jumb[7];?>" readonly></td>
                </tr>
                <tr>
                  <th style="text-align:center;">SEKTOR 2</th>
                  <td style="text-align:center;"><b><?= $jum[6]+$jum[4]+$jum[2]+$jum[9];?></b></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><b><?= $jumb[6]+$jumb[4]+$jumb[2]+$jumb[9];?></b></td>
                </tr>
                <tr>
                  <th style="text-align:center;">MLG</th>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jum[6];?>" readonly></td>
                  <td style="text-align:center;">
                    <input type="text" style="text-align:center;" name="" class="form-control">
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jumb[6];?>" readonly></td>
                </tr>
                <tr>
                  <th style="text-align:center;">KLJ</th>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jum[4];?>" readonly></td>
                  <td style="text-align:center;">
                    <input type="text" style="text-align:center;" name="" class="form-control">
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jumb[4];?>" readonly></td>
                </tr>
                <tr>
                  <th style="text-align:center;">GDG</th>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jum[2];?>" readonly></td>
                  <td style="text-align:center;">
                    <input type="text" style="text-align:center;" name="" class="form-control">
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jumb[2];?>" readonly></td>
                </tr>
                <tr>
                  <th style="text-align:center;">SWJ</th>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jum[9];?>" readonly></td>
                  <td style="text-align:center;">
                    <input type="text" style="text-align:center;" name="" class="form-control">
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jumb[9];?>" readonly></td>
                </tr>
                <tr>
                  <th style="text-align:center;">SEKTOR 3</th>
                  <td style="text-align:center;"><b><?= $jum[3]+$jum[10];?></b></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><b><?= $jumb[3]+$jumb[10];?></b></td>
                </tr>
                <tr>
                  <th style="text-align:center;">KEP</th>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jum[3];?>" readonly></td>
                  <td style="text-align:center;">
                    <input type="text" style="text-align:center;" name="" class="form-control">
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jumb[3];?>" readonly></td>
                </tr>
                <tr>
                  <th style="text-align:center;">TUR</th>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jum[10];?>" readonly></td>
                  <td style="text-align:center;">
                    <input type="text" style="text-align:center;" name="" class="form-control">
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jumb[10];?>" readonly></td>
                </tr>
                <tr>
                  <th style="text-align:center;">SEKTOR 4</th>
                  <td style="text-align:center;"><b><?= $jum[1]+$jum[5];?></b></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><b><?= $jumb[1]+$jumb[5];?></b></td>
                </tr>
                <tr>
                  <th style="text-align:center;">BTU</th>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jum[1];?>" readonly></td>
                  <td style="text-align:center;">
                    <input type="text" style="text-align:center;" name="" class="form-control">
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jumb[1];?>" readonly></td>
                </tr>
                <tr>
                  <th style="text-align:center;">KPO</th>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jum[5];?>" readonly></td>
                  <td style="text-align:center;">
                    <input type="text" style="text-align:center;" name="" class="form-control">
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $jumb[5];?>" readonly></td>
                </tr>
                <tr>
                  <th style="text-align:center;">JUMLAH</th>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $all;?>" readonly>
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" name="" readonly>
                  </td>
                  <td style="text-align:center;">
                    <input style="text-align:center;" type="text" class="form-control" value="<?= $all_ba;?>" readonly>
                  </td>
                </tr>
              </table>


              <div class="box-body">
              <div class="box-footer" align="center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </div>

            </div>
          </div>
        </div>
        </div>

          </div>
        </div>
      </div>
    </section>
  </div>