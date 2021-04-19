<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_laporan extends CI_Model {

	function tampil()
	{
		$this->db->select('*')

		->join('data_jurusan','data_jurusan.id_jurusan = riwayat_pelanggaran.id_jurusan')
		->join('data_kelas','data_kelas.id_kelas = riwayat_pelanggaran.id_kelas')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
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

	function tampil_riwayat($jurusan,$kelas)
	{
		$this->db->select('*')
		->join('data_kelas','data_kelas.id_kelas = riwayat_pelanggaran.id_kelas')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->like('data_siswa.id_kelas',$kelas)
		->like('data_siswa.id_jurusan',$jurusan);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}

	function jml_siswarpl()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->where('id_jurusan',"1");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatkj()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->where('id_jurusan',"2");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatpm()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->where('id_jurusan',"3");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatitl()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->where('id_jurusan',"4");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatipk()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->where('id_jurusan',"5");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatb()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->where('id_jurusan',"6");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatkr()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->where('id_jurusan',"7");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_siswa($cari)
	{
	$this->db->select('*')
		->join('data_jurusan','data_jurusan.id_jurusan = riwayat_pelanggaran.id_jurusan')
		->join('data_kelas','data_kelas.id_kelas = riwayat_pelanggaran.id_kelas')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->like('nama_siswa',$cari);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}

	function filter_kel()
	{
		$this->db->select('*')
		->from('data_kelas');
		$query = $this->db->get();
		return $query->result();
	}

	function filter_tanggal($awal,$akhir)
	{
		return $this->db->from('riwayat_pelanggaran')
		->order_by("tanggal_pelanggaran","asc")
		->where("tanggal_pelanggaran BETWEEN '$awal' AND '$akhir'")
		->get()
		->result();
	}

}