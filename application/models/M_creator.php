<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_creator extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table  = "artikel";
	}

	public function get_detail($params){
		$this->db->where($params);
		$data = $this->db->get($this->table);
		if ($data->num_rows() >= 1) {
			return $data->row_array();
		} else {
			return false;
		}
	}

	public function delete_thumbnail($params){
		$data = $this->get_detail($params);
		if ($data != false) {
			@unlink('assets/img/blog/'.$data['thumbnail_artikel']);
			return true;
		} else {
			return false;
		}
	}

	// CRUD
	// Insert Data
	public function add_artikel($params) {
		$this->db->insert('artikel', $params);
		return true;
	}

	// Delete Data
	public function delete($params) {
		$delete_thumbnail = $this->delete_thumbnail($params);
		if ($delete_thumbnail != false) {
			$this->db->where($params);
			$this->db->delete('artikel');
			return true;
		} else {
			return false;
		}
	}

	// Update Data
	public function update_artikel($params) {
		$this->db->where('artikel_id', $params['artikel_id']);
		$this->db->update($this->table, $params);

		return true;
	}
	// END CRUD

	// DATATABLES
	public function get_serverside($params) {
		$params['column_order']     = [null, null, 'nama_kategori', 'judul', 'tags', 'created_at', 'jumlah_dibaca', null];
		$params['column_search']    = [null, null, 'nama_kategori', 'judul', 'tags'];
		$params['order']            = ['artikel_id' => 'asc'];

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('is_publish', 1);

		if (isset($params['artikel_id'])) {
			$this->db->where('artikel_id', $params['artikel_id'], 'thumbnail_artikel');
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
		$this->db->select('artikel_id');
		$this->db->from($this->table);
		$this->db->where('is_publish', 1);

		if (!isset($params['offset'])) {
			$params['offset'] = '0';
		}
		return $this->db->get()->num_rows();
	}

	public function total_filtered($params) {
		$params['column_order']     = [null, null, 'nama_kategori', 'judul', 'tags', 'created_at', 'jumlah_dibaca', null];
		$params['column_search']    = [null, null, 'nama_kategori', 'judul', 'tags'];
		$params['order']            = ['artikel_id' => 'asc'];

		$this->db->select('artikel_id');
		$this->db->from($this->table);
		$this->db->where('is_publish', 1);

		if (isset($params['artikel_id'])) {
			$this->db->where('artikel_id', $params['artikel_id']);
		}
		if (!isset($params['offset'])) {
			$params['offset'] = '0';
		}

		$this->dataTables($params);

		return $this->db->get()->num_rows();
	}
	// END DATATABLES

}

/* End of file M_creator.php */
/* Location: ./application/models/M_creator.php */