  <!--CONTENT CONTAINER-->
  <!--===================================================-->

  <div id="page-head">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
      <h1 class="page-header text-overflow">Treatment</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
      <li><a href="data_beranda"><i class="demo-pli-home"></i></a></li>
      <li><a href="#">Peraturan</a></li>
      <li class="active">Treatment</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

    <div class="text-right breadcrumb">
      <div id="demo-custom-toolbar5" class="table-toolbar-left">
        <button class="btn btn-default text-left "   data-toggle="modal" data-target="#demo-default-tambah">
          Tambah
        </button>
      </div>
      <form action="<?php echo site_url('data_treatment/cariku/') ?>" method="post" class="col-xs-8 col-sm-3 text-right">
        <div class="input-group text-right"  style="padding-left: : 5px">
          <?php if($this->uri->segment(2) != 'cari'){?>
            <input type="text" autocomplete="off" name="cari" class="form-control" placeholder="Cari treatment" required="">
          <?php } ?>
          <?php if($this->uri->segment(2) == 'cari'){
            $cari = $this->input->post('cari'); ?>
            <input type="text" autocomplete="off" value="<?= $cari ?>" name="cari" class="form-control " placeholder="Cari treatment" required="">
          <?php } ?> 
          <div class="input-group-btn  text-right"  style="padding-left: : 10px">
            <button class="btn btn-default" name="submit" type="submit">cari</button>
          </div>
          <a class="btn btn-success form-control"  style="padding-left: : 10px" href="<?php echo base_url('data_treatment'); ?>">
            <i class="fa fa-refresh" ></i>
          </a>
        </div> 
      </center>

    </form>
  </div>
</div><br><br><br>

<div id="page-content">

  <div class="row">

    <div class="col-sm-12">
      <div class="row">
       <?php foreach($row as $res) {
        $id = $res->id_treatment;
        ?>
        <div class="col-sm-3">

          <!--Profile Widget-->
          <!--===================================================-->
          <div class="panel panel-info panel-colorful" style="height: 150px">
            <div class="pad-all text-left">
              <span class="pull-right"></span><br>
              <p><?php echo $res->nama_treatment ?></p>

              <div class="btn-group btn-group-justified pad-top">

               <span>
                <a data-toggle="modal" data-target="#demo-default-modal1<?php echo $res->id_treatment?>" class=" btn btn-warning btn-sm">
                  <span class="fa fa-edit"></span>
                  &nbsp;Edit
                </a>
              </span>
              <span>
               <a data-toggle="modal" data-target="#demo-default-modal2<?php echo $res->id_treatment?>" class=" btn btn-danger btn-sm">
                <span class="fa fa-trash"></span>
                &nbsp;Hapus
              </a>
            </span> 
          </div>
        </div>
      </div>
    </div> 
    <div class="modal fade" id="demo-default-modal1<?php echo $res->id_treatment?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <!--Modal Update-->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
            <h4 class="modal-title">Update</h4>
          </div>
          <?= form_open_multipart('data_treatment/edit'); ?>
          <input type="hidden" name="id_treatment" value="<?php echo $res->id_treatment?>">

          <!--Modal body--> 
          <div class="modal-body">

            <div class="panel-body">

              <div class="col-md-6">
                <label for="" class="control-label">Nama treatment</label>
                <input type="text" name="nama_treatment" placeholder="Nama treatment" class="form-control" value="<?= $res->nama_treatment ?>">
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

    <div class="modal fade" id="demo-default-modal2<?php echo $res->id_treatment?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
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
            <p>Anda Yakin Ingin Menghapus <b><?php echo $res->nama_treatment ?></b> ? </p>
            <br>



          </div>

          <!--Modal footer-->
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
            <a class="btn btn-danger" href="<?php echo base_url('data_treatment/hapus/'. $res->id_treatment) ?>">Hapus treatment</a>
          </div>
        </div>
      </div>
    </div>

  <?php } ?> 

</div>
</div>
</div>

</div><hr>
<?php echo $pagination; ?>
<!-- tambah -->
<div class="modal fade" id="demo-default-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal Update-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Tambah</h4>
      </div>

      <?= form_open_multipart('data_treatment/tambah'); ?>
      <!--Modal body--> 
      <div class="modal-body">

        <div class="panel-body">

          <div class="col-md-6">
            <label for="" class="control-label">Nama treatment</label>
            <input type="text" name="nama_treatment" placeholder="Nama treatment" class="form-control">
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