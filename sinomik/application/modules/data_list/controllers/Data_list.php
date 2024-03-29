<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_list extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_list');
		 $this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$awal						= $this->input->post('awal');
		$akhir						= $this->input->post('akhir');
		$awl						= $this->input->post('awl');
		$akr						= $this->input->post('akr');

		$data = array(
			'namamodule' 			=> "data_list",
			'namafileview' 			=> "V_data_list",
			'tampil'				=> $this->m_data_list->tampil($awal, $akhir),
			'tampil_treatment'		=> $this->m_data_list->tampil_treatment($awl, $akr),
			'awal'					=> $awal,
			'akhir'					=> $akhir,
			'awl'					=> $awl,
			'akr'					=> $akr,
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function fpdf(){
		$mpdf = new\Mpdf\Mpdf();

		$awal						= $this->input->post('awal');
		$akhir						= $this->input->post('akhir');

		$hasil = array(
			'namamodule' 			=> "data_list",
			'tampil'				=> $this->m_data_list->tampil($awal, $akhir),
			'awal'					=> $awal,
			'akhir'					=> $akhir,
		);

		$data = $this->load->view('V_export',$hasil,TRUE);
		$nama = "DATA SISWA";
		$mpdf->WriteHTML($data);
		$mpdf->output($nama.'.pdf','I');

	}
	function fpdf1(){
		$mpdf = new\Mpdf\Mpdf();

		$awl						= $this->input->post('awl');
		$akr						= $this->input->post('akr');

		$hasil = array(
			'namamodule' 			=> "data_list",
			'tampil_treatment'		=> $this->m_data_list->tampil_treatment($awl, $akr),
			'awl'					=> $awl,
			'akr'					=> $akr,
		);

		$data = $this->load->view('export',$hasil,TRUE);
		$nama = "DATA SISWA";
		$mpdf->WriteHTML($data);
		$mpdf->output($nama.'.pdf','I');

	}

  // public function export(){
  //   // Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excel
  //   header("Content-type: application/vnd.ms.excel");
  //   header("Content-Disposition: attachment; filename=Data_Siswa.xls");
  //   $awal           = $this->input->post('awal');
  //   $akhir          = $this->input->post('akhir');

  //   $data = array(
  //     'namamodule'      => "data_list",
  //     'namafileview'      => "V_data_list",
  //     'tampil'        => $this->m_data_list->tampil($awal, $akhir),
  //   );
  //   $this->load->view('V_export', $data);
  //   // $data['data_siswa'] = $this->m_data_list->tampil();
  //   // $this->load->model('tampil', $data);
  // }


	// public function export(){
 //    // Load plugin PHPExcel nya
 //    include APPPATH.'third_party/PHPExcel.php';
    
 //    // Panggil class PHPExcel nya
 //    $excel = new PHPExcel();
 //    // Settingan awal fil excel
 //    $excel->getProperties()->setCreator('My Notes Code')
 //                 ->setLastModifiedBy('My Notes Code')
 //                 ->setTitle("Data laporan 1")
 //                 ->setSubject("laporan")
 //                 ->setDescription("Laporan Semua Data Siswa")
 //                 ->setKeywords("Data Siswa");
 //    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
 //    $style_col = array(
 //      'font' => array('bold' => true), // Set font nya jadi bold
 //      'alignment' => array(
 //        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
 //        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
 //      ),
 //      'borders' => array(
 //        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
 //        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
 //        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
 //        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
 //      )
 //    );
 //    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
 //    $style_row = array(
 //      'alignment' => array(
 //        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
 //      ),
 //      'borders' => array(
 //        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
 //        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
 //        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
 //        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
 //      )
 //    );
 //    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
 //    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
 //    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
 //    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
 //    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
 //    // Buat header tabel nya pada baris ke 3
 //    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
 //    $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA SISWA"); // Set kolom B3 dengan tulisan "NIS"
 //    $excel->setActiveSheetIndex(0)->setCellValue('C3', "KELAS"); // Set kolom C3 dengan tulisan "NAMA"
 //    $excel->setActiveSheetIndex(0)->setCellValue('D3', "JURUSAN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
 //    $excel->setActiveSheetIndex(0)->setCellValue('E3', "NAMA PELANGGARAN"); // Set kolom E3 dengan tulisan "ALAMAT"
 //    $excel->setActiveSheetIndex(0)->setCellValue('F3', "KETERANGAN PELANGGARAN"); // Set kolom E3 dengan tulisan "ALAMAT"
 //    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
 //    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
 //    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
 //    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
 //    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
 //    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
 //    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
 //    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
 //    $tampil = $this->m_data_list->tampil();
 //    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
 //    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
 //    foreach ($tampil as $res){ // Lakukan looping pada variabel siswa
 //      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
 //      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $res->nama_siswa);
 //      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $res->id_kelas);
 //      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $res->id_jurusan);
 //      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $res->id_pelanggaran);
 //      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $res->keterangan_pelanggaran);
      
 //      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
 //      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
 //      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
 //      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
 //      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
 //      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
 //      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      
 //      $no++; // Tambah 1 setiap kali looping
 //      $numrow++; // Tambah 1 setiap kali looping
 //    }
 //    // Set width kolom
 //    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
 //    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
 //    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
 //    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
 //    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
 //    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(35); // Set width kolom E
    
 //    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
 //    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
 //    // Set orientasi kertas jadi LANDSCAPE
 //    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
 //    // Set judul file excel nya
 //    $excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
 //    $excel->setActiveSheetIndex(0);
 //    // Proses file excel
 //    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 //    header('Content-Disposition: attachment; filename="Data laporan Siswa.xlsx"'); // Set nama file excel nya
 //    header('Cache-Control: max-age=0');
 //    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
 //    $write->save('php://output');
 //  }
}
