<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_jurusan extends CI_Model {

	function tampil()
	{
		$this->db->select('*')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama');
		$query = $this->db->get('data_siswa');
		return $query->result();

	}

	function filter_jur(){
		$this->db->select('*')
		->from('data_jurusan');
		$query = $this->db->get();
		return $query->result();


	}


	function filter_kel()
	{
		$this->db->select('*')
		->from('data_kelas');
		$query = $this->db->get();
		return $query->result();
	}

	function get_siswa($cari)
	{
		
		$this->db->select('*')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->like('nama_siswa',$cari);
		$query = $this->db->get('data_siswa');
		return $query->result();
	}


	function filter($kelas,$jurusan)
	{
		$this->db->select('*')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->like('data_siswa.id_kelas',$kelas)
		->like('data_siswa.id_jurusan',$jurusan);
		$query = $this->db->get('data_siswa');
		return $query->result();
	}


	function get_siswax()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_kelas',"1");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_siswaxi()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_kelas',"2");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_siswaxii()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_kelas',"3");
		$query = $this->db->get();
		return $query->num_rows();
	}

}