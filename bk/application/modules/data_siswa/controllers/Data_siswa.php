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
			'filter_jur'	=> $this->m_data_siswa->filter_jur(),
			'filter_kel'	=> $this->m_data_siswa->filter_kel(),

		);
		echo Modules::run('template/tampilCore', $data);
	}



	function cari()
	{
		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_data_siswa",
			'tampil'		=> $this->m_data_siswa->cari(),
			'filter_jur'	=> $this->m_data_siswa->filter_jur(),
			'filter_kel'	=> $this->m_data_siswa->filter_kel(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function filter()
	{

		$kelas 						= $this->input->post('kelas');
		$jurusan 					= $this->input->post('jurusan');

		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_data_siswa",
			'tampil'		=> $this->m_data_siswa->filter($kelas,$jurusan),
			'filter_jur'	=> $this->m_data_siswa->filter_jur(),
			'filter_kel'	=> $this->m_data_siswa->filter_kel(),
			'kelas_fil'		=> $kelas,
			'jur_fil'		=> $jurusan,
		);
		echo Modules::run('template/tampilCore', $data);
	}



	function tambah()
	{
		$this->m_data_siswa->tambah();
		redirect('data_siswa');
	}


	/*controler detail siswa*/

	function details($id)
	{
		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_detail_siswa",
			'tampil'		=> $this->m_data_siswa->tampildetail($id),
		);
		echo Modules::run('template/tampilCore', $data);
	}


	function edit($id)
	{
		$this->m_data_siswa->edit($id);
		redirect('data_siswa/details/'. $id);
	}



	function hapus($id)
	{
		$this->m_data_siswa->hapus($id);
		redirect('data_siswa');
	}

	/*akhir controler detail siswa*/


	/*controler tambah treatment*/
	function tampiltreatment($id)
	{
		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_tambah_treatment",
			'tampil'		=> $this->m_data_siswa->tampiltreatment($id),
		);
		echo Modules::run('template/tampilCore', $data);
	}
	/*akhir controler tambah treatment*/


	/*controler tambah pelanggaran*/
	function tampilpelanggaran($id)
	{
		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_tambah_pelanggaran",
			'tampil'		=> $this->m_data_siswa->tampilpelanggaran($id),
			'tampil1'		=> $this->m_data_siswa->tampil1($id),
			'tampil2'		=> $this->m_data_siswa->tampil2($id),
		);
		echo Modules::run('template/tampilCore', $data);
	}
}
