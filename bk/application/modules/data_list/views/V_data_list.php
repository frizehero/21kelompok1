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
          <h4>List Pelanggaran Hari Ini</h4>
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
              <td><a class="btn btn-primary btn btn-xs" href="<?php echo base_url('data_siswa/details/'.$res->id_siswa); ?>">Detail</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div> 
</div>
</div>
</div>






