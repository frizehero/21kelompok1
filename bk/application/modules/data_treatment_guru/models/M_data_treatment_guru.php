<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_treatment_guru extends CI_Model {

	
	function tampil($limit, $start)
	{
		
		$query = $this->db->get('data_treatment', $limit, $start);
		return $query->result();
	}
	function get_treatment($limit, $start, $st = NULL)
	{
		
		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->like('nama_treatment',$st);
		$query = $this->db->get('data_treatment_guru',$limit, $start);
		return $query->result();
	}

	function get_treatment_count($st = NULL)
	{

		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->like('nama_treatment',$st);
		$query = $this->db->get('data_treatment_guru');
		return $query->num_rows();
	}


	function tambah()
	{
		$nama_treatment	= $this->input->post('nama_treatment');
		$point			= $this->input->post('point');

				$data = array(
					'nama_treatment' 	=> $nama_treatment,
					'point'				=> $point,
					
					
				);
				$this->db->insert('data_treatment_guru', $data);	 
		

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
				$this->db->where('id_treatment',$id_treatment)->update('data_treatment_guru', $data);
			
			}	 

	function hapus($id)
	{
		$this->db->where('id_treatment', $id)->delete('data_treatment_guru');
	}

	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_treatment',$cari)->get('data_treatment_guru')->result();
	}
}