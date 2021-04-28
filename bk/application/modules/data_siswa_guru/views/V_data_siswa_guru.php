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

        <form action="<?php echo site_url('data_siswa_guru/cariku/') ?>" method="post" class="col-xs-8 col-sm-5 text-right">
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
          <a class="btn btn-success form-control"  style="padding-left: : 10px" href="<?php echo base_url('data_siswa_guru'); ?>">
            <i class="fa fa-refresh" ></i>
          </a>
        </div> 
      </center>

    </form>
  </div>
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
            <a href="<?php echo base_url('data_siswa_guru/details/'.$res->id_siswa); ?>">
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

                  $jumlah_pelanggaranku      = $this->m_data_siswa_guru->count_jpelanggaran($id);
                  $jumlah_pelanggaran_kerapian  = $this->m_data_siswa_guru->count_jpelanggaran_kerapian($id);
                  $jumlah_pelanggaran_berat   = $this->m_data_siswa_guru->count_jpelanggaran_berat($id);

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

                  $jumlah_treatment    = $this->m_data_siswa_guru->count_jtreatment($id);

                  echo $jumlah_treatment;
                  ?>
                </span>
                <p class="text-muted mar-no">Treatment</p>
              </li>
              <li class="col-xs-3">
                <span class="text-muted mar-no">
                  <?php 
                  $jpelanggaran1          = $this->m_data_siswa_guru->jumlahpelanggaran1($id);
                  $jpelanggaran2          = $this->m_data_siswa_guru->jumlahpelanggaran2($id);
                  $jpelanggaran3          = $this->m_data_siswa_guru->jumlahpelanggaran3($id);
                  $jumlahpointtreatment   = $this->m_data_siswa_guru->jumlahpointtreatment($id);


                  $total_pelanggaran      = $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
                  $total_treatment        = $jumlahpointtreatment['point'];
                  $total_point            = $total_pelanggaran - $total_treatment;

                  echo $total_point;
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
							<option value="2">TKJ</option>
							<option value="3">TPM</option>
							<option value="4">TITL</option>
							<option value="5">TIPK</option>
							<option value="6">TB</option>
							<option value="7">TKR</option>
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