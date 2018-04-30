 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Form Provisioning</h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pekerjaan</h3>
            </div>
            <form action="<?php echo base_url()."index.php/prov/insert_prov";?>" method="post" enctype="multipart/form-data">
            <div class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID ALPRO</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan ID ALPRO" name="id_alpro" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">ND</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan ND" name="nd" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">ND Inet</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan ND Internet" name="nd_inet" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Citem</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan citem" name="citem" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kecepatan</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan kecepatan" name="ked" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">STO</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan STO" name="sto" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">SO</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan SO" name="so" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Status Indihome</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan status Indihome" name="status_ih" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Reg</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan tanggal registrasi" name="tgl_reg" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Status</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan tanggal status" name="tgl_status" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Umur by Tgl Reg</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan umur by tanggal registrasi" name="umur" required/>
                  </div>
                </div>

              </div>
              </div>
          </div>
        </div>

        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pelanggan</h3>
            </div>
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ketikkan nama pelanggan" name="nama" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kcontact</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="number" placeholder="Ketikkan kcontact" name="kcontact" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Jalan</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="number" placeholder="Ketikkan jalan" name="jalan" required/>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Distrik</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="number" placeholder="Ketikkan distrik" name="distrik" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kota</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="number" placeholder="Ketikkan kota" name="kota" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tipe</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="number" placeholder="Ketikkan panjang kabel pvc" name="kabel_pvc" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">STB +</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="number" placeholder="Ketikkan jumlah stb tambahan" name="stb_kedua" required/>
                  </div> buah
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tgl VA</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="date" name="tgl_va" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tgl PS</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="date" name="tgl_ps" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Redaman</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="number" placeholder="Ketikkan jumlah stb tambahan" name="hasil_cek_redaman" required/>
                  </div> buah
                </div>

              </div>
              </div>
          </div>
        </div>

        <div class="col-sm-12">
        <div class="box box-primary">
              <div class="box-body">
              <div class="form-group">
                  <label>Upload Berita Acara</label>
                  <input type="file" name="ba_psb">

                  <p class="help-block">Upload berita acara dengan format nama tanpa spasi dan berekstensi jpg atau pdf.</p>
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
        </div>
        </form>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->