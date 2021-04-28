<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kelas_guru extends MX_Controller {


	function __construct()
	{
		parent::__construct();
		// model
		$this->load->model('m_data_kelas_guru');
		$this->load->model('login/m_session');
		$this->load->library('pagination');
		$this->load->library('session');
	}


	
	// index
	function index()
	{

		$data = array(
			'namamodule' 	=> "data_kelas_guru",
			'namafileview' 	=> "V_data_kelas_guru",
			'filter_jur'	=> $this->m_data_kelas_guru->filter_jur(),
			'filter_kel'	=> $this->m_data_kelas_guru->filter_kel(),
			'row'			=> $this->m_data_kelas_guru->tampil(),
			'jml_siswarpl'	=> $this->m_data_kelas_guru->jml_siswarpl(),
			'jml_siswatkj'	=> $this->m_data_kelas_guru->jml_siswatkj(),
			'jml_siswatpm'	=> $this->m_data_kelas_guru->jml_siswatpm(),
			'jml_siswatitl'	=> $this->m_data_kelas_guru->jml_siswatitl(),
			'jml_siswatipk'	=> $this->m_data_kelas_guru->jml_siswatipk(),
			'jml_siswatb'	=> $this->m_data_kelas_guru->jml_siswatb(),
			'jml_siswatkr'	=> $this->m_data_kelas_guru->jml_siswatkr(),

		);
		echo Modules::run('template_guru/tampilCore', $data);
	}


	function carik()
	{
		$cari 						= $this->input->post('cari');
		$data = array(
			'namamodule' 	=> "data_kelas_guru",
			'namafileview' 	=> "V_hasil_kelas_guru",
			'tampil'			=> $this->m_data_kelas_guru->get_siswa($cari),
			'cari'			=> $cari,
		);
		echo Modules::run('template_guru/tampilCore', $data);
	}



	function filter()
	{
		$kelas 						= $this->input->post('kelas');
		$jurusan 					= $this->input->post('jurusan');
		

		$data = array(
			'namamodule' 	=> "data_kelas_guru",
			'namafileview' 	=> "V_hasil_kelas_guru",
			'filter_kel'	=> $this->m_data_kelas_guru->filter_kel(),
			'tampil'		=> $this->m_data_kelas_guru->filter($kelas,$jurusan),
		);
		echo Modules::run('template_guru/tampilCore', $data);
	}


	
}
