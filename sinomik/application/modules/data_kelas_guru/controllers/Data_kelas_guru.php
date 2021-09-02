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
			'namamodule' 		=> "data_kelas_guru",
			'namafileview' 		=> "V_data_kelas_guru",
			'filter_jur'		=> $this->m_data_kelas_guru->filter_jur(),
			'filter_kel'		=> $this->m_data_kelas_guru->filter_kel(),
			'row'				=> $this->m_data_kelas_guru->tampil(),
			'jml_siswarpl'		=> $this->m_data_kelas_guru->jml_siswarpl(),
			'jml_siswatkja'		=> $this->m_data_kelas_guru->jml_siswatkja(),
			'jml_siswatkjb'		=> $this->m_data_kelas_guru->jml_siswatkjb(),
			'jml_siswatitl'		=> $this->m_data_kelas_guru->jml_siswatitl(),
			'jml_siswatipka'	=> $this->m_data_kelas_guru->jml_siswatipka(),
			'jml_siswatipkb'	=> $this->m_data_kelas_guru->jml_siswatipkb(),
			'jml_siswatkra'		=> $this->m_data_kelas_guru->jml_siswatkra(),
			'jml_siswatkrb'		=> $this->m_data_kelas_guru->jml_siswatkrb(),
			'jml_siswatkrc'		=> $this->m_data_kelas_guru->jml_siswatkrc(),
			'jml_siswatb'		=> $this->m_data_kelas_guru->jml_siswatb(),
			'jml_siswatpma'		=> $this->m_data_kelas_guru->jml_siswatpma(),
			'jml_siswatpmb'		=> $this->m_data_kelas_guru->jml_siswatpmb(),

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
