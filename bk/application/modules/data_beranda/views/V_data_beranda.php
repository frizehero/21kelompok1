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
            <div class="panel panel-warning panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $jum_sis; ?></p>
                    <p class="mar-no">Murid</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-info panel-colorful media middle pad-all">
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
            <div class="panel panel-mint panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694L1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                            <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                        </svg>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">33</p>
                    <p class="mar-no">Ruang Kelas</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-danger panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor ion-university icon-3x">

                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $jum_jur; ?></p>
                    <p class="mar-no">Jurusan</p>
                </div>
            </div>
        </div>

    </div>

    <div id="page-content">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title"> Pelanggaran Perjurusan Perhari</h4>
                        <script>
                            window.onload = function () {

                                var chart = new CanvasJS.Chart("chartContainer", {
                                    animationEnabled: true,
                                    data: [{
                                        type: "doughnut",
                                        startAngle: 60,
                                            //innerRadius: 60,
                                            indexLabelFontSize: 13,
                                            indexLabel: "{label} - #percent%",
                                            toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                                            dataPoints: [
                                            { y: 36, label: "RPL" },
                                            { y: 70, label: "TKR" },
                                            { y: 65, label: "TPM" },
                                            { y: 60, label: "TIPK"},
                                            { y: 10, label: "TB"},
                                            { y: 40, label: "TKJ"},
                                            { y: 45, label: "TITL"}
                                            ]
                                        }]
                                    });
                                chart.render();

                            }
                        </script>
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </div>
                </div>
            </div>

            <div class="col-md-6">


                <!-- Area Chart -->
                <!---------------------------------->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pelanggaran Dalam 1 Minggu</h3>
                    </div>
                    <div class="pad-all">
                        <div id="demo-morris-area-legend" class="text-center"></div>
                        <div id="demo-morris-area" style="height:270px"></div>
                    </div>
                </div>
                <!---------------------------------->

            </div>

            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pelanggaran Siswa</h3>
                    </div>
                    <div class="panel-body">
                        <!-- Timeline -->
                        <!--===================================================-->
                        <div class="timeline">

                            <!-- Timeline header -->
                            <div class="timeline-header">
                                <div class="timeline-header-title bg-info"><a href="<?php  echo base_url('data_beranda/tampil_pelanggaran_siswa/');  ?>"> Lihat Semua</a>
                                </div>
                            </div>

                            <div class="timeline-entry">
                                <div class="timeline-stat">
                                    <a href="detail-siswa.html">
                                        <div class="timeline-icon">
                                            <img src="<?php echo base_url(); ?>assets/img/profile-photos/1.png" alt="Profile picture">
                                        </div> 
                                    </a>
                                    <div class="timeline-time">
                                        <h5>
                                            <div >Point</div>
                                            <div class="text-info text-bold">100</div>
                                        </h5>
                                    </div>

                                </div>
                                <div class="timeline-label">
                                    <p class="text-bold">
                                        <a href="detail-siswa.html" class="text-info">Achmad Muhajir
                                        </a>
                                    </p>
                                    <p>NIS      : 243562</p>
                                    <p>Kelas    : XI</p>
                                    <p>Jurusan  : RPL</p>
                                </div>
                            </div>

                            <div class="timeline-entry">
                                <div class="timeline-stat">
                                    <a href="detail-siswa.html">
                                        <div class="timeline-icon">
                                            <img src="<?php echo base_url(); ?>assets/img/profile-photos/2.png" alt="Profile picture">
                                        </div>
                                    </a>
                                    <div class="timeline-time">
                                        <h5>
                                            <div >Point</div>
                                            <div class="text-info text-bold">100</div>
                                        </h5>               
                                    </div>
                                </div>
                                <div class="timeline-label">
                                    <p class="text-bold">
                                        <a href="detail-siswa.html" class="text-info">Imam Mulkhakim
                                        </a>
                                    </p>
                                    <p>NIS      : 243562</p>
                                    <p>Kelas    : XI</p>
                                    <p>Jurusan  : RPL</p>

                                </div>
                            </div>

                            <div class="timeline-entry">
                                <div class="timeline-stat">
                                    <a href="detail-siswa.html">
                                        <div class="timeline-icon">
                                            <img src="<?php echo base_url(); ?>assets/img/profile-photos/10.png" alt="Profile picture">
                                        </div>
                                    </a>
                                    <div class="timeline-time">
                                        <h5>
                                            <div >Point</div>
                                            <div class="text-info text-bold">100</div>
                                        </h5>            
                                    </div>
                                </div>
                                <div class="timeline-label">
                                    <p class="text-bold">
                                        <a href="detail-siswa.html" class="text-info">Santi Saputri
                                        </a>
                                    </p>
                                    <p>NIS      : 243562</p>
                                    <p>Kelas    : XI</p>
                                    <p>Jurusan  : RPL</p>

                                </div>
                            </div>

                            <div class="timeline-entry">
                                <div class="timeline-stat">
                                    <a href="detail-siswa.html">
                                        <div class="timeline-icon">
                                            <img src="<?php echo base_url(); ?>assets/img/profile-photos/5.png" alt="Profile picture">
                                        </div>
                                    </a>
                                    <div class="timeline-time">
                                        <h5>
                                            <div >Point</div>
                                            <div class="text-info text-bold">100</div> 
                                        </h5>
                                    </div>
                                </div>
                                <div class="timeline-label">
                                    <p class="text-bold">
                                        <a href="detail-siswa.html" class="text-info">Muhammad Davino Budiarto
                                        </a>
                                    </p>
                                    <p>NIS      : 243562</p>
                                    <p>Kelas    : XI</p>
                                    <p>Jurusan  : RPL</p>

                                </div>
                            </div>

                            <div class="timeline-entry">
                                <div class="timeline-stat">
                                    <a href="detail-siswa.html">
                                        <div class="timeline-icon">
                                            <img src="<?php echo base_url(); ?>assets/img/profile-photos/4.png" alt="Profile picture">
                                        </div>
                                    </a>
                                    <div class="timeline-time">
                                        <h5>
                                            <div >Point</div>
                                            <div class="text-info text-bold">100</div> 
                                        </h5>

                                    </div>
                                </div>
                                <div class="timeline-label">
                                    <p class="text-bold">
                                        <a href="detail-siswa.html" class="text-info">Dhimas Endra Kumara
                                        </a>
                                    </p>
                                    <p>NIS      : 243562</p>
                                    <p>Kelas    : XI</p>
                                    <p>Jurusan  : RPL</p>

                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pelanggaran Siswa Hari ini</h3>
                    </div>
                    <div class="panel-body">
                        <!-- Timeline -->
                        <!--===================================================-->
                        <div class="timeline">

                            <!-- Timeline header -->
                            <div class="timeline-header">
                                <div class="timeline-header-title bg-info"><a href="<?php  echo base_url('data_beranda/tampil_pelanggaran_siswa_hari_ini/');  ?>"> Lihat Semua</a>
                                </div>
                            </div>

                            <?php $count = 0; ?>

                            <?php foreach ($pelanggar_hariini as $pelanggar_hariini) {
                                $id = $pelanggar_hariini->id_riwayat_pelanggaran;
                                ?>
                                <?php if($count == 5) break; ?>
                                <div class="timeline-entry">
                                    <div class="timeline-stat">
                                        <a href="detail-siswa.html">
                                            <div class="timeline-icon">
                                                <img src="<?php echo base_url ()?>assets/img/<?php echo $pelanggar_hariini->foto_siswa ?>" alt="Profile picture">
                                            </div> 
                                        </a>
                                        <div class="timeline-time">
                                            <h5>
                                                <div >Point</div>
                                                <div class="text-info text-bold">200</div>
                                            </h5>
                                        </div>

                                    </div>
                                    <div class="timeline-label">
                                        <p class="text-bold">
                                            <a href="<?php echo base_url("data_siswa/details/".$pelanggar_hariini->id_siswa) ?>" class="text-info"><?php echo $pelanggar_hariini->nama_siswa ?>
                                            </a>
                                        </p>
                                        <p>NIS      : <?php echo $pelanggar_hariini->nis ?></p>
                                        <p>Kelas    : <?php echo $pelanggar_hariini->kelas?></p>
                                        <p>Jurusan  : <?php echo $pelanggar_hariini->jurusan?></p>
                                    </div>
                                </div>
                                <?php $count++; ?>
                            <?php } ?>


                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>


