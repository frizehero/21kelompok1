<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_pelanggaran_kerapian extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_pelanggaran_kerapian');
		 $this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran_kerapian",
			'namafileview' 	=> "V_data_pelanggaran_kerapian",
			'tampil'		=> $this->m_data_pelanggaran_kerapian->tampil(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tambah()
	{
		$this->m_data_pelanggaran_kerapian->tambah();
		redirect('data_pelanggaran_kerapian');
	}

	function edit()
	{
		$this->m_data_pelanggaran_kerapian->edit();
		redirect('data_pelanggaran_kerapian');
	}

	function hapus($id)
	{
		$this->m_data_pelanggaran_kerapian->hapus($id);
		redirect('data_pelanggaran_kerapian');
	}

	function cari()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran_kerapian",
			'namafileview' 	=> "V_data_pelanggaran_kerapian",
			'tampil'		=> $this->m_data_pelanggaran_kerapian->cari(),
		);
		echo Modules::run('template/tampilCore', $data);
	}
	
}
 