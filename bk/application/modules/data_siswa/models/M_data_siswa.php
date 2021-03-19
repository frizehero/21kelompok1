<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_siswa extends CI_Model {

	function tampil()
	{
		return $this->db->from('data_siswa')
		->select('*')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->get()
		->result();
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


	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_siswa',$cari)
		->select('*')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->get('data_siswa')->result();
	}



	function filter_jur(){
		$this->db->select('*')
		->from('data_jurusan');
		$query = $this->db->get();
		return $query->result();
		
		
	}
	function filter_kel(){
		$this->db->select('*')
		->from('data_kelas');
		$query = $this->db->get();
		return $query->result();

		
	}
	function filter($kelas,$jurusan){

		if ($kelas=="") 
		{
			$this->db->select('*')
			->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
			->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
			->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
			->where('data_siswa.id_jurusan',$jurusan);
			$query = $this->db->get('data_siswa');
			return $query->result();

		}
		elseif ($jurusan=="") 
		{
			$this->db->select('*')
			->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
			->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
			->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
			->where('data_siswa.id_kelas',$kelas);
			$query = $this->db->get('data_siswa');
			return $query->result();
		}
		else
		{
			$this->db->select('*')
			->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
			->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
			->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
			->where('data_siswa.id_jurusan',$jurusan)
			->where('data_siswa.id_kelas',$kelas);
			$query = $this->db->get('data_siswa');
			return $query->result();

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
		return $query->row_array();
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
	function cari1()
	{
		$cari1 		= $this->input->post('cari1');
		return $this->db->like('nama_pelanggaran',$cari1)
		->select('*')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = data_pelanggaran.id_pelanggaran')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = data_pelanggaran.id_pelanggaran_berat')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = data_pelanggaran.id_pelanggaran_kerapian')
		->get('data_pelanggaran')->result();
	}
}