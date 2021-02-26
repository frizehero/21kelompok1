<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_siswa extends CI_Model {

	function tampil()
	{
		return $this->db->get('data_siswa')->result();
	}

	function tambah()
	{
		$nis 						= $this->input->post('nis');
		$nama_siswa					= $this->input->post('nama_siswa');
		$tanggal_lahir_siswa 		= $this->input->post('tanggal_lahir_siswa');
		$alamat_siswa				= $this->input->post('alamat_siswa');
		$jenis_kelamin_siswa 		= $this->input->post('jenis_kelamin_siswa');


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
					'foto_siswa' 			=> 'kosong1.png',
				);
				$this->db->insert('data_siswa', $data);
			}
	}


	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_siswa',$cari)->get('data_siswa')->result();
	}
}