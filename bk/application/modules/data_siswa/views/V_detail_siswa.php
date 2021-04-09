
<!--CONTENT CONTAINER-->
<div id="page-head">

  <!--Page Title-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <div id="page-title">
    <h1 class="page-header text-overflow">Detail Siswa</h1>
  </div>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End page title-->


  <!--Breadcrumb-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <ol class="breadcrumb">
    <li><a href="#"><i class="demo-pli-home"></i></a></li>
    <li><a href="#">Data</a></li>
    <li>Data Siswa</li>
    <li class="active">Detail Siswa</li>
  </ol>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End breadcrumb-->
  <div class="text-left breadcrumb">
    <div id="demo-custom-toolbar5" class="table-toolbar-left">
      <a class="btn btn-default text-left" type="button" href="<?php echo base_url('data_siswa') ?>">Kembali</a>
    </div>  
  </div><br>

</div>
<!--===================================================-->
<div class="effect aside-float aside-bright mainnav-sm page-fixedbar page-fixedbar-right">
  <div id="page-head text-light">



    <!--Fixedbar-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="page-fixedbar-container">
      <div class="page-fixedbar-content">
        <div class="nano">
          <div class="nano-content">
            <p class="pad-all text-main text-sm text-uppercase text-bold">
              Pelanggar Baru Ini
            </p>

            <?php $count = 0; ?>
            <!--Family-->
            <div class="list-group bg-trans bord-btm">
              <?php foreach ($pterbaru as $terbaru) {
                $id = $terbaru->id_riwayat_pelanggaran;
                ?>
                <?php if($count == 10) break; ?>
                <div class="list-group-item">
                  <div class="media-left pos-rel">
                    <a href="<?php echo base_url('data_siswa/details/'.$terbaru->id_siswa) ?>"><img class="img-circle img-xs" src="<?php echo base_url ()?>assets/img/<?php echo $terbaru->foto_siswa ?>" alt="Profile Picture"></a>
                  </div>
                  <div class="media-body">
                    <a href="<?php echo base_url('data_siswa/details/'.$terbaru->id_siswa) ?>" class="text-main">
                      <p><?php echo $terbaru->nama_siswa ?></p>
                    </a>
                  </div>
                </div>
                <?php $count++; ?>
              <?php } ?>

              </div>


            </div>
          </div>
        </div>
      </div>

      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <!--End Fixedbar-->

    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
      <div class="panel">
       <div class="panel-body">
        <div class="row">
          
          <div class="fixed-fluid">
            <?php foreach($tampil as $res) {
              $id = $res->id_siswa;
              $gambar = $res->foto_siswa;
              ?>
              <div class="fixed-md-200 pull-sm-left fixed-right-border">

               <!-- Simple profile -->
               <div class="text-center">
                 <div class="pad-ver">
                  <img src="<?php echo base_url ()?>assets/img/<?php echo $res->foto_siswa ?>" class="img-lg img-circle" alt="Profile Picture">
                </div>
                <p><h4 class="text-lg text-overflow"><?php echo $res->nama_siswa?></h4></p>
                <p><b>NIS : </b><?php echo $res->nis?></p>
              </div><hr>
              <div class="text-center">
                <p width="50"><a class="btn btn-sm bg-danger" href="<?php echo base_url('data_siswa/tampilpelanggaran/'.$res->id_siswa); ?>">Tambah Pelanggaran</a></p>
                <p width="50"><a class="btn btn-sm bg-info" href="<?php echo base_url('data_siswa/tampiltreatment/'.$res->id_siswa); ?>">Tambah Treatment</a></p>
              </div>
              <hr>

              <!-- Profile Details -->
              <p class="pad-ver text-main text-sm text-uppercase text-bold">Data Siswa</p>
              <p><b>ALAMAT : </b><?php echo $res->alamat_siswa?></p>
              <p><b>TGL LAHIR : </b><?php echo $res->tanggal_lahir_siswa?></p>
              <p><b>JENIS KELAMIN : </b><?php echo $res->jenis_kelamin_siswa?></p>
              <p><b>KELAS : </b><?php echo $res->kelas?></p>
              <p><b>JURUSAN : </b><?php echo $res->jurusan?></p>
              <p><b>AGAMA : </b><?php echo $res->agama?></p>
              <hr>

            </div>
          <?php }?>
          <div class="fluid">

            <div class="row">
              <div class="col-md-4">
                <div class="panel panel-danger panel-colorful media middle pad-all">
                  <div class="media-left">
                    <div class="pad-hor ti-agenda icon-3x">
                    </div>
                  </div>
                  <div class="media-body">
                    <p class="text-2x mar-no text-semibold "><?php echo $jumlah_pelanggaran ?></p>
                    <p class="mar-no">Pelanggaran</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="panel panel-info panel-colorful media middle pad-all">
                  <div class="media-left">
                    <div class="pad-hor ion-ios-paper-outline icon-3x">
                    </div>
                  </div>
                  <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $jumlah_treatment ?></p>
                    <p class="mar-no">Treatment</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="panel panel-primary panel-colorful media middle pad-all">
                  <div class="media-left">
                    <div class="pad-hor">
                      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                      </svg>
                    </div>
                  </div>
                  <div class="media-body">
                    <p class="text-2x mar-no text-semibold">17</p>
                    <p class="mar-no">Point</p>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <a data-toggle="modal" data-target="#demo-default-modal2<?php echo $res->id_siswa?>" class="btn btn-sm btn-danger">
                  <span class="fa fa-edit"></span>
                &nbsp;Hapus</a>
                <a data-toggle="modal" data-target="#demo-default-modal1<?php echo $res->id_siswa?>" class="btn btn-sm btn-success">
                  <span class="fa fa-trash"></span>
                &nbsp;Edit</a>
              </div>
              <br><br><br>

              <hr>
              <h3>Riwayat Pelanggaran/Treatment Siswa</h3>


            </div>

            <div class="panel-body">

              <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Pelanggaran/treatment</th>
                    <th>point</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                 <?php foreach ($tampil_pelanggaran as $tment) {
                   $id = $tment->id_riwayat_pelanggaran;?>
                   <tr>
                    <td><?php echo $tment->tanggal_pelanggaran; ?></td>
                    <td><?php echo $tment->nama_pelanggaran; ?></td>
                    <td>+<?php echo $tment->point; ?></td>
                    <td><?php echo $tment->keterangan_pelanggaran; ?></td>
                  </tr>
                <?php } ?> 

                <?php foreach ($tampil_pelanggaran_kerapian as $tment) {
                 $id = $tment->id_riwayat_pelanggaran;?>
                 <tr>
                  <td><?php echo $tment->tanggal_pelanggaran; ?></td>
                  <td><?php echo $tment->nama_pelanggaran_kerapian; ?></td>
                  <td>+<?php echo $tment->point; ?></td>
                  <td><?php echo $tment->keterangan_pelanggaran; ?></td>
                </tr>
              <?php } ?>

              <?php foreach ($tampil_pelanggaran_berat as $tment) {
               $id = $tment->id_riwayat_pelanggaran;?>
               <tr>
                <td><?php echo $tment->tanggal_pelanggaran; ?></td>
                <td><?php echo $tment->nama_pelanggaran_berat; ?></td>
                <td>+<?php echo $tment->point; ?></td>
                <td><?php echo $tment->keterangan_pelanggaran; ?></td>
              </tr>
            <?php } ?>

            <?php foreach ($tampil_treatment as $tment) {
             $id = $tment->id_riwayat_treatment;?>
             <tr>
              <td><?php echo $tment->tanggal_treatment; ?></td>
              <td><?php echo $tment->nama_treatment; ?></td>
              <td>-<?php echo $tment->point; ?></td>
              <td><?php echo $tment->keterangan_treatment; ?></td>
            </tr>
          <?php } ?> 
        </tbody>
      </table>

    </div>
    <hr>
  </div>
</div>
</div>
</div>



<!-- hapus -->
<div class="modal fade" id="demo-default-modal2<?php echo $res->id_siswa?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal header-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Hapus</h4>
      </div>

      <!--Modal body-->
      <div class="modal-body">
        <p class="text-semibold text-main text-muted mar-no"></p>
        <p >Anda Yakin Ingin Menghapus siswa <b><?php echo  $res->nama_siswa ?></b> ? </p>
        <br>
      </div>

      <!--Modal footer-->
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
        <a class="btn btn-danger" href="<?php echo base_url('data_siswa/hapus/'. $res->id_siswa) ?>">Hapus Data</a>
      </div>
    </div>
  </div>
</div>
<!-- end hapus -->




<!-- modal edit -->
<div class="modal fade" id="demo-default-modal1<?php echo $res->id_siswa?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Modal Update-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Update</h4>
      </div>
      <?= form_open_multipart('data_siswa/edit/'.$res->id_siswa); ?>
      <input type="hidden" name="id_siswa" value="<?php echo $res->id_siswa?>">

      <!--Modal body--> 
      <div class="modal-body">
        <div class="panel-body">

          <div class="col-md-6">
            <label for="" class="control-label">NIS</label>
            <input type="text" name="nis" placeholder="NIS" class="form-control" required="" value="<?php echo $res->nis?>">
          </div>
          <div class="col-md-6">
            <label for="" class="control-label">Nama siswa</label>
            <input type="text" name="nama_siswa" placeholder="Nama siswa" class="form-control" required="" value="<?php echo $res->nama_siswa?>">
          </div>
          <div class="col-md-6" style="margin-top: 2%">
            <label for="" class="control-label">Tgl Lahir Siswa</label>
            <input type="date" name="tanggal_lahir_siswa" placeholder="Tgl Lahir Siswa" class="form-control" required="" value="<?php echo $res->tanggal_lahir_siswa?>">
          </div>
          <div class="col-md-6" style="margin-top: 2%">
            <label for="" class="control-label">Alamat Siswa</label>
            <input type="text" name="alamat_siswa" placeholder="Alamat Siswa" class="form-control" required="" value="<?php echo $res->alamat_siswa?>"><br>
          </div>
          <div class="col-md-6" >
            <label for="jk" required="" class="control-label">Jenis Kelamin Siswa</label><br>
            <input <?php echo ($res->jenis_kelamin_siswa == 'Laki-Laki') ? "checked": "" ?> id="jk" type="radio" name="jenis_kelamin_siswa" value="Laki-Laki" > Laki-Laki
            <input <?php echo ($res->jenis_kelamin_siswa == 'Perempuan') ? "checked": "" ?> id="jk" type="radio" name="jenis_kelamin_siswa" value="Perempuan" > Perempuan
          </div>
          <div class="col-md-6" >
            <label for="kelas" class="control-label">Kelas Siswa </label>
            <select name="kelas" id="kelas" class="form-control" required="">
              <option <?php echo ($res->kelas == 'X') ? "selected": "" ?> value="1">X</option>
              <option <?php echo ($res->kelas == 'XI') ? "selected": "" ?> value="2">XI</option>
              <option <?php echo ($res->kelas == 'XII') ? "selected": "" ?> value="3">XII</option>
            </select>
          </div>
          <div class="col-md-6" style="margin-top: 2%">
            <label for="agama" class="control-label">Agama Siswa</label>
            <select name="agama" id="agama" class="form-control" required="">
              <option <?php echo ($res->agama == 'ISLAM') ? "selected": "" ?> value="1">ISLAM</option>
              <option <?php echo ($res->agama == 'HINDU') ? "selected": "" ?> value="2">HINDU</option>
              <option <?php echo ($res->agama == 'BUDHA') ? "selected": "" ?> value="3">BUDHA</option>
              <option <?php echo ($res->agama == 'KONGHUCU') ? "selected": "" ?> value="4">KONGHUCU</option>
              <option <?php echo ($res->agama == 'KRISTEN') ? "selected": "" ?> value="5">KRISTEN</option>
            </select>
          </div>
          <div class="col-md-6" style="margin-top: 2%">
            <label for="jurusan" class="control-label">Jurusan Siswa</label>
            <select name="jurusan" id="jurusan" class="form-control" required="">
              <option <?php echo ($res->jurusan == 'RPL') ? "selected": "" ?> value="1">RPL</option>
              <option <?php echo ($res->jurusan == 'TKJ') ? "selected": "" ?> value="2">TKJ</option>
              <option <?php echo ($res->jurusan == 'TPM') ? "selected": "" ?> value="3">TPM</option>
              <option <?php echo ($res->jurusan == 'TITL') ? "selected": "" ?> value="4">TITL</option>
              <option <?php echo ($res->jurusan == 'TIPK') ? "selected": "" ?> value="5">TIPK</option>
              <option <?php echo ($res->jurusan == 'TB') ? "selected": "" ?> value="6">TB</option>
              <option <?php echo ($res->jurusan == 'TKR') ? "selected": "" ?> value="7">TKR</option>
            </select>
          </div>
          <div class="col-md-6" >
            <label for="" class="control-label">Gambar siswa</label>
            <input type="file" name="foto_siswa" placeholder="Gambar Siswa" class="form-control"  onchange="tampilkanPreview(this,'preview')">
          </div>
          <div class="col-lg-4" style="margin-top: 2%">
            <label for="" class="control-label">Preview Foto Profile :</label>
            <img   src="<?= base_url(); ?>assets/img/<?= $res->foto_siswa ?>" width="150px" />
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
<!-- end modal edit -->
</div>
</div>

</div>
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
