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
     <div class="pad-all text-center ">
        <div class="box-inline mar-btm pad-rgt">
            Pilih Tanggal :
            <div class="select">
                <input class="btn btn-default" type="date" name="tanggal1">
            </div>
        </div>
        <div class="box-inline mar-btm">
            Sampai Dengan :
            <div class="select">
                <input class="btn btn-default" type="date" name="tanggal2">
            </div>
            <button class="btn btn-default">Filter</button>
        </div>
    </div>
</div>
</div>




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
                <div class="pad-hor">
                    <p class="text-3x mar-no text-bold">132</p>
                </div>
            </div>
            <div class="media-body">
                <center><p class="text-2x mar-no text-semibold"><?php echo $res->jurusan ; ?></p></center>
                <center><a href="<?php  echo base_url('data_laporan_guru/tampilsiswa/');  ?>" class="mar-no btn">Klik Untuk Detail</a></center>
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

