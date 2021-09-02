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
			'namamodule' 		=> "data_kelas",
			'namafileview' 		=> "V_data_kelas",
			'filter_jur'		=> $this->m_data_kelas->filter_jur(),
			'filter_kel'		=> $this->m_data_kelas->filter_kel(),
			'row'				=> $this->m_data_kelas->tampil(),
			'jml_siswarpl'		=> $this->m_data_kelas->jml_siswarpl(),
			'jml_siswatkja'		=> $this->m_data_kelas->jml_siswatkja(),
			'jml_siswatkjb'		=> $this->m_data_kelas->jml_siswatkjb(),
			'jml_siswatitl'		=> $this->m_data_kelas->jml_siswatitl(),
			'jml_siswatipka'	=> $this->m_data_kelas->jml_siswatipka(),
			'jml_siswatipkb'	=> $this->m_data_kelas->jml_siswatipkb(),
			'jml_siswatkra'		=> $this->m_data_kelas->jml_siswatkra(),
			'jml_siswatkrb'		=> $this->m_data_kelas->jml_siswatkrb(),
			'jml_siswatkrc'		=> $this->m_data_kelas->jml_siswatkrc(),
			'jml_siswatb'		=> $this->m_data_kelas->jml_siswatb(),
			'jml_siswatpma'		=> $this->m_data_kelas->jml_siswatpma(),
			'jml_siswatpmb'		=> $this->m_data_kelas->jml_siswatpmb(),
			'januari'			=> $this->m_data_kelas->januari(),
			'februari'			=> $this->m_data_kelas->februari(),
			'maret'				=> $this->m_data_kelas->maret(),
			'april'				=> $this->m_data_kelas->april(),
			'mei'				=> $this->m_data_kelas->mei(),
			'juni'				=> $this->m_data_kelas->juni(),
			'juli'				=> $this->m_data_kelas->juli(),
			'agustus'			=> $this->m_data_kelas->agustus(),
			'september'			=> $this->m_data_kelas->september(),
			'oktober'			=> $this->m_data_kelas->oktober(),
			'november'			=> $this->m_data_kelas->november(),
			'desember'			=> $this->m_data_kelas->desember(),

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
		);
		echo Modules::run('template/tampilCore', $data);
	}


	
}
