<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_chart', 'chart');
	}

	public function index() {
		$data['title'] = 'Keranjang Saya - HasilTani';
		$this->load->view('chart/index', $data);
	}

	public function add_to_chart() {
		$params = $this->input->post();
		$params['user_id'] = $this->session->userdata('user_id');
		$this->chart->add_to_chart($params);
		echo json_encode(['success' => true]);
	}

	public function update_chart() {
		$params = $this->input->post();
		$params['user_id'] = $this->session->userdata('user_id');
		$this->chart->update_chart($params);
		echo json_encode(['success' => true]);
	}

}

/* End of file Chart.php */
/* Location: ./application/controllers/Chart.php */