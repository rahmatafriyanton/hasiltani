<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_checkout', 'checkout');

		$params = array('server_key' => 'SB-Mid-server-rtx2Lw8T7mCn54-EKca5HqCS', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
	}

	public function index() {
		$data['title'] = 'Checkout - HasilTani';
		$this->load->view('checkout/index', $data);
	}

	public function buat_pesanan() {

		$chart = isi_chart();
		// Required
		$transaction_details = array(
			'order_id' => date('Ymdhis'),
		  'gross_amount' => array_sum(array_column($chart, 'total')), // no decimal allowed for creditcard
		);
		$item_details= [];
		foreach ($chart as $key => $val) {
			$item['id'] = $val['produk_id']; 
			$item['price'] = $val['total'] / $val['jumlah']; 
			$item['quantity'] = $val['jumlah']; 
			$item['name'] = $val['nama_produk']; 

			$item_details[$key] = $item;
		}
		// Optional
		$customer_details = array(
			'first_name'    => $this->session->userdata('nama_lengkap'),
			'last_name'     => "",
			'email'         => $this->session->userdata('user_email'),
			'phone'         => $this->session->userdata('user_telepon'),
			'billing_address'  => $this->session->userdata('alamat'),
			'shipping_address' => $this->session->userdata('alamat')
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O",$time),
			'unit' => 'minute', 
			'duration'  => 120
		);

		$transaction_data = array(
			'transaction_details'=> $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function simpan() {
		// $result = json_decode($this->input->post('result_data'));
		// echo 'RESULT <br><pre>';
		// var_dump($result);
		// echo '</pre>' ;
		$this->checkout->buat_pesanan($this->input->post('result_data'));
		$this->session->set_flashdata('berhasil', 'Pesanan Berhasil Dibuat');
		redirect(base_url('Transaksi'));

	}

}

/* End of file Checkout.php */
/* Location: ./application/controllers/Checkout.php */