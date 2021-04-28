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
         <li><a href="#"><i class="demo-pli-home"></i></a></li>
         <li><a href="#">Laporan</a></li>
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


<div class="panel-body">
    <div class="col-lg-12">

                            <div class="panel">
                                <div class="panel-body">
                                    <div class="panel-heading">
            <div class="panel-control">


            </div>
            <h3 class="panel-title">Riwayat Treatmeant Hari Ini</h3>
        </div>
                                    <div class="table-responsive">
                                        <table class="table table-vcenter mar-top">
                                            <thead>
                                                <tr>
                                                    <th class="min-w-td">Profil</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Jurusan</th>
                                                    <th>Point</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count = 0; ?>

                                                <?php foreach($tampil_treatment as $riwayat) {
                                                    $id = $riwayat->id_siswa;
                                                    $jurusan = $riwayat->jurusan;
                                                    ?>

                                                    <?php if($count == 5) break; ?>
                                                <tr>

                                                        <td><img src="<?php echo base_url ()?>assets/img/<?php echo $riwayat->foto_siswa ?> ?>" alt="Profile Picture" class="img-circle img-sm"></td>
                                                        <td><a class="btn-link" href="#"><?= $riwayat->nama_siswa ?></a></td>
                                                        <td><?= $riwayat->jurusan ?></td>
                                                        <td>
                                                            <span class="label label-table label-info"><?php 
                                                          $jpelanggaran1          = $this->m_data_laporan_guru->jumlahpelanggaran1($id);
                                                          $jpelanggaran2          = $this->m_data_laporan_guru->jumlahpelanggaran2($id);
                                                          $jpelanggaran3          = $this->m_data_laporan_guru->jumlahpelanggaran3($id);
                                                          $jumlahpointtreatment   = $this->m_data_laporan_guru->jumlahpointtreatment($id);


                                                          $total_pelanggaran      = $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
                                                          $total_treatment        = $jumlahpointtreatment['point'];
                                                          $total_point            = $total_pelanggaran - $total_treatment;

                                                          echo $total_point;
                                                          ?>
                                                        </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn btn-success">Detail</div>
                                                        </td>
                                                    
                                                </tr>
                                                    <?php $count++; ?>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <hr>
                    
                                        <!--Pagination-->
                                        <div class="text-right">
                                            <ul class="pagination mar-no">
                                                <li class="disabled"><a class="demo-pli-arrow-left-2" href="#"></a></li>
                                                <li class="active"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><span>...</span></li>
                                                <li><a href="#">20</a></li>
                                                <li><a class="demo-pli-arrow-right-2" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
</div>





<!--===================================================-->
<!-- End Striped Table -->



<!--===================================================-->
<!--End page content-->




