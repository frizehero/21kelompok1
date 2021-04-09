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
			'jml_siswax'	=> $this->m_data_kelas->get_siswax(),
			'jml_siswaxi'	=> $this->m_data_kelas->get_siswaxi(),
			'jml_siswaxii'	=> $this->m_data_kelas->get_siswaxii(),

		);
		echo Modules::run('template/tampilCore', $data);
	}


	function cariku()
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