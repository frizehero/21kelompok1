<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_master_userid extends CI_Model {

	public function __construct(){
		parent::__construct();
    }

	// for checking credential
	function getCredential($varUser, $varPassword)
	{

		$this->db->select('*')
				 ->from('data_user')
				 ->where('username',$varUser,'password',$varPassword,'level' AND 'id_user');

		$query = $this->db->get();
		return $query->row();


		// $getField = array('username' => $varUser, 'password' => $varPassword);

		// $query = $this->db->get_where('tb_login', $getField);

		// return $query->row();
	}

	function cekAdmin()
	{
		return $query = $this->db->select('*')->from('tb_login')->get()->num_rows();
	}

}
?>
