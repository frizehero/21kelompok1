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
			'jml_siswax'	=> $this->m_data_jurusan->get_siswax(),
			'jml_siswaxi'	=> $this->m_data_jurusan->get_siswaxi(),
			'jml_siswaxii'	=> $this->m_data_jurusan->get_siswaxii(),

		);
		echo Modules::run('template/tampilCore', $data);
	}


	function cariku()
	{
		$cari 						= $this->input->post('cari');
		$data = array(
			'namamodule' 	=> "data_jurusan",
			'namafileview' 	=> "V_hasil_jurusan",
			'tampil'			=> $this->m_data_jurusan->get_siswa($cari),
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
			'filter_kel'	=> $this->m_data_kelas->filter_kel(),
			'tampil'		=> $this->m_data_kelas->filter($kelas,$jurusan),
		);
		echo Modules::run('template/tampilCore', $data);
	}


	
}
