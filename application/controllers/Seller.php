<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_produk', 'produk');
		$this->load->model('M_kategori', 'kategori');
	}

	public function index() {
		$data['title'] = 'Seller - HasilTani';
		$this->load->view('seller/index', $data);
	}

	public function add_produk() {
		$data['title'] = 'Tambah Produk - HasilTani';
		$data['kategori'] = $this->kategori->get_list_kategori();
		$this->load->view('seller/add_produk', $data);
	}

	public function add_process() {
		$data = array('status' => 205, 'message' => array());
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
		$this->form_validation->set_rules('tags', 'Tags', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|is_natural');
		$this->form_validation->set_rules('stok', 'Stok', 'required|is_natural');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|alpha');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		$this->form_validation->set_error_delimiters('<div class="invalid-feedback text-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['message'][$key] = form_error($key);
			}
		} else {
			$upload_foto_produk = $this->upload_files($_FILES['foto_produk']);
			if ($upload_foto_produk['success'] == true) {
				$params['produk'] = $this->input->post();
				$params['produk']['produk_id'] = date('Ymdhis');
				$params['foto_produk'] = $upload_foto_produk['images'];
				// print_r($params); die();
				if ($this->produk->add_process($params)) {
					$data['status'] = 200;
					$data['message'] = 'Data berhasil ditambah';
					$data['redirect'] = base_url('Seller');
				}
			} else {
				$data['message']['foto_produk'] = '<div class="invalid-feedback text-danger">'.$upload_foto_produk['error'].'</div>';
			}
		}
		
		echo json_encode($data);
	}

	public function edit_produk() {
		$data['title'] = 'Edit Produk - HasilTani';
		$id_produk = $this->uri->segment(3);
		$data['kategori'] = $this->kategori->get_list_kategori();
		$detail = $this->produk->get_serverside(['id' => $id_produk])['data']['result'];
		$detail = $detail ? $detail[0] : [];
		$data['produk'] = $detail;
		$data['foto_produk'] = $this->produk->get_foto_produk($id_produk);
		$this->load->view('seller/edit_produk', $data);
	}

	public function edit_process() {
		$data = array('status' => 205, 'message' => array());

		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
		$this->form_validation->set_rules('tags', 'Tags', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|is_natural');
		$this->form_validation->set_rules('stok', 'Stok', 'required|is_natural');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|alpha');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		$this->form_validation->set_error_delimiters('<div class="invalid-feedback text-danger">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			foreach ($_POST as $key => $value) {
				$data['message'][$key] = form_error($key);
			}
		} else {
			$params['produk'] = $this->input->post();
			if (!empty($_FILES['foto_produk']['name'][0])) {
				$upload_foto_produk = $this->upload_files($_FILES['foto_produk']);
				if ($upload_foto_produk['success'] == true) {
					$params['foto_produk'] = $upload_foto_produk['images'];
				} else {
					$data['message']['foto_produk'] = '<div class="invalid-feedback text-danger">'.$upload_foto_produk['error'].'</div>';
					echo json_encode($data);
					return false;
				}
			}

			if (isset($this->input->post('foto_produk_hapus')[0])) {
				if ($this->hapus_foto_produk($this->input->post('foto_produk_hapus'))) {
					unset($params['produk']['foto_produk_hapus']);
				}
			} 
			// $this->produk->update_process($params);
			if ($this->produk->update_process($params)) {
				$data['status']	= 200;
				$data['redirect'] = base_url('Seller');
			}
		}
		
		echo json_encode($data);
	}

	public function delete() {
		$params['produk_id'] = $this->input->post('id');
		$foto_produk = $this->produk->get_detail($params)['produk']['foto_produk'];
		$hapus_foto_produk = [];
		foreach ($foto_produk as $key => $value) {
			$hapus_foto_produk[$key] = $value['foto_produk'];
		}
		$this->hapus_foto_produk($hapus_foto_produk);
		$hapus = $this->produk->hapus_produk($params);
		if ($hapus) {
			return ['status' =>200];
		}
		
	}

	private function upload_files($files) {
		$data = array('success' => false, 'images' => array(), 'error' => '');
		$config = array(
			'upload_path'   => 'assets/img/produk/',
			'allowed_types' => 'jpg|gif|png',
			'overwrite'     => 1,
			'max_size'  		=> 10000                   
		);

		$this->load->library('upload', $config);

		$images = array();

		foreach ($files['name'] as $key => $image) {
			$_FILES['foto_produk[]']['name']= $files['name'][$key];
			$_FILES['foto_produk[]']['type']= $files['type'][$key];
			$_FILES['foto_produk[]']['tmp_name']= $files['tmp_name'][$key];
			$_FILES['foto_produk[]']['error']= $files['error'][$key];
			$_FILES['foto_produk[]']['size']= $files['size'][$key];
			$title = date('Ymdhis');
			$fileName = $title .'_'. ($key+1);

			$foto_produk[] = $fileName;

			$config['file_name'] = $fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto_produk[]')) {
				$data['images'][] = $this->upload->data()['file_name'];
			} else {
				// $this->hapus_tmp_foto_produk($data['images']);
				$data['images'] = array();
				$data['error'] =  $this->upload->display_errors();
				return $data;
			}
		}
		$data['success'] = true;
		return $data;
	}

	public function json() {
		$value = $this->_postvalue();
    // trace($value);
		$json = [
			'draw'              => $this->input->post('draw'),
			'recordsTotal'      => $value['data']['total_record'],
			'recordsFiltered'   => $value['data']['total_filtered']
		];

		$data = array();

		$i = $_POST['start'];
		foreach ($value['data']['result'] as $k => $v) {
			$foto_produk = $this->produk->get_foto_produk($v['produk_id']);
			$i++;
			$row = array();
			$button = '<button class="btn btn-sm btn-primary detail" data-id="' . $v['produk_id'] . '"><i class="icon-zoom-in2"></i></button>
								 <a href="'.base_url('seller/edit_produk/').$v['produk_id'].'" class="btn btn-sm btn-info text-white"><i class="icon-edit"></i></a>
								 <button class="btn btn-sm btn-danger delete " data-id="' . $v['produk_id'] . '"><i class="icon-trash-alt"></i></button>';
			$row[] = $i;
			$row[] = "<a href='".base_url('Produk/detail/').$v['produk_id']."'><img src='". base_url('assets/img/produk/').$foto_produk[0]['foto_produk']."'></a>";
			$row[] = "<a href='".base_url('Produk/detail/').$v['produk_id']."'>".$v['nama_produk']."</a>";
			$row[] = $v['nama_kategori'];
			$row[] = $v['harga'];
			$row[] = $v['jumlah_terjual'];
			$row[] = $v['stok'];
			$row[] = $button;
			$data[] = $row;
		}

		$json['data'] = $data;

		echo json_encode($json);
	}

	function _postvalue($paging = TRUE) {
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
		return $this->produk->get_serverside($params);
	}

	function _getvalue($paging = TRUE) {
		$params = [
			'offset'    => $this->input->get('start'),
			'limit'     => $this->input->get('length'),
			'search'    => $this->input->get('search')['value'],
		];

		if (!$paging) {
			unset($params['offset']);
			unset($params['limit']);
		}

		return $this->produk->get_serverside($params);
	}

	private function hapus_foto_produk($gambar) {
		foreach ($gambar as $key => $value) {
			@unlink('assets/img/produk/'.$value);
			$this->produk->hapus_foto_produk($value);
		}
		return true;
	}

	

}

/* End of file Seller.php */
/* Location: ./application/controllers/Seller.php */