<?php
$someArray = json_decode($alldata, true);
//                                foreach ($detail_pek as $p){
?>
<div class="form-group">
    <label class="col-sm-2 control-label">ID Project</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" placeholder="ID Project" name="idp" value="<?php echo $someArray[0]['idp']?>" required/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">ID Vestina</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" placeholder="ID Vestina" name="idv"/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Pekerjaan</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" placeholder="Nama Pekerjaan" name="nama_pekerjaan" required/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Jenis Pekerjaan</label>
    <div class="col-sm-10">
        <select class="form-control" name="jenis_pekerjaan" required onchange="jenis_pekerjaan" id="je_pekerjaan">
            <option value="" selected disabled style="text-decoration-color: gainsboro;">Jenis Pekerjaan</option>
            <option value="QE Akses">QE Akses</option>
            <option value="QE Alpro">QE Alpro</option>
            <option value="QE Recovery">QE Recovery</option>
            <option value="QE Utilitas">QE Utilitas</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Pengawas Lapangan</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" placeholder="Pengawas Lapangan" name="pengawas_lapangan" required/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" >Nama Mitra</label>
    <div class="col-sm-10">
        <select class="form-control" name="nama_mitra" required id="namamitra"/>
        <option value="" selected disabled style="text-decoration-color: gainsboro;">Nama Mitra</option>
        <option value="PT TELKOM AKSES">PT TELKOM AKSES</option>
        <option value="PT GARUDA MITRA SOLUSI">PT GARUDA MITRA SOLUSI</option>
        <option value="PT WAHANA ERA SEJAHTERA">PT WAHANA ERA SEJAHTERA</option>
        <option value="CV MULTIUSER GLOBAL NETWORK">CV MULTIUSER GLOBAL NETWORK</option>
        <option value="KOPEGTEL MALANG">KOPEGTEL MALANG</option>
        <option value="PT DUTA ANUGRAH DAMAI SEJAHTERA">PT DUTA ANUGRAH DAMAI SEJAHTERA</option>
        <option value="PT LUMINTU">PT LUMINTU</option>
        <option value="PT CENTRALINDO PANCA SAKTI">PT CENTRALINDO PANCA SAKTI</option>
        <option value="PT SANDHY PUTRAMAKMUR">PT SANDHY PUTRAMAKMUR</option>
        <option value="PT SWARNA JAVADWIPA UTAMA">PT SWARNA JAVADWIPA UTAMA</option>
        <option value="PT KECUBUNG BORNEO KHATULISTIWA">PT KECUBUNG BORNEO KHATULISTIWA</option>
        <option value="PT DIAN KARYA">PT DIAN KARYA</option>
        <option value="PT DIBYACIPTA PRIMASOL">PT DIBYACIPTA PRIMASOL</option>
        <option value="CV PRIMA ANUGRAH SANTOSO">CV PRIMA ANUGRAH SANTOSO</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">ID SPMK</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" placeholder="ID SPMK" name="id_spmk" />
    </div>
</div>

<!--<div class="form-group">
    <label class="col-sm-2 control-label">File Rekon</label>
    <div class="col-sm-10">
        <input type="file" name="">
    </div>
</div>-->



<div class="form-horizontal">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">KHS</label>
            <div class="col-sm-10">
                <select class="form-control" name="khs" id="khstelkom" required/>
                <option value="" disabled selected>Pilih KHS</option>
                <?php
                foreach($khstelkom as $b){
                    echo "<option value=".$b->id_khs.">".$b->nama_khs."</option>";
                }
                ?>
                </select>
            </div>
        </div>

        <hr>

        <div class="form-group">
            <!--<table>
                <tr><td>-->
            <label class="col-sm-1 control-label">Designator</label>
            <div class="col-sm-3">
                <select class="form-control" id="designator" name="designator[]" required/>

                </select>
            </div>
            <label class="col-sm-1 control-label">Volume</label>
            <div class="col-sm-2">
                <input class="form-control" type="text" placeholder="Volume" name="volume[]" />
            </div>
            <div class="col-sm-1">
                <span class="fa btn btn-success fa-plus" onclick="addMoreRows();"></span>
            </div>
            <!--</td></tr>
    </table>-->

            <hr>

            <div id="addedRows"></div>
        </div>


    </div>
</div>
</div>


function addMoreRows(frm) {
rowCount ++;
var recRow = '<div class="form-group" id="rowCount'+rowCount+'"> <label class="col-sm-2 control-label">Designator</label><div class="col-sm-5"><select class="form-control" name="designator[]" id="designator'+rowCount+'" required/> </select></div><label class="col-sm-1 control-label">Volume</label><div class="col-sm-2"><input class="form-control" type="text" placeholder="Volume" name="volume[]" /></div><div class="col-sm-1" style="align-content: left;"><button type="submit" class="fa btn btn-danger fa-minus" onclick="removeRow('+rowCount+');"></button></div></div>';
var test = "<h1>Test</h1>"
jQuery('#addedRows').append(recRow);

$('select[id="designator'+rowCount+'"]').html(optionPublic);
}


        /*$volume         = $this->input->post('volume');
        foreach ($volume as $item3) {
            $designator         = $this->input->post('designator');
            foreach ($designator as $item) {
                echo $item ."<br>";
                $mat_jas        = $this->mtagihan->get_mat_jas('list_item', $item);
                foreach ($mat_jas as $item2){
                    $material       = $item2['harga_material'];
                    $jasa           = $item2['harga_jasa'];
                    echo $item3 ."<br>";
                    $harga_total    = (($item3 * $material) + ($item3 * $jasa));
                    echo $harga_total . "<br>";
                }
            }
        }*/

        /*$jumlah_designator         = count($this->input->post('designator'));
        for ($i = 0; $i <= $jumlah_designator; $i++){
            $list_designator           = array();
            array_push($list_designator, $this->input->post('designator'));
            echo $list_designator[$i];
        }*/


/*if ($id_khs == NULL) {
            echo $nama_khs;
        } else {
            $nama_khs2           = $this->mtagihan->get_nama_khs('khs', $id_khs);

            $khs    = "";
            foreach ($nama_khs2 as $a) {
                $khs    = $a['nama_khs'];
            }
            echo $khs;
        }*/
        /*echo $maker."<br>".$tanggal."<br>".$idp."<br>".$pekerjaan."<br>".$jenis_pekerjaan."<br>".$jenis_pekerjaan."<br>".$nama_khs."<br>".$designator."<br>".$volume."<br>".$tampilharga;*/

        if ($id_khs == NULL ) { //Tidak mengedit BOQ >> KHS 0 

            $volume             = $this->input->post('volume');
            $harga              = $this->input->post('harga');
            $tampilharga        = str_replace(".", "", $harga);

            if(isset($_POST["designator"]) && is_array($_POST["designator"])){
                $designator = implode(", ", $_POST["designator"]);
            }

            if(isset($_POST["volume"]) && is_array($_POST["volume"])){
                $volume = implode(", ", $_POST["volume"]);
            }

            //echo $maker."<br>".$tanggal."<br>".$idp."<br>".$pekerjaan."<br>".$jenis_pekerjaan."<br>".$jenis_pekerjaan."<br>".$nama_khs."<br>".$designator."<br>".$volume."<br>".$tampilharga;

            $data   = array(
                'maker'             => $maker,
                'tanggal'           => $tanggal,
                'pekerjaan'         => $pekerjaan,
                'jenis_pekerjaan'   => $jenis_pekerjaan,
                'khs'               => $nama_khs,
                'id_designator'     => $designator,
                'volume'            => $volume,
                'harga'             => $tampilharga,
                'approval'          => "NOK",
                'keterangan'        => " "
            );

            $where  = array(
                 'id'       => $id 
            );

            $this->mtagihan->editpek('data_planper', $data, $where);

            redirect(base_url('index.php/tagihan/listplanpekerjaan/success'));

        } else {

            $tampilharga        = 0;
            foreach ($designator as $key=>$item) {
                //echo $item ."<br>";
                $mat_jas        = $this->mtagihan->get_mat_jas('list_item', $item);
                //echo $item ." ". $item2['harga_material'] ." ". $item2['harga_jasa'] . "\n";
                    $material       = $mat_jas[0]['harga_material'];
                    $jasa           = $mat_jas[0]['harga_jasa'];
                    $volume         = $this->input->post('volume');
                    $volume         = $volume[$key];
                    $harga_total    = (($volume * $material) + ($volume * $jasa));

                    $tampilharga    += $harga_total;

                    //DESIGNATOR
                    echo $item ."<br>";
            }

            if(isset($_POST["designator"]) && is_array($_POST["designator"])){
                $designator = implode(", ", $_POST["designator"]);
            }

            if(isset($_POST["volume"]) && is_array($_POST["volume"])){
                $volume = implode(", ", $_POST["volume"]);
            }

            /*echo $maker."<br>".$tanggal."<br>".$idp."<br>".$pekerjaan."<br>".$jenis_pekerjaan."<br>".$jenis_pekerjaan."<br>".$nama_khs."<br>".$designator."<br>".$volume."<br>".$tampilharga;*/

            $nama_khs2           = $this->mtagihan->get_nama_khs('khs', $id_khs);

            $khs    = "";
            foreach ($nama_khs2 as $a) {
                $khs    = $a['nama_khs'];
            }

            $data   = array(
                'maker'             => $maker,
                'tanggal'           => $tanggal,
                'idp'               => $idp,
                'pekerjaan'         => $pekerjaan,
                'jenis_pekerjaan'   => $jenis_pekerjaan,
                'khs'               => $khs,
                'id_designator'     => $designator,
                'volume'            => $volume,
                'harga'             => $tampilharga,
                'approval'          => "NOK"
            );

            $where  = array(
                 'id'       => $id
            );

            $this->mtagihan->editpek('data_planper', $data, $where);

            redirect(base_url('index.php/tagihan/listplanpekerjaan/success'));
        }        

<?php
                                                if ($a['approval'] == "RETURN" || $a['approval'] == "NOK") {
                                            ?>
                                                    <td style="text-align: center;"><a href="<?= base_url('index.php/tagihan/editpekerjaan/'.$id)?>"><i class="fa fa-edit"></a></td>
                                            <?php        
                                                } else {
                                            ?>        
                                                    <td>&nbsp; </td>
                                            <?php        
                                                }
                                            ?>