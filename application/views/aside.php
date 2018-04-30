 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <?php
        if ($this->session->userdata('position') == 'Mgr Shared Service & Performance Jawa Timur 2' || $this->session->userdata('position') == 'Team Leader Operation & Maintenance Report' || $this->session->userdata('nama') == 'TEFANI DIVA WIBOWO' ||  $this->session->userdata('nama') == 'INTI SETIA NINGTYAS' || $this->session->userdata('nama') == 'NADIA WIDY OKTAVIANI') {
            ?>
            <ul class="sidebar-menu">

                <ul class="sidebar-menu">
                    <li class="treeview">
                        <a href="<?= base_url('index.php/dash_slide/') ?>">
                            <i class="fa fa-home"></i>
                            <span>HOME</span>
                        </a>
                    </li>
                    <li class="header">COMMERCE</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i>
                            <span>LOP</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('index.php/lop/importlop') ?>"><i class="fa fa-circle-o"></i>
                                    Upload Data LOP</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Rekon PSB</span>
                            <span class="pull-right-container">
                       <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('index.php/rekon/show_data') ?>"><i class="fa fa-circle-o"></i>
                                    Data Rekon</a></li>
                            <li><a href="<?= base_url('index.php/rekon/import2pms2n') ?>"><i class="fa fa-circle-o"></i>
                                    Upload 2P MS2N</a></li>
                            <li><a href="<?= base_url('index.php/rekon/import3pms2n') ?>"><i class="fa fa-circle-o"></i>
                                    Upload 3P MS2N</a></li>
                            <li><a href="<?= base_url('index.php/Revenue') ?>"><i class="fa fa-circle-o"></i> Upload
                                    Rekon SO</a></li>
                            <li><a href="<?= base_url('index.php/rekon/importsc') ?>"><i class="fa fa-circle-o"></i>
                                    Upload Starclick</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-usd"></i>
                            <span>Tagihan</span>
                            <span class="pull-right-container">
                                <?php
                                if ($this->session->userdata('position') == 'Mgr Maintenance Malang') {

                                    $count = 0;
                                    foreach ($notification as $a) {
                                        $count++;
                                    }

                                    if ($count > 0) {
                                        echo "<span class='label label-primary pull-right'>" . $count . "</span>";
                                    } else {
                                        echo "<i class='fa fa-angle-left pull-right'></i>";
                                    }
                                } else {
                                    echo "<i class='fa fa-angle-left pull-right'></i>";
                                }

                                ?>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('index.php/tagihan/input') ?>"><i class="fa fa-plus"></i>
                                    Entry Pekerjaan </a>
                            </li>
                        </ul>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('index.php/tagihan/inputplan') ?>"><i class="fa fa-plus"></i>
                                    Entry Plan </a>
                            </li>
                        </ul>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('index.php/tagihan/listpekerjaan') ?>"><i class="fa fa-circle-o"></i>
                                    List Pekerjaan
                                    <span class="pull-right-container">
                                        <?php
                                        if ($this->session->userdata('position') == 'Mgr Maintenance Malang') {

                                            $count = 0;
                                            foreach ($notification as $a) {
                                                $count++;
                                            }

                                            if ($count > 0) {
                                                echo "<span class='label label-primary pull-right'>" . $count . "</span>";
                                            } else {
                                                echo " ";
                                            }

                                        }
                                        ?>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">FINANCE</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list"></i> <span>COGS</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">
                                    <i class="fa fa-share"></i> <span>COGS 2017</span>
                                    <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a></li>
                            <li><a href="<?= base_url('index.php/cogs/dashboard'); ?>"><i class="fa fa-circle-o"></i>
                                    Dashboard COGS</a></li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Evaluasi COGS</span>
                                    <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                            </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/cogs/evaluasi'); ?>"><i
                                                    class="fa fa-circle-o"></i> COGS Year to Date/Month</a></li>
                                    <li><a href="<?= base_url('index.php/cogs/cogs_klasifikasi_all') ?>"><i
                                                    class="fa fa-circle-o"></i> COGS per Pengeluaran</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= base_url('index.php/cogs/rev'); ?>"><i class="fa fa-circle-o"></i> Evaluasi
                                    Revenue</a></li>
                            <li><a href="<?= base_url('index.php/cogs/import'); ?>"><i class="fa fa-circle-o"></i>
                                    Import Data COGS</a></li>
                            <li><a href="<?= base_url('index.php/cogs/input'); ?>"><i class="fa fa-circle-o"></i> Input
                                    Target COGS</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-usd"></i>
                            <span>Revenue</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=""><i class="fa fa-circle-o"></i> Assurance
                                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span></a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/Revenue/data_ass') ?>"><i
                                                    class="fa fa-circle-o"></i> Data Assurance
                                        </a></li>
                                    <li><a href="<?= base_url('index.php/Revenue/form_ass') ?>"><i
                                                    class="fa fa-circle-o"></i> Form Assurance</a></li>
                                    <li><a href="<?= base_url('index.php/RevTarget/target_ass') ?>"><i
                                                    class="fa fa-circle-o"></i> Update Target Rev</a></li>
                                </ul>
                            </li>
                            <li><a href=""><i class="fa fa-circle-o"></i> Data
                                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span></a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/revenue/all_rekon') ?>"><i
                                                    class="fa fa-circle-o"></i> All Data
                                        </a></li>
                                    <li><a href="<?= base_url('index.php/revenue/rekon') ?>"><i
                                                    class="fa fa-circle-o"></i> Data Sudah Rekon</a></li>
                                    <li><a href="<?= base_url('index.php/RevTarget/target_ass') ?>"><i
                                                    class="fa fa-circle-o"></i> Update Target Rev</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= base_url('index.php/Revenue') ?>"><i class="fa fa-circle-o"></i> Home
                                </a>
                            </li>
                            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>
                                    Infrastructure Service
                                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span></a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Maintenance Access
                                            <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?= base_url('index.php/Revenue/data_main_access') ?>"><i
                                                            class="fa fa-circle-o"></i> Data Maintenance Access</a></li>
                                            <li><a href="<?= base_url('index.php/Revenue/form_main_access') ?>"><i
                                                            class="fa fa-circle-o"></i> Form Maintenance Access</a></li>
                                            <li><a href="<?= base_url('index.php/RevTarget/target_main_access') ?>"><i
                                                            class="fa fa-circle-o"></i> Update Target Rev</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-circle-o"></i> Gamas & QE
                                            <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?= base_url('index.php/Revenue/data_gamas') ?>"><i
                                                            class="fa fa-circle-o"></i> Data Gamas & QE</a></li>
                                            <li><a href="<?= base_url('index.php/Revenue/form_gamas') ?>"><i
                                                            class="fa fa-circle-o"></i> Form Gamas & QE</a></li>
                                            <li><a href="<?= base_url('index.php/RevTarget/target_gamas') ?>"><i
                                                            class="fa fa-circle-o"></i> Update Target Rev</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href=""><i class="fa fa-circle-o"></i> Infrastructure Delivery
                                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span></a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="#"><i class="fa fa-circle-o"></i> Migration
                                            <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?= base_url('index.php/Revenue/data_migrasi') ?>"><i
                                                            class="fa fa-circle-o"></i> Data Migration</a></li>
                                            <li><a href="<?= base_url('index.php/Revenue/form_migrasi') ?>"><i
                                                            class="fa fa-circle-o"></i> Form Migration</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= base_url('index.php/RevTarget/target_mig') ?>"><i
                                                    class="fa fa-circle-o"></i> Update Target Rev</a></li>
                                </ul>
                            </li>
                            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Maintenance
                                    Infra Sup
                                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span></a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/Revenue/data_mainis') ?>"><i
                                                    class="fa fa-circle-o"></i> Data Maintenance Infra Sup
                                        </a></li>
                                    <li><a href="<?= base_url('index.php/Revenue/form_mainis') ?>"><i
                                                    class="fa fa-circle-o"></i> Form Maintenance Infra Sup</a></li>
                                    <li><a href="<?= base_url('index.php/RevTarget/target_mainis') ?>"><i
                                                    class="fa fa-circle-o"></i> Update Target Rev</a></li>
                                </ul>
                            </li>
                            <li><a href=""><i class="fa fa-circle-o"></i> Provisioning Indihome
                                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span></a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/prov/data_prov') ?>"><i
                                                    class="fa fa-circle-o"></i> Data Provisioning</a></li>
                                    <li><a href="<?= base_url('index.php/prov/form_prov') ?>"><i class="fa fa-circle-o"></i> Form PSB</a></li>
                                    <li>
                                        <a href="#"><i class="fa fa-circle-o"></i> Search
                                            <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?= base_url('index.php/SearchRev/cari_by_date') ?>"><i
                                                            class="fa fa-circle-o"></i> All Data by Date</a></li>
                                            <li><a href="<?= base_url('index.php/SearchRev/cari_by_div') ?>"><i
                                                            class="fa fa-circle-o"></i> All Data by Division</a></li>
                                            <li><a href="<?= base_url('index.php/SearchRev/cari_ba') ?>"><i
                                                            class="fa fa-circle-o"></i> Search BA</a></li>
                                            <li><a href="<?= base_url('index.php/SearchRev/cari_ba') ?>"><i
                                                            class="fa fa-circle-o"></i> Search Data PS</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i> Search
                                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/SearchRev/cari_by_date') ?>"><i
                                                    class="fa fa-circle-o"></i> All Data by Date</a></li>
                                    <li><a href="<?= base_url('index.php/SearchRev/cari_by_div') ?>"><i
                                                    class="fa fa-circle-o"></i> All Data by Division</a></li>
                                    <li><a href="<?= base_url('index.php/SearchRev/cari_ba') ?>"><i
                                                    class="fa fa-circle-o"></i> Search BA</a></li>
                                </ul>
                            </li>
                            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Service
                                    Delivery
                                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span></a>
                                <ul class="treeview-menu">
                                    </li>
                                    <li><a href="<?= base_url('index.php/Revenue/data_sd') ?>"><i
                                                    class="fa fa-circle-o"></i> Data Service Delivery</a></li>
                                    </li>
                                    <li><a href="<?= base_url('index.php/Revenue/form_hem') ?>"><i
                                                    class="fa fa-circle-o"></i> HEM</a></li>
                                    </li>
                                    <li><a href="<?= base_url('index.php/Revenue/form_nodeb') ?>"><i
                                                    class="fa fa-circle-o"></i> Node B</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Prog Optimization PT2
                                            <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?= base_url('index.php/Revenue/form_pt2') ?>"><i
                                                            class="fa fa-circle-o"></i> Form PT2</a></li>
                                            <li><a href="<?= base_url('index.php/RevTarget/target_pt2') ?>"><i
                                                            class="fa fa-circle-o"></i> Input Target Rev</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-circle-o"></i> Prog Optimization PT3
                                            <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?= base_url('index.php/Revenue/form_pt3') ?>"><i
                                                            class="fa fa-circle-o"></i> Form PT3</a></li>
                                            <li><a href="<?= base_url('index.php/RevTarget/target_pt3') ?>"><i
                                                            class="fa fa-circle-o"></i> Input Target Rev</a></li>
                                        </ul>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="header">HUMAN RESOURCE</li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-user"></i> <span>HR Performance</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <!--<li><a href="<?/*=base_url('index.php/hrperformance/') */ ?>"><i class="fa fa-circle-o"></i>
                            Dashboard PBS</a></li>-->
                            <li><a href="<?= base_url('index.php/hrperformance/apeldow') ?>"><i class="fa fa-plus"></i>
                                    Absen Apel DOW</a></li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-cloud-upload"></i> <span>Import Data</span>
                                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/hrperformance/import'); ?>"><i
                                                    class="fa fa-upload"></i> Import Data HR</a></li>
                                    <li><a href="<?= base_url('index.php/hrperformance/import_km'); ?>"><i
                                                    class="fa fa-upload"></i> Import Data KM</a></li>
                                    <!--<li><a href="<?/*=base_url('index.php/hrperformance/importhr_wper'); */ ?>"><i
                                            class="fa fa-upload"></i> Import Data HR 2</a></li>-->
                                    <!--<li><a href="<?/*=base_url('index.php/hrperformance') */ ?>"><i
                                            class="fa fa-upload"></i> Import Data PBS</a></li>-->
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="<?= base_url('index.php/hrperformance/input_kontrak'); ?>">
                                    <i class="fa fa-users"></i> <span>Kontrak Management</span>
                                </a>
                            </li>
                            <li><a href="<?= base_url('index.php/hrperformance/') ?>"><i class="fa fa-circle-o"></i>
                                    View Data Naker</a></li>
                            <!--<li><a href="<?/*=base_url('index.php/hrperformance/') */ ?>"><i class="fa fa-circle-o"></i>
                            Mapping SM to TL</a></li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-circle-o"></i> <span>Report HR</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?/*=base_url('index.php/cogs/evaluasi'); */ ?>"><i
                                            class="fa fa-circle-o"></i> Performance SM</a></li>
                            <li><a href="<?/*=base_url('index.php/cogs/cogs_klasifikasi') */ ?>"><i
                                            class="fa fa-circle-o"></i> Performance TL</a></li>
                            <li><a href="<?/*=base_url('index.php/cogs/cogs_klasifikasi') */ ?>"><i
                                            class="fa fa-circle-o"></i> Performance Teknisi</a></li>
                            <li><a href="<?/*=base_url('index.php/cogs/cogs_klasifikasi') */ ?>"><i
                                            class="fa fa-circle-o"></i> Trend Performansi Individu</a></li>
                        </ul>
                    </li>-->
                        </ul>
                    </li>
                    <li class="header">FIBER ACADEMY</li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-user"></i> <span>MARSHALL</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Edit</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/marshall/edit_sampling_marshall') ?>"><i
                                                    class="fa fa-circle-o"></i>Sampling Marshall</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Input</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/marshall/import_jadwal'); ?>"><i
                                                    class="fa fa-circle-o"></i> Jadwal Marshall</a></li>
                                    <li><a href="<?= base_url('index.php/marshall/view_form') ?>"><i
                                                    class="fa fa-circle-o"></i> Sampling Marshall</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Report</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/marshall/report_marshall') ?>"><i
                                                    class="fa fa-circle-o"></i> Data Marshall</a></li>
                                    <li><a href="<?= base_url('index.php/marshall/report_statistik') ?>"><i
                                                    class="fa fa-circle-o"></i> Statistik Marshall</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="header">MAINTENANCE</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-briefcase"></i>
                            <span>Project</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('index.php/tagihan/input') ?>"><i class="fa fa-plus"></i>
                                    Entry Pekerjaan
                                </a>
                            </li>
                        </ul>

                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('index.php/tagihan/inputplan') ?>"><i class="fa fa-plus"></i>
                                    Entry Plan </a>
                            </li>
                        </ul>

                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('index.php/tagihan/listpekerjaan') ?>"><i class="fa fa-circle-o"></i>
                                    View Pekerjaan </a>
                            </li>
                        </ul>

                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('index.php/tagihan/listplanpekerjaan') ?>"><i class="fa fa-circle-o"></i>
                                    View Plan </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list"></i>
                            <span>Pekerjaan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('index.php/tagihan/listpekerjaanall') ?>"><i class="fa fa-circle-o"></i>
                                    List Pekerjaan </a>
                            </li>
                        </ul>

                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('index.php/tagihan/groupingpekerjaan') ?>"><i class="fa fa-circle-o"></i>
                                    Grouping Pekerjaan </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="<?= base_url('index.php/tagihan/report_input') ?>">
                            <i class="fa fa-th-large"></i>
                            <span>Report Penginputan</span>
                        </a>
                    </li>
                    <li class="header">OPERATIONAL PERFORMANCE</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Prov Performance</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('index.php/wh/data_prov') ?>"><i class="fa fa-circle-o"></i>
                                    Data Provisioning</a></li>
                            <li><a href="<?= base_url('index.php/wh/input_ba') ?>"><i class="fa fa-circle-o"></i>
                                    Form Provisioning</a></li>
                            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Import Data PSB</a></li> -->
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i> Search
                                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/prov/cari_ps') ?>"><i
                                                    class="fa fa-circle-o"></i> Search Data PS</a></li>
                                    <li><a href="<?= base_url('index.php/prov/cari_ps') ?>"><i
                                                    class="fa fa-circle-o"></i> Search For Upload BA</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-wrench"></i>
                            <span>Assrc Performance</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i> Close Ticket
                                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/assuranceperformance/import_close') ?>"><i
                                                    class="fa fa-circle-o"></i> Import Data Close Ticket</a></li>
                                    <li><a href="<?= base_url('index.php/assuranceperformance/data_close') ?>"><i
                                                    class="fa fa-circle-o"></i> Data Close Ticket</a></li>
                                    <li>
                                        <a href="#"><i class="fa fa-circle-o"></i> Report Close Ticket
                                            <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="#"><i class="fa fa-circle-o"></i> Month</a></li>
                                            <li>
                                                <a href="<?= base_url('index.php/assuranceperformance/report_ytd_close') ?>"><i
                                                            class="fa fa-circle-o"></i> Year to Date</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Import</span>
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/assuranceperformance/importfilemttr'); ?>"><i
                                                    class="fa fa-circle-o"></i> Data MTTR</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i> Open Ticket
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/assuranceperformance/import_open') ?>"><i
                                                    class="fa fa-circle-o"></i> Import Data Open Ticket</a></li>
                                    <li><a href="<?= base_url('index.php/assuranceperformance/data_open') ?>"><i
                                                    class="fa fa-circle-o"></i> Data Open Ticket</a></li>
                                    <li>
                                        <a href="#"><i class="fa fa-circle-o"></i> Report Open Ticket
                                            <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li>
                                                <a href="<?= base_url('index.php/assuranceperformance/report_month_open') ?>"><i
                                                            class="fa fa-circle-o"></i> Month</a></li>
                                            <li>
                                                <a href="<?= base_url('index.php/assuranceperformance/report_ytd_open') ?>"><i
                                                            class="fa fa-circle-o"></i> Year to Date</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Report</span>
                                    <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/cogs/evaluasi'); ?>"><i
                                                    class="fa fa-circle-o"></i> Trend GGN per Teritory</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="<?= base_url("index.php/SearchSN/"); ?>">
                            <i class="fa fa-search"></i> <span>Search NTE</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?= base_url('index.php/dash_slide') ?>">
                            <i class="fa fa-table"></i> <span>Slide Show</span>
                        </a>
                    </li>
                    <li class="header">WARE HOUSE</li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-circle-o"></i> <span>BA Instalasi</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=base_url('index.php/wh/input_ba') ?>"><i class="fa fa-circle-o"></i> Input Data BA</a></li>
                            <li><a href=""><i class="fa fa-circle-o"></i> Report Data BA</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-circle-o"></i> <span>Pencatatan Asset Tetap</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=base_url('index.php/wh/inventaris_nonproject') ?>"><i class="fa fa-circle-o"></i> Input Data</a></li>
                            <li><a href="<?=base_url('index.php/wh/data_invent') ?>"><i class="fa fa-circle-o"></i> Report </a></li>
                        </ul>
                    </li>
                    <li class="header"></li>
            </ul>
            <?php
        } else if ($this->session->userdata('position') == 'Admin Warehouse SO NTE' || $this->session->userdata('position') == 'Admin Warehouse Area NTE') {
                ?>
                    <ul class="sidebar-menu">
                        <!--<li class="treeview">
                            <a href="<?/*=base_url('index.php/dashslide/') */?>">
                                <i class="fa fa-home"></i>
                                <span>HOME</span>
                            </a>
                        </li>-->
                        <li class="header">WARE HOUSE</li>
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-circle-o"></i> <span>BA Instalasi</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=base_url('index.php/wh/input_ba') ?>"><i class="fa fa-circle-o"></i> Input Data BA </a></li>
                                <li><a href=""><i class="fa fa-circle-o"></i> Report Data BA</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-circle-o"></i> <span>Pencatatan Asset Tetap</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=base_url('index.php/wh/inventaris_nonproject')?>"><i class="fa fa-circle-o"></i> Input Data</a></li>
                                <li><a href=""><i class="fa fa-circle-o"></i> Report </a></li>
                            </ul>
                        </li>
                    </ul>
                <?php
            } else if ($this->session->userdata('position') == 'Admin Warehouse SO NTE' || $this->session->userdata('position') == 'Admin Warehouse Area NTE') {
                ?>
                <ul class="sidebar-menu">
                    <!--<li class="treeview">
                            <a href="<?/*=base_url('index.php/dashslide/') */?>">
                                <i class="fa fa-home"></i>
                                <span>HOME</span>
                            </a>
                        </li>-->
                    <li class="header">WARE HOUSE</li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-circle-o"></i> <span>BA Instalasi</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=base_url('index.php/wh/input_ba') ?>"><i class="fa fa-circle-o"></i> Input Data BA </a></li>
                            <li><a href=""><i class="fa fa-circle-o"></i> Report Data BA</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-circle-o"></i> <span>Pencatatan Asset Tetap</span>
                            <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=base_url('index.php/wh/inventaris_nonproject')?>"><i class="fa fa-circle-o"></i> Input Data</a></li>
                            <li><a href=""><i class="fa fa-circle-o"></i> Report </a></li>
                        </ul>
                    </li>
                </ul>
            <?php
        } else if ($this->session->userdata('nama') == 'LILIK AJI LUTHFIANTO' || $this->session->userdata('nama') == 'EKA GAMA PUTRA') {
            ?>
            <ul class="sidebar-menu">
                <li class="header">FIBER ACADEMY</li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-user"></i> <span>MARSHALL</span>
                        <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <!--<li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Edit</span>
                                    <span class="pull-right-container">
                                              <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?/*= base_url('index.php/marshall/view_form') */?>"><i
                                                    class="fa fa-circle-o"></i> Sampling Marshall</a></li>
                                </ul>
                            </li>-->
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-circle-o"></i> <span>Input</span>
                                <span class="pull-right-container">
                                              <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('index.php/marshall/import_jadwal'); ?>"><i
                                                class="fa fa-circle-o"></i> Input Jadwal Marshall</a></li>
                                <li><a href="<?= base_url('index.php/marshall/view_form') ?>"><i
                                                class="fa fa-circle-o"></i> Input Sampling Marshall</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-circle-o"></i> <span>Report</span>
                                <span class="pull-right-container">
                                              <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('index.php/marshall/report_marshall') ?>"><i
                                                class="fa fa-circle-o"></i> Data Marshall</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="header">MAINTENANCE</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-briefcase"></i>
                        <span>Project</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>

                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('index.php/tagihan/input') ?>"><i class="fa fa-plus"></i>
                                Entry Pekerjaan
                            </a>
                        </li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('index.php/tagihan/inputplan') ?>"><i class="fa fa-plus"></i>
                                Entry Plan </a>
                        </li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('index.php/tagihan/listpekerjaan') ?>"><i class="fa fa-circle-o"></i>
                                View Pekerjaan </a>
                        </li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('index.php/tagihan/listplanpekerjaan') ?>"><i class="fa fa-circle-o"></i>
                                View Plan </a>
                        </li>
                    </ul>


                </li>
            </ul>
                <?php
            } else if ($this->session->userdata('position') == 'Team Leader Inventory & Asset Management Non NTE' || $this->session->userdata('position') == 'Team Leader Drawing & Inventory' || $this->session->userdata('position') == 'Team Leader Surveyor' || $this->session->userdata('position') == 'Team Leader Assurance Consumer Service' || $this->session->userdata('position') == 'Site Manager Fiber Academy' || $this->session->userdata('position') == 'Site Manager Provisioning' || $this->session->userdata('position') == 'Site Manager Assurance Consumer Services' || $this->session->userdata('position') == 'Site Manager Helpdesk' || $this->session->userdata('position') == 'Site Manager Assurance Corporate' || $this->session->userdata('position') == 'Site Manager Project Deployment' || $this->session->userdata('position') == 'Site Manager Fiber Academy' || $this->session->userdata('position') == 'Team Leader Fiber Academy' || $this->session->userdata('position') == 'Team Leader TSEL Services' || $this->session->userdata('position') == 'Team Leader Inventory & Asset Management NTE') {
                ?>
                <ul class="sidebar-menu">
                    <li class="header">FIBER ACADEMY</li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-user"></i> <span>MARSHALL</span>
                            <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <!--<li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Edit</span>
                                    <span class="pull-right-container">
                                              <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?/*= base_url('index.php/marshall/view_form') */?>"><i
                                                    class="fa fa-circle-o"></i> Sampling Marshall</a></li>
                                </ul>
                            </li>-->
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Input</span>
                                    <span class="pull-right-container">
                                              <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/marshall/import_jadwal'); ?>"><i
                                                    class="fa fa-circle-o"></i> Input Jadwal Marshall</a></li>
                                    <li><a href="<?= base_url('index.php/marshall/view_form') ?>"><i
                                                    class="fa fa-circle-o"></i> Input Sampling Marshall</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Report</span>
                                    <span class="pull-right-container">
                                              <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/marshall/report_marshall') ?>"><i
                                                    class="fa fa-circle-o"></i> Data Marshall</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php
        } else if ($this->session->userdata('nama') == 'ANUGRAH VITO AHYA' || $this->session->userdata('nama') == 'MOH SULAIMAN YAASIIN' || $this->session->userdata('position') == 'Admin Maintenance'  || $this->session->userdata('position') == 'Team Leader Preventive Maintenance' || $this->session->userdata('position') == 'Team Leader Corrective Maintenance & QE' || $this->session->userdata('position') == 'Site Manager Maintenance' || $this->session->userdata('position') == 'Admin Commerce'  || $this->session->userdata('position') == 'Team Leader Commerce' || $this->session->userdata('position') == 'Site Manager Commerce' || $this->session->userdata('position') == 'Admin Procurement & Partnership' || $this->session->userdata('position') == 'Team Leader Procurement & Partnership'  ) {
            ?>
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="<?=base_url('index.php/dash_slide/')?>">
                        <i class="fa fa-home"></i>
                        <span>HOME</span>
                    </a>
                </li>
                <li class="header">MAINTENANCE</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-briefcase"></i>
                        <span>Project</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>


                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('index.php/tagihan/input') ?>"><i class="fa fa-plus"></i>
                                Entry Pekerjaan
                            </a>
                        </li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('index.php/tagihan/inputplan') ?>"><i class="fa fa-plus"></i>
                                Entry Plan </a>
                        </li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('index.php/tagihan/listpekerjaan') ?>"><i class="fa fa-circle-o"></i>
                                View Pekerjaan </a>
                        </li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('index.php/tagihan/listplanpekerjaan') ?>"><i class="fa fa-circle-o"></i>
                                View Plan </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list"></i>
                        <span>Pekerjaan</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>

                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('index.php/tagihan/listpekerjaanall') ?>"><i class="fa fa-circle-o"></i>
                                List Pekerjaan </a>
                        </li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('index.php/tagihan/groupingpekerjaan') ?>"><i class="fa fa-circle-o"></i>
                                Grouping Pekerjaan </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php
        } else if ($this->session->userdata('position') == 'Mgr Maintenance Malang') {
            ?>
            <ul class="sidebar-menu">
                <li class="header">MAINTENANCE & CONSTRUCTOR</li>
                <li class="treeview">
                    <a href="<?=base_url('index.php/dash_slide/')?>">
                        <i class="fa fa-home"></i>
                        <span>HOME</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-usd"></i>
                        <span>Tagihan</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>

                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('index.php/tagihan/listpekerjaan') ?>"><i class="fa fa-circle-o"></i>
                                List Pekerjaan
                            </a>
                        </li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('index.php/tagihan/listplanpekerjaan') ?>"><i class="fa fa-circle-o"></i>
                                List Plan Pekerjaan </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php
        } else if ($this->session->userdata('position') == 'Admin HSE') {
            ?>
            <ul class="sidebar-menu">
                <li class="header">HSE</li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-user"></i> <span>MARSHALL</span>
                        <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-circle-o"></i> <span>Edit</span>
                                <span class="pull-right-container">
                                              <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('index.php/marshall/view_form') ?>"><i
                                                class="fa fa-circle-o"></i> Sampling Marshall</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-circle-o"></i> <span>Input</span>
                                <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('index.php/marshall/import_jadwal'); ?>"><i
                                                class="fa fa-circle-o"></i> Jadwal Marshall</a></li>
                                <li><a href="<?= base_url('index.php/marshall/view_form') ?>"><i
                                                class="fa fa-circle-o"></i> Sampling Marshall</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-circle-o"></i> <span>Report</span>
                                <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('index.php/marshall/report_marshall') ?>"><i
                                                class="fa fa-circle-o"></i> Data Marshall</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php
        } else if ($this->session->userdata('position') == 'Admin Human Capital Service' || $this->session->userdata('position') == 'Team Leader Human Capital Service') {
                ?>
                <ul class="sidebar-menu">
                    <li class="header">HSE</li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-user"></i> <span>MARSHALL</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Edit</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/marshall/view_form') ?>"><i
                                                    class="fa fa-circle-o"></i> Sampling Marshall</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Input</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/marshall/import_jadwal'); ?>"><i
                                                    class="fa fa-circle-o"></i> Jadwal Marshall</a></li>
                                    <li><a href="<?= base_url('index.php/marshall/view_form') ?>"><i
                                                    class="fa fa-circle-o"></i> Sampling Marshall</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-circle-o"></i> <span>Report</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url('index.php/marshall/report_marshall') ?>"><i
                                                    class="fa fa-circle-o"></i> Data Marshall</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php
            }
            ?>
    </section>
    <!-- /.sidebar -->
</aside>