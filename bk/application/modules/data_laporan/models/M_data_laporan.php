<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_laporan extends CI_Model {

	function tampil()
	{
		return $this->db->get('laporan')->result();
	}

	function tambah()
	{
		$nama 		= $this->input->post('nama_laporan');
		$keterangan	= $this->input->post('keterangan');


		$this->load->library('upload');
		$nmfile = "file_".time();
		$config['upload_path']		= 'assets/img/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 5120;
		$config['max_width']		= 4300;
		$config['max_height']		= 4300;
		$config['file_name'] 		= $nmfile;
		
		$this->upload->initialize($config);
		
		if($_FILES['gambar']['name'])
        {
            if ($this->upload->do_upload('gambar'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'nama_laporan'		=> $nama,
					'keterangan'		=> $keterangan,
					'logo' 				=> $gbr['file_name'],
					
					
				);
				$this->db->insert('laporan', $data);
			
			}	 
		}
		else{
				$data = array(
					'nama_laporan'		=> $nama,
					'keterangan'		=> $keterangan,
					'logo' 				=> 'kosong1.png',
				);
				$this->db->insert('laporan', $data);
			}
	}

	function edit()
	{
		$id_laporan = $this->input->post('id_laporan');
		$nama 		= $this->input->post('nama_laporan');
		$keterangan	= $this->input->post('keterangan');


		$this->load->library('upload');
		$nmfile = "file_".time();
		$config['upload_path']		= 'assets/img/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 5120;
		$config['max_width']		= 4300;
		$config['max_height']		= 4300;
		$config['file_name'] 		= $nmfile;
		
		$this->upload->initialize($config);
		
		if($_FILES['gambar']['name'])
        {
            if ($this->upload->do_upload('gambar'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'nama_laporan'		=> $nama,
					'keterangan'		=> $keterangan,
					'logo' 				=> $gbr['file_name'],
				);
				$this->db->where('id_laporan',$id_laporan)->update('laporan', $data);
			
			}	 
		}
		else{
				$data = array(
					'nama_laporan'		=> $nama,
					'keterangan'		=> $keterangan,
				);
				$this->db->where('id_laporan',$id_laporan)->update('laporan', $data);
			}
	}

	function hapus($id)
	{
		$this->db->where('id_laporan', $id)->delete('laporan');
	}

	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_laporan',$cari)->get('laporan')->result();
	}
}