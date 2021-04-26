<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_beranda extends CI_Model {

	function tampil()
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


	function carisiswa($nyari)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like('data_siswa.nama_siswa',$nyari)
		->like("riwayat_pelanggaran.create_at", date('y-m-d'));
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}



	function cari_pelanggaransiswa($limit, $start, $st = NULL)
	{
		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like('data_siswa.nama_siswa',$st);
		$query = $this->db->get('riwayat_pelanggaran',$limit, $start);
		return $query->result();
	}


	function get_cari_count($st = NULL)
	{
		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like('data_siswa.nama_siswa',$st);
		$query = $this->db->get('riwayat_pelanggaran');
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
		->like("riwayat_pelanggaran.create_at", date('y-m-d'))
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}

	function tampilpelanggar_hariini($limit, $start)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like("riwayat_pelanggaran.create_at", date('y-m-d'))
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$query = $this->db->get('riwayat_pelanggaran',$limit, $start);
		return $query->result();
	}

	function count_pelanggarhariini()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like("riwayat_pelanggaran.create_at", date('y-m-d'))
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}


	function pelanggaransiswa()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}

	function tampil_pelanggaransiswa($limit, $start)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$query = $this->db->get('riwayat_pelanggaran',$limit, $start);
		return $query->result();
	}

	function count_pelanggaransiswa()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->order_by("riwayat_pelanggaran.create_at", "DESC");
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

	function count_jpelanggaran($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}


	function count_jpelanggaran_kerapian($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}

	function count_jpelanggaran_berat($id)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat')
		->where('riwayat_pelanggaran.id_siswa',$id);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}

	function jumlahpelanggaran1($id)
	{
		
		$query = $this->db->select_sum("data_pelanggaran.point")
		->from("data_pelanggaran")
		->join("riwayat_pelanggaran","data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran","left") 
		->where("riwayat_pelanggaran.id_siswa",$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function jumlahpelanggaran2($id)
	{
		
		$query = $this->db->select_sum("data_pelanggaran_berat.point")
		->from("data_pelanggaran_berat")
		->join("riwayat_pelanggaran","data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat","left") 
		->where("riwayat_pelanggaran.id_siswa",$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function jumlahpelanggaran3($id)
	{
		
		$query = $this->db->select_sum("data_pelanggaran_kerapian.point")
		->from("data_pelanggaran_kerapian")
		->join("riwayat_pelanggaran","data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian","left") 
		->where("riwayat_pelanggaran.id_siswa",$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function jumlahpointtreatment($id)
	{
		
		$query = $this->db->select_sum("data_treatment.point")
		->from("data_treatment")
		->join("riwayat_treatment","data_treatment.id_treatment = riwayat_treatment.id_treatment","left") 
		->where("riwayat_treatment.id_siswa",$id);
		$query = $this->db->get();
		return $query->row_array();
	}

}