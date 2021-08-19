<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		$this->load->model('m_siswa');
		$this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$data_siswa=  $this->session->userdata('session_id');

		$jumlah_pelanggaranku			= $this->m_siswa->count_jpelanggaran($data_siswa);
		$jumlah_pelanggaran_kerapian	= $this->m_siswa->count_jpelanggaran_kerapian($data_siswa);
		$jumlah_pelanggaran_berat		= $this->m_siswa->count_jpelanggaran_berat($data_siswa);

		$total = $jumlah_pelanggaranku + $jumlah_pelanggaran_kerapian + $jumlah_pelanggaran_berat;

		$jpelanggaran1					= $this->m_siswa->jumlahpelanggaran1($data_siswa);
		$jpelanggaran2					= $this->m_siswa->jumlahpelanggaran2($data_siswa);
		$jpelanggaran3					= $this->m_siswa->jumlahpelanggaran3($data_siswa);
		$jumlahpointprestasi			= $this->m_siswa->jumlahpointprestasi($data_siswa);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointprestasi['point'] ;

		$data = array(
			'namamodule' 					=> "siswa",
			'namafileview' 					=> "V_siswa",
			'tampil'						=> $this->m_siswa->tampildetail($data_siswa),
			'terbaru'						=> $this->m_siswa->pterbaru($data_siswa),
			'tampil_treatment'				=> $this->m_siswa->tampilriwayat_treatment($data_siswa),
			'tampil_prestasi'				=> $this->m_siswa->tampilriwayat_prestasi($data_siswa),
			'jumlah_treatment'				=> $this->m_siswa->count_jtreatment($data_siswa),
			'tampil_pelanggaran'			=> $this->m_siswa->tampilriwayat_pelanggaran($data_siswa),
			'tampil_pelanggaran_kerapian' 	=> $this->m_siswa->tampilriwayat_pelanggaran_kerapian($data_siswa),
			'tampil_pelanggaran_berat'		=> $this->m_siswa->tampilriwayat_pelanggaran_berat($data_siswa),
			'tampil_pelanggaran_samping'	=> $this->m_siswa->tampilriwayat_pelanggaran_samping($data_siswa),
			'tampil_pelanggaran_kerapian_samping' 	=> $this->m_siswa->tampilriwayat_pelanggaran_kerapian_samping($data_siswa),
			'tampil_pelanggaran_berat_samping'		=> $this->m_siswa->tampilriwayat_pelanggaran_berat_samping($data_siswa),
			'jumlah_pelanggaran'			=> $total,
			'total_pelanggaran'				=> $total_pelanggaran,
			'total_prestasi'				=> $total_treatment,
			'total_point'					=> $total_pelanggaran - $total_treatment,
		);
		echo Modules::run('template_siswa/tampilCore', $data);
	}
}