<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pelanggaran extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_pelanggaran');
		 $this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran",
			'namafileview' 	=> "V_data_pelanggaran",
			'tampil'		=> $this->m_data_pelanggaran->tampil(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tambah()
	{
		$this->m_data_pelanggaran->tambah();
		redirect('data_pelanggaran');
	}

	function edit()
	{
		$this->m_data_pelanggaran->edit();
		redirect('data_pelanggaran');
	}

	function hapus($id)
	{
		$this->m_data_pelanggaran->hapus($id);
		redirect('data_pelanggaran');
	}

	function cari()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran",
			'namafileview' 	=> "V_data_pelanggaran",
			'tampil'		=> $this->m_data_pelanggaran->cari(),
		);
		echo Modules::run('template/tampilCore', $data);
	}
	
}
 