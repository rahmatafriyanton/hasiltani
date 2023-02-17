<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan extends CI_Model {

	public function get_list_pesanan() {
		return $this->db->get_where('transaksi', ['toko_id' => $this->session->userdata('user_id')])->result_array();
	}

	public function get_info($params) {
		return $this->db->get_where('transaksi', $params)->row_array();
	}

	public function get_detail($params) {
		return $this->db->get_where('detail_transaksi', $params)->result_array();
	}

	public function proses_pengiriman($params) {
		$this->db->where('transaksi_id', $params['transaksi_id']);
		return $this->db->update('transaksi', $params);
	}

}

/* End of file M_pesanan.php */
/* Location: ./application/models/M_pesanan.php */