<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_register', 'register');
	}

	public function index() {
		$data['title'] = 'Register | HasilTani';
		$this->load->view('register/index.php', $data);
	}

	public function process_register() {
		$data = array('success' => false, 'message' => array());
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email|callback_cek_email');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|trim|callback_cek_username|min_length[6]|max_length[16]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['message'][$key] = form_error($key);
			}
		} else {
			$params = $this->input->post();
			$params['password'] = md5(sha1($params['password']));
			$this->register->process_register($params);
			daftarkan_session($params['username']);
			$this->akun_chat();
			$data['redirect'] = base_url();
			$data['success'] = true;
		}
		echo json_encode($data);
	}

	private function akun_chat() {
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://api-us.cometchat.io/v2.0/users",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "{\"uid\":\"{$this->session->userdata('username')}\",\"name\":\"{$this->session->userdata('nama_lengkap')}\"}",
			CURLOPT_HTTPHEADER => [
				"Accept: application/json",
				"Content-Type: application/json",
				"apiKey: 43f5f272368deee7d3d308b53f78d72bde0d57a9",
				"appId: 1923460f9a6469cc"
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			return true;
		}
	}

	public function cek_email($email) {
		if ($email != '') {
			$cek = $this->register->cek_akun(['user_email' => $email]);
			if ($cek) {
				return true;
			} else {
				$this->form_validation->set_message('cek_email', 'Email sudah digunakan');
				return false;
			}
		}
	}

	public function cek_username($username) {
		if ($username != '') {
			$cek = $this->register->cek_akun(['username' => $username]);
			if ($cek) {
				return true;
			} else {
				$this->form_validation->set_message('cek_username', 'Username sudah digunakan');
				return false;
			}
		}
	}

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */