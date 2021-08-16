<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function get_user($username) {
		$this->db->where('username', $username);
		$this->db->or_where('user_email', $username);
		return $this->db->get('users');
	}

	public function cek_ketersediaan_akun($username) {
		$this->db->where('username', $username);
		$this->db->or_where('user_email', $username);
		if ($this->db->get('users')->num_rows() >= 1) {
			return true;
		} else {
			$this->form_validation->set_message('cek_username', 'Username atau Email tidak ditemukan');
			return false;
		}
	}

	public function cek_password() {
		$username = $this->input->post('username');
		$password = md5(sha1($this->input->post('password')));
		// echo $password; die();
		$cek = $this->get_user($username)->row();
		if ($password != '') {
			if ($cek->password == $password) {
				return true;
			} else {
				$this->form_validation->set_message('cek_password', 'Username dan password tidak cocok');
				return false;
			}
		} else {
				$this->form_validation->set_message('cek_password', 'Bagian Password wajib diisi');
				return false;
		}
	}

	public function update_cookie($cookie, $user_id) {
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $cookie);
	}	

}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */