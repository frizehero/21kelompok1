<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_pelanggaran_kerapian extends CI_Model {

	function tampil()
	{
		return $this->db->get('data_pelanggaran_kerapian')->result();
	}

	function tambah()
	{
		$nama_pelanggaran_kerapian	= $this->input->post('nama_pelanggaran_kerapian');
		$point			= $this->input->post('point');

				$data = array(
					'nama_pelanggaran_kerapian' 	=> $nama_pelanggaran_kerapian,
					'point'				=> $point,
					
					
				);
				$this->db->insert('data_pelanggaran_kerapian', $data);	 
		

	}

	function edit()
	{
		$id_pelanggaran_kerapian 			= $this->input->post('id_pelanggaran_kerapian');
		$nama_pelanggaran_kerapian			= $this->input->post('nama_pelanggaran_kerapian');
		$point					= $this->input->post('point');


		
		
		
        
            
				$data = array(
					'nama_pelanggaran_kerapian'	=> $nama_pelanggaran_kerapian,
					'point'				=> $point,
				);
				$this->db->where('id_pelanggaran_kerapian',$id_pelanggaran_kerapian)->update('data_pelanggaran_kerapian', $data);
			
			}	 

	function hapus($id)
	{
		$this->db->where('id_pelanggaran_kerapian', $id)->delete('data_pelanggaran_kerapian');
	}

	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_pelanggaran_kerapian',$cari)->get('data_pelanggaran_kerapian')->result();
	}
}