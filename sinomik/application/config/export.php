<?php
include 'database.php';
?>
<html>
<head>
  <title>Data</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2></h2>
			<h4>ISI</h4>
				<div class="data-tables datatable-dark">
					
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
</div>
	
<script>
$(document).ready(function() {
    $('#demo-dt-basic').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>