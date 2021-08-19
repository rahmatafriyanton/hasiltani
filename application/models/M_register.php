<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model {

	public function cek_akun($params) {
		$this->db->where($params);
		$cek = $this->db->get('users')->num_rows();

		if ($cek >= 1) {
			return false;
		} else {
			return true;;
		}
	}

	public function process_register($params) {
		$this->db->insert('users', $params);
		return true;
	}

}

/* End of file M_register.php */
/* Location: ./application/models/M_register.php */