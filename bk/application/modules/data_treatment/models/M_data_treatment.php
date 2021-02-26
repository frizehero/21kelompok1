<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_treatment extends CI_Model {

	function tampil()
	{
		return $this->db->get('data_treatment')->result();
	}

	function tambah()
	{
		$nama_treatment	= $this->input->post('nama_treatment');
		$point			= $this->input->post('point');

				$data = array(
					'nama_treatment' 	=> $nama_treatment,
					'point'				=> $point,
					
					
				);
				$this->db->insert('data_treatment', $data);	 
		

	}

	function edit()
	{
		$id_treatment 			= $this->input->post('id_treatment');
		$nama_treatment			= $this->input->post('nama_treatment');
		$point					= $this->input->post('point');


		
		
		
        
            
				$data = array(
					'nama_treatment'	=> $nama_treatment,
					'point'				=> $point,
				);
				$this->db->where('id_treatment',$id_treatment)->update('data_treatment', $data);
			
			}	 

	function hapus($id)
	{
		$this->db->where('id_treatment', $id)->delete('data_treatment');
	}

	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_treatment',$cari)->get('data_treatment')->result();
	}
}