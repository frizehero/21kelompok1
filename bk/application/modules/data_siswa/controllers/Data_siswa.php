<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends MX_Controller {


	function __construct()
	{
		parent::__construct();
		// model
		$this->load->model('m_data_siswa');
		$this->load->model('login/m_session');
		$this->load->library('pagination');
		$this->load->library('session');
	}


	
	// index
	function index()
	{
		//konfigurasi pagination
        $config['base_url'] 		= site_url('data_siswa/index'); //site url
        $config['total_rows'] 		= $this->db->count_all('data_siswa'); //total row
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
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_data_siswa",
			'filter_jur'	=> $this->m_data_siswa->filter_jur(),
			'filter_kel'	=> $this->m_data_siswa->filter_kel(),
			'row'			=> $this->m_data_siswa->tampil($config["per_page"], $data['page']),
			'pagination' 	=> $this->pagination->create_links(),

		);
		echo Modules::run('template/tampilCore', $data);
	}


	function cariku()
    {
        // get search string
        $search = ($this->input->post("cari"))? $this->input->post("cari") : "NIL";

        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;
        $caris = $this->input->post("cari");

        // pagination settings
        $config = array();
        $config['base_url'] = site_url("data_siswa/cariku/$search");
        $config['total_rows'] = $this->m_data_siswa->get_siswa_count($search);
        $config['per_page'] = "2";
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
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_data_siswa",
			'filter_jur'	=> $this->m_data_siswa->filter_jur(),
			'filter_kel'	=> $this->m_data_siswa->filter_kel(),
			'row'			=> $this->m_data_siswa->get_siswa($config["per_page"], $data['page'],$search),
			'pagination' 	=> $this->pagination->create_links(),
			'cari'			=> $caris,

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
			'row'		=> $this->m_data_siswa->filter($kelas,$jurusan),
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
			'id'			=> $id,
		);
		echo Modules::run('template/tampilCore', $data);
	}
	/*akhir controler tambah treatment*/


	/*controler tambah treatment*/
	function caritreatment($id)
	{
		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_tambah_treatment",
			'tampil'		=> $this->m_data_siswa->tampiltreatment($id),
			'id'			=> $id,
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
