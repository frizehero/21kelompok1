    <div id="page-head">

      <!--Page Title-->
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <div id="page-title">
        <h1 class="page-header text-overflow">Data User</h1>
      </div>
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <!--End page title-->


      <!--Breadcrumb-->
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('data_beranda') ?>"><i class="demo-pli-home"></i></a></li>
        <li><a href="#">Data</a></li>
        <li class="active">Data User</li>
      </ol>
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <!--End breadcrumb-->

      <div class="text-right breadcrumb">
        <div id="demo-custom-toolbar5" class="table-toolbar-left">
          <a class="btn btn-default text-left "   data-toggle="modal" data-target="#demo-default-tambah">Tambah User</a>
        </div>
        <form action="<?php echo site_url('data_guru/cariku/') ?>" method="post" class="col-xs-8 col-sm-3 text-right">
          <div class="input-group text-right"  style="padding-left: : 5px">
            <?php if($this->uri->segment(2) != 'cari'){?>
              <input type="text" autocomplete="off" name="cari" class="form-control" placeholder="Cari User">
            <?php } ?>
            <?php if($this->uri->segment(2) == 'cari'){
              $cari = $this->input->post('cari'); ?>
              <input type="text" autocomplete="off" value="<?= $cari ?>" name="cari" class="form-control " placeholder="Cari User">
            <?php } ?> 
            <div class="input-group-btn  text-right"  style="padding-left: : 10px">
              <button class="btn btn-default" type="submit">cari</button>
            </div>
            <a class="btn btn-success form-control"  style="padding-left: : 10px" href="<?php echo base_url('data_guru'); ?>">
              <i class="fa fa-refresh" ></i>
            </a>
          </div>
        </form>
      </div>
    </div><br><br><br>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">

      <div class="row">

       <?php foreach($row as $res) {
        $id = $res->id_guru;
        $level = $res->level;
        $gambar = $res->foto_guru;
        ?>
        <div class="col-sm-4 col-md-3">

          <!--Profile Widget-->
          <!--===================================================-->
          <div class="panel widget">
            <?php if($res->level == '1'){ ?>
              <div class="widget-header bg-warning text-center">
              <?php } else{ ?>
                <div class="widget-header bg-info text-center">
                <?php } ?>


                <h4 class="text-light mar-no pad-top"><?= $res->nama_guru?></h4>
                <?php if ($res->level=='1') {?>
               <p class="mar-btm">admin</p>
                <?php } else{ ?>
                  <p class="mar-btm">guru</p>
                <?php }?>

              </div> 
              <div class="widget-body">
                <img alt="Profile Picture" class="widget-img img-circle img-border-light" src="<?php echo base_url ()?>assets/img/<?php echo $res->foto_guru ?>">

                <div class="list-group bg-trans mar-no">
                    <p class="pull-right"><?= $res->nip?></p>
                    <p class="text-semibold">Nip</p>
                    <p class="pull-right"><?= $res->tgl_lahir_guru?></p>
                    <p class="text-semibold">Tgl Lahir</p>
                    <p class="pull-right"><?= $res->alamat_guru?></p>
                    <p class="text-semibold">Alamat</p>
                    <p class="pull-right"><?= $res->jenis_kelamin_guru?></p>
                    <p class="text-semibold">Jenis Kelamin</p>
                    <p class="pull-right"><?= $res->username?></p>
                    <p class="text-semibold">Username</p>
                    <p class="pull-right">*********</p>
                    <p class="text-semibold">Password</p>

                    <!-- <table border="0">
                      <tr>
                        <td><b>Nip</b></td>
                        <td class="text-right"><?= $res->nip?></td>
                      </tr>
                      <tr>
                        <td><b>Tgl Lahir</b></td>
                        <td class="text-right"><?= $res->tgl_lahir_guru?></td>
                      </tr>
                      <tr>
                        <td><b>Alamat</b></td>
                        <td class="text-right"><?= $res->alamat_guru?></td>
                      </tr>
                      <tr>
                        <td><b>Jenis Kelamin </b></td>
                        <td class="text-right"><?= $res->jenis_kelamin_guru?></td>
                      </tr>
                      <tr>
                        <td><b>Username</b></td>
                        <td class="text-right"><?= $res->username?></td>
                      </tr>
                      <tr>
                        <td><b>Password</b></td>
                        <td class="text-right"><?= $res->password?></td>
                      </tr>
                    </table> -->
                   
                 <div class="text-center pad-to">
                  <div class="btn-group">
                    <a data-toggle="modal" data-target="#demo-default-modal2<?php echo $res->id_guru?>" class="btn btn-sm btn-danger">
                      <span class="fa fa-trash"></span>
                    &nbsp;Hapus</a>
                    <a data-toggle="modal" data-target="#demo-default-modal1<?php echo $res->id_guru?>" class="btn btn-sm btn-success">
                      <span class="fa fa-edit"></span>
                    &nbsp;Edit</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--===================================================-->
        </div>

        <div class="modal fade" id="demo-default-modal1<?php echo $res->id_guru?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <!--Modal Update-->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <p class="modal-title text-1x text-semibold">Update</p>
              </div>
              <?= form_open_multipart('data_guru/edit'); ?>
              <input type="hidden" name="id_guru" value="<?php echo $res->id_guru?>">
              <input type="hidden" name="id_user" value="<?php echo $res->id_user?>">

              <!--Modal body--> 
              <div class="modal-body">

                <div class="panel-body">

                  <div class="col-md-6" style="margin-top: 2%">
                    <label for="" class="control-label text-muted mar-no">NIP</label>
                    <input type="text" name="nip" placeholder="NIP" class="form-control" value="<?= $res->nip?>" required="">
                  </div>
                  <div class="col-md-6" style="margin-top: 2%">
                    <label for="" class="control-label text-muted mar-no">Nama Guru</label>
                    <input type="text" name="nama_guru" placeholder="Nama Guru" class="form-control" value="<?= $res->nama_guru?>" required="">
                  </div>
                  <div class="col-md-6" style="margin-top: 2%">
                    <label for="" class="control-label text-muted mar-no">Tgl Lahir Guru</label>
                    <input type="date" name="tgl_lahir_guru" placeholder="Tgl Lahir Guru" class="form-control" value="<?= $res->tgl_lahir_guru?>" required="">
                  </div>
                  <div class="col-md-6" style="margin-top: 2%">
                    <label for="" class="control-label text-muted mar-no">Alamat Guru</label>
                    <input type="text" name="alamat_guru" placeholder="Alamat Guru" class="form-control" value="<?= $res->alamat_guru?>" required="">
                  </div>
                  <div class="col-md-6" style="margin-top: 2% ">
                    <?php $level = $res->level; ?>
                    <label for="" class="control-label text-muted mar-no">Level</label>
                    <select name="level" required="" class="form-control">
                      <option <?php echo ($level == '1') ? "selected": ""?> value="1">Admin
                      </option>
                      <option <?php echo ($level == '2') ? "selected": ""?> value="2">Guru
                      </option>
                    </select>
                  </div>
                  <div class="col-md-6 text-muted" style="margin-top: 2%">
                    <label for="" class="control-label text-muted mar-no">Username</label>
                    <input type="text" name="username" placeholder="Username" value="<?= $res->username?>" class="form-control" required="">
                  </div>
                  <div class="col-md-6 text-muted" style="margin-top: 2%">
                    <?php $jenis_kelamin_guru = $res->jenis_kelamin_guru; ?>
                    <label for="jk" required="" class="control-label text-muted mar-no">Jenis Kelamin Guru</label><br>
                    <input <?php echo ($jenis_kelamin_guru == 'Laki-Laki') ? "checked": ""?>  id="jk" type="radio" name="jenis_kelamin_guru" value="Laki-Laki" > Laki-Laki
                    <input <?php echo ($jenis_kelamin_guru == 'Perempuan') ? "checked": ""?>  id="jk" type="radio" name="jenis_kelamin_guru" value="Perempuan" > Perempuan
                  </div>
                  <div class="col-md-6" style="margin-top: 2%">
                    <label for="" class="control-label text-muted mar-no">Password</label>
                    <input type="text" name="password" placeholder="Password" value="<?= $res->password?>" class="form-control" required="">
                  </div>
                  <div class="col-md-6" style="margin-top: 2%">
                    <label for="" class="control-label text-muted mar-no">Foto Guru</label>
                    <input type="file" name="foto_guru" placeholder="Foto Guru" class="form-control"  onchange="tampilkanPreview(this,'preview')">
                  </div>
                  <div class="col-md-6 " style="margin-top: 2%" >
                    <label for="" class="control-label text-muted">Preview Foto Profile</label>
                    <img src="<?= base_url(); ?>assets/img/<?= $res->foto_guru ?>" width="150px" />
                  </div>

                </div>

              </div>
              <input type="hidden" name="fotomu" value="<?php echo $res->foto_guru ?>">

              <!--Modal footer-->
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
              </div>
              <?= form_close(); ?>
            </div>
          </div>
        </div>
        <!-- hapus -->
        <div class="modal fade" id="demo-default-modal2<?php echo $res->id_guru?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <!--Modal header-->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <p class="modal-title text-1x text-semibold">Hapus</p>
              </div>

              <!--Modal body-->
              <div class="modal-body">
                <p class="text-semibold text-muted mar-no"></p>
                <p class="text-semibold text-muted mar-no">Anda Yakin Ingin Menghapus <b><?php echo $res->nama_guru ?></b> ? </p>
                <br>



              </div>

              <!--Modal footer-->
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                <a class="btn btn-danger" href="<?php echo base_url('data_guru/hapus/'. $res->id_guru) ?>">Hapus Data</a>
              </div>
            </div>
          </div>
        </div>
        <!-- end hapus -->

      <?php } ?>
    </div>

  </div>

  <?php echo $pagination; ?>

  

  <div class="modal fade" id="demo-default-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <!--Modal Update-->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
          <h4 class="modal-title">Tambah</h4>
        </div>

        <?= form_open_multipart('data_guru/tambah'); ?>
        <!--Modal body--> 
        <div class="modal-body">

          <div class="panel-body">

            <div class="col-md-6" style="margin-top: 2%">
              <label for="" class="control-label">NIP</label>
              <input type="text" name="nip" placeholder="NIP" class="form-control" required="">
            </div>
            <div class="col-md-6" style="margin-top: 2%">
              <label for="" class="control-label">Nama Guru</label>
              <input type="text" name="nama_guru" placeholder="Nama Guru" class="form-control" required="">
            </div>
            <div class="col-md-6" style="margin-top: 2%">
              <label for="" class="control-label">Tgl Lahir Guru</label>
              <input type="date" name="tgl_lahir_guru" placeholder="Tgl Lahir Guru" class="form-control" required="">
            </div>
            <div class="col-md-6" style="margin-top: 2%">
              <label for="" class="control-label">Alamat Guru</label>
              <input type="text" name="alamat_guru" placeholder="Alamat Guru" class="form-control" required="">
            </div>
            <div class="col-md-6" style="margin-top: 2% ">
              <label for="" class="control-label">Level</label>
              <select name="level" required="" class="form-control">
                <option  value="1">Admin
                </option>
                <option  value="2">Guru
                </option>
              </select>
            </div>
            <div class="col-md-6" style="margin-top: 2%">
              <label for="" class="control-label">Username</label>
              <input type="text" name="username" placeholder="Username" class="form-control" required="">
            </div>
            <div class="col-md-6" style="margin-top: 2%" >
              <label for="jk" required="" class="control-label">Jenis Kelamin Guru</label><br>
              <input id="jk" type="radio" name="jenis_kelamin_guru" value="Laki-Laki" > Laki-Laki
              <input id="jk" type="radio" name="jenis_kelamin_guru" value="Perempuan" > Perempuan
            </div>


            <div class="col-md-6" style="margin-top: 2%">
              <label for="" class="control-label">Password</label>
              <input type="text" name="password" placeholder="Password" class="form-control" required="">
            </div>
            <div class="col-md-6" style="margin-top: 2%">
              <label for="" class="control-label">Foto Guru</label>
              <input type="file" name="foto_guru" placeholder="Foto Guru" class="form-control"  onchange="tampilkanPreview(this,'preview')">
            </div>
            <div class="col-md-6 " style="margin-top: 2%">
              <label for="" class="control-label">Preview Foto Profile</label>
              <img id="preview" width="150px" />
            </div>

          </div>

        </div>

        <!--Modal footer-->
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
        <?= form_close(); ?>

      </div>
    </div>
  </div>


  <!--jQuery [ REQUIRED ]-->
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

  <script>
    $(document).ready(function () {


      $('#demo-dp-txtinputmasukkerja input').datepicker({
        format: "yyyy-m-d",
        todayBtn: "linked",
        todayHighlight: true
      });

      $('#demo-dp-txtinputakhirkerja input').datepicker({
        format: "yyyy-m-d",
        todayBtn: "linked",
        todayHighlight: true
      });



    });
  </script>


  <script type="text/javascript">


    function tampilkanPreview(userfile,idpreview)
    {
      var gb = userfile.files;
      for (var i = 0; i < gb.length; i++)
      {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview=document.getElementById(idpreview);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType))
        {
      //jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview);
    }
    else
    {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
    }
  }
  function tampilkanPreview1(userfile,idpreview1)
  {
    var gb = userfile.files;
    for (var i = 0; i < gb.length; i++)
    {
      var gbPreview1 = gb[i];
      var imageType = /image.*/;
      var preview1=document.getElementById(idpreview1);
      var reader = new FileReader();
      if (gbPreview1.type.match(imageType))
      {
      //jika tipe data sesuai
      preview1.file = gbPreview1;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview1);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview1);
    }
    else
    {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
    }
  }
</script>