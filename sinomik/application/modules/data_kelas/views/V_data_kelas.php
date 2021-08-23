  <!--CONTENT CONTAINER-->
  <!--===================================================-->
  <div id="page-head">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
      <h1 class="page-header text-overflow">Data Kelas</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('data_beranda_guru') ?>"><i class="demo-pli-home"></i></a></li>
      <li><a href="#">Data</a></li>
      <li class="active">Data Kelas</li>
    </ol><br>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

    <div class="text-right breadcrumb">
      <div id="demo-custom-toolbar5" class="table-toolbar-left">

      </div>
      <form action="<?php echo site_url('data_kelas_guru/carik/') ?>" method="post" class="col-xs-8 col-sm-3 text-right">
        <div class="input-group text-right"  style="padding-left: : 5px">
          <a class="btn btn-default text-left "   data-toggle="modal" data-target="#demo-default-filter">Filter Kelas</a>
          <div class="input-group-btn  text-right"  style="padding-left: : 10px">

          </div>
        </div> 

      </form>
    </div>
  </div><br><br><br>


  <div id="page-content">

    <div class="panel panel-body">
      <h3></h3>
      <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Agama</th>
            <th>Tgl Lahir</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>



    <!-- filter -->
    <div class="modal fade" id="demo-default-filter" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <!--Modal Update-->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
            <h4 class="modal-title">Filter Kelas</h4>
          </div>
          <form method="post" enctype="multipart/form-data" action="<?php echo site_url('data_kelas/filter/') ?>">
            <div class="modal-body">

              <div class="panel-body">

                <div class="col-md-6">
                  <label for="" class="control-label">Pilih Kelas</label>
                  <select class="form-control " name="kelas" required="" style="color: black">
                    <option value="">kelas</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="" class="control-label">Pilih Jurusan</label>
                  <select class="form-control " name="jurusan" required="" style="color: black">
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

             </div>


           </div>

           <!--Modal footer-->
           <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            <button class="btn btn-primary" type="submit">filter</button>
          </div>
        </form>

      </div>

    </div>
  </div>
  <!-- end filter -->


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