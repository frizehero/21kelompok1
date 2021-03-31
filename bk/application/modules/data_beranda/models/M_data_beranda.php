<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_beranda extends CI_Model {

	function tampil()
	{
		
	}

	function tampil_pelanggaran_siswa()
	{
		
	}

	function jum_jur(){
		$this->db->select('*')
		->from('data_jurusan');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jum_gur(){
		$this->db->select('*')
		->from('data_user');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jum_sis(){
		$this->db->select('*')
		->from('data_siswa');
		$query = $this->db->get();
		return $query->num_rows();
	}

}