<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_list extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_list');
		 $this->load->model('login/m_session');
	}

	
	// index
	function index()
	{
		$awal						= $this->input->post('awal');
		$akhir						= $this->input->post('akhir');
		$awl						= $this->input->post('awl');
		$akr						= $this->input->post('akr');

		$data = array(
			'namamodule' 			=> "data_list",
			'namafileview' 			=> "V_data_list",
			'tampil'				=> $this->m_data_list->tampil($awal, $akhir),
			'tampil_treatment'		=> $this->m_data_list->tampil_treatment($awl, $akr),
		);
		echo Modules::run('template/tampilCore', $data);
	}
}