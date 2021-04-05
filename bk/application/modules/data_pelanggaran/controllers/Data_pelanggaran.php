<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pelanggaran extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		// model
		 $this->load->model('m_data_pelanggaran');
		 $this->load->model('login/m_session');
		 $this->load->library('pagination');
		 $this->load->library('session');
	}

	
	// index
	function index()
	{
		//konfigurasi pagination
        $config['base_url'] 		= site_url('data_pelanggaran/index'); //site url
        $config['total_rows'] 		= $this->db->count_all('data_pelanggaran'); //total row
        $config['per_page'] 		= 2;  //show record per halaman
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
			'namamodule' 	=> "data_pelanggaran",
			'namafileview' 	=> "V_data_pelanggaran",
			'row'			=> $this->m_data_pelanggaran->tampil($config["per_page"], $data['page']),
			'pagination' 	=> $this->pagination->create_links(),

		);
		echo Modules::run('template/tampilCore', $data);
	}

	function cariku()
    {

        $nyari = $this->input->post("cari");

        // get search string
        $search = ($this->input->post("cari"))? $this->input->post("cari") : "NIL";
        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
        $config = array();
        $config['base_url'] = site_url("data_pelanggaran/cariku/$search");
        $config['total_rows'] = $this->m_data_pelanggaran->get_pelanggaran_count($search);
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
            'namamodule'    => "data_pelanggaran",
            'namafileview'  => "V_data_pelanggaran",
            'row'           => $this->m_data_pelanggaran->get_pelanggaran($config["per_page"], $data['page'],$search),
            'pagination'    => $this->pagination->create_links(),
            'cari'          => $nyari,
        );
        echo Modules::run('template/tampilCore', $data);
    }

	function tampil1()
	{
		//konfigurasi pagination
        $config['base_url'] 		= site_url('data_pelanggaran_kerapian/tampil1'); //site url
        $config['total_rows'] 		= $this->db->count_all('data_pelanggaran_kerapian'); //total row
        $config['per_page'] 		= 2;  //show record per halaman
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
			'namamodule' 	=> "data_pelanggaran",
			'namafileview' 	=> "V_data_pelanggaran_kerapian",
			'row'			=> $this->m_data_pelanggaran->tampil1($config["per_page"], $data['page']),
			'pagination' 	=> $this->pagination->create_links(),

		);
		echo Modules::run('template/tampilCore', $data);
	}

	function cariku1()
    {

        $nyari = $this->input->post("cari1");

        // get search string
        $search = ($this->input->post("cari1"))? $this->input->post("cari1") : "NIL";
        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
        $config = array();
        $config['base_url'] = site_url("data_pelanggaran_kerapian/cariku1/$search");
        $config['total_rows'] = $this->m_data_pelanggaran->get_pelanggaran_kerapian($search);
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
            'namamodule'    => "data_pelanggaran",
            'namafileview'  => "V_data_pelanggaran_kerapian",
            'row'           => $this->m_data_pelanggaran->get_pelanggaran_kerapian_count($config["per_page"], $data['page'],$search),
            'pagination'    => $this->pagination->create_links(),
            'cari1'          => $nyari,
        );
        echo Modules::run('template/tampilCore', $data);
    }



	function tampil2()
	{
		//konfigurasi pagination
        $config['base_url'] 		= site_url('data_pelanggaran_berat/tampil2'); //site url
        $config['total_rows'] 		= $this->db->count_all('data_pelanggaran_berat'); //total row
        $config['per_page'] 		= 2;  //show record per halaman
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
			'namamodule' 	=> "data_pelanggaran",
			'namafileview' 	=> "V_data_pelanggaran_berat",
			'row2'			=> $this->m_data_pelanggaran->tampil2($config["per_page"], $data['page']),
			'pagination' 	=> $this->pagination->create_links(),

		);
		echo Modules::run('template/tampilCore', $data);
	}

	function cariku2()
    {

        $nyari = $this->input->post("cari2");

        // get search string
        $search = ($this->input->post("cari2"))? $this->input->post("cari2") : "NIL";
        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
        $config = array();
        $config['base_url'] = site_url("data_pelanggaran_berat/cariku2/$search");
        $config['total_rows'] = $this->m_data_pelanggaran->get_pelanggaran_berat_count($search);
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
            'namamodule'    => "data_pelanggaran",
            'namafileview'  => "V_data_pelanggaran_berat",
            'row2'           => $this->m_data_pelanggaran->get_pelanggaran_berat($config["per_page"], $data['page'],$search),
            'pagination'    => $this->pagination->create_links(),
            'cari2'          => $nyari,
        );
        echo Modules::run('template/tampilCore', $data);
    }



	function tambah()
	{
		$this->m_data_pelanggaran->tambah();
		redirect('data_pelanggaran');
	}
	function tambah1()
	{
		$this->m_data_pelanggaran->tambah1();
		redirect('data_pelanggaran/tampil1');
	}
	function tambah2()
	{
		$this->m_data_pelanggaran->tambah2();
		redirect('data_pelanggaran/tampil2');
	}

	function edit()
	{
		$this->m_data_pelanggaran->edit();
		redirect('data_pelanggaran');
	}
	function edit1()
	{
		$this->m_data_pelanggaran->edit1();
		redirect('data_pelanggaran/tampil1');
	}
	function edit2()
	{
		$this->m_data_pelanggaran->edit2();
		redirect('data_pelanggaran/tampil2');
	}

	function hapus($id)
	{
		$this->m_data_pelanggaran->hapus($id);
		redirect('data_pelanggaran');
	}
	function hapus1($id)
	{
		$this->m_data_pelanggaran->hapus1($id);
		redirect('data_pelanggaran/tampil1');
	}
	function hapus2($id)
	{
		$this->m_data_pelanggaran->hapus2($id);
		redirect('data_pelanggaran/tampil2');
	}

	function cari()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran",
			'namafileview' 	=> "V_data_pelanggaran",
			'tampil'		=> $this->m_data_pelanggaran->cari(),
		);
		echo Modules::run('template/tampilCore', $data);
	}
	function cari1()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran",
			'namafileview' 	=> "V_data_pelanggaran_kerapian",
			'tampil1'		=> $this->m_data_pelanggaran->cari1(),
		);
		echo Modules::run('template/tampilCore', $data);
	}
	function cari2()
	{
		$data = array(
			'namamodule' 	=> "data_pelanggaran",
			'namafileview' 	=> "V_data_pelanggaran_berat",
			'tampil2'		=> $this->m_data_pelanggaran->cari2(),
		);
		echo Modules::run('template/tampilCore', $data);
	}


	
}
 