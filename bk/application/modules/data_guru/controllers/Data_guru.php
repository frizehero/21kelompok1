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

		//konfigurasi pagination
        $config['base_url'] 		= site_url('data_guru/index'); //site url
        $config['total_rows'] 		= $this->db->count_all('data_user'); //total row
        $config['per_page'] 		= 4;  //show record per halaman
		$config["uri_segment"] 		= 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"]		= floor($choice);


		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data = array(
			'namamodule' 	=> "data_guru",
			'namafileview' 	=> "V_data_guru",
			'row'			=> $this->m_data_guru->tampil($config["per_page"], $data['page']),
			'pagination' 	=> $this->pagination->create_links(),

		);
		echo Modules::run('template/tampilCore', $data);
	}

 		// $data = array(
 		// 	'namamodule' 	=> "data_guru",
 		// 	'namafileview' 	=> "V_data_guru",
 		// 	'tampil'		=> $this->m_data_guru->tampil(),
 		// );
 	

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
 