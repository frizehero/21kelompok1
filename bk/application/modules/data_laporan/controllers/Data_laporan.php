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

	// function laporan_siswa($id)
	// {
	// 	$data = array(
	// 		'namamodule' 	=> "data_siswa",
	// 		'namafileview' 	=> "V_detail_siswa",
	// 		'tampil'		=> $this->m_data_siswa->tampildetail($id),
	// 	);
	// 	echo Modules::run('template/tampilCore', $data);
	// }
	
}
 