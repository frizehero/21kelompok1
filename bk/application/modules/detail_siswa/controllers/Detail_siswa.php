<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_siswa extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		$this->load->model('m_detail_siswa');
		$this->load->model('login/m_session');
	}

	
	// index
	function index($id)
	{
		$data = array(
			'namamodule' 	=> "detail_siswa",
			'namafileview' 	=> "V_detail_siswa",
			'tampil'		=> $this->m_detail_siswa->tampil($id),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function edit($id)
 	{
 		$this->m_detail_siswa->edit($id);
 		redirect('detail_siswa');
 	}

 	function hapus($id)
 	{
 		$this->m_detail_siswa->hapus($id);
 		redirect('data_siswa');
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
