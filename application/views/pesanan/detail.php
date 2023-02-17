<div class="single-product shop-quick-view-ajax">
  <div class="ajax-modal-title p-3 pb-0">
    <h3>Detail Transaksi</h3>
  </div>
  <div class="product modal-padding p-3">
    <h4 class="mb-3 pb-0">Informasi Transaksi</h4>
    <table class="table table-bordered table-light">
      <tr>
        <th width="25%">Nomor Transaksi</th>
        <td> : <?= $transaksi['transaksi_id'] ?></td>
      </tr>
      <tr>
        <th width="25%">Total</th>
        <td> : <?= idr_format($transaksi['total']) ?></td>
      </tr>
      <tr>
        <th width="25%">Tanggal</th>
        <td> : <?= tanggal($transaksi['created_date']) ?></td>
      </tr>
      <tr>
        <th width="25%">Update Terakhir</th>
        <td> : <?= tanggal($transaksi['last_updated']) ?></td>
      </tr>
      <tr>
        <th width="25%">Status Pembayaran</th>
        <td> : <?php 
        if ($transaksi['status'] == 'settlement') {
          echo "<span class='badge bg-success'>Dibayar</span>";
        } else if ($transaksi['status'] == 'expire') {
          echo "<span class='badge bg-danger'>Kadaluarsa</span>";
        } else if ($transaksi['status'] == 'pending'){
          echo "<span class='badge bg-info'>Menunggu Pembayaran</span>";
        } else {
          echo "<span class='badge bg-default'>{$transaksi['status']}</span>";
        };
      ?></td>
    </tr>

  </table>

  <hr>
  <h4 class="mb-3 pb-0">Informasi Pengiriman</h4>
  <table class="table table-bordered table-light">
    <tr>
      <th width="25%">Penerima</th>
      <td> : <?= $transaksi['nama_toko'] ?></td>
    </tr>
    <tr>
      <th width="25%">Telepon</th>
      <td> : <?= $transaksi['telepon'] ?></td>
    </tr>
    <tr>
      <th width="25%">Alamat</th>
      <td> : <?= $transaksi['alamat'] ?></td>
    </tr>
    <tr>
      <th width="25%">Status Pengiriman</th>
      <td> : <?php if ($transaksi['status_pengiriman'] == '' && $transaksi['status'] == 'settlement'): ?>
      Menunggu Pengiriman
    <?php else: ?>
      <?= $transaksi['status_pengiriman'] ?>
      <?php endif ?></td>
    </tr>
    <tr>
      <th width="25%">Jasa Kirim</th>
      <td> : <?= $transaksi['jasa_kirim'] ?></td>
    </tr>
     <tr>
      <th width="25%">Nomor Resi</th>
      <td> : <?= $transaksi['no_resi'] ?></td>
    </tr>
  </table>

  <hr>
  <h4 class="mb-3 pb-0">Detail Pesanan</h4>
  <table class="table table-bordered table-hover">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;foreach ($detail as $row): ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $row['nama_produk'] ?></td>
          <td>x <?= $row['jumlah'] ?></td>
          <td><?= $row['total'] ?></td>
        </tr>
      <?php $no++;endforeach ?>
    </tbody>
  </table>  
  </div>
</div>