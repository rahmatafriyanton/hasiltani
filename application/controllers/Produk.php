<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_produk', 'produk');
		$this->load->model('M_kategori', 'kategori');
	}

	public function index() {
		$data['title'] = 'Marketplace - HasilTani';
		$data['produk'] = $this->produk->list();
		$data['kategori'] = $this->kategori->get_list_kategori();
		$this->load->view('produk/index', $data);
	}

	public function detail() {
		$params['produk_id'] = $this->uri->segment(3);
		$produk = $this->produk->get_detail($params);
		$data['produk'] = $produk;
		$data['title'] = $produk['produk']['nama_produk'].' | HasilTani';
		$this->load->view('produk/detail', $data);
	}

	public function modal_produk() {
		$params['produk_id'] = $this->uri->segment(3);
		$data = $this->produk->get_detail($params);
		echo $this->load->view('produk/modal_produk', $data, TRUE);
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */