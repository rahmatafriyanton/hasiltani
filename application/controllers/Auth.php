<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index() {
		$this->load->view('auth/login');
	}

	public function masuk(){
		$data = array('success' => false, 'message' => array());
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|trim|callback_cek_username|min_length[6]|max_length[16]');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_cek_password');
		$this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['message'][$key] = form_error($key);
			}
		} else {
			daftarkan_session($this->input->post('username'));
			$data['success'] = True;
			$data['redirect'] = base_url('Home');
		}
		echo json_encode($data);
	}


	public function cek_username($username) {
		if ($username != '') {
			return $this->M_auth->cek_ketersediaan_akun($username);
		}
	}

	public function cek_password($password) {
		$username = $this->input->post('username');
		if ($this->cek_username($username)) {
			return $this->M_auth->cek_password($username, $password);
		}
	}

	public function keluar() {
		$this->session->sess_destroy();
		delete_cookie(md5('gemastik'));
		redirect('auth');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */