
<div class="form-group">
    <label class="col-sm-2 control-label">Jenis KHS</label>
    <div class="col-sm-10">
        <select class="form-control" name="jenis_khs" required"/>
        <?php
        echo "<option value='' disabled selected>Masukkan Kontrak KHS</option>";
        foreach ($khs as $c){
            echo "<option value='".$c['nama_khs']."'>".$c['nama_khs']."</option>";
        }
        ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Designator</label>
    <div class="col-sm-10">
        <select class="form-control designator" multiple="true" name="state">
            <?php
            foreach ($listitem as $b){
                echo "<option value='".$b['id_db']."'>".$b['id_designator']." | ".$b['uraian']."</option>";
            }
            ?>
        </select>
    </div>
</div>