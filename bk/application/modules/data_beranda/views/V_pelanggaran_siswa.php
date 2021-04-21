 <div class="boxed">

    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Pelanggaran Siswa</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li><a href="index.html"><i class="demo-pli-home"></i></a></li>
          <li><a href="<?php  echo base_url('data_beranda/index/');  ?>">Beranda</a></li>
          <li class="active">Pelanggaran Siswa</li>
      </ol><br>
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <!--End breadcrumb-->
      <div class="text-right breadcrumb">
        <div id="demo-custom-toolbar5" class="table-toolbar-left">
            <a href="<?php echo base_url("data_beranda") ?>" class="btn btn-default text-left form-control">Kembali</a>
        </div>
        <form action="<?php echo site_url('data_beranda/carisiswa/') ?>" method="post" class="col-xs-8 col-sm-3 text-right">
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
        <a class="btn btn-success form-control"  style="padding-left: : 10px" href="<?php echo base_url('data_beranda/tampil_pelanggaran_siswa/'); ?>">
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
                <?php foreach ($tampil as $res) {
                    $id = $res->id_riwayat_pelanggaran;
                    ?>
                    <div class="col-sm-3">
                        <div class="panel" style="height: 295px;">
                            <div class="panel-body text-center">
                                <a href="<?php echo base_url('data_siswa/details/'.$res->id_siswa); ?>">
                                    <img alt="Profile Picture" class="img-md img-circle mar-btm" src="<?php echo base_url ()?>assets/img/<?php echo $res->foto_siswa ?>">
                                    <p class="text-lg text-semibold mar-no text-main"><?php echo $res->nama_siswa ?></p></a>
                                    <p class="text-muted"><?php echo $res->nis ?></p>
                                    <p>
                                        KELAS : <?php echo $res->kelas?> <br>
                                        JURUSAN : <?php echo $res->jurusan?> <br>
                                    </p>
                                    <ul class="list-unstyled text-center bord-top pad-top mar-no row">
                                        <li class="col-xs-5">
                                            <span class="text-lg text-semibold text-main">
                                                <?php 
                                                $id = $res->id_siswa;

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
                                                $id = $res->id_siswa;

                                                $jumlah_treatment    = $this->m_data_beranda->count_jtreatment($id);

                                                echo $jumlah_treatment;
                                                ?>
                                            </span>
                                            <p class="text-muted mar-no">Treatment</p>
                                        </li>
                                        <li class="col-xs-3">
                                            <span class="text-lg text-semibold text-main">0</span>
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

        <?php echo $pagination; ?>
    </div>               
