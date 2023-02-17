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
      <table class="table table-bordered datatable">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Bank</th>
            <th>Nomor Akun</th>
            <th>Total</th>
            <th>Tanggal</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;foreach ($tagihan as $row): ?>
            <tr>
              <td><?= $no ?></td>
              <td><a href=""><?= $row['kode_transaksi'] ?></a></td>
              <td><?= $row['bank'] ?></td>
              <td><?= $row['nomor_akun'] ?></td>
              <td><?= idr_format($row['total']) ?></td>
              <td><?= tanggal($row['created_date']) ?></td>
              <td>
                <?php 
                  if ($row['status'] == 'settlement') {
                    echo "<span class='badge bg-success'>Dibayar</span>";
                  } else if ($row['status'] == 'expire') {
                    echo "<span class='badge bg-danger'>Kadaluarsa</span>";
                  } else if ($row['status'] == 'pending'){
                    echo "<span class='badge bg-info'>Menunggu Pembayaran</span>";
                  } else {
                    echo "<span class='badge bg-default'>{$row['status']}</span>";
                  };
                 ?>
              </td>
            </tr>
          <?php $no++;endforeach ?>
        </tbody>    

      </table>

    </div>
  </div>
</section>

<?php $this->load->view('layout/footer'); ?>

