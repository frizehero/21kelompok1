<div class="boxed">
  <div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
      <h1 class="page-header text-overflow">Laporan List Siswa</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
     <li><a href="<?php  echo base_url('data_beranda/index/');  ?>"><i class="demo-pli-home"></i></a></li>
     <li>Laporan</a></li>
     <li class="active">List Siswa</a></li>
   </ol>
   <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
   <!--End breadcrumb-->

 </div>
</div>

<div id="page-content">
  <div class="row">
    <div class="panel-body">
     <div class="panel">

      <div class="panel-body">
        <div class="panel-heading">
          <h4 class="panel-title">List Pelanggaran</h4>
        </div>
        <div class="row pad-btm">
          <?= form_open_multipart('data_list_guru/index/'); ?>
          <div style="margin-right: -40px">
            <div class="col-md-10">
              <div class="input-daterange input-group" id="datepicker">
                <input type="date" name="awal" class="form-control">
                <div class="input-group-addon">to</div>
                <input type="date" name="akhir" class="form-control" >
                <!-- <input type="hidden" value="<?php echo $tampil_detail['id_siswa']?>" name="idid"> -->


              </div>

            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
          </div>

          <?= form_close(); ?>
        </div>
        <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Jurusan</th>
              <th>Nama Pelanggaran</th>
              <th>Keterangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tampil as $res) {
             $id = $res ->id_siswa;
             ?>
             <tr>
              <td><?php echo $res->nama_siswa ?></td>
              <td><?php echo $res->kelas ?></td>
              <td><?php echo $res->jurusan ?></td>
              <td>

                <?php if ($res->id_pelanggaran == null) { ?>

                  <?php if ($res->id_pelanggaran_kerapian == null) { ?>
                    <?php echo $res->nama_pelanggaran_berat ?>
                  <?php } else { ?>
                    <?php echo $res->nama_pelanggaran_kerapian ?>
                  <?php } ?>

                <?php } else { ?>
                  <?php echo $res->nama_pelanggaran ?>
                <?php } ?>


              </td>
              <td><?php echo $res->keterangan_pelanggaran ?></td>
              <td><a class="btn btn-primary btn btn-xs" href="<?php echo base_url('data_siswa_guru/details/'.$res->id_siswa); ?>">Detail</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="panel">
    <div class="panel-heading">
      <h4 class="panel-title">List treatment</h4>
    </div>
    <div class="row pad-btm">
      <?= form_open_multipart('data_list_guru/index/'); ?>
      <div style="margin-right: -40px">
        <div class="col-md-10">
          <div class="input-daterange input-group" id="datepicker">
            <input type="date" name="awl" class="form-control">
            <div class="input-group-addon">to</div>
            <input type="date" name="akr" class="form-control" >
            <!-- <input type="hidden" value="<?php echo $tampil_detail['id_siswa']?>" name="idid"> -->


          </div>

        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
      </div>

      <?= form_close(); ?>
    </div>
    <div class="panel-body">
      <table id="demo-dt-selection" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Nama Treatment</th>
            <th>Keterangan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tampil_treatment as $tment) {
           $id = $tment->id_siswa;?>
           <tr>
            <td><?php echo $tment->nama_siswa; ?></td>
            <td><?php echo $tment->kelas; ?></td>
            <td><?php echo $tment->jurusan; ?></td>
            <td><?php echo $tment->nama_treatment; ?></td>
            <td><?php echo $tment->keterangan_treatment; ?></td>
            <td><a class="btn btn-primary btn btn-xs" href="<?php echo base_url('data_siswa_guru/details/'.$tment->id_siswa); ?>">Detail</a></td>
          </tr>
        <?php } ?> 
      </tbody>
    </table>
  </div>
</div>
</div>
</div>






