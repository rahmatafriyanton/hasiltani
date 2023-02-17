<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creator extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_creator', 'artikel');
		$this->load->model('M_kategori', 'kategori');
	}

	public function index() {
		$data['title'] = 'Artikel Saya - HasilTani';
		$this->load->view('creator/index', $data);
	}

	// CRUD START HERE

	// ALL ABOUT INSERT DATA
	public function add() {
		$data['title'] = 'Tambah Artikel - HasilTani';
		$data['kategori'] = $this->kategori->get_list_kategori();
		$this->load->view('creator/add', $data);
	}

	public function add_process() {
		$data = array('status' => 205, 'message' => array());
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
		$this->form_validation->set_rules('tags', 'Tags', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		$this->form_validation->set_error_delimiters('<div class="invalid-feedback text-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['message'][$key] = form_error($key);
			}
		} else {
			$upload_thumb = $this->do_upload();
			if ($upload_thumb['success']) {
				$params = $this->input->post();
				$params['thumbnail_artikel'] = $upload_thumb['thumbnail_artikel'];
				$params['artikel_id'] = date('Ymdhis');
				if ($this->artikel->add_artikel($params)) {
					$data['status'] = 200;
					$data['redirect'] = base_url('Creator');
				}
			} else {
				$data['message']['userfile'] = '<div class="invalid-feedback text-danger">'.$upload_thumb['message'].'</div>';
				foreach ($_POST as $key => $value) {
					$data['message'][$key] = '';
				}
			}
		}
			
		echo json_encode($data);
	}
	// END INSERT DATA

	// DELETE DATA
	public function delete() {
		$data = array('status' => 205, 'message' => 'Data gagal dihapus');
		$params = [
			'artikel_id' 			 => $this->input->post('id')
		];
		if ($this->artikel->delete($params)) {
			$data['status'] = 200;
			$data['message'] = 'Data berhasil dihapus';
		}
		echo json_encode($data);
	}
	// END DELETE DATA

	// EDIT DATA
	public function edit() {
		$data['title'] = 'Edit Artikel';
		$data['kategori'] = $this->kategori->get_list_kategori();
		$data['detail'] = $this->artikel->get_detail(['artikel_id' => $this->uri->segment(3)]);
		$this->load->view('creator/edit', $data);
	}

	public function edit_process() {
		$data = array('status' => 205, 'message' => array());

		$this->form_validation->set_rules('artikel_id', 'Artikel ID', 'required');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
		$this->form_validation->set_rules('tags', 'Tags', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		$this->form_validation->set_error_delimiters('<div class="invalid-feedback text-danger">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['message'][$key] = form_error($key);
			}
		} else {
			$params = $this->input->post();
			if (!empty($_FILES['userfile']['name'])) {
				$upload_thumb = $this->do_upload();
				if ($upload_thumb['success']) {
					$this->artikel->delete_thumbnail(['artikel_id' => $params['artikel_id']]);
					$params['thumbnail_artikel'] = $upload_thumb['thumbnail_artikel'];
				} else {
					$data['message']['userfile'] = '<div class="invalid-feedback text-danger">'.$upload_thumb['message'].'</div>';
					foreach ($_POST as $key => $value) {
						$data['message'][$key] = '';
					}
				}
			}
			if ($this->artikel->update_artikel($params)) {
				$data['status'] = 200;
				$data['redirect'] = base_url('Creator');
			}
		}
		echo json_encode($data);
	}

	// CRUD END HERE

	// DATA TABLE HERE
	public function json() {
		$value = $this->_postvalue();
		$json = [
			'draw'              => $this->input->post('draw'),
			'recordsTotal'      => $value['data']['total_record'],
			'recordsFiltered'   => $value['data']['total_filtered']
		];

		$data = array();

		$i = $_POST['start'];
		foreach ($value['data']['result'] as $k => $v) {
			// $foto_artikel = $this->artikel->get_foto_artikel($v['artikel_id']);
			$i++;
			$row = array();
			$button = '<a href="'.base_url('Artikel/read/').$v['artikel_id'].'" class="btn btn-sm btn-primary detail"><i class="icon-zoom-in2"></i></a>
								 <a href="'.base_url('Creator/edit/').$v['artikel_id'].'" class="btn btn-sm btn-info text-white"><i class="icon-edit"></i></a>
								 <button class="btn btn-sm btn-danger delete " data-id="' . $v['artikel_id'] . '"><i class="icon-trash-alt"></i></button>';
			$row[] = $i;
			$row[] = "<a href='".base_url('Artikel/read/').$v['artikel_id']."'><img src='". base_url('assets/img/blog/').$v['thumbnail_artikel']."'></a>";
			$row[] = "<a href='".base_url('Artikel/read/').$v['artikel_id']."'>".$v['judul']."</a>";
			$row[] = $v['nama_kategori'];
			$row[] = $v['tags'];
			$row[] = $v['created_at'];
			$row[] = $v['jumlah_dibaca'];
			$row[] = $button;
			$data[] = $row;
		}

		$json['data'] = $data;

		echo json_encode($json);
	}

	public function _postvalue($paging = TRUE) {
		$params = [
			'offset'    => $this->input->post('start'),
			'limit'     => $this->input->post('length'),
			'search'    => $this->input->post('search')['value'],
		];

		if (!$paging) {
			unset($params['offset']);
			unset($params['limit']);
		}

		if ($_POST['order']['0']['column']) {
			$params['order_column'] = $_POST['order']['0']['column'] ? $_POST['order']['0']['column'] : '2';
		}

		if ($_POST['order']['0']['dir']) {
			$params['order_dir'] = $_POST['order']['0']['dir'] ? $_POST['order']['0']['dir'] : 'asc';
		}
		return $this->artikel->get_serverside($params);
	}

	public function _getvalue($paging = TRUE) {
		$params = [
			'offset'    => $this->input->get('start'),
			'limit'     => $this->input->get('length'),
			'search'    => $this->input->get('search')['value'],
		];

		if (!$paging) {
			unset($params['offset']);
			unset($params['limit']);
		}

		return $this->artikel->get_serverside($params);
	}
	// END DATA TABLE

	public function upload_gambar() {
		$upload = $this->do_upload();
		if ($upload != 'false') {
			echo base_url().'assets/img/blog/'.$upload['thumbnail_artikel'];
		}
	}

	public function hapus_gambar() {
		$src = $this->input->post('src');
		$nama_file = str_replace(base_url(), '', $src);
		$temp_name = explode("/", $nama_file);
		@unlink($nama_file);
		echo json_encode(['success' => true]);
	}

	public function do_upload() {
		$data = ['success' => false, 'message' => ''];
		$config['upload_path']          = 'assets/img/blog/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name']					= true;


		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('userfile')) {
			$data['message'] = $this->upload->display_errors();
		}
		else {
			$data['success'] = true;
			$data['thumbnail_artikel'] = $this->upload->data('file_name');
		}
		return $data;
	}


}

/* End of file Creator.php */
/* Location: ./application/controllers/Creator.php */