<div class="boxed">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Laporan Pelanggaran Siswa</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
         <li><a href="<?php  echo base_url('data_beranda_guru/index/');  ?>"><i class="demo-pli-home"></i></a></li>
         <li class="active">Laporan</a></li>
        </ol>
     <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
     <!--End breadcrumb-->
    
    </div>
</div>


<br>
<br>
<br>

<div id="page-content">

   <!-- Basic Data Tables -->
   <!--===================================================-->


   <div class="row">

    <?php foreach($tampil_jur as $res) {
        $id = $res->id_jurusan;
        ?>

    <div class="col-md-3">
        <?php if ($res->id_jurusan=='1') { ?>
            <div class="panel panel-info panel-colorful media middle pad-all ">
        <?php } ?>

        <?php if ($res->id_jurusan=='2') { ?>
            <div class="panel panel-purple panel-colorful media middle pad-all ">
        <?php } ?>

        <?php if ($res->id_jurusan=='3') { ?>
            <div class="panel panel-success panel-colorful media middle pad-all ">
        <?php } ?>

        <?php if ($res->id_jurusan=='4') { ?>
            <div class="panel panel-warning panel-colorful media middle pad-all ">
        <?php } ?>

        <?php if ($res->id_jurusan=='5') { ?>
            <div class="panel panel-primary panel-colorful media middle pad-all ">
        <?php } ?>

        <?php if ($res->id_jurusan=='6') { ?>
            <div class="panel panel-pink panel-colorful media middle pad-all ">
        <?php } ?>

        <?php if ($res->id_jurusan=='7') { ?>
            <div class="panel panel-danger panel-colorful media middle pad-all ">
        <?php } ?>
        
            <div class="media-left">
                <?php if ($res->id_jurusan == '1') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswarpl; ?></p>
              </div>
            <?php } ?>
            <?php if ($res->id_jurusan == '2') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswatkj; ?></p>
              </div>
            <?php } ?>
            <?php if ($res->id_jurusan == '3') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswatpm; ?></p>
              </div>
            <?php } ?>
            <?php if ($res->id_jurusan == '4') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswatitl; ?></p>
              </div>
            <?php } ?>
            <?php if ($res->id_jurusan == '5') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswatipk; ?></p>
              </div>
            <?php } ?>
            <?php if ($res->id_jurusan == '6') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswatb; ?></p>
              </div>
            <?php } ?>
            <?php if ($res->id_jurusan == '7') { ?>
              <div class="pad-hor">
                <p class="text-3x mar-no text-bold"><?php echo $jml_siswatkr; ?></p>
              </div>
            <?php } ?>
            </div>
            <div class="media-body">
                <center><p class="text-2x mar-no text-semibold"><?php echo $res->jurusan ; ?></p></center>
                <center><a data-toggle="modal" data-target="#demo-default-modal1<?php echo $res->id_jurusan?>" class="mar-no btn">Klik Untuk Detail</a></center>
            </div>
        </div>
    </div>

                <div class="modal fade" id="demo-default-modal1<?php echo $res->id_jurusan?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!--Modal Update-->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                            <p class="modal-title text-2x text-semibold">Pilih Tanggal Untuk Melihat Detail</p>
                          </div>
                          <?= form_open_multipart('data_laporan/filter/'); ?>


                          <!--Modal body--> 
                        <div class="modal-body">
                            <div class="panel-body">
                              <input type="hidden" name="jurusan" value="<?php echo $res->id_jurusan?>">
                               <div class="pad-all">
                              
                                    <div class="box-inline mar-btm pad-rgt">
                                        <p class="modal-title text-1x">Pilih Tanggal :</p>
                                        <div class="select">
                                            <input class="btn btn-default" required="" type="date" name="awal">
                                        </div>
                                    </div>
                                    <div class="box-inline mar-btm">
                                        <p class="modal-title text-1x">Sampai Dengan :</p>
                                        <div class="select">
                                            <input class="btn btn-default" required="" type="date" name="akhir">
                                        </div>
                                    </div>

                                   <!--  <br>

                                        <label class="control-label"> <p class="modal-title text-1x  ">Pilih Kelas :</p></label>
                                            <select class="form-control" name="kelas" id="demo-ease" required="">
                                                <option  value="">Kelas </option>
                                                    <?php  foreach($filter_kel as $kel) {  ?>
                                                <option  value="<?= $kel->id_kelas ?>"><?= $kel->kelas ?></option>
                                                    <?php }?>
                                            </select> -->

                                </div>
                                    
                            </div>
                        </div>

                        <!--Modal footer-->
                        <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-primary" type="submit">cari</button>
                        </div>
                        <?= form_close(); ?>
                      </div>
                    </div>
                  </div>

    <?php } ?>
</div>
</div>








<!--===================================================-->
<!-- End Striped Table -->



<!--===================================================-->
<!--End page content-->




