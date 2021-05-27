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

	function jum_kel(){
		$this->db->select('*')
		->from('data_kelas');
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



	function jml_siswarpl()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->where('data_siswa.id_jurusan',"1")
		->like("riwayat_pelanggaran.create_at", date('y-m-d'))
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}

	function jml_siswatkj()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->where('data_siswa.id_jurusan',"2")
		->like("riwayat_pelanggaran.create_at", date('y-m-d'))
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}

	function jml_siswatpm()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->where('data_siswa.id_jurusan',"3")
		->like("riwayat_pelanggaran.create_at", date('y-m-d'))
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}
	function jml_siswatitl()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->where('data_siswa.id_jurusan',"4")
		->like("riwayat_pelanggaran.create_at", date('y-m-d'))
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}
	function jml_siswatipk()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->where('data_siswa.id_jurusan',"5")
		->like("riwayat_pelanggaran.create_at", date('y-m-d'))
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}
	function jml_siswatb()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->where('data_siswa.id_jurusan',"6")
		->like("riwayat_pelanggaran.create_at", date('y-m-d'))
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}
	function jml_siswatkr()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_pelanggaran.id_siswa')
		->join('data_pelanggaran','data_pelanggaran.id_pelanggaran = riwayat_pelanggaran.id_pelanggaran','left')
		->join('data_pelanggaran_kerapian','data_pelanggaran_kerapian.id_pelanggaran_kerapian = riwayat_pelanggaran.id_pelanggaran_kerapian','left')
		->join('data_pelanggaran_berat','data_pelanggaran_berat.id_pelanggaran_berat = riwayat_pelanggaran.id_pelanggaran_berat','left')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->where('data_siswa.id_jurusan',"7")
		->like("riwayat_pelanggaran.create_at", date('y-m-d'))
		->order_by("riwayat_pelanggaran.create_at", "DESC");
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
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



	function cari_treatmentsiswa($limit, $start, $st = NULL)
	{
		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like('data_siswa.nama_siswa',$st)
		->like("riwayat_treatment.create_at", date('y-m-d'));
		$query = $this->db->get('riwayat_treatment',$limit, $start);
		return $query->result();
	}


	function get_cari_count($st = NULL)
	{
		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like('data_siswa.nama_siswa',$st)
		->like("riwayat_treatment.create_at", date('y-m-d'));
		$query = $this->db->get('riwayat_treatment');
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
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
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
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
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
		$this->db->group_by('riwayat_pelanggaran.id_siswa');
		$query = $this->db->get('riwayat_pelanggaran');
		return $query->num_rows();
	}


	function treatmentsiswa()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like("riwayat_treatment.create_at", date('y-m-d'))
		->order_by("riwayat_treatment.create_at", "DESC");
		$this->db->group_by('riwayat_treatment.id_siswa');
		$query = $this->db->get('riwayat_treatment');
		return $query->result();
	}

	function tampil_treatmentsiswa($limit, $start)
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like("riwayat_treatment.create_at", date('y-m-d'))
		->order_by("riwayat_treatment.create_at", "DESC");
		$this->db->group_by('riwayat_treatment.id_siswa');
		$query = $this->db->get('riwayat_treatment',$limit, $start);
		return $query->result();
	}

	function count_treatmentsiswa()
	{
		$this->db->select('*')
		->join('data_siswa','data_siswa.id_siswa = riwayat_treatment.id_siswa')
		->join('data_kelas','data_kelas.id_kelas = data_siswa.id_kelas','left')
		->join('data_jurusan','data_jurusan.id_jurusan = data_siswa.id_jurusan','left')
		->like("riwayat_treatment.create_at", date('y-m-d'))
		->order_by("riwayat_treatment.create_at", "DESC");
		$this->db->group_by('riwayat_treatment.id_siswa');
		$query = $this->db->get('riwayat_treatment');
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

	function chartsenin()
	{
		$query = $this->db->query("SELECT * FROM riwayat_pelanggaran WHERE WEEKDAY(CONCAT(tanggal_pelanggaran)) BETWEEN 0 AND 0 AND WEEK(CONCAT(tanggal_pelanggaran)) = WEEK(now()) GROUP BY id_siswa");

		return $query->num_rows();
	}

	function chartselasa()
	{
		$query = $this->db->query("SELECT * FROM riwayat_pelanggaran WHERE WEEKDAY(CONCAT(tanggal_pelanggaran)) BETWEEN 1 AND 1 AND WEEK(CONCAT(tanggal_pelanggaran)) = WEEK(now()) GROUP BY id_siswa");
		return $query->num_rows();
	}

	function chartrabu()
	{
		$query = $this->db->query("SELECT * FROM riwayat_pelanggaran WHERE WEEKDAY(CONCAT(tanggal_pelanggaran)) BETWEEN 2 AND 2 AND WEEK(CONCAT(tanggal_pelanggaran)) = WEEK(now()) GROUP BY id_siswa");
		return $query->num_rows();
	}

	function chartkamis()
	{
		$query = $this->db->query("SELECT * FROM riwayat_pelanggaran WHERE WEEKDAY(CONCAT(tanggal_pelanggaran)) BETWEEN 3 AND 3 AND WEEK(CONCAT(tanggal_pelanggaran)) = WEEK(now()) GROUP BY id_siswa");
		return $query->num_rows();
	}

	function chartjumat()
	{
		$query = $this->db->query("SELECT * FROM riwayat_pelanggaran WHERE WEEKDAY(CONCAT(tanggal_pelanggaran)) BETWEEN 4 AND 4 AND WEEK(CONCAT(tanggal_pelanggaran)) = WEEK(now()) GROUP BY id_siswa");
		return $query->num_rows();
	}

	function chartsabtu()
	{
		$query = $this->db->query("SELECT * FROM riwayat_pelanggaran WHERE WEEKDAY(CONCAT(tanggal_pelanggaran)) BETWEEN 5 AND 5 AND WEEK(CONCAT(tanggal_pelanggaran)) = WEEK(now()) GROUP BY id_siswa");
		return $query->num_rows();
	}

}