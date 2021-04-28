<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_beranda extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_beranda');
		 $this->load->model('login/m_session');
		 $this->load->library('pagination');
		 $this->load->library('session');
	}

	
	// index
	function index()
	{
		$data = array(
			'namamodule' 			=> "data_beranda",
			'namafileview' 			=> "V_data_beranda",
			'tampil'				=> $this->m_data_beranda->tampil(),
			'jum_jur'				=> $this->m_data_beranda->jum_jur(),
			'jum_gur'				=> $this->m_data_beranda->jum_gur(),
			'jum_sis'				=> $this->m_data_beranda->jum_sis(),
			'pelanggar_hariini'		=> $this->m_data_beranda->pelanggar_hariini(),
			'treatmentsiswa'		=> $this->m_data_beranda->treatmentsiswa(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tampil_treatmentsiswa()
	{

		// pagination settings
		$config['base_url'] = site_url("data_beranda/tampil_pelanggaran_siswa/");
		$config['total_rows'] = $this->m_data_beranda->count_treatmentsiswa();
		$config['per_page'] = "12";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"]/$config["per_page"];
		$config["num_links"] = floor($choice);


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
			'namamodule' 	=> "data_beranda",
			'namafileview' 	=> "V_treatmentsiswa",
			'tampil'		=> $this->m_data_beranda->tampil_treatmentsiswa($config["per_page"], $data['page']),
			'pagination' 	=> $this->pagination->create_links(),
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tampil_pelanggaran_siswa_hari_ini()
	{

        // pagination settings
		$config['base_url'] = site_url("data_beranda/tampil_pelanggaran_siswa_hari_ini/");
		$config['total_rows'] = $this->m_data_beranda->count_pelanggarhariini();
		$config['per_page'] = "12";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"]/$config["per_page"];
		$config["num_links"] = floor($choice);


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
			'namamodule' 			=> "data_beranda",
			'namafileview' 			=> "V_pelanggaran_siswa_hari_ini",
			'pelanggar_hariini'		=> $this->m_data_beranda->tampilpelanggar_hariini($config["per_page"], $data['page']),
			'pagination' 			=> $this->pagination->create_links(),
		);
		echo Modules::run('template/tampilCore', $data);
	}



	function cariku()
	{

		$nyari = $this->input->post("cari");


		$data = array(
			'namamodule' 			=> "data_beranda",
			'namafileview' 			=> "V_caripsiswa_hariini",
			'pelanggar_hariini'		=> $this->m_data_beranda->carisiswa($nyari),
			'cari'					=> $nyari,
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function carisiswa()
	{

		$nyari = $this->input->post("cari");

        // get search string
		$search = ($this->input->post("cari"))? $this->input->post("cari") : "NIL";
		$search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
		$config = array();
		$config['base_url'] = site_url("data_beranda/carisiswa/$search");
		$config['total_rows'] = $this->m_data_beranda->get_cari_count($search);
		$config['per_page'] = "12";
		$config["uri_segment"] = 4;
		$choice = $config["total_rows"]/$config["per_page"];
		$config["num_links"] = floor($choice);


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

		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data = array(
			'namamodule' 			=> "data_beranda",
			'namafileview' 			=> "V_treatmentsiswa",
			'tampil'				=> $this->m_data_beranda->cari_treatmentsiswa($config["per_page"], $data['page'],$search),
			'pagination' 			=> $this->pagination->create_links(),
			'cari'					=> $nyari,
		);
		echo Modules::run('template/tampilCore', $data);
	}

	
}