<!DOCTYPE html>
<html>
<head>
  <title>Data Siswa</title>
</head>
<body>
  <center><h3 align="center">LAPORAN TREATMENT SISWA</h3></center>
  
          <table border="1" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Nama Treatment</th>
            <th>Keterangan</th>
           
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tampil_treatment as $tment) {
           $id = $tment->id_siswa;?>
           <tr>
            <td><?php echo $tment->nama_siswa; ?></td>
            <td><?php echo $tment->kelas; ?></td>
            <td><?php echo $tment->jurusan; ?></td>
            <td><?php echo $tment->nama_treatment; ?></td>
            <td><?php echo $tment->keterangan_treatment; ?></td>
          </tr>
        <?php } ?> 
      </tbody>
      </table>

</body>
</html>