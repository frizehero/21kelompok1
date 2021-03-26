
<!--CONTENT CONTAINER-->
<div id="page-head">

  <!--Page Title-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <div id="page-title">
    <h1 class="page-header text-overflow">Perbaikan Siswa</h1>
  </div>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End page title-->


  <!--Breadcrumb-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <ol class="breadcrumb">
    <li><a href="#"><i class="demo-pli-home"></i></a></li>
    <li><a href="#">Data</a></li>
    <li>Data Siswa</li>
    <li>Detail Siswa</li>
    <li class="active">Perbaikan Siswa</li>
  </ol>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End breadcrumb-->
  <div class="text-left breadcrumb">
    <div id="demo-custom-toolbar5" class="table-toolbar-left">
      <a class="btn btn-default text-left" type="button" href="javascript:window.history.go(-1);">Kembali</a>
    </div>  
  </div><br>

</div>
<!--===================================================-->
<div class="effect aside-float aside-bright mainnav-sm page-fixedbar page-fixedbar-right">
  <div id="page-head text-light">



    <!--Fixedbar-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End Fixedbar-->



    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-body">
            <div class="panel-heading">
              <h4>Mengurangi Point</h4>
              <p>Memilih Data Point yang digunakan untuk memperbaiki point Siswa</p>
            </div><hr>
            <div class="panel-body">
              <div class="col-sm-3 pull-right">
              </div>
              <!--Profile Widget-->
              <!--===================================================-->
              <div class="col-sm-12">


                <div class="row">
                  <div class="col-sm-3">
                    <?php foreach($tampil as $res) {
                      $id = $res->id_siswa;
                      $gambar = $res->foto_siswa;
                      ?>
                      <div class="pad-ver">
                        <img class="widget-bg img-responsive" src="<?php echo base_url ()?>assets/img/<?php echo $res->foto_siswa?>" style="height: 180px " style="width: 180px" class="img-lg- img-box" alt="Profile Picture">
                        </div><?php } ?>
                      </div>
                      <div class="col-sm-3"><br>
                        <p>Nama :</p>
                        <h4><?php echo $res->nama_siswa?></h4>
                        <p>Kelas :</p>
                        <h4><?php echo $res->kelas?></h4>
                        <p>Jenis Kelamin :</p>
                        <h4><?php echo $res->jenis_kelamin_siswa?></h4>  
                      </div>
                      <div class="row">
                        <div class="col-sm-7 col-lg-3 pull-right">
                          <div class="panel panel-info panel-colorful">
                            <div class="pad-all text-right">
                              <center>TOTAL POINT</center>
                              <h4 class="text-center text-light">17</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>

                <td>Cari Treatment </td>
                <p></p>
                <form action="<?php echo base_url('data_siswa/caritreatment/')?>" method="post" class="col-xs-8 col-sm-7 text-right">
                  <div class="input-group text-right"  style="padding-left: : 5px">
                    <?php if($this->uri->segment(2) != 'caritreatment'){?>
                      <input type="text" autocomplete="off" name="caritreatment" class="form-control" placeholder="Cari">
                    <?php } ?>
                    <?php if($this->uri->segment(2) == 'caritreatment'){
                      $carit = $this->input->post('caritreatment'); ?>
                      <input type="text" autocomplete="off" value="<?= $carit ?>" name="caritreatment" class="form-control " placeholder="Treatment">
                    <?php } ?> 
                    <div class="input-group-btn  text-right"  style="padding-left: : 10px">
                      <button class="btn btn-default" type="submit">cari</button>
                    </div>
                    <a class="btn btn-success form-control"  style="padding-left: : 10px" href="<?php echo base_url('data_siswa/tampiltreatment/'.$res->id_siswa); ?>">
                      <i class="fa fa-refresh" ></i>
                    </a>
                  </div> 
                </center>

              </form><br><br><hr>

              <form action="#" method="post">
                <p>Pilih Treatment :</p>
                <?php foreach($tampil as $res) {
                  $id = $res->id_treatment;
                  ?>
                  <div class="col-sm-3">

                    <!--Profile Widget-->
                    <!--===================================================-->
                    <div class="panel panel-info panel-colorful" style="height: 150px">
                      <div class="pad-all text-left">
                        <a class="panel panel-warning panel-colorful" data-toggle="modal" data-target="#demo-default-modal<?php echo $res->id_treatment?>">
                          <span class="pull-right"><button class="btn btn-lg ion-compose icon-2x"></button></span></a><br><br><br>
                          - <?php echo  $res->point?>
                          <p><?php echo  $res->nama_treatment?></p>

                        </div>
                      </div>                
                    </div>
                    <div class="modal fade" id="demo-default-modal<?php echo $res->id_treatment?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!--Modal Perbaikan-->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                            <h4 class="modal-title">Perbaikan Siswa</h4>
                          </div>
                          <?= form_open_multipart('data_treatment/tambah'); ?>
                          <input type="hidden" name="id_treatment" value="<?php echo $res->id_treatment?>">

                          <!--Modal body--> 
                          <div class="modal-body">

                            <div class="panel-body">

                              <div><h5>Penjelasan Menu :</h5>
                                <p></p>
                                <p>Perbaikan diri dimaksudkan untuk memperbaiki poin siswa yang sudah mencapai pada batas tertentu,maka siswa membutuhkan suatu treatment supaya dapat memperbaiki nilai sikap siswa.</p>
                              </div><hr>
                              <table>
                                <tr>
                                  <td><b>Nama</b></td>
                                  <td>:  <?php echo $res->nama_siswa?></td>
                                </tr>
                                <tr>
                                  <td><b>Kelas</b></td>
                                  <td>:  <?php echo $res->kelas?></td>
                                </tr>
                                <tr>
                                  <td><b>Jenis Kelamin</b></td>
                                  <td>:  <?php echo $res->jenis_kelamin_siswa?></td>
                                </tr>
                              </table>
                              <hr>

                              <div class="col-md-6">
                                <label for="" class="control-label"><b>Nama treatment</b></label>
                                <textarea type="text" disabled name="Keterangan"  placeholder="<?= $res->nama_treatment ?>" class="form-control"></textarea>
                              </div>

                              <div class="col-md-6">
                                <label for="" class="control-label"><b>Point</b> </label>
                                <input type="text" disabled name="Point"  placeholder="point" class="form-control" value="<?= $res->point ?>">
                              </div>

                              <div class="col-md-12">
                                <label for="" class="control-label"><b>Keterangan</b></label>
                                <textarea type="text" name="Keterangan"  placeholder="keterangan" class="form-control"></textarea>
                              </div>

                            </div>


                          </div>

                          <!--Modal footer-->
                          <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                          </div>
                          <?= form_close(); ?>
                        </div>
                      </div>
                    </div>
                  <?php  } ?>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- hapus -->
    <!-- end hapus -->




    <!-- modal edit -->
    <!-- end modal edit -->



    <!--===================================================-->
    <!--End page content-->

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
