<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskusi extends CI_Controller {

	public function index() {
		$data['title'] = 'Diskusi | HasilTani';
		$this->load->view('diskusi/index.php', $data);
	}

}

/* End of file Diskusi.php */
/* Location: ./application/controllers/Diskusi.php */