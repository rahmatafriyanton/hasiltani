<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_artikel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->table = 'artikel';
	}

	public function list() {
		return $this->db->get($this->table)->result_array();
	}

	public function get_detail($params) {
		$this->db->where($params);
		$data = $this->db->get($this->table);
		if ($data->num_rows() >= 1) {
			return $data->row_array();
		} else {
			return false;
		}
	}

}

/* End of file M_blog.php */
/* Location: ./application/models/M_blog.php */