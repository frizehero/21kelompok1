<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_siswa_guru extends CI_Model {

	function tampil($limit, $start)
	{
		$this->db->select('*')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->order_by("data_siswa.id_siswa", "DESC");
		$query = $this->db->get('data_siswa', $limit, $start);
		return $query->result();

	}

	function get_siswa($limit, $start, $st = NULL)
	{
		
		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->like('nama_siswa',$st);
		$query = $this->db->get('data_siswa',$limit, $start);
		return $query->result();
	}

	function get_siswa_count($st = NULL)
	{

		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->like('nama_siswa',$st);
		$query = $this->db->get('data_siswa');
		return $query->num_rows();
	}

	public function importData($data) {
  
            $res = $this->db->insert_batch('data_siswa',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
      
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

		$insert_id = $this->db->insert_id();
 		$id_user					= $this->input->post('id_user');
 		$username					= $this->input->post('username');
 		$password 					= $this->input->post('password');
 		$password1 					= sha1($password);
 		$level 						= $this->input->post('level');

 		$data = array(
 			'id_user'				=> $id_user,
 			'id_siswa'				=> $insert_id,
 			'username'				=> $username,
 			'password'				=> $password1,
 			'level'					=> $level,

 		);

 		$this->db->insert('data_user', $data);
 		$insert_id = $this->db->insert_id();
	}


	/*bagian view detail*/

	function tampildetail($id)
	{
		$this->db->select('*')
		->from('data_siswa')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->where('id_siswa',$id);
		$query = $this->db->get();
		return $query->result();
	}


	function tampilriwayat_treatment($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_guru','data_guru.id_guru = riwayat_treatment.id_guru')
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
		->join('data_guru','data_guru.id_guru = riwayat_pelanggaran.id_guru')
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
		->join('data_guru','data_guru.id_guru = riwayat_pelanggaran.id_guru')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}



	

	function tampilriwayat_pelanggaran_berat($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_guru','data_guru.id_guru = riwayat_pelanggaran.id_guru')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}




	function tampilriwayat_pelanggaran_samping($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$this->db->order_by("riwayat_pelanggaran.create_at", 'DESC');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}



	function tampilriwayat_pelanggaran_kerapian_samping($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$this->db->order_by("riwayat_pelanggaran.create_at", 'DESC');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}



	

	function tampilriwayat_pelanggaran_berat_samping($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$this->db->order_by("riwayat_pelanggaran.create_at", 'DESC');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}




	function pterbaru($id)
	{
		$this->db->select('*')
		// ->select_max('riwayat_pelanggaran.create_at')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$this->db->order_by("riwayat_pelanggaran.create_at", 'DESC');
		// $this->db->group_by('riwayat_pelanggaran.id_siswa');

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
		$status_siswa				= $this->input->post('status_siswa');
		$kelas 						= $this->input->post('kelas');
		$jurusan 					= $this->input->post('jurusan');
		$agama 						= $this->input->post('agama');
		$fotoku 					= $this->input->post('fotoku');

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
				if ($fotoku == "kosong1.png") {
					$gbr = $this->upload->data();
					$data = array(
						'nis'					=> $nis,
						'nama_siswa'			=> $nama_siswa,
						'tanggal_lahir_siswa'	=> $tanggal_lahir_siswa,
						'alamat_siswa'			=> $alamat_siswa,
						'jenis_kelamin_siswa'	=> $jenis_kelamin_siswa,
						'status_siswa'			=> $status_siswa,
						'id_kelas'				=> $kelas,
						'id_jurusan'			=> $jurusan,
						'id_agama'				=> $agama,
						'foto_siswa' 			=> $gbr['file_name'],
					);
					$this->db->where('id_siswa',$id_detail_siswa)->update('data_siswa', $data);
				}else{
					unlink("assets/img/".$fotoku);
					$gbr = $this->upload->data();
					$data = array(
						'nis'					=> $nis,
						'nama_siswa'			=> $nama_siswa,
						'tanggal_lahir_siswa'	=> $tanggal_lahir_siswa,
						'alamat_siswa'			=> $alamat_siswa,
						'jenis_kelamin_siswa'	=> $jenis_kelamin_siswa,
						'status_siswa'			=> $status_siswa,
						'id_kelas'				=> $kelas,
						'id_jurusan'			=> $jurusan,
						'id_agama'				=> $agama,
						'foto_siswa' 			=> $gbr['file_name'],
					);
					$this->db->where('id_siswa',$id_detail_siswa)->update('data_siswa', $data);
				}
				

			}	 
		}
		else{
			$data = array(
				'nis'					=> $nis,
				'nama_siswa'			=> $nama_siswa,
				'tanggal_lahir_siswa'	=> $tanggal_lahir_siswa,
				'alamat_siswa'			=> $alamat_siswa,
				'jenis_kelamin_siswa'	=> $jenis_kelamin_siswa,
				'status_siswa'			=> $status_siswa,
				'id_kelas'				=> $kelas,
				'id_jurusan'			=> $jurusan,
				'id_agama'				=> $agama,
			);
			$this->db->where('id_siswa',$id_detail_siswa)->update('data_siswa', $data);
		}
	}



	function hapus($id)
	{
		$this->db->where('id_siswa', $id)->delete('riwayat_pelanggaran');
		$this->db->where('id_siswa', $id)->delete('riwayat_treatment');
		$this->db->where('id_siswa', $id)->delete('data_user');

		$this->db->where('id_siswa', $id);
		$query = $this->db->get('data_siswa');
		$row = $query->row();
		if ($row->foto_siswa == "kosong1.png") {
			$this->db->delete('data_siswa',array('id_siswa' => $id));
		}else{
			unlink("assets/img/".$row->foto_siswa);
			$this->db->delete('data_siswa',array('id_siswa' => $id));
		}
		
	}



	function jumlahpelanggaran1($id)
	{
		
		$query = $this->db->select_sum("data_pelanggaran.point")
		->from("data_pelanggaran")
		->join("riwayat_pelanggaran","data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran","left") 
		->where("riwayat_pelanggaran.id_siswa",$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function jumlahpelanggaran2($id)
	{
		
		$query = $this->db->select_sum("data_pelanggaran_berat.point")
		->from("data_pelanggaran_berat")
		->join("riwayat_pelanggaran","data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat","left") 
		->where("riwayat_pelanggaran.id_siswa",$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function jumlahpelanggaran3($id)
	{
		
		$query = $this->db->select_sum("data_pelanggaran_kerapian.point")
		->from("data_pelanggaran_kerapian")
		->join("riwayat_pelanggaran","data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian","left") 
		->where("riwayat_pelanggaran.id_siswa",$id);
		$query = $this->db->get();
		return $query->row_array();
	}



	function jumlahpointprestasi($id)
	{
		
		$query = $this->db->select_sum("data_prestasi.point")
		->from("data_prestasi")
		->join("riwayat_treatment","data_prestasi.id_prestasi = riwayat_treatment.id_prestasi","left")
		->where("riwayat_treatment.id_siswa",$id);
		$query = $this->db->get();
		return $query->row_array();
	}



	/*akhir model v detail*/









	/*model bagian v tambah treatment*/

	function tampiltreatment($id)
	{
		$this->db->select('*')
		->from('data_siswa')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->where('id_siswa',$id);
		$query = $this->db->get('data_treatment');
		return $query->result();

	}
	function caritreatment($carit,$id)
	{
		$carit 	= $this->input->post('caritreatment');
		$this->db->select('*')
		->from('data_siswa')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
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
		$id_guru 					= $this->input->post('id_guru');

		$this->load->library('upload');
		$nmfile = "file_".time();
		$config['upload_path']		= 'assets/img/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 5120;
		$config['max_width']		= 4300;
		$config['max_height']		= 4300;
		$config['file_name'] 		= $nmfile;

		$this->upload->initialize($config);

		if($_FILES['foto_treatment']['name'])
		{
			if ($this->upload->do_upload('foto_treatment'))
			{
				$gbr = $this->upload->data();
				$data = array(
					'Keterangan_treatment'	=> $Keterangan_treatment,
					'tanggal_treatment'		=> $tanggal_treatment,
					'id_treatment'			=> $id_treatment,
					'id_siswa'				=> $id_siswa,
					'id_guru'				=> $id_guru,
					'foto_treatment' 				=> $gbr['file_name'],


				);
				$this->db->insert('riwayat_treatment', $data); 

			}	 
		}

		else
		{ 
			$data = array(
				'Keterangan_treatment'	=> $Keterangan_treatment,
				'tanggal_treatment'		=> $tanggal_treatment,
				'id_treatment'			=> $id_treatment,
				'id_siswa'				=> $id_siswa,
				'id_guru'				=> $id_guru,
				'foto_treatment' 		=> 'kosong1.png',

			);
			$this->db->insert('riwayat_treatment', $data);
		}
	}
	// akhir model penambahan treatment siswa





	// model tambah pelanggran siswa
	function caripelanggaran($carip,$id)
	{
		$carip 	= $this->input->post('caripelanggaran');
		$this->db->select('*')
		->from('data_siswa')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->where('id_siswa',$id)
		->like('nama_pelanggaran',$carip);
		$query = $this->db->get('data_pelanggaran');
		return $query->result();

	}
	function caripelanggaran1($carip1,$id)
	{
		$carip 	= $this->input->post('caripelanggaran');
		$this->db->select('*')
		->from('data_siswa')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->where('id_siswa',$id)
		->like('nama_pelanggaran_kerapian',$carip1);
		$query = $this->db->get('data_pelanggaran_kerapian');
		return $query->result();

	}
	function caripelanggaran2($carip2,$id)
	{
		$carip 	= $this->input->post('caripelanggaran');
		$this->db->select('*')
		->from('data_siswa')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
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
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->where('id_siswa',$id);
		$query = $this->db->get('data_pelanggaran');
		return $query->result();

	}
	function tampil1($id)
	{
		$this->db->select('*')
		->from('data_siswa')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->where('id_siswa',$id);
		$query = $this->db->get('data_pelanggaran_kerapian');
		return $query->result();

	}
	function tampil2($id)
	{
		$this->db->select('*')
		->from('data_siswa')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
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
		$id_guru 					= $this->input->post('id_guru');

		$this->load->library('upload');
		$nmfile = "file_".time();
		$config['upload_path']		= 'assets/img/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 5120;
		$config['max_width']		= 4300;
		$config['max_height']		= 4300;
		$config['file_name'] 		= $nmfile;
		
		$this->upload->initialize($config);
		
		if($_FILES['foto_pelanggaran']['name'])
		{
			if ($this->upload->do_upload('foto_pelanggaran'))
			{
				$gbr = $this->upload->data();
				$data = array(
					'Keterangan_pelanggaran'		=> $Keterangan_pelanggaran,
					'tanggal_pelanggaran'			=> $tanggal_pelanggaran,
					'id_pelanggaran'				=> $id_pelanggaran,
					'id_siswa'						=> $id_siswa,
					'id_guru'						=> $id_guru,
					'foto_pelanggaran' 				=> $gbr['file_name'],
					
					
				);
				$this->db->insert('riwayat_pelanggaran', $data); 

			}	 
		}

		else
		{ 
			$data = array(
				'Keterangan_pelanggaran'	=> $Keterangan_pelanggaran,
				'tanggal_pelanggaran'		=> $tanggal_pelanggaran,
				'id_pelanggaran'			=> $id_pelanggaran,
				'id_siswa'					=> $id_siswa,
				'id_guru'						=> $id_guru,
				'foto_pelanggaran' 			=> 'kosong1.png',

			);
			$this->db->insert('riwayat_pelanggaran', $data);
		}
	}

	function tambah_pelanggaran_kerapian($id)
	{
		
		$Keterangan_pelanggaran		= $this->input->post('Keterangan');
		$tanggal_pelanggaran		= $this->input->post('tanggal_pelanggaran');
		$id_pelanggaran_kerapian	= $this->input->post('id_pelanggaran_kerapian');
		$id_siswa 					= $this->input->post('id_siswa');
		$id_guru 					= $this->input->post('id_guru');

		$this->load->library('upload');
		$nmfile = "file_".time();
		$config['upload_path']		= 'assets/img/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 5120;
		$config['max_width']		= 4300;
		$config['max_height']		= 4300;
		$config['file_name'] 		= $nmfile;
		
		$this->upload->initialize($config);
		
		if($_FILES['foto_pelanggaran']['name'])
		{
			if ($this->upload->do_upload('foto_pelanggaran'))
			{
				$gbr = $this->upload->data();
				$data = array(
					'Keterangan_pelanggaran'		=> $Keterangan_pelanggaran,
					'tanggal_pelanggaran'			=> $tanggal_pelanggaran,
					'id_pelanggaran_kerapian'		=> $id_pelanggaran_kerapian,
					'id_siswa'						=> $id_siswa,
					'id_guru'						=> $id_guru,
					'foto_pelanggaran' 				=> $gbr['file_name'],
					
					
				);
				$this->db->insert('riwayat_pelanggaran', $data); 

			}	 
		}

		else
		{ 
			$data = array(
				'Keterangan_pelanggaran'	=> $Keterangan_pelanggaran,
				'tanggal_pelanggaran'		=> $tanggal_pelanggaran,
				'id_pelanggaran_kerapian'	=> $id_pelanggaran_kerapian,
				'id_siswa'					=> $id_siswa,
				'id_guru'						=> $id_guru,
				'foto_pelanggaran' 			=> 'kosong1.png',

			);
			$this->db->insert('riwayat_pelanggaran', $data);
		}
	}

	function tambah_pelanggaran_berat($id)
	{
		
		$Keterangan_pelanggaran		= $this->input->post('Keterangan');
		$tanggal_pelanggaran		= $this->input->post('tanggal_pelanggaran');
		$id_pelanggaran_berat		= $this->input->post('id_pelanggaran_berat');
		$id_siswa 					= $this->input->post('id_siswa');
		$id_guru 					= $this->input->post('id_guru');


		$this->load->library('upload');
		$nmfile = "file_".time();
		$config['upload_path']		= 'assets/img/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 5120;
		$config['max_width']		= 4300;
		$config['max_height']		= 4300;
		$config['file_name'] 		= $nmfile;
		
		$this->upload->initialize($config);
		
		if($_FILES['foto_pelanggaran']['name'])
		{
			if ($this->upload->do_upload('foto_pelanggaran'))
			{
				$gbr = $this->upload->data();
				$data = array(
					'Keterangan_pelanggaran'		=> $Keterangan_pelanggaran,
					'tanggal_pelanggaran'			=> $tanggal_pelanggaran,
					'id_pelanggaran_berat'			=> $id_pelanggaran_berat,
					'id_siswa'						=> $id_siswa,
					'id_guru'						=> $id_guru,
					'foto_pelanggaran' 				=> $gbr['file_name'],
					
					
				);
				$this->db->insert('riwayat_pelanggaran', $data); 

			}	 
		}

		else
		{ 
			$data = array(
				'Keterangan_pelanggaran'	=> $Keterangan_pelanggaran,
				'tanggal_pelanggaran'		=> $tanggal_pelanggaran,
				'id_pelanggaran_berat'		=> $id_pelanggaran_berat,
				'id_siswa'					=> $id_siswa,
				'id_guru'					=> $id_guru,
				'foto_pelanggaran' 			=> 'kosong1.png',

			);
			$this->db->insert('riwayat_pelanggaran', $data);
		}
	}


	// model prestasi
	function tampilprestasi($id)
	{
		$this->db->select('*')
		->from('data_siswa')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->where('id_siswa',$id);
		$query = $this->db->get('data_prestasi');
		return $query->result();

	}

	function tambah_prestasi($id)
	{
		
		$Keterangan_treatment		= $this->input->post('Keterangan_treatment');
		$tanggal_treatment			= $this->input->post('tanggal_treatment');
		$id_prestasi				= $this->input->post('id_prestasi');
		$id_siswa 					= $this->input->post('id_siswa');
		

		$this->load->library('upload');
		$nmfile = "file_".time();
		$config['upload_path']		= 'assets/img/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 5120;
		$config['max_width']		= 4300;
		$config['max_height']		= 4300;
		$config['file_name'] 		= $nmfile;
		
		$this->upload->initialize($config);
		
		if($_FILES['foto_treatment']['name'])
		{
			if ($this->upload->do_upload('foto_treatment'))
			{
				$gbr = $this->upload->data();
				$data = array(
					'Keterangan_treatment'			=> $Keterangan_treatment,
					'tanggal_treatment'				=> $tanggal_treatment,
					'id_prestasi'					=> $id_prestasi,
					'id_siswa'						=> $id_siswa,
					'foto_prestasi' 				=> $gbr['file_name'],
					
					
				);
				$this->db->insert('riwayat_treatment', $data); 

			}	 
		}

		else
		{ 
			$data = array(
				'Keterangan_treatment'		=> $Keterangan_treatment,
				'tanggal_treatment'			=> $tanggal_treatment,
				'id_prestasi'				=> $id_prestasi,
				'id_siswa'					=> $id_siswa,
				'foto_prestasi' 			=> 'kosong1.png',

			);
			$this->db->insert('riwayat_treatment', $data);
		}
	}



	function cariprestasi($carit,$id)
	{
		$carit 	= $this->input->post('cariprestasi');
		$this->db->select('*')
		->from('data_siswa')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->where('id_siswa',$id)
		->like('nama_prestasi',$carit);
		$query = $this->db->get('data_prestasi');
		return $query->result();

	}

	function tampilriwayat_prestasi($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_prestasi','data_prestasi.id_prestasi = riwayat_treatment.id_prestasi')
		->join('data_guru','data_guru.id_guru = riwayat_treatment.id_guru')
		->where('riwayat_treatment.id_siswa',$id);
		$query = $this->db->get('riwayat_treatment');
		return $query->result();
	}


	function oke($id)
	{
		$this->db->select('*')
		->from('data_user')
		->join('data_guru','data_guru.id_guru = data_user.id_guru')
		->where('id_user',$id);
		$query = $this->db->get();
		return $query->result();
	}
}