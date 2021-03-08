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
	function tampil1()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran",
			'namafileview' 	=> "V_data_pelanggaran_kerapian",
			'tampil1'		=> $this->m_data_pelanggaran->tampil1(),
		);
		echo Modules::run('template/tampilCore', $data);
	}
	function tampil2()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran",
			'namafileview' 	=> "V_data_pelanggaran_berat",
			'tampil2'		=> $this->m_data_pelanggaran->tampil2(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tambah()
	{
		$this->m_data_pelanggaran->tambah();
		redirect('data_pelanggaran');
	}
	function tambah1()
	{
		$this->m_data_pelanggaran->tambah1();
		redirect('data_pelanggaran/tampil1');
	}
	function tambah2()
	{
		$this->m_data_pelanggaran->tambah2();
		redirect('data_pelanggaran/tampil2');
	}

	function edit()
	{
		$this->m_data_pelanggaran->edit();
		redirect('data_pelanggaran');
	}
	function edit1()
	{
		$this->m_data_pelanggaran->edit1();
		redirect('data_pelanggaran/tampil1');
	}
	function edit2()
	{
		$this->m_data_pelanggaran->edit2();
		redirect('data_pelanggaran/tampil2');
	}

	function hapus($id)
	{
		$this->m_data_pelanggaran->hapus($id);
		redirect('data_pelanggaran');
	}
	function hapus1($id)
	{
		$this->m_data_pelanggaran->hapus1($id);
		redirect('data_pelanggaran/tampil1');
	}
	function hapus2($id)
	{
		$this->m_data_pelanggaran->hapus2($id);
		redirect('data_pelanggaran/tampil2');
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
	function cari1()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran",
			'namafileview' 	=> "V_data_pelanggaran_kerapian",
			'tampil1'		=> $this->m_data_pelanggaran->cari1(),
		);
		echo Modules::run('template/tampilCore', $data);
	}
	function cari2()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran",
			'namafileview' 	=> "V_data_pelanggaran_berat",
			'tampil2'		=> $this->m_data_pelanggaran->cari2(),
		);
		echo Modules::run('template/tampilCore', $data);
	}


	
}
 