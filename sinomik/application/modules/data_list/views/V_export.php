<!DOCTYPE html>
<html>
<head>
  <title>Data Siswa</title>
</head>
<body>
  <center><h3>LAPORAN PELANGGARAN SISWA</h3></center>
  
          <table border="1" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Jurusan</th>
              <th>Nama Pelanggaran</th>
              <th>Keterangan</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tampil as $res) {
             $id = $res ->id_siswa;
             ?>
             <tr>
              <td><?php echo $res->nama_siswa ?></td>
              <td><?php echo $res->kelas ?></td>
              <td><?php echo $res->jurusan ?></td>
              <td>

                <?php if ($res->id_pelanggaran == null) { ?>

                  <?php if ($res->id_pelanggaran_kerapian == null) { ?>
                    <?php echo $res->nama_pelanggaran_berat ?>
                  <?php } else { ?>
                    <?php echo $res->nama_pelanggaran_kerapian ?>
                  <?php } ?>

                <?php } else { ?>
                  <?php echo $res->nama_pelanggaran ?>
                <?php } ?>


              </td>
              <td><?php echo $res->keterangan_pelanggaran ?></td>
              <td> <?php echo $res->tanggal_pelanggaran?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

</body>
</html>