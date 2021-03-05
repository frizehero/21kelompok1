<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		$this->load->model('m_data_siswa');
		$this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_data_siswa",
			'tampil'		=> $this->m_data_siswa->tampil(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tambah()
	{
		$this->m_data_siswa->tambah();
		redirect('data_siswa');
	}

	function cari()
	{
		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_data_siswa",
			'tampil'		=> $this->m_data_siswa->cari(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function filter(){
		$kelas=$this->input->post('kelas');
		$jurusan=$this->input->post('jurusan');

		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_data_siswa",
			'tampil'		=> $this->m_data_siswa->filter($kelas,$jurusan),
		);
		echo Modules::run('template/tampilCore', $data);

	}

}
