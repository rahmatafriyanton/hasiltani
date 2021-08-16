<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_artikel', 'artikel');
	}

	public function index() {
		$data['artikel'] = $this->artikel->list();
		$data['title'] = 'Artikel - HasilTani';
		$this->load->view('artikel/index', $data);
	}

	public function read() {
		$params['artikel_id'] = $this->uri->segment(3);
		$data['detail'] = $this->artikel->get_detail($params);
		$data['title'] = $data['detail']['judul'];
		if ($data['detail'] != false) {
			$this->load->view('artikel/read', $data);
		} else {
			$this->load->view('artikel/404');
		}
	}

}

/* End of file Artikel.php */
/* Location: ./application/controllers/Artikel.php */