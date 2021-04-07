<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_laporan extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_laporan');
		 $this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$data = array(
			'namamodule' 	=> "data_laporan",
			'namafileview' 	=> "V_data_laporan",
			'tampil'		=> $this->m_data_laporan->tampil(),
			'jum_sis'		=> $this->m_data_laporan->jum_sis(),
			'jum_laki'		=> $this->m_data_laporan->jum_laki(),
			'tampil_jur'	=> $this->m_data_laporan->tampil_jur(),
			'jum_perempuan'	=> $this->m_data_laporan->jum_perempuan(),

		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tampilsiswa()
	{
		$data = array(
			'namamodule' 	=> "data_laporan",
			'namafileview' 	=> "V_data_laporan_siswa",
			'tampil'		=> $this->m_data_laporan->tampil_siswa(),

		);
		echo Modules::run('template/tampilCore', $data);
	}

	

}
 