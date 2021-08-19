<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_checkout extends CI_Model {

	public function buat_pesanan() {
		$chart = isi_chart();
		$transaksi_id = date('Ymdhis');
		$data['transaksi_id'] = $transaksi_id;
		$data['user_id'] = $this->session->userdata('user_id');
		$data['penerima']	= $this->session->userdata('nama_lengkap');
		$data['telepon'] = $this->session->userdata('user_telepon');
		$data['alamat'] = $this->session->userdata('alamat');
		$data['toko_id'] = $chart[0]['toko_id'];
		$data['nama_toko'] = $chart[0]['nama_toko'];		
		$data['status']	= 'Menunggu Pembayaran';

		$data['total'] = array_sum(array_column($chart, 'total'));
		// echo $data['total'];
		// die();

		$this->db->insert('transaksi', $data);
		$data = [];
		foreach ($chart as $row) {
			$data['transaksi_id'] = $transaksi_id;
			$data['produk_id'] = $row['produk_id'];
			$data['nama_produk'] = $row['nama_produk'];
			$data['jumlah'] = $row['jumlah'];
			$data['total'] = $row['total'];

			$this->db->insert('detail_transaksi', $data);
			$this->update_stok($data);
			$this->hapus_chart($row['chart_id']);
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