<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_list_guru extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_list_guru');
		 $this->load->model('login/m_session');
	}

	
	function index()
	{
		$awal						= $this->input->post('awal');
		$akhir						= $this->input->post('akhir');
		$awl						= $this->input->post('awl');
		$akr						= $this->input->post('akr');

		$data = array(
			'namamodule' 			=> "data_list_guru",
			'namafileview' 			=> "V_data_list_guru",
			'tampil'				=> $this->m_data_list_guru->tampil($awal, $akhir),
			'tampil_treatment'		=> $this->m_data_list_guru->tampil_treatment($awl, $akr),
			'awal'					=> $awal,
			'akhir'					=> $akhir,
			'awl'					=> $awl,
			'akr'					=> $akr,
		);
		echo Modules::run('template_guru/tampilCore', $data);
	}
}