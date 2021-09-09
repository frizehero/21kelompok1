  <!--CONTENT CONTAINER-->
  <!--===================================================-->
  <div id="page-head">
  	<!--Page Title-->
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<div id="page-title">
  		<h1 class="page-header text-overflow">Data Siswa</h1>
  	</div>
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<!--End page title-->


  	<!--Breadcrumb-->
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<ol class="breadcrumb">
  		<li><a href="<?php echo base_url('data_beranda') ?>"><i class="demo-pli-home"></i></a></li>
  		<li><a href="#">Data</a></li>
  		<li class="active">Data Siswa</li>
  	</ol>
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<!--End breadcrumb-->


  	<div class="text-right breadcrumb">
  		<div id="demo-custom-toolbar5" class="table-toolbar-left">
  			<a class="btn btn-default text-left "   data-toggle="modal" data-target="#demo-default-tambah">Tambah Siswa</a>
        <a class="btn btn-info text-left "   data-toggle="modal" data-target="#demo-default-import"><span class="ion-upload"></span>Import Tambah</a>
        <a class="btn btn-info text-left "   data-toggle="modal" data-target="#demo-default-naik"><span class="ion-upload">Import Kenaikan</a>
        <a href="<?php echo site_url('data_siswa/downloadtambah/') ?>" class="btn btn-warning text-right "><span class="ion-archive"></span> Template Tambah</a>
        <a href="<?php echo site_url('data_siswa/downloadkenaikan/') ?>" class="btn btn-warning text-right "><span class="ion-archive"></span>Template Kenaikan</a>
      </div>
      <form action="<?php echo site_url('data_siswa/cariku/') ?>" method="post" class="col-xs-8 col-sm-3 text-right">
        <div class="input-group text-right"  style="padding-left: : 20px">
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
        <a class="btn btn-success form-control"  style="padding-left: : 10px" href="<?php echo base_url('data_siswa'); ?>">
          <i class="fa fa-refresh" ></i>
        </a>
      </div> 

    </form>
    <br>
  </div>

  <div id="page-content text-black"><br><br><br><br>

    <div class="row">
     <div class="col-sm-12">
      <div class="row">
       <?php foreach($row as $res) {
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
                  <span class="text-muted mar-no">
                    <?php 
                    $id = $res->id_siswa;

                    $jumlah_pelanggaranku      = $this->m_data_siswa->count_jpelanggaran($id);
                    $jumlah_pelanggaran_kerapian  = $this->m_data_siswa->count_jpelanggaran_kerapian($id);
                    $jumlah_pelanggaran_berat   = $this->m_data_siswa->count_jpelanggaran_berat($id);

                    $total = $jumlah_pelanggaranku + $jumlah_pelanggaran_kerapian + $jumlah_pelanggaran_berat;

                    echo $total;
                    ?>
                  </span>
                  <p class="text-muted mar-no">Pelanggaran</p>
                </li>
                <li class="col-xs-4">
                  <span class="text-muted mar-no">
                    <?php 
                    $id = $res->id_siswa;

                    $jumlah_treatment    = $this->m_data_siswa->count_jtreatment($id);

                    echo $jumlah_treatment;
                    ?>
                  </span>
                  <p class="text-muted mar-no">Treatment</p>
                </li>
                <li class="col-xs-3">
                  <span class="text-muted mar-no">
                    <?php 
                    $jpelanggaran1          = $this->m_data_siswa->jumlahpelanggaran1($id);
                    $jpelanggaran2          = $this->m_data_siswa->jumlahpelanggaran2($id);
                    $jpelanggaran3          = $this->m_data_siswa->jumlahpelanggaran3($id);
                    $jumlahpointprestasi      = $this->m_data_siswa->jumlahpointprestasi($id);


                    $total_pelanggaran      = $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
                    $total_treatment        = $jumlahpointprestasi['point'];
                    $total_point            = $total_pelanggaran - $total_treatment;

                    if ($total_point <= 0) {
                      echo "0";
                    } else {
                      echo $total_point;
                    }
                    ?>
                  </span>
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
<?php echo $pagination; ?>


<!--===================================================-->
<!--End page content-->	
<!-- tambah -->


<!-- import -->
<div class="modal fade" id="demo-default-naik" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal Update-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Udate Kelas Siswa</h4>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?php echo site_url('data_siswa/importkenaikan/') ?>">
        <div class="modal-body">

          <div class="panel-body">

            <div class="col-md-6">
              <label for="" class="control-label">Pilih File</label>
              <input type="file" name="file" class="form-control" accept=".xlsx, .xls" value="" required="">
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




<!-- import -->
<div class="modal fade" id="demo-default-import" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal Update-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Tambah</h4>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?php echo site_url('data_siswa/importfile/') ?>">
        <div class="modal-body">

          <div class="panel-body">

            <div class="col-md-6">
              <label for="" class="control-label">Pilih File</label>
              <input type="file" name="file" class="form-control" accept=".xlsx, .xls" value="" required="">
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



<div class="modal fade" id="demo-default-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<!--Modal Update-->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
				<h4 class="modal-title">Tambah</h4>
			</div>

			<?= form_open_multipart('data_siswa/tambah'); ?>

      <input type="hidden" name="level" value="3">
      <!--Modal body--> 
      <div class="modal-body">

        <div class="panel-body">

         <div class="col-md-6">
          <label for="" class="control-label">NIS</label>
          <input type="text" name="nis" placeholder="NIS" class="form-control" maxlength="20" required="">
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
           <option value="1">X</option>
           <option value="2">XI</option>
           <option value="3">XII</option>
         </select>
       </div>
       <div class="col-md-6" style="margin-top: 2%">
        <label for="agama" class="control-label">Agama Siswa</label>
        <select name="agama" id="agama" class="form-control" required="">
         <option value="">Agama</option>
         <option value="1">Islam</option>
         <option value="2">Hindu</option>
         <option value="3">Budha</option>
         <option value="4">Konghucu</option>
         <option value="5">Kristen</option>
       </select>
     </div>
     <div class="col-md-6" style="margin-top: 2%">
      <label for="jurusan" class="control-label">Jurusan Siswa</label>
      <select name="jurusan" id="jurusan" class="form-control" required="">
       <option value="">Jurusan</option>
       <option value="1">RPL</option>
       <option value="2">TKJ 1</option>
       <option value="3">TKJ 2</option>
       <option value="4">TITL</option>
       <option value="5">TIPK 1</option>
       <option value="6">TIPK 2</option>
       <option value="7">TKR 1</option>
       <option value="8">TKR 2</option>
       <option value="9">TKR 3</option>
       <option value="10">TB</option>
       <option value="11">TPM 1</option>
       <option value="12">TPM 2</option>
     </select>
   </div>
   <div class="col-md-6" style="margin-top: 2%">
    <label for="" class="control-label">Username</label>
    <input type="text" name="username" placeholder="Username" class="form-control" required="">
  </div>
  <div class="col-md-6" style="margin-top: 2%">
    <label for="" class="control-label">Password</label>
    <input type="password" name="password" placeholder="Password" class="form-control" required="" id="password1">
  </div>
  <div class="col-md-6" >
    <label for="" class="control-label">Gambar siswa</label>
    <input type="file" name="foto_siswa" placeholder="Gambar Siswa" class="form-control"  onchange="tampilkanPreview(this,'preview')">
  </div>
  <div class="col-md-6" style="margin-top: 2%">
    <label for="" class="control-label">Kosnfirmasi Password</label>
    <input type="password" name="password" placeholder="Password" class="form-control" required="" id="password2">
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
  <button class="btn btn-primary" id="btnsubmit" type="submit">Simpan</button>
</div>
<?= form_close(); ?>

</div>

</div>
<!-- end tambah -->


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
  $(function () {
    $(btnsubmit).click(function () {
      var password = $(password1).val();
      var confirmPassword = $(password2).val();
      if (password != confirmPassword) {
        alert("Password Salah Harap Masukan Ulang Password.");
        return false;
      }
      return true;
    });
  });
</script>
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