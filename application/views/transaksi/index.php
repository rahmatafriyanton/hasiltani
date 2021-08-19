<?php $this->load->view('layout/header'); ?>

<section id="page-title" class="page-title-pattern">

  <div class="container clearfix">
    <h1>Transaksi Saya</h1>
    <span>Semua riwayat pembelian kamu ada di sini.</span>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Riwayat Transaksi</li>
    </ol>
  </div>

</section>
<?php $chart = isi_chart(); ?>
<section id="content">
  <div class="content-wrap pt-5">
    <div class="container">

      <table class="table table-bordered">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Kode Transaksi</th>
            <th>Nama Toko</th>
            <th>Total</th>
            <th>Tanggal</th>
            <th>Status Transaksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;foreach ($transaksi as $row): ?>
            <tr>
              <td><?= $no ?></td>
              <td><a href=""><?= $row['transaksi_id'] ?></a></td>
              <td><?= $row['nama_toko'] ?></td>
              <td><?= idr_format($row['total']) ?></td>
              <td><?= tanggal($row['created_date']) ?></td>
              <td><?= $row['status'] ?></td>
            </tr>
          <?php $no++;endforeach ?>
        </tbody>    

      </table>

    </div>
  </div>
</section>

<?php $this->load->view('layout/footer'); ?>

