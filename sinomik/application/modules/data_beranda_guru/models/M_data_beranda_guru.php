<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_beranda_guru extends CI_Model {

	function tampil()
	{
		
	}

	function tampil_pelanggaran_siswa()
	{
		
	}

	function jum_gur(){
		$this->db->select('*')
		->from('data_guru');
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
		->like("riwayat_pelanggaran.create_at", date('y-m-d'))
		->order_by("riwayat_pelanggaran.create_at", "DESC");
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

	function tampilpelanggaran($id)
	{
		$this->db->select('*')
		->from('data_pelanggaran');
		$query = $this->db->get();
		return $query->num_rows();
	}


		function carinisnama()
	{
		$cari 		= $this->input->post('cari');
		
		$this->db->select('*')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan')
		->join('data_agama','data_agama.id_agama = data_siswa.id_agama')
		->like('nama_siswa',$cari)
		->or_like('nis',$cari);
		$query = $this->db->get('data_siswa');
		return $query->result();
	}
	
	function pterbaru()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}

	function tterbaru()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_treatment','data_treatment.id_treatment = riwayat_treatment.id_treatment','left');
		$query = $this->db->get('riwayat_treatment');
		return $query->num_rows();
	}


	function jumlahpointprestasi($id)
	{
		
		$query = $this->db->select_sum("data_prestasi.point")
		->from("data_prestasi")
		->join("riwayat_treatment","data_prestasi.id_prestasi = riwayat_treatment.id_prestasi","left")
		->where("riwayat_treatment.id_siswa",$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function januari()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('DATE_FORMAT(tanggal_pelanggaran,"%m")',1)
		->like('DATE_FORMAT(tanggal_pelanggaran,"%y")',date('y'));
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();	
	}

	function februari()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('DATE_FORMAT(tanggal_pelanggaran,"%m")',2)
		->like('DATE_FORMAT(tanggal_pelanggaran,"%y")',date('y'));
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();	
	}


	function maret()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('DATE_FORMAT(tanggal_pelanggaran,"%m")',3)
		->like('DATE_FORMAT(tanggal_pelanggaran,"%y")',date('y'));
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();	
	}


	function april()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('DATE_FORMAT(tanggal_pelanggaran,"%m")',4)
		->like('DATE_FORMAT(tanggal_pelanggaran,"%y")',date('y'));
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();	
	}


	function mei()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('DATE_FORMAT(tanggal_pelanggaran,"%m")',5)
		->like('DATE_FORMAT(tanggal_pelanggaran,"%y")',date('y'));
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();	
	}


	function juni()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('DATE_FORMAT(tanggal_pelanggaran,"%m")',6)
		->like('DATE_FORMAT(tanggal_pelanggaran,"%y")',date('y'));
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();	
	}

	function juli()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('DATE_FORMAT(tanggal_pelanggaran,"%m")',7)
		->like('DATE_FORMAT(tanggal_pelanggaran,"%y")',date('y'));
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();	
	}


	function agustus()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('DATE_FORMAT(tanggal_pelanggaran,"%m")',8)
		->like('DATE_FORMAT(tanggal_pelanggaran,"%y")',date('y'));
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();	
	}

	function september()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('DATE_FORMAT(tanggal_pelanggaran,"%m")',9)
		->like('DATE_FORMAT(tanggal_pelanggaran,"%y")',date('y'));
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();	
	}

	function oktober()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('DATE_FORMAT(tanggal_pelanggaran,"%m")',10)
		->like('DATE_FORMAT(tanggal_pelanggaran,"%y")',date('y'));
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();	
	}


	function november()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('DATE_FORMAT(tanggal_pelanggaran,"%m")',11)
		->like('DATE_FORMAT(tanggal_pelanggaran,"%y")',date('y'));
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();	
	}

	function desember()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->where('DATE_FORMAT(tanggal_pelanggaran,"%m")',12)
		->like('DATE_FORMAT(tanggal_pelanggaran,"%y")',date('y'));
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();	
	}

	
}