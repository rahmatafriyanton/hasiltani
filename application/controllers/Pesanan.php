<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_pesanan', 'pesanan');
	}

	public function index() {
		update_status_transaksi();
		$data['title'] = 'Pesanan Saya - HasilTani';
		$data['pesanan'] = $this->pesanan->get_list_pesanan();
		$this->load->view('pesanan/index', $data);
	}

	public function detail() {
		$params['transaksi_id'] = $this->uri->segment(3);
		$data['transaksi'] = $this->pesanan->get_info($params);
		$data['detail'] = $this->pesanan->get_detail($params);
		echo $this->load->view('pesanan/detail', $data, TRUE);
	}

	public function proses_pengiriman(){
		$data = array('success' => false, 'message' => array());
		$this->form_validation->set_rules('transaksi_id', 'ID Transaksi', 'required');
		$this->form_validation->set_rules('no_resi', 'no_resi', 'required');
		$this->form_validation->set_rules('jasa_kirim', 'jasa_kirim', 'required');
		$this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['message'][$key] = form_error($key);
			}
		} else {
			$params = $this->input->post();
			$params['last_updated'] = date('Y-m-d H-i-s');
			$params['status_pengiriman'] = 'Sedang Dikirim';
			$this->pesanan->proses_pengiriman($params);
			$data['success'] = true;
		}
		echo json_encode($data);
	}

}

/* End of file Pesanan.php */
/* Location: ./application/controllers/Pesanan.php */