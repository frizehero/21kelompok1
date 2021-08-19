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
		$query = $this->db->get('data_treatment',$limit, $start);
		return $query->result();
	}

	function get_treatment_count($st = NULL)
	{

		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->like('nama_treatment',$st);
		$query = $this->db->get('data_treatment');
		return $query->num_rows();
	}
	
	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_treatment',$cari)->get('data_treatment_guru')->result();
	}
}