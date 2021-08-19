<div class="boxed">

  <div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
      <h1 class="page-header text-overflow">Laporan Siswa</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
      <li><a href="<?php  echo base_url('data_beranda/index/');  ?>"><i class="demo-pli-home"></i></a></li>
      <li><a href="<?php  echo base_url('data_laporan/index/');  ?>">Laporan</a></li>
      <li class="active">Laporan Siswa</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->
    <div class="text-right breadcrumb">
      <div id="demo-custom-toolbar5" class="table-toolbar-left">
        <a class="btn btn-default text-left" type="button" href="<?php  echo base_url('data_laporan/index/');  ?>">Kembali</a>
      </div>
      <form action="<?php echo site_url('data_laporan/cariww/') ?>" method="post" class="col-xs-8 col-sm-3 text-right">
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
        <a class="btn btn-success form-control"  style="padding-left: : 10px" href="<?php echo base_url('data_laporan'); ?>">
          <i class="fa fa-refresh" ></i>
        </a>
      </div> 
    </center>
  </form>
</div>


</div>
</div>
<br><br><br>



<!--Page content-->
<!--===================================================-->
<div id="page-content">

  <div class="row">

    <?php foreach($tampil_riwayat as $res) {
      $id = $res->id_siswa;
      // $id_siswa = $id_siswa;
      $kelas = $res->kelas;
      $gambar = $res->foto_siswa;
      ?>


        <div class="col-lg-3">

        <!--Profile Widget-->
        <!--===================================================-->
        <div class="panel widget" style="height: 320px">
          <div class="widget-header bg-info text-center" style="height: 175px">
            <h4 class="text-light mar-no pad-top"><?= $res->nama_siswa ?></h4>
            <p class="mar-btm"><?= $res->nis ?></p>
          </div>
          <div class="widget-body">
            <img alt="Profile Picture" class="widget-img img-circle img-border-light" src="<?php echo base_url ()?>assets/img/<?php echo $res->foto_siswa ?> ?>">
            <div class="list-group bg-trans mar-no">
              <p class="pull-right"><?= $res->kelas ?></p>
              <p>Kelas</p>
              <p class="pull-right">
                <?php 
              $jpelanggaran1          = $this->m_data_laporan->jumlahpelanggaran1($id);
              $jpelanggaran2          = $this->m_data_laporan->jumlahpelanggaran2($id);
              $jpelanggaran3          = $this->m_data_laporan->jumlahpelanggaran3($id);
              $jumlahpointtreatment   = $this->m_data_laporan->jumlahpointtreatment($id);


              $total_pelanggaran      = $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
              $total_treatment        = $jumlahpointtreatment['point'];
              $total_point            = $total_pelanggaran - $total_treatment;

              echo $total_point;
              ?>
                
              </p>
              <p>Point</p>
              <center>
                <a class="btn btn-default" type="button" href="<?php echo base_url('data_siswa/details/'.$res->id_siswa); ?>">
                  Detail
                </a>
              </center>
            </div>
          </div>
        </div>
        <!--Profile Widget-->
        <!--===================================================-->
      </div>
    <?php } ?>
  </div>

</div>

<!--===================================================-->
<!--End page content-->


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

