<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_laporan extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_laporan');
		 $this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$data = array(
			'namamodule' 	=> "data_laporan",
			'namafileview' 	=> "V_data_laporan",
			'tampil'		=> $this->m_data_laporan->tampil(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tambah()
	{
		$this->m_data_laporan->tambah();
		redirect('data_laporan');
	}

	function edit()
	{
		$this->m_data_laporan->edit();
		redirect('data_laporan');
	}

	function hapus($id)
	{
		$this->m_data_laporan->hapus($id);
		redirect('data_laporan');
	}

	function cari()
	{
		$data = array(
			'namamodule' 	=> "data_laporan",
			'namafileview' 	=> "V_data_laporan",
			'tampil'		=> $this->m_data_laporan->cari(),
		);
		echo Modules::run('template/tampilCore', $data);
	}
	
}
 