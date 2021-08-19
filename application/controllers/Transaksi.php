<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_transaksi', 'transaksi');
	}

	public function index() {
		$data['title'] = 'Keranjang Saya - HasilTani';
		$data['transaksi'] = $this->transaksi->get_list_transaksi();
		$this->load->view('transaksi/index', $data);
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */