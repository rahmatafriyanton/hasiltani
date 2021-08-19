<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_chart extends CI_Model {

	public function get_chart($limit = NULL){
		$this->db->join('foto_produk', 'foto_produk.produk_id = chart.produk_id', 'left');
		$this->db->where('user_id', $this->session->userdata('user_id'));

		$this->db->group_by('chart.produk_id');

		return $this->db->get('chart', $limit)->result_array();
	}

	public function add_to_chart($params) {
		$cek = $this->cek_chart_duplikat($params);
		if ($cek == false) {
			return $this->db->insert('chart', $params);
		} else {
			$params['jumlah'] = $params['jumlah'] + $cek['jumlah'];
			$params['total'] = $params['total'] + $cek['total'];
			return $this->update_chart($params);
		}
		
	}

	public function update_chart($params){
		if (isset($params['produk_id'])) {
			$this->db->where('produk_id', $params['produk_id']);
		}

		if (isset($params['chart_id'])) {
			$this->db->where('chart_id', $params['chart_id']);
		}
		$this->db->where('user_id', $params['user_id']);
		
		return $this->db->update('chart', $params);
	}

	public function cek_chart_duplikat($params) {
		$this->db->where('user_id', $params['user_id']);
		$this->db->where('produk_id', $params['produk_id']);
		$cek = $this->db->get('chart');
		if ($cek->num_rows() >= 1) {
			return $cek->row_array();
		} else {
			return false;
		}
	}

}

/* End of file M_chart.php */
/* Location: ./application/models/M_chart.php */