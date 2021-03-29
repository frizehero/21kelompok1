<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_beranda extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_beranda');
		 $this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$data = array(
			'namamodule' 	=> "data_beranda",
			'namafileview' 	=> "V_data_beranda",
			'tampil'		=> $this->m_data_beranda->tampil(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tampil_pelanggaran_siswa()
	{
		$data = array(
			'namamodule' 	=> "data_beranda",
			'namafileview' 	=> "V_pelanggaran_siswa",
			'tampil'		=> $this->m_data_beranda->tampil_pelanggaran_siswa(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tampil_pelanggaran_siswa_hari_ini()
	{
		$data = array(
			'namamodule' 	=> "data_beranda",
			'namafileview' 	=> "V_pelanggaran_siswa_hari_ini",
			'tampil'		=> $this->m_data_beranda->tampil_pelanggaran_siswa_hari_ini(),
		);
		echo Modules::run('template/tampilCore', $data);
	}
}