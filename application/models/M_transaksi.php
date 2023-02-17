<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function get_list_transaksi() {
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->get('transaksi')->result_array();
	}

	public function update_status_transaksi($params) {
		$this->db->where('kode_transaksi', $params->order_id);
		return $this->db->update('transaksi', ['status' => $params->transaction_status]);
	}

	public function get_list_tagihan() {
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->group_by('kode_transaksi');
		return $this->db->get('transaksi')->result_array();
	}

	private function get_saldo_seller($params) {
		$this->db->select('users.saldo_seller');
		$this->db->join('users', 'users.user_id = transaksi.toko_id', 'left');
		$this->db->where('transaksi.transaksi_id', $params['transaksi_id']);

		return $this->db->get('transaksi')->row_array()['saldo_seller'];
	}

	public function update_transaksi($params) {
		$this->db->where('transaksi_id', $params['transaksi_id']);
		return $this->db->update('transaksi', $params);
	}

	public function update_saldo_seller($params) {
		$data['saldo_seller'] = $this->get_saldo_seller($params) + $params['total'];
		$this->db->where('user_id', $params['toko_id']);
		return $this->db->update('users', $data);
	}

}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */