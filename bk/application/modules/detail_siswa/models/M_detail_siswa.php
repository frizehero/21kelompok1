<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detail_siswa extends CI_Model {

	function tampil($id)
	{
		$this->db->select('*')
		->from('data_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->where('id_siswa',$id);
		$query = $this->db->get();
		return $query->row_array();
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
					'id_kelas'					=> $kelas,
					'id_jurusan'				=> $jurusan,
					'id_agama'					=> $agama,
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


	function edit()
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
				$this->db->where('id_siswa',$id_siswa)->update('data_siswa', $data);

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
			$this->db->where('id_siswa',$id_siswa)->update('data_siswa', $data);
		}
	}

	function hapus($id)
	{
		$this->db->where('id_siswa', $id)->delete('data_siswa');
	}
}