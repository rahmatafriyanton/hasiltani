<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_checkout', 'checkout');
	}

	public function index() {
		$data['title'] = 'Checkout - HasilTani';
		$this->load->view('checkout/index', $data);
	}

	public function buat_pesanan() {
		$this->checkout->buat_pesanan();
		$data['success'] = true;
		$data['redirect'] = base_url('Transaksi');
		echo json_encode($data);
	}

}

/* End of file Checkout.php */
/* Location: ./application/controllers/Checkout.php */