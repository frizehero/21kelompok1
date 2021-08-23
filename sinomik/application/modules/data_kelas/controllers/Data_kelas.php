<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kelas extends MX_Controller {


	function __construct()
	{
		parent::__construct();
		// model
		$this->load->model('m_data_kelas');
		$this->load->model('login/m_session');
		$this->load->library('pagination');
		$this->load->library('session');
	}


	
	// index
	function index()
	{

		$data = array(
			'namamodule' 	=> "data_kelas",
			'namafileview' 	=> "V_data_kelas",
			'filter_jur'	=> $this->m_data_kelas->filter_jur(),
			'filter_kel'	=> $this->m_data_kelas->filter_kel(),
			'row'			=> $this->m_data_kelas->tampil(),
			'jml_siswarpl'	=> $this->m_data_kelas->jml_siswarpl(),
			'jml_siswatkj'	=> $this->m_data_kelas->jml_siswatkj(),
			'jml_siswatpm'	=> $this->m_data_kelas->jml_siswatpm(),
			'jml_siswatitl'	=> $this->m_data_kelas->jml_siswatitl(),
			'jml_siswatipk'	=> $this->m_data_kelas->jml_siswatipk(),
			'jml_siswatb'	=> $this->m_data_kelas->jml_siswatb(),
			'jml_siswatkr'	=> $this->m_data_kelas->jml_siswatkr(),

		);
		echo Modules::run('template/tampilCore', $data);
	}


	function carik()
	{
		$cari 						= $this->input->post('cari');
		$data = array(
			'namamodule' 	=> "data_kelas",
			'namafileview' 	=> "V_hasil_kelas",
			'tampil'			=> $this->m_data_kelas->get_siswa($cari),
			'cari'			=> $cari,
		);
		echo Modules::run('template/tampilCore', $data);
	}



	function filter()
	{
		$kelas 						= $this->input->post('kelas');
		$jurusan 					= $this->input->post('jurusan');
		

		$data = array(
			'namamodule' 	=> "data_kelas",
			'namafileview' 	=> "V_hasil_kelas",
			'filter_kel'	=> $this->m_data_kelas->filter_kel(),
			'tampil'		=> $this->m_data_kelas->filter($kelas,$jurusan),
			'kelas'			=> $kelas,
			'jurusan'		=> $jurusan,
		);
		echo Modules::run('template/tampilCore', $data);
	}


	
}
