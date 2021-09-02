<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nyoba extends MX_Controller {


	function __construct()
	{
		parent::__construct();
		// model
		$this->load->model('m_nyoba');
		$this->load->model('login/m_session');
		$this->load->library('session');
	}

	function index()
	{
		$id = $this->session->userdata('session_id');
		$siswa = $this->m_nyoba->oke($id);
		$datasiswa = $siswa['id_siswa'];

		$jumlah_pelanggaranku			= $this->m_nyoba->count_jpelanggaran($datasiswa);
		$jumlah_pelanggaran_kerapian	= $this->m_nyoba->count_jpelanggaran_kerapian($datasiswa);
		$jumlah_pelanggaran_berat		= $this->m_nyoba->count_jpelanggaran_berat($datasiswa);

		$total = $jumlah_pelanggaranku + $jumlah_pelanggaran_kerapian + $jumlah_pelanggaran_berat;

		$jpelanggaran1					= $this->m_nyoba->jumlahpelanggaran1($datasiswa);
		$jpelanggaran2					= $this->m_nyoba->jumlahpelanggaran2($datasiswa);
		$jpelanggaran3					= $this->m_nyoba->jumlahpelanggaran3($datasiswa);
		$jumlahpointprestasi			= $this->m_nyoba->jumlahpointprestasi($datasiswa);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointprestasi['point'] ;


		$data = array(
			'namamodule' 					=> "nyoba",
			'namafileview' 					=> "V_nyoba",
			'tampil'						=> $this->m_nyoba->tampil($datasiswa),
			'tampil_treatment'				=> $this->m_nyoba->tampilriwayat_treatment($datasiswa),
			'tampil_prestasi'				=> $this->m_nyoba->tampilriwayat_prestasi($datasiswa),
			'jumlah_treatment'				=> $this->m_nyoba->count_jtreatment($datasiswa),
			'tampil_pelanggaran'			=> $this->m_nyoba->tampilriwayat_pelanggaran($datasiswa),
			'tampil_pelanggaran_kerapian' 	=> $this->m_nyoba->tampilriwayat_pelanggaran_kerapian($datasiswa),
			'tampil_pelanggaran_berat'		=> $this->m_nyoba->tampilriwayat_pelanggaran_berat($datasiswa),
			'jumlah_pelanggaran'			=> $total,
			'total_pelanggaran'				=> $total_pelanggaran,
			'total_prestasi'				=> $total_treatment,
			'total_point'					=> $total_pelanggaran - $total_treatment,

		);
		echo Modules::run('template_siswa/tampilCore', $data);
	}
}
