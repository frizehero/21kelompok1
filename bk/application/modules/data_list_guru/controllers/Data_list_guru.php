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

	
	// index
	function index()
	{
		$data = array(
			'namamodule' 			=> "data_list_guru",
			'namafileview' 			=> "V_data_list_guru",
			'tampil'				=> $this->m_data_list_guru->tampil(),
			'tampil_treatment'		=> $this->m_data_list_guru->tampil_treatment(),
		);
		echo Modules::run('template_guru/tampilCore', $data);
	}
}