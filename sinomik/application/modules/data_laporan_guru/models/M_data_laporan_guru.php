<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_laporan_guru extends CI_Model {

	function tampil()
	{
		$this->db->select('*')
		// ->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		// ->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		// ->join('data_jurusan','data_jurusan.id_jurusan = riwayat_pelanggaran.id_jurusan')
		// ->join('data_kelas','data_kelas.id_kelas = riwayat_pelanggaran.id_kelas')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}

	function tampil_treatment()
	{
		$this->db->select('*')
		// ->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		// ->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		// ->join('data_jurusan','data_jurusan.id_jurusan = riwayat_pelanggaran.id_jurusan')
		->join('data_treatment','data_treatment.id_treatment = riwayat_treatment.id_treatment')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like("riwayat_treatment.create_at", date('y-m-d'))
		->order_by("riwayat_treatment.create_at", "DESC");
		$this->db->group_by('riwayat_treatment.id_siswa');
		$query = $this->db->get('riwayat_treatment');
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

	function tampil_riwayat($jurusan,$awal,$akhir)
	{
		$this->db->select('*')
		// ->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		// ->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		// ->where('riwayat_pelanggaran.id_siswa')
		->where('tanggal_pelanggaran >=',$awal) 
		->where('tanggal_pelanggaran <=',$akhir)
		->like('data_siswa.id_jurusan',$jurusan);
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
	}

	function jml_siswarpl()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->where('id_jurusan',"1");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatkj()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->where('id_jurusan',"2");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatpm()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->where('id_jurusan',"3");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatitl()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->where('id_jurusan',"4");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatipk()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->where('id_jurusan',"5");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatb()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->where('id_jurusan',"6");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatkr()
	{
		$this->db->select('*')
		->from('riwayat_pelanggaran')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->where('id_jurusan',"7");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_siswa($cari)
	{
	$this->db->select('*')
		// ->join('data_jurusan','data_jurusan.id_jurusan = riwayat_pelanggaran.id_jurusan')
		// ->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		// ->join('data_kelas','data_kelas.id_kelas = riwayat_pelanggaran.id_kelas')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->like('nama_siswa',$cari);
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->result();
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

	// function filter_kel()
	// {
	// 	$this->db->select('*')
	// 	->from('data_kelas');
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// function filter_tanggal($awal,$akhir)
	// {
	// 	$this->db->where('tanggal_pelanggaran >=',$awal); 
	// 	$this->db->where('tanggal_pelanggaran <=',$akhir);
	// 	return $this->db->get('riwayat_pelanggaran');

	// 	return $this->db->from('riwayat_pelanggaran')
	// 	->order_by("tanggal_pelanggaran","asc")
	// 	->where("tanggal_pelanggaran BETWEEN '$awal' AND '$akhir'")
	// 	->get()
	// 	->result();
	// }

	function jumlahpointprestasi($id)
	{
		
		$query = $this->db->select_sum("data_prestasi.point")
		->from("data_prestasi")
		->join("riwayat_treatment","data_prestasi.id_prestasi = riwayat_treatment.id_prestasi","left")
		->where("riwayat_treatment.id_siswa",$id);
		$query = $this->db->get();
		return $query->row_array();
	}

}