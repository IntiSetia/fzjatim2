<div class="content-wrapper">
<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="<?=base_url('index.php/tagihan/listplanpekerjaan');?>">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
<!--                    <i>-</i>-->
                    <p style="padding-top: 0.5em" class="fa fa-envelope"></p>
                </span>

                <div class="info-box-content">

                    <?php
                        if (($this->session->userdata('position') == 'commerce') || ($this->session->userdata('position') == 'procurement')){
                            echo "<span class='info-box-text'>Update NO PO</span>";
                        } else {
                            echo "<span class='info-box-text'>Plan Pekerjaan</span>";
                        }
                    ?>

                    <span class="info-box-number">
                        <b style="font-size: 2em;">
                        <?php
                        if (($this->session->userdata('position') == 'pakbiwan') || ($this->session->userdata('position') == 'pakbiwan2')){
                            echo $jplan;
                        } else if(($this->session->userdata('position') == 'commerce')){
                            echo $jppo;
                        } else {    
                            echo $jplanreturn;
                        }?>
                        </b>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <?php
            if (($this->session->userdata('position') == 'procurement')){
                echo "";
            } else {
        ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="<?=base_url('index.php/tagihan/listpekerjaan');?>">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i></i>
                <p style="padding-top: 0.5em" class="fa fa-envelope-o"></p>
                </span>
                <div class="info-box-content">
                    <?php
                        if (($this->session->userdata('position') == 'commerce')){
                            echo "<span class='info-box-text'>Update BAST</span>";
                        } else {
                            echo "<span class='info-box-text'>Pekerjaan Baru</span>";
                        }
                    ?>
                    <span class="info-box-number">
                    <b style="font-size: 2em;">
                        <?php
                        if (($this->session->userdata('position') == 'pakbiwan')){
                            echo $jplanpek;
                        } else if(($this->session->userdata('position') == 'commerce')){
                            echo COUNT($jpbast);
                        } else{
                            echo $jplanpekreturn;
                        }?>
                        </b>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <?php
            }
        ?>

        <?php
            if (($this->session->userdata('position') == 'procurement')){
                echo "";
            } else {
        ?>
        <!-- fix for small devices only -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i></i>
                <p style="padding-top: 0.5em" class="fa fa-book"></p>
                </span>
                <div class="info-box-content">
                    <?php
                        if (($this->session->userdata('position') == 'commerce')){
                            echo "<span class='info-box-text'>Update Invoice dan FP</span>";
                        } else {
                            echo "<span class='info-box-text'>BA Rekon</span>";
                        }
                    ?>
                    <span class="info-box-number">
                    <b style="font-size: 2em;">
                        <?php
                        if (($this->session->userdata('position') == 'pakbiwan')){
                            echo $jbarekon;
                        } else if(($this->session->userdata('position') == 'commerce')){
                            echo COUNT($jpinvoicefp);
                        } else{
                            echo $jbarekonreturn;
                        }?>
                        </b>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <?php
            }
        ?>
        <!--
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"></span>
                    <span class="info-box-number"></span>
                </div>
            </div>
        </div>
         -->
    <!-- /.row -->
</section>
</div>
