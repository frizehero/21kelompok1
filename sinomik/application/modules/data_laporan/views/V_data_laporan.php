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
     <li><a href="<?php  echo base_url('data_beranda/index/');  ?>"><i class="demo-pli-home"></i></a></li>
     <li>Laporan</a></li>
     <li class="active">Laporan Pelanggaran</a></li>
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

                    <?php if ($res->id_jurusan=='8') { ?>
                    <div class="panel panel-danger panel-colorful media middle pad-all ">
                    <?php } ?>

                    <?php if ($res->id_jurusan=='9') { ?>
                    <div class="panel panel-danger panel-colorful media middle pad-all ">
                    <?php } ?>

                    <?php if ($res->id_jurusan=='10') { ?>
                    <div class="panel panel-danger panel-colorful media middle pad-all ">
                    <?php } ?>

                    <?php if ($res->id_jurusan=='11') { ?>
                    <div class="panel panel-danger panel-colorful media middle pad-all ">
                    <?php } ?>

                    <?php if ($res->id_jurusan=='12') { ?>
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

<!-- <div class="panel">
        <div class="panel-heading">
            <div class="panel-control">


            </div>
            <h3 class="panel-title">Pelanggaran Dalam 1 Tahun</h3>
        </div>
    <div class="panel-body">
        <div class="col-md-12">
            <div id="demo-bar-chart" style="height:250px"></div>
            <hr class="new-section-xs bord-no">
            <ul class="list-inline text-center">
                <li><span class="label label-info">771</span> Laki - Laki</li>
                <li><span class="label label-warning">229</span> Perempuan</li>
                <li><span class="label label-default">25</span> Tidak Pernah</li>
            </ul>
        </div>
    </div>
  </div> -->

  <div class="panel-body">


    <div  class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">Pelanggaran Dalam 1 Bulan</h3>
      </div>

      <div>
        <canvas id="bulan" style="width:100%;max-width:1200px"></canvas>

        <script>
          var yValues = [<?php echo $januari; ?>,
          <?php echo $februari; ?>,
          <?php echo $maret; ?>,
          <?php echo $april; ?>,
          <?php echo $mei; ?>,
          <?php echo $juni; ?>,
          <?php echo $juli; ?>,
          <?php echo $agustus; ?>,
          <?php echo $september; ?>,
          <?php echo $oktober; ?>,
          <?php echo $november; ?>,
          <?php echo $desember; ?>
          ];
          var xValues = ["January","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

          new Chart("bulan", {
            type: "line",
            data: {
              labels: xValues,
              datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgba(0,0,255,0.1)",
                data: yValues
              }]
            },
            options: {
              legend: {display: false},
            }
          });
        </script>
      </div>

    </div>
  </div>






