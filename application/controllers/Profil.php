<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_user', 'user');
	}

	public function index() {
		if ($this->uri->segment(3) != '') {
			$user_id = $this->uri->segment(3);
		} else {
			$user_id = $this->session->userdata('user_id');
		}
		$data['user'] = $this->user->get_profil($user_id);

		if ($data['user']) {
			$data['title'] = $data['user']['nama_lengkap'].' - HasilTani';
			$data['content'] = 'profil/index';
			$this->load->view('profil/index', $data);
		} else {
			echo 'data tidak ditemukan';
		}
	}

	public function edit() {
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->user->get_profil($user_id);
		if ($data['user']) {
			$data['title'] = 'Edit Profil '.$data['user']['nama_lengkap'].' - HasilTani';
			$data['content'] = 'profil/index';
			$this->load->view('profil/edit', $data);
		} else {
			echo 'data tidak ditemukan';
		}
	}

	public function edit_process() {
		$data = array('success' => false, 'message' => array());
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('user_telepon', 'Telepon', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');

		$this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['message'][$key] = form_error($key);
			}
		} else {
			$params = $this->input->post();
			if ($params['password'] != '') {
				$params['password'] = md5(sha1($params['password']));
			} else {
				unset($params['password']);
			}
			$this->user->update_profil($params);
			daftarkan_session($this->session->userdata('username'));
			$data['success'] = true;
			$data['redirect'] = base_url('Profil');
		}

		echo json_encode($data);
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */