<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_treatment_guru extends CI_Model {

	
	function tampil($limit, $start)
	{
		
		$query = $this->db->get('data_treatment', $limit, $start);
		return $query->result();
	}
	function get_treatment($limit, $start, $st = NULL)
	{
		
		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->like('nama_treatment',$st);
		$query = $this->db->get('data_treatment',$limit, $start);
		return $query->result();
	}

	function get_treatment_count($st = NULL)
	{

		if ($st == "NIL") $st = "";
		$this->db->select('*')
		->like('nama_treatment',$st);
		$query = $this->db->get('data_treatment');
		return $query->num_rows();
	}


	function tambah()
	{
		$nama_treatment	= $this->input->post('nama_treatment');

				$data = array(
					'nama_treatment' 	=> $nama_treatment,
					
					
				);
				$this->db->insert('data_treatment', $data);	 
		

	}

	function edit()
	{
		$id_treatment 			= $this->input->post('id_treatment');
		$nama_treatment			= $this->input->post('nama_treatment');
		$point					= $this->input->post('point');
            
				$data = array(
					'nama_treatment'	=> $nama_treatment,
					'point'				=> $point,
				);
				$this->db->where('id_treatment',$id_treatment)->update('data_treatment', $data);
			
			}	 

	function hapus($id)
	{
		$this->db->where('id_treatment', $id)->delete('data_treatment');
	}

	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_treatment',$cari)->get('data_treatment')->result();
	}
	// model import
public function importData($data) 
	{
  
            $res = $this->db->insert_batch('data_treatment',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
      
        }
}
