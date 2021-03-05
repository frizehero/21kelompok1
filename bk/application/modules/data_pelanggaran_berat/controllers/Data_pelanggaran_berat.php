<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_pelanggaran_berat extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_pelanggaran_berat');
		 $this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran_berat",
			'namafileview' 	=> "V_data_pelanggaran_berat",
			'tampil'		=> $this->m_data_pelanggaran_berat->tampil(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tambah()
	{
		$this->m_data_pelanggaran_berat->tambah();
		redirect('data_pelanggaran_berat');
	}

	function edit()
	{
		$this->m_data_pelanggaran_berat->edit();
		redirect('data_pelanggaran_berat');
	}

	function hapus($id)
	{
		$this->m_data_pelanggaran_berat->hapus($id);
		redirect('data_pelanggaran_berat');
	}

	function cari()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran_berat",
			'namafileview' 	=> "V_data_pelanggaran_berat",
			'tampil'		=> $this->m_data_pelanggaran_berat->cari(),
		);
		echo Modules::run('template/tampilCore', $data);
	}
	
}
 