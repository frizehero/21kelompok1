<!DOCTYPE html>
<html>
<head>
  <title>Data Siswa</title>
</head>
<body>
  <center><h3 align="center">LAPORAN DETAIL SISWA</h3></center>
  
          <table border="1" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Nis</th>
              <th>Alamat</th>
              <th>Tanggal Lahir</th>
              <th>Jenis Kelamin</th>
              <th>Kelas</th>
              <th>Jurusan</th>
              <th>Agama</th>
              <th>Total Point</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($tampil as $res) {
            $id = $res->id_siswa;
            ?>
            <tr>
            <td><?php echo $res->nama_siswa?></td>
            <td><?php echo $res->nis?></td>
            <td><?php echo $res->alamat_siswa?></td>
            <td><?php echo $res->tanggal_lahir_siswa?></td>
            <td><?php echo $res->jenis_kelamin_siswa?></td>
            <td><?php echo $res->kelas?></td>
            <td><?php echo $res->jurusan?></td>
            <td><?php echo $res->agama?></td>
            <td><?php echo $total_point?></td>
             <?php } ?>
             </tr>
        </tbody>
        

      </table>
      <br>
   
      <br>
       <table border="1" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Tanggal Pelanggaran</th>
                      <th>Foto Pelanggaran</th>
                      <th>Pelanggaran</th>
                      <th>point</th>
                      <th>Petugas</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php foreach ($tampil_pelanggaran as $tment) {
                     $id = $tment->id_riwayat_pelanggaran;?>
                     <tr>
                      <td><?php echo $tment->tanggal_pelanggaran; ?></td>
                      <td><img src="<?php echo base_url ()?>assets/img/<?php echo $tment->foto_pelanggaran ?>" class="img-sm img-box" alt="Profile Picture"></td>
                      <td><?php echo $tment->nama_pelanggaran; ?></td>
                      <td>+<?php echo $tment->point; ?></td>
                      <td><?php echo $tment->nama_guru; ?></td>
                      <td><?php echo $tment->keterangan_pelanggaran; ?></td>
                    </tr>
                  <?php } ?> 

                  <?php foreach ($tampil_pelanggaran_kerapian as $tment) {
                   $id = $tment->id_riwayat_pelanggaran;?>
                   <tr>
                    <td><?php echo $tment->tanggal_pelanggaran; ?></td>
                    <td><img src="<?php echo base_url ()?>assets/img/<?php echo $tment->foto_pelanggaran ?>" class="img-sm img-box" alt="Profile Picture"></td>
                    <td><?php echo $tment->nama_pelanggaran_kerapian; ?></td>
                    <td>+<?php echo $tment->point; ?></td>
                    <td><?php echo $tment->nama_guru; ?></td>
                    <td><?php echo $tment->keterangan_pelanggaran; ?></td>
                  </tr>
                <?php } ?>

                <?php foreach ($tampil_pelanggaran_berat as $tment) {
                 $id = $tment->id_riwayat_pelanggaran;?>
                 <tr>
                  <td><?php echo $tment->tanggal_pelanggaran; ?></td>
                  <td><img src="<?php echo base_url ()?>assets/img/<?php echo $tment->foto_pelanggaran ?>" class="img-sm img-box" alt="Profile Picture"></td>
                  <td><?php echo $tment->nama_pelanggaran_berat; ?></td>
                  <td>+<?php echo $tment->point; ?></td>
                  <td><?php echo $tment->nama_guru; ?></td>
                  <td><?php echo $tment->keterangan_pelanggaran; ?></td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
          <br>
          <br>
           <table border="1" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Tanggal Treatment</th>
                  <th>Foto Treatment</th>
                  <th>Nama Treatment</th>
                  <th class="min-tablet">Petugas</th>
                  <th class="min-tablet">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tampil_treatment as $tment) {
                 $id = $tment->id_riwayat_treatment;?>
                 <tr>
                  <td><?php echo $tment->tanggal_treatment; ?></td>
                  <td><img src="<?php echo base_url ()?>assets/img/<?php echo $tment->foto_treatment ?>" class="img-sm img-box" alt="Profile Picture"></td>
                  <td><?php echo $tment->nama_treatment; ?></td>
                  <td><?php echo $tment->nama_guru; ?></td>
                  <td><?php echo $tment->keterangan_treatment; ?></td>
                </tr>
              <?php } ?> 
            </tbody>
          </table>
          <br>
          <br>
           <table border="1" cellspacing="0" width="100%">
            <thead>
              <tr>
               <th>Tanggal Prestasi</th>
               <th>Foto Prestasi</th>
               <th>Prestasi</th>
               <th>point</th>
               <th>Keterangan</th>
             </tr>
           </thead>
           <tbody>
            <?php foreach ($tampil_prestasi as $tpres) {
             $id = $tpres->id_riwayat_treatment;?>
             <tr>
              <td><?php echo $tpres->tanggal_treatment; ?></td>
              <td><img src="<?php echo base_url ()?>assets/img/<?php echo $tpres->foto_prestasi ?>" class="img-sm img-box" alt="Profile Picture"></td>
              <td><?php echo $tpres->nama_prestasi; ?></td>
              <td><?php echo $tpres->point; ?></td>
              <td><?php echo $tpres->keterangan_treatment; ?></td>
            </tr>
          <?php } ?> 
        </tbody>
      </table>
</body>
</html>