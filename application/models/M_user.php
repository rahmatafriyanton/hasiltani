<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function get_profil($user_id) {
		$user = $this->db->get_where('users', ['user_id' => $user_id]);
		if ($user->num_rows() >= 1) {
			return $user->row_array();
		} else {
			return false;
		}
	}

	public function update_profil($params) {
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->update('users', $params);
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */