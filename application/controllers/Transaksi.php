<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_transaksi', 'transaksi');
		$this->load->model('M_pesanan', 'pesanan');
	}

	public function index() {
		update_status_transaksi();
		$data['title'] = 'Keranjang Saya - HasilTani';
		$data['transaksi'] = $this->transaksi->get_list_transaksi();
		$this->load->view('transaksi/index', $data);
	}

	public function tagihan() {
		update_status_transaksi();
		$data['title'] = 'Keranjang Saya - HasilTani';
		$data['tagihan'] = $this->transaksi->get_list_tagihan();
		$this->load->view('transaksi/tagihan', $data);
	}

	public function terima_barang() {
		$data = array('success' => false, 'message' => array());
		$this->form_validation->set_rules('transaksi_id', 'ID Transaksi', 'required');
		$this->form_validation->set_rules('status_pengiriman', 'Status Pengiriman', 'required');
		$this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['message'][$key] = form_error($key);
			}
		} else {
			$params = $this->input->post();
			$params['last_updated'] = date('Y-m-d H:i:s');
			if ($params['status_pengiriman'] == 'Diterima') {
				$params['status'] = 'Selesai';
			}
			$this->transaksi->update_transaksi($params);
			$this->transaksi->update_saldo_seller($params);
			
			$data['success'] = true;
		}
		echo json_encode($data);
	}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */