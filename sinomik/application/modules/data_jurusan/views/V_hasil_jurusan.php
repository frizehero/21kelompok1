  <!--CONTENT CONTAINER-->
  <!--===================================================-->
  <div id="page-head">
  	<!--Page Title-->
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<div id="page-title">
  		<h1 class="page-header text-overflow">Data jurusan</h1>
  	</div>
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<!--End page title-->


  	<!--Breadcrumb-->
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<ol class="breadcrumb">
  		<li><a href="<?php echo base_url('data_beranda') ?>"><i class="demo-pli-home"></i></a></li>
  		<li><a href="#">Data</a></li>
  		<li class="active">Data jurusan</li>
  	</ol>
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<!--End breadcrumb-->

  	<div class="text-right breadcrumb">
  		<div id="demo-custom-toolbar5" class="table-toolbar-left">
  		</div>
      <form action="<?php echo site_url('data_siswa/cariku/') ?>" method="post" class="col-xs-8 col-sm-3 text-right">
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
      </center>

    </form>
</div>


<div id="page-content text-black"><br><br><br><br>

  <div class="row">
   <div class="col-sm-12">
    <div class="row">
     <?php foreach($tampil as $res) {
      $id = $res->id_siswa;
      $gambar = $res->foto_siswa;
      ?>

      <div class="col-sm-3" >
        <div class="panel" style="height: 295px;">
          <div class="panel-body text-center">
            <a href="<?php echo base_url('data_siswa/details/'.$res->id_siswa); ?>">
              <img alt="Profile Picture" class="img-md img-circle mar-btm" src="<?php echo base_url ()?>assets/img/<?php echo $res->foto_siswa ?>">
              <p class="text-lg text-semibold mar-no "><b><?= $res->nama_siswa ?></b></p>
            </a>
            <p class="text-muted"><?= $res->nis ?></p>
            <p class="text-muted mar-no">
              KELAS : <?= $res->kelas ?> <br>
              JURUSAN : <?= $res->jurusan ?> <br>
            </p>
            <ul class="list-unstyled text-center bord-top pad-top mar-no row">
              <li class="col-xs-5">
                <span class="text-muted mar-no">0</span>
                <p class="text-muted mar-no">Pelanggaran</p>
              </li>
              <li class="col-xs-4">
                <span class="text-muted mar-no">0</span>
                <p class="text-muted mar-no">Treatment</p>
              </li>
              <li class="col-xs-3">
                <span class="text-muted mar-no">0</span>
                <p class="text-muted mar-no">Point</p>
              </li>
            </ul>
          </div>
        </div>

      </div>
    <?php }?>

  </div>
</div>
</div>
</div>
</div>
</div>


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