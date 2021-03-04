 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Data_guru extends MX_Controller {

 	function __construct()
 	{
 		parent::__construct();
		// model
 		$this->load->model('m_data_guru');
 		$this->load->model('login/m_session');
 	}

 	
	// index
 	function index()
 	{
 		$data = array(
 			'namamodule' 	=> "data_guru",
 			'namafileview' 	=> "V_data_guru",
 			'tampil'		=> $this->m_data_guru->tampil(),
 		);
 		echo Modules::run('template/tampilCore', $data);
 	}

 	function tambah()
 	{
 		$this->m_data_guru->tambah();
 		redirect('data_guru');
 	}

 	function edit()
 	{
 		$this->m_data_guru->edit();
 		redirect('data_guru');
 	}

 	function hapus($id)
 	{
 		$this->m_data_guru->hapus($id);
 		redirect('data_guru');
 	}

 	function cari()
 	{
 		$data = array(
 			'namamodule' 	=> "data_guru",
 			'namafileview' 	=> "V_data_guru",
 			'tampil'		=> $this->m_data_guru->cari(),
 		);
 		echo Modules::run('template/tampilCore', $data);
 	}
 	
 }
 