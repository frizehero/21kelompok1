<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_kelas extends CI_Model {

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


	function jml_siswarpl()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"1");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatkj()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"2");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatpm()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"3");
		$query = $this->db->get();
		return $query->num_rows();
	}
	function jml_siswatitl()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"4");
		$query = $this->db->get();
		return $query->num_rows();
	}
	function jml_siswatipk()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"5");
		$query = $this->db->get();
		return $query->num_rows();
	}
	function jml_siswatb()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"6");
		$query = $this->db->get();
		return $query->num_rows();
	}
	function jml_siswatkr()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"7");
		$query = $this->db->get();
		return $query->num_rows();
	}

}