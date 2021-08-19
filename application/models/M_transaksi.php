<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function get_list_transaksi() {
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->get('transaksi')->result_array();
	}

}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */