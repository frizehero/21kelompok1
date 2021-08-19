<div class="boxed">

    <div id="page-head">

        <div class="pad-all text-center">
            <h3>Selamat Datang Di Website BK</h3>
            <p1>SMK BISA SMK HEBAT</p1>
        </div>

    </div>

</div>


<div id="page-content">
    <div class="row">

        <div class="col-md-3">
            <div class="panel panel-warning panel-colorful media middle pad-all" style="height: 100px; width: 220px;" >
                <div class="media-left">
                    <div class="pad-hor ion-ios-bookmarks-outline icon-3x">

                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $pelanggar_hariini ?></p>
                    <p class="mar-no">Pelanggaran Hari Ini</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-info panel-colorful media middle pad-all" style="height: 100px; width: 220px;">
                <div class="media-left">
                    <div class="pad-hor">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                            <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                            <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $jum_gur; ?></p>
                    <p class="mar-no">Guru</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-mint panel-colorful media middle pad-all" style="height: 100px; width: 220px;">
                <div class="media-left">
                    <div class="pad-hor ti-agenda icon-3x">

                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $pterbaru ?></p>
                    <p class="mar-no">Total Pelanggaran</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-danger panel-colorful media middle pad-all" style="height: 100px; width: 220px;">
                <div class="media-left">
                    <div class="pad-hor ti-write icon-3x">

                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $tterbaru ?></p>
                    <p class="mar-no">Total Treatment</p>
                </div>
            </div>
        </div>

    </div>

    <div class="panel">
        <div class="panel-body">
          <form action="<?php echo site_url('data_beranda_guru/carisiswa/') ?>" method="post" class="col-sm-10 text-right">
            <label class="col-sm-4 control-label" for="demo-hor-inputemail"><h5>Masukkan Nis/Nama </h5></label>
            <div class="input-group text-right"  style="padding-left: : 5px">
              <?php if($this->uri->segment(2) != 'cari'){?>
                <input type="text" autocomplete="off" name="cari" class="form-control" placeholder="Cari Nis/Nama" required="">
            <?php }
            ?>
            <?php if($this->uri->segment(2) == 'cari'){
                $cari = $this->input->post('cari'); ?>
                <input type="text" autocomplete="off" value="<?= $cari ?>" name="cari" class="form-control " placeholder="Cari Nis/Nama" required="">
            <?php } ?> 
            <div class="input-group-btn  text-right"  style="padding-left: : 10px">
                <button class="btn btn-primary" name="submit" type="submit">cari</button>
            </div>
        </div> 
    </center>

</form>                  
</div>               

</div>

</div>
