 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class M_data_guru extends CI_Model {

 	function tampil()
 	{
 		return $this->db->from('data_guru')
		->select('*')
		->join('data_user','data_user.id_user = data_guru.id_user')
		->get()
		->result();
 	}

 	function tambah()
 	{
 		$nip 						= $this->input->post('nip');
 		$nama_guru					= $this->input->post('nama_guru');
 		$tgl_lahir_guru				= $this->input->post('tgl_lahir_guru');
 		$alamat_guru				= $this->input->post('alamat_guru');
 		$jenis_kelamin_guru 		= $this->input->post('jenis_kelamin_guru');
 		$username					= $this->input->post('username');
 		$password 					= $this->input->post('password');

 		$this->load->library('upload');
 		$nmfile = "file_".time();
 		$config['upload_path']		= 'assets/img/';
 		$config['allowed_types']	= 'gif|jpg|png|jpeg';
 		$config['max_size']			= 5120;
 		$config['max_width']		= 4300;
 		$config['max_height']		= 4300;
 		$config['file_name'] 		= $nmfile;

 		$this->upload->initialize($config);

 		if($_FILES['foto_guru']['name'])
 		{
 			if ($this->upload->do_upload('foto_guru'))
 			{
 				$gbr = $this->upload->data();
 				$data = array(
 					'nip'					=> $nip,
 					'nama_guru'				=> $nama_guru,
 					'tgl_lahir_guru'		=> $tgl_lahir_guru,
 					'alamat_guru'			=> $alamat_guru,
 					'jenis_kelamin_guru'	=> $jenis_kelamin_guru,
 					'username'				=> $username,
 					'password'				=> $password,
 					'foto_guru' 			=> $gbr['file_name'],


 				);
 				$this->db->insert('data_guru', $data);

 			}	 
 		}
 		else{
 			$data = array(
 				'nip'					=> $nip,
 				'nama_guru'				=> $nama_guru,
 				'tgl_lahir_guru'		=> $tgl_lahir_guru,
 				'alamat_guru'			=> $alamat_guru,
 				'jenis_kelamin_guru'	=> $jenis_kelamin_guru,
 				'username'				=> $username,
 				'password'				=> $password,
 				'foto_guru' 			=> 'kosong1.png',
 			);
 			$this->db->insert('data_guru', $data);
 		}
 	}
 	function edit()
 	{
 		$id_guru					= $this->input->post('id_guru');
 		$nip 						= $this->input->post('nip');
 		$nama_guru					= $this->input->post('nama_guru');
 		$tgl_lahir_guru				= $this->input->post('tgl_lahir_guru');
 		$alamat_guru				= $this->input->post('alamat_guru');
 		$jenis_kelamin_guru 		= $this->input->post('jenis_kelamin_guru');
 		$username					= $this->input->post('username');
 		$password					= $this->input->post('password');

 		$this->load->library('upload');
 		$nmfile = "file_".time();
 		$config['upload_path']		= 'assets/img/';
 		$config['allowed_types']	= 'gif|jpg|png|jpeg';
 		$config['max_size']			= 5120;
 		$config['max_width']		= 4300;
 		$config['max_height']		= 4300;
 		$config['file_name'] 		= $nmfile;

 		$this->upload->initialize($config);

 		if($_FILES['foto_guru']['name'])
 		{
 			if ($this->upload->do_upload('foto_guru'))
 			{
 				$gbr = $this->upload->data();
 				$data = array(
 					'nip'					=> $nip,
 					'nama_guru'				=> $nama_guru,
 					'tgl_lahir_guru'		=> $tgl_lahir_guru,
 					'alamat_guru'			=> $alamat_guru,
 					'jenis_kelamin_guru'	=> $jenis_kelamin_guru,
 					'username'				=> $username,
 					'password'				=> $password,
 					'foto_guru' 			=> $gbr['file_name'],


 				);
 				$this->db->where('id_guru',$id_guru)->update('data_guru', $data);

 			}	 
 		}
 		else{
 			$data = array(
 				'nip'					=> $nip,
 				'nama_guru'				=> $nama_guru,
 				'tgl_lahir_guru'		=> $tgl_lahir_guru,
 				'alamat_guru'			=> $alamat_guru,
 				'jenis_kelamin_guru'	=> $jenis_kelamin_guru,
 				'username'				=> $username,
 				'password'				=> $password,
 				'foto_guru' 			=> 'kosong1.png',
 			);
 			$this->db->where('id_guru',$id_guru)->update('data_guru', $data);
 		}
 	}

 	function hapus($id)
 	{
 		$this->db->where('id_guru', $id)->delete('data_guru');
 	}


 	function cari()
 	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_guru',$cari)->get('data_guru')->result();
	}
 }