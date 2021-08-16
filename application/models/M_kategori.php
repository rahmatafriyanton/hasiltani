<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function get_list_kategori() {
		return $this->db->get('kategori')->result_array();
	}

}

/* End of file M_kategori.php */
/* Location: ./application/models/M_kategori.php */