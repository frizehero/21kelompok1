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
		$this->load->library('excel');
		$this->load->helper('file');
		$this->load->helper(array('url','download'));
	}



public function importFile(){

		if(isset($_FILES["file"]["name"])){
                  // upload
			$file_tmp = $_FILES['file']['tmp_name'];
			$file_name = $_FILES['file']['name'];
			$file_size =$_FILES['file']['size'];
			$file_type=$_FILES['file']['type'];

			$object = PHPExcel_IOFactory::load($file_tmp);

			foreach($object->getWorksheetIterator() as $worksheet){

				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for($row=4; $row<=$highestRow; $row++){

					$nis 					= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$nama_siswa 			= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$tanggal_lahir			= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$alamat_siswa 			= $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$jenis_kelamin_siswa 	= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$kelas 					= $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$agama 					= $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$jurusan 				= $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$status 				= $worksheet->getCellByColumnAndRow(14, $row)->getValue();

					$tanggal_lahir_siswa 	= \PHPExcel_Style_NumberFormat::toFormattedString($tanggal_lahir, 'YYYY-MM-DD');
					
					if ($jurusan == NULL) {

					} else {

						$data = array(
							'nis'					=> $nis,
							'nama_siswa'			=> $nama_siswa,
							'tanggal_lahir_siswa'	=> $tanggal_lahir_siswa,
							'alamat_siswa'			=> $alamat_siswa,
							'jenis_kelamin_siswa'	=> $jenis_kelamin_siswa,
							'id_kelas'				=> $kelas,
							'id_jurusan'			=> $jurusan,
							'id_agama'				=> $agama,
							'status_siswa'			=> $status,
							'foto_siswa' 			=> "kosong1.png",
						);

						$this->db->insert('data_siswa', $data);
					}
					
					

					$insert_id = $this->db->insert_id();
					$username		= $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$password 		= $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$password1 		= sha1($password);


					if ($username == NULL) {
						
					} else {

						$data = array(
							'id_siswa'				=> $insert_id,
							'username'				=> $username,
							'password'				=> $password1,
							'level'					=> "3",

						);


						$this->db->insert('data_user', $data);
						$insert_id = $this->db->insert_id();
					}

				} 

			}
			$message = array(
				'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
			);

			$this->session->set_flashdata($message);
			redirect('data_siswa');
		}
		else
		{
			$message = array(
				'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
			);

			$this->session->set_flashdata($message);
			redirect('data_siswa');
		}
	}





	public function importkenaikan(){

		if(isset($_FILES["file"]["name"])){
                  // upload
			$file_tmp = $_FILES['file']['tmp_name'];
			$file_name = $_FILES['file']['name'];
			$file_size =$_FILES['file']['size'];
			$file_type=$_FILES['file']['type'];

			$object = PHPExcel_IOFactory::load($file_tmp);

			foreach($object->getWorksheetIterator() as $worksheet){

				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for($row=4; $row<=$highestRow; $row++){

					$nis 					= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$kelas 					= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$status 				= $worksheet->getCellByColumnAndRow(7, $row)->getValue();

					if ($nis == NULL) {

					} else {

						$data = array(
							'id_kelas'				=> $kelas,
							'status_siswa'			=> $status,
						);

						$this->db->where('nis',$nis)->update('data_siswa', $data);
					}

				} 

			}
			$message = array(
				'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
			);

			$this->session->set_flashdata($message);
			redirect('data_siswa');
		}
		else
		{
			$message = array(
				'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
			);

			$this->session->set_flashdata($message);
			redirect('data_siswa');
		}
	}


	function downloadtambah()
	{

		force_download('template/Template_tambah_siswa.xlsx',NULL);
		redirect('data_siswa');
		
	}

	function downloadkenaikan()
	{
		force_download('template/Template_kenaikan_kelas.xlsx',NULL);
		redirect('data_siswa');
	}

	
	// index
	function index()
	{
		//konfigurasi pagination
        $config['base_url'] 		= site_url('data_siswa/index'); //site url
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
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_data_siswa",
			'row'			=> $this->m_data_siswa->tampil($config["per_page"], $data['page']),
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
		$config['base_url'] = site_url("data_siswa/cariku/$search");
		$config['total_rows'] = $this->m_data_siswa->get_siswa_count($search);
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
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_data_siswa",
			'row'			=> $this->m_data_siswa->get_siswa($config["per_page"], $data['page'],$search),
			'pagination' 	=> $this->pagination->create_links(),
			'cari'			=> $nyari,
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

		$jumlah_pelanggaranku			= $this->m_data_siswa->count_jpelanggaran($id);
		$jumlah_pelanggaran_kerapian	= $this->m_data_siswa->count_jpelanggaran_kerapian($id);
		$jumlah_pelanggaran_berat		= $this->m_data_siswa->count_jpelanggaran_berat($id);

		$total = $jumlah_pelanggaranku + $jumlah_pelanggaran_kerapian + $jumlah_pelanggaran_berat;

		$jpelanggaran1					= $this->m_data_siswa->jumlahpelanggaran1($id);
		$jpelanggaran2					= $this->m_data_siswa->jumlahpelanggaran2($id);
		$jpelanggaran3					= $this->m_data_siswa->jumlahpelanggaran3($id);
		$jumlahpointprestasi			= $this->m_data_siswa->jumlahpointprestasi($id);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointprestasi['point'] ;


		$data = array(
			'namamodule' 					=> "data_siswa",
			'namafileview' 					=> "V_detail_siswa",
			'tampil'						=> $this->m_data_siswa->tampildetail($id),
			'terbaru'						=> $this->m_data_siswa->pterbaru($id),
			'tampil_treatment'				=> $this->m_data_siswa->tampilriwayat_treatment($id),
			'tampil_prestasi'				=> $this->m_data_siswa->tampilriwayat_prestasi($id),
			'jumlah_treatment'				=> $this->m_data_siswa->count_jtreatment($id),
			'tampil_pelanggaran'			=> $this->m_data_siswa->tampilriwayat_pelanggaran($id),
			'tampil_pelanggaran_kerapian' 	=> $this->m_data_siswa->tampilriwayat_pelanggaran_kerapian($id),
			'tampil_pelanggaran_berat'		=> $this->m_data_siswa->tampilriwayat_pelanggaran_berat($id),
			'tampil_pelanggaran_samping'	=> $this->m_data_siswa->tampilriwayat_pelanggaran_samping($id),
			'tampil_pelanggaran_kerapian_samping' 	=> $this->m_data_siswa->tampilriwayat_pelanggaran_kerapian_samping($id),
			'tampil_pelanggaran_berat_samping'		=> $this->m_data_siswa->tampilriwayat_pelanggaran_berat_samping($id),
			'jumlah_pelanggaran'			=> $total,
			'total_pelanggaran'				=> $total_pelanggaran,
			'total_prestasi'				=> $total_treatment,
			'total_point'					=> $total_pelanggaran - $total_treatment,

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

		$jpelanggaran1					= $this->m_data_siswa->jumlahpelanggaran1($id);
		$jpelanggaran2					= $this->m_data_siswa->jumlahpelanggaran2($id);
		$jpelanggaran3					= $this->m_data_siswa->jumlahpelanggaran3($id);
		$jumlahpointprestasi			= $this->m_data_siswa->jumlahpointprestasi($id);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointprestasi['point'] ;

		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_tambah_treatment",
			'tampil'		=> $this->m_data_siswa->tampiltreatment($id),
			'id'			=> $id,
			'total_point'	=> $total_pelanggaran - $total_treatment,
		);
		echo Modules::run('template/tampilCore', $data);
	}
	 


	 
	function caritreatment($id)
	{
		$carit 	= $this->input->post('caritreatment');

		$jpelanggaran1					= $this->m_data_siswa->jumlahpelanggaran1($id);
		$jpelanggaran2					= $this->m_data_siswa->jumlahpelanggaran2($id);
		$jpelanggaran3					= $this->m_data_siswa->jumlahpelanggaran3($id);
		$jumlahpointprestasi			= $this->m_data_siswa->jumlahpointprestasi($id);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointprestasi['point'] ;

		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_cari_treatment",
			'tampil'		=> $this->m_data_siswa->caritreatment($carit,$id),
			'tampilt'		=> $this->m_data_siswa->tampiltreatment($id),
			'id'			=> $id,
			'total_point'	=> $total_pelanggaran - $total_treatment,
		);
		echo Modules::run('template/tampilCore', $data);
	}



	function tambah_treatment($id)
	{
		$this->m_data_siswa->tambah_treatment($id);
		redirect('data_siswa/details/'.$id);
	}
	/*akhir controler tambah treatment*/








	/*controler tambah pelanggaran*/
	function tampilpelanggaran($id)
	{

		$jpelanggaran1			= $this->m_data_siswa->jumlahpelanggaran1($id);
		$jpelanggaran2			= $this->m_data_siswa->jumlahpelanggaran2($id);
		$jpelanggaran3			= $this->m_data_siswa->jumlahpelanggaran3($id);
		$jumlahpointprestasi			= $this->m_data_siswa->jumlahpointprestasi($id);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointprestasi['point'] ;

		$data = array(
			'namamodule' 			=> "data_siswa",
			'namafileview' 			=> "V_tambah_pelanggaran",
			'tampil'				=> $this->m_data_siswa->tampilpelanggaran($id),
			'tampil1'				=> $this->m_data_siswa->tampil1($id),
			'tampil2'				=> $this->m_data_siswa->tampil2($id),
			'id'					=> $id,
			'total_point'			=> $total_pelanggaran - $total_treatment,
		);
		echo Modules::run('template/tampilCore', $data);
	}
	function caripelanggaran($id)
	{
		$jpelanggaran1					= $this->m_data_siswa->jumlahpelanggaran1($id);
		$jpelanggaran2					= $this->m_data_siswa->jumlahpelanggaran2($id);
		$jpelanggaran3					= $this->m_data_siswa->jumlahpelanggaran3($id);
		$jumlahpointtreatment			= $this->m_data_siswa->jumlahpointtreatment($id);
		$jumlahpointprestasi			= $this->m_data_siswa->jumlahpointprestasi($id);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointtreatment['point'] + $jumlahpointprestasi['point'] ;

		$carip			= $this->input->post('caripelanggaran');
		$carip1			= $this->input->post('caripelanggaran');
		$carip2			= $this->input->post('caripelanggaran');

		$data = array(
			'namamodule' 					=> "data_siswa",
			'namafileview' 					=> "caripelanggaran",
			'tampil'						=> $this->m_data_siswa->caripelanggaran($carip,$id),
			'tampilp'						=> $this->m_data_siswa->tampilpelanggaran($id),
			'tampil1'						=> $this->m_data_siswa->caripelanggaran1($carip1,$id),
			'tampil2'						=> $this->m_data_siswa->caripelanggaran2($carip2,$id),
			'id'							=> $id,
			'total_point'					=> $total_pelanggaran - $total_treatment,
			'carip'							=> $carip,
			
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tambah_pelanggaran($id)
	{
		$this->m_data_siswa->tambah_pelanggaran($id);
		redirect('data_siswa/details/'.$id);
	}

	function tambah_pelanggaran_kerapian($id)
	{
		$this->m_data_siswa->tambah_pelanggaran_kerapian($id);
		redirect('data_siswa/details/'.$id);
	}

	function tambah_pelanggaran_berat($id)
	{
		$this->m_data_siswa->tambah_pelanggaran_berat($id);
		redirect('data_siswa/details/'.$id);
	}


	// data prestasi siswa
	function prestasi($id)
	{
		$jpelanggaran1					= $this->m_data_siswa->jumlahpelanggaran1($id);
		$jpelanggaran2					= $this->m_data_siswa->jumlahpelanggaran2($id);
		$jpelanggaran3					= $this->m_data_siswa->jumlahpelanggaran3($id);
		$jumlahpointprestasi			= $this->m_data_siswa->jumlahpointprestasi($id);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointprestasi['point'] ;

		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_tambah_prestasi",
			'tampil'		=> $this->m_data_siswa->tampilprestasi($id),
			'id'			=> $id,
			'total_point'	=> $total_pelanggaran - $total_treatment,
		);
		echo Modules::run('template/tampilCore', $data);
	}

	function tambah_prestasi($id)
	{
		$this->m_data_siswa->tambah_prestasi($id);
		redirect('data_siswa/details/'.$id);
	}


	function cariprestasi($id)
	{
		$carit 	= $this->input->post('cariprestasi');

		$jpelanggaran1					= $this->m_data_siswa->jumlahpelanggaran1($id);
		$jpelanggaran2					= $this->m_data_siswa->jumlahpelanggaran2($id);
		$jpelanggaran3					= $this->m_data_siswa->jumlahpelanggaran3($id);
		$jumlahpointprestasi			= $this->m_data_siswa->jumlahpointprestasi($id);
		$total_pelanggaran				= $jpelanggaran1['point'] + $jpelanggaran2['point'] + $jpelanggaran3['point'];
		$total_treatment				= $jumlahpointprestasi['point'] ;

		$data = array(
			'namamodule' 	=> "data_siswa",
			'namafileview' 	=> "V_cari_prestasi",
			'tampil'		=> $this->m_data_siswa->cariprestasi($carit,$id),
			'tampilp'		=> $this->m_data_siswa->tampilprestasi($id),
			'id'			=> $id,
			'total_point'	=> $total_pelanggaran - $total_treatment,
		);
		echo Modules::run('template/tampilCore', $data);
	}
}
