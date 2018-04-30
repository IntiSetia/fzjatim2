<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Grouping Pekerjaan</h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol> -->
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-12" id="telkom">
                <div class="box box-primary">
                    <!--<div class="box-header with-border">
                        <h3 class="box-title">BOQ TA - Telkom</h3>
                    </div>-->

                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">KHS</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" placeholder="Nama Grouping" name="group"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-body no-padding">
                        <table class="table table-condensed" id="addGrouping">
                            <tr>
                                <th style="text-align: right; padding-top: 12px;" class="col-sm-2">Nama Pekerjaan</th>
                                <th>&nbsp;</th>
                                <th class="col-sm-8">
                                    <select class="form-control" name="khs" id="" required>
                                        <option value="" disabled selected>Pilih Pekerjaan</option>
                                        <?php
                                            foreach($listpekerjaan as $b){
                                                echo "<option value=".$b['id'].">".$b['pekerjaan']."</option>";
                                            }
                                        ?>
                                    </select>
                                </th>
                                <th style="text-align: center;"><span class="fa btn btn-success fa-plus" onclick="addGrouping();"></span></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <input type="submit" id="inputplan" class="btn btn-primary" style="width: 150px;" value="SUBMIT">

        <?php
        if ($_alert != NULL) {
            echo "<h5 class='box-title' style='color: green;'>".$_alert."</h5>";
        } else {
            echo " ";
        }
        ?>

        </form>
    </section>
</div>