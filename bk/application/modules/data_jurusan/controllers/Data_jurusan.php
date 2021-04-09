<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_jurusan extends MX_Controller {


	function __construct()
	{
		parent::__construct();
		// model
		$this->load->model('m_data_jurusan');
		$this->load->model('login/m_session');
		$this->load->library('pagination');
		$this->load->library('session');
	}


	
	// index
	function index()
	{

		$data = array(
			'namamodule' 	=> "data_jurusan",
			'namafileview' 	=> "V_data_jurusan",
			'filter_jur'	=> $this->m_data_jurusan->filter_jur(),
			'filter_kel'	=> $this->m_data_jurusan->filter_kel(),
			'row'			=> $this->m_data_jurusan->tampil(),
			'jml_siswarpl'	=> $this->m_data_jurusan->jml_siswarpl(),
			'jml_siswatkj'	=> $this->m_data_jurusan->jml_siswatkj(),
			'jml_siswatpm'	=> $this->m_data_jurusan->jml_siswatpm(),
			'jml_siswatitl'	=> $this->m_data_jurusan->jml_siswatitl(),
			'jml_siswatipk'	=> $this->m_data_jurusan->jml_siswatipk(),
			'jml_siswatb'	=> $this->m_data_jurusan->jml_siswatb(),
			'jml_siswatkr'	=> $this->m_data_jurusan->jml_siswatkr(),

		);
		echo Modules::run('template/tampilCore', $data);
	}


	function cariku()
	{
		$cari 						= $this->input->post('cari');
		$data = array(
			'namamodule' 	=> "data_jurusan",
			'namafileview' 	=> "V_hasil_jurusan",
			'tampil'		=> $this->m_data_jurusan->get_siswa($cari),
			'cari'			=> $cari,
		);
		echo Modules::run('template/tampilCore', $data);
	}



	function filter()
	{
		$kelas 						= $this->input->post('kelas');
		$jurusan 					= $this->input->post('jurusan');
		

		$data = array(
			'namamodule' 	=> "data_jurusan",
			'namafileview' 	=> "V_hasil_jurusan",
			'filter_kel'	=> $this->m_data_jurusan->filter_kel(),
			'tampil'		=> $this->m_data_jurusan->filter($kelas,$jurusan),
		);
		echo Modules::run('template/tampilCore', $data);
	}


	
}
