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
		$data = array(
			'namamodule' 			=> "data_list",
			'namafileview' 			=> "V_data_list",
			'tampil'				=> $this->m_data_list->tampil(),
			'tampil_treatment'		=> $this->m_data_list->tampil_treatment(),
			'jum_sis'				=> $this->m_data_list->jum_sis(),
			'jum_laki'				=> $this->m_data_list->jum_laki(),
			'tampil_jur'			=> $this->m_data_list->tampil_jur(),
			'jum_perempuan'			=> $this->m_data_list->jum_perempuan(),
			'jml_siswarpl'			=> $this->m_data_list->jml_siswarpl(),
			'jml_siswatkj'			=> $this->m_data_list->jml_siswatkj(),
			'jml_siswatpm'			=> $this->m_data_list->jml_siswatpm(),
			'jml_siswatitl'			=> $this->m_data_list->jml_siswatitl(),
			'jml_siswatipk'			=> $this->m_data_list->jml_siswatipk(),
			'jml_siswatb'			=> $this->m_data_list->jml_siswatb(),
			'jml_siswatkr'			=> $this->m_data_list->jml_siswatkr(),
			// 'filter_kel'	=> $this->m_data_list->filter_kel(),


		);
		echo Modules::run('template/tampilCore', $data);
	}
