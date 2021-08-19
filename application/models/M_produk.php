<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table  = "produk";
	}

	public function add_process($params) {
		// var_dump($params['foto_produk']); die();
		$this->db->trans_begin();
		$params['produk']['user_id'] = $this->session->userdata('user_id');
		$params['produk']['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$this->db->insert('produk', $params['produk']);

		if ($this->db->trans_status() === true) {
			foreach($params['foto_produk'] as $key => $value) {
				$foto_produk['produk_id'] = $params['produk']['produk_id'];
				$foto_produk['foto_produk'] = $value;
				$this->db->insert('foto_produk', $foto_produk);
			}
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}

	public function update_process($params) {
		// var_dump($params['foto_produk']); die();
		$this->db->trans_begin();
		$this->db->where('produk_id', $params['produk']['produk_id']);
    $this->db->update($this->table, $params['produk']);

		if ($this->db->trans_status() === true) {
			if (isset($params['foto_produk'])) {
				foreach($params['foto_produk'] as $key => $value) {
					$foto_produk['produk_id'] = $params['produk']['produk_id'];
					$foto_produk['foto_produk'] = $value;
					$this->db->insert('foto_produk', $foto_produk);
				}
			}
			$this->db->trans_commit();
			return true;
		} else {
			$this->db->trans_rollback();
			return false;
		}
	}

	public function hapus_foto_produk($foto_produk) {
		$this->db->where('foto_produk', $foto_produk);
		return $this->db->delete('foto_produk');
	}

	public function hapus_produk($params) {
		$this->db->where($params);
		return $this->db->delete($this->table);
	}

	public function get_foto_produk($produk_id) {
		return $this->db->get_where('foto_produk', ['produk_id' => $produk_id])->result_array();
	}

	public function get_serverside($params) {
		$params['column_order']     = [null, null, 'nama_produk', 'nama_kategori', 'harga', 'jumlah_terjual', 'stok'];
		$params['column_search']    = [null, null, 'nama_produk', 'nama_kategori', 'harga', 'jumlah_terjual', 'stok'];
		$params['order']            = ['produk_id' => 'asc'];

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('is_active', 1);
		$this->db->where('user_id', $this->session->userdata('user_id'));

		if (isset($params['produk_id'])) {
			$this->db->where('produk_id', $params['produk_id']);
		}

		if (!isset($params['offset'])) {
			$params['offset'] = '0';
		}

		if (isset($params['limit']) && $params['limit'] > 0) {
			$this->db->limit($params['limit'], $params['offset']);
		}

		$this->dataTables($params);

		$sql = $this->db->get();
		$result = $sql->result_array();

		$res['status']  = '200';
		$res['message'] = 'Berhasil Mendapatkan data';
		$res['data']    = [
			'total_record'      => $this->total_record(),
			'total_filtered'    => $this->total_filtered($params),
			'result'            => $result
		];
		return $res;
	}

	private function dataTables($params) {
		$i = 0;
		if (isset($params['search']) && $params['search'] != null) {
			$this->db->group_start();
			foreach ($params['column_search'] as $key => $items) {
				if ($i == 0) {
					$this->db->like($items, $params['search']);
				} else {
					$this->db->or_like($items, $params['search']);
				}
				$i++;
			}
			$this->db->group_end();
		}
		
		if (!empty($params['search'])) {
			$this->db->group_start();
			foreach ($params['column_search'] as $item) {
				if ($i == 0) {
					$this->db->like($item, $params['search']);
				} else {
					$this->db->or_like($item, $params['search']);
				}
				$i++;
			}
			$this->db->group_end();
		}


		if (isset($params['order_column'])) {
			if ($params['order_column'] == 0) {
				$column_order_ui = 0;
			} else {
				$column_order_ui = $params['order_column'] - 2;
			}

			if (isset($params['order_column'])) {
				$this->db->order_by($params['column_order'][$column_order_ui], $params['order_dir']);
			} else {
				$this->db->order_by(key($params['order']), $params['order'][key($params['order'])]);
			}
		}
	

		if (isset($params['sort_column'])) {
			$this->db->order_by($params['column_order'][$column_ui], $params['sort_type']);
		} elseif (isset($params['order'])) {
			$this->db->order_by(key($params['order']), $params['order'][key($params['order'])]);
		}
	}

	public function total_record() {
		$this->db->select('produk_id');
		$this->db->from($this->table);
		$this->db->where('is_active', 1);
		$this->db->where('user_id', $this->session->userdata('user_id'));

		if (!isset($params['offset'])) {
			$params['offset'] = '0';
		}
		return $this->db->get()->num_rows();
	}

	public function total_filtered($params) {
		$params['column_order']     = [null, null, 'nama_produk', 'nama_kategori', 'harga', 'jumlah_terjual', 'stok'];
		$params['column_search']    = [null, null, 'nama_produk', 'nama_kategori', 'harga', 'jumlah_terjual', 'stok'];
		$params['order']            = ['produk_id' => 'asc'];

		$this->db->select('produk_id');
		$this->db->from($this->table);
		$this->db->where('is_active', 1);
		$this->db->where('user_id', $this->session->userdata('user_id'));

		if (isset($params['produk_id'])) {
			$this->db->where('produk_id', $params['produk_id']);
		}
		if (!isset($params['offset'])) {
			$params['offset'] = '0';
		}

		$this->dataTables($params);

		return $this->db->get()->num_rows();
	}


	// Produk Belanja
	public function list() {
		$produk = $this->db->get_where($this->table, ['user_id !=' => $this->session->userdata('user_id')])->result_array();
		$data['produk'] = $produk;
		foreach ($produk as $key => $value) {
			$foto_produk = $this->db->get_where('foto_produk', ['produk_id' => $value['produk_id']])->result_array();
			$data['produk'][$key]['foto_produk'] = $foto_produk;
		}
		return $data;
	}

	public function get_detail($params) {
		$produk = $this->db->get_where($this->table, $params)->row_array();
		$data['produk'] = $produk;
		$foto_produk = $this->db->get_where('foto_produk', ['produk_id' => $produk['produk_id']])->result_array();
		$data['produk']['foto_produk'] = $foto_produk;
		return $data;
	}


}

/* End of file M_produk.php */
/* Location: ./application/models/M_produk.php */