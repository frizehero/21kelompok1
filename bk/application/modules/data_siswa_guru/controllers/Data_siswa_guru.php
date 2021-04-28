<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa_guru extends MX_Controller {


	function __construct()
	{
		parent::__construct();
		// model
		$this->load->model('m_data_siswa_guru');
		$this->load->model('login/m_session');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->helper('file');
	}


	
	// index
	function index()
	{
		//konfigurasi pagination
        $config['base_url'] 		= site_url('data_siswa_guru/index'); //site url
        $config['total_rows'] 		= $this->db->count_all('data_siswa'); //total row
        $config['per_page'] 		= 12;  //show record per halaman
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
			'namamodule' 	=> "data_siswa_guru",
			'namafileview' 	=> "V_data_siswa_guru",
			'row'			=> $this->m_data_siswa_guru->tampil($config["per_page"], $data['page']),
			'pagination' 	=> $this->pagination->create_links(),

		);
		echo Modules::run('template_guru/tampilCore', $data);
	}


	function cariku()
	{

		$nyari = $this->input->post("cari");

        // get search string
		$search = ($this->input->post("cari"))? $this->input->post("cari") : "NIL";
		$search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
		$config = array();
		$config['base_url'] = site_url("data_siswa_guru/cariku/$search");
		$config['total_rows'] = $this->m_data_siswa_guru->get_siswa_count($search);
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
			'namamodule' 	=> "data_siswa_guru",
			'namafileview' 	=> "V_data_siswa_guru",
			'row'			=> $this->m_data_siswa_guru->get_siswa($config["per_page"], $data['page'],$search),
			'pagination' 	=> $this->pagination->create_links(),
			'cari'			=> $nyari,
		);
		echo Modules::run('template_guru/tampilCore', $data);
	}












	/*controler detail siswa*/

	function details($id)
	{

		$jumlah_pelanggaranku			= $this->m_data_siswa_guru->count_jpelanggaran($id);
		$jumlah_pelanggaran_kerapian	= $this->m_data_siswa_guru->count_jpelanggaran_kerapian($id);
		$jumlah_pelanggaran_berat		= $this->m_data_siswa_guru->count_jpelanggaran_berat($id);

		$total = $jumlah_pelanggaranku + $jumlah_pelanggaran_kerapian + $jumlah_pelanggaran_berat;

		$jpelanggaran1					= $this->m_data_siswa_guru->jumlahpelanggaran1($id);
		$jpelanggaran2					= $this->m_data_siswa_guru->jumlahpelanggaran2($id);
		$jpelanggaran3					= $this->m_data_siswa_guru->jumlahpelanggaran3($id);
		$jumlahpointtreatment			= $this->m_data_siswa_guru->jumlahpointtreatment($id);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointtreatment['point'];


		$data = array(
			'namamodule' 					=> "data_siswa_guru",
			'namafileview' 					=> "V_detail_siswa_guru",
			'tampil'						=> $this->m_data_siswa_guru->tampildetail($id),
			'terbaru'						=> $this->m_data_siswa_guru->pterbaru($id),
			'tampil_treatment'				=> $this->m_data_siswa_guru->tampilriwayat_treatment($id),
			'jumlah_treatment'				=> $this->m_data_siswa_guru->count_jtreatment($id),
			'tampil_pelanggaran'			=> $this->m_data_siswa_guru->tampilriwayat_pelanggaran($id),
			'tampil_pelanggaran_kerapian' 	=> $this->m_data_siswa_guru->tampilriwayat_pelanggaran_kerapian($id),
			'tampil_pelanggaran_berat'		=> $this->m_data_siswa_guru->tampilriwayat_pelanggaran_berat($id),
			'tampil_pelanggaran_samping'			=> $this->m_data_siswa_guru->tampilriwayat_pelanggaran_samping($id),
			'tampil_pelanggaran_kerapian_samping' 	=> $this->m_data_siswa_guru->tampilriwayat_pelanggaran_kerapian_samping($id),
			'tampil_pelanggaran_berat_samping'		=> $this->m_data_siswa_guru->tampilriwayat_pelanggaran_berat_samping($id),
			'jumlah_pelanggaran'			=> $total,
			'total_point'					=> $total_pelanggaran - $total_treatment,

		);
		echo Modules::run('template_guru/tampilCore', $data);
	}









	/*controler tambah treatment*/
	function tampiltreatment($id)
	{
		$jpelanggaran1					= $this->m_data_siswa_guru->jumlahpelanggaran1($id);
		$jpelanggaran2					= $this->m_data_siswa_guru->jumlahpelanggaran2($id);
		$jpelanggaran3					= $this->m_data_siswa_guru->jumlahpelanggaran3($id);
		$jumlahpointtreatment			= $this->m_data_siswa_guru->jumlahpointtreatment($id);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointtreatment['point'];

		$data = array(
			'namamodule' 	=> "data_siswa_guru",
			'namafileview' 	=> "V_tambah_treatment_guru",
			'tampil'		=> $this->m_data_siswa_guru->tampiltreatment($id),
			'id'			=> $id,
			'total_point'	=> $total_pelanggaran - $total_treatment,
		);
		echo Modules::run('template_guru/tampilCore', $data);
	}
	 


	 
	function caritreatment($id)
	{
		$carit 	= $this->input->post('caritreatment');

		$jpelanggaran1					= $this->m_data_siswa_guru->jumlahpelanggaran1($id);
		$jpelanggaran2					= $this->m_data_siswa_guru->jumlahpelanggaran2($id);
		$jpelanggaran3					= $this->m_data_siswa_guru->jumlahpelanggaran3($id);
		$jumlahpointtreatment			= $this->m_data_siswa_guru->jumlahpointtreatment($id);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointtreatment['point'];

		$data = array(
			'namamodule' 	=> "data_siswa_guru",
			'namafileview' 	=> "V_cari_treatment_guru",
			'tampil'		=> $this->m_data_siswa_guru->caritreatment($carit,$id),
			'total_point'	=> $total_pelanggaran - $total_treatment,
		);
		echo Modules::run('template_guru/tampilCore', $data);
	}



	function tambah_treatment($id)
	{
		$this->m_data_siswa_guru->tambah_treatment($id);
		redirect('data_siswa_guru/details/'.$id);
	}
	/*akhir controler tambah treatment*/








	/*controler tambah pelanggaran*/
	function tampilpelanggaran($id)
	{

		$jpelanggaran1			= $this->m_data_siswa_guru->jumlahpelanggaran1($id);
		$jpelanggaran2			= $this->m_data_siswa_guru->jumlahpelanggaran2($id);
		$jpelanggaran3			= $this->m_data_siswa_guru->jumlahpelanggaran3($id);
		$jumlahpointtreatment	= $this->m_data_siswa_guru->jumlahpointtreatment($id);
		$total_pelanggaran		= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment		= $jumlahpointtreatment['point'];

		$data = array(
			'namamodule' 			=> "data_siswa_guru",
			'namafileview' 			=> "V_tambah_pelanggaran_guru",
			'tampil'				=> $this->m_data_siswa_guru->tampilpelanggaran($id),
			'tampil1'				=> $this->m_data_siswa_guru->tampil1($id),
			'tampil2'				=> $this->m_data_siswa_guru->tampil2($id),
			'id'					=> $id,
			'total_point'			=> $total_pelanggaran - $total_treatment,
		);
		echo Modules::run('template_guru/tampilCore', $data);
	}
	function caripelanggaran($id)
	{
		$jpelanggaran1					= $this->m_data_siswa_guru->jumlahpelanggaran1($id);
		$jpelanggaran2					= $this->m_data_siswa_guru->jumlahpelanggaran2($id);
		$jpelanggaran3					= $this->m_data_siswa_guru->jumlahpelanggaran3($id);
		$jumlahpointtreatment			= $this->m_data_siswa_guru->jumlahpointtreatment($id);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointtreatment['point'];

		$carip			= $this->input->post('caripelanggaran');
		$carip1			= $this->input->post('caripelanggaran1');
		$carip2			= $this->input->post('caripelanggaran2');
		$data = array(
			'namamodule' 					=> "data_siswa_guru",
			'namafileview' 					=> "caripelanggaran_guru",
			'tampil'						=> $this->m_data_siswa_guru->caripelanggaran($carip,$id),
			'tampil1'						=> $this->m_data_siswa_guru->caripelanggaran1($carip1,$id),
			'tampil2'						=> $this->m_data_siswa_guru->caripelanggaran2($carip2,$id),
			'total_point'					=> $total_pelanggaran - $total_treatment,
			
		);
		echo Modules::run('template_guru/tampilCore', $data);
	}

	function tambah_pelanggaran($id)
	{
		$this->m_data_siswa_guru->tambah_pelanggaran($id);
		redirect('data_siswa_guru/details/'.$id);
	}

	function tambah_pelanggaran_kerapian($id)
	{
		$this->m_data_siswa_guru->tambah_pelanggaran_kerapian($id);
		redirect('data_siswa_guru/details/'.$id);
	}

	function tambah_pelanggaran_berat($id)
	{
		$this->m_data_siswa_guru->tambah_pelanggaran_berat($id);
		redirect('data_siswa_guru/details/'.$id);
	}
}
