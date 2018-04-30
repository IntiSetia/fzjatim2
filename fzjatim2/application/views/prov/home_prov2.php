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
                  <?php } ?> 
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
                  <td style="text-align:center;"><b><?= $jum[0]+$jum[8]+$jum[7];?></b></td>
                  <td style="text-align:center;">
                    <input type="text" class="form-control">
                  </td>
                  <td style="text-align:center;"><b><?= $jumb[0]+$jumb[8]+$jumb[7];?></b></td>
                </tr>
                <tr>
                  <th style="text-align:center;">BLB</th>
                  <td style="text-align:center;">
                    <input type="text" class="form-control" value="<?= $jum[0];?>" readonly>
                  </td>
                  <td style="text-align:center;">
                    <input type="text" class="form-control"></td>
                  <td style="text-align:center;"><?= $jumb[0];?></td>
                </tr>
                <tr>
                  <th style="text-align:center;">SGS</th>
                  <td style="text-align:center;"><?= $jum[8];?></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><?= $jumb[8];?></td>
                </tr>
                <tr>
                  <th style="text-align:center;">PKS</th>
                  <td style="text-align:center;"><?= $jum[7];?></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><?= $jumb[7];?></td>
                </tr>
                <tr>
                  <th style="text-align:center;">SEKTOR 2</th>
                  <td style="text-align:center;"><b><?= $jum[6]+$jum[4]+$jum[2]+$jum[9];?></b></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><b><?= $jumb[6]+$jumb[4]+$jumb[2]+$jumb[9];?></b></td>
                </tr>
                <tr>
                  <th style="text-align:center;">MLG</th>
                  <td style="text-align:center;"><?= $jum[6];?></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><?= $jumb[6];?></td>
                </tr>
                <tr>
                  <th style="text-align:center;">KLJ</th>
                  <td style="text-align:center;"><?= $jum[4];?></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><?= $jumb[4];?></td>
                </tr>
                <tr>
                  <th style="text-align:center;">GDG</th>
                  <td style="text-align:center;"><?= $jum[2];?></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><?= $jumb[2];?></td>
                </tr>
                <tr>
                  <th style="text-align:center;">SWJ</th>
                  <td style="text-align:center;"><?= $jum[9];?></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><?= $jumb[9];?></td>
                </tr>
                <tr>
                  <th style="text-align:center;">SEKTOR 3</th>
                  <td style="text-align:center;"><b><?= $jum[3]+$jum[10];?></b></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><b><?= $jumb[3]+$jumb[10];?></b></td>
                </tr>
                <tr>
                  <th style="text-align:center;">KEP</th>
                  <td style="text-align:center;"><?= $jum[3];?></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><?= $jumb[3];?></td>
                </tr>
                <tr>
                  <th style="text-align:center;">TUR</th>
                  <td style="text-align:center;"><?= $jum[10];?></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><?= $jumb[10];?></td>
                </tr>
                <tr>
                  <th style="text-align:center;">SEKTOR 4</th>
                  <td style="text-align:center;"><b><?= $jum[1]+$jum[5];?></b></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><b><?= $jumb[1]+$jumb[5];?></b></td>
                </tr>
                <tr>
                  <th style="text-align:center;">BTU</th>
                  <td style="text-align:center;"><?= $jum[1];?></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><?= $jumb[1];?></td>
                </tr>
                <tr>
                  <th style="text-align:center;">KPO</th>
                  <td style="text-align:center;"><?= $jum[5];?></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><?= $jumb[1];?></td>
                </tr>
                <tr>
                  <th style="text-align:center;">JUMLAH</th>
                  <td style="text-align:center;"><?= $all;?></td>
                  <td style="text-align:center;"></td>
                  <td style="text-align:center;"><?= $all_ba;?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        </div>

          </div>
        </div>
      </div>
    </section>
  </div>