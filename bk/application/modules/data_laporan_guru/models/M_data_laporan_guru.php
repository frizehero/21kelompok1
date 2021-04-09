<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_laporan_guru extends CI_Model {

	function tampil()
	{
	}

	function tampil_siswa()
	{
	}

	function jum_sis(){
		$this->db->select('*')
		->from('data_siswa');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function tampil_jur(){
		$this->db->select('*')
		->from('data_jurusan');
		$query = $this->db->get();
		return $query->result();
	}

	function jum_laki()
	{
		$this->db->select('*')
		->like('jenis_kelamin_siswa','Laki-Laki');
		$query = $this->db->get('data_siswa');
		return $query->num_rows();
	}


	function jum_perempuan()
	{
		$this->db->select('*')
		->like('jenis_kelamin_siswa','Perempuan');
		$query = $this->db->get('data_siswa');
		return $query->num_rows();
	}

}