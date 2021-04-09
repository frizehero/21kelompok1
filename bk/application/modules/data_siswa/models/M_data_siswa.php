<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_siswa extends CI_Model {

	function tampil($limit, $start)
	{
		$this->db->select('*')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama');
		$query = $this->db->get('data_siswa', $limit, $start);
		return $query->result();

	}

	function get_siswa($limit, $start, $st = NULL)
	{
		
		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->like('nama_siswa',$st);
		$query = $this->db->get('data_siswa',$limit, $start);
		return $query->result();
	}

	function get_siswa_count($st = NULL)
	{

		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->like('nama_siswa',$st);
		$query = $this->db->get('data_siswa');
		return $query->num_rows();
	}


	

	function tambah()
	{
		$nis 						= $this->input->post('nis');
		$nama_siswa					= $this->input->post('nama_siswa');
		$tanggal_lahir_siswa 		= $this->input->post('tanggal_lahir_siswa');
		$alamat_siswa				= $this->input->post('alamat_siswa');
		$jenis_kelamin_siswa 		= $this->input->post('jenis_kelamin_siswa');
		$kelas 						= $this->input->post('kelas');
		$jurusan 					= $this->input->post('jurusan');
		$agama 						= $this->input->post('agama');


		$this->load->library('upload');
		$nmfile = "file_".time();
		$config['upload_path']		= 'assets/img/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 5120;
		$config['max_width']		= 4300;
		$config['max_height']		= 4300;
		$config['file_name'] 		= $nmfile;
		
		$this->upload->initialize($config);
		
		if($_FILES['foto_siswa']['name'])
		{
			if ($this->upload->do_upload('foto_siswa'))
			{
				$gbr = $this->upload->data();
				$data = array(
					'nis'					=> $nis,
					'nama_siswa'			=> $nama_siswa,
					'tanggal_lahir_siswa'	=> $tanggal_lahir_siswa,
					'alamat_siswa'			=> $alamat_siswa,
					'jenis_kelamin_siswa'	=> $jenis_kelamin_siswa,
					'id_kelas'				=> $kelas,
					'id_jurusan'			=> $jurusan,
					'id_agama'				=> $agama,
					'foto_siswa' 			=> $gbr['file_name'],
					
					
				);
				$this->db->insert('data_siswa', $data);

			}	 
		}
		else{
			$data = array(
				'nis'					=> $nis,
				'nama_siswa'			=> $nama_siswa,
				'tanggal_lahir_siswa'	=> $tanggal_lahir_siswa,
				'alamat_siswa'			=> $alamat_siswa,
				'jenis_kelamin_siswa'	=> $jenis_kelamin_siswa,
				'id_kelas'				=> $kelas,
				'id_jurusan'			=> $jurusan,
				'id_agama'				=> $agama,
				'foto_siswa' 			=> 'kosong1.png',
			);
			$this->db->insert('data_siswa', $data);
		}
	}



	





	/*bagian view detail*/

	function tampildetail($id)
	{
		$this->db->select('*')
		->from('data_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->where('id_siswa',$id);
		$query = $this->db->get();
		return $query->result();
	}


	function tampilriwayat_treatment($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_treatment','data_treatment.id_treatment = riwayat_treatment.id_treatment')
		->where('riwayat_treatment.id_siswa',$id);
		$query = $this->db->get('riwayat_treatment');
		return $query->result();
	}



	function count_jtreatment($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_treatment','data_treatment.id_treatment = riwayat_treatment.id_treatment')
		->where('riwayat_treatment.id_siswa',$id);
		$query = $this->db->get('riwayat_treatment');
		return $query->num_rows();
	}


	function tampilriwayat_pelanggaran($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}



	function count_jpelanggaran($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}


	function count_jpelanggaran_kerapian($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}

	function count_jpelanggaran_berat($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}



	function tampilriwayat_pelanggaran_kerapian($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}



	

	function tampilriwayat_pelanggaran_berat($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}




	function pterbaru()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran')
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}


	function edit($id)
	{
		$id_detail_siswa            = $this->input->post('id_siswa');
		$nis 						= $this->input->post('nis');
		$nama_siswa					= $this->input->post('nama_siswa');
		$tanggal_lahir_siswa 		= $this->input->post('tanggal_lahir_siswa');
		$alamat_siswa				= $this->input->post('alamat_siswa');
		$jenis_kelamin_siswa 		= $this->input->post('jenis_kelamin_siswa');
		$kelas 						= $this->input->post('kelas');
		$jurusan 					= $this->input->post('jurusan');
		$agama 						= $this->input->post('agama');

		$this->load->library('upload');
		$nmfile = "file_".time();
		$config['upload_path']		= 'assets/img/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 5120;
		$config['max_width']		= 4300;
		$config['max_height']		= 4300;
		$config['file_name'] 		= $nmfile;

		$this->upload->initialize($config);

		if($_FILES['foto_siswa']['name'])
		{
			if ($this->upload->do_upload('foto_siswa'))
			{
				$gbr = $this->upload->data();
				$data = array(
					'nis'					=> $nis,
					'nama_siswa'			=> $nama_siswa,
					'tanggal_lahir_siswa'	=> $tanggal_lahir_siswa,
					'alamat_siswa'			=> $alamat_siswa,
					'jenis_kelamin_siswa'	=> $jenis_kelamin_siswa,
					'id_kelas'				=> $kelas,
					'id_jurusan'			=> $jurusan,
					'id_agama'				=> $agama,
					'foto_siswa' 			=> $gbr['file_name'],


				);
				$this->db->where('id_siswa',$id_detail_siswa)->update('data_siswa', $data);

			}	 
		}
		else{
			$data = array(
				'nis'					=> $nis,
				'nama_siswa'			=> $nama_siswa,
				'tanggal_lahir_siswa'	=> $tanggal_lahir_siswa,
				'alamat_siswa'			=> $alamat_siswa,
				'jenis_kelamin_siswa'	=> $jenis_kelamin_siswa,
				'id_kelas'				=> $kelas,
				'id_jurusan'			=> $jurusan,
				'id_agama'				=> $agama,
			);
			$this->db->where('id_siswa',$id_detail_siswa)->update('data_siswa', $data);
		}
	}



	function hapus($id)
	{
		$this->db->where('id_siswa', $id)->delete('data_siswa');
	}

	/*akhir model v detail*/









	/*model bagian v tambah treatment*/

	function tampiltreatment($id)
	{
		$this->db->select('*')
		->from('data_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->where('id_siswa',$id);
		$query = $this->db->get('data_treatment');
		return $query->result();

	}
	function caritreatment($carit,$id)
	{
		$carit 	= $this->input->post('caritreatment');
		$this->db->select('*')
		->from('data_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->where('id_siswa',$id)
		->like('nama_treatment',$carit);
		$query = $this->db->get('data_treatment');
		return $query->result();

	}


	function tambah_treatment($id)
	{
		
		$Keterangan_treatment 		= $this->input->post('Keterangan');
		$tanggal_treatment			= $this->input->post('tanggal_treatment');
		$id_treatment				= $this->input->post('id_treatment');
		$id_siswa 					= $this->input->post('id_siswa');


		$data = array(
			'Keterangan_treatment'	=> $Keterangan_treatment,
			'tanggal_treatment'		=> $tanggal_treatment,
			'id_treatment'			=> $id_treatment,
			'id_siswa'				=> $id_siswa,


		);
		$this->db->insert('riwayat_treatment', $data);

	}
	// akhir model penambahan treatment siswa





	// model tambah pelanggran siswa
	function caripelanggaran($carip,$id)
	{
		$carip 	= $this->input->post('caripelanggaran');
		$this->db->select('*')
		->from('data_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->where('id_siswa',$id)
		->like('nama_pelanggaran',$carip);
		$query = $this->db->get('data_pelanggaran');
		return $query->result();

	}
	function caripelanggaran1($carip1,$id)
	{
		$carip1 	= $this->input->post('caripelanggaran');
		$this->db->select('*')
		->from('data_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->where('id_siswa',$id)
		->like('nama_pelanggaran_kerapian',$carip1);
		$query = $this->db->get('data_pelanggaran_kerapian');
		return $query->result();

	}
	function caripelanggaran2($carip2,$id)
	{
		$carip2 	= $this->input->post('caripelanggaran');
		$this->db->select('*')
		->from('data_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->where('id_siswa',$id)
		->like('nama_pelanggaran_berat',$carip2);
		$query = $this->db->get('data_pelanggaran_berat');
		return $query->result();

	}


	/*akhir model bagian v tambah treatment*/


	/*model bagian v tambah pelanggaran*/
	function tampilpelanggaran($id)
	{
		$this->db->select('*')
		->from('data_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->where('id_siswa',$id);
		$query = $this->db->get('data_pelanggaran');
		return $query->result();

	}
	function tampil1($id)
	{
		$this->db->select('*')
		->from('data_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->where('id_siswa',$id);
		$query = $this->db->get('data_pelanggaran_kerapian');
		return $query->result();

	}
	function tampil2($id)
	{
		$this->db->select('*')
		->from('data_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->where('id_siswa',$id);
		$query = $this->db->get('data_pelanggaran_berat');
		return $query->result();

	}
	function tambah_pelanggaran($id)
	{
		
		$Keterangan_pelanggaran		= $this->input->post('Keterangan');
		$tanggal_pelanggaran		= $this->input->post('tanggal_pelanggaran');
		$id_pelanggaran				= $this->input->post('id_pelanggaran');
		$id_siswa 					= $this->input->post('id_siswa');


		$data = array(
			'Keterangan_pelanggaran'	=> $Keterangan_pelanggaran,
			'tanggal_pelanggaran'		=> $tanggal_pelanggaran,
			'id_pelanggaran'			=> $id_pelanggaran,
			'id_siswa'					=> $id_siswa,


		);
		$this->db->insert('riwayat_pelanggaran', $data);

	}

	function tambah_pelanggaran_kerapian($id)
	{
		
		$Keterangan_pelanggaran		= $this->input->post('Keterangan');
		$tanggal_pelanggaran		= $this->input->post('tanggal_pelanggaran');
		$id_pelanggaran_kerapian				= $this->input->post('id_pelanggaran_kerapian');
		$id_siswa 					= $this->input->post('id_siswa');


		$data = array(
			'Keterangan_pelanggaran'	=> $Keterangan_pelanggaran,
			'tanggal_pelanggaran'		=> $tanggal_pelanggaran,
			'id_pelanggaran_kerapian'			=> $id_pelanggaran_kerapian,
			'id_siswa'					=> $id_siswa,


		);
		$this->db->insert('riwayat_pelanggaran', $data);

	}

	function tambah_pelanggaran_berat($id)
	{
		
		$Keterangan_pelanggaran		= $this->input->post('Keterangan');
		$tanggal_pelanggaran		= $this->input->post('tanggal_pelanggaran');
		$id_pelanggaran_berat       = $this->input->post('id_pelanggaran_berat');
		$id_siswa 					= $this->input->post('id_siswa');


		$data = array(
			'Keterangan_pelanggaran'	=> $Keterangan_pelanggaran,
			'tanggal_pelanggaran'		=> $tanggal_pelanggaran,
			'id_pelanggaran_berat'		=> $id_pelanggaran_berat,
			'id_siswa'					=> $id_siswa,


		);
		$this->db->insert('riwayat_pelanggaran', $data);

	}
}