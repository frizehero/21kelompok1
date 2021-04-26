 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class M_data_guru extends CI_Model {

 	function tampil($limit, $start)
 	{
 		$this->db->select('*')
 		->join('data_guru','data_guru.id_guru = data_user.id_guru');
 		$query = $this->db->get('data_user', $limit, $start);
		return $query->result();
 	}

 	function tambah()
 	{
 		$id_guru					= $this->input->post('id_guru');
 		$nip 						= $this->input->post('nip');
 		$nama_guru					= $this->input->post('nama_guru');
 		$tgl_lahir_guru				= $this->input->post('tgl_lahir_guru');
 		$alamat_guru				= $this->input->post('alamat_guru');
 		$jenis_kelamin_guru 		= $this->input->post('jenis_kelamin_guru');

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
 					'id_guru'				=> $id_guru,
 					'nip'					=> $nip,
 					'nama_guru'				=> $nama_guru,
 					'tgl_lahir_guru'		=> $tgl_lahir_guru,
 					'alamat_guru'			=> $alamat_guru,
 					'jenis_kelamin_guru'	=> $jenis_kelamin_guru,
 					'foto_guru' 			=> $gbr['file_name'],


 				);
 				$this->db->insert('data_guru', $data);
 			}	 
 		}
 		else{
 			$data = array(
 				'id_guru'				=> $id_guru,
 				'nip'					=> $nip,
 				'nama_guru'				=> $nama_guru,
 				'tgl_lahir_guru'		=> $tgl_lahir_guru,
 				'alamat_guru'			=> $alamat_guru,
 				'jenis_kelamin_guru'	=> $jenis_kelamin_guru,
 				'foto_guru' 			=> 'kosong1.png',
 			);
 			$this->db->insert('data_guru', $data);
 		}

 		$insert_id = $this->db->insert_id();
 		$id_user					= $this->input->post('id_user');
 		$username					= $this->input->post('username');
 		$password 					= $this->input->post('password');
 		$password1 					= sha1($password);
 		$level 						= $this->input->post('level');

 		$data = array(
 			'id_user'				=> $id_user,
 			'id_guru'				=> $insert_id,
 			'username'				=> $username,
 			'password'				=> $password1,
 			'level'					=> $level,

 		);

 		$this->db->insert('data_user', $data);
 		$insert_id = $this->db->insert_id();
 	}
 	function edit()
 	{
 		$id_guru					= $this->input->post('id_guru');
 		$nip 						= $this->input->post('nip');
 		$nama_guru					= $this->input->post('nama_guru');
 		$tgl_lahir_guru				= $this->input->post('tgl_lahir_guru');
 		$alamat_guru				= $this->input->post('alamat_guru');
 		$jenis_kelamin_guru 		= $this->input->post('jenis_kelamin_guru');
 		$fotomu 					= $this->input->post('fotomu');
 		

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
 				unlink("assets/img/".$fotomu);
 				$gbr = $this->upload->data();
 				$data = array(
 					'nip'					=> $nip,
 					'nama_guru'				=> $nama_guru,
 					'tgl_lahir_guru'		=> $tgl_lahir_guru,
 					'alamat_guru'			=> $alamat_guru,
 					'jenis_kelamin_guru'	=> $jenis_kelamin_guru,
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
 			);
 			$this->db->where('id_guru',$id_guru)->update('data_guru', $data);
 		}

 		$id_user					= $this->input->post('id_user');
 		$username					= $this->input->post('username');
 		$password 					= $this->input->post('password');
 		$password2 					= sha1($password);
 		$level 						= $this->input->post('level');

 		$data = array(
 			'username'				=> $username,
 			'password'				=> $password2,
 			'level'					=> $level,

 		);

 		$this->db->where('id_user',$id_user)->update('data_user', $data);
 	}

 	function hapus($id)
 	{
 		// unlink("assets/img/".$res->foto_guru);
 		// $this->db->where('id_guru', $id)->delete('data_guru');
 		$this->db->where('id_guru', $id)->delete('data_user');

 		$this->db->where('id_guru', $id);
		$query = $this->db->get('data_guru');
		$row = $query->row();
		unlink("assets/img/".$row->foto_guru);
		
		$this->db->delete('data_guru',array('id_guru' => $id));

 	}


 	// function cari()
 	// {
 	// 	$cari 		= $this->input->post('cari');
 	// 	return $this->db->like('nama_guru',$cari)
 	// 	->select('*')
 	// 	->join('data_guru','data_guru.id_guru = data_user.id_guru')
 	// 	->get('data_user')->result();
 	// }

 	function get_user($limit, $start, $st = NULL)
	{
		
		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->join('data_guru','data_guru.id_guru = data_user.id_guru')
		->like('nama_guru',$st);
		$query = $this->db->get('data_user',$limit, $start);
		return $query->result();
	}

	function get_user_count($st = NULL)
	{

		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->join('data_guru','data_guru.id_guru = data_user.id_guru')
		->like('nama_guru',$st);
		$query = $this->db->get('data_user');
		return $query->num_rows();
	}

 }