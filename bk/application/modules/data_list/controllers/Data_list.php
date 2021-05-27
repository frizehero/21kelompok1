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
		$data = array(
			'namamodule' 			=> "data_list",
			'namafileview' 			=> "V_data_list",
			'tampil'				=> $this->m_data_list->tampil(),
		);
		echo Modules::run('template/tampilCore', $data);
	}
}