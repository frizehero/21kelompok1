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
  		<li><a href="#"><i class="demo-pli-home"></i></a></li>
  		<li><a href="#">Data</a></li>
  		<li class="active">Data Siswa</li>
  	</ol>
  	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  	<!--End breadcrumb-->

  	<div class="text-right breadcrumb">
  		<div id="demo-custom-toolbar5" class="table-toolbar-left">
  			<a class="btn btn-default text-left "   data-toggle="modal" data-target="#demo-default-tambah">Tambah Siswa</a>
  		</div>
  		<center>
  			<form method="post" action="<?php echo site_url('data_siswa/cari') ?>" >
                            <div class="col-md-2" style="padding: 0px">
                                <div id="demo-dp-txtinput">
                                    <?php if($this->uri->segment(2) != 'cari'){?>
                                        <input type="text" autocomplete="off" name="cari" class="form-control input-sm " placeholder="siswa">
                                    <?php } ?>
                                    <?php if($this->uri->segment(2) == 'cari'){
                                        $cari = $this->input->post('cari'); ?>
                                        <input type="text" autocomplete="off" value="<?= $cari ?>" name="cari" class="form-control input-sm " placeholder="Outlet">
                                    <?php } ?> 
                                </div>
                            </div>
                            
                          
                            <div class="col-md-2" style="">
                      
                        <button class="btn btn-success btn-sm">
                          <span class="fa fa-filter"></span>
                         Cari
                        </button>
                        <a class="btn btn-default btn-sm" href="<?php echo base_url('data_siswa'); ?>">
                            <i class="fa fa-refresh" ></i>
                        </a>
                               </div>
                            </form>


                        <div class="col-md-2" style="float: right;">
                        
                            <button style="float: right;" class="btn btn-success btn-sm"   data-toggle="modal" data-target="#demo-default-tambah">
                              <span class="fa fa-plus"></span>
                             Tambah
                            </button>
                        </div>
  		<div class="select">
  			<select id="demo-ease">
  				<option value="">Jurusan</option>
  				<option value="RPL">RPL</option>
  				<option value="TKJ">TKJ</option>
  				<option value="TPM">TPM</option>
  				<option value="TITL">TITL</option>
  				<option value="TIPK">TIPK</option>
  				<option value="BB">BB</option>
  				<option value="TKR">TKR</option>
  			</select>
  		</div>
  		<div class="select">
  			<select id="demo-ease">
  				<option value="">Kelas</option>
  				<option value="X">X</option>
  				<option value="XI">XI</option>
  				<option value="XII">XII</option>
  			</select>
  		</div>
  		<button class="btn btn-default">Filter</button>  
  	</div>

  	<div id="page-content text-black">
  		
  		<div class="row">
  			<div class="col-sm-12">
  				<div class="row">
  					<?php foreach($tampil as $res) {
  						$id = $res->id_siswa;
  						$gambar = $res->foto_siswa;
  						?>

  						<div class="col-sm-3">
                        <div class="panel">
                            <div class="panel-body text-center">
                                <a href="detail-siswa.html">
                                    <img alt="Profile Picture" class="img-md img-circle mar-btm" src="<?php echo base_url ()?>assets/img/<?php echo $res->foto_siswa ?>">
                                    <p class="text-lg text-semibold mar-no "><?= $res->nama_siswa ?></p>
                                </a>
                                <p class="text-muted"><?= $res->nis ?></p>
                                <p class="text-muted mar-no">
                                    KELAS : X <br>
                                    JURUSAN : RPL <br>
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
<!--===================================================-->
<!--End page content-->	
<!-- tambah -->
<div class="modal fade" id="demo-default-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<!--Modal Update-->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
				<h4 class="modal-title">Tambah</h4>
			</div>

			<?= form_open_multipart('data_siswa/tambah'); ?>
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