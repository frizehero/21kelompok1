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

	function pelanggar_hariini()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like("riwayat_pelanggaran.create_at", date('y-m-d'));
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}

}