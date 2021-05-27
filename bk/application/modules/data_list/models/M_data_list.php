<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_list extends CI_Model {

	function tampil()
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

	function tampil_treatment()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_treatment','data_treatment.id_treatment = riwayat_treatment.id_treatment')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like("riwayat_treatment.create_at", date('y-m-d'))
		->order_by("riwayat_treatment.create_at", "DESC");
		$query = $this->db->get('riwayat_treatment');
		return $query->result();
	}

}