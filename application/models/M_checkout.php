<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_checkout extends CI_Model {

	public function buat_pesanan($params) {
		$params = json_decode($params);
		// var_dump($params->va_numbers[0]);die();
		$chart = isi_chart();

		$temp_produk = array();
		foreach ($chart as $element) {
		  $temp_produk[$element['toko_id']][] = $element;
		}

		foreach ($temp_produk as $row) {
			$total = array_sum(array_column($row, 'total'));
			$data['transaksi_id'] 			= uniqid();
			$data['kode_transaksi'] 		= $params->order_id;
			$data['user_id'] 						= $this->session->userdata('user_id');
			$data['penerima']						= $this->session->userdata('nama_lengkap');
			$data['telepon'] 						= $this->session->userdata('user_telepon');
			$data['alamat'] 						= $this->session->userdata('alamat');
			$data['toko_id'] 						= $row[0]['toko_id'];
			$data['nama_toko'] 					= $row[0]['nama_toko'];
			$data['bank']								= $params->va_numbers[0]->bank;
			$data['nomor_akun']					= $params->va_numbers[0]->va_number;
			$data['status']							= $params->status_message;
			$data['total'] 							= $total;
			$this->db->insert('transaksi', $data);

			foreach ($row as $val) {
				$detail['transaksi_id']		= $data['transaksi_id'];
				$detail['kode_transaksi']	= $params->order_id;
				$detail['produk_id'] 			= $val['produk_id'];
				$detail['nama_produk'] 		= $val['nama_produk'];
				$detail['jumlah'] 				= $val['jumlah'];
				$detail['total'] 					= $val['total'];

				$this->db->insert('detail_transaksi', $detail);
				$this->update_stok($detail);
				$this->hapus_chart($val['chart_id']);
			}
			$data = [];
		}
		return true;
	}

	public function update_stok($params) {
		$produk = $this->db->get_where('produk', ['produk_id' => $params['produk_id']])->row_array();
		$data['stok'] = $produk['stok'] - $params['jumlah'];

		$this->db->where('produk_id', $params['produk_id']);
		return $this->db->update('produk', $data);
	}

	public function hapus_chart($chart_id) {
		$this->db->where('chart_id', $chart_id);
		return $this->db->delete('chart');
	}

}

/* End of file M_checkout.php */
/* Location: ./application/models/M_checkout.php */