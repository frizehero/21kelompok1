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
			'namamodule' 	=> "data_laporan_guru",
			'namafileview' 	=> "V_data_laporan_guru",
			'tampil'		=> $this->m_data_laporan_guru->tampil(),
			'jum_sis'		=> $this->m_data_laporan_guru->jum_sis(),
			'jum_laki'		=> $this->m_data_laporan_guru->jum_laki(),
			'tampil_jur'	=> $this->m_data_laporan_guru->tampil_jur(),
			'jum_perempuan'	=> $this->m_data_laporan_guru->jum_perempuan(),

		);
		echo Modules::run('template_guru/tampilCore', $data);
	}

	function tampilsiswa()
	{
		$data = array(
			'namamodule' 	=> "data_laporan_guru",
			'namafileview' 	=> "V_data_laporan_siswa_guru",
			'tampil'		=> $this->m_data_laporan_guru->tampil_siswa(),

		);
		echo Modules::run('template_guru/tampilCore', $data);
	}

	

}
 