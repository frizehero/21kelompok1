<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_treatment extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_treatment');
		 $this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$data = array(
			'namamodule' 	=> "data_treatment",
			'namafileview' 	=> "V_data_treatment",
			'tampil'		=> $this->m_data_treatment->tampil(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tambah()
	{
		$this->m_data_treatment->tambah();
		redirect('data_treatment');
	}

	function edit()
	{
		$this->m_data_treatment->edit();
		redirect('data_treatment');
	}

	function hapus($id)
	{
		$this->m_data_treatment->hapus($id);
		redirect('data_treatment');
	}

	function cari()
	{
		$data = array(
			'namamodule' 	=> "data_treatment",
			'namafileview' 	=> "V_data_treatment",
			'tampil'		=> $this->m_data_treatment->cari(),
		);
		echo Modules::run('template/tampilCore', $data);
	}
	
}
 