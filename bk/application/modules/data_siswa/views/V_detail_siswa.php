
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

            <!--Family-->
            <div class="list-group bg-trans bord-btm">
              <div class="list-group-item list-item-sm">
                <div class="media-left pos-rel">
                  <a href="#"><img class="img-circle img-xs" src="img/profile-photos/2.png" alt="Profile Picture"></a>
                </div>
                <div class="media-body">
                  <a href="#" class="text-main">
                    <p>Dhimas</p>
                  </a>
                  <a class="btn btn-xs btn-default" href="detail-siswa.html">Detail</a>
                </div>
              </div>
              <div class="list-group-item">
                <div class="media-left pos-rel">
                  <a href="#"><img class="img-circle img-xs" src="img/profile-photos/8.png" alt="Profile Picture"></a>
                </div>
                <div class="media-body">
                  <a href="#" class="text-main">
                    <p>Hajir</p>
                  </a>
                  <a class="btn btn-xs btn-default" href="detail-siswa.html">Detail</a>
                </div>
              </div>
              <div class="list-group-item">
                <div class="media-left pos-rel">
                  <a href="#"><img class="img-circle img-xs" src="img/profile-photos/4.png" alt="Profile Picture"></a>
                </div>
                <div class="media-body">
                  <a href="#" class="text-main">
                    <p>Donald Brown</p>
                  </a>
                  <a class="btn btn-xs btn-default" href="detail-siswa.html">Detail</a>
                </div>
              </div>
              <div class="list-group-item">
                <div class="media-left pos-rel">
                  <a href="#"><img class="img-circle img-xs" src="img/profile-photos/9.png" alt="Profile Picture"></a>
                </div>
                <div class="media-body">
                  <a href="#" class="text-main">
                    <p>Betty Murphy</p>
                  </a>
                  <a class="btn btn-xs btn-default" href="detail-siswa.html">Detail</a>
                </div>
              </div>
              <div class="list-group-item">
                <div class="media-left pos-rel">
                  <a href="#"><img class="img-circle img-xs" src="img/profile-photos/7.png" alt="Profile Picture"></a>
                </div>
                <div class="media-body">
                  <a href="#" class="text-main">
                    <p>Samantha Reid</p>
                  </a>
                  <a class="btn btn-xs btn-default" href="detail-siswa.html">Detail</a>
                </div>
              </div>
              <div class="list-group-item list-item-sm">
                <div class="media-left pos-rel">
                  <a href="#"><img class="img-circle img-xs" src="img/profile-photos/2.png" alt="Profile Picture"></a>
                </div>
                <div class="media-body">
                  <a href="#" class="text-main">
                    <p>Dhimas</p>
                  </a>
                  <a class="btn btn-xs btn-default" href="detail-siswa.html">Detail</a>
                </div>
              </div>
              <div class="list-group-item">
                <div class="media-left pos-rel">
                  <a href="#"><img class="img-circle img-xs" src="img/profile-photos/8.png" alt="Profile Picture"></a>
                </div>
                <div class="media-body">
                  <a href="#" class="text-main">
                    <p>Hajir</p>
                  </a>
                  <a class="btn btn-xs btn-default" href="detail-siswa.html">Detail</a>
                </div>
              </div>
              <div class="list-group-item">
                <div class="media-left pos-rel">
                  <a href="#"><img class="img-circle img-xs" src="img/profile-photos/4.png" alt="Profile Picture"></a>
                </div>
                <div class="media-body">
                  <a href="#" class="text-main">
                    <p>Donald Brown</p>
                  </a>
                  <a class="btn btn-xs btn-default" href="detail-siswa.html">Detail</a>
                </div>
              </div>
              <div class="list-group-item">
                <div class="media-left pos-rel">
                  <a href="#"><img class="img-circle img-xs" src="img/profile-photos/9.png" alt="Profile Picture"></a>
                </div>
                <div class="media-body">
                  <a href="#" class="text-main">
                    <p>Betty Murphy</p>
                  </a>
                  <a class="btn btn-xs btn-default" href="detail-siswa.html">Detail</a>
                </div>
              </div>

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
         <div class="fixed-fluid">
           <div class="fixed-md-200 pull-sm-left fixed-right-border">

             <!-- Simple profile -->
             <div class="text-center">
               <div class="pad-ver">
                 <img src="<?php echo base_url ()?>assets/img/<?php echo $tampil['foto_siswa'] ?>" class="img-lg img-circle" alt="Profile Picture">
               </div>
               <p><h4 class="text-lg text-overflow"><?php echo $tampil['nama_siswa']?></h4></p>
               <p><b>NIS : </b><?php echo $tampil['nis']?></p>
             </div><hr>
             <div class="text-center">
              <p width="50"><a class="btn btn-sm bg-danger" href="pelanggaran.html">Tambah Pelanggaran</a></p>
              <p width="50"><a class="btn btn-sm bg-info" href="treatment.html">Tambah Treatment</a></p>
            </div>
            <hr>

            <!-- Profile Details -->
            <p class="pad-ver text-main text-sm text-uppercase text-bold">Data Siswa</p>
            <p><b>ALAMAT : </b><?php echo $tampil['alamat_siswa']?></p>
            <p><b>TGL LAHIR : </b><?php echo $tampil['tanggal_lahir_siswa']?></p>
            <p><b>JENIS KELAMIN : </b><?php echo $tampil['jenis_kelamin_siswa']?></p>
            <p><b>KELAS : </b><?php echo $tampil['kelas']?></p>
            <p><b>JURUSAN : </b><?php echo $tampil['jurusan']?></p>
            <p><b>AGAMA : </b><?php echo $tampil['agama']?></p>
            <hr>

          </div>
          <div class="fluid">

            <div class="row">
              <div class="col-md-4">
                <div class="panel panel-danger panel-colorful media middle pad-all">
                  <div class="media-left">
                    <div class="pad-hor ti-agenda icon-3x">
                    </div>
                  </div>
                  <div class="media-body">
                    <p class="text-2x mar-no text-semibold ">2</p>
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
                    <p class="text-2x mar-no text-semibold">1</p>
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
                <a data-toggle="modal" data-target="#demo-default-modal2<?php echo $tampil['id_siswa']?>" class="btn btn-sm btn-danger">
                  <span class="fa fa-edit"></span>
                &nbsp;Hapus</a>
                <a data-toggle="modal" data-target="#demo-default-modal1<?php echo $tampil['id_siswa']?>" class="btn btn-sm btn-success">
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
                  <tr>
                    <td>2-2-2020</td>
                    <td>Merokok</td>
                    <td>+12</td>
                    <td><p>merokok saat istirahat di kelas</p></td>
                  </tr>
                  <tr>
                    <td>2-3-2020</td>
                    <td>Alpha</td>
                    <td>+10</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>2-3-2020</td>
                    <td>Membersihkan toilet</td>
                    <td>-7</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <hr>
          </div>
        </div>
      </div>
    </div>



    <!-- hapus -->
    <div class="modal fade" id="demo-default-modal2<?php echo $tampil['id_siswa']?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
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
            <p >Anda Yakin Ingin Menghapus <b><?php echo  $tampil['nama_siswa'] ?></b> ? </p>
            <br>
          </div>

          <!--Modal footer-->
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
            <a class="btn btn-danger" href="<?php echo base_url('data_siswa/hapus/'. $tampil['id_siswa']) ?>">Hapus Data</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end hapus -->




    <!-- modal edit -->
    <div class="modal fade" id="demo-default-modal1<?php echo $tampil['id_siswa']?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <!--Modal Update-->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
            <h4 class="modal-title">Update</h4>
          </div>
          <?= form_open_multipart('data_siswa/edit/'); ?>
          <input type="hidden" name="id_siswa" value="<?php echo $tampil['id_siswa']?>">

          <!--Modal body--> 
          <div class="modal-body">
            <div class="panel-body">

              <div class="col-md-6">
                <label for="" class="control-label">NIS</label>
                <input type="text" name="nis" placeholder="NIS" class="form-control" required="" value="<?php echo $tampil['nis']?>">
              </div>
              <div class="col-md-6">
                <label for="" class="control-label">Nama siswa</label>
                <input type="text" name="nama_siswa" placeholder="Nama siswa" class="form-control" required="" value="<?php echo $tampil['nama_siswa']?>">
              </div>
              <div class="col-md-6" style="margin-top: 2%">
                <label for="" class="control-label">Tgl Lahir Siswa</label>
                <input type="date" name="tanggal_lahir_siswa" placeholder="Tgl Lahir Siswa" class="form-control" required="" value="<?php echo $tampil['tanggal_lahir_siswa']?>">
              </div>
              <div class="col-md-6" style="margin-top: 2%">
                <label for="" class="control-label">Alamat Siswa</label>
                <input type="text" name="alamat_siswa" placeholder="Alamat Siswa" class="form-control" required="" value="<?php echo $tampil['alamat_siswa']?>"><br>
              </div>
              <div class="col-md-6" >
                <label for="jk" required="" class="control-label">Jenis Kelamin Siswa</label><br>
                <input <?php echo ($tampil['jenis_kelamin_siswa'] == 'Laki-Laki') ? "checked": "" ?> id="jk" type="radio" name="jenis_kelamin_siswa" value="Laki-Laki" > Laki-Laki
                <input <?php echo ($tampil['jenis_kelamin_siswa'] == 'Perempuan') ? "checked": "" ?> id="jk" type="radio" name="jenis_kelamin_siswa" value="Perempuan" > Perempuan
              </div>
              <div class="col-md-6" >
                <label for="kelas" class="control-label">Kelas Siswa </label>
                <select name="kelas" id="kelas" class="form-control" required="">
                  <option <?php echo ($tampil['kelas'] == 'X') ? "selected": "" ?> value="1">X</option>
                  <option <?php echo ($tampil['kelas'] == 'XI') ? "selected": "" ?> value="2">XI</option>
                  <option <?php echo ($tampil['kelas'] == 'XII') ? "selected": "" ?> value="3">XII</option>
                </select>
              </div>
              <div class="col-md-6" style="margin-top: 2%">
                <label for="agama" class="control-label">Agama Siswa</label>
                <select name="agama" id="agama" class="form-control" required="">
                  <option <?php echo ($tampil['agama'] == 'ISLAM') ? "selected": "" ?> value="1">ISLAM</option>
                  <option <?php echo ($tampil['agama'] == 'HINDU') ? "selected": "" ?> value="2">HINDU</option>
                  <option <?php echo ($tampil['agama'] == 'BUDHA') ? "selected": "" ?> value="3">BUDHA</option>
                  <option <?php echo ($tampil['agama'] == 'KONGHUCU') ? "selected": "" ?> value="4">KONGHUCU</option>
                  <option <?php echo ($tampil['agama'] == 'KRISTEN') ? "selected": "" ?> value="5">KRISTEN</option>
                </select>
              </div>
              <div class="col-md-6" style="margin-top: 2%">
                <label for="jurusan" class="control-label">Jurusan Siswa</label>
                <select name="jurusan" id="jurusan" class="form-control" required="">
                  <option <?php echo ($tampil['jurusan'] == 'RPL') ? "selected": "" ?> value="1">RPL</option>
                  <option <?php echo ($tampil['jurusan'] == 'TKJ') ? "selected": "" ?> value="2">TKJ</option>
                  <option <?php echo ($tampil['jurusan'] == 'TPM') ? "selected": "" ?> value="3">TPM</option>
                  <option <?php echo ($tampil['jurusan'] == 'TITL') ? "selected": "" ?> value="4">TITL</option>
                  <option <?php echo ($tampil['jurusan'] == 'TIPK') ? "selected": "" ?> value="5">TIPK</option>
                  <option <?php echo ($tampil['jurusan'] == 'TB') ? "selected": "" ?> value="6">TB</option>
                  <option <?php echo ($tampil['jurusan'] == 'TKR') ? "selected": "" ?> value="7">TKR</option>
                </select>
              </div>
              <div class="col-md-6" >
                <label for="" class="control-label">Gambar siswa</label>
                <input type="file" name="foto_siswa" placeholder="Gambar Siswa" class="form-control"  onchange="tampilkanPreview(this,'preview')">
              </div>
              <div class="col-lg-4" style="margin-top: 2%">
                <label for="" class="control-label">Preview Foto Profile :</label>
                <img   src="<?= base_url(); ?>assets/img/<?= $tampil['foto_siswa'] ?>" width="150px" />
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
