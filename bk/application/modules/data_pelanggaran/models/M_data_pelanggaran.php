<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_pelanggaran extends CI_Model {

	function tampil()
	{
		return $this->db->get('data_pelanggaran')->result();
	}
	function tampil1()
	{
		return $this->db->get('data_pelanggaran_kerapian')->result();
	}
	function tampil2()
	{
		return $this->db->get('data_pelanggaran_berat')->result();
	}

	function tambah()
	{
		$nama_pelanggaran	= $this->input->post('nama_pelanggaran');
		$point			= $this->input->post('point');

				$data = array(
					'nama_pelanggaran' 	=> $nama_pelanggaran,
					'point'				=> $point,
					
					
				);
				$this->db->insert('data_pelanggaran', $data);	 
		

	}
	function tambah1()
	{
		$nama_pelanggaran_kerapian	= $this->input->post('nama_pelanggaran_kerapian');
		$point			= $this->input->post('point');

				$data = array(
					'nama_pelanggaran_kerapian' 	=> $nama_pelanggaran_kerapian,
					'point'				=> $point,
					
					
				);
				$this->db->insert('data_pelanggaran_kerapian', $data);	 
		

	}
	function tambah2()
	{
		$nama_pelanggaran_berat	= $this->input->post('nama_pelanggaran_berat');
		$point			= $this->input->post('point');

				$data = array(
					'nama_pelanggaran_berat' 	=> $nama_pelanggaran_berat,
					'point'				=> $point,
					
					
				);
				$this->db->insert('data_pelanggaran_berat', $data);	 
		

	}

	function edit()
	{
		$id_pelanggaran 			= $this->input->post('id_pelanggaran');
		$nama_pelanggaran			= $this->input->post('nama_pelanggaran');
		$point					= $this->input->post('point');


		
		
		
        
            
				$data = array(
					'nama_pelanggaran'	=> $nama_pelanggaran,
					'point'				=> $point,
				);
				$this->db->where('id_pelanggaran',$id_pelanggaran)->update('data_pelanggaran', $data);
			
			}
			function edit1()
	{
		$id_pelanggaran_kerapian 			= $this->input->post('id_pelanggaran_kerapian');
		$nama_pelanggaran_kerapian			= $this->input->post('nama_pelanggaran_kerapian');
		$point					= $this->input->post('point');


		
		
		
        
            
				$data = array(
					'nama_pelanggaran_kerapian'	=> $nama_pelanggaran_kerapian,
					'point'				=> $point,
				);
				$this->db->where('id_pelanggaran_kerapian',$id_pelanggaran_kerapian)->update('data_pelanggaran_kerapian', $data);
			
			}
			function edit2()
	{
		$id_pelanggaran_berat 			= $this->input->post('id_pelanggaran_berat');
		$nama_pelanggaran_berat			= $this->input->post('nama_pelanggaran_berat');
		$point					= $this->input->post('point');


		
		
		
        
            
				$data = array(
					'nama_pelanggaran_berat'	=> $nama_pelanggaran_berat,
					'point'				=> $point,
				);
				$this->db->where('id_pelanggaran_berat',$id_pelanggaran_berat)->update('data_pelanggaran_berat', $data);
			
			}	 

	function hapus($id)
	{
		$this->db->where('id_pelanggaran', $id)->delete('data_pelanggaran');
	}
	function hapus1($id)
	{
		$this->db->where('id_pelanggaran_kerapian', $id)->delete('data_pelanggaran_kerapian');
	}
	function hapus2($id)
	{
		$this->db->where('id_pelanggaran_berat', $id)->delete('data_pelanggaran_berat');
	}

	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_pelanggaran',$cari)->get('data_pelanggaran')->result();
	}
	function cari1()
	{
		$cari1 		= $this->input->post('cari1');
		return $this->db->like('nama_pelanggaran_kerapian',$cari1)->get('data_pelanggaran_kerapian')->result();
	}
	function cari2()
	{
		$cari2 		= $this->input->post('cari2');
		return $this->db->like('nama_pelanggaran_berat',$cari2)->get('data_pelanggaran_berat')->result();
	}
}