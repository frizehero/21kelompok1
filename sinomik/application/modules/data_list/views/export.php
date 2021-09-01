<?php
//Jika download plugin mpdf tanpa composer (versi lama)
define('_MPDF_PATH','mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4', 11, 'Georgia');
 
//Jika download plugin mpdf dengan composer (versi baru)
//require_once __DIR__ . '/vendor/autoload.php';
//$mpdf = new \Mpdf\Mpdf();
 
//Menggabungkan dengan file koneksi yang telah kita buat
include 'application/config/database.php';
 
$nama_dokumen='hasil-ekspor';
ob_start();
?>
 
<!DOCTYPE html>
<html>
<head>
  
</head>
<body>
  <div>
    <h2>Cara Ekspor Data/Laporan ke PDF Dengan Mudah Menggunakan Mpdf pada PHP</h2>
 
    <table border="1">
        <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Jurusan</th>
              <th>Nama Pelanggaran</th>
              <th>Keterangan</th>
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
            </tr>
          <?php } ?>
        </tbody>
      </table>
 
    </div>
 
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
 
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
$db1->close();
?>