<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_pelanggaran extends CI_Model {

	function tampil()
	{
		return $this->db->get('data_pelanggaran')->result();
	}

	function tambah()
	{
		$nama_pelanggaran	= $this->input->post('nama_pelanggaran');
		$point			= $this->input->post('point');

				$data = array(
					'nama_pelanggaran' 	=> $nama_pelanggaran,
					'point'				=> $point,
					
					
				);
				$this->db->insert('data_pelanggaran', $data);	 
		

	}

	function edit()
	{
		$id_pelanggaran 			= $this->input->post('id_pelanggaran');
		$nama_pelanggaran			= $this->input->post('nama_pelanggaran');
		$point					= $this->input->post('point');


		
		
		
        
            
				$data = array(
					'nama_pelanggaran'	=> $nama_pelanggaran,
					'point'				=> $point,
				);
				$this->db->where('id_pelanggaran',$id_pelanggaran)->update('data_pelanggaran', $data);
			
			}	 

	function hapus($id)
	{
		$this->db->where('id_pelanggaran', $id)->delete('data_pelanggaran');
	}

	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_pelanggaran',$cari)->get('data_pelanggaran')->result();
	}
}