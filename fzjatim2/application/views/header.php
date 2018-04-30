<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Portal FZ Jatim 2</title>
    <title>Admin TA MALANG</title>
    <!-- Icon -->
    <link rel="icon" href="<?=base_url();?>assets/dist/img/logo.ico" type="image/ico">
    <title>Support TA MALANG</title>
    <!-- Icon -->
    <link rel="icon" href="<?=base_url();?>assets/dist/img/logo.ico" type="image/ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url();?>assets/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?=base_url();?>assets/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?=base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?=base_url();?>assets/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=base_url();?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?=base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Data tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    <!-- Select 2 -->
    <link rel="stylesheet" href="<?=base_url();?>assets/plugins/select2/select2.min.css">
    <!-- JQUERY -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

    <!--START DASHBOARD COGS-->
    <style>
        #chartdiv_dashboardcogs {
            width: 100%;
            height: 500px;
        }
    </style>
    <!--END DASHBOARD COGS-->

    <!--START EVALUASI ALL-->
    <style>
        #chartdiv_evaluasi_all {
            width: 100%;
            height: 500px;
        }
    </style>
    <!--END EVALUASI ALL-->

    <!--START EVALUASI AREA-->
    <style>
        #chartdiv_evaluasi_area {
            width: 100%;
            height: 500px;
        }
    </style>
    <!--END-->

    <!--START EVALUASI PER KLASIFIKASI-->
    <style>
        #chartdiv_cogs_klasifikasi {
            width: 100%;
            height: 500px;
        }
    </style>
    <!--END-->

    <!--START EVALUASI KLASIFIKASI ALL CHART LINE-->
    <style>
        #chartdiv_allkla_line {
            width : 100%;
            height  : 500px;
        }
        #chartdiv_evaluasi {
            width: 300%;
            height: 600px;
        }
    </style>
    <!--END-->

    <!--START REVENUE ALL-->
    <style>
        #chartdiv_trend_rev_all {
            width   : 100%;
            height  : 600px;
        }
    </style>
    <!--END-->

    <!--START REVENUE MONTH-->
    <style>
        #chartdiv_trend_rev_m {
            width   : 100%;
            height  : 600px;
        }
    </style>
    <!--END-->

    <style>
        div.dataTables_wrapper {
            width: auto;
            margin: 0 auto;
        }
    </style>

    <style>
        .tokenizationSelect2{
            width: 300px;
        }
    </style>

    <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?=base_url();?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>TA</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="<?=base_url();?>assets/dist/img/New-Logo-TA-2016.png" height="45" width="190"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?=base_url();?>assets/dist/img/foto/default.png" class="user-image" alt="User Image">
                            <?php
                                echo "<span class='hidden-xs'>".$this->session->userdata('nama')."</span>";
                                /*$this->session->userdata('nama')*/
                            ?>
                        </a>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="<?=base_url('index.php/login/logout');?>" >
                            <span class="hidden-xs">Logout</span>
                        </a>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>
        </nav>
    </header>