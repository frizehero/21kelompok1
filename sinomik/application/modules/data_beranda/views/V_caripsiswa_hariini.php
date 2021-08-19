 <div class="boxed">

  <div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
      <h1 class="page-header text-overflow">Pelanggaran Siswa Hari Ini</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('data_beranda') ?>"><i class="demo-pli-home"></i></a></li>
      <li><a href="<?php  echo base_url('data_beranda/index/');  ?>">Beranda</a></li>
      <li class="active">Pelanggaran Siswa Hari Ini</li>
    </ol><br>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->
    <div class="text-right breadcrumb">
      <div id="demo-custom-toolbar5" class="table-toolbar-left">
        <a href="<?php echo base_url("data_beranda") ?>" class="btn btn-default text-left form-control">Kembali</a>
      </div>
      <form action="<?php echo site_url('data_beranda/cariku/') ?>" method="post" class="col-xs-8 col-sm-3 text-right">
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
        <a class="btn btn-success form-control"  style="padding-left: : 10px" href="<?php echo base_url('data_beranda/tampil_pelanggaran_siswa_hari_ini/'); ?>">
          <i class="fa fa-refresh" ></i>
        </a>
      </div> 
    </center>

  </form>
</div>
</div><br><br>


<div id="page-content">
  <div class="row">
    <div class="col-sm-12">
      <div class="row">

        <?php foreach ($pelanggar_hariini as $pelanggar_hariini) {
          $id = $pelanggar_hariini->id_riwayat_pelanggaran;
          ?>
          <div class="col-sm-3">
            <div class="panel">
              <div class="panel-body text-center">
                <a href="detail-siswa.html">
                  <img alt="Profile Picture" class="img-md img-circle mar-btm" src="<?php echo base_url ()?>assets/img/<?php echo $pelanggar_hariini->foto_siswa ?>">
                  <p class="text-lg text-semibold mar-no text-main"><?php echo $pelanggar_hariini->nama_siswa ?></p></a>
                  <p class="text-muted"><?php echo $pelanggar_hariini->nis ?></p>
                  <p>
                    KELAS : <?php echo $pelanggar_hariini->kelas?> <br>
                    JURUSAN : <?php echo $pelanggar_hariini->jurusan?> <br>
                  </p>
                  <ul class="list-unstyled text-center bord-top pad-top mar-no row">
                    <li class="col-xs-5">
                      <span class="text-lg text-semibold text-main">
                        <?php 
                        $id = $pelanggar_hariini->id_siswa;

                        $jumlah_pelanggaranku      = $this->m_data_beranda->count_jpelanggaran($id);
                        $jumlah_pelanggaran_kerapian  = $this->m_data_beranda->count_jpelanggaran_kerapian($id);
                        $jumlah_pelanggaran_berat   = $this->m_data_beranda->count_jpelanggaran_berat($id);

                        $total = $jumlah_pelanggaranku + $jumlah_pelanggaran_kerapian + $jumlah_pelanggaran_berat;

                        echo $total;
                        ?>
                      </span>
                      <p class="text-muted mar-no">Pelanggaran</p>
                    </li>
                    <li class="col-xs-4">
                      <span class="text-lg text-semibold text-main">
                        <?php 
                        $id = $pelanggar_hariini->id_siswa;

                        $jumlah_treatment    = $this->m_data_beranda->count_jtreatment($id);

                        echo $jumlah_treatment;
                        ?>
                      </span>
                      <p class="text-muted mar-no">Treatment</p>
                    </li>
                    <li class="col-xs-3">
                      <span class="text-lg text-semibold text-main">
                        <?php 
                        $jpelanggaran1          = $this->m_data_beranda->jumlahpelanggaran1($id);
                        $jpelanggaran2          = $this->m_data_beranda->jumlahpelanggaran2($id);
                        $jpelanggaran3          = $this->m_data_beranda->jumlahpelanggaran3($id);
                        $jumlahpointprestasi     = $this->m_data_beranda->jumlahpointprestasi($id);


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
          <?php } ?>
        </div>
      </div>
    </div>


  </div></div>            
