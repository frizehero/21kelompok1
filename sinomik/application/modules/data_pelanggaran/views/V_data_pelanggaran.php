  <!--CONTENT CONTAINER-->
  <!--===================================================-->

  <div id="page-head">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
      <h1 class="page-header text-overflow">pelanggaran</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('data_beranda') ?>"><i class="demo-pli-home"></i></a></li>
      <li><a href="#">Peraturan</a></li>
      <li class="active">pelanggaran</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

    <div class="text-right breadcrumb">
     <div id="demo-custom-toolbar5" class="table-toolbar-left">
        <a class="btn btn-default text-left "   data-toggle="modal" data-target="#demo-default-tambah">Tambah</a>
        <a class="btn btn-info text-left "   data-toggle="modal" data-target="#demo-default-import">Import</a>
      </div>
      <form action="<?php echo site_url('data_pelanggaran/cariku/') ?>" method="post" class="col-xs-8 col-sm-3 text-right">
        <div class="input-group text-right"  style="padding-left: : 5px"s>
          <?php if($this->uri->segment(2) != 'cari'){?>
            <input type="text" autocomplete="off" name="cari" class="form-control" placeholder="Cari pelanggaran" required="">
          <?php } ?>
          <?php if($this->uri->segment(2) == 'cari'){
            $cari = $this->input->post('cari'); ?>
            <input type="text" autocomplete="off" value="<?= $cari ?>" name="cari" class="form-control " placeholder="Cari pelanggaran" required="">
          <?php } ?> 
          <div class="input-group-btn  text-right"  style="padding-left: : 10px">
            <button class="btn btn-default" name="submit" type="submit">cari</button>
          </div>
          <a class="btn btn-success form-control"  style="padding-left: : 10px" href="<?php echo base_url('data_pelanggaran'); ?>">
            <i class="fa fa-refresh" ></i>
          </a>
        </div> 
      </center>

    </form>
  </div>
</div>

<div id="page-content">

  <div class="tab-base">
    <ul class="nav nav-tabs tabs-right">
      <li class="active">
        <a href="<?php echo base_url('data_pelanggaran/index/'); ?>">Sikap Perilaku</a>
      </li>
      <li>
        <a href="<?php echo base_url('data_pelanggaran/tampil1/'); ?>">Kerapian</a>
      </li>
      <li>
        <a  href="<?php echo base_url('data_pelanggaran/tampil2/'); ?>">Kerajinan</a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="row">

        <div id="demo-rgt-tab-1" class="tab-pane fade active in">

          <div class="col-sm-12">
            <div class="row">
             <?php foreach($row as $res) {
              $id = $res->id_pelanggaran;
              ?>
              <div class="col-sm-3">

                <!--Profile Widget-->
                <!--===================================================-->
                <div class="panel panel-info panel-colorful" style="height: 200px ">
                  <div class="pad-all text-left"><br>
                    <span class="pull-right">+ <?php echo $res->point ?> point</span><br>
                    <p><?php echo $res->nama_pelanggaran ?></p>

                    <div class="btn-group btn-group-justified pad-top">

                     <span>
                      <a data-toggle="modal" data-target="#demo-default-modal1<?php echo $res->id_pelanggaran?>" class=" btn btn-warning btn-sm">
                        <span class="fa fa-edit"></span>
                        &nbsp;Edit
                      </a>
                    </span>
                    <span>
                     <a data-toggle="modal" data-target="#demo-default-modal2<?php echo $res->id_pelanggaran?>" class=" btn btn-danger btn-sm">
                      <span class="fa fa-trash"></span>
                      &nbsp;Hapus
                    </a>
                  </span> 
                </div>
              </div>
            </div>
          </div> 
          <div class="modal fade" id="demo-default-modal1<?php echo $res->id_pelanggaran?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                <!--Modal Update-->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                  <h4 class="modal-title">Update</h4>
                </div>
                <?= form_open_multipart('data_pelanggaran/edit'); ?>
                <input type="hidden" name="id_pelanggaran" value="<?php echo $res->id_pelanggaran?>">

                <!--Modal body--> 
                <div class="modal-body">

                  <div class="panel-body">

                    <div class="col-md-6">
                      <label for="" class="control-label">Nama pelanggaran</label>
                      <input type="text" name="nama_pelanggaran" placeholder="Nama pelanggaran" class="form-control" value="<?= $res->nama_pelanggaran ?>">
                    </div>

                    <div class="col-md-6">
                      <label for="" class="control-label">point</label>
                      <input type="text" name="point"  placeholder="point" class="form-control" value="<?= $res->point ?>">
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

          <div class="modal fade" id="demo-default-modal2<?php echo $res->id_pelanggaran?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
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
                  <p>Anda Yakin Ingin Menghapus <b><?php echo $res->nama_pelanggaran ?></b> ? </p>
                  <br>



                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                  <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                  <a class="btn btn-danger" href="<?php echo base_url('data_pelanggaran/hapus/'. $res->id_pelanggaran) ?>">Hapus pelanggaran</a>
                </div>
              </div>
            </div>
          </div>


        <?php } ?> 
      </div>

    </div>
  </div>

</div>

<!-- import -->
<div class="modal fade" id="demo-default-import" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal Update-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Tambah</h4>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?php echo site_url('data_pelanggaran/importfile/') ?>">
        <div class="modal-body">

        <div class="panel-body">

          <div class="col-md-6">
            <label for="" class="control-label">Pilih File</label>
            <input type="file" name="uploadFile"  accept=".xlsx, .xls" value="" required=""/><br><br>
          </div>

        </div>


      </div>

      <!--Modal footer-->
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <input type="submit" name="submit" class="btn btn-primary" value="Upload">
      </div>
      </form>

    </div>

  </div>
</div>
<!-- end import -->

<!-- tambah -->
<div class="modal fade" id="demo-default-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal Update-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Tambah</h4>
      </div>

      <?= form_open_multipart('data_pelanggaran/tambah'); ?>
      <!--Modal body--> 
      <div class="modal-body">

        <div class="panel-body">

          <div class="col-md-6">
            <label for="" class="control-label">Nama pelanggaran</label>
            <input type="text" name="nama_pelanggaran" placeholder="Nama pelanggaran" class="form-control">
          </div>

          <div class="col-md-6">
            <label for="" class="control-label">point</label>
            <input type="text" name="point" rows="5" placeholder="point" class="form-control">
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
</div>
</div>
</div>
<!-- end tambah -->


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