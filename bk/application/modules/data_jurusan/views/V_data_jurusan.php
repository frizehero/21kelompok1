  <!--CONTENT CONTAINER-->
  <!--===================================================-->
  <div id="page-head">
  	<!--Page Title-->
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<div id="page-title">
  		<h1 class="page-header text-overflow">Data Jurusan</h1>
  	</div>
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<!--End page title-->


  	<!--Breadcrumb-->
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<ol class="breadcrumb">
  		<li><a href="#"><i class="demo-pli-home"></i></a></li>
  		<li><a href="#">Data</a></li>
  		<li class="active">Data Jurusan</li>
  	</ol><br>
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<!--End breadcrumb-->

  	<div class="text-right breadcrumb">
  		<div id="demo-custom-toolbar5" class="table-toolbar-left">
  			
  		</div>
      <form action="<?php echo site_url('data_jurusan/cariku/') ?>" method="post" class="col-xs-8 col-sm-3 text-right">
        <div class="input-group text-right"  style="padding-left: : 5px">
          <?php if($this->uri->segment(2) != 'cari'){
           $cari = $this->input->post('cari');?>
           <input type="text" autocomplete="off" name="cari" value="<?php echo $cari ?>" class="form-control" placeholder="Cari Siswa" required="">
         <?php } ?>
         <?php if($this->uri->segment(2) == 'cari'){
          $cari = $this->input->post('cari'); ?>
          <input type="text" autocomplete="off" value="<?php echo $cari ?>" name="cari" class="form-control " placeholder="Cari Siswa" required="">
        <?php } ?> 
        <div class="input-group-btn  text-right"  style="padding-left: : 10px">
          <button class="btn btn-default" name="submit" type="submit">cari</button>
        </div>
        <a class="btn btn-success form-control"  style="padding-left: : 10px" href="<?php echo base_url('data_jurusan'); ?>">
          <i class="fa fa-refresh" ></i>
        </a>
      </div> 

    </form>
  </div>


  <div id="page-content text-black"><br><br>

    <div id="page-content">
      <div class="row">
        <?php foreach($filter_jur as $res) {
          $id = $res->id_jurusan;
          ?>
          <div class="col-md-4">
          <?php if ($res->id_jurusan=='1') { ?>
          <div class="panel panel-info panel-colorful media middle pad-all ">
          <?php } ?>

          <?php if ($res->id_jurusan=='2') { ?>
          <div class="panel panel-info panel-colorful media middle pad-all ">
          <?php } ?>

          <?php if ($res->id_jurusan=='3') { ?>
          <div class="panel panel-success panel-colorful media middle pad-all ">
          <?php } ?>

          <?php if ($res->id_jurusan=='4') { ?>
          <div class="panel panel-warning panel-colorful media middle pad-all ">
          <?php } ?>

          <?php if ($res->id_jurusan=='5') { ?>
          <div class="panel panel-primary panel-colorful media middle pad-all ">
          <?php } ?>

          <?php if ($res->id_jurusan=='6') { ?>
          <div class="panel panel-pink panel-colorful media middle pad-all ">
          <?php } ?>

          <?php if ($res->id_jurusan=='7') { ?>
          <div class="panel panel-danger panel-colorful media middle pad-all ">
          <?php } ?>


          <div class="media-left">
            <?php if ($res->id_jurusan == '1') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswarpl; ?></p>
              </div>
            <?php } ?>
            <?php if ($res->id_jurusan == '2') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswatkj; ?></p>
              </div>
            <?php } ?>
            <?php if ($res->id_jurusan == '3') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswatpm; ?></p>
              </div>
            <?php } ?>
            <?php if ($res->id_jurusan == '4') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswatitl; ?></p>
              </div>
            <?php } ?>
            <?php if ($res->id_jurusan == '5') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswatipk; ?></p>
              </div>
            <?php } ?>
            <?php if ($res->id_jurusan == '6') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswatb; ?></p>
              </div>
            <?php } ?>
            <?php if ($res->id_jurusan == '7') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswatkr; ?></p>
              </div>
            <?php } ?>
                        </div>
                        <div class="media-body">
                          <center><p class="text-2x mar-no text-semibold"><?php echo $res->jurusan ; ?></p></center>
                          <center><a data-toggle="modal" data-target="#demo-default-modal1<?php echo $res->id_jurusan?>" class="mar-no btn">klik untuk detail</a></center>
                        </div>
                      </div>
                    </div>
                    <!-- modal edit -->
                    <div class="modal fade" id="demo-default-modal1<?php echo $res->id_jurusan?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!--Modal Update-->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                            <p class="modal-title text-2x text-semibold">Pilih Kelas untuk melihat detail</p>
                          </div>
                          <?= form_open_multipart('data_jurusan/filter/'); ?>


                          <!--Modal body--> 
                          <div class="modal-body">
                            <div class="panel-body">
                              <input type="hidden" name="jurusan" value="<?php echo $res->id_jurusan?>">
                              <div class="select">
                                <label class="control-label"> <p class="modal-title text-1x text-semibold">Pilih Kelas</p></label>
                                <select name="kelas" id="demo-ease" required="">
                                 <option  value="">Kelas </option>
                                 <?php  foreach($filter_kel as $kel) {  ?>
                                  <option  value="<?= $kel->id_kelas ?>"><?= $kel->kelas ?></option>
                                <?php }?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <!--Modal footer-->
                        <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-primary" type="submit">cari</button>
                        </div>
                        <?= form_close(); ?>
                      </div>
                    </div>
                  </div>
                  <!-- end modal edit -->
                <?php } ?>
              </div>
            </div>
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