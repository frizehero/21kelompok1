<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_laporan extends CI_Model {

	function tampil()
	{
		return $this->load->view('V_data_laporan');
	}

}