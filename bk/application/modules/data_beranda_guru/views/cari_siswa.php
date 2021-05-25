 <div class="boxed">

  <div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
      <h1 class="page-header text-overflow">Laporkan Siswa</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('data_beranda_guru') ?>"><i class="demo-pli-home"></i></a></li>
      <li><a href="<?php  echo base_url('data_beranda_guru/index/');  ?>">Beranda</a></li>
      <li class="active">Laporkan Siswa</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->
  </div>
  

</div>
<div class="text-right breadcrumb">
      <div id="demo-custom-toolbar5" class="table-toolbar-left">
        <a class="btn btn-default text-left" type="button" href="<?php  echo base_url('data_beranda_guru/index/');  ?>">Kembali</a>
      </div>
</div>
<br>

<div id="page-content">
  <div class="row">
    <div class="panel-body">
     <div class="panel">

      <div class="panel-body">
        <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nama</th>
              <th>NIS</th>
              <th>Kelas</th>
              <th>Jurusan</th>
              <th>Point</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($hasilcari as $res) {
             $id = $res ->id_siswa;
             ?>
             <tr>
              <td><?php echo $res->nama_siswa ?></td>
              <td><?php echo $res->nis ?></td>
              <td><?php echo $res->kelas ?></td>
              <td><?php echo $res->jurusan ?></td>
              <td class="text-center"><div class="label label-table label-info"> <?php 
              $jpelanggaran1          = $this->m_data_beranda_guru->jumlahpelanggaran1($id);
              $jpelanggaran2          = $this->m_data_beranda_guru->jumlahpelanggaran2($id);
              $jpelanggaran3          = $this->m_data_beranda_guru->jumlahpelanggaran3($id);
              $jumlahpointtreatment   = $this->m_data_beranda_guru->jumlahpointtreatment($id);


              $total_pelanggaran      = $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
              $total_treatment        = $jumlahpointtreatment['point'];
              $total_point            = $total_pelanggaran - $total_treatment;

              echo $total_point;
              ?></div></td>
              <td><a class="btn btn-primary btn btn-xs" href="<?php echo base_url('data_siswa_guru/details/'.$res->id_siswa); ?>">Detail</a></td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>

  </div> 
</div>
</div>
</div>
               
