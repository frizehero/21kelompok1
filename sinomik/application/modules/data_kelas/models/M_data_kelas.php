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

	function jml_siswatkja()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"2");
		$query = $this->db->get();
		return $query->num_rows();
	}
	function jml_siswatkjb()
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
	function jml_siswatipka()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"5");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function jml_siswatipkb()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"6");
		$query = $this->db->get();
		return $query->num_rows();
	}
	function jml_siswatkra()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"7");
		$query = $this->db->get();
		return $query->num_rows();
	}
	function jml_siswatkrb()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"8");
		$query = $this->db->get();
		return $query->num_rows();
	}
	function jml_siswatkrc()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"9");
		$query = $this->db->get();
		return $query->num_rows();
	}
	function jml_siswatb()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"10");
		$query = $this->db->get();
		return $query->num_rows();
	}
	function jml_siswatpma()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"11");
		$query = $this->db->get();
		return $query->num_rows();
	}
	function jml_siswatpmb()
	{
		$this->db->select('*')
		->from('data_siswa')
		->where('id_jurusan',"12");
		$query = $this->db->get();
		return $query->num_rows();
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