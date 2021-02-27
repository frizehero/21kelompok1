 

<div id="page-head">
  <!--Page Title-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <div id="page-title">
    <h1 class="page-header text-overflow">Data user</h1>
  </div>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End page title-->


  <!--Breadcrumb-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <ol class="breadcrumb">
    <li><a href="#"><i class="demo-pli-home"></i></a></li>
    <li><a href="#">Data</a></li>
    <li class="active">Data user</li>
  </ol>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End breadcrumb-->

  <div class="text-right breadcrumb">
    <div id="demo-custom-toolbar5" class="table-toolbar-left">
      <a class="btn btn-default text-left "   data-toggle="modal" data-target="#demo-default-tambah">Tambah user</a>
    </div>
    <form action="<?php echo site_url('data_user/cari') ?>" method="post" class="col-xs-8 col-sm-3 text-right">
      <div class="input-group text-right"  style="padding-left: : 5px">
        <?php if($this->uri->segment(2) != 'cari'){?>
          <input type="text" autocomplete="off" name="cari" class="form-control" placeholder="Cari user">
        <?php } ?>
        <?php if($this->uri->segment(2) == 'cari'){
          $cari = $this->input->post('cari'); ?>
          <input type="text" autocomplete="off" value="<?= $cari ?>" name="cari" class="form-control " placeholder="Outlet">
        <?php } ?> 
        <div class="input-group-btn  text-right"  style="padding-left: : 10px">
          <button class="btn btn-default" type="submit">cari</button>
        </div>
        <a class="btn btn-success form-control"  style="padding-left: : 10px" href="<?php echo base_url('data_user'); ?>">
          <i class="fa fa-refresh" ></i>
        </a>
      </div> 
    </center>

  </form>

</div><br><br><br>


<!--Page content-->
<!--===================================================-->
<div id="page-content">
 <?php foreach($tampil as $res) {
  $id = $res->id_user;
  ?>
  <div class="row">
    <div class="col-sm-4 col-md-3">

      <!--Profile Widget-->
      <!--===================================================-->
      <div class="panel widget">
        <div class="widget-header bg-warning text-center">
          <h4 class="text-light mar-no pad-top">Ralph West</h4>
          <p class="mar-btm">Admin</p>
        </div>
        <div class="widget-body">
          <img alt="Profile Picture" class="widget-img img-circle img-border-light" src="<?php echo base_url(); ?>assets/img/1.png">

          <div class="list-group bg-trans mar-no">
            <p class="text-muted mar-no">
              <b>Nip </b>1412<br>
              <b>Tgl Lahir </b>1-1-1989<br>
              <b>Alamat </b>Tuban<br>
              <b>Jenis Kelamin </b>Laki-Laki<br>
              <b>User Name </b>tiger<br>
              <b>password </b>nixon123
            </p>
            <div class="text-center pad-to">
              <div class="btn-group">
               <span>
                 <a data-toggle="modal" data-target="#demo-default-modal2<?php echo $res->id_user?>" class="btn btn-sm btn-danger">
                  <span class="fa fa-edit"></span>
                &nbsp;Hapus</a>
                <a data-toggle="modal" data-target="#demo-default-modal1<?php echo $res->id_user?>" class="btn btn-sm btn-success">
                  <span class="fa fa-trash"></span>
                &nbsp;Edit</a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--===================================================-->
  </div>
  <div class="col-sm-4 col-md-3">
    <!--Profile Widget-->
    <!--===================================================-->
    <div class="panel widget">
      <div class="widget-header bg-info text-center">
        <h4 class="text-light mar-no pad-top">Ralph West</h4>
        <p class="mar-btm">Guru</p>
      </div>
      <div class="widget-body">
        <img alt="Profile Picture" class="widget-img img-circle img-border-light" src="<?php echo base_url(); ?>assets/img/1.png">

        <div class="list-group bg-trans mar-no">
          <p class="text-muted mar-no">
            <b>Nip </b>1412<br>
            <b>Tgl Lahir </b>1-1-1989<br>
            <b>Alamat </b>Tuban<br>
            <b>Jenis Kelamin </b>Laki-Laki<br>
            <b>User Name </b>tiger<br>
            <b>password </b>nixon123
          </p>
          <div class="text-center pad-to">
            <div class="btn-group">
              <span>
               <a data-toggle="modal" data-target="#demo-default-modal2<?php echo $res->id_user?>" class="btn btn-sm btn-danger">
                <span class="fa fa-edit"></span>
              &nbsp;Hapus</a>
              <a data-toggle="modal" data-target="#demo-default-modal1<?php echo $res->id_user?>" class="btn btn-sm btn-success">
                <span class="fa fa-trash"></span>
              &nbsp;Edit</a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===================================================-->
</div>
<div class="modal fade" id="demo-default-modal1<?php echo $res->id_user?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">

    <!--Modal Update-->
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
      <h4 class="modal-title">Update</h4>
    </div>
    <?= form_open_multipart('data_user/edit'); ?>
    <input type="hidden" name="id_user" value="<?php echo $res->id_user?>">

    <!--Modal body--> 
    <div class="modal-body">

      <div class="panel-body">

        <div class="col-md-6">
          <label for="" class="control-label">Nama Sekolah</label>
          <input type="text" name="nama_sekolah" placeholder="Nama Sekolah" class="form-control" value="<?= $res->nama_guru ?>">
        </div>
        <div class="col-md-6" >
          <label for="" class="control-label">Logo</label>
          <input type="file" name="gambar" placeholder="Logo Sekolah" class="form-control" id="userfile" onchange="tampilkanPreview(this,'preview')">
        </div>
        <div class="col-md-6" style="margin-top: 2%">
          <label for="" class="control-label">Keterangan</label>
          <textarea type="text" name="keterangan" rows="5" placeholder="Keterangan" class="form-control"><?= $res->keterangan ?></textarea>
        </div>
        <div class="col-md-6 " style="margin-top: 2%">
          <label for="" class="control-label">Preview Foto Profile</label>
          <img  src="<?= base_url(); ?>assets/img/<?= $res->logo ?>" width="150px" />
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
<!-- hapus -->
<div class="modal fade" id="demo-default-modal2<?php echo $res->id_user?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal header-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Hapus</h4>
      </div>

      <!--Modal body-->
      <div class="modal-body">
        <p class="text-semibold text-main"></p>
        <p>Anda Yakin Ingin Menghapus <b><?php echo $res->nama_guru ?></b> ? </p>
        <br>



      </div>

      <!--Modal footer-->
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
        <a class="btn btn-danger" href="<?php echo base_url('data_user/hapus/'. $res->id_user) ?>">Hapus Sekolah</a>
      </div>
    </div>
  </div>
</div>
<!-- end hapus -->

<?php } ?>
</div>

</div>

<div class="modal fade" id="demo-default-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal Update-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Tambah</h4>
      </div>

      <?= form_open_multipart('data_user/tambah'); ?>
      <!--Modal body--> 
      <div class="modal-body">

        <div class="panel-body">

          <div class="col-md-6">
            <label for="" class="control-label">NIS</label>
            <input type="text" name="nis" placeholder="NIS" class="form-control" required="">
          </div>
          <div class="col-md-6">
            <label for="" class="control-label">Nama siswa</label>
            <input type="text" name="nama_siswa" placeholder="Nama siswa" class="form-control" required="">
          </div>
          <div class="col-md-6" style="margin-top: 2%">
            <label for="" class="control-label">Tgl Lahir Siswa</label>
            <input type="date" name="tanggal_lahir_siswa" placeholder="Tgl Lahir Siswa" class="form-control" required="">
          </div>
          <div class="col-md-6" style="margin-top: 2%">
            <label for="" class="control-label">Alamat Siswa</label>
            <input type="text" name="alamat_siswa" placeholder="Alamat Siswa" class="form-control" required=""><br>
          </div>
          <div class="col-md-6" >
            <label for="jk" required="" class="control-label">Jenis Kelamin Siswa</label><br>
            <input id="jk" type="radio" name="jenis_kelamin_siswa" value="Laki-Laki" > Laki-Laki
            <input id="jk" type="radio" name="jenis_kelamin_siswa" value="Perempuan" > Perempuan
          </div>
          <div class="col-md-6" >
            <label for="kelas" class="control-label">Kelas Siswa</label>
            <select name="kelas" id="kelas" class="form-control" required="">
              <option value="">Kelas</option>
              <option value="X">X</option>
              <option value="XI">XI</option>
              <option value="XII">XII</option>
            </select>
          </div>
          <div class="col-md-6" style="margin-top: 2%">
            <label for="agama" class="control-label">Agama Siswa</label>
            <select name="agama" id="agama" class="form-control" required="">
              <option value="">Agama</option>
              <option value="Islam">Islam</option>
              <option value="Hindu">Hindu</option>
              <option value="Budha">Budha</option>
              <option value="Konghucu">Konghucu</option>
              <option value="Kristen">Kristen</option>
            </select>
          </div>
          <div class="col-md-6" style="margin-top: 2%">
            <label for="jurusan" class="control-label">Jurusan Siswa</label>
            <select name="jurusan" id="jurusan" class="form-control" required="">
              <option value="">Jurusan</option>
              <option value="RPL">RPL</option>
              <option value="TKJ">TKJ</option>
              <option value="TPM">TPM</option>
              <option value="TITL">TITL</option>
              <option value="TIPK">TIPK</option>
              <option value="BB">TB</option>
              <option value="TKR">TKR</option>
            </select>
          </div>
          <div class="col-md-6" >
            <label for="" class="control-label">Gambar siswa</label>
            <input type="file" name="foto_siswa" placeholder="Gambar Siswa" class="form-control"  onchange="tampilkanPreview(this,'preview')">
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