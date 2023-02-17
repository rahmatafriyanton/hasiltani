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
            <th>Kode Transaksi</th>
            <th>Nama Toko</th>
            <th>Total</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Pengiriman</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;foreach ($transaksi as $row): ?>
            <tr>
              <td><?= $no ?></td>
              <td>
                <a href="<?= base_url('Pesanan/detail/').$row['transaksi_id'] ?>" data-lightbox="ajax">
                  <?= $row['transaksi_id'] ?>
                </a>
              </td>
              <td><?= $row['nama_toko'] ?></td>
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
              <td><?= $row['status_pengiriman'] ?></td>
              <td>
                <a href="<?= base_url('Pesanan/detail/').$row['transaksi_id'] ?>" class="btn btn-info text-white btn-sm" data-lightbox="ajax">
                  <i class="icon-line-expand"></i>
                </a>
                <?php if ($row['status_pengiriman'] == 'Sedang Dikirim' || $row['status_pengiriman'] == 'Ditolak'): ?>
                  <button class="btn btn-primary text-white btn-sm btn-pengiriman" data-transaksi_id="<?= $row['transaksi_id'] ?>" data-toko_id="<?= $row['toko_id'] ?>" data-total="<?= $row['total'] ?>">
                    <i class="icon-pencil"></i>
                  </button>
                <?php endif ?>
              </td>
            </tr>
          <?php $no++;endforeach ?>
        </tbody>    

      </table>

    </div>
  </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal-pengiriman">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Knfirmasi Pesanan</h4>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
      </div>
      <div class="modal-body">
        <form id="form-pengiriman" method="post">
          <input type="hidden" name="transaksi_id" value="" id="transaksi_id">
          <input type="hidden" name="total" value="" id="total_pesanan">
          <input type="hidden" name="toko_id" value="" id="toko_id_pesanan">
          <div class="form-group">
            <label>Terima Barang?</label>
            <select name="status_pengiriman" id="status_pengiriman" class="form-control">
              <option value="">Pilih Satu</option>
              <option value="Diterima">Terima Barang</option>
              <option value="Dikembalikan">Kembalikan</option>
            </select>
          </div>

          <button class="btn btn-success float-end" type="submit">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('layout/footer'); ?>

<script>
  $(document).ready(function() {
    pesan = "<?= $this->session->flashdata('berhasil'); ?>"
    if (pesan != '') {
      Swal.fire({
        title: 'Berhasil',
        text: 'Pesanan berhasil dibuat!',
        icon: 'success',
        type: 'success',
        confirmButtonColor: '#1abc9c'
      })
    }

    $('.btn-pengiriman').click(function() {
      $('#form-pengiriman')[0].reset();
      $('#modal-pengiriman').modal('show')
      $('#transaksi_id').val($(this).data('transaksi_id'))
      $('#total_pesanan').val($(this).data('total'))
      $('#toko_id_pesanan').val($(this).data('toko_id'))
    })

    $('#form-pengiriman').submit(function(e) {
      e.preventDefault()
      me = $(this)
      $.ajax({
        url: "<?= base_url('Transaksi/terima_barang') ?>",
        type: 'post',
        data: me.serialize(),
        dataType: 'json',
        success: function(response) {
          if (response.success == true) {
            $('.invalid-feedback').remove()
            alert('Status Penerimaan Barang Berhasil Diupdate')
            location.reload()
          } else {
            $.each(response.message, function(key, value) {
              element = $('#' + key);
              element.parent().find('.invalid-feedback').remove();
              element.removeClass('is-invalid')
              .removeClass('is-valid')
              .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
              element.parent().append(value)
            })
          }
        },
        error: (e) => {
          alert(`${e.status} - ${e.statusText}`);
          $('.kirim').prop('disabled', false);
        }
      });
    })
  });
</script>

