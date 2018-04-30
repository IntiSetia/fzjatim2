  <style type="text/css">
    .file-upload {
      position: relative;
      display: inline-block;
    }

    .file-upload__label {
      display: block;
      padding: 1em 2em;
      color: #fff;
      background: #222;
      border-radius: .4em;
      transition: background .3s;
      
      &:hover {
         cursor: pointer;
         background: #000;
      }
    }
        
    .file-upload__input {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        font-size: 1;
        width:0;
        height: 100%;
        opacity: 0;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Import File Data 2P MS2N
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-angle-left"></i> Kembali</a></li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-danger">
        <h4>Perhatian! (COMING SOON)</h4>
        <p></p>
        <p></p>
        <br>
        <p></p>
      </div>

      <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Import File</h3>
          </div>
          <div class="box-body">
            <form action="<?=base_url('index.php/rekon/importfile2pms2n')?>" method="post" enctype="multipart/form-data">
                <input type="file" name="fileImport" id="fileImport" accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                <?php
                  if ($_alert != NULL) {
                    echo "<h3 class='box-title' style='color: green;'>".$_alert."</h3>";
                  } else {
                    echo " ";
                  }
                ?>
                <hr>
                <div class="file-upload">
                  <label for="upload" class="btn btn-primary btn-block">Upload</label>
                  <input id="upload" class="btn file-upload__input btn-block" type="submit" name="btnSubmit" value="Upload">
            </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
    </section>
  </div>