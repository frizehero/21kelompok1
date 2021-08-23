<div id="page-head">
  <!--Page Title-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <div id="page-title">
    <h1 class="page-header text-overflow">Filter Kelas</h1>
  </div>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End page title-->


  <!--Breadcrumb-->
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('data_beranda') ?>"><i class="demo-pli-home"></i></a></li>
    <li><a href="#">Data</a></li>
    <li class="active">Filter Kelas</li>
  </ol><br>
  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <!--End breadcrumb-->

  <div class="text-right breadcrumb">
    <div id="demo-custom-toolbar5" class="table-toolbar-left">

    </div>
    <form action="<?php echo site_url('data_kelas/carik/') ?>" method="post" class="col-xs-8 col-sm-3 text-right">
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
      <a class="btn btn-success form-control"  style="padding-left: : 10px" href="<?php echo base_url('data_kelas'); ?>">
        <i class="fa fa-refresh" ></i>
      </a>
    </div> 

  </form>
</div>
</div>