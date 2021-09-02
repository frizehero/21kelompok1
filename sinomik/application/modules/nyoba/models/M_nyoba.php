<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nyoba extends CI_Model {

	
	function tampil($datasiswa)
	{
		$this->db->select('*')
		->from('data_siswa')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->where('id_siswa',$datasiswa);
		$query = $this->db->get();
		return $query->result();
	}

	function oke($id)
	{
		$this->db->select('*')
		->from('data_user')
		->join('data_siswa','data_siswa.id_siswa = data_user.id_siswa')
		->where('id_user',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function count_jpelanggaran($datasiswa)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran')
		->where('riwayat_pelanggaran.id_siswa',$datasiswa);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}

	function count_jpelanggaran_kerapian($datasiswa)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian')
		->where('riwayat_pelanggaran.id_siswa',$datasiswa);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}

	function count_jpelanggaran_berat($datasiswa)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat')
		->where('riwayat_pelanggaran.id_siswa',$datasiswa);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}

		function count_jtreatment($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_treatment','data_treatment.id_treatment = riwayat_treatment.id_treatment')
		->where('riwayat_treatment.id_siswa',$id);
		$query = $this->db->get('riwayat_treatment');
		return $query->num_rows();
	}

	function jumlahpelanggaran1($datasiswa)
	{
		
		$query = $this->db->select_sum("data_pelanggaran.point")
		->from("data_pelanggaran")
		->join("riwayat_pelanggaran","data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran","left") 
		->where("riwayat_pelanggaran.id_siswa",$datasiswa);
		$query = $this->db->get();
		return $query->row_array();
	}

	function jumlahpelanggaran2($datasiswa)
	{
		
		$query = $this->db->select_sum("data_pelanggaran_berat.point")
		->from("data_pelanggaran_berat")
		->join("riwayat_pelanggaran","data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat","left") 
		->where("riwayat_pelanggaran.id_siswa",$datasiswa);
		$query = $this->db->get();
		return $query->row_array();
	}

	function jumlahpelanggaran3($datasiswa)
	{
		
		$query = $this->db->select_sum("data_pelanggaran_kerapian.point")
		->from("data_pelanggaran_kerapian")
		->join("riwayat_pelanggaran","data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian","left") 
		->where("riwayat_pelanggaran.id_siswa",$datasiswa);
		$query = $this->db->get();
		return $query->row_array();
	}



	function jumlahpointprestasi($datasiswa)
	{
		
		$query = $this->db->select_sum("data_prestasi.point")
		->from("data_prestasi")
		->join("riwayat_treatment","data_prestasi.id_prestasi = riwayat_treatment.id_prestasi","left")
		->where("riwayat_treatment.id_siswa",$datasiswa);
		$query = $this->db->get();
		return $query->row_array();
	}

	function tampilriwayat_pelanggaran($datasiswa)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_guru','data_guru.id_guru = riwayat_pelanggaran.id_guru')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran')
		->where('riwayat_pelanggaran.id_siswa',$datasiswa);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}

	function tampilriwayat_pelanggaran_kerapian($datasiswa)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_guru','data_guru.id_guru = riwayat_pelanggaran.id_guru')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian')
		->where('riwayat_pelanggaran.id_siswa',$datasiswa);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}

	function tampilriwayat_pelanggaran_berat($datasiswa)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_guru','data_guru.id_guru = riwayat_pelanggaran.id_guru')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat')
		->where('riwayat_pelanggaran.id_siswa',$datasiswa);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}

	function tampilriwayat_treatment($datasiswa)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_guru','data_guru.id_guru = riwayat_treatment.id_guru')
		->join('data_treatment','data_treatment.id_treatment = riwayat_treatment.id_treatment')
		->where('riwayat_treatment.id_siswa',$datasiswa);
		$query = $this->db->get('riwayat_treatment');
		return $query->result();
	}

	function tampilriwayat_prestasi($datasiswa)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_prestasi','data_prestasi.id_prestasi = riwayat_treatment.id_prestasi')
		->join('data_guru','data_guru.id_guru = riwayat_treatment.id_guru')
		->where('riwayat_treatment.id_siswa',$datasiswa);
		$query = $this->db->get('riwayat_treatment');
		return $query->result();
	}


}