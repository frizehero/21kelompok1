<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_beranda_guru extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_beranda_guru');
		 $this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$data = array(
			'namamodule' 		=> "data_beranda_guru",
			'namafileview' 		=> "V_data_beranda_guru",
			'tampil'			=> $this->m_data_beranda_guru->tampil(),
			'jum_gur'			=> $this->m_data_beranda_guru->jum_gur(),
			'pelanggar_hariini' => $this->m_data_beranda_guru->pelanggar_hariini(),
			'pterbaru' 			=> $this->m_data_beranda_guru->pterbaru(),
			'tterbaru' 			=> $this->m_data_beranda_guru->tterbaru(),
		);
		echo Modules::run('template_guru/tampilCore', $data);
	}

	function pelanggaran($id)
	{

		$jumlah_pelanggaranku			= $this->m_data_beranda_guru->count_jpelanggaran($id);
		$jumlah_pelanggaran_kerapian	= $this->m_data_beranda_guru->count_jpelanggaran_kerapian($id);
		$jumlah_pelanggaran_berat		= $this->m_data_beranda_guru->count_jpelanggaran_berat($id);

		$total = $jumlah_pelanggaranku + $jumlah_pelanggaran_kerapian + $jumlah_pelanggaran_berat;

		$jpelanggaran1					= $this->m_data_beranda_guru->jumlahpelanggaran1($id);
		$jpelanggaran2					= $this->m_data_beranda_guru->jumlahpelanggaran2($id);
		$jpelanggaran3					= $this->m_data_beranda_guru->jumlahpelanggaran3($id);
		$jumlahpointtreatment			= $this->m_data_beranda_guru->jumlahpointtreatment($id);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointtreatment['point'];


		$data = array(
			'namamodule' 					=> "data_beranda_guru",
			'namafileview' 					=> "V_data_beranda_guru",
			'tampil'						=> $this->m_data_beranda_guru->tampilpelanggaran(),
			'pelanggar_hariini'				=> $this->m_data_beranda_guru->pelanggar_hariini(),
			'jumlah_pelanggaran'			=> $total,
			'total_point'					=> $total_pelanggaran - $total_treatment,

		);
		echo Modules::run('template_guru/tampilCore', $data);
	}


	function tampil_pelanggaran_siswa()
	{
		$data = array(
			'namamodule' 	=> "data_beranda_guru",
			'namafileview' 	=> "V_pelanggaran_siswa",
			'tampil'		=> $this->m_data_beranda_guru->tampil_pelanggaran_siswa(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tampil_pelanggaran_siswa_hari_ini()
	{
		$data = array(
			'namamodule' 	=> "data_beranda_guru",
			'namafileview' 	=> "V_pelanggaran_siswa_hari_ini",
			'tampil'		=> $this->m_data_beranda_guru->tampil_pelanggaran_siswa_hari_ini(),
		);
		echo Modules::run('template/tampilCore', $data);
	}
	function tampilpelanggaran($id)
	{

		$jpelanggaran1			= $this->m_data_siswa->jumlahpelanggaran1($id);
		$jpelanggaran2			= $this->m_data_siswa->jumlahpelanggaran2($id);
		$jpelanggaran3			= $this->m_data_siswa->jumlahpelanggaran3($id);
		$jumlahpointtreatment	= $this->m_data_siswa->jumlahpointtreatment($id);
		$total_pelanggaran		= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment		= $jumlahpointtreatment['point'];

		$data = array(
			'namamodule' 			=> "data_siswa",
			'namafileview' 			=> "V_tambah_pelanggaran",
			'tampil'				=> $this->m_data_siswa->tampilpelanggaran($id),
			'tampil1'				=> $this->m_data_siswa->tampil1($id),
			'tampil2'				=> $this->m_data_siswa->tampil2($id),
			'id'					=> $id,
			'total_point'			=> $total_pelanggaran - $total_treatment,
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function carisiswa()
	{
		$cari 		= $this->input->post('cari');
		$data = array(
			'namamodule' 	=> "data_beranda_guru",
			'namafileview' 	=> "cari_siswa",
			'hasilcari'		=> $this->m_data_beranda_guru->carinisnama(),
		);
		echo Modules::run('template_guru/tampilCore', $data);
	}
}