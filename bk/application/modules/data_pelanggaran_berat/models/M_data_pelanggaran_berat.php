<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_pelanggaran_berat extends CI_Model {

	function tampil()
	{
		return $this->db->get('data_pelanggaran_berat')->result();
	}

	function tambah()
	{
		$nama_pelanggaran_berat	= $this->input->post('nama_pelanggaran_berat');
		$point			= $this->input->post('point');

				$data = array(
					'nama_pelanggaran_berat' 	=> $nama_pelanggaran_berat,
					'point'				=> $point,
					
					
				);
				$this->db->insert('data_pelanggaran_berat', $data);	 
		

	}

	function edit()
	{
		$id_pelanggaran_berat 			= $this->input->post('id_pelanggaran_berat');
		$nama_pelanggaran_berat			= $this->input->post('nama_pelanggaran_berat');
		$point					= $this->input->post('point');


		
		
		
        
            
				$data = array(
					'nama_pelanggaran_berat'	=> $nama_pelanggaran_berat,
					'point'				=> $point,
				);
				$this->db->where('id_pelanggaran_berat',$id_pelanggaran_berat)->update('data_pelanggaran_berat', $data);
			
			}	 

	function hapus($id)
	{
		$this->db->where('id_pelanggaran_berat', $id)->delete('data_pelanggaran_berat');
	}

	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_pelanggaran_berat',$cari)->get('data_pelanggaran_berat')->result();
	}
}