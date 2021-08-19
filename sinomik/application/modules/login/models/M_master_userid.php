<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_master_userid extends CI_Model {

	public function __construct(){
		parent::__construct();
    }

	// for checking credential
	function getCredential($varUser, $varPassword)
	{

		// $this->db->select('*')
		// 		 ->from('data_user')
		// 		 ->join('data_guru','data_guru.id_guru = data_user.id_guru')
		// 		 ->where('username',$varUser,'password',$varPassword,'level' AND 'id_user');

		// $query = $this->db->get();
		// return $query->row();


		$getField = array('username' => $varUser, 'password' => $varPassword);

		$query = $this->db->get_where('data_user', $getField);

		return $query->row();
	}

	function cekAdmin()
	{
		return $query = $this->db->select('*')->from('data_user')->get()->num_rows();
	}

}
?>
