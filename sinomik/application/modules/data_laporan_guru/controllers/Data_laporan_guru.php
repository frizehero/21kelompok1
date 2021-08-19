<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_laporan_guru extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_laporan_guru');
		 $this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$data = array(
			'namamodule' 			=> "Data_laporan_guru",
			'namafileview' 			=> "V_data_laporan_guru",
			'tampil'				=> $this->m_data_laporan_guru->tampil(),
			'tampil_treatment'		=> $this->m_data_laporan_guru->tampil_treatment(),
			'jum_sis'				=> $this->m_data_laporan_guru->jum_sis(),
			'jum_laki'				=> $this->m_data_laporan_guru->jum_laki(),
			'tampil_jur'			=> $this->m_data_laporan_guru->tampil_jur(),
			'jum_perempuan'			=> $this->m_data_laporan_guru->jum_perempuan(),
			'jml_siswarpl'			=> $this->m_data_laporan_guru->jml_siswarpl(),
			'jml_siswatkj'			=> $this->m_data_laporan_guru->jml_siswatkj(),
			'jml_siswatpm'			=> $this->m_data_laporan_guru->jml_siswatpm(),
			'jml_siswatitl'			=> $this->m_data_laporan_guru->jml_siswatitl(),
			'jml_siswatipk'			=> $this->m_data_laporan_guru->jml_siswatipk(),
			'jml_siswatb'			=> $this->m_data_laporan_guru->jml_siswatb(),
			'jml_siswatkr'			=> $this->m_data_laporan_guru->jml_siswatkr(),
			// 'filter_kel'	=> $this->m_data_laporan->filter_kel(),


		);
		echo Modules::run('template_guru/tampilCore', $data);
	}

	// function tampilsiswa()
	// {
	// 	$data = array(
	// 		'namamodule' 	=> "data_laporan",
	// 		'namafileview' 	=> "V_data_laporan_siswa",
	// 		'tampil'		=> $this->m_data_laporan->tampil_siswa(),

	// 	);
	// 	echo Modules::run('template/tampilCore', $data);
	// }

	function filter()
	{
		$awal						= $this->input->post('awal');
		$akhir						= $this->input->post('akhir');
		$jurusan 					= $this->input->post('jurusan');
		

		$data = array(
			'namamodule' 			=> "data_laporan_guru",
			'namafileview' 			=> "V_data_laporan_siswa_guru",
			// 'filter_kel'			=> $this->m_data_laporan->filter_kel(),
			// 'filter_tanggal'		=> $this->m_data_laporan->filter_tanggal($awal, $akhir),
			'tampil_riwayat'		=> $this->m_data_laporan_guru->tampil_riwayat($jurusan, $awal, $akhir),
			);
		echo Modules::run('template_guru/tampilCore', $data);
	}

	function cariww()
	{
		$cari 						= $this->input->post('cari');
		$data = array(
			'namamodule' 				=> "data_laporan_guru",
			'namafileview' 				=> "V_data_laporan_siswa_guru",
			'tampil_riwayat'			=> $this->m_data_laporan_guru->get_siswa($cari),
			'cari'						=> $cari,
		);
		echo Modules::run('template_guru/tampilCore', $data);
	}
	

}
 