<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_prestasi extends CI_Model {

	
	function tampil($limit, $start)
	{
		
		$query = $this->db->get('data_prestasi', $limit, $start);
		return $query->result();
	}
	function get_treatment($limit, $start, $st = NULL)
	{
		
		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->like('nama_prestasi',$st);
		$query = $this->db->get('data_prestasi',$limit, $start);
		return $query->result();
	}

	function get_treatment_count($st = NULL)
	{

		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->like('nama_prestasi',$st);
		$query = $this->db->get('data_prestasi');
		return $query->num_rows();
	}


	function tambah()
	{
		$nama_prestasi	= $this->input->post('nama_prestasi');
		$point			= $this->input->post('point');

				$data = array(
					'nama_prestasi' 	=> $nama_prestasi,
					'point'				=> $point,
					
					
				);
				$this->db->insert('data_prestasi', $data);	 
		

	}

	function edit()
	{
		$id_prestasi 			= $this->input->post('id_prestasi');
		$nama_prestasi			= $this->input->post('nama_prestasi');
		$point					= $this->input->post('point');
            
				$data = array(
					'nama_prestasi'		=> $nama_prestasi,
					'point'				=> $point,
				);
				$this->db->where('id_prestasi',$id_prestasi)->update('data_prestasi', $data);
			
			}	 

	function hapus($id)
	{
		$this->db->where('id_prestasi', $id)->delete('data_prestasi');
	}

	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_prestasi',$cari)->get('data_prestasi')->result();
	}
}